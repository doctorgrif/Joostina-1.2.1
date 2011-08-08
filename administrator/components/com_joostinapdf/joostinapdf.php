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

global $database, $_REQUEST;

require_once (dirname(__FILE__) . '/fpdi.php');
require_once (dirname(__FILE__) . '/joostinapdf_config.php');
require_once (dirname(__FILE__) . '/utils.php');

class TableProps {
	var $v9 = 0;
	var $v10 = -1;
}

class PDF extends FPDI_Protection{
	var $v11 = '';
	var $v12 = 'left';
	var $v13;
	var $v14;
	var $v15;
	var $v16 = 10;
	var $v17 = 'UL';
	var $v18 = 1;
	var $v19 = 0;
	var $v20 = null;
	var $v21 = null;
	var $v22 = null;
	var $v23 = 0;
	var $v24 = 0;
	var $v25 = false;
	var $v26 = false;
	var $v27 = false;
	var $v28 = 0;
	var $v29 = 0;
	var $v30 = 0;
	var $v31 = 0;
	var $v32 = 0;
	var $v33 = false;
	var $v34 = 0;

	var $dbRow = null;

	var $v35 = null;
	var $v36 = 0;
	var $v37 = null;
	var $v38 = 0;

	var $v39;
	var $v40;
	var $v41 = null;
	var $v42;
	var $v43 = false;
	var $v44 = 0;
	var $v45 = true;
	var $v46 = false;
	var $v47= '';

	function PDF($v48 = 'P', $v49 = 'mm', $v50 = 'A4') {
		global $joopdf_pp_Config;
		$this->FPDI_Protection($v48, $v49, $v50);
		$this->v11 = '';
		$this->fontlist = array (
		"arial",
		"times",
		"courier",
		"helvetica",
		"symbol"
		);
		$this->v14 = false;
		$this->v15 = false;
		$this->tableborder = 0;
		$this->tablewidth = '100%';
		$this->tdbegin = false;
		$this->tdwidth = 0;
		$this->tdheight = 0;
		$this->tdalign = "L";
		$this->tdbgcolor = false;

		$this->oldx = 0;
		$this->oldy = 0;
		$this->creator = 'JoostinaPDF';

		$this->v39 = new stack();

		if ($joopdf_pp_Config['promotionFile']) {
			$this->v41 = explode(',', $joopdf_pp_Config['promotionPages']);
		}
	}
	function SetFont($v51, $v52 = null, $v53 = 0) {
		global $joopdf_pp_Config;

		if ($v51 == '') {
			$v51 = $this->FontFamily;
		}
		$v52 = strtoupper($v52);
		if ($v52 == 'IB') {
			$v52 = 'BI';
		}
		if ($joopdf_pp_Config['standardEncoding'] != 'std') {
			$v54 = $v51 . $v52;
			$v55 = $this->_getfontpath() . $v54 . '.php';
			if (!isset ($this->fontlist[$v54])) {
				if (@file_exists($v55)) {
					$this->AddFont($v51, $v52, $v54 . '.php');
					$this->fontlist[$v54] = $v54;
				}
				if (!isset($this->fontlist[$v54])) {
					if (!isset($this->fontlist[$v51])) {
						$this->AddFont($v51, '', $v51 . '.php');
					}
					$this->fontlist[$v54] = $v51;
				}
			}
		}
		if ($v53 < $joopdf_pp_Config['ignoreFontSize']) {
			$v53 = $this->FontSizePt;
		}
		
		parent :: SetFont($v51, $v52, $v53);
	}

	function SetFontPath($v56) {
		global $joopdf_pp_Config;

		parent :: SetFontPath($v56);
		if ($joopdf_pp_Config['standardEncoding'] != 'std') {
			$this->fontlist = array ();
		}
	}

	function WriteHTML($v57) {
		global $joopdf_pp_Config;
		$v57 = str_replace("\n", ' ', $v57);
		$v57 = str_replace("\t", ' ', $v57);
		$v57 = unhtmlentities($v57, $this);
		$v57 = trim($v57);
		$v58 = preg_split('/<(.*)>/U', $v57, -1, PREG_SPLIT_DELIM_CAPTURE);
		if ($this->v35 != null) {
			$this->v35 = & $v58;
		}
		foreach ($v58 as $v59 => $v60) {

			$this->v36 = $v59;

			
			
			if ($v59% 2 == 0) {
				if (!$this->v46) {
					$v61 = stripslashes($v60);
					$v62['&lt;'] = '<';
					$v62['&gt;'] = '>';
					$v61 = strtr($v61, $v62);
					if (strlen($v61) > 0) {
						while (ord($v61 {
							0 }) == 13) {
								$v61 = substr($v61, 1);
							}
							$v61 = strtr($v61, "\xA0", " ");
					}
					if (strlen(trim($v61)) > 0) {

						
						if ($this->v27) {
							$this->NewLine();
							
							$this->v27 = false;
						}
						if ($this->v33) {
							$v61 = ltrim($v61);
							$this->v33 = false;
							
						}
						if ($this->v11 && ($joopdf_pp_Config['showLinks'] == 1)) {
							$this->PutLink($this->v11, $v61);
							
						}
						elseif ($this->v12 == 'center') {
							$this->Cell(0, $this->FontSize, $v61, $this->tableborder, 1, 'C');
							
						}
						elseif (($joopdf_pp_Config['showTables'] == 1) && $this->v25) {
							if ($this->v23> 0) {
								if ($this->v24== 0) {
									$v9 = $this->GetStringWidth($v61);
									$this->v22[$this->v23] = $v9 +5;
								}
								
								if ($this->v24== 1) {
									$this->v22[$this->v23] = $this->rMargin - $this->lMargin;
								}

								
								$v63 = $this->y;
								$this->Write($this->FontSize, $v61);
								$this->x += $this->v22[$this->v23];
								if ($this->y > $this->v30) {
									$this->v30 = $this->y;
								}
								if ($v63 < $this->y) {
									$this->y = $v63;

								}
								
							}
						} else {
							
							$this->Write($this->FontSize, $v61);
						}
						if ($this->FontSize > $this->v32) {
							$this->v32 = $this->FontSize;
						}
						$this->v45 = false;
					} else {
						
					}
				} else {
					
				}
			} else {
				if ($v60[0] == '/') {
					$this->CloseTag(strtoupper(substr($v60, 1)));
				} else {
					
					$v64 = explode(' ', $v60);
					$v65 = null;
					$v66 = strtoupper(array_shift($v64));
					$v67 = array ();
					foreach ($v64 as $v68) {
						if (ereg('^([^=]*)=["\']?([^"\']*)["\']?$', $v68, $v65)) {
							$v67[strtoupper($v65[1])] = $v65[2];
						}
					}
					$this->OpenTag($v66, $v67);

				}
			}
		}
	}

