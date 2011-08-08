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
?>
<style type="text/css">.changelog{font-family:sans-serif;margin:0;padding:0;height:100%;width:100%;white-space:pre-wrap;}img{float:right;}ol{margin-top:5px;}li{margin:0;padding:0;}li.nolist{list-style:none;}pre code{display:block;padding:.5em;background:#f0f0f0;}.tab1{border:0;padding:0;border-collapse:collapse;width:100%;}.tab1 td{padding:0;}</style>
<div class="changelog">
<img src="<?php echo $mosConfig_live_site; ?>/help/images/joostina.png" alt="Joostina" />
<strong>upd. 06.07.11 - 30.07.11</strong>
<ol>
<li>��������� ���������� jQuery �� v.1.6.2. ��������� ����������������� ��������.</li>
<li>����� �� ������� jQuery textareacounter � ����� ������� ��������� ���������� com_contact.</li>
<li>����� �� ������� jQuery corner ��� �������� �� ���������. ��������� ����������� ����� ������ ����������� � ������ �������� border-radius (css3) ��� ����� (������� ����� ���� � ������� top � left), ������� ��� �������. ��� ����� � ������� ��������� ������������ ���� �� �������������, � $_SERVER['HTTP_USER_AGENT'] - MSIE (����������� �������� �������������� �� php).</li>
<li>��������� administrator/com_config ��������� ��� ������������� �������������� ������ ������ favicon. ������������ ���������� ��� �������� ������� ���� ������ ��� ������ ��������<pre><code>/* ��� ���������� ��������� */
&lt;link rel="icon" type="image/png" href="images/favicon.png" /&gt; /* ������� */
/* ��� IE */
&lt;!--[if IE]&gt; &lt;link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /&gt;&lt;![endif]--&gt; /* ������� */
/* ��� i�������� */
&lt;link rel="apple-touch-icon" href="apple-touch-icon.png" /&gt; /* ������� */
</code></pre>��� ������������� ������������� ����� ��� � �������� ��������� ������� ���������� ��������������� ����� �������, ������������ ���� configuration.php. ��������� ����������� ����, ��������� ���������� � �������� ����, ��������� ��������������� ����������� �����.</li>
<li>��������� administrator/com_config ��������� ��� ������������� ������������� ��������� � head <a href="http://en.wikipedia.org/wiki/Geotagging">Geotagging</a> � <a href="http://en.wikipedia.org/wiki/ICBM_address">ICBM</a> ����� back-end-� �������.<pre><code>/* ����������� ������ */
&lt;meta name="ICBM" content="50.167958,-97.133185" /&gt; /* ������� */
&lt;meta name="geo.position" content="50.167958;-97.133185" /&gt; /* ������� */
&lt;meta name="geo.placename" content="Rockwood Rural Municipality, Manitoba, Canada" /&gt; /* ������� */
&lt;meta name="geo.region" content="ca-mb" /&gt; /* ������� */
</code></pre>��� ������������� ������������� ����� ��� � �������� ��������� ������� ���������� ��������������� ����� �������, ������������ ���� configuration.php.��������� ����������� ����, ��������� ���������� � �������� ����. <strong>��������!</strong></li>
<li>��������� administrator/com_config ��������� ��� ������������� ������������� ��������� � head <a href ="http://dublincore.org/documents/usageguide/elements.shtml">Dublin Core Metadata Element Set (DCMES)</a> ����� back-end-� �������.<pre><code>/* ����������� ������ */
&lt;link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" /&gt; /* ������� */
&lt;meta name="DC.Title" content="title" /&gt; /* �� ������� */
&lt;meta name="DC.Creator" content="creator" /&gt; /* �� ������� */
&lt;meta name="DC.Subject" content="subject" /&gt; /* �� ������� */
&lt;meta name="DC.Description" content="Description?" /&gt; /* ������� */
&lt;meta name="DC.Publisher" content="Publisher" /&gt; /* �� ������� */
&lt;meta name="DC.Contributor" content="Contributor" /&gt; /* �� ������� */
&lt;meta name="DC.Date" content="Date" /&gt; /* �������, �� ���������� ���� ���������, � �� �������� */
&lt;meta name="DC.Type" content="Type" /&gt; /* �������, ��� ������ ������ */
&lt;meta name="DC.Format" content="Format" /&gt; /* �� ������� */
&lt;meta name="DC.Identifier" content="Identifier" /&gt; /* �� ������� */
&lt;meta name="DC.Source" content="Source" /&gt; /* �� ������� */
&lt;meta name="DC.Language" content="Language" /&gt; /* �������, ���� ������ ������ */
&lt;meta name="DC.Relation" content="Relation" /&gt; /* �� ������� */
&lt;meta name="DC.Coverage" content="Coverage" /&gt; /* �� ������� */
&lt;meta name="DC.Rights" content="Rights" /&gt; /* �� ������� */
</code></pre>��� ������������� ������������� ����� ��� � �������� ��������� ������� ���������� ��������������� ����� �������, ������������ ���� configuration.php.��������� ����������� ����, ��������� ���������� � �������� ����. <strong>��������!</strong></li>
<li>��������� com_contact �������� ��������� - �������� (��� ��������) ��������� ��������� ������ �� ��������� � ����� ������. ��������� ����������� ����� � style.css.</li>
<li>� ���������� com_contact ���������� ���������� ������ ���������� � ������� vCard.</li>
<li>� ���������� com_contact ������������� ������ ������������ ���� ����������� (������������� ���������� DOM jQuery).</li>
<li>��������� com_registration �������� ��������� - �������� ��������� ���������� ������. ��������� ����������� ����� � style.css.</li>
<li>��������� com_search �������� ��������� - �������� ��������� ���������� ������, ������ ������ ����������. ��������� ����������� ����� � style.css.</li>
<li>��������� com_joostinapdf -  ���������� �������������� ������ � ������� *.pdf �����.</li>
<li>������ mod_search �������� ��������� - �������� ��������� ���������� ������. ��������� ����������� ����� � style.css.</li>
<li>������ mod_ml_login �������� ��������� - �������� ��������� ���������� ������. ��������� ����������� ����� � style.css.</li>
<li>������ mod_stats �������� ��������� - �������� ��������� ���������� ������. ��������� ����������� ����� � style.css.</li>
<li>������ mod_weblinkspercat �������� ��������� - �������� (��� ��������) ��������� ��������� ������ �� ��������� � ����� ������. ��������� ����������� ����� � style.css.</li>
<li>������ mod_poll �������� ��������� - �������� (��� ��������) ��������� ��������� ������ �� ��������� � ����� ������. ��������� ����������� ����� � style.css.</li>
<li>������ mod_archive �������� ��������� - �������� ��������� ���������� ������. ��������� ����������� ����� � style.css.</li>
<li>������ mod_section �������� ��������� - �������� ��������� ���������� ������. ��������� ����������� ����� � style.css.</li>
<li>������ mod_latestnews �������� ��������� - �������� ��������� ���������� ������. ��������� ����������� ����� � style.css.</li>
<li>������ mod_related_items �������� ��������� - �������� ��������� ���������� ������. ��������� ����������� ����� � style.css.</li>
<li>������ � ���� ������� ����������� �<pre><code>&lt;button ...&gt; &lt;/button&gt;</code></pre>��
<pre><code>&lt;input ... /&gt;</code></pre></li>
<li>ToDo - ��������� ��� �� ������� ������ �������� � �������������� ���������, �������� ����������� � ������������.�����������.��������� ��������.</li>
<li>ToDo - ������������� ����������� ����� � IE.</li>
</ol>
<strong>upd. 05.06.11 - 05.07.11</strong>
<ol>
<li>Joostina-���� 2011, ����, ������...</li>
</ol>
<strong>upd. 11.05.11 - 04.06.11</strong>
<ol>
<li>Joostina 1.2.1.3.</li>
<li>��������� ������ ���������� ���� Joostina.</li>
<li>������� ������������� lessphp � php-typography (� ������).</li>
<li>������������� ��������� pdf-����� �� ����������� �����. ����������� ���������� (����) �������� � ����������� ������. � ��� ������ <a href="http://www.joomlatwork.com">JoomlaPrettyPDF</a> v.1.6.9 (�� 05.06.2007) ��  � �������������� ������� ������������� ������� � <a href="http://www.fpdf.org">FPDF</a> v.1.1, ���������� �� ������ 1.6 (�� 2008-08-03, ����� - Olivier Plathey). ��������� ����������� ����������. ����� ��� ����� �������� � ���� ���������� ����������. � ��������� ����� ������� �������� � ���������� pdf �� �����������, ����������� ���� ����������� � �����-������� (�������� *.png) - � �������� ������.</li>
<li>���������� ������ � WYSIWYG-���������� Spaw - ������������� �������� � ���� ��� introtext. ������� � ������� ������ ������� jQuery formalize - ���������� ��������� � ������ ��������.</li>
<li>������� ���� /help/copyright.php (������� &laquo;� Joostina&raquo; ������� &laquo;�����������&raquo;&rarr;&laquo;���������� � �������&raquo; back-end-�).</li>
<li>��������� �������� &laquo;�����&raquo; ��� ������ ���������� ���������� ��������� � ������ &laquo;����������&raquo; (mod_mostread).</li>
<li>������ ���� reset.css ��������� <a href="https://github.com/jonathantneal/normalize.css">Jonathan Neal's normalize.css</a>. ����� �� �������� ������ jQuery formalize.</li>
</ol>
<strong>upd. 25.04.11 - 10.05.11</strong>
<ol>
<li>Joostina 1.2.1.2.</li>
<li>��������� ���������� jQuery �� v.1.6. ��������� ����������������� ��������.</li>
<li>�������� &laquo;������ �����&raquo; ���������������� ��������� �... ��������� /components/com_registration/registration.php.</li>
<li>�������� ������ jQuery AutoClear - ���� ������� ���� �����. �������� � /includes/js/jquery/plugins. ���������� �� ������� (��������� ��������� ��������������� ����� � ���������� ��������). ����� ��� ������� �������� � �������� ����. ���������� �� <a href="http://joomla-book.ru/">http://joomla-book.ru/</a></li>
<li>��������� ����������� ������ ��� &laquo;��������� �������&raquo; � &laquo;����������&raquo;.</li>
</ol>
<strong>upd. 31.03.2011 - 20.04.2011</strong>
<ol>
<li>������:<pre><code>/* ������ ��� iPad/iPhon */
&lt;link rel="apple-touch-icon" href="&lt;?php echo $mosConfig_live_site;?&gt;/templates/&lt;?php echo $mainframe->getTemplate();?&gt;/
apple-touch-icon.png" /&gt;
/* ����� �������� ��������� � ����� ����� */
&lt;meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /&gt;
&lt;meta http-equiv="Content-Language" content="ru" /&gt;
/* ���������� ������� � ����������� ��� ��������� � �������� IE */
&lt;!--[if IE]&gt;&lt;meta http-equiv="imagetoolbar" content="no" /&gt;&lt;![endif]--&gt;</code></pre>�������� � /includes/frontend.php.</li>
<li>����� &lt;meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /&gt; ������ �� ������� - ������ �� ���������������� � htaccess.</li>
<li>� ������� �������� ����� ������� � ����������� ������ Joomla! �� Joostina.</li>
<li>��������� ���������� jQuery �� v.1.5.2.</li>
<li>�������� ������ jQuery dPassword - ������������� ����������� � front-end �����.</li>
<li>��������� ������ jQuery Preloader - ������������ ����������� �� ������. �������� � /includes/js/jquery/plugins. ����� ��� ������� �������� � �������� ����.</li>
<li>������� ��� �������� ����� � ���������� ��������, ��������� ������� �����������.</li>
<li>��������� �������� ���� - ��������� � ������������� ��������� �����.</li>
<li>� back-end (��������� com_config) ������� �������� ����� .htaccess.</li>
<li>�������� � ���������� �������� �� ������ - ����������������� �������������.</li>
<li>�������� � ���������� �������� �� e-mail - ����������������� �������������.</li>
<li>� ������� mosShowHead() ����� includes/frontend.php, ������ 261 �������� ��������� meta name=&laquo;Generator&raquo; �<pre><code>$mainframe->addMetaTag('Generator', $_VERSION->PRODUCT . ' - ' . $_VERSION->COPYRIGHT);</code></pre>��<pre><code>$mainframe->addMetaTag('Generator', $mosConfig_sitename);</code></pre>�.�. ������ ������������ ������ ���� &lt;meta name="Generator" content="��� �����" /&gt;. ������� ������� ���������������.</li>
<li>���������� ����� ��������� pdf �����, ���������� � ���������� ������, ������� �������� ���������� ��������� � ��������������� ����� - � ������ ����������� ��� ���������� ������ ������� ���������� tcPDF (��� ���� �� ��������� ����������).</li>
<li>� WYSIWYG-��������� Spaw:
	- ��������� ������ &laquo;VarInsert&raquo; (������������ ��� �������������� �������������  PHPMailer-ML � SPAW Editor v.2. ���������� ��������� e-mail �������� - ����� �������� ���������. ��� ������������� ��������� ���� &laquo;inc.campaigns.php&raquo; ��� PHPMailer-ML.).</li>
</ol>
<strong>upd. 30.01.2011 - 15.03.2011</strong>
<ol>
<li>Joostina 1.2.1.1. [alpha 1]</li>
<li>��������� kcaptcha - ���������� �������, ���������� ���������, �������� �������� ������������� �������� �����������.</li>
<li>���������� ��������, ���������� �������������� <a href="http://www.joomlaforum.ru">joomlaforum.ru</a>:
	- &laquo;������&raquo; � ������� ���������������� ������, ��������� ������� ������ back-end - joostfree: ���������� � �������� �����, ��������� &laquo;�����������&raquo;, � ��� ����� � � ����� /help/changelog.php � /help/copyright.php.;
	- ���� ������ ������ ������������� ���������� ��� ������ ���� &laquo;�������&raquo; � ��������� �� ���������;
	- �������������� style.css ������� ��� �������� ������ � �����������, ��������� ��� ����������� � �������������� ���� � ������������ ��������, ���������� ����������� � style.css, ����������� ��� �������� ����, ��������� ��� ������, �������� � ���������� ��������������� ��� input/textarea/select/button/etc, � ���������� � ����� ����������� ���� �������� �� ����������� ��-���������, ��������� �������� ��� ������ ������� � sql ������ ��� ��������� � � xml/php ����� ���������� (��� �������� �� ���� ���������), ���� ������� ����� CSScomb ��� WebStorm (������������ css);
	- �������� ����� ����������� � ����������� ��������� input, select, textarea, label, fieldset, option, optgroup, button - ��� ����� ��������� � ������������ jQuery ������ formalize;
	- �������� �������� ����� ������� front-  �  back-end - ����� ������ ��������� ���������������, ������������� ������������� ������������ ��������� ������ ��� ���������, �������� ������� �������;
	- ��������� � ����� �������� ���� ����� ������������ ����������� ��� IE8. ���� � ������� <a href="http://css-tricks.com/snippets/css/cross-browser-opacity/">Cross Browser Opacity</a>;
	- label � input/select ���������� � ��������� ������ ����, ��������, ��������� �� ��� ����� ������ (<a href="http://www.habrahabr.ru">habrahabr.ru</a>);
	- ���������� ����� ����������� � back-end (login.php), ���������� ����� (admin_login.css).
	- ����� ��������<pre><code>input</code></pre>�<pre><code>type=[text]</code></pre>��<pre><code>type=[email]</code></pre>� /components/com_contact/contact.html.php � /components/com_user/user.html.php ��� ���������, �������������� HTML5, ��������� (���� IE6) ��������� ����������� �������<pre><code>type</code></pre>���<pre><code>type=[text]</code></pre>
	- ���������� ���������� ����� ������ ���������� ����� � /includes/version.php � ������������ � <a href="http://www.ifap.ru/library/gost/7012003.pdf">���� � 7.0.1�2003</a>;
	- ������� �� ���������� ��������� ����� �� ���������. �� ��������� �������� logo - ��� div � h1, �� ���������� h1 ��� ��������� ��������, � logo ��� ������ (������� ��� � http://www.hospsurg.ru, ������������� ������������� - <a href="http://www.habrahabr.ru">habrahabr.ru</a>).</li>
<li>���������� ������ ������������ ���� (����������/����������) � front-end, � /language/russian.php ���������� ���������� �������<pre><code>$mon</code></pre>��<pre><code>$month_date</code></pre>�������� ������������ ������ ������� �������� ������� �� ��������� ����� �� ������� - ������� ����� �<pre><code>' . $m . '</code></pre>��<pre><code>%m</code></pre>
(����������� ������ � �������� ������� - ����=03). ������� ������ �� �������������� ������������ ����������� ��������� ������ ��������/����������� � ������� ����.</li>
<li>���������� ������ � back-end - ������������ ����� ������ ��������/��������� ��� ��������� ����������� com_content.</li>
<li>��������� ���������� jQuery �� v.1.5.1.</li>
<li>��� ����� ��������� (/administrator/components/com_jwmmxtd) ��������� ������ ������� jQuery MultiFile. �������� � /includes/js/jquery/plugins.</li>
<li>����������� ������, ����������� ��� ������ /includes/js/jquery/plugins/corner.js � IE.</li>
<li>htaccess �������� ��� Apache 2.2.16, ���������������� ������ ��� �������, �� �������������� ��� ��������� ������� �� ���������. ������������� ���������� ������� ��� Apache 1.* (����������������) - ���� � ��� ��� ������ - �����������������, ��������������� ������� ��� Apache 2.</li>
<li>� ������� NewLine ��������:
	- ��������� ��������� XFN (XHTML Friends Network � ����������� ��� ������� ���������� ���������������) -
�������� ������� � ��� head -<pre><code>profile="http://gmpg.org/xfn/11"</code></pre>
	- � ����� js ��������� ���������� <a href="http://www.modernizr.com/">Modernizr v1.6</a> (Modernizr &mdash; �����-���������� ��� �������������� �� ����� ������������ HTML5 &amp; CSS3). ��� ����������� ������� � index.php ������� ��������� ������ <strong>�����</strong> ������� ������� Jquery:<pre><code>&lt;script type="text/javascript" src="&lt;?php echo $mosConfig_live_site; ?&gt;/templates/&lt;?php echo $mainframe->getTemplate(); ?&gt;/js/
modernizr.js"&gt;&lt;/script&gt;</code></pre>
	- � index.php ����� &lt;/body&gt; �������� ��� ������������ ������ Google Analytics, ������ ������ ���������� ���� ��������� ����������� ���������� ��� ���� ������� �����. ��� ����������� �������� UA-XXXXX-X �� ID ������ ����� (�� ������ ���� ���������������� � ������ �������).</li>
</ol>
<strong>upd. 28.12.2010 - 28.01.2011</strong>
<ol>
<li>����������� ������������ ���������. ����������� � ��������� ������, ��������� ���� /includes/pageNavigation.php.</li>
<li>����������� XSS ������������ mustlive@websecurity.com.ua � ����� /components/com_search/search.html.php.</li>
<li>�������������� ���� ��� �������� ��� ������ � ��������������.</li>
<li>��������� ����� gzip ��� js/css, ��������� htassess � ������� �����.</li>
<li>������� htassess.</li>
<li>��������� ������� �������������� ������ � front-end ������ �������. ����� �� �������������� ����� �������������� ����� &laquo;Manager&raquo;, &laquo;Administrator&raquo;, &laquo;Super Administrator&raquo; �����������.</li>
<li>��������� ���������� jQuery �� 1.4.4.</li>
<li>�������� ��������� ������������ ������ ���������� com_content, ��������� ����� � css.</li>
<li>�������� ��������� �������� �������� button - ��� ���������� �������� � css (������������ �������� css3). ���� &laquo;������&raquo; ������ ��������� � ����� /images/buttons �������, ����� �������� ��� �������� ������ ������ ������� �������.</li>
<li>�������� ������� ��� ���������� �������, ������������� ��� ���������� � IE6 (������� � ��������� ������). ���� <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>.</li>
<li>������ �������<pre><code>text-rendering: optimizeLegibility;</code></pre>������ �������� (small-caps) � ������� �������� � *nix. ���� <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>.</li>
<li>� ���� /includes/joomla.php ��������� ����������� �������� jQuery � CDN (ajax.googleapis.com/ajax/libs/jquery/1.5.1/), � ��� ���������� ���������� � ���������� (�������� ����� �� ��������� ����������) - �������� ��������� ����� ������� (�� ���� /includes/js/jquery/jquery.js). ���� <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>. ��� ������� ������������ �������� ������ ���������� ������ � googleapis.com ��������� ��������� �������� � ������ /includes/joomla.php:
1) ����������������� ��������� ������:<pre><code>$mainframe->addJS('//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js');</code></pre>
2) ��������������� ��������� ������:<pre><code>$mainframe->addJS($mosConfig_live_site . '/includes/js/jquery/jquery.js');</code></pre></li>
<li>������� �������� � �������� ������ �� ����������� � ���������������� ������. ������� �������� � ������������ ��������� sectionid ������ �� ���������.</li>
<li>��� ����� ������ �������� �������� ���� &laquo;������&raquo; � ������ �������� ��� ������� �������� sectionid.</li>
<li>��������� ����������� PHP-���� (�� ���������� <a href="http://www.habrahabr.ru">habrahabr.ru</a>, <a href="http://www.reinholdweber.com">reinholdweber.com</a>, <a href="http://www.insight-it.ru">insight-it.ru</a>). ��� ����� ��������� ����������� ��������� �������� ��������� �������� ����. ������������� ���������������� �� ������� ���������� ������� (������������� �����).</li>
<table class="tab1">
<tr>
<td><strong>��� ������</strong></td><td><strong>�� ��� ������</strong></td><td><strong>������� ���������� ������</strong></td>
</tr>
<tr>
<td><pre><code>echo "a"</code></pre></td><td><pre><code>echo 'a'</code></pre></td><td>����� 20%</td>
</tr>
<tr>
<td><pre><code>is_null($var)</code></pre></td><td><pre><code>null===$var</code></pre></td><td>������ - � 4-5%</td>
</tr>
<tr>
<td><pre><code>$++</code></pre><pre><code>$--</code></pre></td><td><pre><code>++$</code></pre><pre><code>--$</code></pre></td><td>����� 100%/������ - � 2-3%</td>
</tr>
<tr>
<td><pre><code>time()</code></pre></td><td><pre><code>$_SERVER['REQUEST_TIME']</code></pre></td><td>����� 80-90%</td>
</tr>
</table>
<li>�������� ����������� ���� wz_tooltip.js �� ���� /includes/js/ (������ � /includes/parTemplate/tmpl/page.html).</li>
<li>�������� ����������� ���� calendar-setup �� ���� /includes/js/calendar/ (������ � /includes/parTemplate/tmpl/calendar.html).</li>
<li>��������� ����� �� �������� jscalendar-1.0 (������ � /includes/parTemplate/tmpl/calendar.html) - ���������� �� ���������.
P.S. �� ��. 18, 17 - �� �������� css ��� ���������� ��������� ����� front-end (� back-end �������� ������� �������).</li>
</ol>
<strong>upd. 25-27.12.2010</strong>
<ol>
<li>��������� ����������� ��������� ����� ����������� Joostina (��������� ������� ������ ����������� Kovalchuk Vitaliy), ������� �������� � ������������� ���� � ���������������� ������, ������� � js, ��������� ��������<pre><code>\', `, \\\'</code></pre>(�������� �� �����������), � ���������, ���������� ������� ��������� ���������� ����, ������ ������� ��������.</li>
<li>������ mod_mainmenu.php - &laquo;�������&raquo; ������������ Itemid � ������ ��� ��������� ������ ������.</li>
<li>������ ���������� � changeslog_joostina_120v2.</li>
</ol>
<strong>upd. 22.12.2010</strong>
<ol>
<li>Joostina 1.2.1 Stable</li>
</ol>
<strong>upd. 01-21.12.2010</strong>
<ol>
<li>��������� style.css - ��������� ����� ������, ����������� ��������� ����� ��� ������ ��� ������������ (������ � �������, ���������� � ����������� � �.�.).</li>
<li>������������ ���� �� ������� ����� ������ ������� template_css.css �� ����� ���� ������ - style.css.</li>
<li>��������� ������������� ������ ����������.</li>
<li>������ ������������ � ���� ������� - ������� ��, ��� ������� ������������ �� �����, ��������� ����� � ����������� ������.</li>
<li>������ ����� &lt;i&gt;, &lt;b&gt; ��&gt; &lt;em � &lt;strong&gt; �������������� � ����������� ����� front-end �����������.</li>
<li>Changeslog ��������� ����� back-end � ����� (�� �������� � copyright.php).</li>
<li>�������� ������ mod_downloadjoostina - �������� ��������� ������ cms � googlecode.com. ��� ����� ��������� � �������� ����� style.css, ������� �������� � ����� /modules/mod_downloadjoostina.</li>
<li>��������� ������� robots.txt</li>
<li>����� $ �� jQuery � ������� �������� - ������ � �������� � IE.</li>
<li>�������� ��������� ����� ���������� �� ����� ������� ��������� ��������, ������� ���������� ������� �������, � ����� ����� ������ ������ ������������ (� ������ ������� �����, ����� ������ ������������ ���� Super Administrator).</li>
<li>� ���� htaccess ��������� ������� ��� ���������� &laquo;����� �����&raquo; �� user-Agent.</li>
<li>��������� ����� ��������� ����������� � ����������� �������.</li>
<li>��������� ����������� ����������� �������� ������ ������ ��� ����������� �������.</li>
<li>��������� ��������� mod_ml_login - ����� ����� � style.css.</li>
<li>��������� ��������� /includes/vcard.class.php.</li>
<li>��������� ��������� ������� joostinasocialbot - ��������� ��������� ������������� ��������� ������.</li>
<li>������������ ���� WYSIWIG-��������� Spaw - �������� ������ ������������� �����������.</li>
<li>��������� htaccess ��� ������ ����� �����.</li>
<li>�������� � ����������� �������� ������ joostinatag - ����������� �������� ���� ��� ������� � ������ ������� ���������. ��������� ����� ��� ����������, �������� � style.css.</li>
</ol>
<strong>upd. 14-30.11.2010</strong>
<ol>
<li>������ WYSIWYG-�������� JCE, � ����� � btn-������� ��� ����. �������� ������������ WYSIWYG-�������� Spaw.</li>
<li>� WYSIWYG-��������� Spaw &laquo;���������&raquo;:
	- �������� ����� ������� � ������ &laquo;�������������� �����&raquo;;
	- ��������� ������ ������� ����� attache - ������ &laquo;�������� ����&raquo;;
	- ��������� ������ ������� �����-����� youtube - ������ &laquo;���� YouTube&raquo;;
	- ��������� ������ ������� ���� cleanpaste - ������ &laquo;������ HTML&raquo; (�������� � IE). �������������� ������� ���� �� �������� ���������� ����������, ����������� ��� MS Word;
	- ��������� ������ custombutton - �������� ����� ������;
	- ��������� ������ iespell - �������� ���������� (�������� � IE);
	- ��������� ������ imgpopup - ������, ��� ����� �� ������� ����������� ��������� � popup;
	- ��������� ������ inserthtml - ������� html ����;
	- ��������� ������ yahooMaps - ������� ������ �� Yahoomap (����������� ���������� �� Google);
	- ��������� ������ zoom - ���������� �������� �������� ���� � ��������� (�������� � IE).</li>
