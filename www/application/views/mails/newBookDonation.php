<br/>
Hello,
<br/>
<?php $count = count($title);?>
New <?php $count;?>book(s) has been submitted by a donor.
<br/><br/>
Donor Name : <?=$name?><br/>
<b>Books:</b><br/><br/>
<?php for($i = 0; $i < $count; $i++)
{
	echo '<i>', $title[$i], '</i>';
	if(!empty($author[$i])) echo " by {$author[$i]} <i></i>";
	echo '<br/>';
}
?>
<br/>
Thanks and Regards,<br/>
Lakshya Team.