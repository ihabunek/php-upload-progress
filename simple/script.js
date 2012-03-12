$(document).ready(function() 
{
	$('#upload_form').submit(function() 
	{
		// Clear the progress bar
		$('#progress .bar').html('0%');
		$('#progress .bar').width('0%');
	
		// Start polling for progress after delay
		setTimeout("checkProgress()", 1500);
	});
});

function checkProgress() 
{
	$.get('progress.php', function(data) 
	{
		var percentage = data + '%';
		console.log(percentage);
		
		// Update the progress bar
		$('#progress .bar').html(percentage);
		$('#progress .bar').width(percentage);
		
		// If not finished, query again in 1s
		if (data < 100) {
			setTimeout("checkProgress()", 500);
		}
	});
}
