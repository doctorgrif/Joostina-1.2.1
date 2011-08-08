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

class XmapCache {
	/**
	* @return object A function cache object
	*/
	function &getCache( &$sitemap ) {
		global $mosConfig_absolute_path, $mosConfig_cachepath, $mosConfig_cachetime;

		if (class_exists('JFactory')) {
			$cache = &JFactory::getCache('com_xmap_'.$sitemap->id);
			$cache->setCaching($sitemap->usecache);
			$cache->setLifeTime($sitemap->cachelifetime);
		} else {
			$options = array (
				'cacheDir'		=> $mosConfig_cachepath . '/',
				'caching'		=> $sitemap->usecache,
				'defaultGroup'		=> 'com_xmap_'.$sitemap->id,
				'lifeTime'		=> $sitemap->cachelifetime
			);
			if (file_exists($mosConfig_absolute_path.'/includes/joomla.cache.php')) {
				require_once( $mosConfig_absolute_path.'/includes/joomla.cache.php' );
				$cache = new JCache_Lite_Function( $options );
			} else {
				require_once( $mosConfig_absolute_path.'/includes/Cache/Lite.php' );
				require_once( $mosConfig_absolute_path.'/includes/Cache/Lite/Function.php' );
				$cache = new Cache_Lite_Function( $options );
			}
			$cache->_group = $options['defaultGroup'];
		}
		return $cache;
	}
	/**
	* Cleans the cache
	*/
	function cleanCache( &$sitemap ) {
		$cache =&XmapCache::getCache( $sitemap );
		if (class_exists('JFactory')) {
			return $cache->clean();
		} else {
			return $cache->clean( $cache->_group );
		}
	}
}