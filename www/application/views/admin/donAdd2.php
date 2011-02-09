<style>
input[type=text]{
width: 150px;
}
</style>
<?include APPPATH."views/includes/errors.php";?>
<b>Enter <i><?=$data['name']?></i> 's donation details:</b>
<form method="post" action="">
<table border="0" cellspacing="10" cellpadding="5">
	<tr>
		<td>Donation Amount</td>
		<td> : </td>
		<td><input type="text" name="donAmount"/></td>
	</tr>
	<tr>
		<td>Donation Date (YYYY-MM-DD)</td>
		<td> : </td>
		<td><input type="text" name="donDate"/></td>
	</tr>
	<tr>
		<td>Donation Mode</td>
		<td> : </td>
		<td>
		<select name="donMode">
		<option>Online</option>
		<option>Cheque/DD</option>
		<option>CC Avenue</option>
		<option>Cash</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Donation Details</td>
		<td> : </td>
		<td><textarea name="donDetails" rows="4" cols="30"></textarea></td>
	</tr>
	<tr>
		<td><input type="submit" value="Submit"/></td>
	</tr>
</table>

</form>