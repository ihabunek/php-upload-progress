/* Starts the file upload. */
function upload()
{
	// Clear the progress bar
	$('#progress .bar').html('0%');
	$('#progress .bar').width('0%');
	
	// Clear all statuses
	$('#status').html('');
	$('.file-status').html('');
	
	// Enable the cancel button
	$('#cancel-button').removeAttr('disabled');

	// Submit the upload form
	$('#upload_form').submit();
	
	// Start polling for progress after delay
	setTimeout("checkProgress()", 1500);
}

/* Checks upload progress and updates the progress bar. */
function checkProgress()
{
	$.getJSON('progress.php', function(data) {

		// Update the progress bar
		var percentage = data.progress + '%';
		$('#progress .bar').html(percentage);
		$('#progress .bar').width(percentage);
		
		// If upload is not finished
		if (!data.done)
		{
			// Display upload status
			$('#status').html(
				'Upload in progress. ' + 
				'Speed: ' + data.speed + ' KB/s ' + 
				'Remaining time: ' + data.remainingTime + ' s'
			);
			
			// Update each file status
			$.each(data.files, function(index, file) 
			{
				var fieldID = '#' + file.field_name;
				
				$(fieldID).parent().children('.file-status')
					.html(file.done ? "Done" : "Uploading...");
			});

			// Query again in 1s
			setTimeout("checkProgress()", 500);
		}
		else
		{
			// Update global status and all file statuses
			$('#status').html("Upload finished.");
			$('.file-status').html("Finished.");
			
			// Disable the cancel button
			$('#cancel-button').attr('disabled', 'disabled');
		}
	});
}

var maxID = 0;

/* Adds a file input to the upload form. */
function addFile()
{
	var name = "file-" + maxID++;
	
	var input = $('<input type="file">')
		.attr('name', name)
		.attr('id', name);
	
	var close = $('<a>')
		.addClass('close')
		.attr('href', 'javascript: removeFile("' + name + '")')
		.html('&times;');
		
	var status = $('<span>')
		.addClass('file-status');
		
	var inputDiv = $('<div>')
		.addClass('file-item')
		.append(input)
		.append(status)
		.append(close);
	
	console.log("Adding file input", input);
	
	$('#file-list').append(inputDiv);
	
	// Enable the upload button
	$('#submit-button').removeAttr('disabled');
}

/* Removes a file input, along with it's parent div. */
function removeFile(name)
{
	$('#' + name).parent().remove();
	
	// Disable the upload button if no files are selected
	if ($('.file-item').length < 1) {
		$('#submit-button').attr('disabled', 'disabled');
	}
}

/* Sends a request which cancelles the upload. */
function cancelUpload()
{
	console.log("Cancelling upload...");
	$.getJSON('cancel.php', function(data) {	
		console.log("Upload cancelled");
	});
}
