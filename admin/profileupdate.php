<?php
header( "refresh:3;url=profile.php" );
include_once("z_db.php");// database connection details stored here
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['adminidusername'])) {
        print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>
			";
}

// Collect the data from post method of form submission // 
$name=mysqli_real_escape_string($con,$_POST['fullname']);
$emaill=mysqli_real_escape_string($con,$_POST['email']);
$addrs=mysqli_real_escape_string($con,$_POST['address']);
$cntry=mysqli_real_escape_string($con,$_POST['country']);
$p1=mysqli_real_escape_string($con,$_POST['p1']);
$p2=mysqli_real_escape_string($con,$_POST['p2']);
$bankname=mysqli_real_escape_string($con,$_POST['bankname']);
$accname=mysqli_real_escape_string($con,$_POST['accname']);
$accno=mysqli_real_escape_string($con,$_POST['accno']);
$ifsccode=mysqli_real_escape_string($con,$_POST['ifsccode']);
$acctype=mysqli_real_escape_string($con,$_POST['acctype']);
//collection ends
//collection ends
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update profile</title>
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<div id="google_translate_element" align="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
</head>
<?php
$check=1;
if($check==1){

$status = "OK";
$msg="";
//validation starts
// if userid is less than 6 char then status is not ok

if ( strlen($p1) < 8 ){
$msg=$msg."Password Must Be More Than 8 Char Length.<BR>";
$status= "NOTOK";}	

if ( strlen($cntry) < 2 ){
$msg=$msg."Country Must Be More Than 2 Char Length.<BR>";
$status= "NOTOK";}

if ( strlen($addrs) < 2 ){
$msg=$msg."Address Must Be More Than 5 Char Length.<BR>";
$status= "NOTOK";}

if ( strlen($emaill) < 3 ){
$msg=$msg."Email Must Be More Than 3 Char Length.<BR>";
$status= "NOTOK";}

if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emaill)){
$msg=$msg."Email Id Not Valid, Please Enter The Correct Email Id. This id will be used in case of recovering of password<BR>";
$status= "NOTOK";}	

if ( strlen($p2) < 8 ){
$msg=$msg."Password Must Be More Than 8 Char Length.<BR>";
$status= "NOTOK";}

if ( strlen($name) < 2 ){
$msg=$msg."Name should contain 2 chars.<BR>";
$status= "NOTOK";}
}

if ($status=="OK") 
{

$query=mysqli_query($con,"update affiliateuser set password='$p1',fname='$name',email='$emaill',country='$cntry',address='$addrs',bankname='$bankname',accountname='$accname',accountno='$accno',accounttype='$acctype',ifsccode='$ifsccode' where username='".$_SESSION['adminidusername']."'");


print "updated....!!! Redirecting...";


}



else
{ 
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>"; //printing error if found in validation
}

?> 
</html>
