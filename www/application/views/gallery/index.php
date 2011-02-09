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

<h3>Ek Jodi Kapda</h3>
<div id="gallery"><br/><br/>
<table align="center" border="0">
<tr>
<td colspan="3" align="center"><img name="mainimage" border="1" src="/images/ekJodiKapda/DSC00167.JPG"></td>
</tr>
<tr>
	<td align="left"><input type="button" value=" &laquo; Back" onClick="javascript:prevImage()"></td>
	<td align="center">
	
	<select id="optionlist" onChange="javascript:changeImage()" style="display:none">
		<option value="/images/ekJodiKapda/DSC00167.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC00176.JPG">1</option>		
		<option value="/images/ekJodiKapda/DSC00297.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC00298.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC00303.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC00304.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC00308.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC00309.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC07185.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC07188.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC07210.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC07213.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC07216.JPG">1</option>
		<option value="/images/ekJodiKapda/DSC07221.JPG">1</option>
		<option value="/images/ekJodiKapda/Image0992.jpg">1</option>
		<option value="/images/ekJodiKapda/Image0992.jpg">1</option>
		<option value="/images/ekJodiKapda/Image0993.jpg">1</option>
		<option value="/images/ekJodiKapda/Image0994.jpg">1</option>
		<option value="/images/ekJodiKapda/Image0995.jpg">1</option>
		<option value="/images/ekJodiKapda/Image0996.jpg">1</option>
		<option value="/images/ekJodiKapda/Image0997.jpg">1</option>
		<option value="/images/ekJodiKapda/IMG0211A.jpg">1</option>
		<option value="/images/ekJodiKapda/IMG0212A.jpg">1</option>
		<option value="/images/ekJodiKapda/IMG0214A.jpg">1</option>
		<option value="/images/ekJodiKapda/IMG0215A.jpg">1</option>
		<option value="/images/ekJodiKapda/IMG0216A.jpg">1</option>
		<option value="/images/ekJodiKapda/IMG0218A.jpg">1</option>
		<option value="/images/ekJodiKapda/IMG0219A.jpg">1</option>
		<option value="/images/ekJodiKapda/IMG0221A.jpg">1</option>		
	</select>
	
	</td>
	<td align="right"><input type="button" value="Next &raquo;" onClick="javascript:nextImage()"></td>
</tr>
</table>
</div>