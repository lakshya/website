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
		<td><input type="text" name="name" value="<?=$data->name?>"/></td>
	</tr>
	<tr>
		<td>Username</td>
		<td> : </td>
		<td><input type="text" name="username" value="<?=$data->username?>"/></td>
	</tr>
	<tr>
		<td>Email-id</td>
		<td> : </td>
		<td><input type="text" name="email" value="<?=$data->email?>"/></td>
	</tr>
	<tr>
		<td>Address</td>
		<td> : </td>
		<td><?php echo form::textarea('addr', $data->addr, 'rows="4" cols="30"');?></td>
	</tr>
		<tr>
		<td>City</td>
		<td> : </td>
		<td><input type="text" name="city" value="<?=$data->city?>"/></td>
	</tr>
		<tr>
		<td>State</td>
		<td> : </td>
		<td><input type="text" name="province" value="<?=$data->province?>"/></td>
	</tr>
		<tr>
		<td>Country</td>
		<td> : </td>
		<td><input type="text" name="country" value="<?=$data->country?>"/></td>
	</tr>
		<tr>
		<td>Pincode</td>
		<td> : </td>
		<td><input type="text" name="pincode" value="<?=$data->zipcode?>"/></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td> : </td>
		<td><input type="text" name="mobile" value="<?=$data->mobile?>"/></td>
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
		<?php 
		$branches = array('ECE' => 'ECE', 'EEE' => 'EEE', 'Chemical' => 'Chemical', 'Mechanical' => 'Mechanical', 'CSE' => 'CSE', 'Civil' => 'Civil', 'Metallurgy' => 'Metallurgy', 'Biotech' => 'Biotech');
		echo form::dropdown('branch', $branches, $data->branch);
		?>
		</td>
	</tr>
	<tr>
		<td>Roll No</td>
		<td> : </td>
		<td><input type="text" name="rollNo" value="<?=$data->rollNo?>"/></td>
	</tr>
	<tr>
		<td>Passed Out in</td>
		<td> : </td>
		<td><input type="text" name="passedOut" value="<?=$data->passedOut?>"/></td>
	</tr>
	<tr>
		<td>Profession</td>
		<td> : </td>
		<td><input type="text" name="occupation" value="<?=$data->occupation?>"/></td>
	</tr>
	<tr>
		<td>Remarks</td>
		<td> : </td>
		<td><input type="text" name="remarks" value="<?=$data->remarks?>"/></td>
</table>
<input type="submit" value="Edit"/>
</form>
