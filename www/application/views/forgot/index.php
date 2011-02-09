<? 
include APPPATH."views/includes/errors.php";
$defaults = array('email' => '','captcha' => '');
?><b></b><br/>
<br/>
<form action="" method="post">
<table width="600px" cellspacing="5">
<tr>
	<td width="150px"><b>Enter your Email-id :</b></td>
	<td><input name="email" type="text" maxlength = "55" size = "32" value=""></td>
</tr>
</table>

<p><label for="geCaptcha">Verification : </label>
Type the characters you see in the picture below.</p>
<p><label> &nbsp;</label><? $captcha = new Captcha; echo $captcha->render();?></p>
<p><label> &nbsp;</label><?= form::input('captcha');?></p><br>

<p><label> &nbsp;</label><input type="submit" value="Submit"/>&nbsp;&nbsp;<input type="reset" value="Reset"/></p>
</form>
<br/><br/>