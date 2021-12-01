<?php
include_once ("z_db.php");
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        print "
				<script language='javascript'>
					window.location = 'index.php';
				</script>
			";
}
?>
		  <?php $query="SELECT id,fname,email,doj,active,username,address,pcktaken FROM  affiliateuser where username = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $aid="$row[id]";
 $regdate="$row[doj]";
 $name="$row[fname]";
 $address="$row[address]";
 $acti="$row[active]";
 $pck="$row[pcktaken]";
 
 }
 ?>
  
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Task</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<div id="google_translate_element" align="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
 <script type="text/javascript">
   function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
 </script>       
</head>
<body class="">
<section class="vbox">
  <header class="bg-primary header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="dashboard.php" class="navbar-brand"><img src="images/logo.png" class="m-r-sm"><?php $query="SELECT header from settings where sno=0"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$header="$row[header]";
	print $header;
	}
  ?></a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
  
    
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
      
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="images/a0.jpg"> </span> <?php
		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['username']."'";
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
          <li> <a href="notifications.php">Notifications </a> </li>
          <li> <a href="contact.php">Help</a> </li>
          <li class="divider"></li>
        <li> <a href="logout.php" >Logout</a> </li>
        </ul>
      </li>
    </ul>
  </header>
  <section>
    <section class="hbox stretch">
      <!-- .aside -->
      <aside class="bg-light aside-md hidden-print" id="nav">
        <section class="vbox">
          <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-color="#333333">
              <div class="clearfix wrapper dk nav-user hidden-xs">
                <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="images/a0.jpg"> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt"><?php
		 $sql="SELECT fname,country,pcktaken FROM  affiliateuser WHERE username='".$_SESSION['username']."'";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        print $row[0];
		$coun=$row[1];
		$pcktaken=$row[2];
		 $sql2="SELECT name FROM packages WHERE id=$pcktaken";
		 if ($result2 = mysqli_query($con, $sql2)) {
		  while ($row2 = mysqli_fetch_row($result2)) {
		 
		 $pkname=$row2[0];
		 }
		 }
		
    }

}

   
	   
	   ?></strong> <b class="caret"></b> </span> <span class="text-muted text-xs block"><?php print "$pkname Member"; ?></span> </span> </a>
                  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <span class="arrow top hidden-nav-xs"></span>
                    
                    <li> <a href="profile.php">Profile</a> </li>
                    <li> <a href="notifications.php"> Notifications </a> </li>
                    <li> <a href="contact.php">Help</a> </li>
                    <li class="divider"></li>
                    <li> <a href="logout.php" data-toggle="ajaxModal" >Logout</a> </li>
                  </ul>
                </div>
              </div>
              <!-- nav -->
              <nav class="nav-primary hidden-xs">
                <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                <ul class="nav nav-main" data-ride="collapse">
                  <li> <a href="dashboard.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Dashboard</span> </a> </li>
                  <li> <a href="profile.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Profile</span> </a> </li>
                  <li> <a href="task.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Task</span> </a> </li>
                  <li> <a href="submittask.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Submit Task</span> </a> </li>
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">Account</span> </a>
                    <ul class="nav dk">
                      <li > <a href="downline.php" class="auto"> <i class="i i-dot"></i> <span>Downline/Earnings</span> </a> </li>
                      
                      
                      
                      <li> <a href="invoice.php" class="auto"> <i class="i i-dot"></i> <span>Invoice/Account Status</span> </a> </li>
					  <li> <a href="paymentshistory.php" class="auto"> <i class="i i-dot"></i> <span>Payments History</span> </a> </li>
                      
                    </ul>
                  </li>
                  
                  <li class="active"> <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-grid2 icon"> </i> <span class="font-bold">Help</span> </a>
                    <ul class="nav dk">
                      <li class="active"  > <a href="notifications.php" class="auto"> <i class="i i-dot"></i> <span>Notifications</span> </a> </li>
                      <li > <a href="contact.php" class="auto"> <i class="i i-dot"></i> <span>Contact</span> </a> </li>
                    </ul>
                  </li>
                </ul>
                <div class="line dk hidden-nav-xs"></div>
                
                
              </nav>
              <!-- / nav -->
            </div>
          </section>
          <footer class="footer hidden-xs no-padder text-center-nav-xs"> <a href="logout.php" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a> <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
        </section>
      </aside>
      <!-- /.aside -->
      <section id="content">
        <section class="vbox bg-white">
		<section class="scrollable padder">
          <header class="header b-b b-light hidden-print">
            
            <p>Tasks</p>
          </header>
		  <div class="col-lg-12">
                <!-- .accordion -->
				<br/>
				<br/>
				<?php 
				$query="SELECT * FROM task where valid=1 ORDER BY id DESC"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $noid="$row[id2]";
 $noimage="$row[image]";
 $nobody="$row[body]";
 $nodate="$row[posteddate]";

				
				echo"
                <div class='panel-group m-b' id='accordion2'>
                  <div class='panel panel-default'>
                    <div id='collapseOne' class='panel-collapse in'>
                      <div class='panel-body text-sm'> <img src='admin/taskimg/".$row['image']."' >

                      </div>                  
                      <div class='panel-body text-sm' id='myInput'>$nobody <br><button>Copy text</button></div>
					  <div class='panel-body text-sm'><b>Posted by - </b>Admin on <b>$nodate </b></div>
                    </div>
                  </div>
				</div> ";
				}
				?>
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
<script src="js/app.plugin.js"></script>
</body>
</html>