<li>���������� ������ ��� �������� �������� � front-end ����� - ������ ��������� ������� ������ &laquo;���������&raquo; � &laquo;���������&raquo;.</li>
</ol>
<strong>upd. 01-13.11.2010</strong>
<ol>
<li>���������� ����������� OpenID (������ 2.1.3 php-OpenID libraries by JanRain, Inc.). ��������� ���������� ��� Joostina! CMS, ������������ ����, ��������� ������� ����������� OpenID � ������ mod_ml_login, ������������.</li>
<li>���������� ������ � ������ ������ mod_mostread, ������������� ���������� ���������� ������ ����� ������ (����
<pre><code>&lt;class=" class="mostread""&gt;)</code></pre></li>
</ol>
<strong>upd. 15-30.10.2010</strong>
<ol>
<li>��������� jQuery �������: 
	- dPassword - ������ �������/�������� �������� ������ - aka iPad, ��������� ������ � ������ ����������� �� front-end �����;
	- pngFix - ���������� �� ����������;
	- textarearesizer - ������ ��������� ������� ���� textarea, ���������� �� ����������;
	- tablednd - ������ ��� ���������� ����� ������, ������������ �� �����, ���������� �� ����������;
	- mop-tip - ������ ����������� ���������, ���������� �� ����������.</li>
