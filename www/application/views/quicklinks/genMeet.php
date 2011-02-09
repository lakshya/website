<br/>
<ul><li>The first general body meeting of the lakshya foundation was held on 25-01-2009.</li>
    <li>Dr. Ing Y.V . Rao , The Director , NITW Presided over the function.</li>
    <li>7 scholorships were granted during the first general body meeting.</li>
    <li>Director handed over the cheques to The Lakshya Scholars.</li>
    <li>Director and the faculty of the institute were very much impressed.</li>
    <li>Director made a donation of Rs.25,000 /- to the foundation.</li>
</ul>
<br/><br/>
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
<td colspan="3" align="center"><img name="mainimage" border="1" src="/images/genMeet1/dsc00805.jpg"></td>
</tr>
<tr>
	<td align="left"><input type="button" value=" &laquo; Back" onClick="javascript:prevImage()"></td>
	<td align="center">
	
	<select id="optionlist" onChange="javascript:changeImage()" style="display:none">
		<option value="/images/genMeet1/dsc00805.jpg">First Image</option>
		<option value="/images/genMeet1/dsc00806.jpg">Second Image</option>
		<option value="/images/genMeet1/dsc00811.jpg">Third Image</option>
		<option value="/images/genMeet1/dsc00812.jpg">Fourth Image</option>
		<option value="/images/genMeet1/dsc00814.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00815.jpg">First Image</option>
		<option value="/images/genMeet1/dsc00816.jpg">Second Image</option>
		<option value="/images/genMeet1/dsc00817.jpg">Third Image</option>
		<option value="/images/genMeet1/dsc00820.jpg">Fourth Image</option>
		<option value="/images/genMeet1/dsc00821.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00823.jpg">Second Image</option>
		<option value="/images/genMeet1/dsc00824.jpg">Third Image</option>
		<option value="/images/genMeet1/dsc00825.jpg">Fourth Image</option>
		<option value="/images/genMeet1/dsc00826.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00827.jpg">First Image</option>
		<option value="/images/genMeet1/dsc00828.jpg">Second Image</option>
		<option value="/images/genMeet1/dsc00829.jpg">Third Image</option>
		<option value="/images/genMeet1/dsc00830.jpg">Fourth Image</option>
		<option value="/images/genMeet1/dsc00831.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00832.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00833.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00834.jpg">First Image</option>
		<option value="/images/genMeet1/dsc00835.jpg">Second Image</option>
		<option value="/images/genMeet1/dsc00836.jpg">Third Image</option>
		<option value="/images/genMeet1/dsc00837.jpg">Fourth Image</option>
		<option value="/images/genMeet1/dsc00840.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00841.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00843.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00844.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00845.jpg">Fifth Image</option>
		<option value="/images/genMeet1/dsc00846.jpg">Fifth Image</option>
	</select>
	
	</td>
	<td align="right"><input type="button" value="Next &raquo;" onClick="javascript:nextImage()"></td>
</tr>
</table>
</div>
