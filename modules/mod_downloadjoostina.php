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
global $mosConfig_absolute_path, $mosConfig_live_site, $moduleclass_sfx;
$joostina12 = $params->get('joostina12');
$joostina13 = $params->get('joostina13');
$joostina12link = $params->get('joostina12link');
$joostina13link = $params->get('joostina13link');
?>
<div id="djmod">
	<div id="dmodblue">
		<div class="dmodarrow"></div>
		<div class="dmodcap"></div>
		<div class="dmodversion">
			<a href="<?php echo $joostina12link; ?>" title="<?php echo _DJOOSTINA_12; ?>">v. <?php echo $joostina12; ?></a>
		</div>
	</div>
	<div id="dmodgreen">
		<div class="dmodarrow"></div>
		<div class="dmodcap"></div>
		<div class="dmodversion">
			<a href="<?php echo $joostina13link; ?>" title="<?php echo _DJOOSTINA_13; ?>">v. <?php echo $joostina13; ?></a>
		</div>
	</div>
</div>