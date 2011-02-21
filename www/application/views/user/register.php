<style>
input[type=checkbox] {
	float: left;
}

label {
	width: 10em;
	float: left;
	text-align: left;
	margin-right: .5em;
	display: block;
	clear: left;
}

label.checkbox,label.radio {
	font-weight: normal;
	float: left;
	width: auto;
	text-align: left;
	clear: none;
}

.base {
	margin-left: 13em;
	margin-top: -1em;
	clear: left;
	color: #6f6f6f;
	font-family: arial, sans-serif;
	font-size: smaller;
}
</style>

<?include APPPATH."views/includes/errors.php";?>

<form method="post" action="">
<p><label for="username">*Desired username</label> <?php echo form::input('username', $data['username'])?></p>
<p><label for="passwd">*Password</label> <?php echo form::password('passwd')?></p>
<p><label for="confpasswd">*Confirm Password</label> <?php echo form::password('confpasswd')?></p>
<p><label for="name">*Name</label> <?php echo form::input('name', $data['name'])?></p>
<p><label for="email">*Email Id</label> <?php echo form::input('email', $data['email'])?></p>
<p><label for="mobile">Mobile</label> <?php echo form::input('mobile', $data['mobile'])?></p>
<p><label for="addr">Address</label> <?php echo form::textarea('addr', $data['addr'], 'rows="4" cols="30"')?></p>
<p><label for="city">City</label> <?php echo form::input('city', $data['city'])?></p>
<p><label for="province">State</label> <?php echo form::input('province', $data['province'])?></p>
<p><label for="country">Country</label> <?php echo form::input('country', $data['country'])?></p>
<p><label for="pincode">Pincode</label> <?php echo form::input('pincode', $data['pincode'])?></p>
<p><?php echo form::checkbox('terms', 'agree')?> <label for="terms"
	class="checkbox"> I agree to the Terms &amp; Conditions of the website</label><br />
</p>

<p><label for="captcha">*Verification : </label> Type the characters you
see in the picture below.</p>
<p><label> &nbsp;</label><?php $captcha = new Captcha(); echo $captcha->render();?></p>
<p><label> &nbsp;</label><?php echo form::input('captcha');?>


<div class="base">Letters are not case-sensitive</div>
<br />

<br />
<p><input type="submit" value="Register" /> <input type="reset"
	value="Reset" /></p>
</form>
