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

?>
<!DOCTYPE html>
<html lang="en" class="app">
<?php include 'header.php'; ?>
<body class="">
<section class="vbox">
  <?php include 'hea.php'; ?>
  <section>
    <section class="hbox stretch">
      <!-- .aside -->
      <?php include 'aside.php'; ?>
      <!-- /.aside -->
      <section id="content">
        <section class="hbox stretch">
          <section>
            <section class="vbox">
              <section class="scrollable padder">
                <section class="row m-b-md">
                  <div class="col-sm-6">
                    <h3 class="m-b-xs text-black">Dashboard</h3>
                    <small>Welcome back, <?php
		  $sql="SELECT fname FROM  affiliateuser WHERE username='".$_SESSION['adminidusername']."'";
		  if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        print $row[0];
    }

}

   
	   
	   ?>, <i class="fa fa-map-marker fa-lg text-primary"></i> <?php print $coun ?></small> </div>
                  <div class="col-sm-6 text-right text-left-xs m-t-md">
                    
                    <a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover"><i class="i i-bars3 hover-rotate"></i></a> <a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a> </div>
                </section>
                <div class="row">
				<div class="col-lg-12">
                <section class="panel panel-default">
                  <div class="panel-body">
                    <?php $query="SELECT id,fname,email,doj,active,username,address,pcktaken,tamount FROM  affiliateuser where username = '".$_SESSION['adminidusername']."'"; 
 
 
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
 <?php
$result = mysqli_query($con,"SELECT count(*) FROM  affiliateuser where level = 2 and active = 1");
$row = mysqli_fetch_row($result);
$totalusers = $row[0];
?>
                  <footer class="panel-footer bg-info text-center">
                    <div class="row pull-out">
                      <div class="col-xs-6">
                        <div class="padder-v"> <span class="m-b-xs h3 block text-white"><?php print $totalusers ?></span> <small class="text-muted">Total Users</small> </div>
                      </div>
                      <div class="col-xs-6 dk">
					  <?php $query="SELECT sum(payment_amount) as total_payments_till_today FROM  payments where payment_status='1'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
$totalpayments="$row[total_payments_till_today]";
  }
 ?>
                        <div class="padder-v"> <span class="m-b-xs h3 block text-white"><?php print $totalpayments ?></span> <small class="text-muted">Total Payments Till Now To Members </small> </div>
                      </div>
                      
                    </div>
                  </footer>
                </section>
              </div>
                  
                  <div class="col-md-6 col-sm-6">
                    <div class="panel b-a">
						  <?php $query="SELECT * FROM  settings"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $fblink="$row[fblink]";
 $twilink="$row[twitterlink]";
 
 }
 ?>
                      <div class="panel-heading no-border bg-primary lt text-center"> <a href="<?php print $fblink ?>"> <i class="fa fa-facebook fa fa-3x m-t m-b text-white"></i> </a> </div>
                      <div class="padder-v text-center clearfix">
                        <div class="col-xs-6 b-r">
						<div class="h3 font-bold">Like</div>
                          <small class="text-muted">us on facebook</small> 
                          </div>
                        <div class="col-xs-6">
						<div class="h3 font-bold">Right</div>
                          <small class="text-muted">now</small>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="panel b-a">
                      <div class="panel-heading no-border bg-info lter text-center"> <a href="<?php print $twilink ?>"> <i class="fa fa-twitter fa fa-3x m-t m-b text-white"></i> </a> </div>
                      <div class="padder-v text-center clearfix">
                        <div class="col-xs-6 b-r">
                          <div class="h3 font-bold">Follow</div>
                          <small class="text-muted">us on twitter</small> </div>
                        <div class="col-xs-6">
                          <div class="h3 font-bold">Right</div>
                          <small class="text-muted">now</small> </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                
                
              
            </section>
          </section>
    
          <!-- / side content -->
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
    </section>
  </section>
</section>
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
<script src="js/charts/flot/jquery.flot.min.js"></script>
<script src="js/charts/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/charts/flot/jquery.flot.spline.js"></script>
<script src="js/charts/flot/jquery.flot.pie.min.js"></script>
<script src="js/charts/flot/jquery.flot.resize.js"></script>
<script src="js/charts/flot/jquery.flot.grow.js"></script>
<script src="js/charts/flot/demo.js"></script>
<script src="js/calendar/bootstrap_calendar.js"></script>
<script src="js/calendar/demo.js"></script>
<script src="js/sortable/jquery.sortable.js"></script>
<script src="js/app.plugin.js"></script>
</body>
</html>