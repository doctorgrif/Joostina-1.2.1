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
require_once( $mainframe->getPath('toolbar_html') );
switch ($task) {
case "save_manager":
TOOLBAR_jmn::_DEFAULT();
break;
case "settings":
TOOLBAR_jmn::_SETTINGS();
break;
case "config":
TOOLBAR_jmn::_CONFIG();
break;
case "save_config":
TOOLBAR_jmn::_CONFIG();
break;
case "gen_metakey":
TOOLBAR_jmn::_DEFAULT();
break;
case "gen_metadesc":
TOOLBAR_jmn::_DEFAULT();
break;
case "about":
break;
case 'new':
break;
case 'edit':
break;
case 'editA':
break;
case 'go2menu':
case 'go2menuitem':
case 'resethits':
case 'menulink':
case 'apply':
case 'save':
break;
case 'remove':
break;
case 'publish':
break;
case 'unpublish':
break;
case 'toggle_frontpage':
break;
case 'archive':
break;
case 'unarchive':
changeContent( $cid, 0, $option );
break;
case 'cancel':
break;
case 'orderup':
break;
case 'orderdown':
break;
case 'showarchive':
break;
case 'movesect':
break;
case 'movesectsave':
break;
case 'copy':
break;
case 'copysave':
break;
case 'accesspublic':
break;
case 'accessregistered':
break;
case 'accessspecial':
break;
case 'saveorder':
break;
default:
TOOLBAR_jmn::_DEFAULT();
break;
}
?>