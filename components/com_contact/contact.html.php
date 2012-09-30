<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/
// запрет прямого доступа
defined('_VALID_MOS') or die();

/**
* @package Joostina
* @subpackage Contact
*/
class HTML_contact {
	
	function displaylist(&$categories, &$rows, $catid, $currentcat = null, &$params, $tabclass) {
		global $Itemid, $mosConfig_live_site, $hide_js;
		if ($params->get('page_title')) {
?>
<div class="componentheading"><?php echo $currentcat->header; ?></div>
	<?php } ?>
	<form action="index.php" method="post" name="adminForm">
		<table cellpadding="4" cellspacing="0" class="contentpane">
			<tr>
				<td width="60%" class="contentdescription" colspan="2">
				<?php if ($currentcat->img) { ?>
					<img src="<?php echo $currentcat->img; ?>" align="<?php echo $currentcat->align; ?>" alt="<?php echo _WEBLINKS_TITLE; ?>" />
				<?php } echo $currentcat->descrip; ?>
				</td>
			</tr>
			<tr>
				<td><?php if (count($rows)) {
					HTML_contact::showTable($params, $rows, $catid, $tabclass);
					} ?>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<?php
// Displays listing of Categories
					if (($params->get('type') == 'category') && $params->get('other_cat')) {
						HTML_contact::showCategories($params, $categories, $catid);
					} else
					if (($params->get('type') == 'section') && $params->get('other_cat_section')) {
						HTML_contact::showCategories($params, $categories, $catid);
					}
					?>
				</td>
			</tr>
		</table>
	</form>
		<?php
// displays back button
		mosHTML::BackButton($params, $hide_js);
	}

	/** Display Table of items */
	function showTable(&$params, &$rows, $catid, $tabclass) {
		global $mosConfig_live_site, $Itemid;
		?>
		<table>
		<?php if ($params->get('headings')) { ?>
			<tr>
				<td class="sectiontableheader"><?php echo _CONTACT_HEADER_NAME; ?></td>
				<?php if ($params->get('position')) { ?>
				<td class="sectiontableheader"><?php echo _CONTACT_HEADER_POS; ?></td>
				<?php } ?>
				<?php if ($params->get('email')) { ?>
				<td class="sectiontableheader"><?php echo _CONTACT_HEADER_EMAIL; ?></td>
				<?php } ?>
				<?php if ($params->get('telephone')) { ?>
				<td class="sectiontableheader"><?php echo _CONTACT_HEADER_PHONE; ?></td>
				<?php } ?>
				<?php if ($params->get('fax')) { ?>
				<td class="sectiontableheader"><?php echo _CONTACT_HEADER_FAX; ?></td>
				<?php } ?>
			</tr>
			<?php
				}
				$k = 0;
				foreach ($rows as $row) {
				$link = 'index.php?option=com_contact&amp;task=view&amp;contact_id=' . $row->id . '&amp;Itemid=' . $Itemid;
			?>
			<tr>
				<td class="<?php echo $tabclass[$k]; ?>"><a href="<?php echo sefRelToAbs($link); ?>" class="category<?php echo $params->get('pageclass_sfx'); ?>" title="<?php echo $row->name; ?>"><?php echo $row->name; ?></a></td>
				<?php if ($params->get('position')) { ?>
				<td class="<?php echo $tabclass[$k]; ?>"><?php echo $row->con_position; ?></td>
				<?php } ?>
				<?php
				if ($params->get('email')) {
					if ($row->email_to) {$row->email_to = mosHTML::emailCloaking($row->email_to, 1);
				}
				?>
				<td class="<?php echo $tabclass[$k]; ?>"><?php echo $row->email_to; ?></td>
				<?php } ?>
				<?php if ($params->get('telephone')) { ?>
				<td class="<?php echo $tabclass[$k]; ?>"><?php echo $row->telephone; ?></td>
				<?php } ?>
				<?php if ($params->get('fax')) { ?>
				<td class="<?php echo $tabclass[$k]; ?>"><?php echo $row->fax; ?></td>
				<?php } ?>
			</tr>
			<?php
			$k = 1 - $k;
			}
			?>
		</table>
		<?php
	}

