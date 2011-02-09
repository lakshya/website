<style>
input[type=text]{
width: 150px;
}
</style>
<?include APPPATH."views/includes/errors.php";?><br/>

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
		<td>Confirm Password</td>
		<td> : </td>
		<td><input type="password" name="confirmPasswd"/></td>
	</tr>

</table>
<p><label> &nbsp;</label><input type="submit" value="Submit"/>&nbsp;&nbsp;<input type="reset" value="Reset"/></p>
</form>
<br/><br/>
