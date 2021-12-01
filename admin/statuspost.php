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
            <p><strong>Important Instructions </strong> <b>1.</b> All Details Are Mandatory. </p>
          </header>
          <section class="scrollable wrapper">
            <div class="row">
              
              <div class="col-sm-12 portlet">
                <section class="panel panel-success portlet-item">
                  <header class="panel-heading"> Daily Task Settings </header>
                  <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="#home" data-toggle="tab">Daily Task Notification</a></li>
                      <li><a href="#profile" data-toggle="tab">Delete/Deactivate Notification</a></li>
                                          
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  
					  
					  <div class="panel-body">
                    <form action="postpost.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="file" name="myfile">
                      </div>
                      <div class="form-group">
                        <label>Daily Task Body</label><br/>
                       <textarea rows="8" cols="125" name="taskbody" placeholder="Details of the Task"></textarea>
                      </div>
					  
					
					  
					  

                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block" name="upload">Create And Post To All Users</button>
                    </form>
                  </div>
					  
					  </div>
                      <div class="tab-pane" id="profile"><form action="deletepost.php" method="post">
                      <div class="form-group">
                        <label>
            Select Notification Id To Deactivate/Delete : 
		  <select name="postsub">
		  <?php $query="SELECT id,id2,image,body,posteddate FROM  task where valid=1";   
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
  $id2="$row[id2]";
	$imagename="$row[imagename]";
  $image="$row[image]";
  $body="$row[body]";
	$taskdate="$row[posteddate]";
	

  print "<option value='$id2'>$body | Dated - $taskdate </option>";
  
  }
  ?>
 
</select>
                      </div>
                      
					  
                      
                     <button type="submit" class="btn btn-lg btn-primary btn-block">Oh!!! I know what i'm doing, delete this Post for me</button>
                    </form></div>
                      
                      
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