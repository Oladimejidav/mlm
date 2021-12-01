<?php
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

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todoemail']))
{

$suemail=mysqli_real_escape_string($con,$_POST['signuptextarea']);
$fpemail=mysqli_real_escape_string($con,$_POST['forgottextarea']);


$status = "OK";
$msg="";

if ( $suemail=="" ){
$msg=$msg."Email content can not be empty.<BR>";
$status= "NOTOK";}

if ( $fpemail=="" ){
$msg=$msg."Email content can not be empty.<BR>";
$status= "NOTOK";}	

if ($status=="OK") 
{
$query1=mysqli_query($con,"update emailtext set etext='$suemail' where code='SIGNUP'");
$query2=mysqli_query($con,"update emailtext set etext='$fpemail' where code='FORGOTPASSWORD'");
$errormsg= "
<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Bingo!</br></strong>Youe E-Mail settings Have Been Updated.</div>"; //printing error if found in validation

}

else
{ 
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
					
}





}


?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Email Configuration</title>
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
<body class="">
<section class="vbox">
  <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="dashboard.php" class="navbar-brand"><img src="images/logo.png" class="m-r-sm">Skyey</a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
  
    
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
      
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/a0.jpg"> </span> <?php
		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['adminidusername']."'";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        print $row[0];
    }

}

   
	   
	   ?> <b class="caret"></b> </a>
       <ul class="dropdown-menu animated fadeInRight">
          <span class="arrow top"></span>
          <li> <a href="profile.php">Profile</a> </li>
          <li class="divider"></li>
         <li> <a href="logout.php" >Logout</a> </li>
        </ul>
      </li>
    </ul>
  </header>
  <section>
    <section class="hbox stretch">
      <!-- .aside -->
      <?php include 'aside.php'; ?>
      <!-- /.aside -->
      <section id="content">
        <section class="vbox">
          <header class="header bg-white b-b b-light">
            <p><strong>Important Instructions </strong> <b>1.</b> All Details Are Mandatory. <b>2. </b>Please write email body to be sent in email during events. <b>3.</b></p>
          </header>
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> General Settings </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab"> Settings</a></li>
                      <?php 
					  
					  $query="SELECT * FROM  emailtext WHERE code='SIGNUP'"; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$signupetext="$row[etext]";
	
	}
					  
					  ?>  
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
                      <input type="hidden" name="todoemail" value="post">
					    <?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
						{
						print $errormsg;
						}
						?>
					  <div class="form-group">
                            <label>Sign Up E-Mail Body</label>
                            <textarea class="form-control" rows="6" data-minwords="6" data-required="true" placeholder="Type your message" name="signuptextarea"><?php print $signupetext;?></textarea>
                          </div>
						   <?php 
					  
					  $query="SELECT * FROM  emailtext WHERE code='FORGOTPASSWORD'"; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$forgottext="$row[etext]";
	
	}
					  
					  ?>  
						   <div class="line line-dashed b-b line-lg pull-in"></div>
						  <div class="form-group">
                            <label>Forgot Password Request E-Mail Body</label>
                            <textarea class="form-control" rows="6" data-minwords="6" data-required="true" placeholder="Type your message" name=forgottextarea><?php print $forgottext;?></textarea>
                          </div>
					 
					  
					  
					  
</div>
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">I Have Filled And Checked All Details. Update/Edit Details For Me Now.</button>
                    </form>
                  </div>
					  
					  </div>
                      
                      
                      
                    </div>
                  </div>
                </section>
                </section>
                
              </div>
            </div>
          </section>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
    </section>
  </section>
</section>
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>