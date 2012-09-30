<?php
defined('_VALID_MOS') or die();
global $task, $my, $mainframe, $mosConfig_live_site, $mosConfig_sitename, $option;
$iso = explode('=', _ISO);
echo '<!DOCTYPE html>' . "\n";
echo '<?xml version="1.0" encoding="'.$iso[1].'"?>' . "\n";
?>
<!--[if lt IE 7 ]><html dir="ltr" class="no-js ie6" lang="ru-RU"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" class="no-js ie7" lang="ru-RU"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" class="no-js ie8" lang="ru-RU"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html dir="ltr" class="no-js" lang="ru-RU"><!--<![endif]-->
<head>
<link type="text/css" rel="stylesheet" media="screen, projection" href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate();?>/css/style.css" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php mosShowHead();?>
<?php if ($my->id) { initEditor(); } ?>
<?php
if ($_SERVER['HTTP_USER_AGENT'] == 'MSIE') {
	echo '<script type="text/javascript" src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/js/modernizr.js"></script>'; 
}
/*if ($_SERVER['HTTP_USER_AGENT'] == 'MSIE') {
echo '<script type="text/javascript" src="'.$mosConfig_live_site.'/templates/'.$mainframe->getTemplate().'/js/html5.js"></script>';
}*/
?>
<!--[if lt IE 9]><script src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate();?>/js/html5.js"></script><![endif]-->
</head>
<body>
<div class="container">
<header>
<div class="header">
	<div class="col_25">
		<div class="logo">
		<?php if ($option == 'com_frontpage') { ?>
			<h1><?php echo $mosConfig_sitename;?></h1>
		<?php } else { ?>
			<a href="<?php echo $mosConfig_live_site;?>" title="<?php echo $mosConfig_sitename;?>"><?php echo $mosConfig_sitename;?></a>
		<?php } ?>
		</div>
	</div>
	<div class="col_75">
		<div class="col_66"><?php mosLoadModules('header',-1);?></div>
		<div class="col_33">
			<div class="search"><?php mosLoadModules('toolbar',-1);?></div>
		</div>
		<div class="clearfix"></div>
		<div class="menu_main"><nav><?php mosLoadModules('top',-1);?></nav></div>
	</div>
	<div class="clearfix"></div>