	/** Display links to categories */
	function showCategories(&$params, &$categories, $catid) {
		global $mosConfig_live_site, $Itemid;
		?>
<ul>
<?php
	foreach ($categories as $cat) {
		if ($catid == $cat->catid) {
?>
	<li>
		<strong><?php echo $cat->title; ?></strong> <span class="small">(<?php echo $cat->numlinks; ?>)</span>
	</li>
	<?php } else {
		$link = 'index.php?option=com_contact&amp;catid=' . $cat->catid . '&amp;Itemid=' . $Itemid; ?>
	<li>
		<a href="<?php echo sefRelToAbs($link); ?>" class="category" title="<?php echo $cat->title; ?>"><?php echo $cat->title; ?></a>
	<?php if ($params->get('cat_items')) { ?>
		&nbsp;<span class="small">(<?php echo $cat->numlinks; ?>)</span>
	<?php } ?>
	<?php
// Writes Category Description
	if ($params->get('cat_description')) {
		echo '<br />';
		echo $cat->description;
	}
	?>
	</li>
				<?php
			}
		}
		?>
</ul>
		<?php
	}

	function viewcontact(&$contact, &$params, $count, &$list, &$menu_params) {
		global $mosConfig_live_site;
		global $mainframe, $Itemid;
		$template = $mainframe->getTemplate();
		$sitename = $mainframe->getCfg('sitename');
		$hide_js = intval(mosGetParam($_REQUEST, 'hide_js', 0));
		?>
		<script type="text/javascript">
			function validate(){
				if ((document.emailForm.text.value == "") || (document.emailForm.email.value.search("@") == -1) || (document.emailForm.email.value.search("[.*]") == -1)) {alert("<?php echo addslashes(_CONTACT_FORM_NC); ?>");
				} else if ((document.emailForm.email.value.search(";") != -1) || (document.emailForm.email.value.search(",") != -1) || (document.emailForm.email.value.search(" ") != -1)) {alert("<?php echo addslashes(_CONTACT_ONE_EMAIL); ?>");
				} else {
					document.emailForm.action = "<?php echo sefRelToAbs("index.php?option=com_contact&amp;Itemid=$Itemid"); ?>"
					document.emailForm.submit();
				}
			}
		</script>
		<script type="text/javascript">
			function ViewCrossReference(selSelectObject){
				var links = new Array();
		<?php
		$n = count($list);
		for ($i = 0; $i < $n; ++$i) {
			echo "\nlinks[" . $list[$i]->value . "]='" . sefRelToAbs('index.php?option=com_contact&amp;task=view&amp;contact_id=' .
					$list[$i]->value . '&amp;Itemid=' . $Itemid) . "';";
		}
		?>
				var sel = selSelectObject.options[selSelectObject.selectedIndex].value
				if (sel != "") {location.href = links[sel];
				}
			}
		</script>
			<?php
// For the pop window opened for print preview
			if ($params->get('popup')) {
				$mainframe->setPageTitle($contact->name);
				$mainframe->addCustomHeadTag('<link rel="stylesheet" href="templates/' . $template . '/css/style.css" type="text/css" />');
			}
			if ($menu_params->get('page_title')) {
				?>
<div class="componentheading"><?php echo $menu_params->get('header'); ?></div>
				<?php
			}
			?>
<div class="contentpane">
		<?php
		// displays Page Title
		HTML_contact::_writePageTitle($params, $menu_params);
		// displays Contact Select box
		HTML_contact::_writeSelectContact($contact, $params, $count);
		?>
		<div id="ddtags" class="contact" itemscope itemtype="http://schema.org/Person">
		<?php
		// displays Name & Positione
		HTML_contact::_writeContactName($contact, $params, $menu_params);
		// displays Image
		echo '<div class="contact-img">';
		HTML_contact::_writeImage($contact, $params);
		echo '</div>';
		// displays Address
		HTML_contact::_writeContactAddress($contact, $params);
		// displays Email & Telephone
		HTML_contact::_writeContactContact($contact, $params);
		// displays Email Form
		HTML_contact::_writeVcard($contact, $params);
		// displays Misc Info
		HTML_contact::_writeContactMisc($contact, $params);
		?>
			</div>
	<div>
		<?php
		// displays Email Form
		HTML_contact::_writeEmailForm($contact, $params, $sitename, $menu_params);
		?>
	</div>
</div>
		<?php
// display Close button in pop-up window
		mosHTML::CloseButton($params, $hide_js);
// displays back button
		mosHTML::BackButton($params, $hide_js);
	}

	/** Writes Page Title */
	function _writePageTitle(&$params, &$menu_params) {
		if ($params->get('page_title') && !$params->get('popup')) {
			?>
<tr>
	<td class="componentheading">
		<?php echo $params->get('header'); ?>
	</td>
</tr>
			<?php
		}
	}

