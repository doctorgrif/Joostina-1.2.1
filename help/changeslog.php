<?php
/**
* @package Joostina
* @copyright ��������� ����� (C) 2008 Joostina team. ��� ����� ��������.
* @license �������� http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, ��� help/license.php
* Joostina! &ndash; ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
/* ������ ������� ������� */
defined('_VALID_MOS') or die();
?>
<div class="sysinfo">
<img src="<?php echo $mosConfig_live_site; ?>/help/i/joostina.png" alt="Joostina Changelog" style="float:right;" />
<p class="strong">upd. 01.01.12 &ndash; 01.05.12</p><ol>
<li>������� ��� �������� ��������� ������� (/installation/*.php, /installation/*.css).</li>
<li>��������� ���������� � *.sql ����� �����������.</li>
<li>�������� jQuery �� ������ 1.7.1.</li>
<li>�������� ����� �������� jQuery � ������ jquery.[plugin_name], ������ ��������� ��������� �� ���� ������� ������ ��������.</li>
<li>������� /includes/joostina.php &ndash; ��������� ��������� html � notetext.</li>
<li>����������� ORDER BY (� mysql ����� ��������� ������� STRAIGHT_JOIN ��� JOIN-� ������ � ��������� �������) [ http://habrahabr.ru/blogs/mysql/138163/ ].</li>
<li>���������� ���������� ������ ������ � /mambots/mosimage.php ��� ������ ����������� �� ������.</li>
<li>�������� ���� ������� ����������� &ndash; /language/russian.php.</li>
<li>�������� ������� ������ �� �������� substr �� mb_substr &ndash; ��������� ��������� ������.</li>
<li>� ����������� � ���������� ��������� ����������� ������ �� ��� ��������</li>
<li>���������� ���������� ������� � ��������� ������, ����������� ������� mod_mainmenu</li>
<li>���������� �������������� ������� $j_spaw_config['user_dir'] � $j_spaw_config['template'] � WISWIG ��������� Spaw </li>
<li>���������� ������, �������������� ��� php_flag display_errors On � php_flag display_startup_errors On<pre><code>Warning: Call-time pass-by-reference has been deprecated in \htdocs\sitepath\includes\Cache\Lite\Function.php on line n
Fatal error: Call to a member function add() on a non-object in \htdocs\sitepath\index.php on line n
Notice: Undefined offset: 1 in \htdocs\sitepath\modules\mod_mljoostinamenu.php on line n</code></pre></li>
<li>������ ����� ������ ��� Joostina, �������� ��� ������.</li>
<li>������ ������ �� &laquo;���������� ��������� �������&raquo; �� ������� &laquo;����������&raquo; &ndash; ������ ����������� ������ ������� &laquo;����&raquo;.</li>
<li>���������� ������� &laquo;������� �����&raquo; � &laquo;������� �����������&raquo;, ������ �����������, ����� ����� ������ &laquo;��������� ������� �����������&raquo; &ndash; ����� ���������� ��� ������������� � .xml ����� ����������.</li>
<li>������������� ������ ����������� joostfree.</li>
<li>��� ���������� ����������� com_jwmmxtd ��������� ������ Litebox (���������������� ������ <a href="http://www.huddletogether.com/projects/lightbox/" title="Lightbox">Lightbox</a>). ��� ����� �� ����������� ����������� ������� ������������ popup, ������������ ������ ��������. [����� ������ ����������� &ndash; <a href="http://www.aether.ru/" title="��������� ���������">��������� ���������</a>]<ul><li>����� 5.4 �� (12.5 �� ������������ Lightbox). �������� ���������� ������� � CSS.</li>
<li>����� ����������� ������������� ��������, �� �������� ����. �� ������� �������� �������� &ndash; ��������� ���������.</li></ul></li>
<li>��������� ��������� /includes/pageNavigation.php - &ndash; ����������� ������ �� &laquo;��������� 10&raquo;/&laquo;���������� 10&raquo; ������������� ���� ��� ����� ������� ����� 10, ��� ��������, �� ��� ������, ��������.</li>
<li>���������� ������<pre><code>Warning: preg_split() [function.preg-split]: No ending delimiter '=' found in \htdocs\sitepath\index2.php on line n</code></pre>�������������� ��� �������� �� ������, ����������� ������ � ������� ������
<pre><code>$iso = preg_split('=', _ISO);</code></pre>��<pre><code>$iso = explode('=', _ISO);</code></pre></li>
<li>��������� &laquo;��������&raquo; (���� ��� ����).</li>
</ol><p class="strong">upd. 10.09.11 &ndash; 31.12.11</p><ol>
<li>��������� ������� ��� � ������, ����������, ������� � ������� (������������� ������������� �� �� 31 ������� 2011 �. �725 �<a href="http://www.government.ru/gov/results/16355/print/">� ������� ����������, ���������� ������ ������� ����, � ������� ���������� ������� � ������� �����, � ����� � ��������� ����������� ���� ��������� ������������� ������������� ���������� ���������</a>�, <a href="http://www.rg.ru/2011/09/06/chas-zona-dok.html">������������</a> � �������� � ���� 6 �������� 2011).</li>
<li>���������� ������ � ������� ��������� spaw &ndash; �� ����������� ����� ��� �������������� � front-end. BUGFIX ��������� spaw �� v.2.0.8.1: possilbe security issue fixed in file class/theme.class.php
</li>
<li>���������� ������ � ������������� "charset=".</li>
<li>�������� ������-�������� � �������� &ndash; �������� ������ �� ��������������� ������� ������� �����.</li>
<li>���������� ������ � �������������� ������ � �����������.</li>
<li>���������� ����� Notice/Warning ��� ���������� php_flag display_errors � php_flag display_startup_errors.</li>
<li>� ���� ���������� ������ � ��������� (����� /mambots/editors-xtd) ��������������� ����� �������� ������ ��������<code><pre>$_MAMBOTS->loadBotGroup('editors-xtd');</pre></code></li>
<li>���������� ������ � ���������� ������ � ����� � �������� FireFox (back-end)</li>
</ol><p class="strong">upd. 18.09.11 &ndash; 05.10.11</p><ol>
<li>������ ������ ����</li>
<li>Joostina 1.2.1.4 Stabile</li>
</ol><p class="strong">upd. 31.07.11 &ndash; 17.09.11</p><ol>
<li>��������� ������� header() ��� �������� ����������.</li>
<li>�������� /language/russian.ignore.php.</li>
<li>������� ������ ����������� � back-end. ��������� ����������� �����.</li>
<li>������� ������ ������ DOCTYPE. ��� ����� � ������� �������������� �� HTTP_USER_AGENT<pre><code>if (stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
echo '&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"&gt;
&lt;?xml version="1.0" encoding="' . $iso[1] . '"?' . '&gt;';
} else {
echo '&lt;!DOCTYPE html&gt;';
}</code></pre></li>
<li>������� ������ ������ favicon ��� IE &ndash; ������ ����� �� HTTP_USER_AGENT (��. ������ ���� ����).</li>
<li>������� ������ ������ ����� ���������� ����� � ������ ��� IE &ndash; ������ ����� �� HTTP_USER_AGENT (��. ������ ���� ����).</li>
<li>����������� ���������� �� ��������� ������� ������ ����������� ���������� ������������.<ol>
<li>�������� ������ ������ �������� � ����������� ���������/������� ����������� (������) � ���������� /components/com_content. ��������� ����������� �����.</li>
<li>�������� ������ ������ ����������� � ���������� /components/com_login. ��������� ����������� �����.</li>
<li>�������� ������ ������ ���������������� ������ � ���������� /components/com_user. ��������� ����������� �����.</li>
<li>�������� ������ ������ ������������ ��������� (.pagenav_next, .pagenav_prev) � ���������� /components/com_content &ndash; �� ������� �������� � ������, ��������� �����, �������� ���������� ��������� ������������ �������.</li>
<li>�������� ������ ������ ������ pdf/print/email/edit � ���������� /components/com_content, /components/com_contact � /includes/joomla.php &ndash; � ���������� ���������� � ����. �������� ������ ������ ��������� ����������� (������/��������). ��������� ����������� �����.</li>
<li>�������� ������ ������ �������� ���������/�������, ������, ��� ��������/����������� ����������� (������) � ���������� /components/com_content. �������� ����� ������� (��������� ������� �������� microavatar) ����� ������ ������ ����������� � ����� � � ��������� ������ (�� ������� ���� <a href="http://joomla-support.ru/showthread.php?t=5527">Fanamura</a>). ��� ����� ��������� (� lightbox) �������������� ������. ��������� ����������� �����.</li>
<li><strong>upd.</strong> �������� ������ ������ ������, ��� ��������/����������� ����������� (������), ������� � ���������� /components/com_content. ��������� ��� ������. ��������� ����������� �����.</li>
<li>�������� ������ ������ ������� � ���������� /components/com_banners. ��������� ����������� �����.</li>
<li>��������� ������ mambots/content/joostinasocialbot. ��������� ����������� �����.</li>
<li>��������� ������ mambots/content/joostinatags. ��������� ����������� �����.</li>
<li>��������� ������ mambots/content/plugin_jw_ajaxvote. ��������� ����������� �����.</li>
</ol></li>
<li>��������� ����������� back-end ����� cms ������������.<ol>
<li>��������� administrator/com_config ��������� ��� ������������� ������������� ��������� � ��� ������� ������� ������������ Google Analitics (YES/NO RadioButton + input textarea). ��� ������������� ������������� ����� ��� � �������� ��������� ������� ���������� ��������������� ����� �������, ������������ ���� configuration.php.</li>
<li>��������� administrator/com_config ��������� ��� ������������� ������������� ��������� � ��� ������� ������� ������������ ������.������� (YES/NO RadioButton + input textarea). ��� ������������� ������������� ����� ��� � �������� ��������� ������� ���������� ��������������� ����� �������, ������������ ���� configuration.php.</li>
<li>Dublin Core Metadata Element Set (DCMES)<pre><code>&lt;meta name="DC.Title" content="title" /&gt; /*�������*/
&lt;meta name="DC.Rights" content="Rights" /&gt; /*�������*/</code></pre></li>
<li>��������� administrator/com_content ��������� ��� ������������� ������ ������� �� �������/���������/������ (��� ��, ��� ���� � ������� �� 1.2.0).</li></ol></li>
<li>���������� ������� �� IE &ndash; ��������� ������������ �������. ���� ��� ������� ��������� &ndash; ���� ������ ���.</li>
<li>�������� ��������� �� joostinaopenid &ndash; ������� �� ������� � �������������� ������, ������ ����������� ����� ���������.</li>
<li>��������� ���������� ������������ �������� jQuery &ndash; ������ ������ ����� css.</li>
</ol><p class="strong">upd. 06.07.11 &ndash; 30.07.11</p><ol>
<li>��������� ���������� jQuery �� v.1.6.2. ��������� ����������������� ��������.</li>
<li>����� �� ������� jQuery textareacounter � ����� ������� ��������� ���������� com_contact.</li>
<li>����� �� ������� jQuery corner ��� �������� �� ���������. ��������� ����������� ����� ������ ����������� � ������ �������� border-radius (css3) ��� ����� (������� ����� ���� � ������� top � left), ������� ��� �������. ��� ����� � ������� ��������� ������������ ���� �� �������������, � $_SERVER['HTTP_USER_AGENT'] &ndash; MSIE (����������� �������� �������������� �� php).</li>
<li>��������� administrator/com_config ��������� ��� ������������� �������������� ������ ������ favicon. ������������ ���������� ��� �������� ������� ���� ������ ��� ������ ��������<pre><code>/* ��� ���������� ��������� */
&lt;link rel="icon" type="image/png" href="images/favicon.png" /&gt; /*�������*/
/* ��� IE */
&lt;!--[if IE]&gt;&lt;link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /&gt;&lt;![endif]--&gt; /*�������*/
/* ��� i�������� */
&lt;link rel="apple-touch-icon" href="apple-touch-icon.png" /&gt; /*�������*/
</code></pre>��� ������������� ������������� ����� ��� � �������� ��������� ������� ���������� ��������������� ����� �������, ������������ ���� configuration.php. ��������� ����������� ����, ��������� ���������� � �������� ����, ��������� ��������������� ����������� �����.</li>
<li>��������� ����������� back-end ����� cms ������������.<ol>
<li>��������� administrator/com_config ��������� ��� ������������� ������������� ��������� � head <a href="http://en.wikipedia.org/wiki/Geotagging">Geotagging</a> � <a href="http://en.wikipedia.org/wiki/ICBM_address">ICBM</a> ����� back-end-� �������.<pre><code>/* ����������� ������ */
&lt;meta name="ICBM" content="50.167958,-97.133185" /&gt; /*�������*/
&lt;meta name="geo.position" content="50.167958;-97.133185" /&gt; /*�������*/
&lt;meta name="geo.placename" content="Rockwood Rural Municipality, Manitoba, Canada" /&gt; /*�������*/
&lt;meta name="geo.region" content="ca-mb" /&gt; /*�������*/
</code></pre>��� ������������� ������������� ����� ��� � �������� ��������� ������� ���������� ��������������� ����� �������, ������������ ���� configuration.php. ��������� ����������� ����, ��������� ���������� � �������� ����. <strong>��������!</strong></li>
<li>��������� administrator/com_config ��������� ��� ������������� ������������� ��������� � head <a href ="http://dublincore.org/documents/usageguide/elements.shtml">Dublin Core Metadata Element Set (DCMES)</a> ����� back-end-� �������.<pre><code>/* ����������� ������ */
&lt;link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" /&gt; /*�������*/
&lt;meta name="DC.Title" content="title" /&gt; /*�� ������� */
&lt;meta name="DC.Creator" content="creator" /&gt; /*�� �������*/
&lt;meta name="DC.Subject" content="subject" /&gt; /*�� �������*/
&lt;meta name="DC.Description" content="Description?" /&gt; /*�������*/
&lt;meta name="DC.Publisher" content="Publisher" /&gt; /*�� �������*/
&lt;meta name="DC.Contributor" content="Contributor" /&gt; /*�� �������*/
&lt;meta name="DC.Date" content="Date" /&gt; /*�������, �� ���������� ���� ���������, � �� ��������*/
&lt;meta name="DC.Type" content="Type" /&gt; /*�������, ��� ������ ������*/
&lt;meta name="DC.Format" content="Format" /&gt; /*�� �������*/
&lt;meta name="DC.Identifier" content="Identifier" /&gt; /*�� �������*/
&lt;meta name="DC.Source" content="Source" /&gt; /*�� �������*/
&lt;meta name="DC.Language" content="Language" /&gt; /*�������, ���� ������ ������*/
&lt;meta name="DC.Relation" content="Relation" /&gt; /*�� �������*/
&lt;meta name="DC.Coverage" content="Coverage" /&gt; /*�� �������*/
&lt;meta name="DC.Rights" content="Rights" /&gt; /*�� �������*/
</code></pre>��� ������������� ������������� ����� ��� � �������� ��������� ������� ���������� ��������������� ����� �������, ������������ ���� configuration.php.��������� ����������� ����, ��������� ���������� � �������� ����. <strong>��������!</strong></li>
</ol></li>
<li>��������� �����������<ol>
<li>��������� com_contact �������� ��������� &ndash; �������� (��� ��������) ��������� ��������� ������ �� ��������� � ����� ������. ��������� ����������� �����.</li>
<li>� ���������� com_contact ���������� ���������� ������ ���������� � ������� vCard.</li>
<li>� ���������� com_contact ������������� ������ ������������ ���� ����������� (������������� ���������� DOM jQuery).</li>
<li>��������� com_registration �������� ��������� &ndash; �������� ��������� ���������� ������. ��������� ����������� �����.</li>
<li>��������� com_search �������� ��������� &ndash; �������� ��������� ���������� ������, ������ ������ ����������. ��������� ����������� �����.</li>
<li>��������� com_joostinapdf &ndash; ���������� �������������� ������ � ������� *.pdf �����.</li>
</ol></li>
<li>��������� �������<ol>
<li>������ mod_search �������� ��������� &ndash; �������� ��������� ���������� ������. ��������� ����������� �����.</li>
<li>������ mod_ml_login �������� ��������� &ndash; �������� ��������� ���������� ������. ��������� ����������� �����.</li>
<li>������ mod_stats �������� ��������� &ndash; �������� ��������� ���������� ������. ��������� ����������� �����.</li>
<li>������ mod_weblinkspercat �������� ��������� &ndash; �������� (��� ��������) ��������� ��������� ������ �� ��������� � ����� ������. ��������� ����������� �����.</li>
<li>������ mod_poll �������� ��������� &ndash; �������� (��� ��������) ��������� ��������� ������ �� ��������� � ����� ������. ��������� ����������� �����.</li>
<li>������ mod_archive �������� ��������� &ndash; �������� ��������� ���������� ������. ��������� ����������� �����.</li>
<li>������ mod_section �������� ��������� &ndash; �������� ��������� ���������� ������. ��������� ����������� �����.</li>
<li>������ mod_latestnews �������� ��������� &ndash; �������� ��������� ���������� ������. ��������� ����������� �����.</li>
<li>������ mod_related_items �������� ��������� &ndash; �������� ��������� ���������� ������. ��������� ����������� �����.</li>
</ol></li>
<li>������ � ���� ������� ����������� �<pre><code>&lt;button ...&gt; &lt;/button&gt;</code></pre>��
<pre><code>&lt;input ... /&gt;</code></pre></li>
<li>ToDo &ndash; ��������� ��� �� ������� ������ �������� � �������������� ���������, �������� ����������� � ������������/�����������/��������� ��������.</li>
<li>ToDo &ndash; ������������� ����������� ����� � IE.</li>
</ol><p class="strong">upd. 05.06.11 &ndash; 05.07.11</p><ol>
<li>Joostina-���� 2011, ����, ������...</li>
</ol><p class="strong">upd. 11.05.11 &ndash; 04.06.11</p><ol>
<li>Joostina 1.2.1.3.</li>
<li>��������� ������ ���������� ���� Joostina.</li>
<li>������� ������������� lessphp � php-typography (� ������).</li>
<li>������������� ��������� pdf-����� �� ����������� �����. ����������� ���������� (����) �������� � ����������� ������. � ��� ������ <a href="http://www.joomlatwork.com">JoomlaPrettyPDF</a> v.1.6.9 (�� 05.06.2007) ��  � �������������� ������� ������������� ������� � <a href="http://www.fpdf.org">FPDF</a> v.1.1, ���������� �� ������ 1.6 (�� 2008-08-03, ����� &ndash; Olivier Plathey). ��������� ����������� ����������. ����� ��� ����� �������� � ���� ���������� ����������. � ��������� ����� ������� �������� � ���������� pdf �� �����������, ����������� ���� ����������� � &alpha;-������� (�������� *.png) &ndash; � �������� ������.</li>
<li>���������� ������ � WYSIWYG-���������� Spaw &ndash; ������������� �������� � ���� ��� introtext. ������� � ������� ������ ������� jQuery formalize &ndash; ���������� ��������� � ������ ��������.</li>
<li>������� ���� /help/copyright.php (������� &laquo;� Joostina&raquo; ������� &laquo;�����������&raquo;&rarr;&laquo;���������� � �������&raquo; back-end-�).</li>
<li>��������� �������� &laquo;�����&raquo; ��� ������ ���������� ���������� ��������� � ������ &laquo;����������&raquo; (mod_mostread).</li>
<li>������ ���� reset.css ��������� <a href="https://github.com/jonathantneal/normalize.css">Jonathan Neal's normalize.css</a>. ����� �� �������� ������ jQuery formalize.</li>
</ol><p class="strong">upd. 25.04.11 &ndash; 10.05.11</p><ol>
<li>Joostina 1.2.1.2.</li>
<li>��������� ���������� jQuery �� v.1.6. ��������� ����������������� ��������.</li>
<li>�������� &laquo;������ �����&raquo; ���������������� ��������� �... ��������� /components/com_registration/registration.php.</li>
<li>�������� ������ jQuery AutoClear &ndash; ���� ������� ���� �����. �������� � /includes/js/jquery/plugins. ���������� �� ������� (��������� ��������� ��������������� ����� � ���������� ��������). ����� ��� ������� �������� � �������� ����. ���������� �� <a href="http://joomla-book.ru/">http://joomla-book.ru/</a></li>
<li>��������� ����������� ������ ��� &laquo;��������� �������&raquo; � &laquo;����������&raquo;.</li>
</ol><p class="strong">upd. 31.03.2011 &ndash; 20.04.2011</p><ol>
<li>������:<pre><code>/* ������ ��� iPad/iPhon */
&lt;link rel="apple-touch-icon" href="&lt;?php echo $mosConfig_live_site;?&gt;/templates/&lt;?php echo $mainframe->getTemplate();?&gt;/
apple-touch-icon.png" /&gt;
/* ����� �������� ��������� � ����� ����� */
&lt;meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /&gt;
&lt;meta http-equiv="Content-Language" content="ru" /&gt;
/* ���������� ������� � ����������� ��� ��������� � �������� IE */
&lt;!--[if IE]&gt;&lt;meta http-equiv="imagetoolbar" content="no" /&gt;&lt;![endif]--&gt;</code></pre>�������� � /includes/frontend.php.</li>
<li>����� <pre><code>&lt;meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /&gt;</code></pre> ������ �� ������� &ndash; ������ �� ���������������� � htaccess.</li>
<li>� ������� �������� ����� ������� � ����������� ������ Joomla! �� Joostina.</li>
<li>��������� ���������� jQuery �� v.1.5.2.</li>
<li>�������� ������ jQuery dPassword &ndash; ������������� ����������� � front-end �����.</li>
<li>��������� ������ jQuery Preloader &ndash; ������������ ����������� �� ������. �������� � /includes/js/jquery/plugins. ����� ��� ������� �������� � �������� ����.</li>
<li>������� ��� �������� ����� � ���������� ��������, ��������� ������� �����������.</li>
<li>��������� �������� ���� &ndash; ��������� � ������������� ��������� �����.</li>
<li>� back-end (��������� com_config) ������� �������� ����� .htaccess.</li>
<li>�������� � ���������� �������� �� ������ &ndash; ����������������� �������������.</li>
<li>�������� � ���������� �������� �� e-mail &ndash; ����������������� �������������.</li>
<li>� ������� mosShowHead() ����� includes/frontend.php, ������ 261 �������� ��������� meta name=&laquo;Generator&raquo; �<pre><code>$mainframe->addMetaTag('Generator', $_VERSION->PRODUCT . ' &ndash; ' . $_VERSION->COPYRIGHT);</code></pre>��<pre><code>$mainframe->addMetaTag('Generator', $mosConfig_sitename);</code></pre>�.�. ������ ������������ ������ ���� <pre><code>&lt;meta name="Generator" content="��� �����" /&gt;</code></pre>. ������� ������� ���������������.</li>
<li>���������� ����� ��������� pdf �����, ���������� � ���������� ������, ������� �������� ���������� ��������� � ��������������� ����� &ndash; � ������ ����������� ��� ���������� ������ ������� ���������� tcPDF (��� ���� �� ��������� ����������).</li>
<li>� WYSIWYG-��������� Spaw:
	- ��������� ������ &laquo;VarInsert&raquo; (������������ ��� �������������� �������������  PHPMailer-ML � SPAW Editor v.2. ���������� ��������� e-mail �������� &ndash; ����� �������� ���������. ��� ������������� ��������� ���� &laquo;inc.campaigns.php&raquo; ��� PHPMailer-ML.).</li>
</ol><p class="strong">upd. 30.01.2011 &ndash; 15.03.2011</p><ol>
<li>Joostina 1.2.1.1. [alpha 1]</li>
<li>��������� kcaptcha &ndash; ���������� �������, ���������� ���������, �������� �������� ������������� �������� �����������.</li>
<li>���������� ��������, ���������� �������������� <a href="http://www.joomlaforum.ru">joomlaforum.ru</a>:
	- &laquo;������&raquo; � ������� ���������������� ������, ��������� ������� ������ back-end &ndash; joostfree: ���������� � �������� �����, ��������� &laquo;�����������&raquo;, � ��� ����� � � ����� /help/changelog.php � /help/copyright.php.;
	- ���� ������ ������ ������������� ���������� ��� ������ ���� &laquo;�������&raquo; � ��������� �� ���������;
	- �������������� style.css ������� ��� �������� ������ � �����������, ��������� ��� ����������� � �������������� ���� � ������������ ��������, ���������� ����������� � style.css, ����������� ��� �������� ����, ��������� ��� ������, �������� � ���������� ��������������� ��� input/textarea/select/button/etc, � ���������� � ����� ����������� ���� �������� �� ����������� ��-���������, ��������� �������� ��� ������ ������� � sql ������ ��� ��������� � � xml/php ����� ���������� (��� �������� �� ���� ���������), ���� ������� ����� CSScomb ��� WebStorm (������������ css);
	- �������� ����� ����������� � ����������� ��������� input, select, textarea, label, fieldset, option, optgroup, button &ndash; ��� ����� ��������� � ������������ jQuery ������ formalize;
	- �������� �������� ����� ������� front-  �  back-end &ndash; ����� ������ ��������� ���������������, ������������� ������������� ������������ ��������� ������ ��� ���������, �������� ������� �������;
	- ��������� � ����� �������� ���� ����� ������������ ����������� ��� IE8. ���� � ������� <a href="http://css-tricks.com/snippets/css/cross-browser-opacity/">Cross Browser Opacity</a>;
	- label � input/select ���������� � ��������� ������ ����, ��������, ��������� �� ��� ����� ������ (<a href="http://www.habrahabr.ru">habrahabr.ru</a>);
	- ���������� ����� ����������� � back-end (login.php), ���������� ����� (admin_login.css).
	- ����� ��������<pre><code>input</code></pre>�<pre><code>type=[text]</code></pre>��<pre><code>type=[email]</code></pre>� /components/com_contact/contact.html.php � /components/com_user/user.html.php ��� ���������, �������������� HTML5, ��������� (���� IE6) ��������� ����������� �������<pre><code>type</code></pre>���<pre><code>type=[text]</code></pre>
	- ���������� ���������� ����� ������ ���������� ����� � /includes/version.php � ������������ � <a href="http://www.ifap.ru/library/gost/7012003.pdf">���� � 7.0.1�2003</a>;
	- ������� �� ���������� ��������� ����� �� ���������. �� ��������� �������� logo &ndash; ��� div � h1, �� ���������� h1 ��� ��������� ��������, � logo ��� ������ (������� ��� � http://www.hospsurg.ru, ������������� ������������� &ndash; <a href="http://www.habrahabr.ru">habrahabr.ru</a>).</li>
<li>���������� ������ ������������ ���� (����������/����������) � front-end, � /language/russian.php ���������� ���������� �������<pre><code>$mon</code></pre>��<pre><code>$month_date</code></pre>�������� ������������ ������ ������� �������� ������� �� ��������� ����� �� ������� &ndash; ������� ����� �<pre><code>' . $m . '</code></pre>��<pre><code>%m</code></pre>
(����������� ������ � �������� ������� &ndash; ����=03). ������� ������ �� �������������� ������������ ����������� ��������� ������ ��������/����������� � ������� ����.</li>
<li>���������� ������ � back-end &ndash; ������������ ����� ������ ��������/��������� ��� ��������� ����������� com_content.</li>
<li>��������� ���������� jQuery �� v.1.5.1.</li>
<li>��� ����� ��������� (/administrator/components/com_jwmmxtd) ��������� ������ ������� jQuery MultiFile. �������� � /includes/js/jquery/plugins.</li>
<li>����������� ������, ����������� ��� ������ /includes/js/jquery/plugins/corner.js � IE.</li>
<li>htaccess �������� ��� Apache 2.2.16, ���������������� ������ ��� �������, �� �������������� ��� ��������� ������� �� ���������. ������������� ���������� ������� ��� Apache 1.* (����������������) &ndash; ���� � ��� ��� ������ &ndash; �����������������, ��������������� ������� ��� Apache 2.</li>
<li>� ������� NewLine ��������:
	- ��������� ��������� XFN (XHTML Friends Network � ����������� ��� ������� ���������� ���������������) -
�������� ������� � ��� head -<pre><code>profile="http://gmpg.org/xfn/11"</code></pre>
	- � ����� js ��������� ���������� <a href="http://www.modernizr.com/">Modernizr v1.6</a> (Modernizr &mdash; �����-���������� ��� �������������� �� ����� ������������ HTML5 &amp; CSS3). ��� ����������� ������� � index.php ������� ��������� ������ <strong>�����</strong> ������� ������� Jquery:<pre><code>&lt;script type="text/javascript" src="&lt;?php echo $mosConfig_live_site; ?&gt;/templates/&lt;?php echo $mainframe->getTemplate(); ?&gt;/js/
modernizr.js"&gt;&lt;/script&gt;</code></pre>
	- � index.php ����� &lt;/body&gt; �������� ��� ������������ ������ Google Analytics, ������ ������ ���������� ���� ��������� ����������� ���������� ��� ���� ������� �����. ��� ����������� �������� UA-XXXXX-X �� ID ������ ����� (�� ������ ���� ���������������� � ������ �������).</li>
</ol><p class="strong">upd. 28.12.2010 &ndash; 28.01.2011</p><ol>
<li>����������� ������������ ���������. ����������� � ��������� ������, ��������� ���� /includes/pageNavigation.php.</li>
<li>����������� XSS ������������ mustlive@websecurity.com.ua � ����� /components/com_search/search.html.php.</li>
<li>�������������� ���� ��� �������� ��� ������ � ��������������.</li>
<li>��������� ����� gzip ��� js/css, ��������� htassess � ������� �����.</li>
<li>������� htassess.</li>
<li>��������� ������� �������������� ������ � front-end ������ �������. ����� �� �������������� ����� �������������� ����� &laquo;Manager&raquo;, &laquo;Administrator&raquo;, &laquo;Super Administrator&raquo; �����������.</li>
<li>��������� ���������� jQuery �� 1.4.4.</li>
<li>�������� ��������� ������������ ������ ���������� com_content, ��������� ����� � css.</li>
<li>�������� ��������� �������� �������� button &ndash; ��� ���������� �������� � css (������������ �������� css3). ���� &laquo;������&raquo; ������ ��������� � ����� /images/buttons �������, ����� �������� ��� �������� ������ ������ ������� �������.</li>
<li>�������� ������� ��� ���������� �������, ������������� ��� ���������� � IE6 (������� � ��������� ������). ���� <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>.</li>
<li>������ �������<pre><code>text-rendering: optimizeLegibility;</code></pre>������ �������� (small-caps) � ������� �������� � *nix. ���� <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>.</li>
<li>� ���� /includes/joomla.php ��������� ����������� �������� jQuery � CDN (ajax.googleapis.com/ajax/libs/jquery/1.5.1/), � ��� ���������� ���������� � ���������� (�������� ����� �� ��������� ����������) &ndash; �������� ��������� ����� ������� (�� ���� /includes/js/jquery/jquery.js). ���� <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>. ��� ������� ������������ �������� ������ ���������� ������ � googleapis.com ��������� ��������� �������� � ������ /includes/joomla.php:
1) ����������������� ��������� ������:<pre><code>$mainframe->addJS('//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js');</code></pre>
2) ��������������� ��������� ������:<pre><code>$mainframe->addJS($mosConfig_live_site . '/includes/js/jquery/jquery.js');</code></pre></li>
<li>������� �������� � �������� ������ �� ����������� � ���������������� ������. ������� �������� � ������������ ��������� sectionid ������ �� ���������.</li>
<li>��� ����� ������ �������� �������� ���� &laquo;������&raquo; � ������ �������� ��� ������� �������� sectionid.</li>
<li>��������� ����������� PHP-���� (�� ���������� <a href="http://www.habrahabr.ru">habrahabr.ru</a>, <a href="http://www.reinholdweber.com">reinholdweber.com</a>, <a href="http://www.insight-it.ru">insight-it.ru</a>). ��� ����� ��������� ����������� ��������� �������� ��������� �������� ����. ������������� ���������������� �� ������� ���������� ������� (������������� �����).</li>
<table>
<tr><td><strong>��� ������</strong></td><td><strong>�� ��� ������</strong></td><td><strong>������� ���������� ������</strong></td></tr>
<tr><td><pre><code>echo "a"</code></pre></td><td><pre><code>echo 'a'</code></pre></td><td>����� 20%</td></tr>
<tr><td><pre><code>is_null($var)</code></pre></td><td><pre><code>null === $var</code></pre></td><td>������ &ndash; � 4-5%</td></tr>
<tr><td><pre><code>$++ / $--</code></pre></td><td><pre><code>++$ / --$</code></pre></td><td>����� 100%/������ &ndash; � 2-3%</td></tr>
<tr><td><pre><code>time()</code></pre></td><td><pre><code>$_SERVER['REQUEST_TIME']</code></pre></td><td>����� 80-90%</td></tr>
</table>
<li>�������� ����������� ���� wz_tooltip.js �� ���� /includes/js/ (������ � /includes/parTemplate/tmpl/page.html).</li>
<li>�������� ����������� ���� calendar-setup �� ���� /includes/js/calendar/ (������ � /includes/parTemplate/tmpl/calendar.html).</li>
<li>��������� ����� �� �������� jscalendar-1.0 (������ � /includes/parTemplate/tmpl/calendar.html) &ndash; ���������� �� ���������.
P.S. �� ��. 18, 17 &ndash; �� �������� css ��� ���������� ��������� ����� front-end (� back-end �������� ������� �������).</li>
</ol><p class="strong">upd. 25-27.12.2010</p><ol>
<li>��������� ����������� ��������� ����� ����������� Joostina (��������� ������� ������ ����������� Kovalchuk Vitaliy), ������� �������� � ������������� ���� � ���������������� ������, ������� � js, ��������� ��������<pre><code>\', `, \\\'</code></pre>(�������� �� �����������), � ���������, ���������� ������� ��������� ���������� ����, ������ ������� ��������.</li>
<li>������ mod_mainmenu.php &ndash; &laquo;�������&raquo; ������������ Itemid � ������ ��� ��������� ������ ������.</li>
<li>������ ���������� � changeslog_joostina_120v2.</li>
</ol><p class="strong">upd. 22.12.2010</p><ol>
<li>Joostina 1.2.1 Stable</li>
</ol><p class="strong">upd. 01-21.12.2010</p><ol>
<li>��������� style.css &ndash; ��������� ����� ������, ����������� ��������� ����� ��� ������ ��� ������������ (������ � �������, ���������� � ����������� � �.�.).</li>
<li>������������ ���� �� ������� ����� ������ ������� template_css.css �� ����� ���� ������ &ndash; style.css.</li>
<li>��������� ������������� ������ ����������.</li>
<li>������ ������������ � ���� ������� &ndash; ������� ��, ��� ������� ������������ �� �����, ��������� ����� � ����������� ������.</li>
<li>������ ����� &lt;i&gt;, &lt;b&gt; ��&gt; &lt;em � &lt;strong&gt; �������������� � ����������� ����� front-end �����������.</li>
<li>Changeslog ��������� ����� back-end � ����� (�� �������� � copyright.php).</li>
<li>�������� ������ mod_downloadjoostina &ndash; �������� ��������� ������ cms � googlecode.com. ��� ����� ��������� � �������� ����� style.css, ������� �������� � ����� /modules/mod_downloadjoostina.</li>
<li>��������� ������� robots.txt</li>
<li>����� $ �� jQuery � ������� �������� &ndash; ������ � �������� � IE.</li>
<li>�������� ��������� ����� ���������� �� ����� ������� ��������� ��������, ������� ���������� ������� �������, � ����� ����� ������ ������ ������������ (� ������ ������� �����, ����� ������ ������������ ���� Super Administrator).</li>
<li>� ���� htaccess ��������� ������� ��� ���������� &laquo;����� �����&raquo; �� user-Agent.</li>
<li>��������� ����� ��������� ����������� � ����������� �������.</li>
<li>��������� ����������� ����������� �������� ������ ������ ��� ����������� �������.</li>
<li>��������� ��������� mod_ml_login &ndash; ����� ����� � style.css.</li>
<li>��������� ��������� /includes/vcard.class.php.</li>
<li>��������� ��������� ������� joostinasocialbot &ndash; ��������� ��������� ������������� ��������� ������.</li>
<li>������������ ���� WYSIWIG-��������� Spaw &ndash; �������� ������ ������������� �����������.</li>
<li>��������� htaccess ��� ������ ����� �����.</li>
<li>�������� � ����������� �������� ������ joostinatag &ndash; ����������� �������� ���� ��� ������� � ������ ������� ���������. ��������� ����� ��� ����������, �������� � style.css.</li>
</ol><p class="strong">upd. 14-30.11.2010</p><ol>
<li>������ WYSIWYG-�������� JCE, � ����� � btn-������� ��� ����. �������� ������������ WYSIWYG-�������� Spaw.</li>
<li>� WYSIWYG-��������� Spaw &laquo;���������&raquo;:
	- �������� ����� ������� � ������ &laquo;�������������� �����&raquo;;
	- ��������� ������ ������� ����� attache &ndash; ������ &laquo;�������� ����&raquo;;
	- ��������� ������ ������� �����-����� youtube &ndash; ������ &laquo;���� YouTube&raquo;;
	- ��������� ������ ������� ���� cleanpaste &ndash; ������ &laquo;������ HTML&raquo; (�������� � IE). �������������� ������� ���� �� �������� ���������� ����������, ����������� ��� MS Word;
	- ��������� ������ custombutton &ndash; �������� ����� ������;
	- ��������� ������ iespell &ndash; �������� ���������� (�������� � IE);
	- ��������� ������ imgpopup &ndash; ������, ��� ����� �� ������� ����������� ��������� � popup;
	- ��������� ������ inserthtml &ndash; ������� html ����;
	- ��������� ������ yahooMaps &ndash; ������� ������ �� Yahoomap (����������� ���������� �� Google);
	- ��������� ������ zoom &ndash; ���������� �������� �������� ���� � ��������� (�������� � IE).</li>
