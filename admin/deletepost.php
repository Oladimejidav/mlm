<?php
session_start(); //starting session
include('z_db.php'); //connection details

$tdel=mysqli_real_escape_string($con,$_POST['postsub']); //fetching details through post method


$res1=mysqli_query($con,"DELETE FROM task WHERE id=$tdel");

if($res1)
{
print "Task deleted...!!!";
}
else
{
print "error!!!! try again later or ask for help from your administrator.";
}

header( "refresh:1;url=statuspost.php" );
?>