<li>� ����� /help ��� �������� jQuery ������� man-����� � ��������� ������������ � ���������� ����������� (<a href="<?php echo $mosConfig_live_site; ?>/help/dPassword.txt" target="_blank">dPassword</a>, <a href="<?php echo $mosConfig_live_site; ?>/help/mop-tip.txt" target="_blank">mop-tip</a>, <a href="<?php echo $mosConfig_live_site; ?>/help/textareacounter.txt" target="_blank">textareacounter</a>, <a href="<?php echo $mosConfig_live_site; ?>/help/textarearesizer.txt" target="_blank">textarearesizer</a>).</li>
<li>� ����� � ��������� jQuery ��� �������� ��������� ����� �������, �������� ����� (��� ������� ����� �������������).</li>
</ol>
<strong>upd. 09-10.2010</strong>
<ol>
<li>Joostina 1.2.1 prestable</li>
<li>��������� ���������� ��� ��������� ��������� ���� �������� (com_jmn), �������� �������� ����������, �������� ���������� �������� ����.</li>
<li>���������� ���������� �����������, ������������� �������� (��������� ������������� Dean).</li>
<li>������ �������� �� ��������� ������ ����� �������� ��� ������ ������� (������ css).</li>
<li>����������� �������� ��������� http-���������� ��� ������������ ������ Expires � Last-Modified (��� ������ ����� ������), ����������� ����� Cache-Control � Pragma.</li>
<li>�� ��������, ��������������� ��� ������, ������ ����� ���������� ��������.</li>
<li>��������� � ����� /includes/js/calendar calendar-mini.js v.0.9.2 (�������� �� ����������� ����� � ����� ������ �������).</li>
<li>��������� ���� htaccess - ������� ��������, ������� ������ ����������� �� �������������.</li>
<li>����������� ��������� ������ ��������� (/installation) - ��������� �����, �������� �������� ����������, ����������� ������� �������� ����, �������������� �������� ���������� ������ ��������, ����������� � ����������� ����������� ������ ����� ��������� (� �������� ���������).</li>
<li>�������� ������ jQuery textareacounter (������ � ����� /includes/js/jquery/plugins/, �������������) - ������� ��������/���� ��� ������ ������ � ���������� �����, ��������� � ���������� "��������" (���� contact_name, contact_email, contact_subject � contact_text), �������� ���� ������� �������� ������������ ������� ��� ������ �������� ������/����. �������� ������� ����, ��������� ����������.</li>
<li>��������� ������ � ���������� disabled.</li>
<li>�������� ��������� GET-���������� � URL.</li>
</ol>
<strong>upd. 03-11.09.10</strong>
<ol>
<li>����������� ������ � �������������� �������� ������ ������������ �� ���� ����� &laquo;������ ��������������&raquo; (� �.�. � � ������ &laquo;Super Administrator&raquo;) � ���������� ��� ����������� �� ������� &laquo;������������&raquo;.</li>
<li>����������� ������ � ������������� ������� &laquo;�������������&raquo; � ������������� ������ &laquo;Publisher&raquo; ��� ������ � ���������� � front-end �����.</li>
<li>����������� ������ � �������������� ��������� ������� ������������ ����� ����������� �� ������� &laquo;������ ������&raquo; (index.php?option=com_user&amp;task=UserDetails).</li>
<li>����������� ������ � ������������� ������� &laquo;�������������&raquo; ��� ������ � ���������� �����, ����� ������� � ���������� ������� ������ ���� ����� &laquo;��������� �������� - ������&raquo;.</li>
<li>�������� ���� ��������� ��� ���������� � �������� �� ��������� �� ������� ������ & �� <code>&amp;</code> � ��������, ��� �������, �� ������ W3C, ��� �������� ��� ��������� html ����.</li>
<li>� css:
	- ��������� css ��� ������� NewLine.
	- �������� reset.css, base.css, tempate_css.css ����� �������, ��� ��� �������, ��� � ��� �����������.
	- Xmap.css ������ � �������� �������� ����.
	- �������� ����� �������������� ����������� ������ ��� ���������� ���� ������, ������� ������, �������� &laquo;������ ����&raquo; + http://www.joostina.ru, ������ �� ����������, �������, ������� �������������� ��������� ������ � com_search (sic: ��� ����������� �������� ����������� � css �����!).
	- ��������� ������������ ��� ������� ����������� ������� � �������������� ��������� ������ � com_search.</li>
