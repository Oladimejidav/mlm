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
            <p><strong>Important Instructions </strong> <b>1.</b> Please verify your payments in Paypal account before activating the user's account.<b> 2. </b> Records are shown from newest to oldest.</p>
          </header>
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> Paypal Payments Received </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab">Payment Details</a></li>
                       
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    
					  

            
        
             
              <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables">
                  <thead>
                    <tr>
                     
                      <th width="10%">Payment Id</th>
					  <th width="15%">Transaction Type</th>
                      <th width="15%"> Total Payment Received</th>
                      <th width="15%">Payment Date</th>
					  <th width="8%">Payment By (Username)</th>
					  <th width="15%">Package Taken</th>
					  <th width="15%">New Package Requested</th>
					  <th width="15%">Status</th>
					  <th width="50%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
				   $q="SELECT * FROM  paypalpayments where cod=1 and renew=1 ORDER BY id DESC"; 
 
 
 $r123 = mysqli_query($con,$q);

while($ro = mysqli_fetch_array($r123))
{
	
	$pid="$ro[id]";
	$poid="$ro[orderid]";
	$ptransac="$ro[transacid]";
	$ppaypalprice="$ro[price]";
	$pcur="$ro[currency]";
	$pdate="$ro[date]";
	$renacid="$ro[renacid]";
	
				  
 $query="SELECT * FROM  affiliateuser where Id=$poid "; 
 
 
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
	
	//////////////////////
	$qu="SELECT * FROM  packages where id = $renacid"; 
 $re = mysqli_query($con,$qu);
while($r = mysqli_fetch_array($re))
{
	//$pckid="$r[id]";
	$pckname2="$r[name]";
	$pckprice2="$r[price]";
	$pcktax2="$r[tax]";
	$pckcur2="$r[currency]";
	$pcksbonus2="$r[sbonus]";
  }
	$total2=$pckprice2+$pcktax2;
	
	
	
	
  print "<tr>
				  
				  <td>
				  $pid
				  </td>
				  <td>
				  $ptransac
				  </td>
				  <td>
				  $pcur $ppaypalprice
				  </td>
				  <td>
				  $pdate
				  </td>
				  
				  <td>
				  $username
				  </td>
				  
				  <td>
				  <b>$pckname </b> <br/> $total $pckcur<br/> Signup Bonus - $pcksbonus
				  </td>
				  <td>
				  <b>$pckname2 </b> <br/> $total2 $pckcur2<br/> Signup Bonus - $pcksbonus2
				  </td>
				  <td>
				  $status
				  </td>
				  
				  
				  <td>
				  <a href='payuser.php?username=$username' class='btn btn-default btn-sm'>Pay User</a> <br/>
				  <a href='rejectuser.php?username=$username' class='btn btn-default btn-sm'>Reject</a> <br/>
				  ";
				  
				 	  
				  
	
				  
		print"		  </p>
				  </td>
				  
				  </tr>";
  
  }
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