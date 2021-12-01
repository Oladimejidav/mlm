<?php
//header( "refresh:1;url=renewpaymentscod.php" );
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
if($num>=1)	
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

//Fetching new package id from paypalayment table to upgrade new package


$query222 ="SELECT * FROM paypalpayments WHERE orderid='$aid' and renew=1"; 
$result222 = mysqli_query($con,$query222);

while($row = mysqli_fetch_array($result222))
{
 $newpackageid="$row[renacid]";
 }

//end
 
$query="SELECT * FROM  packages where id = $newpackageid"; 
 
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

$result=mysqli_query($con,"UPDATE paypalpayments SET renew=2 WHERE orderid='$aid' and renew=1");
if ($result)
{
print $current_date=date("Y/m/d");
$newdate=date('Y-m-d', strtotime($current_date. '+ '.$noofdays.'days'));
$result=mysqli_query($con,"UPDATE affiliateuser SET expiry='$newdate', pcktaken='$newpackageid' WHERE username='$userid'");

print "<center>Expiry Date Updated, Account has been upgraded for $userid <br/>";
//customized Code
$s12=mysqli_query($con,"UPDATE affiliateuser SET launch=0 WHERE username='$userid'");
print "<a href='launchprofile.php?username=$userid' class='btn btn-default btn-sm'>Add Signup Bonus And Credit Referral bonuses if any.</a></center>";
//customized Code ends

}
else
{
print "<center>Action could not be performed, Something went wrong. Check back again<br/>Redirecting in 2 seconds...</center>";
}
}
else
{
print "Request Not Found";
}
?>