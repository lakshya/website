<?php

include APPPATH."views/includes/errors.php";

for($i = 1; $i <=31; $i++) $dates[str_pad((string)$i,2,"0",STR_PAD_LEFT)] = $i;
$months = array(
	'01'	=>	"January",
	'02'	=>	"February",
	'03'	=>	"March",
	'04'	=>	"April",
	'05'	=>	"May",
	'06'	=>	"June",
	'07'	=>	"July",
	'08'	=>	"August",
	'09'	=>	"September",
	'10'	=>	"October",
	'11'	=>	"November",
	'12'	=>	"December"
	);
	
/* 5 Years in the dropdown */ 
for($i = date('Y'), $j = $i + 5; $i < $j; $i++) $years[$i] = $i;

$data = (request::method() == "post")
			? arr::overwrite($details, $data)
			: $details;
?>
<style>
input[type=text] {
	width: 150px;
}
</style>
<br />
<form id="editLibraryBook" method="post" action="">
<table border="0" cellspacing="5" cellpadding="5">
<tr>
		<td><b><u>Book Details</u></b></td>
	</tr>
	<tr>
		<td width="160">*Book Title</td>
		<td>:</td>
		<td><?php echo form::input('title', $data['title'])?></td>
	</tr>
	<tr>
		<td>Author</td>
		<td>:</td>
		<td><?php echo form::input('author', $data['author'])?></td>
	</tr>
	<tr>
		<td>*Copies</td>
		<td>:</td>
		<td><?php echo form::input('copies', $data['copies'])?></td>
	</tr>
	<tr>
		<td>*Type of Book</td>
		<td>:</td>
		<td>
		<?php 
		$book_types = array('cur' => 'Curriculum', 'non' => 'Non-Curriculum');
		echo form::dropdown('typeOfBook', $book_types, $data['typeOfBook']);
		?>
		 </td>
	</tr>
	<tr>
		<td>Date of Collection of Book (YYYY-MM-DD)</td>
		<td>:</td>
		<td><?php echo form::input('donDate', $data['donDate'])?></td>
	</tr>
	
	<tr>
		<td>*Book Status</td>
		<td>:</td>
		<td>
		<?php 
		$book_statuses = array('YES' => 'Received', 'NO' => 'Pending');
		echo form::dropdown('status', $book_statuses, $data['status']);
		?>
		</td>
	</tr>
	</table>
	
	<input type="submit" value="Edit" />
	<input type="Reset" value="Reset" />
</form>

<div>
<b>Notes: </b><br/>
<ul>
<li>Please enter the date in exact date format YYYY-MM-DD, including the padding zeroes. 
e.g: January 1, 2011 is written as 2011-01-01</li>
<li>Please enter the donation date when changing the status to <i>Received</i></li>
</ul>
</div>
