<?php session_start(); ?>
<?php include("db_connect.php");?>
<?php include("ins_functions.php");?>
<?php

if(isset($_SESSION['uid']))
{
	header("Location: home_user.php");
	exit();
}

$uid=$_REQUEST['uid'];

$sql="select * from lakshya_student_logins where uid='{$uid}'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$emailid=$row['emailid'];
	
$to=$emailid;
$subject="ACTIVATE ACCOUNT";
$body='<p>Thank you for registering with LAKSHYA FOUNDATION . </p>
	   <p>Please click on the link below to activate your account. </p>
	   <p></p>
	   <p><a href="http://www.thelakshyafoundation.org/students/activate.php?enc='.md5($uid).'"> Click here </a></p>
	   <p>Or Copy and paste the following link in browser</p>
	   <p>http://www.thelakshyafoundation.org/students/activate.php?enc='.md5($uid).'</p>';
send_email($to,$subject,$body);

$_SESSION['warn']="ACTIVATION MAIL SENT TO ".$emailid." SUCCESSFULLY";
header("Location: index.php");
exit();

?>