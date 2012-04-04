<!DOCTYPE html>
<html lang="en">
<head>
	<title>PHP upload progress</title>
	<link rel="stylesheet" href="lib/bootstrap.css" />
	<style type="text/css">
		.hero-unit h1 { font-size: 42px; margin-bottom: 10px; }
	</style>
</head>
<body>
	<div class="container">
	
		<div class="hero-unit">
			<h1>PHP upload progress demo</h1>
			<p>A demonstraiton of the upload progress feature introduced in PHP 5.4.</p>
			<p>Home: <a target="_blank" href="https://github.com/ihabunek/php-upload-progress">https://github.com/ihabunek/php-upload-progress</a>
		</div>
	
		<div class="row">
			<div class="span3">
				<h2>Simple example</h2>
				<ul>
					<li>single file upload</li>
					<li>progress bar</li>
				</ul>
				<p><a class="btn" href="simple">View &raquo;</a></p>
			</div>
			<div class="span3">
				<h2>Advanced example</h2>
				<ul>
					<li>multiple file upload</li>
					<li>progress bar</li>
					<li>upload speed</li>
					<li>estimated time to finish</li>
					<li>cancelling an upload</li>
				</ul>
				<p><a class="btn" href="advanced">View &raquo;</a></p>
			</div>
			<?php 
			// Collect relevant ini settings for display
			$ini = [
				'session.upload_progress.cleanup'  => ini_get('session.upload_progress.cleanup') ? 'On' : 'Off',
				'session.upload_progress.enabled'  => ini_get('session.upload_progress.enabled') ? 'On' : 'Off',
				'session.upload_progress.freq'     => ini_get('session.upload_progress.freq'),
				'session.upload_progress.min_freq' => ini_get('session.upload_progress.min_freq'),
				'session.upload_progress.name'     => ini_get('session.upload_progress.name'),
				'session.upload_progress.prefix'   => ini_get('session.upload_progress.prefix'),
			];
			?>
			<div class="span6">
				<table class="table table-striped table-condensed">
					<h2>Relevant ini settings</h2>
					<?php foreach($ini as $key => $value) { ?>
					<tr>
						<td><?php echo $key ?></td>
						<td><code><?php echo $value; ?></code></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>