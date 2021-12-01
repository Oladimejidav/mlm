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
$upid = mysqli_real_escape_string($con,$_POST['upackage']);
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
					  
					  $query="SELECT * FROM  packages where id=$upid"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	
	$pname="$row[name]";
	$pdetail="$row[details]";
	$pprice="$row[price]";
	$pcurid="$row[currency]";
	$pckmpay="$row[mpay]";
	$pcktax="$row[tax]";
	$pcksbonus="$row[sbonus]";
	$pckactive="$row[active]";
	$p1="$row[level1]";
	$p2="$row[level2]";
	$p3="$row[level3]";
	$p4="$row[level4]";
	$p5="$row[level5]";
	$p6="$row[level6]";
	$p7="$row[level7]";
	$p8="$row[level8]";
	$p9="$row[level9]";
	$p10="$row[level10]";
	$p11="$row[level11]";
	$p12="$row[level12]";
	$p13="$row[level13]";
	$p14="$row[level14]";
	$p15="$row[level15]";
	$p16="$row[level16]";
	$p17="$row[level17]";
	$p18="$row[level18]";
	$p19="$row[level19]";
	$p20="$row[level20]";
	$validity="$row[validity]";
	}
					  
					  ?>  
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="updatepcksettings.php" method="post">
					 <input type="hidden" value="<?php print $upid ?>" name="pckmainid">
					<div class="form-group">
                        <label>Package Active Status | 0 means unactive and 1 means active</label>
                        <input type="text" value="<?php print $pckactive ?>" class="form-control" placeholder="Enter Package Name" name="pckact">
                      </div>
                      <div class="form-group">
                        <label>Package Name</label>
                        <input type="text" value="<?php print $pname ?>" class="form-control" placeholder="Enter Package Name" name="pckname">
                      </div>
                      <div class="form-group">
                        <label>Package Details</label>
                        <input type="textarea" value="<?php print $pdetail ?>" class="form-control" placeholder="Intro of package" name="pckdetail">
                      </div>
					  
					  <div class="form-group">
                        <label>Package Price ( Only Number )</label>
                        <input type="text" value="<?php print $pprice ?>" class="form-control" placeholder="Like 10,20" name="pckprice" >
                      </div>
					  
<div class="form-group">
                        <label>Package Tax( Only Number )</label>
                        <input type="text" value="<?php print $pcktax ?>" class="form-control" placeholder="Like 10,20" name="pcktax" >
                      </div>

<div class="form-group">
                        <label>Minimum Payout For User ( Only Number )</label>
                        <input type="text" value="<?php print $pckmpay ?>" class="form-control" placeholder="User should earn minimum this money to send payment request, Like 50 or 100 and should not be 0" name="pckmpay" >
                      </div>
					  
					   <div class="form-group">
                        <label>Signup Bonus( Only Number )</label>
                        <input type="text" value="<?php print $pcksbonus ?>" class="form-control" placeholder="User will receive bonus amount after signup. Like 10,20 or 0 to disable" name="pcksbonus" >
                      </div>
					  
					  <div class="form-group">
					  <label>
            Select Currency : 
		  <select name="currency">
		  
		  <?php $query="SELECT id,name,code FROM  currency"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$curname="$row[name]";
	$curcode="$row[code]";
	
  print "<option value='$curcode'>$curname - $curcode </option>";
  
  }
  ?>
 
</select>
</label> 

