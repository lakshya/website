<?php session_start(); ?>
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
                                        <div class="t">Welcome </div>
                                    </div>

                                </div><div class="BlockContent">
                                    <div class="BlockContent-body">
                                        <div>
                                          <p><span class="text1">USERNAME   : </span><span class="text3"><?php echo $_SESSION['uid'];?></span></p>
                                          <p><span class="text1">APP NO     : </span><span class="text3"><?php echo $_SESSION['apid'];?></span></p>
										  <p><span class="text1">EMAIL: </span><span class="text3"><?php echo $_SESSION['emailid'];?></span></p>
                                          <p><span class="text1">LAST LOGIN : </span><span class="text3"><?php echo $_SESSION['lastlogin'];?></span></p>
										  <p><span class="text1">PROFILE COMPLETENESS : </span><span class="text3"><?php echo calculate_complete($uid);?>%</span></p>
                                          
                                          <table width="100" height="10" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
											<?php $per=calculate_complete($uid)/2;
											      $rem=50-($per);
												  for($i=1;$i<=$per;$i++)
												  {
                                              			echo '<td width="1" bgcolor="#006633">&nbsp;</td>';
												  }
												  for($i=1;$i<=$rem;$i++)
												  {
                                              			echo '<td width="1" bgcolor="#CC6600">&nbsp;</td>';
												  }
											?>
                                            </tr>
                                          </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>