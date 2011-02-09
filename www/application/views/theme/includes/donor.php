<div class="Block-body">
    <div class="BlockHeader">
        <div class="header-tag-icon">
			<div class="t">Control Panel</div>
        </div>
    </div>
	<div class="BlockContent">
		<div class="BlockContent-body">
		<div style="float:left;margin-left:10px"><img src="/images/login.gif"/>
		<?=$this->session->get('username');?></div>
		<div style="float:right;margin-right:10px">[<?= html::anchor('user/logout', 'Logout')?>]</div><br/>
		<ul style="list-style:none;">
		<li style="clear:both;"><?= html::anchor('donor','Your donations')?></li>
		<li><?= html::anchor('donor/viewProfile','View Profile')?></li>
		<li><?= html::anchor('donor/editProfile','Edit Profile')?></li>
                <li><?= html::anchor('donor/editPassword','Change Password')?></li>
		</ul>
		</div> 
	</div>
</div>


