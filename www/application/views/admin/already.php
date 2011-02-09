<style>
.coTab{
border: 1px solid #D7D6E9;
}

.coTab td{
height:20px;
vertical-align:middle;
padding-left: 10px;
text-align: left;
}

</style>
<br/>
<center>
<table width="100%" border="0" class="coTab" cellspacing="1">
	<tr>
		<td bgcolor="#D7D6E9"><b>Name</b></td>
		<td bgcolor="#D7D6E9"><b>Email</b></td>
		<td bgcolor="#D7D6E9"><b>Batch</b></td>
		<td bgcolor="#D7D6E9"></td>
		<td bgcolor="#D7D6E9"></td>
	</tr>
<?foreach($data as $row):?>
	<tr>
		<td bgcolor="#efefef"><a href="<?=url::site('admin/donAlready/'.$row->userId)?>"><?=$row->name?></a></td>
		<td bgcolor="#efefef"><?=$row->email?></td>
		<td bgcolor="#efefef"><?=$row->passedOut?></td>
		<td bgcolor="#efefef"><a href="<?=url::site('admin/editDonor/'.$row->userId)?>"><img src="/images/b_edit.png"></a></td>
		<td bgcolor="#efefef"><a href="<?=url::site('admin/delDonor/'.$row->userId)?>"><img src="/images/b_drop.png"></a></td>
	</tr>
<?endforeach?>
	</table>
</center>