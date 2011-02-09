<style>
.coTab {
	border: 1px solid #D7D6E9;
}

.coTab td {
	height: 20px;
	vertical-align: middle;
	padding-left: 10px;
	text-align: left;
}
</style>
<br />
<center>
<table width="100%" border="0" class="coTab" cellspacing="1">
	<tr>
		<td bgcolor="#D7D6E9"><b>Name of Donor</b></td>
		<td bgcolor="#D7D6E9"><b>Book Title</b></td>
		<td bgcolor="#D7D6E9"><b>Author</b></td>
		<td bgcolor="#D7D6E9"><b>Status</b></td>
		<td bgcolor="#D7D6E9"><b>Mobile</b></td>
		<td bgcolor="#D7D6E9"><b>Email</b></td>
		<td bgcolor="#D7D6E9"><b>Address</b></td>
	</tr>
	<?foreach($data as $row):?>
	<tr>
		<td bgcolor="#efefef"><?=$row->name?></td>
		<td bgcolor="#efefef"><?=$row->title?></td>
		<td bgcolor="#efefef"><?=$row->author?></td>
		<?if($row->status == "NO"):?>
		<?if($row->donDate < date('Y-m-d')):?>
		<td bgcolor="#efefef"><font style='color: red'>pledged but not yet
		received</font></td>
		<?else:?>
		<td bgcolor="#efefef"><?="pledged for ".date('jS  M,  Y',strtotime($row->donDate))?></td>
		<?endif?>
		<?elseif($row->status == "YES"):?>
		<td bgcolor="#efefef"><?="<font style='color:green'>donated on ".date('jS  M,  Y',strtotime($row->donDate))."</font>"?></td>
		<?endif?>
		<td bgcolor="#efefef"><?=$row->mobile?></td>
		<td bgcolor="#efefef"><?=$row->email?></td>
		<td bgcolor="#efefef"><?=$row->address?></td>
	</tr>
	<?endforeach?>
</table>
</center>
