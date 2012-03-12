<?php

session_start();

$key = ini_get("session.upload_progress.prefix") . "fancyProgress";

if (isset($_SESSION[$key]))
{
	$_SESSION[$key]["cancel_upload"] = true;
}

?>