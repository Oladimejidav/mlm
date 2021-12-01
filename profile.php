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


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todo']))
{


// Collect the data from post method of form submission // 
$name=mysqli_real_escape_string($con,$_POST['fullname']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$cont=mysqli_real_escape_string($con,$_POST['contry']);
$p1=mysqli_real_escape_string($con,$_POST['p1']);
$p2=mysqli_real_escape_string($con,$_POST['p2']);
$bankname=mysqli_real_escape_string($con,$_POST['bankname']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$accname=mysqli_real_escape_string($con,$_POST['accname']);
$accno=mysqli_real_escape_string($con,$_POST['accno']);
$ifsccode=mysqli_real_escape_string($con,$_POST['ifsccode']);
$alwdpayment=mysqli_real_escape_string($con,$_POST['alwdpayment']);
$acctype=mysqli_real_escape_string($con,$_POST['acctype']);
//collection ends

$check=1;
if($check==1){

$status = "OK";
$msg="";
//validation starts
// if userid is less than 6 char then status is not ok

if ( strlen($p1) < 8 ){
$msg=$msg."Password Must Be More Than 8 Char Length.<BR>";
$status= "NOTOK";}	

if ( strlen($p2) < 8 ){
$msg=$msg."Conformation Password Must Be More Than 8 Char Length.<BR>";
$status= "NOTOK";}

if ( $p2!=$p1 ){
$msg=$msg."Password Does Not Match.<BR>";
$status= "NOTOK";}

if ( strlen($name) < 2 ){
$msg=$msg."Name should contain 2 chars.<BR>";
$status= "NOTOK";}

if ( strlen($address) < 5 ){
$msg=$msg."address should contain 5 chars.<BR>";
$status= "NOTOK";}

if ( strlen($cont) < 1 ){
$msg=$msg."Country should contain 1 char.<BR>";
$status= "NOTOK";}

}

if ($status=="OK") 
{

$query=mysqli_query($con,"update affiliateuser set password='$p1',fname='$name',address='$address',country='$cont',bankname='$bankname',accountname='$accname',accountno='$accno',accounttype='$acctype',ifsccode='$ifsccode',email='$email',getpayment='$alwdpayment' where username='".$_SESSION['username']."'");


$errormsg= "
<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Your profile has been updated.</div>"; //printing error if found in validation



}



else
{ 
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
					
}

}


?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Profile Settings</title>
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

   
	   
	   ?></strong> <b class="caret"></b> </span> <span class="text-muted text-xs block"><?php print "$pkname Member"; ?></span> </span> </a>
                  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <span class="arrow top hidden-nav-xs"></span>
                    <li> <a href="profile.php">Profile</a> </li>
                    <li class="divider"></li>
                    <li> <a href="logout.php" data-toggle="ajaxModal" >Logout</a> </li>
                  </ul>
                </div>
              </div>
              <!-- nav -->
              <nav class="nav-primary hidden-xs">
                <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                <ul class="nav nav-main" data-ride="collapse">
                  <li> <a href="dashboard.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Dashboard</span> </a> </li><li> <a href="profile.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Profile</span> </a> </li>
                  <li> <a href="task.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Task</span> </a> </li>
                  <li> <a href="submittask.php" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Submit Task</span> </a> </li>
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">Account</span> </a>
                    <ul class="nav dk">
                      <li > <a href="downline.php" class="auto"> <i class="i i-dot"></i> <span>Downline/Earnings</span> </a> </li>
                      
                      
                      
                      <li > <a href="invoice.php" class="auto"> <i class="i i-dot"></i> <span>Invoice/Account Status</span> </a> </li>
                      <li> <a href="paymentshistory.php" class="auto"> <i class="i i-dot"></i> <span>Payments History</span> </a> </li>
                    </ul>
                  </li>
                  
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-grid2 icon"> </i> <span class="font-bold">Help</span> </a>
                    <ul class="nav dk">
                      <li > <a href="notifications.php" class="auto"><i class="i i-dot"></i> <span>Notifications</span> </a> </li>
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
            <p><strong>Important Instructions </strong> <b>1.</b> All Details Are Mandatory. <b>2. </b>  Submit Bank Details Properly, Incorrect details may lead to rejection of payment.</p>
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
					  
					  $query="SELECT * FROM  affiliateuser WHERE username='".$_SESSION['username']."'"; 
 
 
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	
	$name="$row[fname]";
	$add="$row[address]";
	$contry="$row[country]";
	$email="$row[email]";
	$bname="$row[bankname]";
	$accnamee="$row[accountname]";
	$accnumber="$row[accountno]";
	$acctyppe="$row[accounttype]";
	$ifsc="$row[ifsccode]";
	}
	
	$query121="SELECT * FROM  settings"; 
 
 
 $result121 = mysqli_query($con,$query121);
$i=0;
while($row121 = mysqli_fetch_array($result121))
{
	
	
	$wlink="$row121[wlink]";
	
	}
				
					  
		$pathu="/User/signup.php?aff=";			  ?>  
                    </ul>
                  </header>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
					  <?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status!=""))
						{
						print $errormsg;
						}
						?>
					  
					  <div class="panel-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
                      
					  <div class="form-group">
					  <input type="hidden" name="todo" value="post">
                        <label>My Personal Invite URL</label>
                        <input type="text" value="<?php print $wlink.$pathu.$_SESSION['username'] ?>" class="form-control" placeholder="Your Invite URL" name="inviteurl" >
                      </div>
					  
					  <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" value="<?php print $name ?>" class="form-control" placeholder="Full Name" name="fullname" required>
                      </div>
					  <div class="form-group">
                        <label>Address</label>
                        <input type="text" value="<?php print $add ?>" class="form-control" placeholder="Full Address" name="address" required >
                      </div>
					  <div class="form-group">
                        <label>Country</label>
                        <input type="text" value="<?php print $contry?>" class="form-control" placeholder="Full Country Name" name="contrydisplay" disabled>
                      </div>
					  <div class="form-group">
					  <label>Country</label>
                                    <select name="contry" required>
<option value="">Country...</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
                      </div>
					  
					  
					  
					  
					   <div class="form-group">
                        <label>Get Payment Via</label>
                         <select name="alwdpayment">
		  <?php $query="SELECT alwdpayment FROM  settings where sno='0'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$alpayment="$row[alwdpayment]";
	if($alpayment==1)
	{
	$name="PayPal";
	print "<option value='$alpayment'>$name</option>";
	}
	else if($alpayment==2)
	{
	$name="Your Bank Account";
	print "<option value='$alpayment'>$name</option>";
	}
	else if($alpayment==3)
	{
	$name1="PayPal";
	$name2="Your Bank Account";
	print "<option value='1'>$name1</option>";
	print "<option value='2'>$name2</option>";
	}
  
  
  }
  ?>
 
</select>
                      </div>
					  <div class="form-group">
                        <label>E-Mail</label>
                        <input type="text" value="<?php print $email?>" class="form-control" placeholder="Full Name" name="email" required>
                      </div>
					  </br>
					  <b>Update Bank Details In Case You Want Payment Via Bank Account. </b>
					  <br>
					  <br>
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
                        <input type="password" value="" class="form-control" placeholder="Alphanumeric Password Again" name="p2" required >
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