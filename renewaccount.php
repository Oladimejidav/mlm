<?php
include_once ("z_db.php");

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['renewusername']) && isset($_POST['renewtodo']))
{

$errorstatus=0;
$userid=mysqli_real_escape_string($con,$_POST["renewusername"]);
$renewpckid=mysqli_real_escape_string($con,$_POST["package"]);
$query ="SELECT Id FROM affiliateuser WHERE (username = '" . mysqli_real_escape_string($con,$_POST['renewusername']) . "') AND (level = '" . mysqli_real_escape_string($con,"2") . "')";
if ($stmt = mysqli_prepare($con, $query)) {

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

    $num=mysqli_stmt_num_rows($stmt);

    /* close statement */
    mysqli_stmt_close($stmt);
	if ($result=mysqli_query($con,$query))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    $useridorderid=$row[0];
    }
  }
	
	if($num==0)
	{
		$errorstatus=1;
	$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Username Not Found, Try Again </div>"; //printing error if found in validation
			
	}
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
	$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Acount Renew Request Already Pending. Multiple Requests Are Not Allowed.</div>"; //printing error if found in validation
			
	}
	
}
}

if($errorstatus==0)
	{	
		session_start();
		$_SESSION['paypalidsession'] = $userid;
		$_SESSION['renewpckid'] = $renewpckid;

	
	print "
				<script language='javascript'>
					window.location = 'renewgateway.php?username=$userid';
				</script>
			";
	
	}
}


?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Renew Account</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<style type="text/css">html {
    overflow-y: scroll;
background: url(images/login2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

</style>
<div id="google_translate_element" align="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
</head>
<body>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
  <div class="container aside-xl"> <a class="navbar-brand block" href="index.php">Renew Account </a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong>Enter Username To Renew Account</strong> </header>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
        <div class="list-group">
		<input type="hidden" name="renewtodo" value="post">
		<?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
						{
						print $errormsg;
						}
						?>
          <div class="list-group-item">
            <input type="text" placeholder="Registered Username" class="form-control no-border" name="renewusername" required>
          </div>
		  
		  <div class="list-group-item">
		  <label>
            Select Package : 
		  <select name="package" required>
		  <?php $query="SELECT id,name,price,currency,tax FROM  packages"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$pname="$row[name]";
	$pprice="$row[price]";
	$pcur="$row[currency]";
	$ptax="$row[tax]";
$total=$pprice+$ptax;
  print "<option value='$id'>$pname | Price - $pcur $total </option>";
  
  }
  ?>
 
</select>
</label> 
</div>
          
        </div>
		        <button type="submit" class="btn btn-lg btn-primary btn-block">Send Renew Request For My Account</button>
        <div class="text-center m-t m-b"><a href="index.php"><small style="color:#ffffff;">Login Now</small></a></div>
        <div class="line line-dashed"></div>
        <p class="text-center m-t m-b"><a href="#"><small style="color:#ffffff;">Don't Have Account?</small></a></p>
        <a href="signup.php" class="btn btn-lg btn-default btn-block">Create an account</a>
      </form>
    </section>
  </div>
</section>
<!-- footer -->
<footer id="footer">
  <div class="text-center padder">
     <p> <small style="color:#ffffff;"><?php $query="SELECT footer from settings where sno=0"; 
 
 
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