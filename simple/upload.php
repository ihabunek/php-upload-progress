<?php session_start(); ?>
<pre>
<?php
$file = $_FILES['file'];

if($file['error'] == UPLOAD_ERR_OK)
{
	echo "<strong>Upload complete</strong>\n";
	echo "Name: " . $file["name"] . "\n";
	echo "Type: " . $file["type"] . "\n";
	echo "Size: " . round($file["size"] / 1024) . "KB\n";
	echo "Saved to: " . $file["tmp_name"] . "\n";
}
else
{
	echo "<strong>Upload failed</strong>\n";
	echo "Error code: " . $file['error'];
}
?>
</pre>
