<?php
header( "refresh:3;url=pacsettings.php" );
session_start(); //starting session
include('z_db.php'); //connection details
$status = "OK"; //initial status
$msg="";
$pname=mysqli_real_escape_string($con,$_POST['pckname']); //fetching details through post method
$pdetail = mysqli_real_escape_string($con,$_POST['pckdetail']);
$pprice = mysqli_real_escape_string($con,$_POST['pckprice']);
$pcurid = mysqli_real_escape_string($con,$_POST['currency']);
$pckmpay = mysqli_real_escape_string($con,$_POST['pckmpay']);
$pcksbonus = mysqli_real_escape_string($con,$_POST['pcksbonus']);
$pcktax = mysqli_real_escape_string($con,$_POST['pcktax']);
$pact = mysqli_real_escape_string($con,$_POST['pckact']);
$pidmain = mysqli_real_escape_string($con,$_POST['pckmainid']);
$p1 = mysqli_real_escape_string($con,$_POST['lev1']);
$p2 = mysqli_real_escape_string($con,$_POST['lev2']);
$p3 = mysqli_real_escape_string($con,$_POST['lev3']);
$p4 = mysqli_real_escape_string($con,$_POST['lev4']);
$p5 = mysqli_real_escape_string($con,$_POST['lev5']);
$p6 = mysqli_real_escape_string($con,$_POST['lev6']);
$p7 = mysqli_real_escape_string($con,$_POST['lev7']);
$p8 = mysqli_real_escape_string($con,$_POST['lev8']);
$p9 = mysqli_real_escape_string($con,$_POST['lev9']);
$p10 = mysqli_real_escape_string($con,$_POST['lev10']);
$p11 = mysqli_real_escape_string($con,$_POST['lev11']);
$p12 = mysqli_real_escape_string($con,$_POST['lev12']);
$p13 = mysqli_real_escape_string($con,$_POST['lev13']);
$p14 = mysqli_real_escape_string($con,$_POST['lev14']);
$p15 = mysqli_real_escape_string($con,$_POST['lev15']);
$p16 = mysqli_real_escape_string($con,$_POST['lev16']);
$p17 = mysqli_real_escape_string($con,$_POST['lev17']);
$p18 = mysqli_real_escape_string($con,$_POST['lev18']);
$p19 = mysqli_real_escape_string($con,$_POST['lev19']);
$p20 = mysqli_real_escape_string($con,$_POST['lev20']);
$gateway = 0;
$renewdays = mysqli_real_escape_string($con,$_POST['renewdays']);

if ( strlen($pname) < 2 ){
$msg=$msg."Package Name Should Have Minimum 2 Characters.<BR>";
$status= "NOTOK";}

if ( strlen($pdetail) < 4 ){ //checking if body is greater then 4 or not
$msg=$msg."Package details must contain more than 4 char length.<BR>";
$status= "NOTOK";}

if($status=="OK")
{
$res1=mysqli_query($con,"update packages set name='$pname',price='$pprice',currency='$pcurid',details='$pdetail',tax='$pcktax',mpay='$pckmpay',sbonus='$pcksbonus',active='$pact',level1='$p1',level2='$p2',level3='$p3',level4='$p4',level5='$p5',level6='$p6',level7='$p7',level8='$p8',level9='$p9',level10='$p10',level11='$p11',level12='$p12',level13='$p13',level14='$p14',level15='$p15',level16='$p16',level17='$p17',level18='$p18',level19='$p19',level20='$p20',gateway='$gateway',validity='$renewdays' where id=$pidmain");

if($res1)
{
print "Package updated...!!! Redirecting...";
}
else
{
print "error!!!! try again later or ask for help from your administrator!!!! Redirecting...";
}


} 
else {
        
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>"; //printing errors
	 
}

?>
