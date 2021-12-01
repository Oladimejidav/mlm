<?php

include_once ("z_db.php");
Print "Starting Update... <br>";

$sql = "ALTER TABLE affiliateuser ADD renew INT(1) NOT NULL DEFAULT '0' AFTER getpayment";
mysqli_query($con, $sql);

$sql = "ALTER TABLE settings ADD payzaid VARCHAR(128) NOT NULL DEFAULT 'Not Available' AFTER header";
mysqli_query($con, $sql);

$sql = "ALTER TABLE settings ADD solidtrustid VARCHAR(128) NOT NULL DEFAULT 'Not Available' AFTER payzaid";
mysqli_query($con, $sql);


$sql = "ALTER TABLE settings ADD solidbutton VARCHAR(128) NOT NULL DEFAULT 'Not Available' AFTER solidtrustid";
mysqli_query($con, $sql);

$sql = "INSERT INTO paymentgateway (id, Name, status, comment, date) VALUES (NULL, 'SolidTrustPay', '1', '', '')";
mysqli_query($con, $sql);

$sql = "ALTER TABLE paypalpayments ADD gateway VARCHAR(25) NOT NULL AFTER pckid";
mysqli_query($con, $sql);
$sql = "ALTER TABLE paypalpayments ADD pckid DOUBLE NOT NULL AFTER renacid";
mysqli_query($con, $sql);

// upading packages table to double structure

$sql ="ALTER TABLE packages CHANGE tax tax DOUBLE NOT NULL DEFAULT '0', CHANGE mpay mpay DOUBLE NOT NULL DEFAULT '0', CHANGE sbonus sbonus DOUBLE NULL DEFAULT '0', CHANGE level1 level1 DOUBLE NOT NULL DEFAULT '0', CHANGE level2 level2 DOUBLE NOT NULL DEFAULT '0', CHANGE level3 level3 DOUBLE NOT NULL DEFAULT '0', CHANGE level4 level4 DOUBLE NOT NULL DEFAULT '0', CHANGE level5 level5 DOUBLE NOT NULL DEFAULT '0', CHANGE level6 level6 DOUBLE NOT NULL DEFAULT '0', CHANGE level7 level7 DOUBLE NOT NULL DEFAULT '0', CHANGE level8 level8 DOUBLE NOT NULL DEFAULT '0', CHANGE level9 level9 DOUBLE NOT NULL DEFAULT '0', CHANGE level10 level10 DOUBLE NOT NULL DEFAULT '0', CHANGE level11 level11 DOUBLE NOT NULL DEFAULT '0', CHANGE level12 level12 DOUBLE NOT NULL DEFAULT '0', CHANGE level13 level13 DOUBLE NOT NULL DEFAULT '0', CHANGE level14 level14 DOUBLE NOT NULL DEFAULT '0', CHANGE level15 level15 DOUBLE NOT NULL DEFAULT '0', CHANGE level16 level16 DOUBLE NOT NULL DEFAULT '0', CHANGE level17 level17 DOUBLE NOT NULL DEFAULT '0', CHANGE level18 level18 DOUBLE NOT NULL DEFAULT '0', CHANGE level19 level19 DOUBLE NOT NULL DEFAULT '0', CHANGE level20 level20 DOUBLE NOT NULL DEFAULT '0'";
mysqli_query($con, $sql);
$sql ="ALTER TABLE packages CHANGE price price DOUBLE NOT NULL DEFAULT '0'";
mysqli_query($con, $sql);
$sql = "ALTER TABLE affiliateuser CHANGE tamount tamount DOUBLE NOT NULL DEFAULT '0'";
mysqli_query($con, $sql);
$sql = "ALTER TABLE payments CHANGE payment_amount payment_amount DOUBLE NOT NULL DEFAULT '0'";
mysqli_query($con, $sql);
$sql = "ALTER TABLE paypalpayments CHANGE price price DOUBLE NULL DEFAULT '0'";
mysqli_query($con, $sql);


// sql to create table
$emailtable = "CREATE TABLE emailtext(
id INT(6) AUTO_INCREMENT PRIMARY KEY,
code VARCHAR(50) NOT NULL,
etext text NOT NULL,
emailactive INT(4)
)";

if (!mysqli_query($con, $emailtable))
echo "Error creating table: " . mysqli_error($con);

$sql = "INSERT INTO emailtext (id, code, etext, emailactive) VALUES (NULL, 'NEWMEMBER', 'You have got new order, bingo!', '1')";
mysqli_query($con, $sql);

$sql = "INSERT INTO emailtext (id, code, etext, emailactive) VALUES (NULL, 'FORGOTPASSWORD', 'Hi, 
You have requested a password on our website and therefore we have sent the password on this email. If you haven't do it please ignore the email.

Regards
Team Skyey Technologies', '1')";
mysqli_query($con, $sql);

$sql = "INSERT INTO emailtext (id, code, etext, emailactive) VALUES (NULL, 'SIGNUP', 'This email is the confirmation for your order you have just signed up. Thank you for your interest. Our team welcomes you to our website. 

Regards
Team Skyey Technologies', '1')";
mysqli_query($con, $sql);


$sqllast = "ALTER TABLE settings ADD minmobile DOUBLE NOT NULL , ADD maxmobile DOUBLE NOT NULL , ADD footer VARCHAR(50) NOT NULL";
mysqli_query($con, $sqllast);
$sqllastt = "ALTER TABLE settings ADD header VARCHAR(50) NOT NULL";
mysqli_query($con, $sqllastt);
//30 march 2015 update
//banner table creating


//banner table creating ends


$sql1 = "ALTER TABLE paypalpayments ADD renacid int(5) NOT NULL default '0'";
mysqli_query($con, $sql1);

//30march update ends

$sql1 = "ALTER TABLE settings ADD maintain int(1) NOT NULL default '0'";
mysqli_query($con, $sql1);

$sql2 = "ALTER TABLE paypalpayments ADD renew int(1) NOT NULL default '0'";
mysqli_query($con, $sql2);

$sql3 = "ALTER TABLE packages ADD gateway int(4) NOT NULL default '3'";
mysqli_query($con, $sql3);

$sql4 = "ALTER TABLE packages ADD validity int(5) NOT NULL default '365'";
mysqli_query($con, $sql4);

$sql5 = "ALTER TABLE affiliateuser ADD expiry date NOT NULL default '2049-01-01'";
mysqli_query($con, $sql5);

$sql6 = "ALTER TABLE affiliateuser ADD bankname VARCHAR(250) NOT NULL DEFAULT 'Not Available' , ADD accountname VARCHAR(250) NOT NULL DEFAULT 'Not Available' , ADD accountno DOUBLE NOT NULL DEFAULT '0' , ADD accounttype INT NOT NULL DEFAULT '0' ";
mysqli_query($con, $sql6);

$sql7 = "ALTER TABLE affiliateuser ADD ifsccode VARCHAR(100) NOT NULL DEFAULT 'Not Available' ";
mysqli_query($con, $sql7);

$sql8 = "ALTER TABLE settings ADD alwdpayment INT NOT NULL DEFAULT '0' COMMENT 'user will get payment via paypal or via payment in bank account.'";
mysqli_query($con, $sql8);

$sql9 = "ALTER TABLE affiliateuser ADD getpayment INT NOT NULL DEFAULT '1' ";
mysqli_query($con, $sql9);

$sq20 = "ALTER TABLE affiliateuser CHANGE ipaddress ipaddress VARCHAR( 128 ) NOT NULL ;";
mysqli_query($con, $sq20);



print "<br><br>Update Successfully Done<br>";
print "<br>Now Delete this file from your server immediately";
?>