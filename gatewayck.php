<?php
include_once ("z_db.php");
session_start();
if (!empty($_POST))
{
//Fetching Details for user, package and payment gateway
$pgateid=mysqli_real_escape_string($con,$_POST['paymentgateway']);
$userid=mysqli_real_escape_string($con,$_POST['username']);

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
	$gatewayid="$row[gateway]";
	$total=$pprice+$ptax;
// "<option value='$id'>$pname | Price - $pcur $total </option>";
  
  }
  
  // Details fetching end


if($pgateid==2)
{

$queryuser="SELECT id FROM  affiliateuser where username = '$userid'"; 
$resultuser = mysqli_query($con,$queryuser);

while($rowuser = mysqli_fetch_array($resultuser))
{
 $uaid="$rowuser[id]";
 }
			$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,cod) values('$uaid','C.O.D','$total','$pcur',NOW(),1)");
			
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

else if($pgateid==1)
{

$_SESSION['paypalidsession'] = $userid;

print "
				<script language='javascript'>
					window.location = 'thankyou.php?username=$userid';
				</script>
			";
}
}
?>