	function OpenTag($v66, $v67) {
		global $mosConfig_live_site, $mosConfig_absolute_path, $joopdf_pp_Config;

		$this->v33 = true;
		if ($v66[strlen($v66) - 1] == '/') {
			$v66 = substr($v66, 0, strlen($v66) - 1);
		}
		
		$this->v39->push($v66);
		if (!isset($v67)) {
			$v67= array();
		}
		switch ($v66) {
			case 'STRONG' :
				$this->SetStyle('B', true);
				break;
			case 'EM' :
				$this->SetStyle('I', true);
				break;
			case 'B' :
			case 'I' :
			case 'U' :
				$this->SetStyle($v66, true);
				break;
			case 'A' :
				$this->v11 = $v67['HREF'];
				break;
			case 'IMG' :
				
				if ($joopdf_pp_Config['showImages'] == 0) {
					break;
				}
				if ($this->x != $this->left) {
					$this->NewLine();
				}

				if (isset ($v67['SRC'])) {
					if (!isset ($v67['WIDTH']))
					$v67['WIDTH'] = 0;
					if (!isset ($v67['HEIGHT']))
					$v67['HEIGHT'] = 0;
					if ($v67['SRC'] { 0 } == "/") {
						$v69 = strpos($mosConfig_live_site, ':');
						$v69+= 3;
						$v69 = strpos($mosConfig_live_site, '/', $v69);
						if ($v69 === FALSE) {
							$v67['SRC'] = $mosConfig_live_site . $v67['SRC'];
						} else {
							$v67['SRC'] = substr($mosConfig_live_site, 0, $v69) . $v67['SRC'];
						}
					}
					if (substr($v67['SRC'], 0, 4) != 'http') {
						if (!@ file_exists($v67['SRC'])) {
							$v70 = $_SERVER['HTTP_REFERER'];
							$v69 = strrpos($v70, '/');
							$v71 = $v67['SRC'];
							$v67['SRC'] = substr($v70, 0, $v69) . '/' . $v67['SRC'];
							if (!@ file_exists($v67['SRC'])) {
								$v67['SRC'] = $mosConfig_live_site . '/' . $v71;
							}
						}
					}
					if (!(strpos($v67['SRC'], $mosConfig_live_site) === FALSE)) {
						$v67['SRC'] = $mosConfig_absolute_path . substr($v67['SRC'], strlen($mosConfig_live_site));
						if (@file_exists($v67['SRC'])) {
							$v67['SRC'] = realpath($v67['SRC']);
						}
					}
					
					$v72 = $joopdf_pp_Config['imageDefaultAlign'];
					if (isset ($v67['ALIGN'])) {
						$v72 = strtolower($v67['ALIGN']);
						$v72 = $v72{
							0 };
					}
					$v73= -1;
					$v74 = px2mm($v67['WIDTH']);
					$v75 = px2mm($v67['HEIGHT']);

					

					if ($v72== 'l') {
						$v73 = -2;
						if ($v74!= 0) {
							$v73 = $this->left;
							if (($v73 + $v74) > $this->right) {
								$v73 = -1;
							}
						}
					}
					elseif ($v72== 'r') {
						$v73 = -3;
						if ($v74!= 0) {
							$v73 = $this->right - $v74;
							if ($v73 < $this->left) {
								$v73= -1;
							}
						}
					}
					$this->transaction('start');
					$this->Image($v67['SRC'], $v73, $this->GetY(), $v74, $v75, '', $this->v11);
					if ($v75 == 0) {
						$v75 = px2mm($this->images[$v67['SRC']]['h']);
					}
					
					$this->x = $this->lMargin;
					$this->y = $this->y + 1 + (mm2px($v75) / $this->k) * $this->imageScale;
					if ($this->y > $this->h - $this->bMargin) {
						$this->transaction('rewind');
						$this->AddPage();
						$this->Image($v67['SRC'], $v73, $this->GetY(), $v74, $v75, '', $this->v11);
						$this->y = $this->y + 1 + (mm2px($v75) / $this->k) * $this->imageScale;
					}
					$this->transaction('commit');
				}
				$this->v39->pop();
				$this->v45 = false;
				break;
			case 'DIV' :
				if (isset ($v67['ALIGN'])) {
					$this->v12 = strtolower($v67['ALIGN']);
				}
				break;
			case 'CENTER' :
				$this->v12 = 'center';
				break;
			case 'BLOCKQUOTE' :
			case 'BR' :
				if ($this->v26) {
					
					$this->v27 = true;
				} else {
					
					if (!$this->v45) {
						$this->NewLine();
					}
				}
				$this->v39->pop();
				break;
			case 'SPAN' :
				break;
			case 'HE1' :
			case 'HE2' :
			case 'HE3' :
			case 'HE4' :
			case 'HE5' :
			case 'HE6' :
				if ($this->x != $this->lMargin) {
					if (!$this->v45) {
						$this->NewLine();
						$this->NewLine();
					}
				}
				break;
			case 'P' :
				if (isset($v67['ALIGN'])) {
					$this->v12 = strtolower($v67['ALIGN']);
				}
				if ($this->v23 == 0) {
					if ($this->v34 != $this->y) {
						if (!$this->v45) {
							$this->NewLine();
						}
					}
					elseif ($this->x > $this->lMargin) {
						if (!$this->v45) {
							$this->NewLine();
						}
					}
				}
				break;
			case 'FONT' :
				if (isset ($v67['COLOR']) and $v67['COLOR'] != '') {
					$v76 = color2hex($v67['COLOR']);
					$v77 = hex2dec($v76);
					$this->SetTextColor($v77['R'], $v77['G'], $v77['B']);
					$this->v15 = true;
				}
				if (isset ($v67['FACE']) and in_array(strtolower($v67['FACE']), $this->fontlist)) {
					$this->SetFont(strtolower($v67['FACE']));
					$this->v14 = true;
				}
				if (isset ($v67['SIZE']) and $v67['SIZE'] != '') {
					$this->SetFont('', '', strtolower($v67['SIZE']));
					$this->v14 = true;
				}
				break;
			case 'HR' :
				if ($v67['WIDTH'] != '') {
					$v9 = $v67['WIDTH'];
				}
				$v78 = $this->lMargin - $this->rMargin;
				if ($v9 > $v78) {
					$v9 = $v78;

				}
				if ($this->x != $this->lMargin) {
					$this->NewLine();
				}
				$x = $this->GetX();
				$y = $this->GetY();
				$this->SetLineWidth(0.4);
				$this->Line($x, $y, $x + $v9, $y);
				$this->SetLineWidth(0.2);
				$this->Ln(2);
				break;

			case 'UL' :
				if ($this->x != $this->lMargin) {
					if (!$this->v45) {
						$this->NewLine();
					}
				}
				$this->v17 = $v66;
				$this->v19 = $this->x;
				break;
			case 'OL' :
				$this->v17 = $v66;
				$this->v18= 1;
				$this->v19 = $this->x;
				break;
			case 'LI' :
				if ($this->v39->next->next->elem == 'LI') {
					
					$this->CloseTag('LI');
				}

				if ($this->v17== 'OL') {
					$v79 = ' ' . $this->v18. ') ';
					$this->v18++;

				} else {
					$v79 = $this->bulletChar;
				}
				$v79 = unhtmlentities($v79, $this);
				$this->x = $this->v19;
				$this->lMargin = $this->v19;
				$this->Write($this->FontSize + 1, $v79);

				$this->lMargin = $this->v19 + $this->GetStringWidth($v79);
				$this->v26 = true;
				break;
			case 'SUP' :
				if ($v67['SUP'] != '') {
					$v80 = $this->FontSizePt;
					$this->SetFont('', '', $v80+2);
					$this->Cell(2, 2, $v67['SUP'], 0, 0, 'L');
				}
				break;

			case 'TABLE' :
				if ($joopdf_pp_Config['showTables'] == 0) {} else {

					if ($v67['BORDER'] != '')
					$this->tableborder = $v67['BORDER'];
					else
					$this->tableborder = 0;
					if ($v67['WIDTH'] != '')
					$this->tablewidth = $v67['WIDTH'];
					else
					$this->tablewidth = '100%';
					if (!$this->v45) {
						$this->NewLine();
					}
					$this->v25 = true;

					$this->v24 = 0;
					unset ($this->v22);}
				break;
			case 'TR' :
				
				if ($joopdf_pp_Config['showTables'] == 0) {} else {
					$this->v23= 0;
					$this->v29 = $this->x;
					$this->v28 = $this->y;
					$this->v30 = 0;
					
				}
				break;
			case 'TH' :
			case 'TD' :
				if ($joopdf_pp_Config['showTables'] == 0) {
					if (!$this->v45) {
						$this->NewLine();
					}
				} else {
					$this->v23 = -1 * $this->v23 + 1;
					
					$v81 = $this->v29;
					for ($v59 = 1; $v59 < $this->v23; $v59++) {
						$v81 += $this->v22[$v59];
					}
					
					$this->SetXY($v81, $this->v28);

					if (($this->v22 == null) || (!isset ($this->v22[$this->v23]))) {
						if ($v67['WIDTH'] != '')
						$this->tdwidth = ($v67['WIDTH'] / 4);
						else
						$this->tdwidth= -25;
						if ($this->v22 == null) {
							$this->v22= array ();
						}
						$this->v22[$this->v23] = $this->tdwidth;
					} else {
						$this->tdwidth = $this->v22[$this->v23];
					}
					if ($v67['HEIGHT'] != '')
					$this->tdheight = ($v67['HEIGHT'] / 6);
					else
					$this->tdheight= 5;
					if ($v67['ALIGN'] != '') {
						$v82 = $v67['ALIGN'];
						if ($v82 == "LEFT")
						$this->tdalign = "L";
						if ($v82 == "CENTER")
						$this->tdalign = "C";
						if ($v82 == "RIGHT")
						$this->tdalign = "R";
					} else
					$this->tdalign = "L";
					if ($v67['BGCOLOR'] != '') {
						$v77 = hex2dec($v67['BGCOLOR']);
						$this->SetFillColor($v77['R'], $v77['G'], $v77['B']);
						$this->tdbgcolor = true;
					}
					$this->tdbegin = true;
				}
				break;
			case 'PAGEBREAK' :
				$this->AddPage();
				break;
			case 'SCRIPT' :
				$this->v46 = true;
				break;
		}
		$this->v33 = true;
	}

