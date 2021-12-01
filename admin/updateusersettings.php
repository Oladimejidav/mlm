<?php
include_once("z_db.php");// database connection details stored here
// Collect the data from post method of form submission // 
$act=mysqli_real_escape_string($con,$_POST['act']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$ear=mysqli_real_escape_string($con,$_POST['earnings']);
$name=mysqli_real_escape_string($con,$_POST['fname']);
$password=mysqli_real_escape_string($con,$_POST['password']);

$email=mysqli_real_escape_string($con,$_POST['email']);

$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
$ref=mysqli_real_escape_string($con,$_POST['refer']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$country=mysqli_real_escape_string($con,$_POST['country']);
$package=mysqli_real_escape_string($con,$_POST['package']);
//collection ends
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up Now</title>
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>
<?php
$check=1;
if($check==1){

$status = "OK";
$msg="";
//validation starts
// if userid is less than 6 char then status is not ok
				

					


			

$result = mysqli_query($con,"SELECT count(*) FROM  affiliateuser where username = '$ref'");
$row = mysqli_fetch_row($result);
$numrows = $row[0];
if ($numrows==0)
{
$msg=$msg."Sponsor/Referral Username Not found, Try Again.<BR>";
$status= "NOTOK";
}

if ( strlen($password) < 8 ){
$msg=$msg."Password Must Be More Than 8 Char Length.<BR>";
$status= "NOTOK";}	

if ( strlen($address) < 8 ){
$msg=$msg."Please Provide The Correct Address, Your Cheque Will Be Send Here.<BR>";
$status= "NOTOK";}

if ( strlen($mobile) <> 10 ){
$msg=$msg."Please Enter 10 Digits Mobile No.<BR>";
$status= "NOTOK";}

if ( strlen($email) < 1 ){
$msg=$msg."Please Enter Your Email Id.<BR>";
$status= "NOTOK";}
			
if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
$msg=$msg."Email Id Not Valid, Please Enter The Correct Email Id .<BR>";
$status= "NOTOK";}

if ( $country == "" ){
$msg=$msg."Please Enter Your Country Name.<BR>";
$status= "NOTOK";}	
}


if ($status=="OK") 
{

$query=mysqli_query($con,"update affiliateuser set password='$password',fname='$name',address='$address',email='$email',referedby='$ref',mobile='$mobile',country='$country',tamount='$ear',pcktaken='$package',active='$act' where username='$username'");


print "
				<script language='javascript'>
					window.location = 'users.php';
				</script>
			";}



else
{ 
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>"; //printing error if found in validation
}

?> 
</html>
