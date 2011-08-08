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
  'spawfm' => array(
    'title' => 'SPAW �������� ������',
    'error_reading_dir' => '������ ��� ���������� ��������.',
    'error_upload_forbidden' => '������: � ���� �������� �������� ������ ���������.',
    'error_upload_file_too_big' => '�������� ����������: ���� ������� �������.',
    'error_upload_failed' => '������ ��� ��������.',
    'error_upload_file_incomplete' => '�������� �������� ����, ���������.',
    'error_bad_filetype' => '������: ����� ����� ���� �� �����������.',
    'error_max_filesize' => '������������ ������ ������:',
    'error_delete_forbidden' => '������: � ���� �������� ������� ����� ���������.',
    'confirm_delete' => '�� ��������, ��� ������ ������� ���� "[*file*]"?',
    'error_delete_failed' => '������: ������� ���� �� �������, �������� �� ��� �� ������� ����.',
    'error_no_directory_available' => '��� ��������� ��� ���������.',
    'download_file' => '[������� ����]',
    'error_chmod_uploaded_file' => '�������� ����� �������, �� �� ������� �������� ��� �����.',
    'error_img_width_max' => '������������ ���������� ������ �����������: [*MAXWIDTH*]px',
    'error_img_height_max' => '������������ ���������� ������ �����������: [*MAXHEIGHT*]px',
    'rename_text' => '������� ����� ��� ��� "[*FILE*]":',
    'error_rename_file_missing' => '������������� �� ������� - ���� �� ������.',
    'error_rename_directories_forbidden' => '������: � ���� �������� ��������������� �������� ���������.',
    'error_rename_forbidden' => '������: � ���� �������� ��������������� ����� ���������.',
    'error_rename_file_exists' => '������: "[*FILE*]" ��� ����������.',
    'error_rename_failed' => '������: ������������� �� �������, �������� �� ��� �� ������� ����.',
    'error_rename_extension_changed' => '������: ������ ���������� ���������!',
    'newdirectory_text' => '������� ��� ��������:',
    'error_create_directories_forbidden' => '������: ��������� �������� ���������',
    'error_create_directories_name_used' => '��� ��� ��� ����, �������� ������.',
    'error_create_directories_failed' => '������: ������� ������� �� �������, �������� �� ��� �� ������� ����.',
    'error_create_directories_name_invalid' => '��� ������� ������������ � �������� ������: / \\ : * ? " < > |',
    'confirmdeletedir_text' => '�� �������, ��� ������ ������� ������� "[*DIR*]"?',
    'error_delete_subdirectories_forbidden' => '������: ������� �������� ���������.',
    'error_delete_subdirectories_failed' => '������ ��� �������� ��������, �������� �� ��� �� ������� ����.',
    'error_delete_subdirectories_not_empty' => '������� �� ������.',
  ),
  'buttons' => array(
    'ok'        => '������',
    'cancel'    => '��������',
    'view_list' => '���������� ������',
    'view_details' => '���������� ��������� ������',
    'view_thumbs' => '���������� �����',
    'rename'    => '�������������...',
    'delete'    => '�������',
    'go_up'     => '�����',
    'upload'    =>  '���������',
    'create_directory'  =>  '������� �������...',
  ),
  'file_details' => array(
    'name'  =>  '��������',
    'type'  =>  '���',
    'size'  =>  '��������',
    'date'  =>  '���� ����������',
    'filetype_suffix'  =>  '����',
    'img_dimensions'  =>  '�������',
    'file_folder'  =>  '�������',
  ),
  'filetypes' => array(
    'any'       => '��� ����� (*.*)',
    'images'    => '����������',
    'flash'     => 'Flash �����',
    'documents' => '���������',
    'audio'     => '����� �����',
    'video'     => '����� �����',
    'archives'  => '�������� �����',
    '.jpg'  =>  'JPG ����',
    '.jpeg' =>  'JPG ����',
    '.gif'  =>  'GIF ����',
    '.png'  =>  'PNG ����',
    '.swf'  =>  'Flash ����',
    '.doc'  =>  '�������� Microsoft Word',
    '.xls'  =>  '�������� Microsoft Excel',
    '.pdf'  =>  'PDF ��������',
    '.rtf'  =>  'RTF ��������',
    '.odt'  =>  '�������� OpenDocument Text',
    '.ods'  =>  '�������� OpenDocument Spreadsheet',
    '.sxw'  =>  '�������� OpenOffice.org 1.0 Text',
    '.sxc'  =>  '�������� OpenOffice.org 1.0 Spreadsheet',
    '.wav'  =>  'WAV ����� ����',
    '.mp3'  =>  'MP3 ����� ����',
    '.ogg'  =>  'Ogg Vorbis ����� ����',
    '.wma'  =>  'Windows ����� ����',
    '.avi'  =>  'AVI ����� ����',
    '.mpg'  =>  'MPEG ����� ����',
    '.mpeg' =>  'MPEG ����� ����',
    '.mov'  =>  'QuickTime ����� ����',
    '.wmv'  =>  'Windows ����� ����',
    '.zip'  =>  'ZIP �����',
    '.rar'  =>  'RAR �����',
    '.gz'   =>  'gzip �����',
    '.txt'  =>  '��������� ��������',
  ),
);
?>