	/** Writes Dropdown box to select contact */
	function _writeSelectContact(&$contact, &$params, $count) {
		if (($count > 1) && !$params->get('popup') && $params->get('drop_down')) {
			global $Itemid;
			?>
<tr>
	<td>
		<form action="<?php echo sefRelToAbs('index.php?option=com_contact&amp;Itemid=' . $Itemid); ?>" method="post" name="selectForm" target="_top" id="selectForm" class="form">
			<p><?php echo (_CONTACT_SEL); ?></p>
			<p><?php echo $contact->select; ?></p>
		</form>
	</td>
</tr>
			<?php
		}
	}
	/** Writes Name & Position */
	function _writeContactName(&$contact, &$params, &$menu_params) {
		global $Itemid, $hide_js, $mosConfig_live_site;
		if ($contact->name || $contact->con_position) {
			if ($contact->name && $params->get('name')) {
				?>
<h2 itemprop="name"><?php echo $contact->name; ?></h2>
<ul class="buttonheading">
<?php
	// displays Print Icon
	$print_link = $mosConfig_live_site . '/index2.php?option=com_contact&amp;task=view&amp;contact_id=' . $contact->id . '&amp;Itemid=' . $Itemid . '&amp;pop=1';
	mosHTML::PrintIcon($contact, $params, $hide_js, $print_link);
?>
</ul>
	<?php
			}
		}
	}

	/** Writes Image */
	function _writeImage(&$contact, &$params) {
		global $mosConfig_live_site;
		if ($contact->image && $params->get('image')) {
			?>
			<figure>
				<img src="<?php echo $mosConfig_live_site; ?>/images/stories/<?php echo $contact->image; ?>" alt="<?php echo _CONTACT_TITLE; ?>" itemprop="image" />
				<figcaption><?php echo $contact->name; ?></figcaption>
			</figure>
				<?php
			}
		}

	/** Writes Address */
	function _writeContactAddress(&$contact, &$params) {
		if (($params->get('address_check') > 0) && ($contact->con_position || $contact->address || $contact->suburb || $contact->state || $contact->country || $contact->postcode)) {
				?>
<dl>
	<?php if ($contact->con_position && $params->get('position')) { ?>
			<dt class="contact-type"><?php echo $params->get('marker_position'); ?></dt> 
			<dd class="contact-item" itemprop="jobTitle"><?php echo $contact->con_position; ?></dd>
	<?php } ?>
			<?php if ($params->get('address_check') > 0) { ?>
			<dt class="contact-type"><?php echo $params->get('marker_address'); ?></dt>
			<dd class="contact-item" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="postalCode"><?php echo $contact->postcode; ?></span>,
			<?php } if ($contact->country && $params->get('country')) { ?>
				<span itemprop="addressCountry"><?php echo $contact->country; ?></span>,
			<?php } if ($contact->state && $params->get('state')) { ?>
				<span itemprop="addressRegion"><?php echo $contact->state; ?></span>,
			<?php } if ($contact->suburb && $params->get('suburb')) { ?>
				<span itemprop="addressLocality"><?php echo $contact->suburb; ?></span>,
			<?php if ($contact->address && $params->get('street_address')) { ?>
				<span itemprop="streetAddress"><?php echo $contact->address; ?></span>
			</dd>
			<?php } ?>
			<?php } ?>
	<?php
					}
				}

	/** Writes Contact Info */
	function _writeContactContact(&$contact, &$params) {
		if ($contact->email_to || $contact->telephone || $contact->fax) {
						?>
	<?php if ($contact->email_to && $params->get('email')) { ?>
			<dt class="contact-type"><?php echo $params->get('marker_email'); ?></dt>
			<dd class="contact-item" itemprop="email"><?php echo $contact->email; ?></dd>
	<?php } if ($contact->telephone && $params->get('telephone')) { ?>
			<dt class="contact-type"><?php echo $params->get('marker_telephone'); ?></dt>
			<dd class="contact-item" itemprop="telephone"><?php echo $contact->telephone; ?></dd>
	<?php } if ($contact->fax && $params->get('fax')) { ?>
			<dt class="contact-type"><?php echo $params->get('marker_fax'); ?></dt>
			<dd class="contact-item"><?php echo $contact->fax; ?></dd>
	<?php } ?>
			<?php
		}
	}

