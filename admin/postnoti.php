<?php
header( "refresh:1;url=notifications.php" );
session_start(); //starting session
include('z_db.php'); //connection details
$status = "OK"; //initial status
$msg="";
$nhead=mysqli_real_escape_string($con,$_POST['notihead']); //fetching details through post method
$nbody = mysqli_real_escape_string($con,$_POST['notibody']);

if ( strlen($nhead) < 2 ){
$msg=$msg."Subject Should Have Minimum 2 Characters.<BR>";
$status= "NOTOK";}

if ( strlen($nbody) < 4 ){ //checking if body is greater then 4 or not
$msg=$msg."Body must contain more than 4 char length.<BR>";
$status= "NOTOK";}

if($status=="OK")
{
$res1=mysqli_query($con,"INSERT INTO notifications (subject, body, posteddate, valid) VALUES ('$nhead', '$nbody', NOW(), 1)");

if($res1)
{
print "Notification Posted...!!!";
}
else
{
print "error!!!! try again later or ask for help from your administrator.";
}


} 
else {
        
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>"; //printing errors
	 
}

?>
