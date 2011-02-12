<?php 
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
?>
<style>
input[type=text] {
	width: 150px;
}
</style>
<script>
var initialNumOfBooks = <?php echo $count;?>;
var count = 0; // Just for Id
window.onload = function(){initializeBookForms();};

var initial_data = <?php echo json_encode($data);?>;

function initializeBookForms()
{
	for(var i=0;i<initialNumOfBooks;i++)
		addBookForm();
	preFillBookForms();
}

function preFillBookForms()
{
	for(var i=0;i<initialNumOfBooks;i++)
	{
		try {
			var bookContainer = document.getElementById("bookDetails_" + (i + 1));
			bookContainer.getElementsByClassName('title')[0].value = initial_data['title'][i];
			bookContainer.getElementsByClassName('author')[0].value = initial_data['author'][i];
			bookContainer.getElementsByClassName('donDate')[0].value = initial_data['donDate'][i];
			bookContainer.getElementsByClassName('donMonth')[0].value = initial_data['donMonth'][i];
			bookContainer.getElementsByClassName('donYear')[0].value = initial_data['donYear'][i];
			bookContainer.getElementsByClassName('typeOfBook')[0].value = initial_data['typeOfBook'][i];
			toggle("bookDetails_" + (i+1), bookContainer.getElementsByClassName('typeOfBook')[0].value);
		} catch(ex) {}
	}
}

function addBookForm()
{
	var template = document.getElementById('bookDetailsTemplate');
	var container = document.getElementById('bookDetailsContainer');
	var newNode = template.cloneNode(true); // Create a new Node
	newNode.style.display = "";
	newNode.id = "bookDetails_" + (++count);

	var removeLink = document.createElement("span");
	removeLink.innerHTML = '<a href="#" onclick="removeBookForm(\'bookDetails_' + count + '\');return false;">Remove</a>';
	var removeContainer = newNode.getElementsByClassName('removeBook')[0];
	removeContainer.appendChild(removeLink);

	var bookTypeNode = newNode.getElementsByClassName('typeOfBook')[0];
	var changeFn = 'toggle("bookDetails_' + count + '",event.target.value);'
	bookTypeNode.setAttribute('onchange', changeFn);
	container.appendChild(newNode);
}

function removeBookForm(elementId)
{
	var container = document.getElementById('bookDetailsContainer');
	var node = document.getElementById(elementId);
	container.removeChild(node);
}

function toggle(id, val)
{
	var container = document.getElementById('bookDetailsContainer');
	var node = document.getElementById(id);
	var date = node.getElementsByClassName('donDateTr')[0];
	date.style.display = (val == 'cur') ? "" : "none";
}
</script>
<?
include APPPATH."views/includes/errors.php";
$defaults = array('name' => '', 'title' => '', 'author' => '', 'mobile' => '', 'email' => '', 'address' => '', 'donDate' =>'');
$data = arr::overwrite($defaults, $data);
?>
<br />
<div id="bookDetailsTemplate" style="display:none">
<table border="0" cellspacing="5" cellpadding="5">
<tr>
		<td><b><u>Book Details</u></b> ( <span class="removeBook"></span> ) </td>
	</tr>
	<tr>
		<td width="160">*Book Title</td>
		<td>:</td>
		<td><input type="text" class="title" name="title[]" value="" /></td>
	</tr>
	<tr>
		<td>Author</td>
		<td>:</td>
		<td><input type="text" class="author" name="author[]" value="" /></td>
	</tr>
	<tr>
		<td>*Type of Book</td>
		<td>:</td>
		<td>
		<select class="typeOfBook" name="typeOfBook[]">
		<option value="cur">Curriculum</option>
		<option value="non">Non-Curriculum</option>
		 </select>
		 </td>
	</tr>
	<tr class="donDateTr">
		<td>Date of Collection of Book</td>
		<td>:</td>
		<td>
		<?php echo form::dropdown('donDate[]', $dates, date('d'), 'class="donDate"');?>
		<?php echo form::dropdown('donMonth[]', $months, date('m'), 'class="donMonth"');?>
		<?php echo form::dropdown('donYear[]', $years, date('Y'), 'class="donYear"');?>
		</td>
	</tr>
	</table>
</div>
<form id="donateBooks" method="post" action="">
<div id="bookDetailsContainer"></div>
<p><a href="javascript:addBookForm();">Click to add one more book</a>
<table border="0" cellspacing="5" cellpadding="5">

	<tr>
		<td><b><u>Donor Details</u></b></td>
	</tr>
	<tr>
		<td>*Name</td>
		<td>:</td>
		<td><input type="text" name="name" value="<?=$data['name']?>" /></td>
	</tr>
	<tr>
		<td>*Mobile</td>
		<td>:</td>
		<td><input type="text" name="mobile" maxlength="10"
			value="<?=$data['mobile']?>" /></td>
	</tr>
	<tr>
		<td>*Email</td>
		<td>:</td>
		<td><input type="text" name="email" value="<?=$data['email']?>" /></td>
	</tr>
	<tr>
		<td>Address to collect the Book</td>
		<td>:</td>
		<td><textarea name="address" rows="4" cols="30"><?=$data['address']?></textarea></td>
	</tr>
	<tr>
		<td><input type="submit" value="Donate Book" /></td>
	</tr>
</table>
</form>
