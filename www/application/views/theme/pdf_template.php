<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<HEAD>
<?php

echo "\t", html::stylesheet("css/common");
echo "\t", html::stylesheet("css/pdf");
if(!empty($styles) && is_array($styles))
{
	foreach($styles as $style)
		echo "\t", is_array($style) ? html::stylesheet("css/".$style[0], $style[1]) : html::stylesheet("css/".$style);
}
?>
</HEAD>
<BODY>
<? if(!empty($content)) echo $content;?>
</BODY>
</HTML>
