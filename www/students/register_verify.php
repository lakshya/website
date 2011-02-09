<?php session_start(); ?>
<?php include("db_connect.php");?>
<?php include("ins_functions.php");?>
<?php

if(isset($_SESSION['uid']))
{
	header("Location: home_user.php");
	exit();
}

$emailid=$_REQUEST['emailid'];
if(!is_email($emailid))
{
	$_SESSION['warn']="PLEASE ENTER VALID EMAIL ID";
	header("Location: register.php");
	exit();
}

$uid=$_REQUEST['uid'];
if(!is_notempty($uid))
{
	$_SESSION['warn']="PLEASE ENTER USERNAME";
	header("Location: register.php");
	exit();
}
if(strlen($uid)<6 || strlen($uid)>15 )
{
	$_SESSION['warn']="USERNAME SHOULD CONTAIN 6-15 CHARACTERS ONLY";
	header("Location: register.php");
	exit();
}

$password1=$_REQUEST['password1'];
if(!is_notempty($password1))
{
	$_SESSION['warn']="PLEASE ENTER PASSWORD";
	header("Location: register.php");
	exit();
}

$password2=$_REQUEST['password2'];
if(!is_notempty($password2))
{
	$_SESSION['warn']="PLEASE RE ENTER PASSWORD";
	header("Location: register.php");
	exit();
}

if($password1 !=$password2)
{
	$_SESSION['warn']="PASSWORDS DID NOT MATCH";
	header("Location: register.php");
	exit();
}

if(strlen($password1)<6 || strlen($password1)>15)
{
	$_SESSION['warn']="PASSWORD SHOULD CONTAIN 6-15 CHARACTERS ONLY";
	header("Location: register.php");
	exit();
}

$sql_login="select * from lakshya_student_logins where uid='{$uid}'";
$mysql_result=mysql_query($sql_login);
if(mysql_affected_rows() != 0)
{
	$_SESSION['warn']="USERNAME NOT AVAILABLE";
	header("Location: register.php");
	exit();
}

$sql_login="select * from lakshya_student_logins where emailid='{$emailid}'";
$mysql_result=mysql_query($sql_login);
if(mysql_affected_rows() != 0)
{
	$_SESSION['warn']="EMAIL ID ENTERED IS ALREADY IN USE";
	header("Location: register.php");
	exit();
}

$enc_passwd=md5($password1);

$sql_apid="select count(apid) from lakshya_student_logins";
$result=mysql_query($sql_apid);
$row=mysql_fetch_row($result);
$apid=1000+$row[0];

$sql_insert_logins="insert into lakshya_student_logins values('{$uid}','{$enc_passwd}','{$apid}','{$emailid}',0,0,'NA','NA')";
$mysql_result=mysql_query($sql_insert_logins);
if(mysql_affected_rows()!=1)
{
		$_SESSION['warn']="ERROR_00 : REGISTRATION FAILED,PLEASE TRY AGAIN LATER";
		header("Location: register.php");
		exit();
}

$sql_insert_ps_details="insert into lakshya_student_ps_details values('{$uid}','{$apid}','','','','','','','')";
$mysql_result=mysql_query($sql_insert_ps_details);
if(mysql_affected_rows()!=1)
{
		$sql_delete_logins="delete from lakshya_student_logins where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_logins);
		$_SESSION['warn']="ERROR_01 : REGISTRATION FAILED , PLEASE TRY AGAIN LATER";
		header("Location: register.php");
		exit();
}

$sql_insert_ct_details="insert into lakshya_student_ct_details 
values('{$uid}','{$apid}','','','','','','','{$emailid}','','')";
$mysql_result=mysql_query($sql_insert_ct_details);
if(mysql_affected_rows()!=1)
{
		$sql_delete_logins="delete from lakshya_student_logins where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_logins);
		$sql_delete_ps_details="delete from lakshya_student_ps_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ps_details);
		$_SESSION['warn']="ERROR_02 : REGISTRATION FAILED , PLEASE TRY AGAIN LATER";
		header("Location: register.php");
		exit();
}

