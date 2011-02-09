<?php session_start(); ?>
<?php include("db_connect.php");?>
<?php include("ins_functions.php");?>
<?php

if(isset($_SESSION['uid']))
{
	header("Location: home_user.php");
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Welcome :: The Lakshya Foundation</title>
<script type="text/javascript" language="javascript">
function checklogin(form)
{
	var f=form;
	if(f.uid.value=="" || f.password.value=="")
	{
		alert("Username or password should not be left blank.");
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
                                <span class="PostHeader"></span>
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
		  <?php if($_REQUEST['from']!=NULL)
		  		{
					$to="?to=".$_REQUEST['from'];
				} 
		  ?>
            <form method="post" id="login" action="login.php<?php echo $to;?>"v onsubmit="return checklogin(this);">
              <div class="BlockHeader">
                <div class="header-tag-icon">
                  <div class="t">Log In</div>
                </div>
              </div>
              <p><br />
              </p>
              <table width="325" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3" align="center">
                <?php 
			  		if($_SESSION['warn']!= NULL)
			  		{
			  			echo '<img src="images_kohana/BlockContentBullets.png" width="10" height="12" />&nbsp;<span class="text2">'.$_SESSION['warn'].'<span class="text2"></td>';
						$_SESSION['warn']=NULL;
			  		}
				?>
                  </td>
                  </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="160" align="right" class="text1">USERNAME&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td width="13">&nbsp;&nbsp; </td>
                  <td width="152"><input name="uid" type="text" id="uid" style="width: 150px;" value=""/></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;&nbsp; </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="text1">PASSWORD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>&nbsp; </td>
                  <td><input name="password" type="password" id="password" style="width: 150px;" value=""/></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp; </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">
				  <button class="Button" type="reset" name="reset"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">RESET</span> </span> </button></td>
                  <td>&nbsp;</td>
                  <td>
				  <button class="Button" type="submit" name="signin"> <span class="btn"> <span class="l"></span> <span class="r"></span> <span class="t">SIGN IN</span> </span> </button></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3" align="center" class="text2"><a href="register.php">NEW USER .. CLICK TO REGISTER </a></td>
                  </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3" align="center" class="text2"><a href="forgot.php">FORGOT PASSWORD ? CLICK HERE </a></td>
                  </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p><br />
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