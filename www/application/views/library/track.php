<table>
<tr>
<td>Book Title</td>
<td>:</td>
<td><?php echo $book->title?></td>
</tr>
<tr>
<td>Book Author</td>
<td>:</td>
<td><?php echo $book->author?></td>
</tr>
<tr>
<td>Book Category</td>
<td>:</td>
<td><?php 
$book_types = array('cur' => 'Curriculum', 'non' => 'Non-Curriculum');
echo $book_types[$book->typeOfBook]?></td>
</tr>
<tr>
<td>Donated By</td>
<td>:</td>
<td><?php echo $book->name?> on <?php echo date('jS  M,  Y',strtotime($book->donDate))?></td>
</tr>
</table>

<?php foreach ($entries as $entry):?>
<table border="5">
<tr><td>Added by <?php echo $entry->added_by?> at <?php echo $entry->added_at;?></td></tr>
<tr><td>
<?php 

if($entry->status == 'A')
{
	echo 'Transfered to the Library';
}
else if($entry->status == 'B')
{
	echo "Tranferred to the Lakshya Scholar {$entry->owner}";
}
else if($entry->status == 'C')
{
	echo "Tranferred to the Lakshya Volunteer {$entry->owner}";
}
else if($entry->status == 'D')
{
	echo "Collected the book from the donor by the Lakshya Volunteer {$entry->owner}";
}
?>
<?php 
// Display Public Notes, if any
if(!empty($entry->public_notes))
{
	echo '<br/>', $entry->public_notes;
}
?>
</td>
</tr>
</table>
<?endforeach;?>
