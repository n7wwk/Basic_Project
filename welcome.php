<!--?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<?php
// Include config file
require_once ("/includes/header.php");
?>
<?php require_once ('/includes/menubar.php');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: left; }
    </style>
    <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
<!--
TD{font-family: Arial; font-size: 10pt;}
<!--
</style>
<Script Language=JavaScript>
<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function NewWindow(mypage, myname, w, h, scroll) {
var winl = (screen.width - w) / 2;
var wint = (screen.height - h) / 2;
winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable'
win = window.open(mypage, myname, winprops)
if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}
//  End -->
</script>
<script type="text/javascript" src="clockh.js">
</script>
<script type="text/javascript" src="clockp.js">
</script>
</head>
<body background="image/grayzz.png">
<center><p><P><P><P><P>
    
        <b><font size="5"></big><font color="green">Putnam County Florida Region 3<BR>
     
     <img src="image/regionmap.gif" width="160" height="150" alt="region3"/>

 
     <p>Offical Time</font></font></b>


<table border="0" width="60%">
<tr>
    <td><center><div id="clock_a"></div></center> </td>
    <td><div id="clock_b"></div> </td>
</tr> </table> 

    
        
</body>
</html>
<?php
// Include config file
require_once '/includes/footer.php';
?>
