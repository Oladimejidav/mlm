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
            <p><strong>Important Instructions </strong> <b>1.</b> If you find unknown status of user, then kindly edit the user profile and update the status.<b> 2. </b> Records are shown from newest to oldest.</p>
          </header>
          <section class="scrollable wrapper">
		  
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> Users Settings </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab">Registered Users</a></li>
                       
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    
					   <header class="panel-heading"> User List <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> </header>
<div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables">
                  <thead>
                    <tr>
                     
                      <th width="18%">User id/Order id</th>
					  <th width="15%">Username</th>
                      <th width="15%"> Full Name</th>
                      <th width="5%">Country</th>
					  <th width="15%">Sponsor</th>
					  <th width="8%">Earnings</th>
					  <th width="15%">Package Taken</th>
					  <th width="15%">Reg. Date</th>
					  <th width="15%">Status</th>
					  <th width="50%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php $query="SELECT * FROM  affiliateuser where level=2 ORDER BY id DESC"; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$id="$row[Id]";
	$username="$row[username]";
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
	
  print "<tr>
				  
				  <td>
				  $id
				  </td>
				  <td>
				  $username
				  </td>
				  <td>
				  $fname
				  </td>
				  <td>
				  $country
				  </td>
				  
				  <td>
				  $ref
				  </td>
				  
				  <td>
				  $ear
				  </td>
				  <td>
				  $pck
				  </td>
				  <td>
				  $doj
				  </td>
				  <td>
				  
				  $status
				  </td>
				  <td>
				 
				  <a href='updateuser.php?username=$username'>Edit</a> <br/>
				  <a href='deleteuser.php?username=$username'>Delete User</a> <br/>
				  ";
				  
				  if($lprofile==0)
	{
	print "<a href='launchprofile.php?username=$username'>Launch</a><br/>";
	}	  
				  
	
	
				  
		print"		  </p> 
				  </td>
				  
				  </tr>";
  
  }
  ?>
				  
                  </tbody>
                </table>
              </div>
        
          
                    
                    
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