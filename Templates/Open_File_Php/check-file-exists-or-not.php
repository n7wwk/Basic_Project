<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checks Whether a File Exists or Not in PHP</title>
</head>
<body>

<?php
$file = "data.txt";
 
// Check the existence of file
if(file_exists($file)){
    echo "The file $file exists." . "<br>";
    
    // Attempt to open the file
    $handle = fopen($file, "r") or die("ERROR: Cannot open the file.");
    if($handle){
        echo "File opened successfully.";
        
        // Closing the file handle
        fclose($handle);
    }
} else{
    echo "ERROR: The file $file does not exist.";
}
?>

</body>
</html>