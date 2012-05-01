<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ��������� ����� ������������� �����
define('_VALID_MOS', 1);
if (function_exists('memory_get_usage')) {
	define('_MEM_USAGE_START', memory_get_usage());
} else {
	define('_MEM_USAGE_START', null);
}
// �������� ����������������� �����, ���� �� ���������, �� ����������� �������� ���������
if (!file_exists('configuration.php') || filesize('configuration.php') < 10) {
	$self = rtrim(dirname($_SERVER['PHP_SELF']), '/\\').'/';
	header('Location: http://'.$_SERVER['HTTP_HOST'] . $self.'installation/index.php');
	exit();
}
// ����������� ����� �������� ���������� ����������� ���������� ����������
require ('globals.php');
// ����������� ����� ������������
require_once ('configuration.php');
require_once ('includes/definitions.php');
// ���������������� ��� ������������� ������
$mosConfig_absolute_path = dirname(__FILE__);
// (c) boston ������� ����� �� ������� ������������� ��������
if ($mosConfig_time_gen) {
	list($usec, $sec) = explode(" ", microtime());
	$sysstart = ((float) $usec + (float) $sec);
}
// �������� � ��������� ������������ ���������
global $debug;
if ($mosConfig_debug) {
	require_once 'includes/debug/jdebug.php';
	$debug = new jdebug();
}
// �������� SSL - $http_host ���������� <url_�����>:<�����_�����, ���� �� 443>
$http_host = explode(':', $_SERVER['HTTP_HOST']);
if ((!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off' || isset($http_host[1]) && $http_host[1] == 443) && substr($mosConfig_live_site, 0, 8) != 'https://') {
	$mosConfig_live_site = 'https://'.substr($mosConfig_live_site, 7);
}
// ����������� ��������:start
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
	$mosConfig_caching = '0';
	$mosConfig_debug = '1';
	set_time_limit(0);
}
// :end
// ����������� �������� ����� - ���� �������
require_once ($mosConfig_absolute_path.'/includes/joomla.php');
// ����������� ��������:start
$prof = new mosProfiler();
// :end
// �������� �������� ���������, ������� ��� ������ � SVN
if (file_exists('installation/index.php') && $_VERSION->SVN == 0) {
	define('_INSTALL_CHECK', 1);
	include ($mosConfig_absolute_path.'/offline.php');
	exit();
}
// ������ 503
if ($mosConfig_offline == 1) {
	header('HTTP/1.1 503 Service Temporarily Unavailable');
	header('Status: 503 Service Temporarily Unavailable');
	header('Retry-After: 3600');
	require ($mosConfig_absolute_path.'/offline.php');
}
// (c) boston, ���������, ��������� �� ������������� ��������� ��������
if ($mosConfig_mmb_system_off == 0) {
	$_MAMBOTS->loadBotGroup('system');
// ������� ������� onStart
	$_MAMBOTS->trigger('onStart');
}
// ���� � ���������� ������������ �� ������� ������������ sef - �� ����� ���� ����� ����������
if ($mosConfig_sef == 1) {
	if (file_exists($mosConfig_absolute_path.'/components/com_sef/sef.php')) {
		require_once ($mosConfig_absolute_path.'/components/com_sef/sef.php');
	} else {
		require_once ($mosConfig_absolute_path.'/includes/sef.php');
	}
} else {

// ������� sefRelToAbs() - ���������, �������� ��� �� ��������
	function sefRelToAbs($string) {
		global $mosConfig_com_frontpage_clear, $mosConfig_live_site, $debug;
		if (eregi('option=com_frontpage', $string) & $mosConfig_com_frontpage_clear & !eregi('limit', $string))
			$string = '';
// ���� ������ ��� �� ��������� ������� �������� - ������� �
		if ((strpos($string, $mosConfig_live_site) !== 0)) {
			if (strncmp($string, '/', 1) == 0) {
				$live_site_parts = array();
				eregi("^(https?:[\/]+[^\/]+)(.*$)", $mosConfig_live_site, $live_site_parts);
				$string = $live_site_parts[1] . $string;
			} else {
				$check = 1;
// array list of non http/https URL schemes
				$url_schemes = explode(', ', _URL_SCHEMES);
				$url_schemes[] = 'http:';
				$url_schemes[] = 'https:';
				foreach ($url_schemes as $url) {
					if (strpos($string, $url) === 0) {
						$check = 0;
					}
				}
				if ($check) {
					$string = $mosConfig_live_site.'/'.$string;
				}
			}
		}
		return $string;
	}
}
// �������� � ������������� � �� WWW ������
joostina_api::check_host();
require_once ($mosConfig_absolute_path.'/includes/frontend.php');
// ����� ��������� ���������� url (��� form)
$option = strval(strtolower(mosGetParam($_REQUEST, 'option')));
$Itemid = intval(mosGetParam($_REQUEST, 'Itemid', null));
if ($option == '') {
	if ($Itemid) {
		$query = "SELECT id, link"
		. "\n FROM #__menu"
		. "\n WHERE menutype = 'mainmenu'"
		. "\n AND id = " . (int) $Itemid
		. "\n AND published = 1";
		$database->setQuery($query);
	} else {
	/* add STRAIGHT_JOIN */
		$query = "SELECT STRAIGHT_JOIN id, link"
		. "\n FROM #__menu"
		. "\n WHERE menutype = 'mainmenu'"
		. "\n AND published = 1"
		. "\n ORDER BY parent, ordering";
		$database->setQuery($query, 0, 1);
	}
	$menu = new mosMenu($database);
	if ($database->loadObject($menu)) {
		$Itemid = $menu->id;
	}
	$link = $menu->link;
	if (($pos = strpos($link, '?')) !== false) {
		$link = substr($link, $pos + 1).'&Itemid='.$Itemid;
	}
	parse_str($link, $temp);
// TODO: ���������� ��� ������� ���������� ����������� �����������
	foreach ($temp as $k => $v) {
		$GLOBALS[$k] = $v;
		$_REQUEST[$k] = $v;
		if ($k == 'option') {
			$option = $v;
		}
	}
}
if (!$Itemid) {
// ����� �� ������ Itemid, �� ��� ������������� �������� �� ���������
	$Itemid = 99999999;
}
// mainframe - �������� ������� ����� API, ������������ �������������� � '�����'
$mainframe = new mosMainFrame($database, $option, '.');
// ���������� ������� ������ �� ������
if ($mosConfig_session_front == 0)
	$mainframe->initSession();
