<?php

session_start();

$key = ini_get("session.upload_progress.prefix") . "fancyProgress";

if (isset($_SESSION[$key])) 
{
	$data = $_SESSION[$key];

	// Calculate progress
	$current = $data["bytes_processed"];
	$total = $data["content_length"];
	$progress = ceil($current / $total * 100);
	
	$duration = time() - $data["start_time"];
	if ($duration > 0)
	{
		// Calculate average transfer speed (in KB/s)
		$avgSpeed = $current / $duration;
		$avgSpeedKB = round($avgSpeed / 1024, 2);
		
		// Make a (poor) estimate of the remaining time
		$pendingData = $total - $current;
		$remainingTime = round($pendingData / $avgSpeed);
	}
	else
	{
		$avgSpeedKB = '?';
		$remainingTime = '?';
	}
	
	$return = [
		'done' => false,
		'progress' => $progress,
		'speed' => $avgSpeedKB,
		'remainingTime' => $remainingTime,
		'files' => $data['files'],
		'session' => $_SESSION
	];
}
else 
{
	$return = [
		'done' => true,
		'progress' => 100,
	];
}

echo json_encode($return);

?>