<li>���������� ������ ��� �������� �������� � front-end ����� &ndash; ������ ��������� ������� ������ &laquo;���������&raquo; � &laquo;���������&raquo;.</li>
</ol><p class="strong">upd. 01-13.11.2010</p><ol>
<li>���������� ����������� OpenID (������ 2.1.3 php-OpenID libraries by JanRain, Inc.). ��������� ���������� ��� Joostina! CMS, ������������ ����, ��������� ������� ����������� OpenID � ������ mod_ml_login, ������������.</li>
<li>���������� ������ � ������ ������ mod_mostread, ������������� ���������� ���������� ������ ����� ������ (����
<pre><code>&lt;class=" class="mostread""&gt;)</code></pre></li>
</ol><p class="strong">upd. 15-30.10.2010</p><ol>
<li>��������� jQuery �������: 
	- dPassword &ndash; ������ �������/�������� �������� ������ &ndash; aka iPad, ��������� ������ � ������ ����������� �� front-end �����;
	- pngFix &ndash; ���������� �� ����������;
	- textarearesizer &ndash; ������ ��������� ������� ���� textarea, ���������� �� ����������;
	- tablednd &ndash; ������ ��� ���������� ����� ������, ������������ �� �����, ���������� �� ����������;
	- mop-tip &ndash; ������ ����������� ���������, ���������� �� ����������.</li>
