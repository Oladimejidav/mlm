<?php
include_once ("z_db.php");

// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['paypalidsession'])) {
        print "
				<script language='javascript'>
					window.location = '404.php';
				</script>
			";
}

$userid=$_SESSION['paypalidsession'];
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
		

    $queryuser="SELECT id,pcktaken FROM  affiliateuser where username = '$userid'"; 
$resultuser = mysqli_query($con,$queryuser);

while($rowuser = mysqli_fetch_array($resultuser))
{
 $uaid="$rowuser[id]";
  $pcktake="$rowuser[pcktaken]";
 }
 $query="SELECT * FROM  packages where id = $pcktake"; 
 
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$pckid="$row[id]";
	$pname="$row[name]";
	$pprice="$row[price]";
	$pcur="$row[currency]";
	$ptax="$row[tax]";
	$gatewayid="$row[gateway]";
	$total=$pprice+$ptax;
}
			$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,cod,pckid,gateway) values('$uaid','C.O.D','$total','$pcur',NOW(),1,'$pckid','C.O.D')");
			
			$sqlquery="SELECT wlink FROM settings where sno=0"; //fetching website from databse
$rec2=mysqli_query($con,$sqlquery);
$row2 = mysqli_fetch_row($rec2);
$wlink=$row2[0]; //assigning website address

$sqlquery222="SELECT email FROM settings where sno=0"; //fetching website from databse
$rec3=mysqli_query($con,$sqlquery222);
$row222 = mysqli_fetch_row($rec3);
$email=$row222[0]; //assigning website address

$sqlquery111="SELECT etext FROM emailtext where code='NEWMEMBER'"; //fetching website from databse
$rec2111=mysqli_query($con,$sqlquery111);
$row2111 = mysqli_fetch_row($rec2111);
$emailtext=$row2111[0]; //assigning email text for email
		// More headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
$to=$email;
$subject="New COD Order SignUp | Bingo ";
$message=$emailtext;
mail($to,$subject,$message,$headers);
			
print "
				<script language='javascript'>
					window.location = 'finalthankyoufree.php?username=$userid';
				</script>
			"; 			
			
			
			
}

$userid=mysqli_real_escape_string($con,$_SESSION['paypalidsession']);
if ($userid=="")
{
print "Oops!!! Something Went Wrong.... Contact your system administrator.";
print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>
			";

}
$q1234="SELECT paypalid,payzaid,solidtrustid,solidbutton from settings"; 
 
 
 $r1234 = mysqli_query($con,$q1234);

while($row = mysqli_fetch_array($r1234))
{
 $paypal_id="$row[paypalid]";
 $payza_id="$row[payzaid]";
 $solidtrust_id="$row[solidtrustid]";
 $solidbuttonname="$row[solidbutton]";

 
 }
?>
<?php
$paypal_url='https://www.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<style>html {
    overflow-y: scroll; 
}</style>
<meta charset="utf-8" />
<title>Thank You | Sapviews</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<div id="google_translate_element" align="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
</head>
<body style="overflow: scroll;" class="">
<section id="content" class="m-t-lg wrapper-md animated fadeInDown">
  <div> <a class="navbar-brand block" >Thank You, but your account is not active yet ... ;)</a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong><a href="index.php" >login to continue</a></strong> </header>>
      
	 <?php $query="SELECT id,fname,email,doj,active,username,address,pcktaken,tamount FROM  affiliateuser where username = '$userid'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $aid="$row[id]";
 $regdate="$row[doj]";
 $name="$row[fname]";
 $address="$row[address]";
 $acti="$row[active]";
 $pck="$row[pcktaken]";
 $ear="$row[tamount]";
 
 }
 ?> 
 <?php $query="SELECT * FROM  packages where id = $pck"; 
 
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$pname="$row[name]";
	$pprice="$row[price]";
	$pcur="$row[currency]";
	$ptax="$row[tax]";
