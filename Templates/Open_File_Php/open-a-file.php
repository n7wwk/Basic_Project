<!DOCTYPE html>
<html lang="en">
<head>
    <title>Opening a File in PHP</title>
</head>
<body>

<?php
$handle = fopen("data.txt", "r") or die("ERROR: Cannot open the file.");
if($handle){
    echo "File opened successfully.";
	
	// Closing the file handle
    fclose($handle);
}
?>

</body>
</html>