<li>� ����� /help ��� �������� jQuery ������� man-����� � ��������� ������������ � ���������� ����������� (<a href="<?php echo $mosConfig_live_site; ?>/help/dPassword.txt" target="_blank">dPassword</a>, <a href="<?php echo $mosConfig_live_site; ?>/help/mop-tip.txt" target="_blank">mop-tip</a>, <a href="<?php echo $mosConfig_live_site; ?>/help/textareacounter.txt" target="_blank">textareacounter</a>, <a href="<?php echo $mosConfig_live_site; ?>/help/textarearesizer.txt" target="_blank">textarearesizer</a>).</li>
<li>� ����� � ��������� jQuery ��� �������� ��������� ����� �������, �������� ����� (��� ������� ����� �������������).</li>
</ol><p class="strong">upd. 09-10.2010</p><ol>
<li>Joostina 1.2.1 prestable</li>
<li>��������� ���������� ��� ��������� ��������� ���� �������� (com_jmn), �������� �������� ����������, �������� ���������� �������� ����.</li>
<li>���������� ���������� �����������, ������������� �������� (��������� ������������� Dean).</li>
<li>������ �������� �� ��������� ������ ����� �������� ��� ������ ������� (������ css).</li>
<li>����������� �������� ��������� http-���������� ��� ������������ ������ Expires � Last-Modified (��� ������ ����� ������), ����������� ����� Cache-Control � Pragma.</li>
<li>�� ��������, ��������������� ��� ������, ������ ����� ���������� ��������.</li>
<li>��������� � ����� /includes/js/calendar calendar-mini.js v.0.9.2 (�������� �� ����������� ����� � ����� ������ �������).</li>
<li>��������� ���� htaccess &ndash; ������� ��������, ������� ������ ����������� �� �������������.</li>
<li>����������� ��������� ������ ��������� (/installation) &ndash; ��������� �����, �������� �������� ����������, ����������� ������� �������� ����, �������������� �������� ���������� ������ ��������, ����������� � ����������� ����������� ������ ����� ��������� (� �������� ���������).</li>
<li>�������� ������ jQuery textareacounter (������ � ����� /includes/js/jquery/plugins/, �������������) &ndash; ������� ��������/���� ��� ������ ������ � ���������� �����, ��������� � ���������� "��������" (���� contact_name, contact_email, contact_subject � contact_text), �������� ���� ������� �������� ������������ ������� ��� ������ �������� ������/����. �������� ������� ����, ��������� ����������.</li>
<li>��������� ������ � ���������� disabled.</li>
<li>�������� ��������� GET-���������� � URL.</li>
</ol><p class="strong">upd. 03-11.09.10</p><ol>
<li>����������� ������ � �������������� �������� ������ ������������ �� ���� ����� &laquo;������ ��������������&raquo; (� �.�. � � ������ &laquo;Super Administrator&raquo;) � ���������� ��� ����������� �� ������� &laquo;������������&raquo;.</li>
<li>����������� ������ � ������������� ������� &laquo;�������������&raquo; � ������������� ������ &laquo;Publisher&raquo; ��� ������ � ���������� � front-end �����.</li>
<li>����������� ������ � �������������� ��������� ������� ������������ ����� ����������� �� ������� &laquo;������ ������&raquo; (index.php?option=com_user&amp;task=UserDetails).</li>
<li>����������� ������ � ������������� ������� &laquo;�������������&raquo; ��� ������ � ���������� �����, ����� ������� � ���������� ������� ������ ���� ����� &laquo;��������� �������� &ndash; ������&raquo;.</li>
<li>�������� ���� ��������� ��� ���������� � �������� �� ��������� �� ������� ������ & �� <code>&amp;</code> � ��������, ��� �������, �� ������ W3C, ��� �������� ��� ��������� html ����.</li>
<li>� css:
	- ��������� css ��� ������� NewLine.
	- �������� reset.css, base.css, tempate_css.css ����� �������, ��� ��� �������, ��� � ��� �����������.
	- Xmap.css ������ � �������� �������� ����.
	- �������� ����� �������������� ����������� ������ ��� ���������� ���� ������, ������� ������, �������� &laquo;������ ����&raquo; + http://www.joostina.ru, ������ �� ����������, �������, ������� �������������� ��������� ������ � com_search (sic: ��� ����������� �������� ����������� � css �����!).
	- ��������� ������������ ��� ������� ����������� ������� � �������������� ��������� ������ � com_search.</li>
