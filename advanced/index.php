<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PHP upload progress: Advanced example</title>
	<link rel="stylesheet" href="../lib/bootstrap.css" />
	<style type="text/css">
		h1, h2, h3 { margin-top: 20px; }
		input[type="file"] { margin: 0 20px 0 0; }
	</style>
	<script type="text/javascript" src="../lib/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<div class="container">
		<h1>Advanced example</h1>
		
		<h2>Upload form</h2>

		<!-- Link to add a file input to the file-list. -->
		<a href="javascript:addFile();">Add file</a>
		
		<form id="upload_form" action="upload.php" method="POST" enctype="multipart/form-data" target="result_frame">
			
			<input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="advancedProgress" />
			
			<!-- A list of files for upload (added via javascript). -->
			<div id="file-list" class="well"></div>
		</form>
		
		<!-- Submit & cancel buttons -->
		<button id="submit-button" class="btn btn-primary" disabled="disabled" onclick="upload()">Upload</button>
		<button id="cancel-button" class="btn btn-danger" disabled="disabled" onclick="cancelUpload()">Cancel upload</button>
		
		<h2>Progress</h2>
		
		<!-- Progress bar -->
		<div id="progress" class="progress">
			<div class="bar"></div>
		</div>
		
		<!-- Upload progress info (speed, time remaining) -->
		<div id="status"></div>

		<h2>Result</h2>
		<p>The post result is redirected to this iframe:</p>
		<iframe id="result_frame" name="result_frame" src="about:blank"></iframe>
		
		<p><a href="session.php" target="_blank">View session</a></p>
		<p><a href="../simple/">Simple example »</a></p>
	</div>
</body>
</html>