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
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Downline</title>
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
          <li> <a href="notifications.php"> Notifications </a> </li>
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

//customized Code Part 1 Start
//fetching level settings
  $qu="SELECT * FROM  packages where id = $pcktaken"; 
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
//fetching elevl settings ends
//Customiezed Code Part 1 Ends
}	
	   ?></strong> <b class="caret"></b> </span> <span class="text-muted text-xs block"><?php print "$pkname Member"; ?></span> </span> </a>
                  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <span class="arrow top hidden-nav-xs"></span>
                 
                    <li> <a href="profile.php">Profile</a> </li>
                    <li> <a href="notifications.php">Notifications </a> </li>
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
                  <li class="active" > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">Account</span> </a>
                    <ul class="nav dk">
                      <li class="active" > <a href="downline.php" class="auto"> <i class="i i-dot"></i> <span>Downline/Earnings</span> </a> </li>
                      
                      
                      
                      <li> <a href="invoice.php" class="auto"> <i class="i i-dot"></i> <span>Invoice/Account Status</span> </a> </li>
					  <li> <a href="paymentshistory.php" class="auto"> <i class="i i-dot"></i> <span>Payments History</span> </a> </li>
                      
                    </ul>
                  </li>
                  
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-grid2 icon"> </i> <span class="font-bold">Help</span> </a>
                    <ul class="nav dk">
                      <li > <a href="notifications.php" class="auto"> <i class="i i-dot"></i> <span>Notifications</span> </a> </li>
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
        <section class="vbox">
          <header class="header bg-white b-b b-light">
            <p><strong>Downline | </strong>Red = Unverified/Unpaid Account  AND Green = Verified/Paid Account</p>
          </header>
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> Your Referral List </header>
                  <ul class="list-group alt">
				  <div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 1</h4>
				  
									  
				  </div>
				  <!-- Started Fetching Downline Of User-->
					<?php 
  

$totalref=0;
$totalrefear=0;
$query="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
  $result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
	$pcktook="$row[pcktaken]";
	$qu="SELECT level1 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll1="$r[0]";
}
if ($ac==1)
{
$status="success";
$totalrefear=$totalrefear+$ll1;
}
else
{
$status="danger";
}

  echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row[email]</small> <br><small class='text-muted'>Registration Date : $row[doj] </small><br></small></div>
                      </div>
                    </li> ";
  
  
  }

 
print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>
			  
			  
			  
			  <div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 2</h4></div>
				  <!-- Started Fetching Downline Of User-->
				  
<?php 
$totalrefear=0;
$query="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);

while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $pcktook="$row22[pcktaken]";
	$qu="SELECT level2 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll2="$r[0]";
}
if ($ac2==1)
{
$status2="success";
$totalrefear=$totalrefear+$ll2;
}
else
{
$status2="danger";
}


  echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status2 m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row22[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row22[email]</small> <br><small class='text-muted'>Registration Date : $row22[doj] </small><br>Referred By - $row[fname]</small></div>
                      </div>
                    </li> ";
  
  
  }

 }
 print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>
			  
			  		  <div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 3</h4></div>
				  <!-- Started Fetching Downline Of User-->
					<?php 
					
$totalrefear=0;					
$query="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 $pcktook="$row33[pcktaken]";
	$qu="SELECT level3 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll3="$r[0]";
}
if ($ac3==1)
{
$status3="success";
$totalrefear=$totalrefear+$ll3;
}
else
{
$status3="danger";
}

  echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status3 m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row33[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row33[email]</small> <br><small class='text-muted'>Registration Date : $row33[doj] </small><br>Referred By - $row22[fname]</small></div>
                      </div>
                    </li> ";
  
  
  }

 }
 }
  print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>
			  
			  
			  <div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 4</h4></div>
				  <!-- Started Fetching Downline Of User-->
					<?php 
$totalrefear=0;
					
					$query="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $pcktook="$row44[pcktaken]";
	$qu="SELECT level4 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll4="$r[0]";
}
 
if ($ac4==1)
{
$status4="success";
$totalrefear=$totalrefear+$ll4;
}
else
{
$status4="danger";
}

echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status4 m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row44[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row44[email]</small> <br><small class='text-muted'>Registration Date : $row44[doj] </small><br>Referred By - $row33[fname]</small></div>
                      </div>
                    </li> ";
  
  
  }

 }
 }
 }
 print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>
			  
			  
			  <div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 5</h4></div>
				  <!-- Started Fetching Downline Of User-->
					<?php 

$totalrefear=0;
					$query="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{

$ac5="$row55[active]";
 $countusername5="$row55[username]";
 $pcktook="$row55[pcktaken]";
$qu="SELECT level5 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll5="$r[0]";
}
 
if ($ac5==1)
{
$status5="success";
$totalrefear=$totalrefear+$ll5;
}
else
{
$status5="danger";
}


  echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status5 m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row55[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row55[email]</small> <br><small class='text-muted'>Registration Date : $row55[doj] </small><br>Referred By - $row44[fname]</small></div>
                      </div>
                    </li> ";
  
  
  }
}
 }
 }
 }
 print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>
			  
			    <div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 6</h4></div>
				  <!-- Started Fetching Downline Of User-->
					<?php 
