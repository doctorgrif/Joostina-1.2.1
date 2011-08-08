<?php

/**
 * @package Joostina
 * @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
 * @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
 * Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
 * ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
 */
// ������ ������� �������
defined('_VALID_MOS') or die();
global $my;
$task = mosGetParam($_GET, 'task', 'publish');
$id = intval(mosGetParam($_REQUEST, 'id', '0'));
// Editor usertype check
$access = new stdClass();
$access->canEdit = $acl->acl_check('action', 'edit', 'users', $my->usertype, 'content', 'all');
$access->canEditOwn = $acl->acl_check('action', 'edit', 'users', $my->usertype, 'content', 'own');
$access->canPublish = $acl->acl_check('action', 'publish', 'users', $my->usertype, 'content', 'all');
// ������������ ���������� �������� task
switch ($task) {
	case 'publish':
		echo x_publish($id);
		return;
	case 'jsave':
		echo x_jsave($id);
		return;
	default:
		echo 'error-task';
		return;
}

function x_jsave($id) {
	global $database, $my, $access;
	if (!($access->canEdit || $access->canEditOwn)) {
		mosNotAuth();
		return;
	}
	$introtext = trim(joostina_api::convert(mosGetParam($_POST, 'introtext', '', _MOS_ALLOWRAW)));
	$fulltext = trim(joostina_api::convert(mosGetParam($_POST, 'fulltext', null, _MOS_ALLOWRAW)));
	if ($fulltext)
		$fulltext = ', `fulltext` = \'' . $fulltext . '=\'';
	$query = "UPDATE #__content"
			. "\n SET `introtext` = '" . $introtext . "', `modified` = '" . $database->getEscaped(date('Y-m-d H:i:s')) . '\''
			. $fulltext
			. "\n WHERE id = " . $id . " AND (checked_out = 0 OR (checked_out = " . (int) $my->id . "))";
	$database->setQuery($query);
	if (!$database->query()) {
		return 'error!';
	} else {
		mosCache::cleanCache('com_content');
		return 'Saved: ' . date('Y-m-d H:i:s') . ', id=' . $id;
	}
	return;
}

/* ���������� �������
 * $id - ������������� ������� */

function x_publish($id = null) {
	global $database, $my, $access;
// id ����������� ��� ��������� �� ������� - ����� ������
	if (!$id)
		return 'error-id';
	if (!($access->canEdit || ($access->canEditOwn))) {
		return 'error-access';
	}
	$state = new stdClass();
	$query = "SELECT state, publish_up, publish_down FROM #__content WHERE id = " . (int) $id;
	$database->setQuery($query);
	$row = $database->loadobjectList();
	$row = $row['0']; // ��������� ������� � ���������� ��������� ��������
	$now = _CURRENT_SERVER_TIME;
	$nullDate = $database->getNullDate();
	$ret_img = ''; // ���� ���� ����������� ������ ���������� ���� ������� ���������
	if ($now <= $row->publish_up && $row->state == 1) {
// ������� � ����������, ������������, �� ��� �� ��������  - ���������� ������ "��������������"
		$ret_img = 'publish_x.png';
		$state = '0'; // ���� ������������ - ������� � ����������
	} elseif ($now <= $row->publish_up && $row->state == 0) {
// ������� � ����������, �� ������������, � ��� �� ��������  - ���������� ������ "�� �������"
		$ret_img = 'publish_y.png';
		$state = '1';
		/* �� ���� ������������ - ��������� */
	} else
	if (($now <= $row->publish_down || $row->publish_down == $nullDate) && $row->state ==
			1) {
// �������� � ������������, ������� � ���������� � ���������� ������ "�� ������������"
		$ret_img = 'publish_x.png';
		$state = '0'; // ���� ������������ - ������� � ����������
	} else
	if (($now <= $row->publish_down || $row->publish_down == $nullDate) && $row->state ==
			0) {
// �������� � ������������, ������� � ���������� � ���������� ������ "�� ������������"
		$ret_img = 'publish_g.png';
		$state = '1';
		/* �� ���� ������������ - ��������� */
	} else
	if ($now > $row->publish_down && $row->state == 1) {
// ������������, �� ���� ���������� ����, ������� � ���������� � ���������� ������ "�� ������������"
		$ret_img = 'publish_x.png';
		$state = '0';
		/* �� ���� ������������ - ��������� */
	} else
	if ($now > $row->publish_down && $row->state == 0) {
// ������������, �� ���� ���������� ����, ������� � ���������� � ���������� ������ "�� ������������"
		$ret_img = 'publish_r.png';
		$state = '1';
		/* �� ���� ������������ - ��������� */
	}
	$query = "UPDATE #__content"
			. "\n SET state = " . (int) $state . ", modified = " . $database->Quote(date('Y-m-d H:i:s'))
			. "\n WHERE id = " . $id . " AND ( checked_out = 0 OR (checked_out = " . (int) $my->id . ") )";
	$database->setQuery($query);
	if (!$database->query()) {
		return 'error!';
	} else {
		mosCache::cleanCache('com_content');
		return $ret_img;
	}
}

?>