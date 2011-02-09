<style>
input[type=text]{
width: 150px;
}
</style>
<?include APPPATH."views/includes/errors.php";?>
<b>Already a donor??</b> <a href="<?=url::site('admin/already')?>">Click here</a><br/><br/>
<b>New Donor??</b><br/>
<form method="post" action="">
<table border="0" cellspacing="10" cellpadding="5">
	<tr> 
		<td>Name</td>
		<td> : </td>
		<td><input type="text" name="name"/></td>
	</tr>
	<tr>
		<td>Username</td>
		<td> : </td>
		<td><input type="text" name="username"/></td>
	</tr>
	<tr>
		<td>Email-id</td>
		<td> : </td>
		<td><input type="text" name="email"/></td>
	</tr>
	<tr>
		<td>Address</td>
		<td> : </td>
		<td><textarea name="addr" rows="4" cols="30"></textarea></td>
	</tr>
		<tr>
		<td>City</td>
		<td> : </td>
		<td><input type="text" name="city"/></td>
	</tr>
		<tr>
		<td>State</td>
		<td> : </td>
		<td><input type="text" name="province"/></td>
	</tr>
		<tr>
		<td>Country</td>
		<td> : </td>
		<td><input type="text" name="country"/></td>
	</tr>
		<tr>
		<td>Pincode</td>
		<td> : </td>
		<td><input type="text" name="pincode"/></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td> : </td>
		<td><input type="text" name="mobile"/></td>
	</tr>
	<tr>
		<td>Donor Type</td>
		<td> : </td>
		<td><input type="radio" value="NITW" name="cat"/>NITW <input type="radio" value="OTH" name="cat"/>Others</td>
	</tr>
	<tr>
		<td>Branch</td>
		<td> : </td>
		<td>
		<select name="branch">
		<option></option>
		<option>ECE</option>
		<option>EEE</option>
		<option>Chemical</option>
		<option>Mechanical</option>
		<option>CSE</option>
		<option>Civil</option>
		<option>Metallurgy</option>
		<option>Biotech</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Roll No</td>
		<td> : </td>
		<td><input type="text" name="rollNo"/></td>
	</tr>
	<tr>
		<td>Passed Out in</td>
		<td> : </td>
		<td><input type="text" name="passedOut"/></td>
	</tr>
	<tr>
		<td>Proffession</td>
		<td> : </td>
		<td><input type="text" name="occupation"/></td>
	</tr>
	<tr>
		<td>Remarks</td>
		<td> : </td>
		<td><input type="text" name="remarks"/></td>
	</tr>
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