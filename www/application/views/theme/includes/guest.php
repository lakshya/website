
<div class="Block-body">
    <div class="BlockHeader">
        <div class="header-tag-icon">
			<div class="t">Log In</div>
        </div>
    </div>
	<div class="BlockContent">
		<div class="BlockContent-body">
			<div><form method="post" id="login" action="/user/login">
			<? if($this->session->get('url'))
				echo form::hidden('url',$this->session->get('url'));
			else
				echo form::hidden('url',url::current(true));
			?>
			Username:<br/>
			<input type="text" value="" name="username" style="width: 150px;"/><br/><br/>
			Password:<br/>
			<input type="password" value="" name="passwd" style="width: 150px;"/><br/>
			<button type="submit" name="signin">Sign In</button>
			</form>
			</div>
    <a href="/forgot"><font style="font-size:11px">Forgot Username / Password</font></a>
		</div> 
	</div>
</div>