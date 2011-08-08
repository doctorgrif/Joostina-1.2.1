<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

define('PDF_TYPE_NULL', 0);
define('PDF_TYPE_NUMERIC', 1);
define('PDF_TYPE_TOKEN', 2);
define('PDF_TYPE_HEX', 3);
define('PDF_TYPE_STRING', 4);
define('PDF_TYPE_DICTIONARY', 5);
define('PDF_TYPE_ARRAY', 6);
define('PDF_TYPE_OBJDEC', 7);
define('PDF_TYPE_OBJREF', 8);
define('PDF_TYPE_OBJECT', 9);
define('PDF_TYPE_STREAM', 10);

ini_set('auto_detect_line_endings', 1); // Strongly required!

require_once (dirname(__FILE__) . '/fpdf_tpl.php');
require_once (dirname(__FILE__) . '/fpdi_pdf_parser.php');

class fpdi extends fpdf_tpl {
	/**
	 * Actual filename
	 * @var string
	 */
	var $current_filename;

	/**
	 * Parser-Objects
	 * @var array
	 */
	var $parsers = null;

	/**
	 * Current parser
	 * @var object
	 */
	var $current_parser;

	/**
	 * FPDF/FPDI - PDF-Version
	 * @var double
	 */
	var $PDFVersion = 1.3;

	/**
	 * Highest version of imported PDF
	 * @var double
	 */
	var $importVersion = 1.3;

	/**
	 * object stack
	 * @var array
	 */
	var $obj_stack;

	/**
	 * done object stack
	 * @var array
	 */
	var $don_obj_stack;

	/**
	 * Current Object Id.
	 * @var integer
	 */
	var $current_obj_id;

	/**
	 * Constructor
	 * See FPDF-Manual
	 */
	function fpdi($orientation = 'P', $unit = 'mm', $format = 'A4') {
		parent :: fpdf_tpl($orientation, $unit, $format);
	}

	/**
	 * Set a source-file
	 *
	 * @param string $filename a valid filename
	 * @return int number of available pages
	 */
	function setSourceFile($filename) {
		$this->current_filename = $filename;
		$fn = & $this->current_filename;

		$this->parsers[$fn] = new fpdi_pdf_parser($fn, $this);
		$this->current_parser = & $this->parsers[$fn];

		return $this->parsers[$fn]->getPageCount();
	}

	/**
	 * Import a page
	 *
	 * @param int $pageno pagenumber
	 * @return int Index of imported page - to use with fpdf_tpl::useTemplate()
	 */
	function ImportPage($pageno) {
		$fn = & $this->current_filename;

		$this->parsers[$fn]->setPageno($pageno);

		$this->tpl++;
		$this->tpls[$this->tpl] = array ();
		$this->tpls[$this->tpl]['parser'] = & $this->parsers[$fn];
		$this->tpls[$this->tpl]['resources'] = $this->parsers[$fn]->getPageResources();
		$this->tpls[$this->tpl]['buffer'] = $this->parsers[$fn]->getContent();
		// $mediabox holds the dimensions of the source page
		$mediabox = $this->parsers[$fn]->getPageMediaBox($pageno);

		// To build array that can used by pdf_tpl::useTemplate()
		$this->tpls[$this->tpl] = array_merge($this->tpls[$this->tpl], $mediabox);

		return $this->tpl;
	}

	/**
	 * Private method, that rebuilds all needed objects of source files
	 */
	function _putOobjects() {
		if (is_array($this->parsers) && count($this->parsers) > 0) {
			foreach ($this->parsers AS $filename => $p) {
				$this->current_parser = & $this->parsers[$filename];
				if (is_array($this->obj_stack[$filename])) {
					while ($n = key($this->obj_stack[$filename])) {
						$nObj = $this->current_parser->pdf_resolve_object($this->current_parser->c, $this->obj_stack[$filename][$n][1]);

						$this->_newobj($this->obj_stack[$filename][$n][0]);

						if ($nObj[0] == PDF_TYPE_STREAM) {
							$this->pdf_write_value($nObj);
						} else {
							$this->pdf_write_value($nObj[1]);
						}

						$this->_out('endobj');
						$this->obj_stack[$filename][$n] = null; // free memory
						unset ($this->obj_stack[$filename][$n]);
						reset($this->obj_stack[$filename]);
					}
				}
			}
		}
	}

	/**
	 * Rewritten for handling own defined PDF-Versions only needed by FPDF 1.52
	 */
	function _begindoc() {
		//Start document
		$this->state = 1;
	}

	/**
	 * Sets the PDF Version to the highest of imported documents
	 */
	function setVersion() {
		if ($this->importVersion > $this->PDFVersion)
			$this->PDFVersion = $this->importVersion;

		if (!method_exists($this, '_putheader')) {
			$this->buffer = '%PDF-' . $this->PDFVersion . "\n" . $this->buffer;
		}
	}

