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

<p>Lakshya's Library Project is an initiative meant to provide non-curriculum books covering a wide spectrum of subjects to help the student read, think and base opinions on sound judgement and knowledge. </p>
<p>We look to provide books ranging from novels and biographies to non-fiction, books on history, and much more. Television and the internet will always exist, but its contents once absorbed, a book becomes a part of us forever.<br/>
  No medium can influence the human psyche more than a book. Religions, economies and even military doctrines have risen from works of authors who poured their thoughts in their writings for future generations to read and learn.</p>
<p>From the epic Mahabharatha to George Orwell's classics - 'Animal Farm' and '1982', books have always given man a chance to see the world through the eyes of another.</p>
<p>We have a lot to achieve, a lot of potential. Growth, however, is not limited to GDP.</p>
<p>We are the world's largest demoracy and are said to be a vibrant, secular conuntry. Yet we were witness to anti-Sikh, Hindu-Muslim and anti-Christian riots all within the last 25 years. 'Satyameva Jayate', truth alone triumphs, is our national motto. The only truth about Indian governance is the rampant corruption in the system.</p>
<p>Young minds are more open, less sterotyped and have a greater capacity to not only change any preconceived notions, but also to help change the system.<br/>
</p>
<br/></br>
<a href="<?=url::base().'library/donate'?>"><b>SUBMIT BOOK NOW</b></a>
<br/></br>
<br/></br>
<center>
<table width="100%" border="0" class="coTab" cellspacing="1">
	<tr>
		<td bgcolor="#D7D6E9"><b>Name</b></td>
		<td bgcolor="#D7D6E9"><b>Book</b></td>
		<td bgcolor="#D7D6E9"><b>Author</b></td>
	</tr>
<?foreach($data as $row):?>
	<tr>
		<td bgcolor="#efefef"><?=$row->Name?></td>
		<td bgcolor="#efefef"><?=$row->BookName?></td>
		<td bgcolor="#efefef"><?=$row->author?></td>
	</tr>
<?endforeach?>
	</table>
</center>