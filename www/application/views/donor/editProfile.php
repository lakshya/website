<style>
input[type=text]{
width: 150px;
}
</style>
<?include APPPATH."views/includes/errors.php";?>

<form method="post" action="">
<table border="0" cellspacing="10" cellpadding="5">
	<tr> 
		<td>Name</td>
		<td> : </td>
		<td><input type="text" name="name" value="<?=$name?>"/></td>
	</tr>
	<tr>
		<td>Email-id</td>
		<td> : </td>
		<td><input type="text" name="email" value="<?=$email?>"/></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td> : </td>
		<td><input type="text" name="mobile" value="<?=$mobile?>"/></td>
	</tr>
	<tr>
		<td>Address</td>
		<td> : </td>
		<td><?php echo form::textarea('addr', $addr, 'rows="4" cols="30"')?></td>
	</tr>
		<tr>
		<td>City</td>
		<td> : </td>
		<td><input type="text" name="city" value="<?=$city?>"/></td>
	</tr>
		<tr>
		<td>State</td>
		<td> : </td>
		<td><input type="text" name="province" value="<?=$province?>"/></td>
	</tr>
		<tr>
		<td>Country</td>
		<td> : </td>
		<td><input type="text" name="country" value="<?=$country?>"/></td>
	</tr>
		<tr>
		<td>Pincode</td>
		<td> : </td>
		<td><input type="text" name="zipcode" value="<?=$zipcode?>"/></td>
	</tr>
	<tr>
		<td>Branch</td>
		<td> : </td>
		<td>
		<?php 
		$branches = array('ECE', 'EEE', 'Chemical', 'Mechanical', 'CSE', 'Civil', 'Metallurgy', 'Biotech');
		echo form::dropdown('branch', $branches, $branch);
		?>
		</td>
	</tr>
	<tr>
		<td>Roll No</td>
		<td> : </td>
		<td><input type="text" name="rollNo" value="<?=$rollNo?>"/></td>
	</tr>
	<tr>
		<td>Passed Out in</td>
		<td> : </td>
		<td><input type="text" name="passedOut" value="<?=$passedOut?>"/></td>
	</tr>
	<tr>
		<td>Proffession</td>
		<td> : </td>
		<td><input type="text" name="occupation" value="<?=$occupation?>"/></td>
	</tr>
</table>
<input type="submit" value="Update"/>
<input type="reset" value="Reset"/>
</form>