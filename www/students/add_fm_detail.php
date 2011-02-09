<?php session_start(); ?>
<?php include("db_connect.php");?>
<?php include("ins_functions.php");?>
<?php

if(!isset($_SESSION['uid']))
{
	$_SESSION['warn']="PLEASE LOGIN";
	header("Location: index.php");
	exit();
}

$uid=$_SESSION['uid'];

if(!is_allowed($uid))
{
	$_SESSION['warn']="YOU ARE NOT ALLOWED TO MAKE ANY CHANGES.";
	header("Location: home_user.php");
	exit();
}

if($_REQUEST['action']=="submit")
{
	$name=$_REQUEST['name'];
	if(!is_notempty($name))
	{
		$_SESSION['warn']="PLEASE ENTER NAME";
		header("Location: add_fm_detail.php");
		exit();
	}
	
	$relation=$_REQUEST['relation'];

	$education=$_REQUEST['education'];
	if(!is_notempty($education))
	{
		$_SESSION['warn']="PLEASE ENTER EDUCATION";
		header("Location: add_fm_detail.php");
		exit();
	}
	
	$others=$_REQUEST['others'];
	if(!is_notempty($others))
	{
		$_SESSION['warn']="PLEASE ENTER OCCUPATION";
		header("Location: add_fm_detail.php");
		exit();
	}
	
	$sql="select * from lakshya_student_fs_details where uid='{$uid}'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$fmdet=$row['fmdet'];
	$fmdet_array=split(" XXX ",$fmdet);
	$mem_count=sizeof($fmdet_array);
	
	$mem_det=$mem_count." YY ".$name."  YY ".$relation." YY ".$education." YY ".$others." XXX ";
	
	$fmdet=$fmdet.$mem_det;
	
	$sql_update="update lakshya_student_fs_details set fmdet='{$fmdet}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$_SESSION['warn']="FAMILY MEMBER ADDED SUCCESSFULLY";
	header("Location: add_fm_detail.php");
	exit();
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Welcome :: The Lakshya Foundation</title>
<script type="text/javascript" language="javascript">
function checkaddfm(form)
{
	var f=form;
	if(f.name.value=="")
	{
		alert("Please enter  name.");
		return false;
	}
	if(f.education.value=="")
	{
		alert("Please enter  education.");
		return false;
	}
	if(f.others.value=="")
	{
		alert("Please enter  occupation & annual income.");
		return false;
	}
	return true;
}
function closewindow()
{
	window.close();
	if (window.opener && !window.opener.closed) {
	window.opener.location.reload();
	} 
}
</script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="lakshya, foundation, nitw, nit warangal" />
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
	
	<link rel="stylesheet" type="text/css" href="http://www.thelakshyafoundation.org/css/style.css" />
	<link rel="stylesheet" type="text/css" href="http://www.thelakshyafoundation.org/css/news.css" />
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
	<!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

	<script type="text/javascript" src="http://www.thelakshyafoundation.org/scripts/rsspausescroller.js"></script>
	<script type="text/javascript" src="http://www.thelakshyafoundation.org/scripts/script.js"></script>
	<script type="text/javascript" src="http://www.thelakshyafoundation.org/scripts/jquery.js"></script>
	<script type="text/javascript" src="http://www.thelakshyafoundation.org/scripts/jquery.innerfade.js"></script>

</head>
<body>
<div class="Block">
                    <div class="Block-tl"></div>
                    <div class="Block-tr"></div>
                    <div class="Block-bl"></div>
                    <div class="Block-br"></div>
                    <div class="Block-tc"></div>
                    <div class="Block-bc"></div>
                    <div class="Block-cl"></div>
                    <div class="Block-cr"></div>
                    <div class="Block-cc"></div>
                    <div class="Block-body">
                      <div class="BlockHeader">
                        <div class="header-tag-icon">
                          <div class="t">Add Family Member
						  <form method="post" action="add_fm_detail.php?action=submit" onsubmit="return checkaddfm(this);">
								<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="302" align="center"><?php 
			  		if($_SESSION['warn']!= NULL)
			  		{
			  			echo '<img src="images_kohana/BlockContentBullets.png" width="10" height="12" />&nbsp;<span class="text2">'.$_SESSION['warn'].'<span class="text2"></td>';
						$_SESSION['warn']=NULL;
			  		}
				?></td>
                              </tr>
                              <tr>
                                <td align="center">								</td>
                              </tr>
                            </table>
							<br />
							<table width="338" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td colspan="3" align="center">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="153" class="text2">Name</td>
                                <td width="5">&nbsp;</td>
                                <td width="180"><label>
                                  <input name="name" type="text" id="name" />
                                </label></td>
                              </tr>
                              <tr>
                                <td class="text2">Relation</td>
                                <td>&nbsp;</td>
                                <td><label>
                                  <select name="relation" id="relation">
                                    <option>Father</option>
                                    <option>Mother</option>
                                    <option>Brother</option>
                                    <option>Sister</option>
                                    <option>Guardian</option>
                                    <option>Other</option>
                                  </select>
                                </label></td>
                              </tr>
                              <tr>
                                <td class="text2">Education</td>
                                <td>&nbsp;</td>
                                <td><input name="education" type="text" id="education" /></td>
                              </tr>
                              <tr>
                                <td class="text2">Occupation and Annual Income</td>
                                <td>&nbsp;</td>
                                <td><textarea name="others" rows="3" id="others"></textarea></td>
                              </tr>
                              <tr>
                                <td class="text2">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right">
                                  <button class="Button" type="reset" name="EDIT"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">RESET</span></span></button>
                                </td>
                                <td>&nbsp;</td>
                                <td><button class="Button" type="submit" name="EDIT"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">SAVE</span> </span> </button></td>
                              </tr>
                              <tr>
                                <td colspan="3" align="center"></td>
                              </tr>
                            </table>
							
							<br />
							<p align="center"><button class="Button" onclick="closewindow();" type="button" name="EDIT"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">CLOSE WINDOW</span> </span> </button></p>
							</form></div>
                        </div>
                      </div>
                      <div class="BlockContent">
                        <div class="BlockContent-body">
                          <div></div>
                        </div>
                      </div>
                    </div>
</div>

</body>