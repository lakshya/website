<br/><b>Your donations :</b><br/><br/>
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
		<td bgcolor="#D7D6E9"><b>Amount</b></td>
		<td bgcolor="#D7D6E9"><b>Donated on</b></td>
		<td bgcolor="#D7D6E9"><b>Donation Mode</b></td>
		<td bgcolor="#D7D6E9"><b>Details</b></td>
	</tr>
<?foreach($data as $row):?>
	<tr>
		<td bgcolor="#efefef"><?=$row->amount?></td>
		<td bgcolor="#efefef"><?=date('dS M, Y',strtotime($row->donDate))?></td>
		<td bgcolor="#efefef"><?=$row->donMode?></td>
		<td bgcolor="#efefef"><?=$row->details?></td>
	</tr>
<?endforeach?>
	</table>
</center>