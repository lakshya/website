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

<?php include APPPATH."views/includes/errors.php";?>
<form method="post">
<p>
<label for="status">Choose an option:</label><br/>
<?php 
$status_change = array(
	'A' => 'Transferred to the Library',
	'B' => 'Transferred to Lakshya Scholar',
	'C' => 'Transferred to Volunteer ',
	'D' => 'Collected from the Donor'
);
echo form::radiogroup('status', $status_change, NULL, true);
?></p>

<p><label for="owner">Transferred to: </label>
<?php echo form::input('owner');?></p>
<p><label for="public_notes">Public Notes (if any)</label><br/>
<?php echo form::textarea('public_notes', '', 'rows="4" cols="40"');?></p>
<p><label for="private_notes">Private Notes (visible only to admins &amp; volunteers)</label><br/>
<?php echo form::textarea('private_notes', '', 'rows="4" cols="40"');?><br/></p>
<input type="submit" value="Add Tracking Note"/>
</form>