	function CloseTag($v66, $v83 = true) {
		global $joopdf_pp_Config;

		
		if ($v83) {
		}
		$this->v39->pop();
		switch ($v66) {
			case 'STRONG' :
			case 'B' :
				$this->SetStyle('B', false);
				break;
			case 'EM' :
			case 'I' :
				$this->SetStyle('I', false);
				break;
			case 'U' :
				$this->SetStyle('U', false);
				break;
			case 'A' :
				$this->v11 = '';
				break;
			case 'SPAN' :
				break;
			case 'HE1' :
			case 'HE2' :
			case 'HE3' :
			case 'HE4' :
			case 'HE5' :
			case 'HE6' :
				$v59 = $v66 {
					2 };
					if (!$this->v45) {
						$this->NewLine();
						$this->Ln($joopdf_pp_Config['H' . $v59 . 'FormatSpace'] / $this->k);
						
					}
					$this->v45 = true;
					break;
			case 'P' :
				if (!$this->v45) {
					$this->NewLine();
				}
				$this->v34 = $this->y;
			case 'DIV' :
				$this->v12 = 'left';
				if (!$this->v45) {
					$this->NewLine();
				}
				$this->v34 = $this->y;
				break;
			case 'CENTER' :
				$this->v12 = '';
				break;
			case 'FONT' :
				if ($this->v15 == true) {
					$this->SetTextColor(0);
				}
				if ($this->v14) {
					$this->SetFont($joopdf_pp_Config["standardFont"], '', $joopdf_pp_Config["standardSize"]);
					$this->v14 = false;
				}
				break;
			case 'SUP' :
				break;
			case 'TH' :
			case 'TD' :

				if ($joopdf_pp_Config['showTables'] == 0) {
					if (!$this->v45) {
						$this->NewLine();
					}
				} else {
					
					$this->tdbegin = false;
					$this->tdwidth = 0;
					$this->tdheight = 0;
					$this->tdalign = "L";
					$this->tdbgcolor = false;
					$this->v23 = -1 * $this->v23;
					if ($this->y > $this->v30) {
						$this->v30 = $this->y;
					}
					$this->y = $this->v28;
					
				}
				break;
			case 'TR' :
				$this->v24 = -1 * $this->v23;
				
				if ($this->y < $this->v30) {
					$this->y = $this->v30;
				}
				if ($joopdf_pp_Config['showTables'] == 0) {
					if (!$this->v45) {
						$this->NewLine();
					}
				} else {
					$this->v23= 0;
					$this->SetXY($this->v29, $this->v30);

					}
				break;
			case 'TABLE' :
				$this->tableborder = 0;
				$this->tablewidth = '100%';
				$this->v25 = false;
				break;
			case 'OL' :
			case 'UL' :
				$this->x = $this->v19;
				$this->lMargin = $this->v19;
				$this->v17 = '';
				$this->NewLine();
				$this->v33 = true;
				break;
			case 'LI' :
				if ($this->y < $this->v30) {
					$this->y = $this->v30;
				} else {
					$this->NewLine();
				}
				$this->v26 = false;
				$this->v27 = false;
				break;
			case 'SCRIPT' :
				$this->v46 = false;
				break;
		}
	}

