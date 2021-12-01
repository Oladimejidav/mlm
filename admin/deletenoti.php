<?php
session_start(); //starting session
include('z_db.php'); //connection details

$ndel=mysqli_real_escape_string($con,$_POST['notisub']); //fetching details through post method


$res1=mysqli_query($con,"update notifications set valid=0 where id=$ndel");

if($res1)
{
print "Notification deactivated...!!!";
}
else
{
print "error!!!! try again later or ask for help from your administrator.";
}

header( "refresh:1;url=notifications.php" );
?>
