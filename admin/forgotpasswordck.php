<?php
//collecting data
include_once ("z_db.php");
$email=mysqli_real_escape_string($con,$_POST['femail']);
$status=1;
if($status==1){

$status = "OK";
$msg="";
//checking constraints
if ( strlen($email) < 1 ){
$msg=$msg."Please Enter Your Email Id.<BR>";
$status= "NOTOK";}

if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
$msg=$msg."Email Id Not Valid, Please Enter The Correct Email Id .<BR>";
$status= "NOTOK";
}


$result = mysqli_query($con,"SELECT count(*) FROM  affiliateuser where email = '$email'");
$row = mysqli_fetch_row($result);
$numrows = $row[0];

if(($numrows) == 0) {
$msg=$msg."Your account not found or your account is inactive. Please contact your administrator.<BR>";
$status= "NOTOK";}
}

if($status=="OK")
{
$re = mysqli_query($con,"SELECT password FROM  affiliateuser where email = '$email'");
$r12 = mysqli_fetch_row($re);
$pwd = $r12[0];
//updating status if validation passes
$to=$email;
$subject="Password Request";
$message="As per your request, we have sent your password.<br> Your password is <b> $pwd </b><br><br>Regards";
mail($to,$subject,$message,$headers);

echo "<center>Your password has been sent to your registered mail id. Please check your junk or spam folder if you do not find in your inbox. <br><input type='button' value='Login Now' onClick='history.go(-1)'></center>";
}
else{
echo "<br/><br/><br/><center><font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'></center>"; //priting error if found in validation
}
?>