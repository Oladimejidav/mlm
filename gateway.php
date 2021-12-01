<?php
include_once ("z_db.php");
if(isset($_GET["username"]))
$userid=mysqli_real_escape_string($con,$_GET["username"]);

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
<body style="overflow: scroll;" class="">
<section id="content" class="m-t-lg wrapper-md animated fadeInDown">
  <div> <a class="navbar-brand block" href="#">Thank You, but your account is not active yet ... ;)</a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong>You Order has been received and now select available payment gateway(s) to Pay amount: </strong> </header>
      
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
	$gatewayid="$row[gateway]";
	$total=$pprice+$ptax;
// "<option value='$id'>$pname | Price - $pcur $total </option>";
  
  }
  ?>
            <form action="gatewayck.php" method="post" name="gatewaysend">     
               <input type="hidden" value= <?php print $userid;?> name="username"> 
      <div class="list-group-item">
		  <label>
            Payment Option : 
		  <select name="paymentgateway" align="centre">
		  <?php 
		  
		  if($gatewayid=="1")
		 {
 $query="SELECT * FROM  paymentgateway where id='1'"; 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$pgid="$row[id]";
	$pgname="$row[Name]";
	$pgstatus="$row[status]";
	//$pprice="$row[price]";
	//$pcur="$row[currency]";
	//$ptax="$row[tax]";
//$total=$pprice+$ptax;
  print "<option value='$pgid'>$pgname</option>";
  
  }
  }
  
   if($gatewayid=="2")
		 {
 $query="SELECT * FROM  paymentgateway where id='2'"; 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	print $pgid="$row[id]";
	$pgname="$row[Name]";
	$pgstatus="$row[status]";
	//$pprice="$row[price]";
	//$pcur="$row[currency]";
	//$ptax="$row[tax]";
//$total=$pprice+$ptax;
  print "<option value='$pgid'>$pgname</option>";
  
  }
  }
   if($gatewayid=="3")
		 {
 $query="SELECT * FROM  paymentgateway "; 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	print $pgid="$row[id]";
	$pgname="$row[Name]";
	$pgstatus="$row[status]";
	//$pprice="$row[price]";
	//$pcur="$row[currency]";
	//$ptax="$row[tax]";
	//$total=$pprice+$ptax;
  print "<option value='$pgid'>$pgname</option>";
  }
  }
?>
 
</select>
</label> 
</div>                   
			 
<div style="width:100%;height:100%;position:absolute;vertical-align:middle;text-align:center;">
    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Click me to make payment of <?php print $pcur; print $pprice+$ptax ?> for order id #<?php print $aid ?> and your username -  <?php print $userid ?>" >
</div>          

		  </form>
	  
       
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