// ������� ������� onAfterStart
if ($mosConfig_mmb_system_off == 0)
	$_MAMBOTS->trigger('onAfterStart');
// ��������, ���� �� ����� ����� Itemid � ����������
if ($option == 'com_content' && $Itemid === 0) {
	$id = intval(mosGetParam($_REQUEST, 'id', 0));
	$Itemid = $mainframe->getItemid($id);
}
// �� ��� ��� �� ���������� Itemid?
if ($Itemid === 0) {
// ���, ������������ ������ ������� ��������.
/* add STRAIGHT_JOIN */
	$query = "SELECT STRAIGHT_JOIN id"
	. "\n FROM #__menu"
	. "\n WHERE menutype = 'mainmenu'"
	. "\n AND published = 1"
	. "\n ORDER BY parent, ordering";
	$database->setQuery($query, 0, 1);
	$Itemid = $database->loadResult();
}
// ���� ���������� ����������� �� �������
if ($option == 'search') {
	$option = 'com_search';
}
// �������� ����� �������� ����� �� ���������
if ($mosConfig_lang == '') {
	$mosConfig_lang = 'russian';
}
include_once ($mosConfig_absolute_path.'/language/'.$mosConfig_lang.'.php');
// �������� ����� � ������ � �����-���
$return = strval(mosGetParam($_REQUEST, 'return', null));
$message = intval(mosGetParam($_POST, 'message', 0));
// ��������� ���������� � ������� ������������� �� ������� ������
// (c) boston, $my - ������ ��������, ������������ ����� � �� �� ����, �������� ���, �� � ������� ����������
$my = $mainframe->getUser();
if ($option == 'login') {
	$mainframe->login();
// ����������� ��������� JS
	if ($message) {
		?>
		<script type="text/javascript">alert("<?php echo addslashes(_LOGIN_SUCCESS);?>");</script>
		<?php
	}
	if ($return && !(strpos($return, 'com_registration') || strpos($return, 'com_login'))) {
// checks for the presence of a return url  and ensures that this url is not the registration or login pages
// ���� sessioncookie ����������, �������� �� �������� ��������. Otherwise, take an extra round for a cookiecheck
		if (isset($_COOKIE[mosMainFrame::sessionCookieName()])) {
			mosRedirect($return);
		} else {
			mosRedirect($mosConfig_live_site.'/index.php?option=cookiecheck&return='.urlencode($return));
		}
	} else {
// If a sessioncookie exists, redirect to the start page. Otherwise, take an extra round for a cookiecheck
		if (isset($_COOKIE[mosMainFrame::sessionCookieName()])) {
			mosRedirect($mosConfig_live_site.'/index.php');
		} else {
			mosRedirect($mosConfig_live_site.'/index.php?option=cookiecheck&return='.urlencode($mosConfig_live_site.'/index.php'));
		}
	}
} else
if ($option == 'logout') {
	$mainframe->logout();
// ����������� ��������� JS
	if ($message) {
		?>
		<script type="text/javascript">alert("<?php echo addslashes(_LOGOUT_SUCCESS);?>");</script>
		<?php
	}
	if ($return && !(strpos($return, 'com_registration') || strpos($return, 'com_login'))) {
// checks for the presence of a return url and ensures that this url is not the registration or logout pages
		mosRedirect($return);
	} else {
		mosRedirect($mosConfig_live_site.'/index.php');
	}
} else
if ($option == 'cookiecheck') {
// No cookie was set upon login. If it is set now, redirect to the given page. Otherwise, show error message.
	if (isset($_COOKIE[mosMainFrame::sessionCookieName()])) {
		mosRedirect($return);
	} else {
		mosErrorAlert(_ALERT_ENABLED);
	}
}
// ����������� ������� ���������
$mainframe->detect();
// ��������� �������� ��� overlib
$mainframe->set('loadOverlib', false);
$gid = intval($my->gid);
// ��������� ������� ��������
$cur_template = $mainframe->getTemplate();
// @global - ����� ��� �������� ���������� ��������� ����������
$_MOS_OPTION = array();
// (c) boston, ����������� ������� ���������, �.�. ������(����������� ) �� ������ ��������� - ��� ���� ���������
if ($mosConfig_frontend_login == 1)
	require_once ($mosConfig_absolute_path.'/editor/editor.php');
