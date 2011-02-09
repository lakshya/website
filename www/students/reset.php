<?php session_start(); ?>
<?php include("db_connect.php");?>
<?php include("ins_functions.php");?>
<?php

if(isset($_SESSION['uid']))
{
	header("Location: home_user.php");
	exit();
}

if($_REQUEST['action']=="submit")
{

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
		$_SESSION['warn']="INVALID DETAILS";
		header("Location: reset.php?enc=".$enc_uid);
		exit();
	}
	
	$password1=$_REQUEST['password1'];
	if(!is_notempty($password1))
	{
		$_SESSION['warn']="PLEASE ENTER PASSWORD";
		header("Location: reset.php?enc=".$enc_uid);
		exit();
	}
	
	$password2=$_REQUEST['password2'];
	if(!is_notempty($password2))
	{
		$_SESSION['warn']="PLEASE RE ENTER PASSWORD";
		header("Location: reset.php?enc=".$enc_uid);
		exit();
	}
	
	if($password1 !=$password2)
	{
		$_SESSION['warn']="PASSWORDS DID NOT MATCH";
		header("Location: reset.php?enc=".$enc_uid);
		exit();
	}
	
	if(strlen($password1)<6 || strlen($password1)>15)
	{
		$_SESSION['warn']="PASSWORDS SHOULD CONTAIN 6-15 CHARACTERS";
		header("Location: reset.php?enc=".$enc_uid);
		exit();
	}
	
	$enc_passwd=md5($password1);
	
	$sql_update_password="update lakshya_student_logins set password='{$enc_passwd}' where uid='{$uid}'";
	$mysql_result=mysql_query($sql_update_password);
	if(mysql_affected_rows()<0)
	{
		$_SESSION['warn']="UNABLE TO RESET YOUR PASSWORD.PLEASE TRY AGAIN LATER";
		header("Location: reset.php?enc=".$enc_uid);
		exit();
	}
	
	$_SESSION['warn']="PASSWORD CHANGED SUCCESSFULLY .&nbsp;<a href=index.php > CLICK HERE </a>&nbsp;TO LOGIN";
	header("Location: reset.php?enc=".$enc_uid);
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Welcome :: The Lakshya Foundation</title>
<script type="text/javascript" language="javascript">
function checkreset(form)
{
	var f=form;
	if(f.password1.value=="")
	{
		alert("Please enter password.");
		return false;
	}
	if(f.password2.value=="")
	{
		alert("Please re enter password.");
		return false;
	}
	if(f.password1.value!=f.password2.value)
	{
		alert("Passwords did not match.");
		return false;
	}
	if(f.password1.value.length<6 || f.password1.value.length>15)
	{
		alert("Password should contain 6-15 characters only.");
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
                            <h2 class="PostHeaderIcon-wrapper">
                            </h2>
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
            <form method="post" id="register" action="reset.php?action=submit&enc=<?php echo $enc_uid; ?>" onsubmit="return checkreset(this);">
              <div class="BlockHeader">
                <div class="header-tag-icon">
                  <div class="t">Reset Password </div>
                </div>
              </div>
              <br />
              <table width="431" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="209" align="right">&nbsp;</td>
                  <td width="15">&nbsp;</td>
                  <td width="207">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3" align="center">
                <?php 
			  		if($_SESSION['warn']!= NULL)
			  		{
			  			echo '<img src="images_kohana/BlockContentBullets.png" width="10" height="12" />&nbsp;<span class="text2">'.$_SESSION['warn'].'<span class="text2"></td>';
						$_SESSION['warn']=NULL;
			  		}
				?>                  </td>
                  </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="text1"><span class="text3"><img src="images_kohana/BlockHeaderIcon.png" alt="" width="16" height="23" /> LOGIN DETAILS</span></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="text1">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="text1">PASSWORD&nbsp;&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input name="password1" type="password" id="password1" style="width: 150px;" value=""/></td>
                </tr>
                <tr>
                  <td align="right" class="text1">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="text1">RE-ENTER PASSWORD&nbsp;&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input name="password2" type="password" id="password2" style="width: 150px;" value=""/></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">
				  <button class="Button" type="reset" name="reset"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">RESET</span> </span> </button></td>
                  <td>&nbsp;</td>
                  <td>
				  <button class="Button" type="submit" name="signin"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">SUBMIT</span> </span> </button></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3" align="center" class="text2"><a href="index.php">ALREADY REGISTERED, CLICK HERE TO LOGIN </a><a href="register.php"></a></td>
                </tr>
                <tr>
                  <td colspan="3" align="center" class="text2">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3" align="center" class="text2"><a href="register.php">CLICK TO REGISTER </a><a href="register.php"></a></td>
                  </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                </tr>
              </table>
              <p><br />
                <br />
              </p>
              </form>
          </div>
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