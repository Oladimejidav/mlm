<?php
include_once ("z_db.php");
session_start();
$statusflag="OK";
$topstatus="Thank You For choosing again, but your account is not active yet ... ;)";
$substatus="You Order will be received in next step and now select available payment gateway(s) to Pay amount: ";
$userid=$_SESSION['paypalidsession'];
$renewpckid=$_SESSION['renewpckid'];

?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<style>html {
    overflow-y: scroll; 
}</style>
<meta charset="utf-8" />
<title>Select Payment Gateway</title>
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
<body style="overflow: scroll;" class="" background="images/login2.jpg">
<section id="content" class="m-t-lg wrapper-md animated fadeInDown">
  <div> <a class="navbar-brand block" ><?php print $topstatus ?></a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong><?php print $substatus ?></strong> </header>
      
	 <?php 
	 if($statusflag=="OK")
	 {
		 $query=mysqli_query($con,"update affiliateuser set renew='1' where username='$userid'");
	 $query="SELECT id,fname,email,doj,active,username,address,pcktaken,tamount FROM  affiliateuser where username = '$userid'"; 
 
 
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
 $query="SELECT * FROM  packages where id = $renewpckid"; 
 
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$pname="$row[name]";
	$pprice="$row[price]";
	$pcur="$row[currency]";
	$ptax="$row[tax]";
	$gatewayid="$row[gateway]";
	$total=$pprice+$ptax;
// "<option value='$id'>$pname | Price - $pcur $total </option>";
  
  }
  }
  ?>
                 
               <input type="hidden" value= <?php print $userid;?> name="renewusername"> 
			   <div align="center">
      <?php
	  
	  
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
 <?php $query="SELECT * FROM  packages where id = $renewpckid"; 
 
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
  /*
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
	<input type="hidden" name="notify_url" value="http://www.skyey.in/demo/cdecnyn/user/success.php?method=PAYPAL"> 

    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Pay <?php print $pcur; print $total ?> Via PayPal" >
        

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
    <input type="hidden" name="ap_alerturl" value="http://www.skyey.in/demo/cdecnyn/user/success.php?method=PAYZA">
    <input type="hidden" name="ap_ipnversion" value="2">	
	<input type="hidden" name="ap_itemcode" value="<?php print $id ?>">	
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Pay <?php print $pcur; print $$total ?> Via Payza" >
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
    <input type="hidden" name="notify_url" value="http://www.skyey.in/demo/cdecnyn/user/success.php?method=SOLIDTRUSTPAY">
    <input type="hidden" name="user1" value="<?php echo $aid ; ?>">	
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Pay <?php print $pcur; print $total ?> Via SolidTrustPay" >
</form>
<?php

} 
*/
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
<form action="renewgatewayck.php" method="post">
    <input type="hidden" name="renewgateway" value="2">
    <input type="hidden" name="renewusername" value="<?php print $userid ?>">
	<input type="hidden" name="renewpck" value="<?php print $id ?>">
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Pay <?php print $pcur; print $total ?> Via Cash On delivery" >
</form>
<?php

} 
?>
<?php
 $query222="SELECT tamount FROM  affiliateuser where username='$userid'"; 
 
 $result222 = mysqli_query($con,$query222);
 $row222 = mysqli_fetch_row($result222);
$totalamountcredit = $row222[0];


  
  
if($totalamountcredit>=$total and $total!=0) {
	?>
<form action="renewgatewayck.php" method="post">
    <input type="hidden" name="renewgateway" value="3">
    <input type="hidden" name="renewusername" value="<?php print $userid ?>">
	<input type="hidden" name="renewpck" value="<?php print $id ?>">
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Pay <?php print $pcur; print $total ?> Via Account Credit, Amount Will Be Deducted From Account Balance" >
</form>
<?php

} 
?>


                   
			 
      

		  
	  
       
    </section>
  </div>
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