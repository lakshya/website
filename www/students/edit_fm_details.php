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

	$sql="select * from lakshya_student_fs_details where uid='{$uid}'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$fmdet=$row['fmdet'];
	$fmdet_array=split(" XXX ",$fmdet);
	$mem_count=sizeof($fmdet_array);
	
	$fmdet="";

	$j=0;
		
	for($i=0;$i<$mem_count-1;$i++)
	{
	
		if($_REQUEST['delete'.$i]!=1)
		{
			$name=$_REQUEST['name'.$i];
			if(!is_notempty($name))
			{
				$_SESSION['warn']="PLEASE ENTER NAME ".($i+1);
				header("Location: edit_fm_details.php");
				exit();
			}
			
			$relation=$_REQUEST['relation'.$i];
		
			$education=$_REQUEST['education'.$i];
			if(!is_notempty($education))
			{
				$_SESSION['warn']="PLEASE ENTER EDUCATION ".($i+1);
				header("Location: edit_fm_details.php");
				exit();
			}
			
			$others=$_REQUEST['others'.$i];
			if(!is_notempty($others))
			{
				$_SESSION['warn']="PLEASE ENTER OCCUPATION ".($i+1);
				header("Location: edit_fm_details.php");
				exit();
			}
			
			$mem_det=($j+1)." YY ".$name."  YY ".$relation." YY ".$education." YY ".$others." XXX ";
			
			$j++;
			
			$fmdet=$fmdet.$mem_det;
		}
			
	}
			
	$sql_update="update lakshya_student_fs_details set fmdet='{$fmdet}' where uid='{$uid}'";
	mysql_query($sql_update);
	
	$_SESSION['warn']="CHANGES SAVED SUCCESSFULLY.PLEASE GO A HEAD WITH THE NEXT SECTION.";
	header("Location: sc_details.php");
	exit();
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Welcome :: The Lakshya Foundation</title>
<script type="text/javascript" language="javascript">
function checkeditfm(form)
{
	var f=form;
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
                          <div class="t">FAMILY DETAILS </div>
                        </div>
                      </div>
                      <div class="BlockContent">
                        <div class="BlockContent-body">
                          <div style="overflow:auto; height:500px">
                            <p>&nbsp;</p>
							<form method="post" action="edit_fm_details.php?action=submit" onsubmit="return checkeditfm(this);">
								<?php $sql="select * from lakshya_student_fs_details where uid='{$uid}'";
									$result=mysql_query($sql);
									$row=mysql_fetch_array($result);
									$fmdet=$row['fmdet'];
									$fmdet_array=split(" XXX ",$fmdet);
									$mem_count=sizeof($fmdet_array);
							?>
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
							
							<p align="center"><br />
							  <?php for($i=0;$i<$mem_count-1;$i++)
							  {
                              	$mem_det_array=split(" YY ",$fmdet_array[$i]);
								echo '<table width="308" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
                                  <td width="124" align="left" class="text2">'.$mem_det_array[0].'</td>
                                  <td width="15">&nbsp;</td>
                                  <td width="169" align="right" class="text2"><input type="checkbox" name="delete'.$i.'" value="1"> Delete</td>
                                </tr>
                                <tr>
                                  <td width="124">&nbsp;</td>
                                  <td width="15">&nbsp;</td>
                                  <td width="169">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="right" class="text1">NAME</td>
                                  <td>&nbsp;&nbsp; </td>
                                  <td class="text3"><input type="text" name="name'.$i.'" value="'.$mem_det_array[1].'"/></td>
                                </tr>
                                <tr>
                                  <td align="right" class="text1">&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td class="text3">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="right" class="text1">RELATION</td>
                                  <td>&nbsp;</td>
                                  <td class="text3"><select name="relation'.$i.'" id="relation">
								';
								if($mem_det_array[2]!="")
								  {
                                  	echo '<option selected="selected">'.$mem_det_array[2].'</option>';
								  }
								  echo '
                                  
                                    <option>Father</option>
                                    <option>Mother</option>
                                    <option>Brother</option>
                                    <option>Sister</option>
                                    <option>Guardian</option>
                                    <option>Other</option>
                                  
                                                                </select></td>
                                </tr>
                                <tr>
                                  <td align="right" class="text1">&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td class="text3">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="right" class="text1">EDUCATION </td>
                                  <td>&nbsp;&nbsp; </td>
                                  <td class="text3"><input type="text" name="education'.$i.'" value="'.$mem_det_array[3].'"/></td>
                                </tr>
                                <tr>
                                  <td align="right" class="text1">&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td class="text3">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="right" class="text1">OCCUPATION&nbsp;&amp; ANNUAL INCOME</td>
                                  <td>&nbsp;</td>
                                  <td class="text3"><textarea name="others'.$i.'">'.$mem_det_array[4].'</textarea></td>
                                </tr>
                              </table>
							  <br />';
							  }
							  ?>
							</p>
							<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><a href="fm_details.php">
      <button class="Button" type="button" name="EDIT"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">CANCEL</span></span></button>
    </a></td>
    <td>&nbsp;</td>
    <td><button class="Button" type="submit" name="EDIT"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">SAVE &amp; NEXT </span> </span> </button></td>
  </tr>
</table>
</p>
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