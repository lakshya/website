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
		<td bgcolor="#D7D6E9"><b>Status</b></td>
		<td bgcolor="#D7D6E9"><b>Mobile</b></td>
		<td bgcolor="#D7D6E9"><b>Address</b></td>
	</tr>
	<?foreach($data as $row):?>
	<tr>
		<td bgcolor="#efefef"><?=$row->name?> 
		(<?php echo html::mailto($row->email, 'E-Mail')?> 
		| <?php echo html::anchor("library/edit/{$row->book_id}", 'Edit')?>)</td>
		<td bgcolor="#efefef"><?=$row->title?> by <?php echo $row->title; if($row->copies > 1) echo " (<span title=\"Number of Copies\"><i>{$row->copies} copies</i></span>)"?></td>
		<?if($row->status == "NO"):?>
		<?if($row->donDate == "0000-00-00"):?>
		<td bgcolor="#efefef">Pledged</td>
		<?elseif($row->donDate < date('Y-m-d')):?>
		<td bgcolor="#efefef"><font style='color: red'>
		<?="Pledged for ".date('jS  M,  Y',strtotime($row->donDate))?></font></td>
		<?else:?>
		<td bgcolor="#efefef"><?="Pledged for ".date('jS  M,  Y',strtotime($row->donDate))?></td>
		<?endif?>
		<?elseif($row->status == "YES"):?>
		<td bgcolor="#efefef"><?="<font style='color:green'>Donated on ".date('jS  M,  Y',strtotime($row->donDate))."</font>"?></td>
		<?endif?>
		<td bgcolor="#efefef"><?=$row->mobile?></td>
		<td bgcolor="#efefef"><?=$row->address?></td>
	</tr>
	<?endforeach?>
</table>
</center>
