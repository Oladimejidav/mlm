<?php
header( "refresh:1;url=gensettings.php" );
include('z_db.php'); //connection details
$status = "OK"; //initial status
$msg="";
 //fetching details through post method
$wlink = mysqli_real_escape_string($con,$_POST['wlink']);
$coname = mysqli_real_escape_string($con,$_POST['coname']);
$coemail = mysqli_real_escape_string($con,$_POST['coemail']);
$codetail =mysqli_real_escape_string( $con,$_POST['codetail']);
$payemail = mysqli_real_escape_string($con,$_POST['payemail']);
$fb = mysqli_real_escape_string($con,$_POST['fblink']);
$tw = mysqli_real_escape_string($con,$_POST['twitterlink']);
$sno = mysqli_real_escape_string($con,$_POST['sno']);
$maintain = mysqli_real_escape_string($con,$_POST['maintain']);

$hdrtext = mysqli_real_escape_string($con,$_POST['hdrtext']);
$ftrtext = mysqli_real_escape_string($con,$_POST['ftrtext']);
$payzaid = mysqli_real_escape_string($con,$_POST['payzaid']);
$solidid = mysqli_real_escape_string($con,$_POST['solidid']);
$solidbutton = mysqli_real_escape_string($con,$_POST['solidbuttonid']);

$alwdpaypal = mysqli_real_escape_string($con,$_POST['alwdpaypal']);
$alwdpayment = mysqli_real_escape_string($con,$_POST['alwdpayment']);
$alwdpayza = mysqli_real_escape_string($con,$_POST['alwdpayza']);
$alwdsolid = mysqli_real_escape_string($con,$_POST['alwdsolid']);
$alwdcash = mysqli_real_escape_string($con,$_POST['alwdcash']);


if ( strlen($wlink) < 2 ){
$msg=$msg."Textbox cannot be empty.<BR>";
$status= "NOTOK";}

if ( strlen($coname) < 4 ){ //checking if body is greater then 4 or not
$msg=$msg."Textbox cannot be empty.<BR>";
$status= "NOTOK";}

if ( strlen($coemail) < 4 ){ //checking if body is greater then 4 or not
$msg=$msg."Textbox cannot be empty.<BR>";
$status= "NOTOK";}
if ( strlen($codetail) < 4 ){ //checking if body is greater then 4 or not
$msg=$msg."Textbox cannot be empty.<BR>";
$status= "NOTOK";}
if ( strlen($payemail) < 4 ){ //checking if body is greater then 4 or not
$msg=$msg."Textbox cannot be empty.<BR>";
$status= "NOTOK";}

if ( strlen($ftrtext) < 1 ){ //checking if body is greater then 4 or not
$msg=$msg."Header Text Can Not Be Empty.<BR>";
$status= "NOTOK";}

if($status=="OK")
{
$res1=mysqli_query($con,"update settings set header='$hdrtext', footer='$ftrtext', wlink='$wlink',coname='$coname',invoicedetails='$codetail',email='$coemail',fblink='$fb',twitterlink='$tw',paypalid='$payemail', maintain='$maintain', alwdpayment='$alwdpayment', payzaid='$payzaid', solidtrustid='$solidid', solidbutton='$solidbutton' where sno='$sno'");
$res1=mysqli_query($con,"update paymentgateway set status='$alwdpaypal' where id=1");
$res1=mysqli_query($con,"update paymentgateway set status='$alwdpayza' where id=3");
$res1=mysqli_query($con,"update paymentgateway set status='$alwdsolid' where id=4");
$res1=mysqli_query($con,"update paymentgateway set status='$alwdcash' where id=2");

if($res1)
{
print "Settings updated...!!! Redirecting...";
}
else
{
print "error!!!! try again later or ask for help from your administrator!!!! Redirecting...";
}


} 
else {
        
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>"; //printing errors
	 
}

?>
