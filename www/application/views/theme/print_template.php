<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php
echo "\t", html::stylesheet("css/common");
echo "\t", html::stylesheet("css/print");
if(!empty($styles) && is_array($styles))
{
	foreach($styles as $style)
		echo "\t", is_array($style) ? html::stylesheet("css/".$style[0], $style[1]) : html::stylesheet("css/".$style);
}
?>
</head>
<body>
<? if(!empty($content)) echo $content;?>
</body>
</html>