	function SetStyle($v66, $v84) {
		$v52 = $this->FontStyle;
		if ($v84) {
			if (stripos($v52, $v66) === false) {
				$v52 .= $v66;
			}
		} else {
			if (stripos($v52, $v66) !== false) {
				$v52 = str_replace($v66, '', $v52);
			}
		}
		$this->SetFont('', $v52);
	}

	function PutLink($v85, $v86) {
		$this->SetTextColor(0, 0, 255);
		$v87 = $this->underline;
		$this->SetStyle('U', true);
		$this->Write($this->FontSize, $v86, $v85);
		$this->SetStyle('U', false);
		$this->underline = $v87;
		$this->SetTextColor(0);
	}
	function Header() {
		global $joopdf_pp_Config;

		if ($this->v43 != $this->PageNo()) {
			$v88 = $this->x;
			$v89 = $this->y;
			$v51 = $this->FontFamily;
			$v52 = $this->FontStyle;
			$v90 = $this->FontSizePt;
			$v91 = $this->TextColor;
			$v14 = $this->v14;
			$v92 = $this->v11;
			$this->v11= '';
			$this->SetX($joopdf_pp_Config['headerXpos']);
			$this->SetY($joopdf_pp_Config['headerYpos']);
			$v93 = $this->convertFontToFamilyStyle($joopdf_pp_Config['standardFont']);
			$v94 = $joopdf_pp_Config['standardSize'];
			$this->SetFont($v93['family'], $v93['style'], $v94);
			$this->SetTextColor(0);
			$v95 = $this->makeReplacementsForHeaderAndFooter($joopdf_pp_Config['headerHtmlFormat']);
			$v96 = $this->tableborder;
			$this->tableborder = 0;

			$v26 = $this->v26;
			$this->v26 = false;
			$v25 = $this->v25;
			$v25 = false;
			$v27 = $this->v27;
			$this->v27 = false;
			$v39 = $this->v39;
			$this->v39 = new stack();
			$this->v37 = & $this->v35;
			$this->v38 = $this->v36;

			$this->WriteHTML($v95);
			$this->SetX($v88);
			$this->SetY($v89);
			$this->SetFont($v51, $v52, $v90);
			$this->TextColor = $v91;
			$this->v14 = $v14;
			$this->v11 = $v92;
			$this->tableborder = $v96;
			$this->v26 = $v26;
			$this->v25 = $v25;
			$this->v27 = $v27;
			$this->v39 = $v39;
		}

	}
	function Footer() {
		global $joopdf_pp_Config;

		if ($this->v43 != $this->PageNo()) {
			$v88 = $this->x;
			$v89 = $this->y;
			$v51 = $this->FontFamily;
			$v52 = $this->FontStyle;
			$v90 = $this->FontSizePt;
			$v91 = $this->TextColor;
			$v14 = $this->v14;
			$v92 = $this->v11;
			$this->v11= '';
			$this->SetX($joopdf_pp_Config['footerXpos']);
			$this->SetY($joopdf_pp_Config['footerYpos']);
			$v93 = $this->convertFontToFamilyStyle($joopdf_pp_Config['standardFont']);
			$v94 = $joopdf_pp_Config['standardSize'];
			$this->SetFont($v93['family'], $v93['style'], $v94);
			$this->SetTextColor(0);
			$v97 = $this->makeReplacementsForHeaderAndFooter($joopdf_pp_Config['footerHtmlFormat']);
			$v96 = $this->tableborder;
			$this->tableborder = 0;

			$v26 = $this->v26;
			$this->v26 = false;
			$v25 = $this->v25;
			$v25 = false;
			$v27 = $this->v27;
			$this->v27 = false;
			$v39 = $this->v39;
			$this->v39 = new stack();

			$this->WriteHTML($v97);
			$this->SetX($v88);
			$this->SetY($v89);
			$this->SetFont($v51, $v52, $v90);
			$this->TextColor = $v91;
			$this->v14 = $v14;
			$this->v11 = $v92;
			$this->tableborder = $v96;
			$this->v26 = $v26;
			$this->v25 = $v25;
			$this->v27 = $v27;
			$this->v39 = $v39;
			$this->v35 = & $this->v37;
			$this->v36 = $this->v38;
		}
	}

