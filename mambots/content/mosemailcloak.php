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
$_MAMBOTS->registerFunction('onPrepareContent', 'botMosEmailCloak');
// �������� �� ��������� ������� ����������� ����� � ����������, ��������� javascript
function botMosEmailCloak($published, &$row) {
	global $database, $_MAMBOTS;
// check whether mambot has been unpublished
	if (!$published) {
		return true;
	}
// simple performance check to determine whether bot should process further
	if (strpos($row->text, '@') === false) {
		return true;
	}
// simple check to allow disabling of bot
	$regex = '{emailcloak=off}';
	if (strpos($row->text, $regex) !== false) {
		$row->text = str_replace($regex, '', $row->text);
		return true;
	}
// check if param query has previously been processed
	if (!isset($_MAMBOTS->_content_mambot_params['mosemailcloak'])) {
// �������� ���������� � ���������� �������
		$query = "SELECT params" . "\n FROM #__mambots" . "\n WHERE element = 'mosemailcloak'" .
				"\n AND folder = 'content'";
		$database->setQuery($query);
		$database->loadObject($mambot);
// save query to class variable
		$_MAMBOTS->_content_mambot_params['mosemailcloak'] = $mambot;
	}
// pull query data from class variable
	$mambot = $_MAMBOTS->_content_mambot_params['mosemailcloak'];
	$botParams = new mosParameters($mambot->params);
	$mode = $botParams->def('mode', 1);
// any@email.address.com
	$search_email = "([[:alnum:]_\.\-]+)(\@[[:alnum:]\.\-]+\.+)([[:alnum:]\.\-]+)";
// any@email.address.com?subject=anyText
	$search_email_msg = "([[:alnum:]_\.\-]+)(\@[[:alnum:]\.\-]+\.+)([[:alnum:]\.\-]+)([[:alnum:][:space:][:punct:]][^\"<>]+)";
// anyText
	$search_text = "([[:alnum:][:space:][:punct:]][^<>]+)";
// ����� ���� ������ ���� <a href="mailto:email@amail.com">email@amail.com</a>
	$pattern = botMosEmailCloak_searchPattern($search_email, $search_email);
	while (eregi($pattern, $row->text, $regs)) {
		$mail = $regs[2] . $regs[3] . $regs[4];
		$mail_text = $regs[5] . $regs[6] . $regs[7];
// ��������, ���������� �� ����� ����� �� ������ ����� � ��������� ����
		if ($mail_text) {
			$replacement = mosHTML::emailCloaking($mail, $mode, $mail_text);
		} else {
			$replacement = mosHTML::emailCloaking($mail, $mode);
		}
// �������� ��������� ����� e-mail ��������������� �������
		$row->text = str_replace($regs[0], $replacement, $row->text);
	}
// search for derivativs of link code <a href="mailto:email@amail.com">anytext</a>
	$pattern = botMosEmailCloak_searchPattern($search_email, $search_text);
	while (eregi($pattern, $row->text, $regs)) {
		$mail = $regs[2] . $regs[3] . $regs[4];
		$mail_text = $regs[5];
		$replacement = mosHTML::emailCloaking($mail, $mode, $mail_text, 0);
// �������� ��������� ����� e-mail ��������������� �������
		$row->text = str_replace($regs[0], $replacement, $row->text);
	}
// search for derivativs of link code <a href="mailto:email@amail.com?subject=Text&body=Text">email@amail.com</a>
	$pattern = botMosEmailCloak_searchPattern($search_email_msg, $search_email);
	while (eregi($pattern, $row->text, $regs)) {
		$mail = $regs[2] . $regs[3] . $regs[4] . $regs[5];
		$mail_text = $regs[6] . $regs[7] . $regs[8];
// needed for handling of Body parameter
		$mail = str_replace('&amp;', '&', $mail);
// check to see if mail text is different from mail addy
		if ($mail_text) {
			$replacement = mosHTML::emailCloaking($mail, $mode, $mail_text);
		} else {
			$replacement = mosHTML::emailCloaking($mail, $mode);
		}
// replace the found address with the js cloacked email
		$row->text = str_replace($regs[0], $replacement, $row->text);
	}
// search for derivativs of link code <a href="mailto:email@amail.com?subject=Text&body=Text">anytext</a>
	$pattern = botMosEmailCloak_searchPattern($search_email_msg, $search_text);
	while (eregi($pattern, $row->text, $regs)) {
		$mail = $regs[2] . $regs[3] . $regs[4] . $regs[5];
		$mail_text = $regs[6];
// needed for handling of Body parameter
		$mail = str_replace('&amp;', '&', $mail);
		$replacement = mosHTML::emailCloaking($mail, $mode, $mail_text, 0);
// replace the found address with the js cloacked email
		$row->text = str_replace($regs[0], $replacement, $row->text);
	}
// search for plain text email@amail.com
	while (eregi($search_email, $row->text, $regs)) {
		$mail = $regs[0];
		$replacement = mosHTML::emailCloaking($mail, $mode);
// replace the found address with the js cloacked email
		$row->text = str_replace($regs[0], $replacement, $row->text);
	}
}
function botMosEmailCloak_searchPattern($link, $text) {
// <a href="mailto:anyLink">anyText</a>
	$pattern = "(<a [[:alnum:] _\"\'=\@\.\-]*href=[\"\']mailto:" . $link . "[\"\'][[:alnum:] _\"\'=\@\.\-]*)>" .
			$text . "</a>";
	return $pattern;
}
?>