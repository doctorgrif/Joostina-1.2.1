<?php

/**
 * @package Joostina
 * @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
 * @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
 * Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
 * Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
 */

/**
 * Controls output of shared code to the client, prevents duplicates, etc.
 * @package spaw2
 * @subpackage Output
 */
class SpawOutput {

    /**
     * Workaround for "static" class variable under php4
     * @access private
     */
    function &buf() {
        static $buf;

        return $buf;
    }

    /**
     * Adds code to output buffer
     * @param string $name name of the code block
     * @param string $code code for output
     * @static   
     */
    function add($name, $code) {
        $buf = &SpawOutput::buf();
        $buf[$name] = $code;
    }

    /**
     * Returns content of the output
     * @returns string
     * @static   
     */
    function get() {
        $buf = &SpawOutput::buf();
        $str_buf = '';
        foreach ($buf as $code) {
            $str_buf .= $code . "\r\n";
        }
        return $str_buf;
    }

    /**
     * Outputs content of the buffer
     * @static       
     */
    function show() {
        echo SpawOutput::get();
    }

}

?>
