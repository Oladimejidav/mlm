<?php
header( "refresh:2;url=renewpaymentscod.php" );
include_once ("z_db.php");
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
$userid= mysqli_real_escape_string($con,$_GET["username"]);
$query="SELECT id,fname,email,doj,active,username,address,pcktaken,tamount,expiry FROM  affiliateuser where username = '$userid'"; 
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
 $expiry="$row[expiry]";
 
}

$query ="SELECT * FROM paypalpayments WHERE orderid='$aid' and renew=1";
if ($stmt = mysqli_prepare($con, $query)) {

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

   $num=mysqli_stmt_num_rows($stmt);

    /* close statement */
    mysqli_stmt_close($stmt);
	}
if($num==1)	
{
$query="SELECT id,fname,email,doj,active,username,address,pcktaken,tamount,expiry FROM  affiliateuser where username = '$userid'"; 
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
 $expiry="$row[expiry]";
 
}
 
$query="SELECT * FROM  packages where id = $pck"; 
 
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
	$noofdays="$row[validity]";
// "<option value='$id'>$pname | Price - $pcur $total </option>";
  
  }
  
$s12=mysqli_query($con,"UPDATE affiliateuser SET tamount=$ear+$total WHERE username='$userid' and renew=1 and transacid='CREDIT'");
$result=mysqli_query($con,"UPDATE paypalpayments SET renew=3 WHERE orderid='$aid' and renew=1");
if ($result)
{
print "<center>Rejected...</center>";
}
else
{
print "<center>Action could not be performed, Something went wrong. Check back again<br/>Redirecting in 2 seconds...</center>";
}
}
else
{
print "Error!! Request Not Found, SomeThing Wrong Happened...";
}
?>