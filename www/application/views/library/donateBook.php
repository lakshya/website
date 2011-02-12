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
	bookTypeNode.setAttribute('onchange', 'toggle("bookDetails_" + count,event.target.value);');
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
<table border="0" cellspacing="10" cellpadding="5">
<tr>
		<td><b><u>Book Details</u></b> ( <span class="removeBook"></span> ) </td>
	</tr>
	<tr>
		<td width="250">*Book Title</td>
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
		<td>Date of Collection of Book (YYYY-MM-DD)</td>
		<td>:</td>
		<td><input type="text" class="donDate" name="donDate[]" value="" /></td>
	</tr>
	</table>
</div>
<form id="donateBooks" method="post" action="">
<div id="bookDetailsContainer"></div>
<p><a href="javascript:addBookForm();">Click to add one more book</a>
<table border="0" cellspacing="10" cellpadding="5">

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
		<td>*Email-id</td>
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