<li>��������� �������� alt, title � ���� ������ ��������������� �������� ���� ���������� � �������� �� ���������.</li>
<li>�������� ������ WISWIG �������� Spaw v.2.0.8-j14. ������ ��� ���������� ������ spaw ���� htaccess �� ����� /cache.</li>
<li>�������� ���������� ���� ��� ����� front-end &ndash; �������� ���� �� Joomla 1.0.14.</li>
<li>����� ��������� �������� ����� ������ ������������ �� �������� Super Administrator.</li>
<li>���������� � table/tr/td �� div front-end ����� ���������� � �������� �� ���������:
com_search (����), com_registration (����), com_weblinks (��������), com_newsfeeds (��������), com_content (��������).</li>
<li>��������� ������� � ����� /includes/js/ � �������� �� ���������:
	- JSCookMenu � v.1.4.3 �� v.2.0.4,
	- fullajax.js � v.1.0.3 build 1 �� v.1.0.4 build 8;
	- upload.fullajax.js � v.1.0.3 build 1 (upload) �� v.1.0.4 build 8 (upload);
	- dax.fullajax.js � v1.0.3 build 1 (dax) �� v1.0.4 build 8 (dax),
	- calendar-mini.js � v.0.9.2 �� v.1.0.</li>
<li>����� ����� ����������� ��� �������� �� ����� ������� ������.</li>
<li>������� ����� ��� ������ ���������� http-���������� � �������� index.php/index2.php (bay, mambo!).</li>
<li>�������� htaccess:
- ��������� ������ ���������� ETags,
- ��������� ������ ���������� Expires headers (����� �������� ��� ���������� mod_headers.c).</li>
<li>�� /components/com_poll/poll_bars.css ����� �������� � ������� css ���� (������������ ����������� ������� ��� ��������� SEF, ��� ����� � poll.html.php ���������������).</li>
<li>������� ����� css/js ������ � ���������� plugin_jw_ajaxvote &ndash; ����� �������� �������, ����� php ���� � ������������ http-����������� (��� �� ������ � index.php/index2.php).</li>
<li>�������� ����� (reset, base, template_css) ���������� � ���� ���� style.css.</li>
<li>� �������� �� ��������� ������ ������ �������� � ���������� ������� &ndash; Joostina socialbot (�) doctorgrif, ����� ������� � �������� css �������, ����������� ������ ���������� �������� � ����� /images/sociable. ������������� ��� ������� &laquo;������� �� ����� Joostina!&raquo; � &laquo;�������� ����������&raquo; ��������� ��������� ��������� � ����������, ���������� ��������� � ��� ������ ���������������� �������, ��� �� ����� �������� ���������� ��������.</li>
<li>htaccess �������� ��������� ����������� ��� Apache 1.*/Apache 2.* (���������� ���������������� �������, �� ����������� � ����� ������ Apache). ����������� ������� ����������� ������� ������.</li>
<li>�������� � �������� ���� ���������� ��:
	1) /modules: mod_whosonline, mod_stats, mod_random_image, mod_ml_login;
	2) /mambots: plugin_jw_ajaxvote, joostinasocialbot;
	3) /components: com_weblinks, com_registration, com_polls, com_content, com_banners;
	4) /administrator: /templates, /popups, /modules.</li>
