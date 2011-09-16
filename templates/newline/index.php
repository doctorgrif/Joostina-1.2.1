<?php
defined('_VALID_MOS') or die();
global $task, $my, $mainframe, $mosConfig_live_site, $mosConfig_mailfrom, $mosConfig_sitename, $option;
$iso = explode('=', _ISO);
if (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE')) {
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?xml version="1.0" encoding="'.$iso[1].'"?' . '>';
} else {
echo '<!DOCTYPE html>
<?xml version="1.0" encoding="'.$iso[1].'"?' . '>';
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head profile="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="<?php echo $mosConfig_live_site; ?>/templates/<?php echo $mainframe->getTemplate(); ?>/css/style.css" type="text/css" media="screen, projection" />
<?php
if (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE')) {
echo "\n";
echo '<link rel="stylesheet" href="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/css/style_ie.css" type="text/css" media="screen, projection" />';
echo "\n";}
mosShowHead();
mosCommonHTML::loadJquery();
?>
<?php
if ($my->id) {initEditor();}
$block1_count = (mosCountModules('user1') > 0) + (mosCountModules('user2') > 0) + (mosCountModules('user3') > 0);
$block2_count = (mosCountModules('user4') > 0) + (mosCountModules('user5') > 0) + (mosCountModules('user6') > 0);
$block3_count = (mosCountModules('user7') > 0) + (mosCountModules('user8') > 0) + (mosCountModules('user9') > 0);
?>
</head>
<body class="joo_flex">
<div class="main_wrap">
	<div class="wrapper">
		<div class="header">
		<?php if ($option=='com_frontpage') { ?>
			<div id="logo"><h1><?php echo $mosConfig_sitename;?></h1></div>
		<?php } else { ?>
			<a href="<?php echo $mosConfig_live_site; ?>" id="logo" title="<?php echo $mosConfig_sitename ?>"></a>
		<?php } ?>
			<div class="header_center">
				<div class="search"><?php mosLoadModules('header',-1); ?></div>
				<div class="top_menu"><?php mosLoadModules('top',-1); ?></div>
			</div>
			<div class="header_right">
				<a title="<?php echo _MAIN_PAGE; ?>" href="<?php echo $mosConfig_live_site; ?>" id="home" class="navbar"></a>
				<a title="<?php echo _CMN_EMAIL; ?>" href="mailto:<?php echo $mosConfig_mailfrom; ?>" id="mail" class="navbar"></a>
				<a title="<?php echo _CMN_SITEMAP; ?>" href="<?php echo sefRelToAbs('index.php?option=com_xmap&amp;Itemid=27'); ?>" id="map" class="navbar"></a>
				<?php mosLoadModules('toolbar',-2); ?>
			</div>
		</div>
		<div class="block1">
		<?php if ($block1_count) { $block1_width = 'w' . $block1_count; ?>
			<?php if (mosCountModules('user1')) { ?>
				<div class="block_<?php echo $block1_width ?>"><?php mosLoadModules('user1',-2); ?></div>
			<?php } ?>
			<?php if (mosCountModules('user2')) { ?>
				<div class="block_<?php echo $block1_width ?>"><?php mosLoadModules('user2',-2); ?></div>
			<?php } ?>
			<?php if (mosCountModules('user3')) { ?>
				<div class="block_<?php echo $block1_width ?>"><?php mosLoadModules('user3',-2); ?></div>
			<?php } ?>
		<?php } ?>
		</div>
		<div class="content">
			<div id="pathway"><?php mosPathway(); ?></div>
			<?php mosMainbody(); ?><br />
			<?php if ($block2_count) { $block2_width = 'w' . $block2_count; ?>
				<div class="block2">
				<?php if (mosCountModules('user4')) { ?>
					<div class="block_<?php echo $block2_width ?>"><?php mosLoadModules('user4',-2); ?></div>
				<?php } ?>
				<?php if (mosCountModules('user5')) { ?>
					<div class="block_<?php echo $block2_width ?>"><?php mosLoadModules('user5',-2); ?></div>
				<?php } ?>
				<?php if (mosCountModules('user6')) { ?>
					<div class="block_<?php echo $block2_width ?>"><?php mosLoadModules('user6',-2); ?></div>
				<?php } ?>
				</div>
			<?php } ?>
		</div>
		<div class="col">
			<?php mosLoadModules('left',-2); ?>
			<?php mosLoadModules('banner',-2); ?>
		</div>
		<?php if ($block3_count) { $block3_width = 'w' . $block3_count; ?>
		<div class="block3">
			<div class="block3_bottom">
			<?php if (mosCountModules('user7')) { ?>
				<div class="block_<?php echo $block3_width ?> w25"><?php mosLoadModules('user7',-2); ?></div>
			<?php } ?>
			<?php if (mosCountModules('user8')) { ?>
				<div class="block_<?php echo $block3_width ?> w35"><?php mosLoadModules('user8',-2); ?></div>
			<?php } ?>
			<?php if (mosCountModules('user9')) { ?>
				<div class="block_<?php echo $block3_width ?> w35" ><?php mosLoadModules('user9',-2); ?></div>
			<?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div class="footer">
	<div class="bottom">
		<a href="http://www.joostina.ru" id="about" class="bottom_bar" title="О проекте Joostina CMS"></a>
		<?php mosLoadModules('bottom',-1); ?>
		<div class="valid">
			<a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo $mosConfig_live_site; ?>" id="w3ccss" target="_blank" title="CSS Validity"></a> 
			<a href="http://validator.w3.org/check/referer" id="w3cxhtml" target="_blank" title="XHTML Validity"></a>
		</div>
	</div>
</div>
<?php
mosCommonHTML::loadJqueryPlugins('preloader');
mosCommonHTML::loadJqueryPlugins('avatar');
if (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE'))
echo '<script type="text/javascript" src="'.$mosConfig_live_site.'/includes/js/jquery/plugins/corner.js"></script>';
?>
<script type="text/javascript">
	jQuery(function(){
	jQuery('.mosimage').preloader();
	});
</script>
<?php 
if (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE'))
echo '<script type="text/javascript">
	jQuery(document).ready(function(){
	jQuery(\'div.moduletable-round\').corner();
	jQuery(\'div.block2 h3\').corner();});
</script>';
?>
<?php
$ga_script = '<script type="text/javascript">
	var _gaq = [[\'_setAccount\', \''.$mosConfig_ga_id.'\'], [\'_trackPageview\']];
	(function(d, t) {
	var g = d.createElement(t),s = d.getElementsByTagName(t)[0];
	g.async = true;
	g.src = (\'https:\' == location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
	s.parentNode.insertBefore(g, s);})
	(document, \'script\');
</script>';
if ($mosConfig_ga == 1) {
echo $ga_script;
}
?>
<?php
$ym_script = '<script type="text/javascript" src="//mc.yandex.ru/metrika/watch.js"></script>
<div style="display:none;"><script type="text/javascript">try{var yaCounter' . $mosConfig_ym_id . '=new Ya.Metrika('.$mosConfig_ym_id.');}catch(e){}</script></div>
<noscript><div style="position:absolute;"><img src="//mc.yandex.ru/watch/' . $mosConfig_ym_id . '" alt="Яндекс Метрика для '.$mosConfig_sitename.'" /></div></noscript>';
if ($mosConfig_ym == 1) {
echo $ym_script;
}
?>

</body>
</html>