// ������ ����������� ��������� �����������
ob_start();
if ($path = $mainframe->getPath('front')) {
	$task = strval(mosGetParam($_REQUEST, 'task', ''));
	$ret = mosMenuCheck($Itemid, $option, $task, $gid);
	if ($ret) {
		require_once ($path);
	} else {
		mosNotAuth();
	}
} else {
	header('HTTP/1.0 404 Not Found');
	echo _NOT_EXIST;
}
$_MOS_OPTION['buffer'] = ob_get_contents();
// ������� ���������� - ���� ������ ���������� - mainbody
ob_end_clean();
// ��������� �������� ������ mainbody
if ($mosConfig_mmb_mainbody_off == 0) {
	$_MAMBOTS->loadBotGroup('mainbody');
	$_MAMBOTS->trigger('onMainbody');
}
initGzip();
/* ��� �������� ����������� �������� �������� ����� "����������" ��������� */
if (!$mosConfig_caching) {
/* �� ���������� */
	header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
	//header('Expires: '.date('r', $_SERVER['REQUEST_TIME']));
	header('Expires: Thu, 31 Dec 2020 20:00:00 GMT');
	header('Pragma: no-cache');
} else if ($option != 'logout' or $option != 'login') {
/* ���������� */
// get the last-modified-date of this very file
	$lastModified = filemtime($_SERVER['REQUEST_URI']);
// get a unique hash of this file (etag)
	$etagFile = md5($_SERVER['REQUEST_URI']);
// get the HTTP_IF_MODIFIED_SINCE header if set
	$ifModifiedSince = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
// get the HTTP_IF_NONE_MATCH header if set (etag: unique file hash)
	$etagHeader = (isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);
// set last-modified header
	header('Last-Modified: '.gmdate('D, d M Y H:i:s', $lastModified).' GMT');
// set etag-header
	header('Etag: '.$etagFile);
// make sure caching is turned on
	header('Cache-Control: public');
// check if page has changed. If not, send 304 and exit
	if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $lastModified || $etagHeader == $etagFile)
{
	header('HTTP/1.1 304 Not Modified');
	exit;
}
}
// ����������� ��������� �����������, ���������� ��� �������� ������ templates
ob_start();
// �������� ����� �������
if (!file_exists($mosConfig_absolute_path.'/templates/'.$cur_template.'/index.php')) {
	echo _TEMPLATE_WARN . $cur_template;
} else {
	require_once ($mosConfig_absolute_path.'/templates/'.$cur_template.'/index.php');
}
$_MOS_OPTION['mainbody'] = ob_get_contents(); // ������� ���������� - ���� ������ ���������� - mainbody
ob_end_clean();
// ��������� �������� ������ mainbody
if ($mosConfig_mmb_mainbody_off == 0) {
	$_MAMBOTS->loadBotGroup('mainbody');
	$_MAMBOTS->trigger('onTemplate');
}
// boston, ��������� ������ ������, �� ������ ��-���� �������
unset($_MAMBOTS, $mainframe);
// ����� ����� ����� ���� ��������, ��� ����� ��������� ��������� ������ onTemplate
echo $_MOS_OPTION['mainbody'];
// ������� ������� ��������� �������� (����� ��������� ����� ������ Super Administrator)
// ����� ���� ������� (��� ������� ����� ������ Super Administrator)
if ($mosConfig_time_gen &&$mosConfig_debug && $my->id == 62) {
	list($usec, $sec) = explode(" ", microtime());
	$sysstop = ((float) $usec + (float) $sec);
// ����������� ��������:start
	echo '<div id="jdebug">';
	// ������� ������� ��������� ��������
	echo '<p id="time_gen">�������� ������������� �� '.strip_tags($prof->mark('')).' ������.</p>';
	// ������� ������, ��������������� ��������
	if (function_exists('memory_get_usage')) {
		$mem_usage = (memory_get_usage() - _MEM_USAGE_START);
		$debug->add('<p id="memory_using"><span class="strong">'._SCRIPT_MEMORY_USING.':</span> '.sprintf('%0.2f', $mem_usage / 1048576).' MB</p>');
	}
	echo $debug->get($mosConfig_front_debug);
	echo '</div>';
}
doGzip();
// ��������� ���������� ����������� ������
if ($mosConfig_optimizetables == 1)
	joostina_api::optimizetables();
// ������� �������� ����
if ($mosConfig_clearCache == 1 && $mosConfig_caching == 1)
	joostina_api::clearCache();
exit();
?>