<li>�������� ����������� ���� ��� front-end &ndash; �������� ���� �� Joomla 1.0.13.</li>
</ol><p class="strong">upd. 01.08.10</p><ol>
<li>��������� htaccess � ����� /templates, /cache.</li>
</ol><p class="strong">upd. 19.07.10</p><ol>
<li>������� htaccess &ndash; �������� ������� �������.</li>
<li>������� robots.txt &ndash; ��������� ������� ��� Yandex.</li>
</ol><p class="strong">upd. 16.07.10</strong><ol>
<li>����������/���������� ����� ������ �� ����� ������� � /help/copyright.php.</li>
<li>���������� ����������� �������� ��������� ����� ������ (����� ������� ��������� �������� ����� ��� ���������). ����� � ������� mambots/content/plugin_jw_ajaxvote.php ������� onBeforeDisplayContent �� onAfterDisplayContent.</li>
<li>�������� �� ����� ����� ���������� a-la "�����: �������� �� ��������� ������������: 28 ���� 2007" &ndash; ������� ������� ����� � css � �������� ��� ����� � components/com_content/content.html.php.</li>
<li>���������� � robots.txt ��������� Disallow: /*com_search*/ ��� ������� ���������� ������������ ����������� ������.</li>
<li>��������� ����������� /index.php ��� ����������� ���������� ���������� ������ ���� �������������� �����. ��������, ��� ����� ����� ���������� ��� ����� ���������� ������ ���������� �� ����� ������� ��������� ��������, ������� ���������� ������� �������, � ����� ����� ������ ������ ������������.</li>
<li>����������� ������ ���������� ������ � components/com_contact/contact.html.php � ���������� ��� � ����� ���������� ����: �������� ������, ������, �������, �����, �����, ���. ����.: &laquo;123456, ������, ����������� �������, �. �������, 12-� ��������, ���� ���&raquo;.</li>
</ol><p class="strong">upd. 15.07.10</p><ol>
<li>���������� js � ����� /includes/js/jquery/:
- jQuery JavaScript Library � v1.3.2 �� v1.4.2 (������� Sizzle.js &ndash; � v0.9.3 �� v1.0).</li>
<li>���������� js � ����� /includes/js/jquery/plugins/:
	- simplegallery.js � ������ �� 07.12.2008 (jQuery 1.2.x) �� ������ �� 06.02.2009 (jQuery v 1.3.x);
	- corner.js � v1.92 (12.18.2007) �� v2.11 (15.06.2010).</li>