$sql_insert_at_details="insert into lakshya_student_at_details 
values('{$uid}','{$apid}','0-0','0-0-0','','','','')";
$mysql_result=mysql_query($sql_insert_at_details);
if(mysql_affected_rows()!=1)
{
		$sql_delete_logins="delete from lakshya_student_logins where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_logins);
		$sql_delete_ps_details="delete from lakshya_student_ps_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ps_details);
		$sql_delete_ct_details="delete from lakshya_student_ct_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ct_details);
		$_SESSION['warn']="ERROR_03 : REGISTRATION FAILED , PLEASE TRY AGAIN LATER";
		header("Location: register.php");
		exit();
}

$sql_insert_ot_details="insert into lakshya_student_ot_details 
values('{$uid}','{$apid}','','')";
$mysql_result=mysql_query($sql_insert_ot_details);
if(mysql_affected_rows()!=1)
{
		$sql_delete_logins="delete from lakshya_student_logins where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_logins);
		$sql_delete_ps_details="delete from lakshya_student_ps_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ps_details);
		$sql_delete_ct_details="delete from lakshya_student_ct_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ct_details);
		$sql_delete_at_details="delete from lakshya_student_at_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_at_details);
		$_SESSION['warn']="ERROR_04 : REGISTRATION FAILED , PLEASE TRY AGAIN LATER";
		header("Location: register.php");
		exit();
}

$sql_insert_fs_details="insert into lakshya_student_fs_details 
values('{$uid}','{$apid}','','','')";
$mysql_result=mysql_query($sql_insert_fs_details);
if(mysql_affected_rows()!=1)
{
		$sql_delete_logins="delete from lakshya_student_logins where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_logins);
		$sql_delete_ps_details="delete from lakshya_student_ps_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ps_details);
		$sql_delete_ct_details="delete from lakshya_student_ct_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ct_details);
		$sql_delete_at_details="delete from lakshya_student_at_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_at_details);
		$sql_delete_ot_details="delete from lakshya_student_ot_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ot_details);
		$_SESSION['warn']="ERROR_05 : REGISTRATION FAILED , PLEASE TRY AGAIN LATER";
		header("Location: register.php");
		exit();
}

$sql_insert_ed_details="insert into lakshya_student_ed_details 
values('{$uid}','{$apid}','','','','','','','','','','','','','','','','','','','')";
$mysql_result=mysql_query($sql_insert_ed_details);
if(mysql_affected_rows()!=1)
{
		$sql_delete_logins="delete from lakshya_student_logins where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_logins);
		$sql_delete_ps_details="delete from lakshya_student_ps_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ps_details);
		$sql_delete_ct_details="delete from lakshya_student_ct_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ct_details);
		$sql_delete_at_details="delete from lakshya_student_at_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_at_details);
		$sql_delete_ot_details="delete from lakshya_student_ot_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_ot_details);
		$sql_delete_fs_details="delete from lakshya_student_fs_details where uid='{$uid}'";
		$mysql_result=mysql_query($sql_delete_fs_details);
		$_SESSION['warn']="ERROR_06 : REGISTRATION FAILED , PLEASE TRY AGAIN LATER";
		header("Location: register.php");
		exit();
}

$to=$emailid;
$subject="ACTIVATE ACCOUNT";
$body='<p>Thank you for registering with LAKSHYA FOUNDATION . </p>
	   <p>Please click on the link below to activate your account. </p>
	   <p></p>
	   <p><a href="http://www.thelakshyafoundation.org/students/activate.php?enc='.md5($uid).'"> Click here </a></p>
	   <p>Or Copy and paste the following link in browser</p>
	   <p>http://www.thelakshyafoundation.org/students/activate.php?enc='.md5($uid).'</p>';
send_email($to,$subject,$body);

$to_admin="naresh.nitwcse@gmail.com,satish.nitw.89@gmail.com";
$subject_admin="NEW REGISTRATION";	  
$body_admin='<p>NEW USER REGISTERED </p>
	   <p>USERNAME  : '.$uid.'. </p>
	   <p>EMAIL ID  : '.$emailid.'</p>
	   <p>APPLICATION ID : '.$apid.'</p>';
send_email($to_admin,$subject_admin,$body_admin);

$_SESSION['warn']="REGISTERED SUCCESSFULLY.&nbsp;<a href=index.php> CLICK HERE </a>&nbsp; TO LOGIN.";
header("Location: register.php");
exit();


?>