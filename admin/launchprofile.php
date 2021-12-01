<?php
include_once ("z_db.php");
header( "refresh:1;url=users.php" );
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
$tomake= mysqli_real_escape_string($con,$_GET["username"]);

$query="SELECT * FROM  affiliateuser where username='$tomake'"; 
 
 
 $ri = mysqli_query($con,$query);
while($li = mysqli_fetch_array($ri))
{
	
	$lllaunch="$li[launch]";
	
	}
	
if ($lllaunch==0)
{

$r12=mysqli_query($con,"UPDATE affiliateuser SET active=1 WHERE username='$tomake'");
$s12=mysqli_query($con,"UPDATE affiliateuser SET launch=1 WHERE username='$tomake'");
if ($r12 || $s12)
{
//print "<center>Profile Activated<br/>Redirecting in 2 seconds...</center>";

$query="SELECT * FROM  affiliateuser where username='$tomake'"; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$id="$row[Id]";
	$username="$row[username]";
	$fname="$row[fname]";
	$email="$row[email]";
	$mobile="$row[mobile]";
	$active="$row[active]";
	$doj="$row[doj]";
	$country="$row[country]";
	$ear="$row[tamount]";
	$ref="$row[referedby]";
	$pck="$row[pcktaken]";
	
	
	if($active==1)
	{
	$status="Active/Paid";
	}
	else if($active==0)
	{
	$status="UnActive/Unpaid";
	}
	else
	{
	$status="Unknown";
	}
	
$qu="SELECT * FROM  packages where id = $pck"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$pckid="$r[id]";
	$pckname="$r[name]";
	$pckprice="$r[price]";
	$pckcur="$r[currency]";
	$pcksbonus="$r[sbonus]";
	$l1="$r[level1]";
	$l2="$r[level2]";
	$l3="$r[level3]";
	$l4="$r[level4]";
	$l5="$r[level5]";
	$l6="$r[level6]";
	$l7="$r[level7]";
	$l8="$r[level8]";
	$l9="$r[level9]";
	$l10="$r[level10]";
	$l11="$r[level11]";
	$l12="$r[level12]";
	$l13="$r[level13]";
	$l14="$r[level14]";
	$l15="$r[level15]";
	$l16="$r[level16]";
	$l17="$r[level17]";
	$l18="$r[level18]";
	$l19="$r[level19]";
	$l20="$r[level20]";
	$arr=array("$l1","$l2","$l3","$l4","$l5","$l6","$l7","$l8","$l9","$l10","$l11","$l12","$l13","$l14","$l15","$l16","$l17","$l18","$l19","$l20");
	
	
	$temp=$ref;
	$s102=mysqli_query($con,"UPDATE affiliateuser SET tamount=tamount+$pcksbonus WHERE username='$tomake'");
	$r123=mysqli_query($con,"UPDATE affiliateuser SET tamount= tamount+$arr[0] WHERE username='$temp'");
	for($i=1;$i<20;$i++)
	{
	
	$qexe="SELECT * FROM  affiliateuser where username='$temp'"; 
  $rexe = mysqli_query($con,$qexe);

while($ress = mysqli_fetch_array($rexe))
{
	$ans="$ress[referedby]";
}
	$r1234=mysqli_query($con,"UPDATE affiliateuser SET tamount= tamount+$arr[$i] WHERE username='$ans'");
	$temp=$ans;
	}
	
  }

}
}
}
else
{
Print "Not Found error...";
}
//else
//{
//print "<center>Action could not be performed, Something went wrong. Check back again<br/>Redirecting in 2 seconds...</center>";
//}

?>