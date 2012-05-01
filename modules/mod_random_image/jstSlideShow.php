<?php
/**
* jstslideshow.php. Используется для подключения сконфигурированного js-скрипта
* @package Joostina
* @subpackage modules
* @copyright Copyright (c) 2007-2009 Joostina Team. All rights reserved.
* @license GNU/GPL, see help/license.php
* @version $Id: jstslideshow.php 2009-01-29 11:05 ZaiSL $;
* @link http://www.joostina.ru/API/subpackage/modules/mod_random_image
* @since File available since Joostina 1.2.0
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
* info:
*	images - Функциональные изображения галереи;
*	wrapperid - ID главного контейнера галереи;
*	dimensions - ширина/высота;
*	pause - пауза между слайдами (msecs);
*	fadeduration - transition duration (msecs)
*/
// запрет прямого доступа
defined('_VALID_MOS') or die();
?>
<script type="text/javascript">
var simpleGallery_navpanel={
	panel:{
		height:'<?php echo $panel_height; ?>',
		opacity:'<?php echo $panel_opacity; ?>',
		paddingTop:'<?php echo $panel_padding; ?>',
		fontStyle:'<?php echo $panel_font; ?>'
	},
	images: [
		'/templates/<?php echo $mainframe->getTemplate(); ?>/i/m/random_image/left.gif',
		'/templates/<?php echo $mainframe->getTemplate(); ?>/i/m/random_image/play.gif',
		'/templates/<?php echo $mainframe->getTemplate(); ?>/i/m/random_image/right.gif',
		'/templates/<?php echo $mainframe->getTemplate(); ?>/i/m/random_image/pause.gif'
	],
	imageSpacing: {
		offsetTop:[-4, 0, -4],
		spacing:10
	},
	slideduration: 500
}
var gallery_<?php echo $slideshow_name; ?>=new simpleGallery({
	wrapperid: '<?php echo $slideshow_name; ?>',
	dimensions: [<?php echo $width; ?>, <?php echo $height; ?>],
	imagearray: [<?php echo $pics_str; ?> ],
	autoplay: <?php echo $s_autoplay; ?>,
	persist: false,
	pause: <?php echo $s_pause; ?>,
	fadeduration: <?php echo $s_fadeduration; ?>
})
</script>