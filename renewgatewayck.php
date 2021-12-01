<?php
include_once ("z_db.php");
if (!empty($_POST))
{
	$errorstatus=0;
	//Fetching Details for user, package and payment gateway
$pgateid=mysqli_real_escape_string($con,$_POST['renewgateway']);
$userid=mysqli_real_escape_string($con,$_POST['renewusername']);
$renewpckid=mysqli_real_escape_string($con,$_POST['renewpck']);

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
 $useridorderid="$row[username]";
	$errormsg="";
	$query2 ="SELECT * FROM paypalpayments WHERE (orderid = '" . mysqli_real_escape_string($con,$useridorderid) . "') AND (renew = '" . mysqli_real_escape_string($con,"1") . "')";

if ($stmt2 = mysqli_prepare($con, $query2)) {

    /* execute query */
    mysqli_stmt_execute($stmt2);

    /* store result */
    mysqli_stmt_store_result($stmt2);

    $num2=mysqli_stmt_num_rows($stmt2);

    /* close statement */
    mysqli_stmt_close($stmt2);
	if($num2!=0)
	{
		$errorstatus=1;
	print $errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Acount Renew Request Already Pending. Multiple Requests Are Not Allowed.</div>"; //printing error if found in validation
			
	}
	
}
if($errorstatus==0)
{
	


//Fetching Details for user, package and payment gateway
$pgateid=mysqli_real_escape_string($con,$_POST['renewgateway']);
$userid=mysqli_real_escape_string($con,$_POST['renewusername']);
$renewpckid=mysqli_real_escape_string($con,$_POST['renewpck']);

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
 <?php $query="SELECT * FROM  packages where id = $renewpckid"; 
 
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

$queryuser="SELECT Id FROM  affiliateuser where username = '$userid'"; 
$resultuser = mysqli_query($con,$queryuser);

while($rowuser = mysqli_fetch_array($resultuser))
{
 $uaid="$rowuser[Id]";
 }
			$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,cod,renew,renacid,pckid,gateway) values('$uaid','C.O.D','$total','$pcur',NOW(),1,1,$renewpckid,0,'N.A')");
			print "
				<script language='javascript'>
					window.location = 'finalthankyoufree.php?username=$userid';
				</script>
			"; 
}
if($pgateid==3)
{

$queryuser="SELECT id FROM  affiliateuser where username = '$userid'"; 
$resultuser = mysqli_query($con,$queryuser);

while($rowuser = mysqli_fetch_array($resultuser))
{
 $uaid="$rowuser[id]";
 }
			$s12=mysqli_query($con,"UPDATE affiliateuser SET tamount=$ear-$total WHERE username='$userid'");
			$query=mysqli_query($con,"insert into paypalpayments(orderid,transacid,price,currency,date,cod,renew,renacid,pckid,gateway) values('$uaid','CREDIT','$total','$pcur',NOW(),1,1,$renewpckid,0,'N.A')");
			print "
				<script language='javascript'>
					window.location = 'finalthankyoufree.php?username=$userid';
				</script>
			"; 
}
}
}
}
else
{
print "
				<script language='javascript'>
					window.location = 'renewaccount.php';
				</script>
			";
}
?>