	/**
	 * rewritten for handling higher PDF Versions
	 */
	function _enddoc() {
		$this->setVersion();
		parent :: _enddoc();
	}

	/**
	 * Put resources
	 */
	function _putresources() {
		$this->_putfonts();
		$this->_putimages();
		$this->_puttemplates();
		$this->_putOobjects();

		//Resource dictionary
		$this->offsets[2] = strlen($this->buffer);
		$this->_out('2 0 obj');
		$this->_out('<</ProcSet [/PDF /Text /ImageB /ImageC /ImageI]');
		$this->_out('/Font <<');
		foreach ($this->fonts as $font)
			$this->_out($this->fontprefix .
			$font['i'] . ' ' . $font['n'] . ' 0 R');
		$this->_out('>>');
		if (count($this->images) || count($this->tpls)) {
			$this->_out('/XObject <<');
			if (count($this->images)) {
				foreach ($this->images as $image)
					$this->_out('/I' .
					$image['i'] . ' ' . $image['n'] . ' 0 R');
			}
			if (count($this->tpls)) {
				foreach ($this->tpls as $tplidx => $tpl)
					$this->_out($this->tplprefix .
					$tplidx . ' ' . $tpl['n'] . ' 0 R');
			}
			$this->_out('>>');
		}
		$this->_out('>>');
		$this->_out('endobj');
	}

	/**
	 * Private Method that writes /XObjects - "Templates"
	 */
	function _puttemplates() {
		$filter = ($this->compress) ? '/Filter /FlateDecode ' : '';
		reset($this->tpls);
		foreach ($this->tpls AS $tplidx => $tpl) {

			$p = ($this->compress) ? gzcompress($tpl['buffer']) : $tpl['buffer'];
			$this->_newobj();
			$this->tpls[$tplidx]['n'] = $this->n;
			$this->_out('<<' . $filter . '/Type /XObject');
			$this->_out('/Subtype /Form');
			$this->_out('/FormType 1');
			$this->_out(sprintf('/BBox [%.2f %.2f %.2f %.2f]', $tpl['x'] * $this->k, ($tpl['h'] - $tpl['y']) * $this->k, $tpl['w'] * $this->k, ($tpl['h'] - $tpl['y'] - $tpl['h']) * $this->k));
			$this->_out('/Resources ');

			if ($tpl['resources']) {
				$this->current_parser = & $tpl['parser'];
				$this->pdf_write_value($tpl['resources']);
			} else {
				$this->_out('<</ProcSet [/PDF /Text /ImageB /ImageC /ImageI]');
				if (count($this->res['tpl'][$tplidx]['fonts'])) {
					$this->_out('/Font <<');
					foreach ($this->res['tpl'][$tplidx]['fonts'] as $font)
						$this->_out($this->fontprefix .
						$font['i'] . ' ' . $font['n'] . ' 0 R');
					$this->_out('>>');
				}
				if (count($this->res['tpl'][$tplidx]['images']) || count($this->res['tpl'][$tplidx]['tpls'])) {
					$this->_out('/XObject <<');
					if (count($this->res['tpl'][$tplidx]['images'])) {
						foreach ($this->res['tpl'][$tplidx]['images'] as $image)
							$this->_out('/I' .
							$image['i'] . ' ' . $image['n'] . ' 0 R');
					}
					if (count($this->res['tpl'][$tplidx]['tpls'])) {
						foreach ($this->res['tpl'][$tplidx]['tpls'] as $i => $tpl)
							$this->_out($this->tplprefix .
							$i . ' ' . $tpl['n'] . ' 0 R');
					}
					$this->_out('>>');
				}
				$this->_out('>>');
			}

			$this->_out('/Length ' . strlen($p) . ' >>');
			$this->_putstream($p);
			$this->_out('endobj');
		}
	}

	/**
	 * Rewritten to handle existing own defined objects
	 */
	function _newobj($obj_id = false, $onlynewobj = false) {
		if (!$obj_id) {
			$obj_id = ++ $this->n;
		}

		//Begin a new object
		if (!$onlynewobj) {
			$this->offsets[$obj_id] = strlen($this->buffer);
			$this->_out($obj_id . ' 0 obj');
			$this->current_obj_id = $obj_id; // for later use with encryption
		}

	}

