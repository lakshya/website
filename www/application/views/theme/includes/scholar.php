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
		<li style="clear:both;"><?= html::anchor('scholar','Fill the form')?></li>
		</ul>
		</div> 
	</div>
</div>