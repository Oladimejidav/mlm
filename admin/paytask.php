<?php
session_start(); //starting session
include('z_db.php'); //connection details

if(isset($_GET['id2']))
{
$adminid=$_GET['id2'];
$msg=mysqli_query($con,"UPDATE subtask SET status=1");
$msg=mysqli_query($con,"UPDATE affiliateuser SET tamount= tamount + 10");
if($msg)
{
echo "<script>alert('Paid');</script>";
}header( "refresh:1;url=postsubmitted.php" );
}


?>