</div>
</header>
<div class="content">
<?php if ($option == 'com_frontpage') { ?>
	<div class="col_50"><?php mosLoadModules('user1',-2);?></div>
	<div class="col_50"><?php mosLoadModules('user2',-2);?></div>
	<div class="clearfix"></div>
	<div class="col_100"><?php mosMainbody(); ?></div>
	<div class="frontpage clearfix">
		<div class="col_33"><?php mosLoadModules('user3',-2);?></div>
		<div class="col_33"><?php mosLoadModules('user4',-2);?></div>
		<div class="col_33"><?php mosLoadModules('user5',-2);?></div>
		<div class="clearfix"></div>
	</div>
<?php } else { ?>
	<div class="col_33">
		<?php mosLoadModules('left',-2);?>
		<?php mosLoadModules('user6',-2);?>
	</div>
	<div class="col_66">
		<div id="pathway"><?php mosPathway();?></div>
		<?php mosMainbody(); ?>
		<?php if ($option=='com_content' && $task=='view') { ?>
		<div><?php mosLoadModules('user7',-2);?></div>
		<div><?php mosLoadModules('user8',-2);?></div>
		<?php } ?>
	</div>
	<div class="clearfix"></div>
<?php } ?>
</div>
</div>
<footer>
<div class="footer clearfix">
	<div class="col_30 copyleft">
		<div class="about">
		<p>&laquo;<strong><?php echo $mosConfig_sitename;?></strong>&raquo;</p>
		<p><?php echo $mosConfig_MetaDesc;?></p>
		</div>
	</div>
	<div class="col_30 copyright">
		<p>&copy; &laquo;<strong><?php echo $mosConfig_sitename;?></strong>&raquo;, 2012–<?php echo date('Y');?>. Все права защищены.</p>
		<p>Если вы нас цитируете, то не забывайте указывать ссылку на <a href="<?php echo $_SERVER['REQUEST_URI'];?>" title="<?php echo $mainframe->getPageTitle();?>">источник</a>.</p>
	</div>
	<div class="col_30">
		<div class="menu_bottom"><?php mosLoadModules('bottom',-1);?></div>
		<div class="misc"><?php mosLoadModules('footer',-1);?></div>
	</div>
	<div class="col_10">
		<div class="social" itemscope itemtype="http://schema.org/Person">
		<!--<ul>
		<li class="twitter"><a rel="nofollow" itemprop="url" href="http://twitter.com/your_twitter_ID" title="Follow <?php echo $mosConfig_sitename;?> on Twitter"></a></li>
		<li class="facebook"><a rel="nofollow" itemprop="url" href="http://www.facebook.com/your_facebook_ID" title="<?php echo $mosConfig_sitename;?> в Facebook"></a></li>
		<li class="rss"><a rel="nofollow" href="index.php?option=com_rss&amp;feed=RSS2.0&amp;no_html=1" title="Get Updates <?php echo $mosConfig_sitename;?> in your RSS Reader"></a></li>
		<li class="rss"><a href="http://feeds2.feedburner.com/your_feedburner_ID" title="Get Updates <?php echo $mosConfig_sitename;?> in your RSS Reader"></a></li>
		<li class="googleplus"><a rel="nofollow" itemprop="url" href="https://plus.google.com/your_google_plus_ID/posts" title="Add <?php echo $mosConfig_sitename;?> to your circles on Google+"></a></li>
		<li class="emailnotifi"><a href="http://feedburner.google.com/fb/a/mailverify?uri=your_feedburner_ID&amp;loc=ru_RU"	itemprop="url" title="Get Email Notifications for New Posts on <?php echo $mosConfig_sitename;?>"></a></li>
		</ul>-->
		<ul>
		<li><a rel="nofollow" itemprop="url" href="http://www.facebook.com/your_facebook_ID" title="<?php echo $mosConfig_sitename;?> в Facebook" class="zocial icon facebook">Facebook</a></li>
		<li><a rel="nofollow" itemprop="url" href="https://plus.google.com/your_google_plus_ID/posts" title="Добавте <?php echo $mosConfig_sitename;?> в ваши круги на Google+" class="zocial icon googleplus">Google+</a></li>
		<li><a rel="nofollow" itemprop="url" href="http://twitter.com/your_twitter_ID" title="Подпишитесь на канал <?php echo $mosConfig_sitename;?> в Twitter" class="zocial icon twitter">Twitter</a></li>
		<li><a rel="nofollow" href="<?php echo sefRelToAbs('index.php?option=com_rss&amp;feed=RSS2.0&amp;no_html=1');?>" title="Следите за обновлениями <?php echo $mosConfig_sitename;?> в вашем RSS Reader" class="zocial icon rss">RSS</a></li>
		</ul>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</footer>
<?php
mosCommonHTML::loadJquery();
mosCommonHTML::loadJqueryPlugins('jquery.cookie');
mosCommonHTML::loadJqueryPlugins('jquery.avatar');
mosCommonHTML::loadJqueryPlugins('jquery.login');
if (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE')) {
mosCommonHTML::loadJqueryPlugins('jquery.corner');
echo '<script type="text/javascript">jQuery(document).ready(function(){jQuery(window).load(function () {jQuery(\'div.moduletable-round\').corner();jQuery(\'div h3\').corner();});});</script>';
}
$ga_script = '<script>var _gaq = [[\'_setAccount\', \''.$mosConfig_ga_id.'\'], [\'_trackPageview\']];(function(d, t) {var g = d.createElement(t),s = d.getElementsByTagName(t)[0];g.async = true;g.src = (\'https:\' == location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';s.parentNode.insertBefore(g, s);})(document, \'script\');</script>';
if ($mosConfig_ga == 1) { echo $ga_script; }
echo "\n";
$ym_script = '<script src="//mc.yandex.ru/metrika/watch.js"></script>
<div class="nodisplay"><script type="text/javascript">try{var yaCounter'.$mosConfig_ym_id.'=new Ya.Metrika('.$mosConfig_ym_id.');}catch(e){}</script></div>
<noscript><div style="position:absolute;"><img src="//mc.yandex.ru/watch/'.$mosConfig_ym_id.'" alt="Яндекс.Метрика '.$mosConfig_sitename.'" /></div></noscript>';
if ($mosConfig_ym == 1) { echo $ym_script; }
?>
</body>
</html>