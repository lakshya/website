<script type="text/javascript">
function changeImage()
{
	var list = document.getElementById('optionlist');
	document.mainimage.src = list.options[list.selectedIndex].value;
}

function prevImage()
{
	var list = document.getElementById('optionlist');
	if(list.selectedIndex == 0)
	{
		list.selectedIndex = list.options.length-1;
	}
	else
	{
		list.selectedIndex--;
	}
	changeImage();
}

function nextImage()
{
	var list = document.getElementById('optionlist');
	if(list.selectedIndex == list.options.length-1)
	{
		list.selectedIndex = 0;
	}
	else
	{
		list.selectedIndex++;
	}
	changeImage();
}
</script>
<div id="gallery"><br/><br/>
<table align="center" border="0">
<tr>
<td colspan="3" align="center"><img name="mainimage" border="1" src="/images/gifts/a.jpg"></td>
</tr>
<tr>
	<td align="left"><input type="button" value=" &laquo; Back" onClick="javascript:prevImage()"></td>
	<td align="center">
	
	<select id="optionlist" onChange="javascript:changeImage()" style="display:none">
		<option value="/images/gifts/a.jpg">First Image</option>
		<option value="/images/gifts/b.jpg">Second Image</option>
		<option value="/images/gifts/c.jpg">Third Image</option>
		<option value="/images/gifts/d.jpg">Fourth Image</option>
		<option value="/images/gifts/e.jpg">Fifth Image</option>
	</select>
	
	</td>
	<td align="right"><input type="button" value="Next &raquo;" onClick="javascript:nextImage()"></td>
</tr>
</table>
</div>