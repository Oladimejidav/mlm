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
            <p><strong>Important Instructions </strong> Records are shown from newest to oldest.</p>
          </header>
          <section class="scrollable wrapper">
		  
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> Task Submitted Settings </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab">Task Submitted</a></li>
                       
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    
					   <header class="panel-heading"> Task List <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> </header>
<div class="table-responsive">
                 <table class="table table-striped m-b-none" data-ride="datatables">
                  <thead>
                    <tr>
                     
                      <th width="25%">User id/Order id</th>
            <th width="25%">Username</th>
                      <th width="25%"> Image Uploaded</th>
                      <th width="25%">Action</th>
            <th width="50%"></th>
                    </tr>
                  </thead>
                  <tbody>
          <?php $query="SELECT * FROM  subtask where status=0 ORDER BY id2 DESC"; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
  
  $id2="$row[id2]";
  $username="$row[username]";
  
  print "<tr>
          
          <td>
          $id2
          </td>
          <td>
          $username
          </td>
          <td>
           <img src='../subtaskimg/".$row['image']."'>
          </td>
          <td>
         
          <a href='paytask.php?id2=$id2'>pay</a> <br/>
          <a href='declinetask.php?id2=$id2'>Decline</a> <br/>
          ";
          
        
          
  
  
          
    print"      </p> 
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