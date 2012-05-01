<?php
defined('_VALID_MOS') or die();
global $task, $my, $mainframe, $mosConfig_live_site, $mosConfig_mailfrom, $mosConfig_sitename, $option;
$iso = explode('=', _ISO);
echo '<!DOCTYPE html>';
echo "\n";
echo '<?xml version="1.0" encoding="'.$iso[1].'"?>';
echo "\n";
?>
<html lang="ru">
<head profile="http://gmpg.org/xfn/11">
<link type="text/css" rel="stylesheet" media="screen, projection" href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate();?>/css/style.css" />
<?php mosShowHead();?>
<?php if ($my->id) { initEditor(); } ?>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link type="text/plain" rel="author" href="<?php echo $mosConfig_live_site;?>/humans.txt" />
</head>
<body>
<div class="container">
	<div class="header">
	<div class="col_25">
		<div class="logo">
		<?php if ($option=='com_frontpage') { ?>
			<h1><?php echo $mosConfig_sitename;?></h1>
		<?php } else { ?>
			<a href="<?php echo $mosConfig_live_site;?>" title="<?php echo $mosConfig_sitename;?>"><?php echo $mosConfig_sitename;?></a>
		<?php } ?>
		</div>
	</div>
	<div class="col_75">
		<div class="col_66"><?php mosLoadModules('header',-1);?></div>
		<div class="col_33 search"><?php mosLoadModules('toolbar',-1);?></div>
		<div class="clearfix"></div>
		<div class="menu_main"><?php mosLoadModules('top',-1);?></div>
	</div>
	<div class="clearfix"></div>
	</div>
	<div class="content">
	<?php if ($option=='com_frontpage') { ?>
	<div class="col_45"><?php mosLoadModules('user1',-2);?></div>
	<div class="col_55"><?php mosLoadModules('user2',-2);?></div>
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
	<div class="footer clearfix">
	<div class="col_25 copyleft">
		<div class="about">
			<p>&laquo;<strong><?php echo $mosConfig_sitename;?></strong>&raquo;</p>
			<p><?php echo $mosConfig_MetaDesc;?></p>
		</div>
	</div>
	<div class="col_25 copyright">
		<p>&copy; &laquo;<strong><?php echo $mosConfig_sitename;?></strong>&raquo;, 2012–<?php echo date('Y');?>. Все права защищены.</p>
		<p>Если вы нас цитируете, то не забывайте указывать ссылку на <a href="<?php echo $_SERVER['REQUEST_URI'];?>" title="<?php echo $mainframe->getPageTitle();?>">источник</a>.</p>
	</div>
	<div class="col_25">
			<div class="menu_bottom"><?php mosLoadModules('bottom',-1);?></div>
	</div>
	<div class="col_25">
		<div class="social">
			<ul>
				<li><a rel="nofollow" target="_blank" href="http://twitter.com/?status=<?php echo urlencode($mainframe->getPageTitle());?>+http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" title="Опубликовать <?php echo $mainframe->getPageTitle();?> в twitter"><img src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate();?>/i/tp/twitter.png" alt="Опубликовать <?php echo $mainframe->getPageTitle();?> в twitter" height="32" width="32" /></a></li>
				<li><a rel="nofollow" target="_blank" name="fb_share" share_url="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" href="http://www.facebook.com/sharer.php" title="Опубликовать <?php echo $mainframe->getPageTitle();?> в facebook"><img src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate();?>/i/tp/facebook.png" alt="Опубликовать <?php echo $mainframe->getPageTitle();?> в facebook" height="32" width="32" /></a></span><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></li>
				<li><a rel="nofollow" target="_blank" href="index.php?option=com_rss&amp;feed=RSS2.0&amp;no_html=1" title="Подписаться на RSS <?php echo $mosConfig_sitename;?>"><img src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $mainframe->getTemplate();?>/i/tp/rss.png" alt="Подписаться на RSS <?php echo $mosConfig_sitename;?>" height="32" width="32" /></a></li>
			</ul>
		</div>
		<div class="misc"><?php mosLoadModules('footer',-1);?></div>
	</div>
	<div class="clearfix"></div>
	</div>
</div>
<?php
mosCommonHTML::loadJquery();
mosCommonHTML::loadJqueryPlugins('jquery.cookie');
mosCommonHTML::loadJqueryPlugins('jquery.passstrength');
mosCommonHTML::loadJqueryPlugins('jquery.avatar');
mosCommonHTML::loadJqueryPlugins('jquery.login');
if (stristr($_SERVER['HTTP_USER_AGENT'],'MSIE')) {
mosCommonHTML::loadJqueryPlugins('jquery.corner');
echo '<script type="text/javascript">jQuery(document).ready(function(){jQuery(\'div.moduletable-round\').corner();jQuery(\'div h3\').corner();});</script>';
}
$ga_script = '<script type="text/javascript">var _gaq = [[\'_setAccount\', \''.$mosConfig_ga_id.'\'], [\'_trackPageview\']];(function(d, t) {var g = d.createElement(t),s = d.getElementsByTagName(t)[0];g.async = true;g.src = (\'https:\' == location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';s.parentNode.insertBefore(g, s);})(document, \'script\');</script>';
if ($mosConfig_ga == 1) { echo $ga_script; }
echo "\n";
$ym_script = '<script type="text/javascript" src="//mc.yandex.ru/metrika/watch.js"></script>
<div class="nodisplay"><script type="text/javascript">try{var yaCounter'.$mosConfig_ym_id.'=new Ya.Metrika('.$mosConfig_ym_id.');}catch(e){}</script></div>
<noscript><div style="position:absolute;"><img src="//mc.yandex.ru/watch/'.$mosConfig_ym_id.'" alt="Яндекс.Метрика '.$mosConfig_sitename.'" /></div></noscript>';
if ($mosConfig_ym == 1) { echo $ym_script; }
?>
</body>
</html>