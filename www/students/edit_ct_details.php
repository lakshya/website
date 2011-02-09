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
	$hroomno=$_REQUEST['hroomno'];
	if(!is_notempty($hroomno))
	{
		$_SESSION['warn']="PLEASE ENTER HOSTEL ROOM NO";
		header("Location: edit_ct_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ct_details set hroomno='{$hroomno}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$hblock=$_REQUEST['hblock'];
	
	$sql_update="update lakshya_student_ct_details set hblock='{$hblock}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$paddress=$_REQUEST['paddress'];
	if(!is_notempty($paddress))
	{
		$_SESSION['warn']="PLEASE ENTER ADDRESS";
		header("Location: edit_ct_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ct_details set paddress='{$paddress}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$pcode=$_REQUEST['pcode'];
	if(!is_numeric($pcode))
	{
		$_SESSION['warn']="PLEASE ENTER PINCODE";
		header("Location: edit_ct_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ct_details set pcode='{$pcode}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$district=$_REQUEST['district'];
	if(!is_notempty($district))
	{
		$_SESSION['warn']="PLEASE ENTER DISTRICT";
		header("Location: edit_ct_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ct_details set district='{$district}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$state=$_REQUEST['state'];
	
	$sql_update="update lakshya_student_ct_details set state='{$state}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$cno=$_REQUEST['cno'];
	if(!is_notempty($cno))
	{
		$_SESSION['warn']="PLEASE ENTER CONTACT NO";
		header("Location: edit_ct_details.php");
		exit();
	}
	
	$sql_update="update lakshya_student_ct_details set cno='{$cno}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$pcno=$_REQUEST['pcno'];
	
	$sql_update="update lakshya_student_ct_details set pcno='{$pcno}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$_SESSION['warn']="CHANGES SAVED SUCCESSFULLY.PLEASE GO A HEAD WITH THE NEXT SECTION.";
	header("Location: edit_ed_details.php");
	exit();
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Welcome :: The Lakshya Foundation</title>
<script type="text/javascript" language="javascript">
function checkeditct(form)
{
	var f=form;
	if(f.hroomno.value=="")
	{
		alert("Please enter hostel room no.");
		return false;
	}
	if(f.paddress.value=="")
	{
		alert("Please enter permanent address");
		return false;
	}
	if(parseInt(f.pcode.value)!=f.pcode.value)
	{
		alert("Please enter proper pincode");
		return false;
	}
	if(f.district.value=="")
	{
		alert("Please enter district");
		return false;
	}
	if(f.cno.value=="")
	{
		alert("Please enter contact no");
		return false;
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
                          <div class="t">CONTACT DETAILS </div>
                        </div>
                      </div>
                      <div class="BlockContent">
                        <div class="BlockContent-body">
                          <div style="overflow:auto; height:500px">
                            <form method="post" action="edit_ct_details.php?action=submit" onsubmit="return checkeditct(this);">
								<?php $sql="select * from lakshya_student_ct_details where uid='{$uid}'";
								  $result=mysql_query($sql);
								  $row=mysql_fetch_array($result);
							?>
                            <table width="347" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td colspan="3" align="center" valign="top"><?php 
			  		if($_SESSION['warn']!= NULL)
			  		{
			  			echo '<img src="images_kohana/BlockContentBullets.png" width="10" height="12" />&nbsp;<span class="text2">'.$_SESSION['warn'].'<span class="text2"></td>';
						$_SESSION['warn']=NULL;
			  		}
				?></td>
                              </tr>
                              <tr>
                                <td width="180" valign="top">&nbsp;</td>
                                <td width="17" valign="top">&nbsp;</td>
                                <td width="150" valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">HOSTEL ROOM NO </td>
                                <td valign="top">&nbsp;&nbsp; </td>
                                <td valign="top"><input name="hroomno" type="text" id="hroomno" style="width: 150px;" value="<?php echo $row['hroomno'];?>"/></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">BLOCK</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top"><select name="hblock" id="hblock">
                                  <option>1k Hostel</option>
                                  <option>1.6k Hostel</option>
                                  <option>Ladies Hostel</option>
                                  <option>1st Block</option>
                                  <option>2nd Block</option>
                                  <option>3rd Block</option>
                                  <option>4th Block</option>
                                  <option>5th Block</option>
                                  <option>6th Block</option>
                                  <option>7th Block</option>
                                  <option>8th Block</option>
                                  <option>9th Block</option>
                                  <option>10th Block</option>
                                  <option>11th Block</option>
                                  <option>12th Block</option>
                                  <option>13th Block</option>
                                  <option>14th Block</option>
								  <?php if($row['hblock']!="")
								  {
                                  	echo '<option selected="selected">'.$row['hblock'].'</option>';
								  }
								  ?>
                                </select></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">PERMANENT ADDRESS </td>
                                <td valign="top">&nbsp;&nbsp; </td>
                                <td valign="top"><textarea name="paddress" rows="4" id="paddress" style="width: 150px;"><?php echo $row['paddress'];?></textarea></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">PINCODE</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top"><input name="pcode" type="text" id="pcode" style="width: 150px;" value="<?php if($row['pcode']==0){echo "";}else{echo $row['pcode'];}?>"/></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">DISTRICT</td>
                                <td valign="top">&nbsp;&nbsp; </td>
                                <td valign="top"><input name="district" type="text" id="district" style="width: 150px;" value="<?php echo $row['district'];?>"/></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">STATE</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top"><select name="state" id="state">
                                  <option>Andhra Pradesh</option>
                                  <option>Arunachal Pradesh</option>
                                  <option>Assam</option>
                                  <option>Bihar</option>
                                  <option>Chhattisgarh</option>
                                  <option>Goa</option>
                                  <option>Gujarat</option>
                                  <option>Haryana</option>
                                  <option>Himachal Pradesh</option>
                                  <option>Jammu and Kashmir</option>
                                  <option>Jharkhand</option>
                                  <option>Karnataka</option>
                                  <option>Kerala</option>
                                  <option>Madhya Pradesh</option>
                                  <option>Maharashtra</option>
                                  <option>Manipur</option>
                                  <option>Meghalaya</option>
                                  <option>Mizoram</option>
                                  <option>Nagaland</option>
                                  <option>Orissa</option>
                                  <option>Punjab</option>
                                  <option>Rajasthan</option>
                                  <option>Sikkim</option>
                                  <option>Tamil Nadu</option>
                                  <option>Tripura</option>
                                  <option>Uttar Pradesh</option>
                                  <option>Uttarakhand</option>
                                  <option>West Bengal</option>
                                  <option>Andaman and Nicobar Islands</option>
                                  <option>Chandigarh</option>
                                  <option>Dadra and Nagar Haveli</option>
                                  <option>Daman and Diu</option>
                                  <option>Lakshadweep</option>
                                  <option>National Capital Territory of Delhi</option>
                                  <option>Puducherry</option>
								  <?php if($row['state']!="")
								  {
                                  	echo '<option selected="selected">'.$row['state'].'</option>';
								  }
								  ?>
                                </select></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">EMAIL ID </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top"><input name="emailid" disabled="disabled" type="text" id="emailid" style="width: 150px;" value="<?php echo $row['emailid'];?>"/></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">CONTACT NO </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top"><input name="cno" type="text" id="cno" style="width: 150px;" value="<?php echo $row['cno'];?>"/></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text1">PARENT/GUARDIAN CONTACT NO </td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top"><input name="pcno" type="text" id="pcno" style="width: 150px;" value="<?php echo $row['pcno'];?>"/></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text3">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top" class="text3">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right" valign="top"><a href="ct_details.php">
                                  <button class="Button" type="button" name="EDIT"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">CANCEL</span></span></button>
                                  </a></td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">
                                  <button class="Button" type="submit" name="EDIT"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">SAVE &amp; NEXT </span> </span> </button>                                  </td>
                              </tr>
                              <tr>
                                <td colspan="3" align="center">								</td>
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