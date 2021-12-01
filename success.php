<?php
include_once ("z_db.php");
// Load the language file for messages, etc.

// Load the PHPMailer library for send mails.
session_start();
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit('Sorry, this script does not run on a PHP version smaller than 5.3.7!');
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // If you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    //require_once('libraries/password_compatibility_library.php');
}

else
{
$msg=" Please wait we are processing your request, Do not refresh or click back on this page ";
$msg2="This may take a while....";
}
?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>
<style>html {
    overflow-y: scroll; 
}</style>
<meta charset="utf-8" />
<title>Thank You</title>
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
  <div> <a class="navbar-brand block"><?php print $msg; ?> </a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong><?php print $msg2 ?> </strong> </header>
	  <h3> Do not click refresh or back button, we are processing your transaction. You will be redirected automatically. If you find any error below then the transcation may have declained and you need to contact your administrator.<h3/>
	  
	  <?php
	  
	  if(mysqli_real_escape_string($con,$_GET['method']) == "PAYPAL") {
	
	$req = 'cmd=_notify-validate';

  foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
  }

  //Set up the acknowledgement request headers
  $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
  $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
  $header .= "Host: www.paypal.com\r\n";
  $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

  //Open a socket for the acknowledgement request
  $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

  // Post request back to PayPal for validation
  fputs ($fp, $header . $req);


while (!feof($fp)) {                     // While not EOF
    $res = fgets ($fp, 1024);              // Get the acknowledgement response

if (strcmp ($res, "VERIFIED") == 0) {  // Response is VERIFIED


//print "This is right. wohhooooo"; 

$product  = $_POST['item_number'];
$product_transaction = $_POST['txn_id'];
$product_price = $_POST['mc_gross'];
$product_currency = $_POST['mc_currency'];
$payment_date = $_POST['payment_date'];
$merchant = $_POST['receiver_email'];
$user = $_POST['custom'];

$query2="SELECT id,fname,email,doj,active,username,address,pcktaken,renew FROM  affiliateuser where Id = '$user'"; 
 
 
 $result2 = mysqli_query($con,$query2);

while($row2 = mysqli_fetch_array($result2))
{
 $aid="$row2[id]";
 $regdate="$row2[doj]";
 $name="$row2[fname]";
 $address="$row2[address]";
 $acti="$row2[active]";
 $pck="$row2[pcktaken]";
 $renewstatus="$row2[renew]";
 
 }
 $query3="SELECT id,name,price,currency,tax FROM  packages where id='$pck'";
 
 
 $result3 = mysqli_query($con,$query3);

while($row3 = mysqli_fetch_array($result3))
{
	$id="$row3[id]";
  $pname="$row3[name]";
	$pprice="$row3[price]";
	$pcur="$row3[currency]";
	$ptax="$row3[tax]";
$total=$pprice+$ptax;
  }

if($pprice == $product_price && $product_currency == $pcur) {	

$date = date("Y-m-d");
$result = mysqli_query($con,"SELECT count(*) FROM  paypalpayments where transacid = '$product_transaction'");
$row = mysqli_fetch_row($result);
print $numrows = $row[0];
if ($numrows==0)
{
$status= "OK";
}
else
{
$status="NOTOK";
}
print "status=".$status;
	if ($status= "OK")
{

	if($renewstatus==1)
	{
		
	$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,pckid,gateway,renacid,renew) values('$user','$product_transaction','$product_price','$product_currency','$payment_date','$product','Paypal','$pck',1)") and $query15=mysqli_query($con,"UPDATE affiliateuser SET active=1 and renew=0 WHERE id=$aid");	
	}
	else{
	$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,pckid,gateway) values('$user','$product_transaction','$product_price','$product_currency','$payment_date','$product','Paypal')") and $query15=mysqli_query($con,"UPDATE affiliateuser SET active=1 WHERE id=$aid");	
	}

	if(1==1)
	{
$sqlquery="SELECT wlink FROM settings where sno=0"; //fetching website from databse
$rec2=mysqli_query($con,$sqlquery);
$row2 = mysqli_fetch_row($rec2);
$wlink=$row2[0]; //assigning website address

$sqlquery222="SELECT email FROM settings where sno=0"; //fetching website from databse
$rec3=mysqli_query($con,$sqlquery222);
$row222 = mysqli_fetch_row($rec3);
$email=$row222[0]; //assigning website address

$sqlquery111="SELECT etext FROM emailtext where code='NEWMEMBER'"; //fetching email text from databse
$rec2111=mysqli_query($con,$sqlquery111);
$row2111 = mysqli_fetch_row($rec2111);
$emailtext=$row2111[0]; //assigning email text for email
		// More headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
$to=$email;
$subject="New Paypal Order | Bingo ";
$message=$emailtext;
mail($to,$subject,$message,$headers);
		
    print "
				<script language='javascript'>
					window.location = 'finalthankyou.php';
				</script>
			";
}
}
}
}
 elseif (strcmp ($res, "INVALID") == 0) { // Response is INVALID

      echo 'Invalid payment response, your request has been discarded, this may happen due to invalid details of payment or your ayment already processed. Contcat Administrator For more details.';

    }
}
  fclose ($fp);	
	  





	  }

