<?php session_start(); ?>
<?php include("db_connect.php");?>
<?php include("ins_functions.php");?>
<?php

if(isset($_SESSION['uid']))
{
	header("Location: home_user.php");
	exit();
}

$enc_uid=$_REQUEST['enc'];

$sql="select uid from lakshya_student_logins";
$result=mysql_query($sql);
$found=0;
while($row=mysql_fetch_row($result))
{
	if(md5($row[0])==$enc_uid)
	{
		$uid=$row[0];
		$found=1;
		break;
	}
}

if($found==0)
{
	$_SESSION['warn']="INVALID LINK.PLEASE TRY AGAIN";
	header("Location: index.php");
	exit();
}
	
$sql_update="update lakshya_student_logins set active=1 where uid='{$uid}'";
$mysql_result=mysql_query($sql_update);
if(mysql_affected_rows() == 1)
{
	$_SESSION['warn']="YOUR ACCOUNT IS ACTIVATED .&nbsp;<a href=index.php>CLICK HERE </a>&nbsp;TO LOGIN.";
	header("Location: index.php");
	exit();
}
else if(mysql_affected_rows() == 0)
{
	$_SESSION['warn']="YOUR ACCOUNT IS ACTIVATED ALREADY";
	header("Location: index.php");
	exit();
}
else
{
	$_SESSION['warn']="UNABLE TO ACTIVATE YOUR ACCOUNT.PLEASE TRY AGAIN LATER";
	header("Location: index.php");
	exit();
}

?>