	function AddPromo() {
		global $joopdf_pp_Config;
		$v98 = rand(1, count($this->v42));

		$this->v43 = $this->PageNo() + 1;
		parent :: AddPage('');
		
		$this->useTemplate($this->v42[$v98-1]);

	}
	function AddPage($v48 = '') {
		global $joopdf_pp_Config;

		$v99 = 1;
		if ($this->v41 != null) {
			if (array_search($this->PageNo() + 1, $this->v41) !== FALSE) {
				
				
				
				$this->AddPromo();
				$v99= 2;
			}
		}
		parent :: AddPage($v48);
		
		if ($this->PageNo() == $v99) {

			if ($this->v20 != NULL) {
				$this->useTemplate($this->v20);
			}
			$this->SetMargins($joopdf_pp_Config['marginLeftFirstpage'], $joopdf_pp_Config['marginTopFirstpage'], $joopdf_pp_Config['marginRightFirstpage']);
			$this->SetX($joopdf_pp_Config['marginLeftFirstpage']);
			$this->SetY($joopdf_pp_Config['marginTopFirstpage']);
		} else {
			if ($this->v21 != NULL) {
				$this->useTemplate($this->v21);
			}
			$this->SetMargins($joopdf_pp_Config['marginLeftOtherpages'], $joopdf_pp_Config['marginTopOtherpages'], $joopdf_pp_Config['marginRightOtherpages']);
			$this->SetX($joopdf_pp_Config['marginLeftOtherpages']);
			$this->SetY($joopdf_pp_Config['marginTopOtherpages']);
		}
		if ($this->v28 != 0) {
			$this->v28 = $this->y;
			$this->v30 = $this->y;
		}
		$this->v44 = 0;
		$this->v45 = true;
	}

	function NewLine() {
		if ($this->x == $this->lMargin) {
			$this->v45 = true;
		} else {
			$this->v45 = false;
		}
		$this->Ln($this->v32 + 1);
		$this->SetX($this->lMargin);
		$this->v32 = $this->FontSize;
		$this->v44 = $this->y;
	}

	function convertFontToFamilyStyle($v93) {
		$v100 = array ();
		if ($v93 == '') {
			$v100['family'] = 'helvetica';
			$v100['style'] = '';
		} else {
			$v52= '';
			do {
				$v101 = substr($v93, strlen($v93) - 1);
				$v102 = false;
				switch ($v101) {
					case 'B' :
					case 'I' :
					case 'U' :
						$v52 .= $v101;
						$v93 = substr($v93, 0, strlen($v93) - 1);
						break;
					default :
						$v102 = true;
						break;
				}

			} while (!$v102);
			$v100['family'] = $v93;
			$v100['style'] = $v52;
		}
		return $v100;
	}

	function makeReplacementsForHeaderAndFooter($v103) {
		global $mainframe, $mosConfig_sitename, $mosConfig_live_site, $_SERVER;

		if (!isset ($_SERVER['REQUEST_URI'])) {
			$v104 = explode("/", $_SERVER['PHP_SELF']);
			$_SERVER['REQUEST_URI'] = "/" . $v104[count($v104) - 1];
			if ($_SERVER['argv'][0] != "")
			$_SERVER['REQUEST_URI'] .= "?" . $_SERVER['argv'][0];
		}
		$v105 = $v103;
		$v105 = str_replace('{title}', $this->dbRow->title, $v105);
		$v105 = str_replace('{sitename}', $mosConfig_sitename, $v105);
		$v105 = str_replace('{siteurl}', $mosConfig_live_site . '/', $v105);
		$v105 = str_replace('{currenturl}', $mosConfig_live_site . $_SERVER['REQUEST_URI'], $v105);

		$v105 = str_replace('{pageno}', $this->PageNo(), $v105);
		$v106 = strpos($v105, '{date');
		if ($v106) {
			$v107 = strpos($v105, '}', $v106);
			if ($v107) {
				$v108 = "Y-M-d";
				if (substr($v105, $v106 +5, 1) == "|") {
					$v108 = substr($v105, $v106 +6, $v107 - $v106 -6);
				}
				$v109 = $this->dbRow->modified;
				if (($v109 == null) || ($v109 == '')) {
					$v109 = $this->dbRow->created;
				}
				$v109 = trim($v109);
				if (($v109 == null) || ($v109 == '')) {
					$v110 = '';
				} else {
					$v110 = date($v108, strtotime($v109));
				}
				$v111 = substr($v105, 0, $v106) . $v110 . substr($v105, $v107 +1);
				$v105 = $v111;
			}
		}
		$v106 = strpos($v105, '{createdate');
		if ($v106) {
			$v107 = strpos($v105, '}', $v106);
			if ($v107) {
				$v108 = "Y-M-d";
				if (substr($v105, $v106 +11, 1) == "|") {
					$v108 = substr($v105, $v106 +12, $v107 - $v106 -12);
				}
				$v112 = trim($this->dbRow->created);
				if (($v112 == null) || ($v112 == '')) {
					$v110 = '';
				} else {
					$v110 = date($v108, strtotime($v112));
				}

				$v111 = substr($v105, 0, $v106) . $v110 . substr($v105, $v107 +1);
				$v105 = $v111;
			}
		}
		$v106 = strpos($v105, '{currentdate');
		if ($v106) {
			$v107 = strpos($v105, '}', $v106);
			if ($v107) {
				$v108 = "Y-M-d";
				if (substr($v105, $v106 +12, 1) == "|") {
					$v108 = substr($v105, $v106 +13, $v107 - $v106 -13);
				}
				$v110 = date($v108);
				$v111 = substr($v105, 0, $v106) . $v110 . substr($v105, $v107 +1);
				$v105 = $v111;
			}
		}
		if (strpos($v105, '{author}')) {
			$v105 = str_replace('{author}', $this->dbRow->created_by_alias, $v105);
		}

		return $v105;
	}