elseif(mysqli_real_escape_string($con,$_GET['method']) == "PAYZA") {
	
define("IPN_V2_HANDLER", "https://secure.payza.com/ipn2.ashx");
define("TOKEN_IDENTIFIER", "token=");

$token = urlencode($_POST['token']);
$token = TOKEN_IDENTIFIER.$token;

$response = '';	
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, IPN_V2_HANDLER);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $token);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
	
if(strlen($response) > 0) {
	
if(urldecode($response) != "INVALID TOKEN")	{
	
$response = urldecode($response);
$aps = explode("&", $response);	
$info = array();

foreach ($aps as $ap) {
$ele = explode("=", $ap);
$info[$ele[0]] = $ele[1];
}

$date = date("Y-m-d");
$user = $info['apc_1'];
$totalAmountReceived = $info['ap_totalamount'];
$currency = $info['ap_currency'];
$myItemCode = $info['ap_itemcode'];
$transactionDate = $info['ap_transactiondate'];
$transactionReferenceNumber = $info['ap_referencenumber'];

$query2="SELECT id,fname,email,doj,active,username,address,pcktaken,renew FROM  affiliateuser where Id = '$user'"; 
 
 
 $result2 = mysqli_query($con,$query2);

while($row2 = mysqli_fetch_array($result2))
{
 $aid="$row2[id]";
 $regdate="$row2[doj]";
 $name="$row2[fname]";
 $address="$row2[address]";
 $acti="$row2[active]";
 $pck="$row2[pcktaken]";
 $renewstatus="$row2[renew]";
 }
 $query3="SELECT id,name,price,currency,tax FROM  packages where id='$pck'";
 
 
 $result3 = mysqli_query($con,$query3);

while($row3 = mysqli_fetch_array($result3))
{
	$id="$row3[id]";
	$pname="$row3[name]";
	$pprice="$row3[price]";
	$pcur="$row3[currency]";
	$ptax="$row3[tax]";
$total=$pprice+$ptax;
  }

if($pprice == $totalAmountReceived && $currency == $pcur) {	

$date = date("Y-m-d");
$result = mysqli_query($con,"SELECT count(*) FROM  paypalpayments where transacid = '$transactionReferenceNumber'");
$row = mysqli_fetch_row($result);
$numrows = $row[0];
if ($numrows==0)
{
$status= "OK";
}
else
{
$status="NOTOK";
}
	if ($status= "OK")
{
	if($renewstatus==1)
	{
		
	$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,pckid,gateway,renacid,renew) values('$user','$product_transaction','$product_price','$product_currency','$payment_date','$product','Payza','$pck',1)") and $query15=mysqli_query($con,"UPDATE affiliateuser SET active=1 and renew=0 WHERE id=$aid");	
	}
	else{
	$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,pckid,gateway) values('$user','$transactionReferenceNumber','$totalAmountReceived','$currency','$transactionDate','$myItemCode','Payza')") and $query15=mysqli_query($con,"UPDATE affiliateuser SET active=1 WHERE id=$aid");	
	}

	if(1==1)
	{
		$sqlquery="SELECT wlink FROM settings where sno=0"; //fetching website from databse
$rec2=mysqli_query($con,$sqlquery);
$row2 = mysqli_fetch_row($rec2);
$wlink=$row2[0]; //assigning website address

$sqlquery222="SELECT email FROM settings where sno=0"; //fetching website from databse
$rec3=mysqli_query($con,$sqlquery222);
$row222 = mysqli_fetch_row($rec3);
$email=$row222[0]; //assigning website address

$sqlquery111="SELECT etext FROM emailtext where code='NEWMEMBER'"; //fetching email text from databse
$rec2111=mysqli_query($con,$sqlquery111);
$row2111 = mysqli_fetch_row($rec2111);
$emailtext=$row2111[0]; //assigning email text for email
		// More headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
$to=$email;
$subject="New Payza Order | Bingo ";
$message=$emailtext;
mail($to,$subject,$message,$headers);
		
    print "
				<script language='javascript'>
					window.location = 'finalthankyou.php';
				</script>
			";
}
}
}	
}	
}	
}