<li>��������� �������� alt, title � ���� ������ ��������������� �������� ���� ���������� � �������� �� ���������.</li>
<li>�������� ������ WISWIG �������� Spaw v.2.0.8-j14. ������ ��� ���������� ������ spaw ���� htaccess �� ����� /cache.</li>
<li>�������� ���������� ���� ��� ����� front-end - �������� ���� �� Joomla 1.0.14.</li>
<li>����� ��������� �������� ����� ������ ������������ �� �������� Super Administrator.</li>
<li>���������� � table/tr/td �� div front-end ����� ���������� � �������� �� ���������:
com_search (����), com_registration (����), com_weblinks (��������), com_newsfeeds (��������), com_content (��������).</li>
<li>��������� ������� � ����� /includes/js/ � �������� �� ���������:
	- JSCookMenu � v.1.4.3 �� v.2.0.4,
	- fullajax.js � v.1.0.3 build 1 �� v.1.0.4 build 8;
	  upload.fullajax.js � v.1.0.3 build 1 (upload) �� v.1.0.4 build 8 (upload);
	  dax.fullajax.js � v1.0.3 build 1 (dax) �� v1.0.4 build 8 (dax),
	- calendar-mini.js � v.0.9.2 �� v.1.0.</li>
<li>����� ����� ����������� ��� �������� �� ����� ������� ������.</li>
<li>������� ����� ��� ������ ���������� http-���������� � �������� index.php/index2.php (bay, mambo!).</li>
<li>�������� htaccess:
- ��������� ������ ���������� ETags,
- ��������� ������ ���������� Expires headers (����� �������� ��� ���������� mod_headers.c).</li>
<li>�� /components/com_poll/poll_bars.css ����� �������� � ������� css ���� (������������ ����������� ������� ��� ��������� SEF, ��� ����� � poll.html.php ���������������).</li>
<li>������� ����� css/js ������ � ���������� plugin_jw_ajaxvote - ����� �������� �������, ����� php ���� � ������������ http-����������� (��� �� ������ � index.php/index2.php).</li>
<li>�������� ����� (reset, base, template_css) ���������� � ���� ���� style.css.</li>
<li>� �������� �� ��������� ������ ������ �������� � ���������� ������� - Joostina socialbot (�) doctorgrif, ����� ������� � �������� css �������, ����������� ������ ���������� �������� � ����� /images/sociable. ������������� ��� ������� &laquo;������� �� ����� Joostina!&raquo; � &laquo;�������� ����������&raquo; ��������� ��������� ��������� � ����������, ���������� ��������� � ��� ������ ���������������� �������, ��� �� ����� �������� ���������� ��������.</li>
<li>htaccess �������� ��������� ����������� ��� Apache 1.*/Apache 2.* (���������� ���������������� �������, �� ����������� � ����� ������ Apache). ����������� ������� ����������� ������� ������.</li>
<li>�������� � �������� ���� ���������� ��:
	1) /modules: mod_whosonline, mod_stats, mod_random_image, mod_ml_login;
	2) /mambots: plugin_jw_ajaxvote, joostinasocialbot;
	3) /components: com_weblinks, com_registration, com_polls, com_content, com_banners;
	4) /administrator: /templates, /popups, /modules.</li>
