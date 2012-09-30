<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет прямого доступа
defined('_VALID_MOS') or die();
$_MAMBOTS->registerFunction('onAfterDisplayContent', 'joostinasocialbot');
function joostinasocialbot(&$row, &$params) {
	global $database, $mainframe, $task, $option, $mosConfig_live_site, $mainframe, $_MAMBOTS, $Itemid, $sociable;
	if ($option == 'com_content' AND $task == 'view') {
// Get Settings from Parameter-System
		$query = "SELECT id FROM #__mambots WHERE element = 'joostinasocialbot' AND folder = 'content'";
		$database->setQuery($query);
		$database->loadObject($mambot);
		$database->setQuery($query);
		$frontpage_id = $database->loadResult();
		if(isset($mambot->params))
		$botParams = new mosParameters($mambot->params);
		if ($Itemid == NULL) {
			$Itemid = '';
		} else {
			$Itemid = '&amp;Itemid=' . $Itemid;
		}
		$link = 'index.php?option=com_content&amp;task=view&amp;id=' . $row->id . $Itemid;
		$link = sefRelToAbs($link);
		$title = $params->get('arttitle', $row->title);
		$title = iconv('windows-1251', 'utf-8', $title);
		$title = urlencode($title);
		$intro = $params->get('intro', $row->introtext);
		$intro = iconv('windows-1251', 'utf-8', $intro);
		$intro = urlencode($intro);
		$jsbbefore = $params->get('jsbbefore', _JSB_BEFORE);
		$jsbafter = $params->get('jsbafter', _JSB_AFTER);
		$sociable .= '<div class="jsb">';
		$sociable .= '<p class="jsbbefore">' . $jsbbefore . '</p>';
		$sociable .= '<ul>';
		//$sociable .= '<li><a href="http://www.bobrdobr.ru/addext.html?url=' . $link . '&amp;title=' . $title . '" target="_blank" title="' . _JSB_ADD .' BobrDobr" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/bobrdobr.png" alt="' . _JSB_ADD .' BobrDobr" /></a></li>';
		$sociable .= '<li><a href="http://www.del.icio.us/post?v=4&amp;noui&amp;jump=close&amp;url=' . $link . '&title=' . $title . '" target="_blank" title="' . _JSB_ADD .' del.icio.us" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/delicious.png" alt="' . _JSB_ADD .' del.icio.us" /></a></li>';
		$sociable .= '<li><a href="http://digg.com/submit?url=' . $link . '" target="_blank" title="' . _JSB_ADD .' Digg!" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/digg.png" alt="' . _JSB_ADD .' Digg!" /></a></li>';
		$sociable .= '<li><a href="http://www.facebook.com/sharer.php?u=' . $link . '" target="_blank" title="' . _JSB_ADD .' FaceBook" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/facebook.png" alt="' . _JSB_ADD .' FaceBook" /></a></li>';
		$sociable .= '<li><a href="http://www.google.com/bookmarks/mark?op=add&amp;bkmk=' . $link . '&title=' . $title . '" target="_blank" title="' . _JSB_ADD .' Google" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/google.png" alt="' . _JSB_ADD .' Google" /></a></li>';
		//$sociable .= '<li><a href="http://www.google.com/reader/link?url=' . $link . '&amp;title=' . $title . '&amp;srcURL=$mosConfig_live_site" target="_blank" title="' . _JSB_ADD .' Google Buzz" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/googlebuzz.png" alt="' . _JSB_ADD .' Google Buzz" /></a></li>';
		//$sociable .= '<li><a href="http://www.liveinternet.ru/journal_post.php?action=l_add&amp;cnurl=' . $link . '" target="_blank" title="' . _JSB_ADD .' Liveinternet" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/liveinternet.png" alt="' . _JSB_ADD .' Liveinternet" /></a></li>';
		//$sociable .= '<li><a href="http://www.livejournal.com/update.bml?event=' . $link . '&amp;subject=' . $title . '" target="_blank" title="' . _JSB_ADD .' livejournal.com" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/livejournal.png" alt="' . _JSB_ADD .' livejournal.com" /></a></li>';
		//$sociable .= '<li><a href="http://connect.mail.ru/share?share_url=' . $link . '&amp;title=' . $title . '&amp;description=' . $intro . '" target="_blank" title="' . _JSB_ADD .' Мой Мир" rel="nofollow" ><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/mojmir.png" alt="' . _JSB_ADD .' в Мой Мир" /></a></li>';
		//$sociable .= '<li><a href="http://www.memori.ru/link/?sm=1&amp;u_data[url]=' . $link . '&amp;u_data[name]=' . $title . '" target="_blank" title="' . _JSB_ADD .' Memori" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/memori.png" alt="' . _JSB_ADD .' Memori" /></a></li>';
		//$sociable .= '<li><a href="http://www.mister-wong.ru/index.php?action=addurl&amp;bm_url=' . $link . '&amp;bm_description=' . $title . '" target="_blank" title="' . _JSB_ADD .' Mister Wong" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/mrwong.png" alt="' . _JSB_ADD .' Mister Wong" /></a></li>';
		//$sociable .= '<li><a href="moemesto.ru/post.php?url=' . $link . '&amp;title=' . $title . '" target="_blank" title="' . _JSB_ADD .' MoeMesto" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/moemesto.png" alt="' . _JSB_ADD .' MoeMesto" /></a></li>';
		//$sociable .= '<li><a href="http://news2.ru/add_story.php?url=' . $link . '" target="_blank" title="' . _JSB_ADD .' News2.ru" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/news2ru.png" alt="' . _JSB_ADD .' News2.ru" /></a></li>';
		//$sociable .= '<li><a href="http://pikabu.ru/add_story.php?story_url=' . $link . '" target="_blank" title="' . _JSB_ADD .' Пикабу" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/pikabu.png" alt="' . _JSB_ADD .' Пикабу" /></a></li>';
		//$sociable .= '<li><a href="http://www.technorati.com/faves?add=' . $link . '" target="_blank" title="' . _JSB_ADD .' Technorati" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/technorati.png" alt="' . _JSB_ADD .' Technorati" /></a></li>';
		$sociable .= '<li><a href="http://twitter.com/home/?status=' . $title . '+' . $link . '" target="_blank" title="' . _JSB_ADD .' Twitter" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/twitter.png" alt="' . _JSB_ADD .' Twitter" /></a></li>';
		//$sociable .= '<li><a href="http://vkontakte.ru/share.php?url=' . $link . '" target="_blank" title="' . _JSB_ADD .' ВКонтакте" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/vkontakte.png" alt="' . _JSB_ADD .' ВКонтакте" /></a></li>';
		//$sociable .= '<li><a href="http://my.ya.ru/posts_add_link.xml?title=' . $title . '&amp;URL=' . $link . '" target="_blank" title="' . _JSB_ADD .' Я.ру" rel="nofollow"><img src="' . $mosConfig_live_site . '/templates/' . $mainframe->getTemplate() . '/i/b/social/yandex.png" alt="' . _JSB_ADD .' Я.ру" /></a></li>';
		$sociable .= "</ul>";
		$sociable .= '<p class="jsbafter">' . $jsbafter . '</p>';
		$sociable .= '</div>';
	}
	return $sociable;
}
?>