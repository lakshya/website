<?
if(!empty($errors))
	{
		echo '<div class="errors"><i>The following errors have occured : </i><br>';
		foreach($errors as $e)
			echo $e, '<br>';
		echo '</div>';
	}
	?>