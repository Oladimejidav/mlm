<?php
session_start(); //starting session
include('z_db.php'); //connection details

if(isset($_GET['id2']))
{
$adminid=$_GET['id2'];
$msg=mysqli_query($con,"DELETE from subtask where id2='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}header( "refresh:1;url=postsubmitted.php" );
}


?>
