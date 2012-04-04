<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Upload progress demo</title>
	<link rel="stylesheet" href="../lib/bootstrap.css" />
	<style type="text/css">
		h1, h2, h3 { margin-top: 20px; }
		input[type="file"] { margin: 0 20px 0 0; }
	</style>
	<script type="text/javascript" src="../lib/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="../lib/bootstrap.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<div class="container">
		<h1>Simple example</h1>
		
		<h2>Upload form</h2>
		<p>Choose a file for upload:</p>
		<div class="well">
			<form id="upload_form" action="upload.php" method="POST" enctype="multipart/form-data" target="result_frame">
				<input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="myProgress" />
				<input type="file" name="file" id="file" /> 
			</form>
		</div>
		
		<button id="submit-button" class="btn btn-primary" onclick="upload()">Upload</button>
		
		<h2>Progress bar</h2>
		<div id="progress" class="progress">
			<div class="bar"></div>
		</div>

		<h2>Result</h2>
		<p>The post result is redirected to this iframe:</p>
		<iframe id="result_frame" name="result_frame" src="about:blank"></iframe>

		<p><a href="session.php" target="_blank">View session</a></p>
		<p><a href="../advanced/">Advanced example »</a></p>
	</div>
</body>
</html>