	/** Writes Vcard */
	function _writeVcard(&$contact, &$params) {
		if ($params->get('vcard')) {
			?>
			<dt class="contact-type"><?php echo $params->get('marker_vcard'); ?></dt>
			<dd class="contact-item"><?php echo _CONTACT_DOWNLOAD_AS; ?> <a href="<?php echo sefRelToAbs('index2.php?option=com_contact&amp;task=vcard&amp;contact_id=' .$contact->id . '&amp;no_html=1');?>"><?php echo _VCARD; ?></a></dd>
							<?php
						}
					}

	/** Writes Misc Info */
	function _writeContactMisc(&$contact, &$params) {
		if ($contact->misc && $params->get('misc')) {
			?>
			<dt class="contact-type"><?php echo $params->get('marker_misc'); ?></dt>
			<dd class="contact-item"><?php echo $contact->misc; ?></dd>
			<?php
		}
	}
	/** Writes Email form */
	function _writeEmailForm(&$contact, &$params, $sitename, &$menu_params) {
		global $Itemid, $mosConfig_captcha_cont, $mosConfig_live_site;
		if ($contact->email_to && !$params->get('popup') && $params->get('email_form')) {
		// used for spoof hardening
			$validate = josSpoofValue();
			?>
</dl>
<div id="contact">
	<form method="post" action="<?php echo sefRelToAbs('index.php?option=com_contact&amp;Itemid=' . $Itemid); ?>" name="emailForm" target="_top" class="form" id="emailForm">
		<fieldset>
		<legend><h5><?php echo _SEND_EMAIL_CONTACT;?> <?php echo $contact->name; ?></h5></legend>
			<?php if ($params->get('email_description_text') > 0) { ?>
			<p>
				<?php echo $params->get('email_description_text'); ?>
			</p>
			<?php } ?>
			<p>
				<label for="contactname"><?php echo _NAME_PROMPT; ?></label><br />
				<input id="contactname" placeholder="<?php echo _NAME_PROMPT_PH; ?>" class="text-input" type="text" size="50" required="required" />
			</p>
			<p>
				<label for="contactemail"><?php echo _EMAIL_PROMPT; ?></label><br />
				<input id="contactemail" placeholder="<?php echo _EMAIL_PROMPT_PH; ?>" class="text-input" type="email" size="50" required="required" />
			</p>
			<?php if ($params->get('email_copy')) { ?>
			<p>
				<label for="contactemailcopy"><?php echo _EMAIL_A_COPY; ?></label><br />
				<input type="checkbox" name="email_copy" id="contactemailcopy" value="1" placeholder="<?php echo _EMAIL_A_COPY; ?>" />
			</p>
			<?php } ?>
			<p>
				<label for="contactsubject"><?php echo _SUBJECT_PROMPT; ?></label><br />
				<input class="text-input" type="text" name="subject" id="contactsubject" size="50" placeholder="<?php echo _SUBJECT_PROMPT_PH; ?>" required="required" />
			</p>
			<p>
				<label for="contacttext"><?php echo _MESSAGE_PROMPT; ?></label><br />
				<textarea rows="10" cols="50" name="text" maxlength="500" id="contacttext" placeholder="<?php echo _MESSAGE_PROMPT_PH; ?>" type="textarea"></textarea>
			</p>
			<?php if ($mosConfig_captcha_cont) { session_start(); ?>
			<p id="captchatext">
				<label for="captchatext"><?php echo _PLEASE_ENTER_CAPTCHA; ?></label><br />
				<input name="captcha" type="text" id="captchatext" size="15" placeholder="<?php echo _PLEASE_ENTER_CAPTCHA_PH; ?>" /><br />
				<img id="captchaimg" alt="Нажмите чтобы обновить изображение" onclick="document.emailForm.captchaimg.src='<?php echo $mosConfig_live_site; ?>/includes/kcaptcha/index.php?'+new String(Math.random())" src="<?php echo $mosConfig_live_site; ?>/includes/kcaptcha/index.php?<?php echo session_id() ?>" />
			</p>
			<?php }; ?>
			<input type="submit" name="send" value="<?php echo _SEND_BUTTON_CONTACT; ?>" class="button" onclick="validate()" />
			<input type="hidden" name="option" value="com_contact" />
			<input type="hidden" name="con_id" value="<?php echo $contact->id; ?>" />
			<input type="hidden" name="sitename" value="<?php echo $sitename; ?>" />
			<input type="hidden" name="op" value="sendmail" />
			<input type="hidden" name="<?php echo $validate; ?>" value="1" />
		</fieldset>
	</form>
</div>
			<?php
		}
	}
	function nocontact(&$params) {
		?>
		<?php echo _CONTACT_NONE; ?>
		<?php
// displays back button
		mosHTML::BackButton($params);
	}
}
?>