	function setDBRow(& $v113) {
		$this->dbRow = & $v113;
	}
	function transaction($v114) {
		switch ($v114) {
			case 'start' :
				$v115 = get_object_vars($this);
				$this->v47 = $v115;
				unset ($v115);
				break;
			case 'commit' :
				if (is_array($this->v47) && isset ($this->v47['checkpoint'])) {
					$v111 = $this->v47['checkpoint'];
					$this->v47 = $v111;
					unset ($v111);
				} else {
					$this->v47= '';
				}
				break;
			case 'rewind' :
				if (is_array($this->v47)) {
					$v111 = $this->v47;
					foreach ($v111 as $k => $v68) {
						if ($k != 'checkpoint') {
							$this-> $k = $v68;
						}
					}
					unset ($v111);
				}
				break;
			case 'abort' :
				if (is_array($this->v47)) {
					$v111 = $this->v47;
					foreach ($v111 as $k => $v68) {
						$this-> $k = $v68;
					}
					unset ($v111);
				}
				break;
		}

	}
}

class TableData {
	var $v9;
	var $v116;
	var $v117;
	var $v118;

	function TableData($v116 = 0, $v9 = -1, $v118 = 0) {
		$this->v9 = $v9;
		$this->v116 = $v116;
		$this->v118 = $v118;
		$this->v117 = array ();
	}

	function addColumn($v9 = -1) {
		$this->v117[] = $v9;
	}

	function getColumnCount() {
		return size($this->v117);
	}

	function calcColumnWidths() {
		if (size($this->v117) > 0) {
			if (size($this->v117) == 1) {
				$this->v117 = $this->v9;
			} else {
				$v119 = $this->v9;
				$v120= 0;
				for ($v59 = 0; $v59 < sizeof($this->v117); $v59++) {
					if ($this->v117[$v59] > 0) {
						$v119 -= $this->v117[$v59];
					} else {
						$v120++;
					}
				}
				if ($v120 > 0) {
					$v121 = $v119 / $v120;
					for ($v59 = 0; $v59 < sizeof($this->v117); $v59++) {
						if ($this->v117[$v59] == -1) {
							$this->v117[$v59] = $v121;
						}
					}
				}
			}
		}
	}
}
class stacknode {
	var $elem;
	var $next;
}
class stack {
	var $next;
	function pop() {
		$v122 = $this->next->elem;
		$this->next = $this->next->next;
		return $v122;
	}
	function push($v123) {
		$v124 = new stacknode;
		$v124->elem = $v123;
		$v124->next = $this->next;
		$this->next = $v124;
	}
	function peek() {
		$v122 = $this->next->elem;
		return $v122;
	}
	function toString() {

		$v125 = $this->next;
		$v115 = 'Stack=';
		while ($v125 != NULL) {
			$v115 .= ',' . $v125->elem;
			$v125 = $v125->next;
		}
		return $v115;
	}
	function stack() {
		$this->next = NULL;
	}
}
function buildPDFandCache(& $v113, $v126) {
	global $_MAMBOTS, $mosConfig_live_site, $mosConfig_sitename, $mosConfig_offset, $mosConfig_hideCreateDate, $mosConfig_hideAuthor, $mosConfig_hideModifyDate;
	global $joopdf_pp_Config, $v127;
	$v128 = $joopdf_pp_Config['marginTopFirstpage'];
	$v129 = $joopdf_pp_Config['marginBottomFirstpage'];
	$v130 = $joopdf_pp_Config['marginLeftFirstpage'];
	$v131 = $joopdf_pp_Config['marginRightFirstpage'];
	$v132 = new PDF();
	$v132->enableTrace = false;
	$v132->setFontpath(dirname(__FILE__) . '/font.' . $joopdf_pp_Config['standardEncoding'] . '/');
	$v132->SetTopMargin($v128);
	$v132->SetAutoPageBreak(true, $v129);
	$v132->SetLeftMargin($v130);
	$v132->SetRightMargin($v131);
	$v132->AliasNbPages= '{numberofpages}';
	$v132->imageScale = 0.75;
	if ($v113 != null) {
		$v132->setDBRow($v113);
	}
	$v132->bulletChar = $joopdf_pp_Config['bulletChar'];

	if ($joopdf_pp_Config['templateFile']) {
		$v133 = $v132->setSourceFile('administrator/components/com_joostinapdf/presets/' . $joopdf_pp_Config['templateFile']);
		if ($joopdf_pp_Config['templatePageNoForFirst'] > $v133) {
			$joopdf_pp_Config['templatePageNoForFirst'] = $v133;
		}
		$v134 = $v132->ImportPage($joopdf_pp_Config['templatePageNoForFirst']);
		if ($joopdf_pp_Config['templatePageNoForOther'] > $v133) {
			$joopdf_pp_Config['templatePageNoForOther'] = $v133;
		}
		$v135 = $v132->ImportPage($joopdf_pp_Config['templatePageNoForOther']);
		$v132->v20 = $v134;
		$v132->v21 = $v135;
		
	} else {
		$v132->v20 = NULL;
		$v132->v21 = NULL;
		
	}

	if ($joopdf_pp_Config['promotionFile']) {
		$v136 = $v132->setSourceFile('administrator/components/com_joostinapdf/presets/' . $joopdf_pp_Config['promotionFile']);
		$v132->v42= array ();
		for ($v59 = 1; $v59 <= $v136; $v59++) {
			$v132->v42[] = $v132->ImportPage($v59);
		}
		
	}

	$v132->AddPage();

	if ($v113 != null) {
		$v93 = $v132->convertFontToFamilyStyle($joopdf_pp_Config['standardTitleFont']);
		$v94 = $joopdf_pp_Config['standardTitleSize'];

		$v137 = '<font face="' . $v93['family'] . '" size="' . $v94 . '" color="black">' .
		$v132->makeReplacementsForHeaderAndFooter($joopdf_pp_Config['titleHtmlFormat']) . '</font>';
		if ($v132->enableTrace) {
			
		}
		$v93 = $v132->convertFontToFamilyStyle($joopdf_pp_Config['standardFont']);
		$v94 = $joopdf_pp_Config['standardSize'];
		$v132->SetFont($v93['family'], $v93['style'], $v94);
		$v138 = explode("\n", $v113->images);
		$v57 = replaceMosImages($v113->introtext . $v113->fulltext, $v138, $joopdf_pp_Config['showImages']);
		$v57 = $v137 . '<font face="' . $v93['family'] . '" size="' . $v94 . '" color="black">' . $v57. '</font>';
		$v139 = substr($joopdf_pp_Config['customContentReplacements'], 1, strlen($joopdf_pp_Config['customContentReplacements']) - 2);
		$v140 = explode('","', $v139);
		foreach ($v140 as $v141) {
			$v142 = explode('"="', $v141);
			$v143 = '';
			if (count($v142)>1) {
				$v143 = str_replace('\"', '"', $v142[1]);
			}
			$v144 = $v142[0];
			if (strpos($v144, '*') !== false) {
				$v59 = strpos($v144, '*');
				$v145 = substr($v144, 0, $v59);
				$v146 = substr($v144, $v59 +1);
				$v57 = replaceTags($v57, $v145, $v146, $v142[1]);
			} else {
				$v57 = str_ireplace($v144, $v143, $v57);
			}
		}
		$v147 = array (
		'H1Format' => '<h1,</h1',
		'H2Format' => '<h2,</h2',
		'H3Format' => '<h3,</h3',
		'H4Format' => '<h4,</h4',
		'H5Format' => '<h5,</h5',
		'H6Format' => '<h6,</h6'
		);
		$v59 = 1;
		foreach ($v147 as $v50 => $v148) {
			$v149 = stripos($joopdf_pp_Config[$v50], '{heading}');
			if ($v149 >= 0) {
				$v66 = explode(',', $v148);
				$v150 = substr($joopdf_pp_Config[$v50], 0, $v149);
				$v151 = substr($joopdf_pp_Config[$v50], $v149 +9);
				$v57 = replaceTags($v57, $v66[0], '>', '<HE' . $v59 . '>' . $v150);
				$v57 = replaceTags($v57, $v66[1], '>', $v151 . '</HE' . $v59 . '>');
			}
			$v59+= 1;
		}
		$v57 = replaceTags($v57, '{mospagebreak', '}', '<PAGEBREAK/>');
		$v57 = replaceTags($v57, '<!--', '-->', '');
	} else {
		for ($v59 = 0; $v59 < 256; $v59++) {
			$v57 .= '[' . $v59 . ']=[&#' . $v59. ';]';
		}
	}
	$v132->WriteHTML($v57);
	if ($v132->v41 != null) {
		if (in_array('last', $v132->v41)) {
			
			$v132->AddPromo();
		}
	}

	$v132->writeTrace();
	$v132->Output($v113->title . ".pdf", "I");
	if ($v126 != null) {
		$v132->Output($v126, "F");
	}
	$v132->closeParsers();
}

