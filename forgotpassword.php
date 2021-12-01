<?php
include_once ("z_db.php");


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['femail']))
{

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

$sqlquery="SELECT wlink FROM settings where sno=0"; //fetching website from databse
$rec2=mysqli_query($con,$sqlquery);
$row2 = mysqli_fetch_row($rec2);
$wlink=$row2[0]; //assigning website address
}

$newpassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*') , 0 , 14 );

if ( strlen($newpassword) < 8 ){
$msg=$msg."Password Can not generated, system error. Try again.<BR>";
$status= "NOTOK";}


if($status=="OK")
{
$sqlquery111="SELECT etext FROM emailtext where code='FORGOTPASSWORD'"; //fetching website from databse
$rec2111=mysqli_query($con,$sqlquery111);
$row2111 = mysqli_fetch_row($rec2111);
$emailtext=$row2111[0]; //assigning email text for email


$re = mysqli_query($con,"update affiliateuser set password = '$newpassword' where email = '$email'");
if($re)
{

$message=$emailtext;
$to=$email;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
$subject="Password Request";
$message.="This is your new password : <b> $newpassword </b><br><br>";
mail($to,$subject,$message,$headers);

echo "<br><center><font face='Verdana' size='2' color=red>Your password has been sent to your registered mail id. Please check your junk or spam folder if you do not find in your inbox. </font><br>";
}
else
{
 print "<center><font face='Verdana' size='2' color=red><br>We have found some technical glitch and unable to process your request. Please Ask Admin or try again after some time.</font><br>";
}
//updating status if validation passes

}
else{
echo "<br/><br/><br/><center><font face='Verdana' size='2' color=red>$msg</font><br>"; //priting error if found in validation


}
}
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Forgot Password Request</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<style type="text/css">html {
    overflow-y: scroll;
background: url(images/login2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

</style>
<div id="google_translate_element" align="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
</head>
<body>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
  <div class="container aside-xl"> <a class="navbar-brand block" href="index.php">Resend Password</a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong>Enter E-Mail To Get The Password</strong> </header>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
        <div class="list-group">
          <div class="list-group-item">
            <input type="email" placeholder="Registered E-Mail" class="form-control no-border" name="femail" required>
          </div>
          
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Send Me Password</button>
        <div class="text-center m-t m-b"><a href="#"><small style="color:#ffffff;">Got The Password?</small></a></div>
        <a href="index.php" class="btn btn-lg btn-default btn-block">Sign In Now</a>
        <div class="text-center m-t m-b"><a href="#"><small style="color:#ffffff;">Dont Have Account Yet?</small></a></div>
        <a href="signup.php" class="btn btn-lg btn-default btn-block">Create an account</a>
      </form>
    </section>
  </div>
</section>
<!-- footer -->
<footer id="footer">
  <div class="text-center padder">
    <p> <small style="color:#ffffff;"><?php $query="SELECT footer from settings where sno=0"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$footer="$row[footer]";
	print $footer;
	}
  ?></small> </p>
  </div>
</footer>
<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>