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
		<td bgcolor="#D7D6E9"><b>Batch</b></td>
		<td bgcolor="#D7D6E9"><b>Branch</b></td>
		<td bgcolor="#D7D6E9"><b>Amount</b></td>
		<td bgcolor="#D7D6E9"><b>Last Donated on</b></td>
	</tr>
<?foreach($data as $row):?>
	<tr>
		<td bgcolor="#efefef"><?=$row->name?></td>
		<td bgcolor="#efefef"><?=$row->batch?></td>
		<td bgcolor="#efefef"><?=$row->branch?></td>
		<td bgcolor="#efefef"><?=$row->donAmount?></td>
		<td bgcolor="#efefef"><?=date('jS  M,  Y',strtotime($row->lastDon))?></td>
	</tr>
<?endforeach?>
	</table>
</center>