$total=$pprice+$ptax;
// "<option value='$id'>$pname | Price - $pcur $total </option>";
  
  }
  ?>
  
  <?php
 $query="SELECT count(*) FROM  paymentgateway where name='PayPal' and status=1"; 
 
 $result = mysqli_query($con,$query);
 $row = mysqli_fetch_row($result);
$numrows = $row[0];


  
  
if($numrows==1) {
	?>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="frmPayPal1">     
                
                        
	<input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="<?php print $pname ?>">
    <input type="hidden" name="item_number" value="<?php print $id ?>">
	<input type='hidden' name='rm' value='2'>
    <input type="hidden" name="custom" value="<?php print $aid ?>">
    <input type="hidden" name="amount" value="<?php print $total ?>">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="<?php print $pcur ?>">
    <input type="hidden" name="handling" value="0">
	<input type="hidden" name="notify_url" value="https://worldprofit.club/2017/User/success.php?method=PAYPAL"> 

    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Pay <?php print $pcur; print $pprice ?> Via PayPal" >
        

		  </form>
		  <?php

} 
?>
		  </br>
		  </br>
		   <?php
 $query="SELECT count(*) FROM  paymentgateway where name='Payza' and status=1"; 
 
 $result = mysqli_query($con,$query);
 $row = mysqli_fetch_row($result);
$numrows = $row[0];


  
  
if($numrows==1) {
	?>
		  <form action="https://secure.payza.com/checkout" method="post">
    <input type="hidden" name="ap_merchant" value="<?php echo $payza_id; ?>">
    <input type="hidden" name="ap_purchasetype" value="service">
    <input type="hidden" name="ap_itemname" value="<?php print $pname ?>">
    <input type="hidden" name="ap_amount" value="<?php print $total ?>">
    <input type="hidden" name="ap_quantity" value="1">
    <input type="hidden" name="ap_currency" value="<?php print $pcur ?>">
    <input type="hidden" name="apc_1" value="<?php echo $aid ; ?>">
    <input type="hidden" name="ap_alerturl" value="https://worldprofit.club/2017/User/success.php?method=PAYZA">
    <input type="hidden" name="ap_ipnversion" value="2">	
	<input type="hidden" name="ap_itemcode" value="<?php print $id ?>">	
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Pay <?php print $pcur; print $pprice ?> Via Payza" >
</form>
	<?php

} 
?>  
     <br>
<br>
<?php
 $query="SELECT count(*) FROM  paymentgateway where name='SolidTrustPay' and status=1"; 
 
 $result = mysqli_query($con,$query);
 $row = mysqli_fetch_row($result);
$numrows = $row[0];


  
  
if($numrows==1) {
	?>

<form action="https://solidtrustpay.com/handle.php" method="post">
    <input type="hidden" name="merchantAccount" value="<?php echo $solidtrust_id; ?>">
    <input type="hidden" name="sci_name" value="<?php echo $solidbuttonname; ?>">
    <input type="hidden" name="currency" value="<?php print $pcur ?>">
    <input type="hidden" name="item_id" value="<?php print $id ?>">
    <input type="hidden" name="amount" value="<?php print $total ?>">
    <input type="hidden" name="notify_url" value="https://worldprofit.club/2017/User/success.php?method=SOLIDTRUSTPAY">
    <input type="hidden" name="user1" value="<?php echo $aid ; ?>">	
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Pay <?php print $pcur; print $pprice ?> Via SolidTrustPay" >
</form>
<?php

} 
?>
</br>
</br>
<?php
 $query="SELECT count(*) FROM  paymentgateway where name='Cash On Delivery' and status=1"; 
 
 $result = mysqli_query($con,$query);
 $row = mysqli_fetch_row($result);
$numrows = $row[0];


  
  
if($numrows==1) {
	?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Pay <?php print $pcur; print $pprice ?> Via Cash On delivery" >
</form>
<?php

} 
?>
  
    </section>
  </div>
</section>
<!-- footer -->
<footer id="footer">
  <div class="text-center padder clearfix">
    <p> <small><?php $query="SELECT footer from settings where sno=0"; 
 
 
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