$totalrefear=0;					
$query="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $pcktook="$row66[pcktaken]";
$qu="SELECT level6 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll6="$r[0]";
}
  
if ($ac6==1)
{
$status6="success";
$totalrefear=$totalrefear+$ll6;
}
else
{
$status6="danger";
}

  echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status6 m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row66[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row66[email]</small> <br><small class='text-muted'>Registration Date : $row66[doj] </small><br>Referred By - $row55[fname]</small></div>
                      </div>
                    </li> ";
  
  
  }
  }
}
 }
 }
 }
  print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>
			  
			  
			  			    <div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 7</h4></div>
				  <!-- Started Fetching Downline Of User-->
					<?php 
$totalrefear=0;					
$query="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
	$ac7="$row77[active]";
 $countusername7="$row77[username]";
 $pcktook="$row77[pcktaken]";
$qu="SELECT level7 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll7="$r[0]";
}
  
if ($ac7==1)
{
$status7="success";
$totalrefear=$totalrefear+$ll7;
}
else
{
$status7="danger";
}

  echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status7 m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row77[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row77[email]</small> <br><small class='text-muted'>Registration Date : $row77[doj] </small><br>Referred By - $row66[fname]</small></div>
                      </div>
                    </li> ";
  
}
  }
  }
}
 }
 }
 }
  print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>
			  			    <div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 8</h4></div>
				  <!-- Started Fetching Downline Of User-->
					<?php 
$totalrefear=0;					
$query="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[username]";
	$query88="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	$ac8="$row88[active]";
 $countusername8="$row88[username]";
 $pcktook="$row88[pcktaken]";
$qu="SELECT level8 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll8="$r[0]";
}
  
if ($ac8==1)
{
$status8="success";
$totalrefear=$totalrefear+$ll8;
}
else
{
$status8="danger";
}

  echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status8 m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row88[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row88[email]</small> <br><small class='text-muted'>Registration Date : $row88[doj] </small><br>Referred By - $row77[fname]</small></div>
                      </div>
                    </li> ";
} 
}
  }
  }
}
 }
 }
 }
  print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>			  
			  
			  
			  
			  
			  
			  
			 
<!-- End Fetching Downline Of User-->
                    
                    
                   
				    <div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 9</h4></div>
				  <!-- Started Fetching Downline Of User-->
					<?php 
$totalrefear=0;					
$query="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[username]";
	$query88="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	
 $countusername8="$row88[username]";
 $query99="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername8'"; 
 $result99 = mysqli_query($con,$query99);
 while($row99 = mysqli_fetch_array($result99))
{
	
 $countusername9="$row99[username]";
 
 $ac9="$row99[active]";
 $pcktook="$row99[pcktaken]";
$qu="SELECT level9 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll9="$r[0]";
}
  
if ($ac9==1)
{
$status9="success";
$totalrefear=$totalrefear+$ll9;
}
else
{
$status9="danger";
}

  echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status9 m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row99[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row99[email]</small> <br><small class='text-muted'>Registration Date : $row99[doj] </small><br>Referred By - $row88[fname]</small></div>
                      </div>
                    </li> ";
}
} 
}
  }
  }
}
 }
 }
 }
  print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>			  
			  
			  
			  
			  
			  
			  
			 
<!-- End Fetching Downline Of User-->

<div class="col-lg-3">
                <section class="panel panel-default">
                  <div class="panel-body"><h4>Level 10</h4></div>
				  <!-- Started Fetching Downline Of User-->
					<?php 
$totalrefear=0;					
$query="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT fname,email,doj,active,username FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[username]";
	$query88="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	
 $countusername8="$row88[username]";
 $query99="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername8'"; 
 $result99 = mysqli_query($con,$query99);
 while($row99 = mysqli_fetch_array($result99))
{
	
 $countusername9="$row99[username]";
 $query10="SELECT fname,email,doj,active,username,pcktaken FROM  affiliateuser where referedby = '$countusername9'"; 
 $result10 = mysqli_query($con,$query10);
 while($row10 = mysqli_fetch_array($result10))
{
 $countusername10="$row10[username]";
 $ac10="$row10[active]";
 $pcktook="$row10[pcktaken]";
$qu="SELECT level10 FROM  packages where id = $pcktook"; 
$re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	$ll10="$r[0]";
}
  
if ($ac10==1)
{
$status10="success";
$totalrefear=$totalrefear+$ll10;
}
else
{
$status10="danger";
}

  echo "<li class='list-group-item'>
                      <div class='media'>
                        <div class='pull-right text-$status10 m-t-sm'> <i class='fa fa-circle'></i> </div>
                        <div class='media-body'>
                          <div><a href='#'>$row10[fname]</a></div>
                         <small class='text-muted'>E-Mail : $row10[email]</small> <br><small class='text-muted'>Registration Date : $row10[doj] </small><br>Referred By - $row99[fname]</small></div>
                      </div>
                    </li> ";
}
} 
}
}
  }
  }
}
 }
 }
 }
  print "</br> <P><b>&nbsp;&nbsp;&nbsp; Total Earnings - </b>$pckcur $totalrefear</p>";
?>

				  
                </section>
              </div>			  
			  
			  
			  
			  
			  
			  
			 
<!-- End Fetching Downline Of User-->
                    
				   
				   
				   
                  </ul>
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