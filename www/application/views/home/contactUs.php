<? 
include APPPATH."views/includes/errors.php";
$defaults = array('name' => '', 'email' => '', 'sub' => '', 'message' => '','captcha' => '');
$data = arr::overwrite($defaults, $data);
?><b></b><br/>
<br/>
<form action="" method="post">
<table width="600px" cellspacing="5">
<tr>
	<td width="100px">Name :</td>
	<td><input name="name" type="text" maxlength = "55" size = "32" value=<?=$data['name']?>></td>
</tr>
<tr>
	<td>Email-id :</td>
	<td><input name="email" type="text" maxlength = "125" size = "32" value=<?=$data['email']?>></td>
</tr>
<tr>
	<td>Subject :</td>
	<td><input name="sub" type="text" maxlength = "255" size = "48" value=<?=$data['sub']?>></td>
</tr>
<tr>
	<td>Message :</td>
	<td><?echo form::textarea('message', $data['message'],  'rows="8" cols="50"');?></td>
</tr>
</table>

<p><label for="geCaptcha">Verification : </label>
Type the characters you see in the picture below.</p>
<p><label> &nbsp;</label><? $captcha = new Captcha; echo $captcha->render();?></p>
<p><label> &nbsp;</label><?= form::input('captcha');?></p><br>

<p><label> &nbsp;</label><input type="submit" value="Submit"/>&nbsp;&nbsp;<input type="reset" value="Reset"/></p>
</form>
<br/><br/>