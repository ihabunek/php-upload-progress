<?php session_start(); ?>
<html>
<head>
	<title>Upload progress demo</title>
	<link rel="stylesheet" href="../lib/bootstrap.css" />
	<script type="text/javascript" src="../lib/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="../lib/bootstrap.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<div class="container">

		<h2>Upload form</h2>
		<form id="upload_form" action="upload.php" method="POST" enctype="multipart/form-data" target="result_frame">
			<input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="jceprogress" />
			<input type="file" name="file" id="file" /> 
			<input type="submit" />
		</form>
		
		<!-- Progress bar -->
		<div id="progress" class="progress progress-striped active">
			<div class="bar" style="width: 0%;"></div>
		</div>
		
		<h2>Result</h2>
		<iframe id="result_frame" name="result_frame" src="about:blank"></iframe>
	</div>
</body>
</html>