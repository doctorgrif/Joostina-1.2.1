<?php
defined('_VALID_MOS') or die();
global $task, $my, $mainframe, $mosConfig_live_site, $mosConfig_mailfrom, $mosConfig_sitename, $option;
$iso = explode('=', _ISO);
echo '<!DOCTYPE html>';
echo "\n";
echo '<?xml version="1.0" encoding="' . $iso[1] . '"?>';
echo "\n";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<link type="text/plain" rel="author" href="<?php echo $mosConfig_live_site; ?>/humans.txt" />
<link rel="stylesheet" href="<?php echo $mosConfig_live_site; ?>/templates/<?php echo $mainframe->getTemplate(); ?>/css/style.css" type="text/css" media="screen, projection" />
<?php
if (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE')) {
echo '<link type="text/css" href="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/css/ie6fix.css" rel="stylesheet" />';
echo "\n";
echo '<script type="text/javascript" src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/js/pngfix.js"></script>';
echo "\n";
echo '<script type="text/javascript">DD_belatedPNG.fix(\'.png24\');</script>';
echo "\n";
}
mosShowHead();
?>
<?php
if ($my->id) {
initEditor();
}
$block1_count = (mosCountModules('user1') > 0) + (mosCountModules('user2') > 0) + (mosCountModules('user3') > 0);
$block2_count = (mosCountModules('user4') > 0) + (mosCountModules('user5') > 0) + (mosCountModules('user6') > 0);
$block3_count = (mosCountModules('user7') > 0) + (mosCountModules('user8') > 0) + (mosCountModules('user9') > 0);
?>
<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/templates/<?php echo $mainframe->getTemplate(); ?>/js/html5.js"></script>
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
				<div class="search"><?php mosLoadModules('header', -1); ?></div>
				<div class="top_menu"><?php mosLoadModules('top', -1); ?></div>
			</div>
			<div class="header_right">
				<a title="<?php echo _MAIN_PAGE; ?>" href="<?php echo $mosConfig_live_site; ?>" id="home" class="navbar"></a>
				<a title="<?php echo _CMN_EMAIL; ?>" href="mailto:<?php echo $mosConfig_mailfrom; ?>" id="mail" class="navbar"></a>
				<a title="<?php echo _CMN_SITEMAP; ?>" href="<?php echo sefRelToAbs('index.php?option=com_xmap&amp;Itemid=27'); ?>" id="map" class="navbar"></a>
				<?php mosLoadModules('toolbar', -2); ?>
			</div>
		</div>
		<div class="block1">
			<?php if ($block1_count) { $block1_width = 'w' . $block1_count; ?>
			<?php if (mosCountModules('user1')) { ?>
			<div class="block_<?php echo $block1_width ?>"><?php mosLoadModules('user1', -2); ?></div>
			<?php } ?>
			<?php if (mosCountModules('user2')) { ?>
			<div class="block_<?php echo $block1_width ?>"><?php mosLoadModules('user2', -2); ?></div>
			<?php } ?>
			<?php if (mosCountModules('user3')) { ?>
			<div class="block_<?php echo $block1_width ?>"><?php mosLoadModules('user3', -2); ?></div>
			<?php } ?>
			<?php } ?>
		</div>
		<div class="col_33">
			<?php mosLoadModules('left', -2); ?>
			<?php mosLoadModules('banner', -2); ?>
		</div>
		<div class="col_66">
			<div id="pathway"><?php mosPathway(); ?></div>
			<div><?php mosMainbody(); ?></div>
			<?php if ($option == 'com_content' && $task == 'view') { ?>
			<div><?php mosLoadModules('user10', -2); ?></div>
			<?php } ?>
			<?php if ($block2_count) { $block2_width = 'w' . $block2_count; ?>
			<div class="block2">
				<?php if (mosCountModules('user4')) { ?>
				<div class="block_<?php echo $block2_width ?>"><?php mosLoadModules('user4', -2); ?></div>
				<?php } ?>
				<?php if (mosCountModules('user5')) { ?>
				<div class="block_<?php echo $block2_width ?>"><?php mosLoadModules('user5', -2); ?></div>
				<?php } ?>
				<?php if (mosCountModules('user6')) { ?>
				<div class="block_<?php echo $block2_width ?>"><?php mosLoadModules('user6', -2); ?></div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
		<?php if ($block3_count) { $block3_width = 'w' . $block3_count; ?>
		<div class="block3">
			<div class="block3_bottom">
				<?php if (mosCountModules('user7')) { ?>
				<div class="block_<?php echo $block3_width ?>"><?php mosLoadModules('user7', -2); ?></div>
				<?php } ?>
				<?php if (mosCountModules('user8')) { ?>
				<div class="block_<?php echo $block3_width ?>"><?php mosLoadModules('user8', -2); ?></div>
				<?php } ?>
				<?php if (mosCountModules('user9')) { ?>
				<div class="block_<?php echo $block3_width ?>" ><?php mosLoadModules('user9', -2); ?></div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div class="footer clearfix">
	<div class="bottom">
		<div class="col_25">
			<ul class="bottom_bar">
				<li><a href="http://www.joostina.ru" id="about" title="О проекте Joostina CMS"></a></li>
				<li><a href="http://www.facebook.com/" id="facebook" title="facebook"></a></li>
				<li><a href="http://www.twitter.com/" id="twitter" title="twitter"></a></li>
			</ul>
		</div>
		<div class="col_50"><?php mosLoadModules('bottom', -1); ?></div>
		<div class="col_25">
			<div class="valid">
				<ul>
					<li><a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo $mosConfig_live_site; ?>" id="w3ccss" title="CSS Validity" rel="nofollow"></a></li>
					<li><a href="http://validator.w3.org/check/referer" id="w3cxhtml" title="XHTML Validity" rel="nofollow"></a></li>
				</ul>
			</div>
		</div>
	<div class="clearfix"></div>
	</div>
</div>
<?php
mosCommonHTML::loadJquery();
/* mosCommonHTML::loadJqueryPlugins('jquery.simplegallery'); */
mosCommonHTML::loadJqueryPlugins('jquery.avatar');
mosCommonHTML::loadJqueryPlugins('jquery.login');
if (stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
echo '<script type="text/javascript" src="' . $mosConfig_live_site . '/includes/js/jquery/plugins/jquery.corner.js"></script>';
?>
<?php
if (stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
echo '<script type="text/javascript">jQuery(document).ready(function(){jQuery(\'div.moduletable-round\').corner();jQuery(\'div.block2 h3\').corner();});</script>';
?>
<?php
$ga_script = '<script type="text/javascript">var _gaq = [[\'_setAccount\', \'' . $mosConfig_ga_id . '\'], [\'_trackPageview\']];(function(d, t) {var g = d.createElement(t),s = d.getElementsByTagName(t)[0];g.async = true;g.src = (\'https:\' == location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';s.parentNode.insertBefore(g, s);})(document, \'script\');</script>';
if ($mosConfig_ga == 1) { echo $ga_script; }
?>
<?php
$ym_script = '<script type="text/javascript" src="//mc.yandex.ru/metrika/watch.js"></script>
<div class="nodisplay"><script type="text/javascript">try{var yaCounter' . $mosConfig_ym_id . '=new Ya.Metrika(' . $mosConfig_ym_id . ');}catch(e){}</script></div>
<noscript><div style="position:absolute;"><img src="//mc.yandex.ru/watch/' . $mosConfig_ym_id . '" alt="Яндекс.Метрика ' . $mosConfig_sitename . '" /></div></noscript>';
if ($mosConfig_ym == 1) { echo $ym_script; }
?>
</body>
</html>