function replaceMosImages($v57, $v138, $v152 = false) {
	global $mosConfig_absolute_path;
	$v57 = ' ' . $v57;
	$v153 = array ();
	$v154 = '/{mosimage\s*.*?}/i';
	preg_match_all($v154, $v57, $v153);
	$v155= 0;
	$v156 = count($v153[0]);
	if ($v156> 0) {
		$v69 = strpos($v57, "{mosimage");
		while ($v69 > 0) {
			if ($v155 < count($v138)) {
				$v157 = explode("|", $v138[$v155++]);
			}
			$v158 = strpos($v57, '}', $v69) + 1;
			if (!$v152) {
				$v159 = substr($v57, 0, $v69) . '' . substr($v57, $v158);
			} else {
				$v159 = substr($v57, 0, $v69) . '<img src="' . $mosConfig_absolute_path . '/images/stories/' . $v157[0] . '" />' . substr($v57, $v158);
			}
			$v57 = $v159;
			$v69 = strpos($v57, "{mosimage");
		}
	}
	return substr($v57, 1);
}

function replaceTags($v57, $v160, $v161, $v162) {
	$v69 = stripos($v57, $v160);
	while ($v69 !== false) {
		$v158 = stripos($v57, $v161, $v69) + strlen($v161);
		if ($v158 !== false) {
			$v159 = substr($v57, 0, $v69) . $v162 . substr($v57, $v158);
			$v57 = $v159;
		}
		$v69 = stripos($v57, $v160, $v69 +1);
	}
	return $v57;
}
function unichr($v163) {

	return chr($v163);
}
function unhtmlentities($v164, $v132) {

	$v165 = $v164;

	$v166 = array (
	'&#128;' => '&euro;',
	'&#130;' => '&sbquo;',
	'&#131;' => '&fnof;',
	'&#132;' => '&bdquo;',
	'&#133;' => '&hellip;',
	'&#134;' => '&dagger;',
	'&#135;' => '&Dagger;',
	'&#136;' => '&circ;',
	'&#137;' => '&permil;',
	'&#138;' => '&Scaron;',
	'&#139;' => '&lsaquo;',
	'&#140;' => '&OElig;',
	'&#145;' => '&lsquo;',
	'&#146;' => '&rsquo;',
	'&#147;' => '&ldquo;',
	'&#148;' => '&rdquo;',
	'&#149;' => '&bull;',
	'&#151;' => '&mdash;',
	'&#152;' => '&tilde;',
	'&#153;' => '&trade;',
	'&#154;' => '&scaron;',
	'&#155;' => '&rsaquo;',
	'&#156;' => '&oelig;',
	'&#159;' => '&Yuml;',


	);
	$v62 = array_flip($v166);
	$v165 = strtr($v165, $v62);

	$v165 = preg_replace('~&#x([0-9a-f]+);~ei', 'unichr(hexdec("\\1"))', $v165);
	$v165 = preg_replace('~&#([0-9]+);~e', 'unichr(\\1)', $v165);
	$v62 = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
	$v62 = array_flip($v62);
	$v62['&lt;'] = '&lt;';
	$v62['&gt;'] = '&gt;';
	return strtr($v165, $v62);

}

