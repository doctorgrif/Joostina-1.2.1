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
global $mosConfig_absolute_path, $mosConfig_live_site;
$rotate_type = $params->get('rotate_type', 0);
$img_pref = $params->get('img_pref', '');
$type = $params->get('type', 'jpg');
$folder = $params->get('folder');
$link = $params->get('link');
$width = $params->get('width');
$height = $params->get('height');
$slideshow_name = $params->get('slideshow_name', 'jstSlideShow_1');
$s_autoplay = $params->get('s_autoplay', '1');
$s_pause = $params->get('s_pause', '2500');
$s_fadeduration = $params->get('s_fadeduration', '500');
$panel_height = $params->get('panel_height', '45px');
$panel_opacity = $params->get('panel_opacity', '0.5');
$panel_padding = $params->get('panel_padding', '5px');
$panel_font = $params->get('panel_font', 'bold 11px Verdana');
$the_array = array();
$the_image = array();
if ($s_autoplay) {
	$s_autoplay == 'true';
} else {
	$s_autoplay == 'false';
}
// если путь до папки содержит название сайта, удаляем
if (strpos($folder, $mosConfig_live_site) === 0) {
	$folder = str_replace($mosConfig_live_site, '', $folder);
}
// если путь до папки содержит абсолютный путь, удаляем
if (strpos($folder, $mosConfig_absolute_path) === 0) {
	$folder = str_replace($mosConfig_absolute_path, '', $folder);
}
// если путь до папки не содержит слэш в начале, добавляем
if (strpos($folder, '/') !== 0) {
	$folder = '/' . $folder;
}
// создаем абсолютный путь до директории
$abspath_folder = $mosConfig_absolute_path . $folder;
// проверка наличия директории
if (is_dir($abspath_folder)) {
	if ($handle = opendir($abspath_folder)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != '.' && $file != '..' && $file != 'CVS' && $file != 'index.html') {
				$the_array[] = $file;
			}
		}
	}
	closedir($handle);
	foreach ($the_array as $img) {
		if (!is_dir($abspath_folder . '/' . $img)) {
			if (eregi($type, $img)) {
				$the_image[] = $img;
			}
		}
	}
	if (!$the_image) {
		echo _NO_IMAGES;
	} else {
		$count = count($the_image);
		$i = 0;
		$k = 1;
		$pics = array();
		foreach ($the_image as $v) {
			if (!$rotate_type) {
				$random = mt_rand(0, $count - 1);
				$v = $the_image[$random];
				$image_name = $v;
			}
			$abspath_image = $abspath_folder . '/' . $v;
			$size = getimagesize($abspath_image);
			if ($width == '') {
				($size[0] > 100 ? $width = 100 : $width = $size[0]);
			}
			if ($height == '') {
				$coeff = $size[0] / $size[1];
				$height = (int) ($width / $coeff);
			}
			$image = $mosConfig_live_site . $folder . '/' . $v;
			if (!$rotate_type) {
				break;
			} else {
				if ($img_pref) {
					if (strpos($v, $img_pref) !== false) {
						$pics[$i] = '["' . $image . '", "' . $link . '", "_self"]';
						++$i;
					}
				} else {
					$pics[$i] = '["' . $image . '", "' . $link . '", "_self"]';
					++$i;
				}
			}
		}
		switch ($rotate_type) {
			case '0':
			default:
				?>
<div class="random_image">
	<?php if ($link) { ?>
	<a href="<?php echo $link; ?>" target="_self" title="<?php echo $image_name; ?>">
	<?php } ?>
		<img src="<?php echo $image; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="<?php echo $image_name; ?>" />
	<?php if ($link) { ?>
	</a>
	<?php } ?>
</div>
	<?php
		break;
			case '1':
		if (!count($pics)) {
	?>
<div id="<?php echo $slideshow_name; ?>" class="error">
	<?php echo _RANDOM_IMAGE_ERROR; ?>
</div>
	<?php
		} else {
			$pics_str = implode(',', $pics);
			/* подлючаем jQuery plugin - simplegallery с выводом скрипта в текущую позицию */
			mosCommonHTML::loadJqueryPlugins('simplegallery', 1);
			include ($mosConfig_absolute_path . '/modules/mod_random_image/jstSlideShow.php');
	?>
<div id="<?php echo $slideshow_name; ?>"></div>
	<?php
		}
	break;
		}
	}
}