	/**
	 * Writes a value
	 * Needed to rebuild the source document
	 *
	 * @param mixed $value A PDF-Value. Structure of values see cases in this method
	 */
	function pdf_write_value(& $value) {

		switch ($value[0]) {

			case PDF_TYPE_NUMERIC :
			case PDF_TYPE_TOKEN :
				// A numeric value or a token.
				// Simply output them
				$this->_out($value[1] . " ");
				break;

			case PDF_TYPE_ARRAY :

				// An array. Output the proper structure and move on.

				$this->_out("[", false);
				for ($i = 0; $i < count($value[1]); $i++) {
					$this->pdf_write_value($value[1][$i]);
				}

				$this->_out("]");
				break;

			case PDF_TYPE_DICTIONARY :

				// A dictionary.
				$this->_out("<<", false);

				reset($value[1]);

				while (list ($k, $v) = each($value[1])) {
					$this->_out($k . " ", false);
					$this->pdf_write_value($v);
				}

				$this->_out(">>");
				break;

			case PDF_TYPE_OBJREF :

				// An indirect object reference
				// Fill the object stack if needed
				if (!isset ($this->don_obj_stack[$this->current_parser->filename][$value[1]])) {
					$this->_newobj(false, true);
					$this->obj_stack[$this->current_parser->filename][$value[1]] = array (
						$this->n,
						$value
					);
					$this->don_obj_stack[$this->current_parser->filename][$value[1]] = array (
						$this->n,
						$value
					);
				}
				$objid = $this->don_obj_stack[$this->current_parser->filename][$value[1]][0];

				$this->_out("{$objid} 0 R"); //{$value[2]}
				break;

			case PDF_TYPE_STRING :

				// A string.
				$this->_out('(' . $value[1] . ')');

				break;

			case PDF_TYPE_STREAM :

				// A stream. First, output the
				// stream dictionary, then the
				// stream data itself.
				$this->pdf_write_value($value[1]);
				$this->_out("stream");
				$this->_out($value[2][1]);
				$this->_out("endstream");
				break;
			case PDF_TYPE_HEX :

				$this->_out("<" . $value[1] . ">");
				break;

			case PDF_TYPE_NULL :
				// The null object.

				$this->_out("null");
				break;
		}
	}

	/**
	 * Private Method
	 */
	function _out($s, $ln = true) {
		//Add a line to the document
		if ($this->state == 2) {
			if (!$this->intpl)
				$this->pages[$this->page] .= $s .
				 ($ln == true ? "\n" : '');
			else
				$this->tpls[$this->tpl]['buffer'] .= $s . ($ln == true ? "\n" : '');
		} else {
			$this->buffer .= $s . ($ln == true ? "\n" : '');
		}
	}

	/**
	 * close all files opened by parsers
	 */
	function closeParsers() {
		if ($this->parsers != null) {
			foreach ($this->parsers as $parser) {
				$parser->closeFile();
			}
		}
	}

}

/****************************************************************************
* Software: FPDF_Protection                                                 *
* Version:  1.02                                                            *
* Date:     2005/05/08                                                      *
* Author:   Klemen VODOPIVEC                                                *
* License:  Freeware                                                        *
*                                                                           *
* You may use and modify this software as you wish as stated in original    *
* FPDF package.                                                             *
*                                                                           *
* Thanks: Cpdf (http://www.ros.co.nz/pdf) was my working sample of how to   *
* implement protection in pdf.                                              *
****************************************************************************/
class FPDI_Protection extends FPDI {
	var $encrypted; //whether document is protected
	var $Uvalue; //U entry in pdf document
	var $Ovalue; //O entry in pdf document
	var $Pvalue; //P entry in pdf document
	var $enc_obj_id; //encryption object id
	var $last_rc4_key; //last RC4 key encrypted (cached for optimisation)
	var $last_rc4_key_c; //last RC4 computed key

	function FPDI_Protection($orientation = 'P', $unit = 'mm', $format = 'A4') {
		parent :: FPDI($orientation, $unit, $format);

		$this->encrypted = false;
		$this->last_rc4_key = '';
		$this->padding = "\x28\xBF\x4E\x5E\x4E\x75\x8A\x41\x64\x00\x4E\x56\xFF\xFA\x01\x08" . "\x2E\x2E\x00\xB6\xD0\x68\x3E\x80\x2F\x0C\xA9\xFE\x64\x53\x69\x7A";
	}

	/**
	* Function to set permissions as well as user and owner passwords
	*
	* - permissions is an array with values taken from the following list:
	*   copy, print, modify, annot-forms
	*   If a value is present it means that the permission is granted
	* - If a user password is set, user will be prompted before document is opened
	* - If an owner password is set, document can be opened in privilege mode with no restriction if that password is entered
	*/
	function SetProtection($permissions = array (), $user_pass = '', $owner_pass = null) {
		$options = array (
			'print' => 4,
			'modify' => 8,
			'copy' => 16,
			'annot-forms' => 32
		);
		$protection = 192;
		foreach ($permissions as $permission) {
			if (!isset ($options[$permission]))
				$this->Error('Incorrect permission: ' .
				$permission);
			$protection += $options[$permission];
		}
		if ($owner_pass === null)
			$owner_pass = uniqid(rand());
		$this->encrypted = true;
		$this->_generateencryptionkey($user_pass, $owner_pass, $protection);
	}

