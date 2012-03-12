<?php

session_start();

$key = ini_get("session.upload_progress.prefix") . "myProgress";

if (isset($_SESSION[$key])) 
{
	$data = $_SESSION[$key];

	$processed = $data["bytes_processed"];
	$length = $data["content_length"];
	$progress = ceil(100 * $processed / $length);
}
else 
{
	$progress = 100;
}

echo $progress;

?>