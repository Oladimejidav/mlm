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
        <section class="vbox">
          <header class="header bg-white b-b b-light">
            <p><strong>Important Instructions </strong> <b>1.</b> All Details Are Mandatory. <b>2. </b> Enter 0 to disable the referral level. <b>3.</b> All amounts should be in integer (1) not decimal (1.0).</p>
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
					  
					  $query="SELECT * FROM  affiliateuser WHERE username='".$_SESSION['adminidusername']."'"; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$name="$row[fname]";
	$email="$row[email]";
	$address="$row[address]";
	$country="$row[country]";
	$bname="$row[bankname]";
	$accnamee="$row[accountname]";
	$accnumber="$row[accountno]";
	$acctyppe="$row[accounttype]";
	$ifsc="$row[ifsccode]";
	
	}
					  
					  ?>  
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="profileupdate.php" method="post">
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" value="<?php print $name ?>" class="form-control" placeholder="Full Name" name="fullname" >
                      </div>
					  <div class="form-group">
                        <label>Country</label>
                        <input type="text" value="<?php print $country ?>" class="form-control" placeholder="Full Name" name="country" >
                      </div>
					  <div class="form-group">
                        <label>E-Mail</label>
                        <input type="text" value="<?php print $email ?>" class="form-control" placeholder="Full Name" name="email" >
                      </div>
					  <div class="form-group">
                        <label>Address</label>
                        <input type="text" value="<?php print $address ?>" class="form-control" placeholder="Full Name" name="address" >
                      </div>
					   <div class="form-group">
                        <label>Account Type</label>
                         <select name="acctype" required>
	<option value='0'>Select Type</option>	  
	<option value='1'>Current</option>
	<option value='2'>Savings</option>
 
</select>
                      </div>
					  <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" value="<?php print $bname ?>" class="form-control" placeholder="Bank Name" name="bankname">
                      </div>
					  <div class="form-group">
                        <label>Account Name</label>
                        <input type="text" value="<?php print $accnamee ?>" class="form-control" placeholder="Account Holder Name" name="accname">
                      </div>
					  <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" value="<?php print $accnumber ?>" class="form-control" placeholder="Bank Account Number" name="accno">
                      </div>
					  <div class="form-group">
                        <label>IFSC Code</label>
                        <input type="text" value="<?php print $ifsc ?>" class="form-control" placeholder="IFSC Code" name="ifsccode">
                      </div>
					  <input type="hidden" value=""  name="sno">
					  <div class="form-group">
                        <label>Password</label>
                        <input type="password" value="" class="form-control" placeholder="Alphnumeric Password" name="p1" required>
                      </div>
                      <div class="form-group">
                        <label>Password Again</label>
                        <input type="password" value="" class="form-control" placeholder="Alphanumeric Password Again" name="p2" required>
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