	/* Private methods */

	function _putstream($s) {
		if ($this->encrypted) {
			$s = $this->_RC4($this->_objectkey($this->n), $s);
		}
		parent :: _putstream($s);
	}

	function _textstring($s) {
		if ($this->encrypted) {
			$s = $this->_RC4($this->_objectkey($this->n), $s);
		}
		return parent :: _textstring($s);
	}

	/**
	* Compute key depending on object number where the encrypted data is stored
	*/
	function _objectkey($n) {
		return substr($this->_md5_16($this->encryption_key . pack('VXxx', $n)), 0, 10);
	}

	/**
	* Escape special characters
	*/
	function _escape($s) {
		$s = str_replace('\\', '\\\\', $s);
		$s = str_replace(')', '\\)', $s);
		$s = str_replace('(', '\\(', $s);
		$s = str_replace("\r", '\\r', $s);
		return $s;
	}

	function _putresources() {
		parent :: _putresources();
		if ($this->encrypted) {
			$this->_newobj();
			$this->enc_obj_id = $this->n;
			$this->_out('<<');
			$this->_putencryption();
			$this->_out('>>');
			$this->_out('endobj');
		}
	}

	function _putencryption() {
		$this->_out('/Filter /Standard');
		$this->_out('/V 1');
		$this->_out('/R 2');
		$this->_out('/O (' . $this->_escape($this->Ovalue) . ')');
		$this->_out('/U (' . $this->_escape($this->Uvalue) . ')');
		$this->_out('/P ' . $this->Pvalue);
	}

	function _puttrailer() {
		parent :: _puttrailer();
		if ($this->encrypted) {
			$this->_out('/Encrypt ' . $this->enc_obj_id . ' 0 R');
			$this->_out('/ID [()()]');
		}
	}

	/**
	* RC4 is the standard encryption algorithm used in PDF format
	*/
	function _RC4($key, $text) {
		if ($this->last_rc4_key != $key) {
			$k = str_repeat($key, 256 / strlen($key) + 1);
			$rc4 = range(0, 255);
			$j = 0;
			for ($i = 0; $i < 256; $i++) {
				$t = $rc4[$i];
				$j = ($j + $t +ord($k {
					$i })) % 256;
				$rc4[$i] = $rc4[$j];
				$rc4[$j] = $t;
			}
			$this->last_rc4_key = $key;
			$this->last_rc4_key_c = $rc4;
		} else {
			$rc4 = $this->last_rc4_key_c;
		}

		$len = strlen($text);
		$a = 0;
		$b = 0;
		$out = '';
		for ($i = 0; $i < $len; $i++) {
			$a = ($a +1) % 256;
			$t = $rc4[$a];
			$b = ($b + $t) % 256;
			$rc4[$a] = $rc4[$b];
			$rc4[$b] = $t;
			$k = $rc4[($rc4[$a] + $rc4[$b]) % 256];
			$out .= chr(ord($text {
				$i }) ^ $k);
		}

		return $out;
	}

	/**
	* Get MD5 as binary string
	*/
	function _md5_16($string) {
		return pack('H*', md5($string));
	}

	/**
	* Compute O value
	*/
	function _Ovalue($user_pass, $owner_pass) {
		$tmp = $this->_md5_16($owner_pass);
		$owner_RC4_key = substr($tmp, 0, 5);
		return $this->_RC4($owner_RC4_key, $user_pass);
	}

	/**
	* Compute U value
	*/
	function _Uvalue() {
		return $this->_RC4($this->encryption_key, $this->padding);
	}

	/**
	* Compute encryption key
	*/
	function _generateencryptionkey($user_pass, $owner_pass, $protection) {
		// Pad passwords
		// $user_pass = substr($user_pass.$this->padding,0,32);
		$owner_pass = substr($owner_pass . $this->padding, 0, 32);
		// Compute O value
		$this->Ovalue = $this->_Ovalue($user_pass, $owner_pass);
		// Compute encyption key
		$tmp = $this->_md5_16($user_pass . $this->Ovalue . chr($protection) . "\xFF\xFF\xFF");
		$this->encryption_key = substr($tmp, 0, 5);
		// Compute U value
		$this->Uvalue = $this->_Uvalue();
		// Compute P value
		$this->Pvalue = - (($protection ^ 255) + 1);
	}
}
?>