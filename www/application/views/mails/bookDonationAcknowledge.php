<br/>
Hello <?php echo $name?>,
<br/>

<p>Thank you for pledging the following book(s) to <?php echo html::anchor('', 'The Lakshya Foundation');?>.</p>

<ol>
<?php 
$count = count($title);
for($i = 0; $i < $count; $i++)
{
	echo '<li><i>', $title[$i], '</i>';
	if(!empty($author[$i])) echo ", by <i>{$author[$i]}</i>";
	echo '</li>';
}
?>
</ol>

<p>We will soon contact you for collecting the book(s) at the following address as mentioned in your donation form.</p>

<p>
<b>Address:</b><br/>
<?php echo nl2br($address)?><br/></p>

<p>
Thanks and Regards,<br/>
Lakshya Team.<br/>
<?php echo html::anchor('', 'www.TheLakshyaFoundation.org');?><br/>
</p>