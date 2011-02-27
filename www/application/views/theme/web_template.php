<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php if(!empty($title)) echo $title, " :: "; echo "The Lakshya Foundation" ?></title>

<?php echo "\t", html::meta("Content-Type", "text/html; charset=utf-8");?>

<?php echo "\t", html::meta("keywords", "lakshya, foundation, nitw, nit warangal");?>

<?php
if(!empty($metas) && is_array($metas))
{
		echo "\t", html::meta($metas), "\n";
}
?>
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
	
<?php
echo "\t", html::stylesheet("css/style");
echo "\t", html::stylesheet("css/news");
if(!empty($styles) && is_array($styles))
{
	foreach($styles as $style)
		echo "\t", is_array($style) ? html::stylesheet("css/".$style[0], $style[1]) : html::stylesheet("css/".$style);
}
?>
<!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
<?php
echo "\t", html::script("scripts/rsspausescroller");
echo "\t", html::script("scripts/script");
if(!empty($scripts) && is_array($scripts))
{
	foreach($scripts as $script)
		echo "\t", html::script("scripts/".$script);
}
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21295000-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div class="PageBackgroundSimpleGradient">
</div>

<div class="PageBackgroundGlare">
    <div class="PageBackgroundGlareImage"></div>
</div>
    
    
    <div class="Main">
        <div class="Sheet">
            <div class="Sheet-tl"></div>
            <div class="Sheet-tr"></div>
            <div class="Sheet-bl"></div>
            <div class="Sheet-br"></div>
            <div class="Sheet-tc"></div>
            <div class="Sheet-bc"></div>
            <div class="Sheet-cl"></div>
            <div class="Sheet-cr"></div>
            <div class="Sheet-cc"></div>
            
            <div class="Sheet-body">
				<? include("includes/header.php");?>
                <? include("includes/menu.php");?>
                
                
                <div class="contentLayout">
                    <div class="content">
                        <div class="Post">
                            <div class="Post-body">
                        <div class="Post-inner">
                            <h2 class="PostHeaderIcon-wrapper">
                                <span class="PostHeader"><?if(!empty($heading)) echo $heading;?></span>
                            </h2>
                            <div class="PostContent">
                                
                                
                                
                               <?if(!empty($content)) echo $content;?>
                                
                               
                                    
                            </div>
                            <div class="cleared"></div>
                        </div>
                        
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    
                    <div class="sidebar1">
                           
                        <?include("includes/news.php");?>
						
						<?include("includes/login.php");?>
                        
                       <?include("includes/newsletter.php");?>
                        
                        <?include("includes/quicklinks.php");?>
                        
                    </div>
                
				</div>
                
            
                
                
                <div class="cleared"></div>
				<?include("includes/footer.php");?>
            </div>
        </div>
        <div class="cleared"></div>
        <?include("includes/page-footer.php");?>
    </div>

</body>
</html>