<li>�������� ����������� ���� ��� front-end - �������� ���� �� Joomla 1.0.13.</li>
</ol>
<strong>upd. 01.08.10</strong>
<ol>
<li>��������� htaccess � ����� /templates, /cache.</li>
</ol>
<strong>upd. 19.07.10</strong>
<ol>
<li>������� htaccess - �������� ������� �������.</li>
<li>������� robots.txt - ��������� ������� ��� Yandex.</li>
</ol>
<strong>upd. 16.07.10</strong>
<ol>
<li>����������/���������� ����� ������ �� ����� ������� � /help/copyright.php.</li>
<li>���������� ����������� �������� ��������� ����� ������ (����� ������� ��������� �������� ����� ��� ���������). ����� � ������� mambots/content/plugin_jw_ajaxvote.php ������� onBeforeDisplayContent �� onAfterDisplayContent.</li>
<li>�������� �� ����� ����� ���������� a-la "�����: �������� �� ��������� ������������: 28 ���� 2007" - ������� ������� ����� � css � �������� ��� ����� � components/com_content/content.html.php.</li>
<li>���������� � robots.txt ��������� Disallow: /*com_search*/ ��� ������� ���������� ������������ ����������� ������.</li>
<li>��������� ����������� /index.php ��� ����������� ���������� ���������� ������ ���� �������������� �����. ��������, ��� ����� ����� ���������� ��� ����� ���������� ������ ���������� �� ����� ������� ��������� ��������, ������� ���������� ������� �������, � ����� ����� ������ ������ ������������.</li>
<li>����������� ������ ���������� ������ � components/com_contact/contact.html.php � ���������� ��� � ����� ���������� ����: �������� ������, ������, �������, �����, �����, ���. ����.: &laquo;123456, ������, ����������� �������, �. �������, 12-� ��������, ���� ���&raquo;.</li>
</ol>
<strong>upd. 15.07.10</strong>
<ol>
<li>���������� js � ����� /includes/js/jquery/:
- jQuery JavaScript Library � v1.3.2 �� v1.4.2 (������� Sizzle.js - � v0.9.3 �� v1.0).</li>
<li>���������� js � ����� /includes/js/jquery/plugins/:
	- simplegallery.js � ������ �� 07.12.2008 (jQuery 1.2.x) �� ������ �� 06.02.2009 (jQuery v 1.3.x);
	- corner.js � v1.92 (12.18.2007) �� v2.11 (15.06.2010).</li>
