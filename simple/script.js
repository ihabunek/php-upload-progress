/* Starts the file upload. */
function upload()
{
	// Clear the progress bar
	$('#progress .bar').html('0%');
	$('#progress .bar').width('0%');
	
	// Submit the upload form
	$('#upload_form').submit();
	
	// Start polling for progress after delay
	setTimeout("checkProgress()", 1500);
}

function checkProgress() 
{
	$.get('progress.php', function(data) 
	{
		var percentage = data + '%';
		
		// Update the progress bar
		$('#progress .bar').html(percentage);
		$('#progress .bar').width(percentage);
		
		// If not finished, query again after a delay
		if (data < 100) {
			setTimeout("checkProgress()", 500);
		}
	});
}
