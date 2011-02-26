<div class="nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="artmenu">
                		<li><a href="<?echo url::base()?>" class="{ActiveItem}"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>
                		<li><a href="<?echo url::base().'aboutUs'?>"><span class="l"></span><span class="r"></span><span class="t">About Us</span></a>
							<ul>
								<li><?echo html::anchor('aboutUs','About Lakshya')?></li>
								<li><?echo html::anchor('team','Lakshya Team')?></li>
							</ul>
                		</li>
                		<li><a href="<?echo url::base().'scholorships'?>"><span class="l"></span><span class="r"></span><span class="t">Projects</span></a>
                			<ul>
                				<li><?echo html::anchor('scholarships','Lakshya Scholarships')?></li>
								<!--li><?echo html::anchor('asthra','Asthra')?></li-->
								<li><?echo html::anchor('http://www.theasthra.org','Asthra')?></li>
								<li><?echo html::anchor('innovation','The Innovation Project')?></li>
								<li><?echo html::anchor('library','The Library Project')?></li>
                                                                <li><?echo html::anchor('ekjodikapda','Ek Jodi Kapda')?></li>
                                                                
                                                
                			</ul>
						</li>
                		<li><a href="<?echo url::base().'allDonations'?>"><span class="l"></span><span class="r"></span><span class="t">Accounts</span></a>
                			<ul>
                				<li><?echo html::anchor('accounts/allDonations','Donations')?></li>
                				<li><?echo html::anchor('accounts/allExpenses','Expenses')?></li>
                                                <li><?echo html::anchor('accounts/transparency','Transparency')?></li>
                			</ul>
                		</li>
						
                		<li><a href="<?echo url::base().'contactUs'?>"><span class="l"></span><span class="r"></span><span class="t">Contact Us</span></a>
                		</li>
                		<li><a href="<?echo url::base().'donate'?>"><span class="l"></span><span class="r"></span><span class="t">Donate Now</span></a>
                		</li>
                	</ul>
                </div>