</ol><p class="strong">upd. 12.07.10</p><ol>
<li>�������� �� components/com_content/content.php ����� � ������������ �� ������ ������ cms.</li>
<li>���������� ������ ������ htaccess ��� ��������� SEF.</li>
<li>������� ����������� doctorgrif �� ������ ��������.</li>
<li>����������� ������� �������, css ���� ��������.</li>
</ol><p class="strong">upd. 10.07.10</p><ol>
<li>����������� /components/com_contact ��� ����������� � ������ �������������� IP-����� ������ ���������.</li>
<li>����������� /components/com_search ��� ������ �� ��������� ����������. ��������� ���������� � �������� ����. � ��������� ����� �� ������������� &ndash; �� ���������.</li>
</ol><p class="strong">upd. 27.06.10</p><ol>
<li>������ &laquo;...&raquo; �� ������ ���������� &laquo;�&raquo;.</li>
</ol><p class="strong">upd. 18.06.10</p><ol>
<li>��������� ������ 503 Service Temporarily Unavailable ��� ������������ �����.</li>
<li>���� � notetext.</li>
</ol><p class="strong">upd. 16.06.10</p><ol>
<li>��������� ������ � mod_mainmenu (+ ����������� /includes/sef.php ��� ����������� &laquo;��������&raquo; ������ � ������� ��� ��������� SEF). ���������� �� �������������:
	1.) ���� &rarr; yourmenu (��������� mod_mainmenu) &rarr; �������;
	2.) ����� ����� ���� &rarr; &laquo;������ &ndash; Url&raquo;;
	3.) ����� &ndash; ������: http://full_link_to_your_content/#youranchor;
	4.) ���������;
	5.) � ���������� ����� (������/�������/������ ���������� &ndash; option=com_yourcomponent), � ������ ��� �����, ������ ������ ����� (#youranchor). ������ ��� ������ ������� ������ � ���� ��������� �������� ����������� ������ � ������� �����.</li>
</ol><p class="strong">upd. 11.06.10</p><ol>
<li>�������������� ���� "�����" � mod_search &ndash; ����������� �������� ����������� ����� � ���� ������ + �������������� ����� (in work).</li>
<li>mod_newsflash &ndash; ����������� ������ � �� �������.</li>
<li>com_search &ndash; ������ ��� ���������� ������������� �������� � ��������� ������.</li>
<li>��������� (�������������) ������ ��������� �����������.</li>
<li>��������� ��������� ������� (��� -��?) ���� �������� ������ �������� ����� &ndash; ������ ���������������� �������� /language/russian.php.</li>
<li>��������� ���������� �� ���������. ��������, ���� �� ������������ ������, ����������� ��� ���-�� ��������, � ��� ����� ������������� �������� ������ � ������������ ������������������.</li>
</ol><p class="strong">upd. 02.04.10</p><ol>
<li>��� includes/joostina.php ���� ����������� ��������� �������, ����������� ��������� ���� � ������������ ���.</li>
</ol><p class="strong">upd. 19.03.10</p><ol>
<li>��������� ������������� ����������� � /administrator/images.</li>
</ol><p class="strong">upd. 03-13.03.10</p><ol>
<li>Joostina 1.2.0 v3.</li>
<li>����������� ���� (�������� ������ ����� � ��������). �������������� �������� �������, css, js ����������, � �.�. � ������� NewLine. ������������� &laquo;������&raquo; ������� js.</li>
<li>��������� ���������� ��� ����������� ��������� � &laquo;������������&raquo; ���� �� ������.</li>
<li>��������� ������ � /components/com_content &ndash; ����� �������������� ���������� (������, ���������, �����, ���� �������� � �����������) � ���� ������. ���������� �� ����� ��������� ������� &ndash; ������� �� ���� (in work).</li>
<li>���������� �������� ����������, ���������� ������ � ������������.</li>
<li>���������� htaccess &ndash; ������������, �����������.</li>
<li>������� ������� �����������, ��������� ����������� � /components/com_content/content.html.php ��� ��������� css ����� �������.</li>
<li>�������� �������� ���� &ndash; �������� �������� ���������� ����������.</li>
</ol>
</div>