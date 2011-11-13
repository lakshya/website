<?php session_start(); ?>
<?php include("db_connect.php");?>
<?php include("ins_functions.php");?>
<?php

/*if(!isset($_SESSION['uid']))
{
	$_SESSION['warn']="PLEASE LOGIN";
	header("Location: index.php");
	exit();
}
*/

$enc_uid=$_REQUEST['enc'];

$sql="select username from lakshya_student_logins";
$result=mysql_query($sql);
$found=0;
while($row=mysql_fetch_row($result))
{
	if(md5($row[0])==$enc_uid)
	{
		$uid_user=$row[0];
		$found=1;
		break;
	}
}

if($found==0)
{
	$_SESSION['warn']="INVALID LINK";
	echo $_SESSION['warn'];
	exit();
}

if($_REQUEST['action']=="submit")
{
	$selected=$_REQUEST['selected'];
	$volunteer=$_REQUEST['volunteer'];
	$others=$_REQUEST['others'];
	
	$sql="select * from lakshya_student_logins where uid='{$uid_user}'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$apid=$row['apid'];
	$emailid=$row['emailid'];
	
	$sql="select * from lakshya_student_sl_details where uid='{$uid_user}'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if(mysql_affected_rows()==0)
	{
		$sql_insert="insert into lakshya_student_sl_details values('{$uid_user}','{$apid}','','','','','')";
		mysql_query($sql_insert);
	}
	
	$sql_update="update lakshya_student_sl_details set selected='{$selected}' where uid='{$uid_user}'";
	mysql_query($sql_update);
	
	$sql_update="update lakshya_student_sl_details set volunteer='{$volunteer}' where uid='{$uid_user}'";
	mysql_query($sql_update);
	
	$sql_update="update lakshya_student_sl_details set others='{$others}' where uid='{$uid_user}'";
	mysql_query($sql_update);
							
	$to=$emailid;
	$subject="UPDATES FROM LAKSHYA";
	$sql="select * from lakshya_student_sl_details where uid='{$uid_user}'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($row['selected']=="Yes")
	{
		$body='<p><div>Dear '.$uid_user.',</div>
<div>You have been shortlisted  for the second round of screening. After the second round, the final  list of scholars will be announced on 26th January 2011.</div>
<div>If any queries, contact Nagendra ( 2010 batch) at 9886395489 .</div>
<div>Regards,</div>
<div>The Lakshya team</div><br />';
	}
	if($row['selected']=="No")
	{
		$body='<p class="text2"><strong></strong><div>Dear '.$_SESSION['uid'].',</div>
<div>We are sorry to inform you  that you have not been shortlisted. Please do not feel disheartened, as  this only means that you are giving way to more needy and financially  insecure students. The fact that you have come this far, to NITW, shows  your determination to succeed in life despite all odds.</div>
<div>We wish you all the best.</div>
<div>Regards,</div>
<div>The Lakshya team</div><br />';
	}
	send_email($to,$subject,$body);
	
	$_SESSION['warn']="CHANGES SAVED SUCCESSFULLY AND EMAILED TO STUDENT.";
	header("Location: view_profile.php?enc=".$enc_uid);
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<title>Welcome :: The Lakshya Foundation</title>
</head>
<body>
							<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
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
                                <td colspan="3" align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left"><?php $sql="select * from lakshya_student_ps_details where uid='{$uid_user}'";
								  $result=mysql_query($sql);
								  $row=mysql_fetch_array($result);
							?></td>
                              </tr>

                              <tr>
                                <td colspan="3" align="left" class="text3"><strong>PERSONAL DETAILS </strong></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                                <td align="left" class="text3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="274" align="left" class="text2">FIRST NAME</td>
                                <td width="13" align="left">&nbsp;&nbsp; </td>
                                <td width="371" align="left" class="text3"><?php echo $row['fname'];?></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">DATE OF BIRTH </td>
                                <td align="left">&nbsp;&nbsp; </td>
                                <td align="left" class="text3"><?php if($row['dob']=="0000-00-00"){echo "";}else{echo $row['dob'];}?></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">SEX&nbsp;</td>
                                <td align="left">&nbsp;</td>
                                <td align="left" class="text3"><?php echo $row['sex'];?></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">ROLL NO&nbsp;</td>
                                <td align="left">&nbsp;&nbsp; </td>
                                <td align="left" class="text3"><?php echo $row['rollno'];?></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">BRANCH</td>
                                <td align="left">&nbsp;</td>
                                <td align="left" class="text3"><?php echo $row['branch'];?></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">BATCH</td>
                                <td align="left">&nbsp;</td>
                                <td align="left" class="text3"><?php echo $row['batch'];?></td>
                              </tr>
                            </table>
							<br />
							<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td colspan="3" align="center" valign="top"><span style="overflow:auto; height:500px">
                                  <?php $sql="select * from lakshya_student_ct_details where uid='{$uid_user}'";
								  $result=mysql_query($sql);
								  $row=mysql_fetch_array($result);
							?>
                                </span></td>
                              </tr>
                              <tr>
                                <td colspan="3" valign="top"><strong class="text3">CONTACT DETAILS </strong></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="text2">&nbsp;</td>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="275" align="left" valign="top" class="text2">HOSTEL ROOM NO </td>
                                <td width="15" align="left" valign="top">&nbsp;&nbsp; </td>
                                <td width="368" align="left" valign="top" class="text3"><?php echo $row['hroomno'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">BLOCK</td>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text3"><?php echo $row['hblock'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">PERMANENT ADDRESS </td>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text3"><?php echo $row['paddress'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">PINCODE</td>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text3"><?php if($row['pcode']==0){echo "";}else{echo $row['pcode'];}?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">DISTRICT</td>
                                <td align="left" valign="top">&nbsp;&nbsp; </td>
                                <td align="left" valign="top" class="text3"><?php echo $row['district'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">STATE</td>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text3"><?php echo $row['state'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">EMAIL ID </td>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text3"><?php echo $row['emailid'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">CONTACT NO </td>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top" class="text3"><?php echo $row['cno'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">PARENT/GUARDIAN CONTACT NO </td>
                                <td align="left" valign="top">&nbsp;&nbsp; </td>
                                <td align="left" valign="top" class="text3"><?php echo $row['pcno'];?></td>
                              </tr>
                            </table>
							<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td colspan="3" align="center"><span style="overflow:auto; height:500px">
                                  <?php $sql="select * from lakshya_student_ed_details where uid='{$uid_user}'";
								  $result=mysql_query($sql);
								  $row=mysql_fetch_array($result);
							?>
                                </span></td>
                              </tr>

                              <tr>
                                <td colspan="3"><strong class="text3">EDUCATION DETAILS </strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="275"><span class="text3">SSC</span></td>
                                <td width="15">&nbsp;</td>
                                <td width="368">&nbsp;</td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" class="text2"> BOARD </td>
                                <td align="left">&nbsp;&nbsp; </td>
                                <td align="left"><span class="text3"><?php echo $row['ssc_board'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">BATCH</td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3"><?php echo $row['ssc_batch'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">MARKS(%)</td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3">
                                  <?php if($row['ssc_marks']==0){echo "";}else{echo $row['ssc_marks'];}?>
                                </span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">SCHOOL NAME </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3"><?php echo $row['ssc_name'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">SCHOOL ADDRESS </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3"><?php echo $row['ssc_addr'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">SCHOOL TYPE </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3"><?php echo $row['ssc_type'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text3">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" class="text3">INTER</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" class="text2"> BOARD </td>
                                <td align="left">&nbsp;&nbsp; </td>
                                <td align="left"><span class="text3"><?php echo $row['int_board'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">BATCH</td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3"><?php echo $row['int_batch'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">MARKS(%)</td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3">
                                  <?php if($row['int_marks']==0){echo "";}else{echo $row['int_marks'];}?>
                                </span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">COLLEGE NAME </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3"><?php echo $row['int_name'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">COLLEGE ADDRESS </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3"><?php echo $row['int_addr'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">COLLEGE TYPE </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3"><?php echo $row['int_type'];?></span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text3">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" class="text3">AIEEE</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">ALL INDIA RANK</td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3">
                                  <?php if($row['air']==0){echo "";}else{echo $row['air'];}?>
                                </span></td>
                              </tr>

                              <tr>
                                <td align="left" class="text3">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" class="text3">NITW</td>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                              </tr>

                              <tr>
                                <td align="left" class="text2">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                                <td align="left">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">SEM 1 SGPA </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3">
                                  <?php if($row['sgpa1']==0){echo "";}else{echo $row['sgpa1'];}?>
                                </span></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">SEM 2 SGPA </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3">
                                  <?php if($row['sgpa2']==0){echo "";}else{echo $row['sgpa2'];}?>
                                </span></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">SEM 3 SGPA </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3">
                                  <?php if($row['sgpa3']==0){echo "";}else{echo $row['sgpa3'];}?>
                                </span></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">SEM 4 SGPA </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3">
                                  <?php if($row['sgpa4']==0){echo "";}else{echo $row['sgpa4'];}?>
                                </span></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">SEM 5 SGPA </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3">
                                  <?php if($row['sgpa5']==0){echo "";}else{echo $row['sgpa5'];}?>
                                </span></td>
                              </tr>
                              <tr>
                                <td align="left" class="text2">SEM 6 SGPA </td>
                                <td align="left">&nbsp;</td>
                                <td align="left"><span class="text3">
                                  <?php if($row['sgpa6']==0){echo "";}else{echo $row['sgpa6'];}?>
                                </span></td>
                              </tr>

                              <tr>
                                <td colspan="3" align="center"></td>
                              </tr>
                            </table>
							<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="658" align="center" valign="top"><span style="overflow:auto; height:500px">
                                  <?php $sql="select * from lakshya_student_fs_details where uid='{$uid_user}'";
									$result=mysql_query($sql);
									$row=mysql_fetch_array($result);
									$exdet=$row['exdet'];
									$exdet_array=split(" XXX ",$exdet);
									$ex_count=sizeof($exdet_array);
							?>
                                </span></td>
                              </tr>
                              <tr>
                                <td valign="top"><strong class="text3">OTHER EXAM  DETAILS </strong></td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" class="text2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" class="text2"><span style="overflow:auto; height:500px">
                                  <?php 
							  
							  if($exdet!="")
							  {
							  	
								  for($i=0;$i<$ex_count-1;$i++)
								  {
									$ex_det_array=split(" YY ",$exdet_array[$i]);
									echo '<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr>
									  <td width="275" align="left" class="text2">'.$ex_det_array[0].'</td>
									  <td width="15">&nbsp;</td>
									  <td width="368">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" class="text2">EXAM NAME</td>
									  <td>&nbsp;&nbsp; </td>
									  <td class="text3">'.$ex_det_array[1].'</td>
									</tr>
									<tr>
									  <td align="left" class="text2">YEAR</td>
									  <td>&nbsp;</td>
									  <td class="text3">'.$ex_det_array[2].'</td>
									</tr>
									<tr>
									  <td align="left" class="text2">RESULT </td>
									  <td>&nbsp;&nbsp; </td>
									  <td class="text3">'.$ex_det_array[3].'</td>
									</tr>
								  </table>
								  <br />';
								  }
							  }
							  ?>
                                </span></td>
                              </tr>
                            </table>
							<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center" valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="658" align="center" valign="top"><span style="overflow:auto; height:500px">
                                  <?php $sql="select * from lakshya_student_fs_details where uid='{$uid_user}'";
									$result=mysql_query($sql);
									$row=mysql_fetch_array($result);
									$fmdet=$row['fmdet'];
									$fmdet_array=split(" XXX ",$fmdet);
									$mem_count=sizeof($fmdet_array);
							?>
                                </span></td>
                              </tr>
                              <tr>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td valign="top"><strong class="text3">FAMILY  DETAILS </strong></td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" class="text2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" class="text2"><span style="overflow:auto; height:500px">
                                  <?php 
							  
							  if($fmdet!="")
							  {
							  	
								  for($i=0;$i<$mem_count-1;$i++)
								  {
									$mem_det_array=split(" YY ",$fmdet_array[$i]);
									echo '<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr>
									  <td width="275" align="left" class="text2">'.$mem_det_array[0].'</td>
									  <td width="15">&nbsp;</td>
									  <td width="368">&nbsp;</td>
									</tr>
									<tr>
									  <td align="left" class="text2">NAME</td>
									  <td>&nbsp;&nbsp; </td>
									  <td class="text3">'.$mem_det_array[1].'</td>
									</tr>
									<tr>
									  <td align="left" class="text2">RELATION</td>
									  <td>&nbsp;</td>
									  <td class="text3">'.$mem_det_array[2].'</td>
									</tr>
									<tr>
									  <td align="left" class="text2">EDUCATION </td>
									  <td>&nbsp;&nbsp; </td>
									  <td class="text3">'.$mem_det_array[3].'</td>
									</tr>
									<tr>
									  <td align="left" class="text2">OCCUPATION&nbsp;&amp; ANNUAL INCOME</td>
									  <td>&nbsp;</td>
									  <td class="text3">'.$mem_det_array[4].'</td>
									</tr>
								  </table>
								  <br />';
								  }
							  }
							  ?>
                                </span></td>
                              </tr>
                            </table>
							<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center" valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="658" align="center" valign="top"><span style="overflow:auto; height:500px">
                                  <?php $sql="select * from lakshya_student_fs_details where uid='{$uid_user}'";
									$result=mysql_query($sql);
									$row=mysql_fetch_array($result);
									$scdet=$row['scdet'];
									$scdet_array=split(" XXX ",$scdet);
									$sc_count=sizeof($scdet_array);
							?>
                                </span></td>
                              </tr>
                              <tr>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td valign="top"><strong class="text3">SCHOLORSHIP DETAILS </strong></td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" class="text2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" class="text2"><span style="overflow:auto; height:500px">
                                  <?php 
							  
							  if($scdet!="")
							  {
							  	
								  for($i=0;$i<$sc_count-1;$i++)
								  {
									$sc_det_array=split(" YY ",$scdet_array[$i]);
									echo '<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr>
									  <td width="275" align="left" class="text2">'.$sc_det_array[0].'</td>
									  <td width="15">&nbsp;</td>
									  <td width="368">&nbsp;</td>
									</tr>
									<tr>
									  <td align="right" class="text1">SCHOLORSHIP NAME</td>
									  <td>&nbsp;&nbsp; </td>
									  <td class="text3">'.$sc_det_array[1].'</td>
									</tr>
									<tr>
									  <td align="left" class="text2">AMOUNT</td>
									  <td>&nbsp;</td>
									  <td class="text3">'.$sc_det_array[2].'</td>
									</tr>
									<tr>
									  <td align="left" class="text2">COMMENTS </td>
									  <td>&nbsp;&nbsp; </td>
									  <td class="text3">'.$sc_det_array[3].'</td>
									</tr>
								  </table>
								  <br />';
								  }
							  }
							  ?>
                                </span></td>
                              </tr>
                            </table>
							<br />
							<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td colspan="3" align="center" valign="top"><span style="overflow:auto; height:500px">
                                  <?php $sql="select * from lakshya_student_at_details where uid='{$uid_user}'";
								  $result=mysql_query($sql);
								  $row=mysql_fetch_array($result);
							?>
                                </span></td>
                              </tr>

                              <tr>
                                <td colspan="3" align="left" valign="top" class="text3"><strong class="text3">ASSETS DETAILS </strong></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="text3">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="275" align="left" valign="top" class="text3">VEHICLES </td>
                                <td width="15" valign="top">&nbsp;&nbsp; </td>
                                <td width="368" valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <?php $vehicles=split("-",$row['vehicles']); ?>

                              <tr>
                                <td align="left" valign="top" class="text2">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="text2">TWO WHELLER </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3"><?php if($vehicles[0]==1){echo YES;}else { echo NO;}?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">FOUR WHEELER </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3"><?php if($vehicles[1]==1){echo YES;}else { echo NO;}?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text3">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="text3">HOUSE APPLIANCES </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <?php $happs=split("-",$row['happs']); ?>

                              <tr>
                                <td align="left" valign="top" class="text2">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="text2">TV</td>
                                <td valign="top">&nbsp;&nbsp; </td>
                                <td valign="top" class="text3"><?php if($happs[0]==1){echo YES;}else { echo NO;}?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">FRIDGE</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3"><?php if($happs[1]==1){echo YES;}else { echo NO;}?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">WASHING MACHINE </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3"><?php if($happs[2]==1){echo YES;}else { echo NO;}?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">HOUSE OWNERSHIP </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3"><?php echo $row['hownership'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">HOUSE TYPE </td>
                                <td valign="top">&nbsp;&nbsp; </td>
                                <td valign="top" class="text3"><?php echo $row['htype'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">AGRICULTURE LAND </td>
                                <td valign="top">&nbsp;&nbsp; </td>
                                <td valign="top" class="text3"><?php echo $row['agland'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">OTHER ASSETS </td>
                                <td valign="top">&nbsp;&nbsp; </td>
                                <td valign="top" class="text3"><?php echo $row['otassets'];?></td>
                              </tr>
                            </table>
							<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td colspan="3" align="center" valign="top"><span style="overflow:auto; height:500px">
                                  <?php $sql="select * from lakshya_student_ot_details where uid='{$uid_user}'";
								  $result=mysql_query($sql);
								  $row=mysql_fetch_array($result);
							?>
                                </span></td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left" valign="top"><strong class="text3">OTHER DETAILS </strong></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="275" align="left" valign="top" class="text2">How have you supported your education <BR />till now and why are you applying for the <BR />Lakshya scholarship? </td>
                                <td width="14" valign="top">&nbsp;</td>
                                <td width="369" valign="top" class="text3"><?php echo $row['tillnow'];?></td>
                              </tr>

                              <tr>
                                <td align="left" valign="top" class="text2">How will you manage if <br />you are not supported by Lakshya </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3"><?php echo $row['after'];?></td>
                              </tr>

                              <?php $happs=split("-",$row['happs']); ?>
                            </table>
<!--                            <br />
                            <br />
                            <table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="658" align="center" valign="top"><span class="big_text2" style="overflow:auto; height:500px">
                                  <?php $sql="select * from lakshya_student_sl_details where uid='{$uid_user}'";
								  $result=mysql_query($sql);
								  if(mysql_affected_rows()==0)
								  {
								  	echo "This application is not yet reviewed";
								  }
								  $row=mysql_fetch_array($result);
								  
							?></span></td>
                              </tr>

                              <?php $happs=split("-",$row['happs']); ?>
                            </table>
                            <br />
                            <br />
                            <form method="post" action="view_profile.php?action=submit&enc=<?php echo $enc_uid;?>">
							<table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td colspan="3" align="center" valign="top"><span style="overflow:auto; height:500px">
                                  <?php $sql="select * from lakshya_student_sl_details where uid='{$uid_user}'";
								  $result=mysql_query($sql);
								  $row=mysql_fetch_array($result);
							?>
                                </span></td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left" valign="top"><strong class="text3">EDIT VOLUNTEER COMMENTS </strong></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="text2">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="275" align="left" valign="top" class="text2">Shortlisted or Not ? </td>
                                <td width="14" valign="top">&nbsp;</td>
                                <td width="369" valign="top" class="text3">
                                
                                    <input name="selected" type="radio" id="selected" <?php if($row['selected']=="Yes"){echo 'checked="checked"';}?> 
									value="Yes" />
                                    Yes
                                 
                                    <input name="selected" type="radio" value="No" <?php if($row['selected']!="Yes"){echo 'checked="checked"';}?> 
									 />
                                    No                                </td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="text2">Verified By </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3"><select name="volunteer" id="volunteer">
                                  <option>Nagendra Babu</option>
                                  <option>Ashok Reddy</option>
                                  <option>Mallikharjun Goud</option>
								<?php if($row['volunteer']!=""){echo '<option selected="selected">'.$row['volunteer'].'</option>';}?>
                                                                                                </select></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="text2">Other Information (For our purpose only it won't be displayed to student) </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3"><label>
                                  <textarea name="others" cols="50" rows="5" id="others"><?php echo $row['others'];?></textarea>
                                </label></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" class="text2">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top" class="text3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right"><button class="Button" type="reset" name="reset"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">RESET</span> </span> </button></td>
                                <td>&nbsp;</td>
                                <td><button class="Button" type="submit" name="signin"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">SUBMIT</span> </span> </button></td>
                              </tr>
                              <?php $happs=split("-",$row['happs']); ?>
                            </table>
                            </form>
<p>&nbsp;</p>
--></body>
</html>