elseif(mysqli_real_escape_string($con,$_GET['method']) == "SOLIDTRUSTPAY") {
	
//$sci_pwd = $paymentProcessors['STPButtonPWD'];

$query="SELECT solidbutton FROM  settings where sno=0"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$sci_pwd="$row[solidbutton]";
	}

$sci_pwd = md5($sci_pwd.'s+E_a*');
$hash_received = MD5($_POST['tr_id'] . ":" . MD5($sci_pwd) . ":" . $_POST['amount'] . ":" . $_POST['merchantAccount'] . ":" . $_POST['payerAccount']);

if($hash_received == $_POST['hash']) {

$user = mysqli_real_escape_string($con,$_POST['user1']);
$trst_amount=mysqli_real_escape_string($con,$_POST['amount']);
$trst_itemid=mysqli_real_escape_string($con,$_POST['item_id']);
$trst_trid=mysqli_real_escape_string($con,$_POST['tr_id']);
$trDate=mysqli_real_escape_string($con,$_POST['date']);
$currency=mysqli_real_escape_string($con,$_POST['currency']);


$date = date("Y-m-d");

$query2="SELECT id,fname,email,doj,active,username,address,pcktaken,renew FROM  affiliateuser where Id = '$user'"; 
 
 
 $result2 = mysqli_query($con,$query2);

while($row2 = mysqli_fetch_array($result2))
{
 $aid="$row2[id]";
 $regdate="$row2[doj]";
 $name="$row2[fname]";
 $address="$row2[address]";
 $acti="$row2[active]";
 $pck="$row2[pcktaken]";
 $renewstatus="$row2[renew]";
 }
 $query3="SELECT id,name,price,currency,tax FROM  packages where id='$pck'";
 
 
 $result3 = mysqli_query($con,$query3);

while($row3 = mysqli_fetch_array($result3))
{
	$id="$row3[id]";
	$pname="$row3[name]";
	$pprice="$row3[price]";
	$pcur="$row3[currency]";
	$ptax="$row3[tax]";
$total=$pprice+$ptax;
  }

if($pprice == $trst_amount && $currency == $pcur) {	

$date = date("Y-m-d");
$result = mysqli_query($con,"SELECT count(*) FROM  paypalpayments where transacid = 'trst_trid'");
$row = mysqli_fetch_row($result);
$numrows = $row[0];
if ($numrows==0)
{
$status= "OK";
}
else
{
$status="NOTOK";
}
	if ($status= "OK")
{
	if($renewstatus==1)
	{
		
	$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,pckid,gateway,renacid,renew) values('$user','$product_transaction','$product_price','$product_currency','$payment_date','$product','SolidTrustPay','$pck',1)") and $query15=mysqli_query($con,"UPDATE affiliateuser SET active=1 and renew=0 WHERE id=$aid");	
	}
	else{
	
$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,pckid,gateway) values('$user','$trst_trid','$trst_amount','$currency','$trDate','$trst_itemid','SolidTrustPay')") and $query15=mysqli_query($con,"UPDATE affiliateuser SET active=1 WHERE id=$aid");	
	}
	

	if(1==1)
	{
		$sqlquery="SELECT wlink FROM settings where sno=0"; //fetching website from databse
$rec2=mysqli_query($con,$sqlquery);
$row2 = mysqli_fetch_row($rec2);
$wlink=$row2[0]; //assigning website address

$sqlquery222="SELECT email FROM settings where sno=0"; //fetching website from databse
$rec3=mysqli_query($con,$sqlquery222);
$row222 = mysqli_fetch_row($rec3);
$email=$row222[0]; //assigning website address

$sqlquery111="SELECT etext FROM emailtext where code='NEWMEMBER'"; //fetching email text from databse
$rec2111=mysqli_query($con,$sqlquery111);
$row2111 = mysqli_fetch_row($rec2111);
$emailtext=$row2111[0]; //assigning email text for email
		// More headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
$to=$email;
$subject="New SolidTrustPay Order | Bingo ";
$message=$emailtext;
mail($to,$subject,$message,$headers);
		
    print "
				<script language='javascript'>
					window.location = 'finalthankyou.php';
				</script>
			";
}
}
}	


}
	
	
	
}
elseif($_GET['method'] == " ")
{
	
	print "Invalid parameters";
	
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