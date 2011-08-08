<?php
/**
* jstslideshow.php. ������������ ��� ����������� ������������������� js-�������
* @package Joostina
* @subpackage modules
* @copyright Copyright (c) 2007-2009 Joostina Team. All rights reserved.
* @license GNU/GPL, see help/license.php
* @version $Id: jstslideshow.php 2009-01-29 11:05 ZaiSL $;
* @link http://www.joostina.ru/API/subpackage/modules/mod_random_image
* @since File available since Joostina 1.2.0
* Joostina! - ��������� ����������� ����������� ���������������� �� �������� �������� GNU/GPL
* ��� ��������� ���������� � ������������ ����������� � ��������� �� ��������� �����, �������� ���� help/copyright.php.
*/
// ������ ������� �������
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
	images: [ // �������������� ����������� �������
		'/modules/mod_random_image/images/left.gif',
		'/modules/mod_random_image/images/play.gif',
		'/modules/mod_random_image/images/right.gif',
		'/modules/mod_random_image/images/pause.gif'
	],
	imageSpacing: {
		offsetTop:[-4, 0, -4],
		spacing:10
	},
	slideduration: 500
}
var gallery_<?php echo $slideshow_name; ?>=new simpleGallery({
	wrapperid: "<?php echo $slideshow_name; ?>", // ID of main gallery container,
	dimensions: [<?php echo $width; ?>, <?php echo $height; ?>], // ������/������
	imagearray: [<?php echo $pics_str; ?> ],
	autoplay: <?php echo $s_autoplay; ?>,
	persist: false,
	pause: <?php echo $s_pause; ?>, // ����� ����� �������� (msecs)
	fadeduration: <?php echo $s_fadeduration; ?> // transition duration (msecs)
})
</script>