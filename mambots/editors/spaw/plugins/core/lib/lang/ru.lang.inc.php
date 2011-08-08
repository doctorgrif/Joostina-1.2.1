<?php 
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/

// charset to be used in dialogs
$spaw_lang_charset = 'windows-1251';

// language text data array
// first dimension - block, second - exact phrase
// alternative text for toolbar buttons and title for dropdowns - 'title'

$spaw_lang_data = array(
	'cut' => array(
		'title' => '��������'
	),
	'copy' => array(
		'title' => '����������'
	),
	'paste' => array(
		'title' => '��������'
	),
	'undo' => array(
		'title' => '��������'
	),
	'redo' => array(
		'title' => '���������'
	),
	'image' => array(
		'title' => '������� ������� �����������'
	),
	'image_prop' => array(
		'title' => '�����������',
		'ok' => '������',
		'cancel' => '��������',
		'source' => '��������',
		'alt' => '������� ��������',
		'align' => '������������',
		'left' => '����� (left)',
		'right' => '������ (right)',
		'top' => '������ (top)',
		'middle' => '� ������ (middle)',
		'bottom' => '����� (bottom)',
		'absmiddle' => '���. ����� (absmiddle)',
		'texttop' => '������ (texttop)',
		'baseline' => '����� (baseline)',
		'width' => '������',
		'height' => '������',
		'border' => '�����',
		'hspace' => '���. ����',
		'vspace' => '����. ����',
		'dimensions' => '�������',
		'reset_dimensions' => '������������ �������',
		'title_attr' => '���������',
		'constrain_proportions' => '��������� ���������',
		'error' => '������',
		'error_width_nan' => '������ �� �������� ������',
		'error_height_nan' => '������ �� �������� ������',
		'error_border_nan' => '����� �� �������� ������',
		'error_hspace_nan' => '������������� ���� �� �������� ������',
		'error_vspace_nan' => '������������ ���� �� �������� ������',
	),
	'flash_prop' => array(// <= new in 2.0
		'title' => 'Flash',
		'ok' => '������',
		'cancel' => '��������',
		'source' => '��������',
		'width' => '������',
		'height' => '������',
		'error' => '������',
		'error_width_nan' => '������ �� �������� ������',
		'error_height_nan' => '������ �� �������� ������',
	),
	'inserthorizontalrule' => array(
		'title' => '�������������� �����'
	),
	'table_create' => array(
		'title' => '������� �������'
	),
	'table_prop' => array(
		'title' => '��������� �������',
		'ok' => '������',
		'cancel' => '��������',
		'rows' => '������',
		'columns' => '�������',
		'css_class' => '�����', // <=== new 1.0.6
		'width' => '������',
		'height' => '������',
		'border' => '�����',
		'pixels' => '����.',
		'cellpadding' => '������ �� �����',
		'cellspacing' => '��������� ����� ��������',
		'bg_color' => '���� ����',
		'background' => '������� �����������', // <=== new 1.0.6
		'error' => '������',
		'error_rows_nan' => '������ �� �������� ������',
		'error_columns_nan' => '������� �� �������� ������',
		'error_width_nan' => '������ �� �������� ������',
		'error_height_nan' => '������ �� �������� ������',
		'error_border_nan' => '����� �� �������� ������',
		'error_cellpadding_nan' => '������ �� ����� �� �������� ������',
		'error_cellspacing_nan' => '��������� ����� �������� �� �������� ������',
	),
	'table_cell_prop' => array(
		'title' => '��������� ������',
		'horizontal_align' => '�������������� ������������',
		'vertical_align' => '������������ ������������',
		'width' => '������',
		'height' => '������',
		'css_class' => '�����',
		'no_wrap' => '��� ��������',
		'bg_color' => '���� ����',
		'background' => '������� �����������',
		'ok' => '������',
		'cancel' => '��������',
		'left' => '�����',
		'center' => '� ������',
		'right' => '������',
		'top' => '������',
		'middle' => '� ������',
		'bottom' => '�����',
		'baseline' => '������� ����� ������',
		'error' => '������',
		'error_width_nan' => '������ �� �������� ������',
		'error_height_nan' => '������ �� �������� ������',
	),
	'table_row_insert' => array(
		'title' => '�������� ������'
	),
	'table_column_insert' => array(
		'title' => '�������� �������'
	),
	'table_row_delete' => array(
		'title' => '������� ������'
	),
	'table_column_delete' => array(
		'title' => '������� �������'
	),
	'table_cell_merge_right' => array(
		'title' => '���������� ������'
	),
	'table_cell_merge_down' => array(
		'title' => '���������� ����'
	),
	'table_cell_split_horizontal' => array(
		'title' => '��������� �� �����������'
	),
	'table_cell_split_vertical' => array(
		'title' => '��������� �� ���������'
	),
	'style' => array(
		'title' => '�����'
	),
	'fontname' => array(
		'title' => '�����'
	),
	'fontsize' => array(
		'title' => '������'
	),
	'formatBlock' => array(
		'title' => '�����'
	),
	'bold' => array(
		'title' => '������'
	),
	'italic' => array(
		'title' => '������'
	),
	'underline' => array(
		'title' => '������������'
	),
	'strikethrough' => array(
		'title' => '�������������'
	),
	'insertorderedlist' => array(
		'title' => '������������� ������'
	),
	'insertunorderedlist' => array(
		'title' => '��������������� ������'
	),
	'indent' => array(
		'title' => '��������� ������'
	),
	'outdent' => array(
		'title' => '��������� ������'
	),
	'justifyleft' => array(
		'title' => '������������ �����'
	),
	'justifycenter' => array(
		'title' => '������������ �� ������'
	),
	'justifyright' => array(
		'title' => '������������ ������'
	),
	'justifyfull' => array(
		'title' => '������������ �� ������'
	),
	'fore_color' => array(
		'title' => '���� ������'
	),
	'bg_color' => array(
		'title' => '���� ����'
	),
	'design' => array(
		'title' => '������������� � ����� ������������� (WYSIWYG)'
	),
	'html' => array(
		'title' => '������������� � ����� �������������� ���� (HTML)'
	),
	'colorpicker' => array(
		'title' => '����� �����',
		'ok' => '������',
		'cancel' => '��������',
	),
	'cleanup' => array(
		'title' => '������ HTML',
		'confirm' => '��� �������� ������ ��� �����, ������ � �������� ���� �� �������� ����������� ���������. ����� ��� ��� ���� �������������� ����� ���� �������.',
		'ok' => '������',
		'cancel' => '��������',
	),
	'toggle_borders' => array(
		'title' => '�������� �����',
	),
	'hyperlink' => array(
		'title' => '�����������',
		'url' => '�����',
		'name' => '���',
		'target' => '�������',
		'title_attr' => '��������',
	'a_type' => '���',
	'type_link' => '������',
	'type_anchor' => '�����',
	'type_link2anchor' => '������ �� �����',
	'anchors' => '�����',
		'ok' => '������',
		'cancel' => '��������',
	),
	'hyperlink_targets' => array( 
		'_self' => '� ��� �� ������ (_self)',
	'_blank' => '� ����� ���� (_blank)',
	'_top' => '�� ��� ���� (_top)',
	'_parent' => '� ������������ ������ (_parent)'
	),
	'unlink' => array(
		'title' => '������ �����������'
	),
	'table_row_prop' => array(
		'title' => '��������� ������',
		'horizontal_align' => '�������������� ������������',
		'vertical_align' => '������������ ������������',
		'css_class' => '�����',
		'no_wrap' => '��� ��������',
		'bg_color' => '���� ����',
		'ok' => '������',
		'cancel' => '��������',
		'left' => '�����',
		'center' => '� ������',
		'right' => '������',
		'top' => '������',
		'middle' => '� ������',
		'bottom' => '�����',
		'baseline' => '������� ����� ������',
	),
	'symbols' => array(
		'title' => '����. �������',
		'ok' => '������',
		'cancel' => '��������',
	),
	'templates' => array(
		'title' => '�������',
	),
	'page_prop' => array(
		'title' => '��������� ��������',
		'title_tag' => '���������',
		'charset' => '����� ��������',
		'background' => '������� �����������',
		'bgcolor' => '���� ����',
		'text' => '���� ������',
		'link' => '���� ������',
		'vlink' => '���� ��������� ������',
		'alink' => '���� �������� ������',
		'leftmargin' => '������ �����',
		'topmargin' => '������ ������',
		'css_class' => '�����',
		'ok' => '������',
		'cancel' => '��������',
	),
	'preview' => array(
		'title' => '��������������� ��������',
	),
	'image_popup' => array(
		'title' => 'Popup �����������',
	),
	'zoom' => array(
		'title' => '����������',
	),
	'subscript' => array(
		'title' => '������ ������',
	),
	'superscript' => array(
		'title' => '������� ������',
	),
);
?>