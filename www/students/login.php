<?php session_start(); ?>
<?php include("db_connect.php");?>
<?php include("ins_functions.php");?>
<?php

if(isset($_SESSION['username']))
{
	header("Location: home_user.php");
	exit();
}

$username=$_REQUEST['username'];
$passwd=$_REQUEST['passwd'];
$enc_passwd=md5($passwd);

if($username == ""  || $passwd == "")
{
	$_SESSION['warn']="USERNAME OR passwd CAN NOT BE LEFT BLANK";
	header("Location: index.php");
	exit();
}

$sql_login="select * from lakshya_student_logins where username='{$username}' and passwd='{$enc_passwd}'";
$mysql_result=mysql_query($sql_login);
if(mysql_affected_rows() != 1)
{
	$_SESSION['warn']="USERNAME AND passwd DID NOT MATCH.";
	header("Location: index.php");
	exit();
}

$sql_login="select * from lakshya_student_logins where username='{$username}' and passwd='{$enc_passwd}' and active=1";
$mysql_result=mysql_query($sql_login);
if(mysql_affected_rows() != 1)
{
	$_SESSION['warn']="YOUR ACCOUNT IS NOT ACTIVATED YET.&nbsp;<a href=sendactivemail.php?username=".$username.">CLICK HERE</a>&nbsp;TO RESEND ACTIVATION EMAIL";
	header("Location: index.php");
	exit();
}

$_SESSION['username']=$username;
$sql_last_login="select lastlogin_old from lakshya_student_logins where username='{$username}'";
$mysql_result=mysql_query($sql_last_login);
$row=mysql_fetch_row($mysql_result);
$lastlogin_old=$row[0];
$sql_update_lastlogin="update lakshya_student_logins set lastlogin_current='{$lastlogin_old}' where username='{$username}'";
$mysql_result=mysql_query($sql_update_lastlogin);
$sql_update_lastlogin="update lakshya_student_logins set lastlogin_old=now() where username='{$username}'";
$mysql_result=mysql_query($sql_update_lastlogin);
$sql_session_details="select * from lakshya_student_logins where username='{$username}'";
$mysql_result=mysql_query($sql_session_details);
$row=mysql_fetch_array($mysql_result);
$_SESSION['apid']=$row['apid'];
$_SESSION['lastlogin']=$row['lastlogin_current'];
$_SESSION['emailid']=$row['emailid'];
$_SESSION['name']=$row['fname'];

if($_REQUEST['to'] != NULL)
{
	header("Location: ".$_REQUEST['to']);
	exit();
}
else
{
	header("Location: home_user.php");
	exit();
}

?>