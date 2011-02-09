<?//include APPPATH."views/includes/errors.php";?>
<form method="post" action="">
<table border="0" cellspacing="10" cellpadding="5">
	<tr> 
		<td>Old Password</td>
		<td> : </td>
		<td><input type="password" name="oldPasswd"/></td>
	</tr>
	<tr>
		<td>New Password</td>
		<td> : </td>
		<td><input type="password" name="newPasswd"/></td>
	</tr>
	<tr>
		<td>Confirm New Password</td>
		<td> : </td>
		<td><input type="password" name="confirmPasswd"/></td>
	</tr>
</table>
<input type="submit" value="Submit"/>
<input type="reset" value="Reset"/>
</form>