</ol>
<strong>upd. 12.07.10</strong>
<ol>
<li>�������� �� components/com_content/content.php ����� � ������������ �� ������ ������ cms.</li>
<li>���������� ������ ������ htaccess ��� ��������� SEF.</li>
<li>������� ����������� doctorgrif �� ������ ��������.</li>
<li>����������� ������� �������, css ���� ��������.</li>
</ol>
<strong>upd. 10.07.10</strong>
<ol>
<li>����������� /components/com_contact ��� ����������� � ������ �������������� IP-����� ������ ���������.</li>
<li>����������� /components/com_search ��� ������ �� ��������� ����������. ��������� ���������� � �������� ����. � ��������� ����� �� ������������� - �� ���������.</li>
</ol>
<strong>upd. 27.06.10</strong>
<ol>
<li>������ &laquo;...&raquo; �� ������ ���������� &laquo;�&raquo;.</li>
</ol>
<strong>upd. 18.06.10</strong>
<ol>
<li>��������� ������ 503 Service Temporarily Unavailable ��� ������������ �����.</li>
<li>���� � notetext.</li>
</ol>
<strong>upd. 16.06.10</strong>
<ol>
<li>��������� ������ � mod_mainmenu (+ ����������� /includes/sef.php ��� ����������� &laquo;��������&raquo; ������ � ������� ��� ��������� SEF). ���������� �� �������������:
	1.) ���� &rarr; yourmenu (��������� mod_mainmenu) &rarr; �������;
	2.) ����� ����� ���� &rarr; &laquo;������ - Url&raquo;;
	3.) ����� - ������: http://full_link_to_your_content/#youranchor;
	4.) ���������;
	5.) � ���������� ����� (������/�������/������ ���������� - option=com_yourcomponent), � ������ ��� �����, ������ ������ ����� (#youranchor). ������ ��� ������ ������� ������ � ���� ��������� �������� ����������� ������ � ������� �����.</li>
</ol>
<strong>upd. 11.06.10</strong>
<ol>
<li>�������������� ���� "�����" � mod_search - ����������� �������� ����������� ����� � ���� ������ + �������������� ����� (in work).</li>
<li>mod_newsflash - ����������� ������ � �� �������.</li>
<li>com_search - ������ ��� ���������� ������������� �������� � ��������� ������.</li>
<li>��������� (�������������) ������ ��������� �����������.</li>
<li>��������� ��������� ������� (��� -��?) ���� �������� ������ �������� ����� - ������ ���������������� �������� /language/russian.php.</li>
<li>��������� ���������� �� ���������. ��������, ���� �� ������������ ������, ����������� ��� ���-�� ��������, � ��� ����� ������������� �������� ������ � ������������ ������������������.</li>
</ol>
<strong>upd. 02.04.10</strong>
<ol>
<li>��� includes/joostina.php ���� ����������� ��������� �������, ����������� ��������� ���� � ������������ ���.</li>
</ol>
<strong>upd. 19.03.10</strong>
<ol>
<li>��������� ������������� ����������� � /administrator/images.</li>
</ol>
<strong>upd. 03-13.03.10</strong>
<ol>
<li>Joostina 1.2.0 v3.</li>
<li>����������� ���� (�������� ������ ����� � ��������). �������������� �������� �������, css, js ����������, � �.�. � ������� NewLine. ������������� &laquo;������&raquo; ������� js.</li>
<li>��������� ���������� ��� ����������� ��������� � &laquo;������������&raquo; ���� �� ������.</li>
<li>��������� ������ � /components/com_content - ����� �������������� ���������� (������, ���������, �����, ���� �������� � �����������) � ���� ������. ���������� �� ����� ��������� ������� - ������� �� ���� (in work).</li>
<li>���������� �������� ����������, ���������� ������ � ������������.</li>
<li>���������� htaccess - ������������, �����������.</li>
<li>������� ������� �����������, ��������� ����������� � /components/com_content/content.html.php ��� ��������� css ����� �������.</li>
<li>�������� �������� ���� - �������� �������� ���������� ����������.</li>
</ol>
<ol>
<li class="nolist"><a href="<?php echo $mosConfig_live_site; ?>/help/changeslog_joostina_120v2" target="_blank"><strong>Joostina 1.0*-1.2.0 v.2</strong></a>.</li>
</ol>
</div>