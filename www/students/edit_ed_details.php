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
	$ssc_board=$_REQUEST['ssc_board'];
	
	$sql_update="update lakshya_student_ed_details set ssc_board='{$ssc_board}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$ssc_batch=$_REQUEST['ssc_batch'];
	
	$sql_update="update lakshya_student_ed_details set ssc_batch='{$ssc_batch}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$ssc_marks=$_REQUEST['ssc_marks'];
	if(!is_numeric($ssc_marks) || $ssc_marks <=0 || $ssc_marks >=100)
	{
		$_SESSION['warn']="PLEASE ENTER SCHOOL MARKS";
		header("Location: edit_ed_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ed_details set ssc_marks='{$ssc_marks}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$ssc_name=$_REQUEST['ssc_name'];
	if(!is_notempty($ssc_name))
	{
		$_SESSION['warn']="PLEASE ENTER SCHOOL NAME";
		header("Location: edit_ed_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ed_details set ssc_name='{$ssc_name}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$ssc_addr=$_REQUEST['ssc_addr'];
	if(!is_notempty($ssc_addr))
	{
		$_SESSION['warn']="PLEASE ENTER SCHOOL ADDRESS";
		header("Location: edit_ed_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ed_details set ssc_addr='{$ssc_addr}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$ssc_type=$_REQUEST['ssc_type'];
	
	$sql_update="update lakshya_student_ed_details set ssc_type='{$ssc_type}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$int_board=$_REQUEST['int_board'];
	
	$sql_update="update lakshya_student_ed_details set int_board='{$int_board}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$int_batch=$_REQUEST['int_batch'];
	
	$sql_update="update lakshya_student_ed_details set int_batch='{$int_batch}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$int_marks=$_REQUEST['int_marks'];
	if(!is_numeric($int_marks) || $int_marks <=0 || $int_marks >=100)
	{
		$_SESSION['warn']="PLEASE ENTER COLLEGE MARKS";
		header("Location: edit_ed_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ed_details set int_marks='{$int_marks}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$int_name=$_REQUEST['int_name'];
	if(!is_notempty($int_name))
	{
		$_SESSION['warn']="PLEASE ENTER COLLEGE NAME";
		header("Location: edit_ed_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ed_details set int_name='{$int_name}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$int_addr=$_REQUEST['int_addr'];
	if(!is_notempty($int_addr))
	{
		$_SESSION['warn']="PLEASE ENTER COLLEGE ADDRESS";
		header("Location: edit_ed_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ed_details set int_addr='{$int_addr}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$int_type=$_REQUEST['int_type'];
	
	$sql_update="update lakshya_student_ed_details set int_type='{$int_type}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$air=$_REQUEST['air'];
	if(!is_numeric($air) || $air <=0)
	{
		$_SESSION['warn']="PLEASE ENTER ALL INDIA RANK";
		header("Location: edit_ed_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ed_details set air='{$air}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$sgpa1=$_REQUEST['sgpa1'];
	if($sgpa1!="")
	{
		if($sgpa1 <=0 || $sgpa1 >10)
		{
			$_SESSION['warn']="PLEASE ENTER PROPER SGPA FOR SEMSTER 1";
			header("Location: edit_ed_details.php");
			exit();
		}
	}
	
	$sql_update="update lakshya_student_ed_details set sgpa1='{$sgpa1}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$sgpa2=$_REQUEST['sgpa2'];
	if($sgpa2!="")
	{
		if($sgpa2 <=0 || $sgpa2 >10)
		{
			$_SESSION['warn']="PLEASE ENTER PROPER SGPA FOR SEMSTER 2";
			header("Location: edit_ed_details.php");
			exit();
		}
	}
	
	$sql_update="update lakshya_student_ed_details set sgpa2='{$sgpa2}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$sgpa3=$_REQUEST['sgpa3'];
	if($sgpa3!="")
	{
		if($sgpa3 <=0 || $sgpa3 >10)
		{
			$_SESSION['warn']="PLEASE ENTER PROPER SGPA FOR SEMSTER 3";
			header("Location: edit_ed_details.php");
			exit();
		}
	}
	
	$sql_update="update lakshya_student_ed_details set sgpa3='{$sgpa3}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$sgpa4=$_REQUEST['sgpa4'];
	if($sgpa4!="")
	{
		if($sgpa4 <=0 || $sgpa4 >10)
		{
			$_SESSION['warn']="PLEASE ENTER PROPER SGPA FOR SEMSTER 4";
			header("Location: edit_ed_details.php");
			exit();
		}
	}
	
	$sql_update="update lakshya_student_ed_details set sgpa4='{$sgpa4}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$sgpa5=$_REQUEST['sgpa5'];
	if($sgpa5!="")
	{
		if($sgpa5 <=0 || $sgpa5 >10)
		{
			$_SESSION['warn']="PLEASE ENTER PROPER SGPA FOR SEMSTER 5";
			header("Location: edit_ed_details.php");
			exit();
		}
	}
	
	$sql_update="update lakshya_student_ed_details set sgpa5='{$sgpa5}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$sgpa6=$_REQUEST['sgpa6'];
	if($sgpa6!="")
	{
		if($sgpa6 <=0 || $sgpa6 >10)
		{
			$_SESSION['warn']="PLEASE ENTER PROPER SGPA FOR SEMSTER 6";
			header("Location: edit_ed_details.php");
			exit();
		}
	}
	
	$sql_update="update lakshya_student_ed_details set sgpa6='{$sgpa6}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$_SESSION['warn']="CHANGES SAVED SUCCESSFULLY.PLEASE GO A HEAD WITH THE NEXT SECTION.";
	header("Location: ex_details.php");
	exit();
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Welcome :: The Lakshya Foundation</title>
<script type="text/javascript" language="javascript">
function checkedited(form)
{
	var f=form;
	if(f.ssc_name.value=="")
	{
		alert("Please enter school name.");
		return false;
	}
	if(parseInt(f.ssc_marks.value)!=f.ssc_marks.value || f.ssc_marks.value >= 100 || f.ssc_marks.value <= 0)
	{
		alert("Please enter school marks");
		return false;
	}
	if(f.ssc_addr.value=="")
	{
		alert("Please enter school address");
		return false;
	}
	if(f.int_name.value=="")
	{
		alert("Please enter college name.");
		return false;
	}
	if(parseInt(f.int_marks.value)!=f.int_marks.value || f.int_marks.value >= 100 || f.int_marks.value <= 0)
	{
		alert("Please enter 12th marks");
		return false;
	}
	if(f.int_addr.value=="")
	{
		alert("Please enter college address");
		return false;
	}
	if(parseInt(f.air.value)!=f.air.value || f.air.value <=0)
	{
		alert("Please enter proper all india rank");
		return false;
	}
	var i;
	i=f.sgpa1.value;
	if(i!="")
	{
		if(parseFloat(i)!=i || i <=0 || i >10 )
		{
			alert("Please enter proper semster 1 sgpa");
			return false;
		}
	}
	i=f.sgpa2.value;
	if(i!="")
	{
		if(parseFloat(i)!=i || i <=0 || i >10 )
		{
			alert("Please enter proper semster 2 sgpa");
			return false;
		}
	}
	i=f.sgpa3.value;
	if(i!="")
	{
		if(parseFloat(i)!=i || i <=0 || i >10 )
		{
			alert("Please enter proper semster 3 sgpa");
			return false;
		}
	}
	i=f.sgpa4.value;
	if(i!="")
	{
		if(parseFloat(i)!=i || i <=0 || i >10 )
		{
			alert("Please enter proper semster 4 sgpa");
			return false;
		}
	}
	i=f.sgpa5.value;
	if(i!="")
	{
		if(parseFloat(i)!=i || i <=0 || i >10 )
		{
			alert("Please enter proper semster 5 sgpa");
			return false;
		}
	}
	i=f.sgpa6.value;
	if(i!="")
	{
		if(parseFloat(i)!=i || i <=0 || i >10 )
		{
			alert("Please enter proper semster 6 sgpa");
			return false;
		}
	}
	return true;
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
<div class="PageBackgroundSimpleGradient">
</div>

<div class="PageBackgroundGlare">
    <div class="PageBackgroundGlareImage"></div>
</div>
    
    
    <div class="Main">
        <div class="Sheet">
            <div class="Sheet-tl"></div>
            <div class="Sheet-tr"></div>
            <div class="Sheet-bl"></div>
            <div class="Sheet-br"></div>

            <div class="Sheet-tc"></div>
            <div class="Sheet-bc"></div>
            <div class="Sheet-cl"></div>
            <div class="Sheet-cr"></div>
            <div class="Sheet-cc"></div>
            
            <div class="Sheet-body">
				<div class="Header">
<div class="Header-png"></div>
<div class="Header-jpeg"></div>
<div class="logo"></div>

</div>                <div class="nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="artmenu">
                		<li><a href="http://www.thelakshyafoundation.org/" class="{ActiveItem}"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>
                		<li><a href="#"><span class="l"></span><span class="r"></span><span class="t">About Us</span></a>
							<ul>
								<li><a href="http://www.thelakshyafoundation.org/aboutUs/">About Lakshya</a></li>

								<li><a href="http://www.thelakshyafoundation.org/history/">History</a></li>
								<li><a href="http://www.thelakshyafoundation.org/team/">Lakshya Team</a></li>
							</ul>
                		</li>
                		<li><a href="#"><span class="l"></span><span class="r"></span><span class="t">Projects</span></a>
                			<ul>
                				<li><a href="#">Funding NITW Students</a>

                					<ul>
                						<li><a href="http://www.thelakshyafoundation.org/project1/">Overview</a></li>
                						<li><a href="http://www.thelakshyafoundation.org/project1/#scholars">Scholars</a></li>
                					</ul>
                				</li>
								<li><a href="http://www.thelakshyafoundation.org/futureProj/">Future Projects</a></li>
                			</ul>

						</li>
                		<li><a href="#"><span class="l"></span><span class="r"></span><span class="t">Accounts</span></a>
                			<ul>
                				<li><a href="http://www.thelakshyafoundation.org/accounts/curMonth/">Recent Donations</a></li>
                				<li><a href="http://www.thelakshyafoundation.org/accounts/allDonations/">All Donations</a></li>
                				<li><a href="http://www.thelakshyafoundation.org/accounts/allExpenses/">All Expenses</a></li>
								<li><a href="http://www.thelakshyafoundation.org/images/accounts/transactions_Jul2008_Oct2009.pdf">Balance Sheet</a></li>

                			</ul>
                		</li>
						<li><a href="#"><span class="l"></span><span class="r"></span><span class="t">Gallery</span></a>
						<ul>
                				<li><a href="http://www.thelakshyafoundation.org/gallery/genMeet1/">1st General Body Meet</a></li>
                				<li><a href="http://www.thelakshyafoundation.org/gallery/gifts/">Gifts to Volunteers</a></li>
                			</ul>

						</li>
                		<li><a href="http://www.thelakshyafoundation.org/contactUs"><span class="l"></span><span class="r"></span><span class="t">Contact Us</span></a>
                		</li>
                		<li><a href="http://www.thelakshyafoundation.org/donate"><span class="l"></span><span class="r"></span><span class="t">Donate Now</span></a>
                		</li>
                	</ul>
                </div>                
                
                <div class="contentLayout">

                    <div class="content">
                        <div class="Post">
                            <div class="Post-body">
                        <div class="Post-inner">
                          <div class="PostContent">
                           
<center>
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
      <div class="BlockContent">
        <div class="BlockContent-body">
          <div>
              <div class="BlockHeader">
                <div class="header-tag-icon">
                  <div class="t"><span class="text1">welcome</span> <span class="text3"><?php echo $_SESSION['uid'];?></span> </div>
                </div>
              </div>
			  
              <br />
              <table width="606" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="151" height="441" valign="top"><div class="Block">
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
                          <div class="t">Menu</div>
                        </div>
                      </div>
                      <div class="BlockContent">
                        <div class="BlockContent-body">
                          <div>
						  <?php if(is_admin($uid))
						  		{
									include("menu_admin.php");
								}
								else
								{
									include("menu_user.php");
								}
						  ?>
                          </div>
                          </div>
                      </div>
                    </div>
                  </div></td>
                  <td width="9">&nbsp;</td>
                  <td width="446" valign="top"><div class="Block">
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
                          <div class="t">EDUCATIONAL DETAILS </div>
                        </div>
                      </div>
                      <div class="BlockContent">
                        <div class="BlockContent-body">
                          <div style="overflow:auto; height:500px">
                            <p>&nbsp;</p>
							<form method="post" action="edit_ed_details.php?action=submit" onsubmit="return checkedited(this);">
								<?php $sql="select * from lakshya_student_ed_details where uid='{$uid}'";
								  $result=mysql_query($sql);
								  $row=mysql_fetch_array($result);
							?>
								<table width="349" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td colspan="3" align="center"><?php 
			  		if($_SESSION['warn']!= NULL)
			  		{
			  			echo '<img src="images_kohana/BlockContentBullets.png" width="10" height="12" />&nbsp;<span class="text2">'.$_SESSION['warn'].'<span class="text2"></td>';
						$_SESSION['warn']=NULL;
			  		}
				?></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td><span class="text3">SSC</span></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td width="152">&nbsp;</td>
                                    <td width="15">&nbsp;</td>
                                    <td width="182">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1"> BOARD </td>
                                    <td>&nbsp;&nbsp; </td>
                                    <td><select name="ssc_board" id="ssc_board">
                                        <option>STATE BOARD</option>
                                        <option>CBSE</option>
                                        <option>ICSE</option>
                                        <?php if($row['ssc_board']!="")
								  {
                                  	echo '<option selected="selected">'.$row['ssc_board'].'</option>';
								  }
								  ?>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">BATCH</td>
                                    <td>&nbsp;</td>
                                    <td><select name="ssc_batch" id="ssc_batch">
                                        <?php if($row['ssc_batch']!="")
								  {
                                  	echo '<option selected="selected" value="'.$row['ssc_batch'].'">'.$row['ssc_batch'].'</option>';
								  }
								  ?>
                                        <?php for($i=2000;$i<=2020;$i++)
						  		 {

									echo '<option value="'.$i.'">'.$i.'</option>';

								 }
				    			?>
                                      
                                  
                                  
				    ?>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">MARKS(%)</td>
                                    <td>&nbsp;</td>
                                    <td><input name="ssc_marks" type="text" id="ssc_marks" style="width: 150px;" value="<?php if($row['ssc_marks']==0){echo "";}else{echo $row['ssc_marks'];}?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">SCHOOL NAME </td>
                                    <td>&nbsp;</td>
                                    <td><input name="ssc_name" type="text" id="ssc_name" style="width: 150px;" value="<?php echo $row['ssc_name'];?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">SCHOOL ADDRESS<br />
                                      <span class="text3">(City/Town , State are enough)</span> </td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="ssc_addr" rows="3" id="ssc_addr" style="width: 150px;"><?php echo $row['ssc_addr'];?></textarea></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">SCHOOL TYPE </td>
                                    <td>&nbsp;</td>
                                    <td><select name="ssc_type" id="ssc_type">
                                      <option>GOVERNMENT</option>
                                      <option>PRIVATE</option>
                                        <option>AIDED</option>
                                        <?php if($row['ssc_type']!="")
								  {
                                  	echo '<option selected="selected">'.$row['ssc_type'].'</option>';
								  }
								  ?>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="text3">INTER</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text3">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1"> BOARD </td>
                                    <td>&nbsp;&nbsp; </td>
                                    <td><select name="int_board" id="int_board">
                                        <option>STATE BOARD</option>
                                        <option>CBSE</option>
                                        <option>ICSE</option>
                                        <?php if($row['int_board']!="")
								  {
                                  	echo '<option selected="selected">'.$row['int_board'].'</option>';
								  }
								  ?>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">BATCH</td>
                                    <td>&nbsp;</td>
                                    <td><select name="int_batch" id="int_batch">
                                        <?php if($row['int_batch']!="")
								  {
                                  	echo '<option selected="selected" value="'.$row['int_batch'].'">'.$row['int_batch'].'</option>';
								  }
								  ?>
                                        <?php for($i=2000;$i<=2020;$i++)
						  		 {

									echo '<option value="'.$i.'">'.$i.'</option>';

								 }
				    			?>
                                      
                                  
                                  
                                  
				    ?>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">MARKS(%)</td>
                                    <td>&nbsp;</td>
                                    <td><input name="int_marks" type="text" id="int_marks" style="width: 150px;" value="<?php if($row['int_marks']==0){echo "";}else{echo $row['int_marks'];}?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">COLLEGE NAME </td>
                                    <td>&nbsp;</td>
                                    <td><input name="int_name" type="text" id="int_name" style="width: 150px;" value="<?php echo $row['int_name'];?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">COLLEGE ADDRESS <span class="text3">(City/Town , State are enough)</span> </td>
                                    <td>&nbsp;</td>
                                    <td><textarea name="int_addr" rows="3" id="int_addr" style="width: 150px;"><?php echo $row['int_addr'];?></textarea></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">COLLEGE TYPE </td>
                                    <td>&nbsp;</td>
                                    <td><select name="int_type" id="int_type">
                                      <option>GOVERNMENT</option>
                                      <option>PRIVATE</option>
                                        <option>AIDED</option>
                                        <?php if($row['int_type']!="")
								  {
                                  	echo '<option selected="selected">'.$row['int_type'].'</option>';
								  }
								  ?>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text3">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="text3">AIEEE</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text3">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">ALL INDIA RANK</td>
                                    <td>&nbsp;</td>
                                    <td><input name="air" type="text" id="air" style="width: 150px;" value="<?php if($row['air']==0){echo "";}else{echo $row['air'];}?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" class="text3">NITW</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" align="center" class="text3">LEAVE THIS SECTION IF NOT APPLICABLE </td>
                                    </tr>
                                  <tr>
                                    <td align="right" class="text3">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">SEM 1 SGPA </td>
                                    <td>&nbsp;</td>
                                    <td><input name="sgpa1" type="text" id="sgpa1" style="width: 150px;" value="<?php if($row['sgpa1']==0){echo "";}else{echo $row['sgpa1'];}?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">SEM 2 SGPA </td>
                                    <td>&nbsp;</td>
                                    <td><input name="sgpa2" type="text" id="sgpa2" style="width: 150px;" value="<?php if($row['sgpa2']==0){echo "";}else{echo $row['sgpa2'];}?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">SEM 3 SGPA </td>
                                    <td>&nbsp;</td>
                                    <td><input name="sgpa3" type="text" id="sgpa3" style="width: 150px;" value="<?php if($row['sgpa3']==0){echo "";}else{echo $row['sgpa3'];}?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">SEM 4 SGPA </td>
                                    <td>&nbsp;</td>
                                    <td><input name="sgpa4" type="text" id="sgpa4" style="width: 150px;" value="<?php if($row['sgpa4']==0){echo "";}else{echo $row['sgpa4'];}?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">SEM 5 SGPA </td>
                                    <td>&nbsp;</td>
                                    <td><input name="sgpa5" type="text" id="sgpa5" style="width: 150px;" value="<?php if($row['sgpa5']==0){echo "";}else{echo $row['sgpa5'];}?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text1">SEM 6 SGPA </td>
                                    <td>&nbsp;</td>
                                    <td><input name="sgpa6" type="text" id="sgpa6" style="width: 150px;" value="<?php if($row['sgpa6']==0){echo "";}else{echo $row['sgpa6'];}?>"/></td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text3">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="text3">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="right"><a href="ed_details.php">
                                      <button class="Button" type="button" name="EDIT"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">CANCEL</span></span></button>
                                    </a></td>
                                    <td>&nbsp;</td>
                                    <td><button class="Button" type="submit" name="EDIT"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">SAVE &amp; NEXT </span> </span> </button></td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" align="center"></td>
                                  </tr>
                                </table>
							</form>
                            <ul>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div></td>
                </tr>
              </table>
              </div>
          <p><br/>
            <a href="#"></a> </p>
          </div>
      </div>
    </div>
  </div>
  <p>&nbsp;  </p>
</center>
                                
                               
                                    
                          </div>
                            <div class="cleared"></div>
                        </div>
                        
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    
                    <div class="sidebar1">

                           
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
                                        <div class="t">Announcements</div>
                                    </div>
                                </div><div class="BlockContent">
                                    <div class="BlockContent-body">

                                        <div>
	<script>new rsspausescroller("site", "news", "rssclass", 3000, "", "date+description")
	</script>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>						
						<?php include("userbox.php");?>
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
                                        <div class="t">Newsletter</div>
                                    </div>

                                </div><div class="BlockContent">
                                    <div class="BlockContent-body">
                                        <div><form method="post" action="/newsletter">
										Email-id:
                                        <input type="text" name="email" style="width: 150px;"/>
                                        <button class="Button" type="submit">
                                              <span class="btn">
                                                  <span class="l"></span>
                                                  <span class="r"></span>

                                                  <span class="t">Subscribe</span>
                                              </span>
                                        </button>
                                        </form></div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
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
                                        <div class="t">Quick Links</div>
                                    </div>
                                </div><div class="BlockContent">
                                    <div class="BlockContent-body">
                                      <div>

                                              
                                        <table border=0 cellspacing=3>
                                        <tr><td>  <a href="http://www.thelakshyafoundation.org/quicklinks/faqs/">FAQs</a><br/>  </td></tr>
                                        <tr><td>  <a href="http://www.thelakshyafoundation.org/quicklinks/downloads/">Downloads</a><br/>  </td></tr>
                                        <tr><td>  <a href="http://www.thelakshyafoundation.org/quicklinks/genMeet/">General Body Meeting</a><br/>  </td></tr>

                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                
				</div>
                
            
                
                
                <div class="cleared"></div>

				<div class="Footer">
                    <div class="Footer-inner">
                        <a href="http://www.thelakshyafoundation.org/" class="rss-tag-icon"></a>
                        <div class="Footer-text">
                            <p>The Lakshya Foundation is a Registered Trust<br/>
                            <a href="http://www.thelakshyafoundation.org/sitemap">Sitemap</a> | <a href="mailto:info@thelakshyafoundation.org">Contact Us</a>

                                | <a href="http://www.nitw.ac.in">NIT Warangal</a><br/></p>
                        </div>
                    </div>
                    <div class="Footer-background"></div>
                </div>            </div>
        </div>
        <div class="cleared"></div>

        <p class="page-footer">Designed and Developed by <a href="mailto:webteam@thelakshyafoundation.org">Webteam</a> of Lakshya</p>    </div>

</body>

</html>