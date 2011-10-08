<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
define("_VALID_MOS", 1);
$basePath = dirname(__FILE__);
require( $basePath . '/../../../globals.php' );
// $basepath reintialization required as globals.php will kill initial when RGs Emulation `Off`
$basePath = dirname(__FILE__);
require( $basePath . '/../../../configuration.php' );
require_once($GLOBALS['mosConfig_absolute_path'] . '/includes/database.php');
if ($GLOBALS['mosConfig_db'] != "") {
	$database = new database($GLOBALS['mosConfig_host'], $GLOBALS['mosConfig_user'], $GLOBALS['mosConfig_password'], $GLOBALS['mosConfig_db'], $GLOBALS['mosConfig_dbprefix']);
}
switch ($_GET['task']) {
	case 'vote':
		echo recordVote();
		break;
	case 'show':
		echo showVotes();
		break;
}
function recordVote() {
	global $database;
	$user_rating = intval($_GET['user_rating']);
	$cid = intval($_GET['cid']);
	if (($user_rating >= 1) and ($user_rating <= 5)) {
		$currip = ( phpversion() <= '4.2.1' ? @getenv('REMOTE_ADDR') : $_SERVER['REMOTE_ADDR'] );
		$query = "SELECT * FROM #__content_rating WHERE content_id = " . (int) $cid;
		$database->setQuery($query);
		$votesdb = NULL;
		if (!( $database->loadObject($votesdb) )) {
			$query = "INSERT INTO #__content_rating ( content_id, lastip, rating_sum, rating_count )"
				. "\n VALUES ( " . (int) $cid . ", " . $database->Quote($currip) . ", " . (int) $user_rating . ", 1 )";
			$database->setQuery($query);
			$database->query() or die($database->stderr());
			;
		} else {
			if ($currip != ($votesdb->lastip)) {
				$query = "UPDATE #__content_rating"
					. "\n SET rating_count = rating_count + 1, rating_sum = rating_sum + " . (int) $user_rating . ", lastip = " . $database->Quote($currip)
					. "\n WHERE content_id = " . (int) $cid;
				$database->setQuery($query);
				$database->query() or die($database->stderr());
			} else {
				return 0;
			}
		}
		return 1;
	}
}
function getPercentage() {
	global $database;
	$result = 0;
	$id = intval($_GET['cid']);
	$database->setQuery('SELECT * FROM #__content_rating WHERE content_id=' . (int) $id);
	$database->loadObject($vote);
	if ($vote->rating_count != 0) {
		$result = number_format(intval($vote->rating_sum) / intval($vote->rating_count), 2) * 100;
	}
	echo $result;
}
?>