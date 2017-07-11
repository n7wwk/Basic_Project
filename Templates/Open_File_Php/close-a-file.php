<!DOCTYPE html>
<html lang="en">
<head>
    <title>Closing a File in PHP</title>
</head>
<body>

<?php
$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    // Open the file for reading
    $handle = fopen($file, "r") or die("ERROR: Cannot open the file.");
    if($handle){
        echo "File opened successfully." . "<br>";
    }
        
    echo "Now closing the file." . "<br>";
        
    // Closing the file handle
    if(fclose($handle)){
        echo "File closed successfully.";
    }
} else{
    echo "ERROR: File does not exist.";
}
?>

</body>
</html>