<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
//������ ��� ������� ������������ html-������ ����
//�� ������ ��������� ����������� ���������� �������
SpawConfig::setStaticConfigItem("dropdown_data_customdropdown_customdropdown",
array(
//������� �������� ��������:
//'��� ����� �����������' => '��� ����� ������������ � ������' , (�� �������� ��� �������)
//������ ������������ �������, �������� ������ � �������� HTML-�����! (<>)
'{mosimage}' => '{mosimage} - ������� ��������',
'{mospagebreak}' => '{mospagebreak} - ������ ��������',
//������� ��� multithumb! - ���� �� ����� �������
'{multithumb enable_thumbs=0}' => '{multithumb ����. ������}',
'{multithumb enable_thumbs=1}' => '{multithumb ���. ������}',
'{multithumb popup_type=lightbox}' => '{multithumb �������� � lightbox}',
'{multithumb popup_type=expansion}' => '{multithumb ������� ����������}',
'{jcomments off}' => '{jcomments off} - ���������� ������������',
'{jcomments on}' => '{jcomments on} - ��������� ������������',
'{nomultithumb}' => '{���� multithumb}',
'{multithumb}' => '{multithumb}',
//��������� ������ ������� ����� �������� �������� - ���� ����� ��������� ������������� ������ � ������:
//'�������� ����������' => '��� ����� ������������ � ������' , 
// �������� ���������� (� ������� PG_customdropdown_mytbl) ������������ ���� ��� �������� ����������� ������������ ����
'PG_customdropdown_mytbl' => '������ �������' //!!!��������� ������� � ������ - ��� ������� �� �����!!!
)
);
//������ ������ ���������� ���������� PG_customdropdown_prctbl ��� ������ �����������
//SpawConfig::setStaticConfigItem('�������� ����������',
//"���������� ���� ��� ��������� � ������� ��������, ������ ����� ���� ��������� �������, <,>; �������� ����� ���������� ��� \\n",
//SPAW_CFG_TRANSFER_JS);
SpawConfig::setStaticConfigItem(
'PG_customdropdown_mytbl',
"<p class='contentheading'>���������</p>\\n<p class='small'>����������</p>\\n<table cellpadding='5' border='1' class='mytablecssclass'>\\n <tr>\\n  <th>-</th>\\n  <th>-</th>\\n  <th>-</th>\\n  <th>-</th>\\n  <th>-</th>\\n  <th>-</th>\\n </tr>\\n  <tr>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n </tr>\\n  <tr>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n </tr>\\n  <tr>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n  <td>-</td>\\n </tr>\\n</table>",
SPAW_CFG_TRANSFER_JS
);
//��� ������ ��������� ���������� ���� ����� ....
?>