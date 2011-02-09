<HTML>
<HEAD>
<?php
echo "\t", html::stylesheet("css/common");
echo "\t", html::stylesheet("css/iframe"); 
if(!empty($styles) && is_array($styles))
{
	foreach($styles as $style)
		echo "\t", is_array($style) ? html::stylesheet("css/".$style[0], $style[1]) : html::stylesheet("css/".$style);
}
?>
<?
echo "\t", html::script("scripts/jquery.latest");
if(!empty($scripts) && is_array($scripts))
{
	foreach($scripts as $script)
		echo "\t", html::script("scripts/".$script);
}
?>
</HEAD>
<BODY>
<? if(!empty($content)) echo $content;?>
</BODY>
</HTML>