function getModifiedField($v167) {
	global $database, $my;

	$query = "select id, modified from #__content where state = 1 and (access = 0 or access = " . $my->gid . ") and id = " . $v167;

	$database->setQuery($query);
	$v113 = $database->loadRow();

	if ($database->getErrorNum()) {
		return '00000000000000';
	}
	if ($v113 == null) {
		return '00000000000000';
	}

	$modified = $v113[1];

	if ($modified != null) {
		$modified = str_replace('-', '', $modified);
		$modified = str_replace(' ', '', $modified);
		$modified = str_replace(':', '', $modified);
	} else {
		$modified = '00000000000000';
	}
	return $modified;
}
function getCacheFilenameOnId($v167) {
	global $joopdf_pp_Config;

	$v168 = $joopdf_pp_Config['cacheStrategy'];
	$v169 = 'joostinapdf' . $joopdf_pp_Config['cacheNameSeparator'] . $v167 . $joopdf_pp_Config['cacheNameSeparator'];
	$v2 = searchdir($joopdf_pp_Config['cacheDir'], $v169, 1, 'FILES');
	if (count($v2) == 1) {
		$v127 = explode($joopdf_pp_Config['cacheNameSeparator'], $v2[0]);
		switch ($v168) {
			case 'd' :
				if (($v127[3] != null) && (strlen($v127[3]) > 8)) {
					$v170 = substr($v127[3], 0, 8);
					$v171 = date("Ymd");
					if ($v171 == $v170) {
						return $v2[0];
					}
				}
				break;
			case 'x' :
				$v156 = $v127[4];
				if ($v156 < $joopdf_pp_Config['cacheInvalidateTimes']) {
					$v172 = true;
					$v156++;
					$v127[4] = $v156;
					$v173 = implode($joopdf_pp_Config['cacheNameSeparator'], $v127);
					@ rename($v2[0], $v173);
					$v173 = implode($joopdf_pp_Config['cacheNameSeparator'], $v127);
					return $v173;
				}
				break;
			case 'm' :
				$modified = getModifiedField($v167);
				if ($modified == $v127[2]) {
					return $v2[0];
				}
				break;
			case 'md' :
				if (($v127[3] != null) && (strlen($v127[3]) > 8)) {
					$v170 = substr($v127[3], 0, 8);
					$v171 = date("Ymd");
					$modified = getModifiedField($v167);
					if (($modified == $v127[2]) && ($v171 == $v170)) {
						return $v2[0];
					}
				}
				break;
		}
	}

	return null;
}

function getCacheFilename($v167, & $v113) {
	global $joopdf_pp_Config;

	if ($v113 == null) {
		return null;
	}
	$v169 = 'joostinapdf' . $joopdf_pp_Config['cacheNameSeparator'] . $v167 . $joopdf_pp_Config['cacheNameSeparator'];

	$v2 = searchdir($joopdf_pp_Config['cacheDir'], $v169, 1, 'FILES');
	if (count($v2) > 0) {
		for ($v59 = 0; $v59 < sizeof($v2); $v59++) {
			@ unlink($v2[$v59]);
		}
	}
	$v156 = 0;
	$modified = getModifiedField($v167);
	$v174 = $joopdf_pp_Config['cacheDir'] . '/' . $v169 . $modified . $joopdf_pp_Config['cacheNameSeparator'] . date("YmdHis") . $joopdf_pp_Config['cacheNameSeparator'] . $v156 . $joopdf_pp_Config['cacheNameSeparator'] . 'tmp.pdf';
	return $v174;
}

function handleRequest() {
	global $database, $my, $joopdf_pp_Config;
	$v167 = intval(mosGetParam($_REQUEST, 'id', 1));
	$v113 = null;
	$v174 = null;
	if ($v167>= 0) {
		if ($joopdf_pp_Config['cacheEnable'] == 1) {
			$v174 = getCacheFilenameOnId($v167);
			if ($v174 != null) {
				$v53 = filesize($v174);
				if ($v53 > 0) {
					header('Content-Type: application/pdf');
					header('Content-Length: ' . $v53);
					header('Content-disposition: inline; filename="joostinapdf.pdf"');
					$v8 = fopen($v174, "r");
					$v115 = fread($v8, $v53);
					fclose($v8);
					echo $v115;
					return;
				}
			}
		}
		$v113 = new mosContent($database);
		$v113->load($v167);
		if ($v113->state!= 1) {
			header("HTTP/1.0 404 Not Found");
			echo _JOOPDF_PP_ART_N_FOUND;
			exit ();
		}

		if ($v113->access!= 0) {
			if ($v113->access > $my->gid) {
				header("HTTP/1.0 404 Not Found");
				echo _JOOPDF_PP_ART_N_FOUND;
				exit ();
			}
		}
		$v174 = null;
		if ($joopdf_pp_Config['cacheEnable'] == 1) {
			$v174 = getCacheFilename($v167, $v113);
			$v175 = new mosUser($database);
			$v175->load($v113->created_by);
			$v113->author = $v175->name;
			$v113->usertype = $v175->usertype;

		}
	}
	buildPDFandCache($v113, $v174);
}
?>