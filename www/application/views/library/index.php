<p><b>Project Goal:</b> Providing curriculum/non-curriculum books to help
students widen their horizon on various subjects.
<p>
<p>Lakshya's Library Project is an initiative meant to provide
curriculum/non-curriculum books covering a wide spectrum of subjects to
help the student read, think and base opinions on sound judgement and
knowledge. We look to provide books ranging from novels and biographies
to non-fiction, books on history, and much more.</p>
<p>No medium can influence the human psyche more than a book. Religions,
economies and even military doctrines have risen from works of authors
who poured their thoughts in their writings for future generations to
read and learn.</p>

<center><span style="font-size: 48px;">
<button onclick="window.location.href='/library/donate'" style="height: 40px; width: 175px"><b>Donate a Book now</b></button></span></center>

<br />
<span style="color: green; font-size: 14px;"><b>Working Mechanism</b></span>
<center><a href="/library/donate"><img height=196 width=600 src="/images/library/Library_Workflow.png" /></a></center>
<div id="list"><span style="color: green; font-size: 14px;">
<b>Recent Donations</b></span><br />
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
	</tr>
	<?foreach($data as $row):?>
	<tr>
		<td bgcolor="#efefef"><?= html::anchor("library/donor/$row->donor_id",$row->name)?></td>
		<td bgcolor="#efefef"><?=$row->title?></td>
		<td bgcolor="#efefef"><?=$row->author?></td>
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
	</tr>
	<?endforeach?>
</table>

</center>

</div>
<br/>
<div style="text-align:right;font-size:+1.2em"><b><u><a href="/library/donations/">View all donations &raquo;</a></u></b></div>


<div id="stats">
<span style="color: green; font-size: 14px;">
<b>Statistics</b></span><br/><br/>
<table width="40%" border="0" class="coTab" cellspacing="1" cellpadding="5">
	<tr>
		<td bgcolor="#D7D6E9"><b>Parameters</b></td>
		<td bgcolor="#D7D6E9"><b></b></td>
	</tr>
<tr>
<td bgcolor="#efefef">Total No. of Curriculum Books</td><td style="text-align:right" bgcolor="#efefef"><?php echo $stats['cur']?></td>
</tr>
<tr>
<td bgcolor="#efefef">Total No. of Non-curriculum Books</td><td style="text-align:right" bgcolor="#efefef"><?php echo $stats['non']?></td>
</tr>
<tr>
<td bgcolor="#efefef">Total No. of Books</td><td style="text-align:right" bgcolor="#efefef"><?php echo $stats['cur'] + $stats['non']?></td>
</tr><tr>
<td bgcolor="#efefef">Number of Donors</td><td style="text-align:right" bgcolor="#efefef"><?php echo $stats['donors']?></td>
</tr>
</table>
</div>