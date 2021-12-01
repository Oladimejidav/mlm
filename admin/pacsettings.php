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
            <p><strong>Important Instructions </strong> <b>1.</b> All Details Are Mandatory. <b>2. </b> Enter 0 to disable the referral level. <b>3.</b> Enter amounts in integer (1) or decimal (1.0).</p>
          </header>
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> Packages Settings </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab">Create Packages</a></li>
                      <li><a href="#profile" data-toggle="tab">Update Packages</a></li>
                      <li><a href="#messages" data-toggle="tab">Deactivate Packages</a></li>
                      
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="createpac.php" method="post">
                      <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" class="form-control" placeholder="Enter Package Name" name="pckname">
                      </div>
                      <div class="form-group">
                        <label>Package Details</label>
                        <input type="textarea" class="form-control" placeholder="Intro of package" name="pckdetail">
                      </div>
					  
					  <div class="form-group">
                        <label>Package Price ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="pckprice" >
                      </div>
					  <div class="form-group">
                        <label>Package Tax( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="pcktax" >
                      </div>
					  <div class="form-group">
<br/>
 <div class="form-group">
                        <label>Minimum Payout For User ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="User should earn minimum this money to send payment request, Like 50 or 100 and should not be 0" name="pckmpay" >
                      </div>
					  
					   <div class="form-group">
                        <label>Signup Bonus ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="User will receive bonus amount after signup. Like 10,20 or 0 to disable" name="pcksbonus" >
                      </div>

              <div class="form-group">
                        <label>Daily Login Bonus ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="User will receive bonus amount for daily login. Like 10,20 or 0 to disable" name="dbonus" >
                      </div>
                      <div class="form-group">
                        <label>Pay per task ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="User will receive bonus amount for daily task. Like 10,20 or 0 to disable" name="dtask" >
                      </div>
<div class="form-group">
                        <label>Level 1 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev1">
                      </div>
					  <div class="form-group">
                        <label>Level 2 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev2">
                      </div>
					  <div class="form-group">
                        <label>Level 3 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev3">
                      </div>
					  <div class="form-group">
                        <label>Level 4 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev4">
                      </div>
					  <div class="form-group">
                        <label>Level 5 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev5">
                      </div>
					  <div class="form-group">
                        <label>Level 6 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev6">
                      </div>
					  <div class="form-group">
                        <label>Level 7 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev7">
                      </div>
					  <div class="form-group">
                       <label>Level 8 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev8">
                      </div>
					  <div class="form-group">
                        <label>Level 9 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev9">
                      </div>
					  <div class="form-group">
                        <label>Level 10 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev10">
                      </div>
					  <div class="form-group">
                        <label>Level 11 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev11">
                      </div>
					  <div class="form-group">
                        <label>Level 12 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev12">
                      </div>
					  <div class="form-group">
                        <label>Level 13 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev13">
                      </div>
					  <div class="form-group">
                       <label>Level 14 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev14">
                      </div>
					  <div class="form-group">
                        <label>Level 15 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev15">
                      </div>
					  <div class="form-group">
                       <label>Level 16 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev16">
                      </div>
					  <div class="form-group">
                       <label>Level 17 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev17">
                      </div>
					  <div class="form-group">
                        <label>Level 18 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev18">
                      </div>
					  <div class="form-group">
                       <label>Level 19 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev19">
                      </div>
					  
					  <div class="form-group">
                       <label>Level 20 ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Like 10,20" name="lev20">
                      </div>
					  <div class="form-group">
                       <label>Renew Day(s) ( Only Number )</label>
                        <input type="text" class="form-control" placeholder="Enter '99999' for no expiry or enter no of days like 30 (1 month), 60 (2 months), 365 (1 year) - This would be the expiry date for user account" name="renewdays">
                      </div>
					  <div class="list-group-item">
		   
</div>

					  
					  
</div>
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">I Have Filled And Checked All Details. Create Package For Me Now.</button>
                    </form>
                  </div>
					  
					  </div>
                      <div class="tab-pane" id="profile"><form action="updatepck.php" method="post">
                      <div class="form-group">
                        <label>
            Select Package To Update/Edit : 
		  <select name="upackage">
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
                      
                      
					  
					  
</div>
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">I Have Filled And Checked All Details. Update/Edit This Package For Me Now.</button>
                    </form></div>
                      <div class="tab-pane" id="messages"><div class="list-group-item">
					  <form action="deletepackage.php" method="post">
		  <label>
            Select Package To Delete : 
		  <select name="packagedelid">
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
</label> 

</div>

<button type="submit" class="btn btn-lg btn-primary btn-block">Oh Pls!! I Know What I'm Doing, Deactivate This Package For Me. (You cannot delete package, it can only be deactivated.)</button>
</form>
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