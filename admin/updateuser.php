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
$toupdate =  mysqli_real_escape_string($con,$_GET['username']);
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
        <section class="vbox">
          <header class="header bg-white b-b b-light">
            <p><strong>Important Instructions </strong> <b>1.</b> All Details Are Mandatory. <b>2. </b> Enter 0 to disable the referral level. <b>3.</b> All amounts should be in integer (1) not decimal (1.0).</p>
          </header>
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> General Settings |  <a href='deleteuser.php?username=$username'>Delete User</a> </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab"> Settings</a></li>
                      <?php 
					 $query="SELECT * FROM  affiliateuser where username='$toupdate' "; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$id="$row[Id]";
	$username="$row[username]";
	$pass="$row[password]";
	$address="$row[address]";
	$fname="$row[fname]";
	$email="$row[email]";
	$mobile="$row[mobile]";
	$active="$row[active]";
	$doj="$row[doj]";
	$country="$row[country]";
	$ear="$row[tamount]";
	$ref="$row[referedby]";
	$pck="$row[pcktaken]";
	$lprofile="$row[launch]";
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
	$pcktax="$r[tax]";
	$pckcur="$r[currency]";
	$pcksbonus="$r[sbonus]";
  }
	$total=$pckprice+$pcktax;
 
					  
		}			  ?>  
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="updateusersettings.php" method="post">
					 <input type="hidden" value="<?php print $upid ?>" name="pckmainid">
					<div class="form-group">
                        <label>User Active Status | 0 means unactive and 1 means active</label>
                        <input type="text" value="<?php print $active ?>" class="form-control" placeholder="Enter 0 or 1" name="act">
                      </div>
					  <div class="form-group">
                        <label>User Name</label>
                        <input type="text" value="<?php print $toupdate ?>" class="form-control" placeholder="Enter Username" name="us" disabled>
                      </div>
					  
                       
                        <input type="hidden" value="<?php print $toupdate ?>" class="form-control" placeholder="Enter Username" name="username">
                      
                      <div class="form-group">
                        <label>User Full Name</label>
                        <input type="text" value="<?php print $fname ?>" class="form-control" placeholder="Enter Full Name" name="fname">
                      </div>
					  <div class="form-group">
                        <label>Address</label>
                        <input type="textarea" value="<?php print $address ?>" class="form-control" placeholder="Address" name="address">
                      </div>
                      <div class="form-group">
                        <label>Username Password</label>
                        <input type="textarea" value="<?php print $pass ?>" class="form-control" placeholder="Alphnumeric password" name="password">
                      </div>
					  
					  <div class="form-group">
                        <label>User Email</label>
                        <input type="text" value="<?php print $email ?>" class="form-control" placeholder="email@host.com" name="email" >
                      </div>
					  
						<div class="form-group">
                        <label>Mobile</label>
                        <input type="text" value="<?php print $mobile ?>" class="form-control" placeholder="Like 10,20" name="mobile" >
                      </div>

						<div class="form-group">
                        <label>country</label>
                        <input type="text" value="<?php print $country ?>" class="form-control" placeholder="country" name="country" >
                      </div>
					  
					   <div class="form-group">
                        <label>Earnings</label>
                        <input type="text" value="<?php print $ear ?>" class="form-control" placeholder="Earnings" name="earnings" >
                      </div>
					  
					  <div class="form-group">
                        <label>Referred By</label>
                        <input type="text" value="<?php print $ref ?>" class="form-control" placeholder="Referred By" name="refer" >
                      </div>
					  <div class="form-group">
                        <label>Package Taken</label>
                        <input type="text" value="<?php print $pckname ?>" class="form-control" placeholder="Referred By" name="pck" disabled >
                      </div>
					 <div class="form-group">
                        <label>
            Select Package To Update/Edit : 
		  <select name="package">
		  <?php $query="SELECT id,name,price,currency,tax FROM  packages where active=1"; 
 
 
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