<div class="form-group">
                        <label>Level 1 ( Only Number )</label>
                        <input type="text" value="<?php print $p1 ?>" class="form-control" placeholder="Like 10,20" name="lev1">
                      </div>
					  <div class="form-group">
                        <label>Level 2 ( Only Number )</label>
                        <input type="text" value="<?php print $p2 ?>" class="form-control" placeholder="Like 10,20" name="lev2">
                      </div>
					  <div class="form-group">
                        <label>Level 3 ( Only Number )</label>
                        <input type="text" value="<?php print $p3 ?>" class="form-control" placeholder="Like 10,20" name="lev3">
                      </div>
					  <div class="form-group">
                        <label>Level 4 ( Only Number )</label>
                        <input type="text" value="<?php print $p4 ?>" class="form-control" placeholder="Like 10,20" name="lev4">
                      </div>
					  <div class="form-group">
                        <label>Level 5 ( Only Number )</label>
                        <input type="text" value="<?php print $p5 ?>" class="form-control" placeholder="Like 10,20" name="lev5">
                      </div>
					  <div class="form-group">
                        <label>Level 6 ( Only Number )</label>
                        <input type="text" value="<?php print $p6 ?>" class="form-control" placeholder="Like 10,20" name="lev6">
                      </div>
					  <div class="form-group">
                        <label>Level 7 ( Only Number )</label>
                        <input type="text" value="<?php print $p7 ?>" class="form-control" placeholder="Like 10,20" name="lev7">
                      </div>
					  <div class="form-group">
                       <label>Level 8 ( Only Number )</label>
                        <input type="text" value="<?php print $p8 ?>" class="form-control" placeholder="Like 10,20" name="lev8">
                      </div>
					  <div class="form-group">
                        <label>Level 9 ( Only Number )</label>
                        <input type="text" value="<?php print $p9 ?>" class="form-control" placeholder="Like 10,20" name="lev9">
                      </div>
					  <div class="form-group">
                        <label>Level 10 ( Only Number )</label>
                        <input type="text" value="<?php print $p10 ?>" class="form-control" placeholder="Like 10,20" name="lev10">
                      </div>
					  <div class="form-group">
                        <label>Level 11 ( Only Number )</label>
                        <input type="text" value="<?php print $p11 ?>" class="form-control" placeholder="Like 10,20" name="lev11">
                      </div>
					  <div class="form-group">
                        <label>Level 12 ( Only Number )</label>
                        <input type="text" value="<?php print $p12 ?>" class="form-control" placeholder="Like 10,20" name="lev12">
                      </div>
					  <div class="form-group">
                        <label>Level 13 ( Only Number )</label>
                        <input type="text" value="<?php print $p13 ?>" class="form-control" placeholder="Like 10,20" name="lev13">
                      </div>
					  <div class="form-group">
                       <label>Level 14 ( Only Number )</label>
                        <input type="text" value="<?php print $p14 ?>" class="form-control" placeholder="Like 10,20" name="lev14">
                      </div>
					  <div class="form-group">
                        <label>Level 15 ( Only Number )</label>
                        <input type="text" value="<?php print $p15 ?>" class="form-control" placeholder="Like 10,20" name="lev15">
                      </div>
					  <div class="form-group">
                       <label>Level 16 ( Only Number )</label>
                        <input type="text" value="<?php print $p16 ?>" class="form-control" placeholder="Like 10,20" name="lev16">
                      </div>
					  <div class="form-group">
                       <label>Level 17 ( Only Number )</label>
                        <input type="text" value="<?php print $p17 ?>" class="form-control" placeholder="Like 10,20" name="lev17">
                      </div>
					  <div class="form-group">
                        <label>Level 18 ( Only Number )</label>
                        <input type="text" value="<?php print $p18 ?>" class="form-control" placeholder="Like 10,20" name="lev18">
                      </div>
					  <div class="form-group">
                       <label>Level 19 ( Only Number )</label>
                        <input type="text" value="<?php print $p19 ?>" class="form-control" placeholder="Like 10,20" name="lev19">
                      </div>
					  
					  <div class="form-group">
                       <label>Level 20 ( Only Number )</label>
                        <input type="text" value="<?php print $p20 ?>" class="form-control" placeholder="Like 10,20" name="lev20">
                      </div>
					  <div class="form-group">
                       <label>Renew Day(s) ( Only Number )</label>
                        <input type="text" value="<?php print $validity ?>" class="form-control" placeholder="Enter '0' for no expiry or enter no of days like 30 (1 month), 60 (2 months), 365 (1 year) - This would be the expiry date for user account" name="renewdays">
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