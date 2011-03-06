<? 
include APPPATH."views/includes/errors.php";
$defaults = array('name' => '', 'email' => '', 'sub' => '', 'message' => '','captcha' => '');
$data = arr::overwrite($defaults, $data);
?><b></b><br/>
<p><img src ="/images/contactus/email.png" alt ="Email Us" />&nbsp;Mail us at <i>info [AT] thelakshyafoundation.org</i></p>
<p><img src ="/images/contactus/phone.png" alt ="Phone Us" />&nbsp;You can reach us at <i>+919849365735</i> (Anand Rajagopalan)</p>
<a href="http://www.facebook.com/pages/The-Lakshya-Foundation/155497721149511"><img src="/images/contactus/facebook.jpg" alt="Follow us on Facebok"/></a>
<a href="http://www.twitter.com/lakshyatweets"><img src="http://twitter-badges.s3.amazonaws.com/twitter-a.png" alt="Follow lakshyatweets on Twitter"/></a>

<p>Alternatively, you can use the form below to reach us.</p>
<form action="" method="post">
<table width="500px" cellspacing="5" bgcolor="#EEEEEE">
<tr>
	<td width="100px">Your Name :</td>
</tr>
<tr>
	<td><input name="name" type="text" maxlength = "55" size = "48" value=<?=$data['name']?>></td>
</tr>
<tr>
	<td width="100px">Your Email-id :</td>
</tr>
	<td><input name="email" type="text" maxlength = "125" size = "48" value=<?=$data['email']?>></td>
</tr>
<tr>
	<td>Subject :</td>
</tr>
<tr>
	<td><input name="sub" type="text" maxlength = "255" size = "48" value=<?=$data['sub']?>></td>
</tr>
<tr>
	<td>Your Message :</td>
</tr>
<tr>
	<td><?echo form::textarea('message', $data['message'],  'rows="8" cols="40"');?></td>
</tr>
</table>

<p><label for="geCaptcha">Verification : </label>
Type the characters you see in the picture below.</p>
<p><label> &nbsp;</label><? $captcha = new Captcha; echo $captcha->render();?></p>
<p><label> &nbsp;</label><?= form::input('captcha');?></p>
<p><label> &nbsp;</label><input type="submit" value="Submit"/>&nbsp;&nbsp;<input type="reset" value="Reset"/></p>
</form>

