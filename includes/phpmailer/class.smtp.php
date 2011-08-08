<?php
/**
* @package Joostina
* @copyright Авторские права (C) 2008 Joostina team. Все права защищены.
* @license Лицензия http://www.gnu.org/licenses/gpl-2.0.htm GNU/GPL, или help/license.php
* Joostina! - свободное программное обеспечение распространяемое по условиям лицензии GNU/GPL
* Для получения информации о используемых расширениях и замечаний об авторском праве, смотрите файл help/copyright.php.
*/

defined('_VALID_MOS') or die();

	/*
	* STMP is rfc 821 compliant and implements all the rfc 821 SMTP commands except TURN which will always return a not implemented
	* error. SMTP also provides some utility methods for sending mail to an SMTP server.
	*/
class SMTP {
	var $SMTP_PORT = 25;
	var $CRLF = "\r\n";
	var $do_debug;
	var $smtp_conn;
	var $error;
	var $helo_rply;
	function SMTP() {
		$this->smtp_conn = 0;
		$this->error = null;
		$this->helo_rply = null;
		$this->do_debug = 0;
	}
	function Connect($host,$port = 0,$tval = 30) {
		$this->error = null;
		$errno = $errstr = null;
		if($this->connected()) {
			$this->error = array("error" => "Already connected to a server");
			return false;
		}
		if(empty($port)) {
			$port = $this->SMTP_PORT;
		}
		$this->smtp_conn = fsockopen($host,$port,$errno,$errstr,$tval);
		if(empty($this->smtp_conn)) {
			$this->error = array("error" => "Failed to connect to server","errno" => $errno,
				"errstr" => $errstr);
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": $errstr ($errno)".$this->CRLF;
			}
			return false;
		}
		if(substr(PHP_OS,0,3) != "WIN")
			socket_set_timeout($this->smtp_conn,$tval,0);
		$announce = $this->get_lines();
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$announce;
		}
		return true;
	}
	function Authenticate($username,$password) {
		fputs($this->smtp_conn,"AUTH LOGIN".$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($code != 334) {
			$this->error = array("error" => "AUTH not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		fputs($this->smtp_conn,base64_encode($username).$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($code != 334) {
			$this->error = array("error" => "Username not accepted from server","smtp_code" =>
				$code,"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		fputs($this->smtp_conn,base64_encode($password).$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($code != 235) {
			$this->error = array("error" => "Password not accepted from server","smtp_code" =>
				$code,"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return true;
	}


		/*CONNECTION FUNCTIONS*/

		/*
		 * Connect($host, $port=0, $tval=30)
		 *
		 * Connect to the server specified on the port specified.
		 * If the port is not specified use the default SMTP_PORT.
		 * If tval is specified then a connection will try and be
		 * established with the server for that number of seconds.
		 * If tval is not specified the default is 30 seconds to
		 * try on the connection.
		 *
		 * SMTP CODE SUCCESS: 220
		 * SMTP CODE FAILURE: 421
		 */
	function Connected() {
		if(!empty($this->smtp_conn)) {
			$sock_status = socket_get_status($this->smtp_conn);
			if($sock_status["eof"]) {
				if($this->do_debug >= 1) {
					echo "SMTP -> NOTICE:".$this->CRLF."EOF caught while checking if connected";
				}
				$this->Close();
				return false;
			}
			return true;
		}
		return false;
	}
	function Close() {
		$this->error = null;
		$this->helo_rply = null;
		if(!empty($this->smtp_conn)) {
			fclose($this->smtp_conn);
			$this->smtp_conn = 0;
		}
	}


		/*SMTP COMMANDS*/

		/*
		 * Data($msg_data)
		 *
		 * Issues a data command and sends the msg_data to the server
		 * finializing the mail transaction. $msg_data is the message
		 * that is to be send with the headers. Each header needs to be
		 * on a single line followed by a <CRLF> with the message headers
		 * and the message body being seperated by and additional <CRLF>.
		 *
		 * Implements rfc 821: DATA <CRLF>
		 *
		 * SMTP CODE INTERMEDIATE: 354
		 *	 [data]
		 *	 <CRLF>.<CRLF>
		 *	 SMTP CODE SUCCESS: 250
		 *	 SMTP CODE FAILURE: 552,554,451,452
		 * SMTP CODE FAILURE: 451,554
		 * SMTP CODE ERROR  : 500,501,503,421
		 */
	function Data($msg_data) {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Data() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"DATA".$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 354) {
			$this->error = array("error" => "DATA command not accepted from server",
				"smtp_code" => $code,"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		$msg_data = str_replace("\r\n","\n",$msg_data);
		$msg_data = str_replace("\r","\n",$msg_data);
		$lines = explode("\n",$msg_data);
		$field = substr($lines[0],0,strpos($lines[0],":"));
		$in_headers = false;
		if(!empty($field) && !strstr($field," ")) {
			$in_headers = true;
		}
		$max_line_length = 998;
		while(list(,$line) = @each($lines)) {
			$lines_out = null;
			if($line == "" && $in_headers) {
				$in_headers = false;
			}
			while(strlen($line) > $max_line_length) {
				$pos = strrpos(substr($line,0,$max_line_length)," ");
				if(!$pos) {
					$pos = $max_line_length - 1;
				}
				$lines_out[] = substr($line,0,$pos);
				$line = substr($line,$pos + 1);
				if($in_headers) {
					$line = "\t".$line;
				}
			}
			$lines_out[] = $line;
			while(list(,$line_out) = @each($lines_out)) {
				if(strlen($line_out) > 0) {
					if(substr($line_out,0,1) == ".") {
						$line_out = ".".$line_out;
					}
				}
				fputs($this->smtp_conn,$line_out.$this->CRLF);
			}
		}
		fputs($this->smtp_conn,$this->CRLF.".".$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250) {
			$this->error = array("error" => "DATA not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return true;
	}

		/*
		 * Expand($name)
		 *
		 * Expand takes the name and asks the server to list all the
		 * people who are members of the _list_. Expand will return
		 * back and array of the result or false if an error occurs.
		 * Each value in the array returned has the format of:
		 *	 [ <full-name> <sp> ] <path>
		 * The definition of <path> is defined in rfc 821
		 *
		 * Implements rfc 821: EXPN <SP> <string> <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250
		 * SMTP CODE FAILURE: 550
		 * SMTP CODE ERROR  : 500,501,502,504,421
		 */
	function Expand($name) {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Expand() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"EXPN ".$name.$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250) {
			$this->error = array("error" => "EXPN not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		$entries = explode($this->CRLF,$rply);
		while(list(,$l) = @each($entries)) {
			$list[] = substr($l,4);
		}
		return $list;
	}

		/*
		 * Hello($host="")
		 *
		 * Sends the HELO command to the smtp server.
		 * This makes sure that we and the server are in
		 * the same known state.
		 *
		 * Implements from rfc 821: HELO <SP> <domain> <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250
		 * SMTP CODE ERROR  : 500, 501, 504, 421
		 */
	function Hello($host = "") {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Hello() without being connected");
			return false;
		}
		if(empty($host)) {
			$host = "localhost";
		}
		if(!$this->SendHello("EHLO",$host)) {
			if(!$this->SendHello("HELO",$host))
				return false;
		}
		return true;
	}
	function SendHello($hello,$host) {
		fputs($this->smtp_conn,$hello." ".$host.$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER: ".$this->CRLF.$rply;
		}
		if($code != 250) {
			$this->error = array("error" => $hello." not accepted from server","smtp_code" =>
				$code,"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		$this->helo_rply = $rply;
		return true;
	}

		/*
		 * Help($keyword="")
		 *
		 * Gets help information on the keyword specified. If the keyword
		 * is not specified then returns generic help, ussually contianing
		 * A list of keywords that help is available on. This function
		 * returns the results back to the user. It is up to the user to
		 * handle the returned data. If an error occurs then false is
		 * returned with $this->error set appropiately.
		 *
		 * Implements rfc 821: HELP [ <SP> <string> ] <CRLF>
		 *
		 * SMTP CODE SUCCESS: 211,214
		 * SMTP CODE ERROR  : 500,501,502,504,421
		 */
	function Help($keyword = "") {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Help() without being connected");
			return false;
		}
		$extra = "";
		if(!empty($keyword)) {
			$extra = " ".$keyword;
		}
		fputs($this->smtp_conn,"HELP".$extra.$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 211 && $code != 214) {
			$this->error = array("error" => "HELP not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return $rply;
	}

		/*
		 * Mail($from)
		 *
		 * Starts a mail transaction from the email address specified in
		 * $from. Returns true if successful or false otherwise. If True
		 * the mail transaction is started and then one or more Recipient
		 * commands may be called followed by a Data command.
		 *
		 * Implements rfc 821: MAIL <SP> FROM:<reverse-path> <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250
		 * SMTP CODE SUCCESS: 552,451,452
		 * SMTP CODE SUCCESS: 500,501,421
		 */
	function Mail($from) {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Mail() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"MAIL FROM:<".$from.">".$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250) {
			$this->error = array("error" => "MAIL not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return true;
	}

		/*
		 * Noop()
		 *
		 * Sends the command NOOP to the SMTP server.
		 *
		 * Implements from rfc 821: NOOP <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250
		 * SMTP CODE ERROR  : 500, 421
		 */
	function Noop() {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Noop() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"NOOP".$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250) {
			$this->error = array("error" => "NOOP not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return true;
	}

		/*
		 * Quit($close_on_error=true)
		 *
		 * Sends the quit command to the server and then closes the socket
		 * if there is no error or the $close_on_error argument is true.
		 *
		 * Implements from rfc 821: QUIT <CRLF>
		 *
		 * SMTP CODE SUCCESS: 221
		 * SMTP CODE ERROR  : 500
		 */
	function Quit($close_on_error = true) {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Quit() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"quit".$this->CRLF);
		$byemsg = $this->get_lines();
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$byemsg;
		}
		$rval = true;
		$e = null;
		$code = substr($byemsg,0,3);
		if($code != 221) {
			$e = array("error" => "SMTP server rejected quit command","smtp_code" => $code,
				"smtp_rply" => substr($byemsg,4));
			$rval = false;
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$e["error"].": ".$byemsg.$this->CRLF;
			}
		}
		if(empty($e) || $close_on_error) {
			$this->Close();
		}
		return $rval;
	}

		/*
		 * Recipient($to)
		 *
		 * Sends the command RCPT to the SMTP server with the TO: argument of $to.
		 * Returns true if the recipient was accepted false if it was rejected.
		 *
		 * Implements from rfc 821: RCPT <SP> TO:<forward-path> <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250,251
		 * SMTP CODE FAILURE: 550,551,552,553,450,451,452
		 * SMTP CODE ERROR  : 500,501,503,421
		 */
	function Recipient($to) {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Recipient() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"RCPT TO:<".$to.">".$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250 && $code != 251) {
			$this->error = array("error" => "RCPT not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return true;
	}

		/*
		 * Reset()
		 *
		 * Sends the RSET command to abort and transaction that is
		 * currently in progress. Returns true if successful false
		 * otherwise.
		 *
		 * Implements rfc 821: RSET <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250
		 * SMTP CODE ERROR  : 500,501,504,421
		 */
	function Reset() {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Reset() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"RSET".$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250) {
			$this->error = array("error" => "RSET failed","smtp_code" => $code,"smtp_msg" =>
				substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return true;
	}

		/*
		 * Send($from)
		 *
		 * Starts a mail transaction from the email address specified in
		 * $from. Returns true if successful or false otherwise. If True
		 * the mail transaction is started and then one or more Recipient
		 * commands may be called followed by a Data command. This command
		 * will send the message to the users terminal if they are logged
		 * in.
		 *
		 * Implements rfc 821: SEND <SP> FROM:<reverse-path> <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250
		 * SMTP CODE SUCCESS: 552,451,452
		 * SMTP CODE SUCCESS: 500,501,502,421
		 */
	function Send($from) {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Send() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"SEND FROM:".$from.$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250) {
			$this->error = array("error" => "SEND not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return true;
	}

		/*
		 * SendAndMail($from)
		 *
		 * Starts a mail transaction from the email address specified in
		 * $from. Returns true if successful or false otherwise. If True
		 * the mail transaction is started and then one or more Recipient
		 * commands may be called followed by a Data command. This command
		 * will send the message to the users terminal if they are logged
		 * in and send them an email.
		 *
		 * Implements rfc 821: SAML <SP> FROM:<reverse-path> <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250
		 * SMTP CODE SUCCESS: 552,451,452
		 * SMTP CODE SUCCESS: 500,501,502,421
		 */
	function SendAndMail($from) {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called SendAndMail() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"SAML FROM:".$from.$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250) {
			$this->error = array("error" => "SAML not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return true;
	}

		/*
		 * SendOrMail($from)
		 *
		 * Starts a mail transaction from the email address specified in
		 * $from. Returns true if successful or false otherwise. If True
		 * the mail transaction is started and then one or more Recipient
		 * commands may be called followed by a Data command. This command
		 * will send the message to the users terminal if they are logged
		 * in or mail it to them if they are not.
		 *
		 * Implements rfc 821: SOML <SP> FROM:<reverse-path> <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250
		 * SMTP CODE SUCCESS: 552,451,452
		 * SMTP CODE SUCCESS: 500,501,502,421
		 */
	function SendOrMail($from) {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called SendOrMail() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"SOML FROM:".$from.$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250) {
			$this->error = array("error" => "SOML not accepted from server","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return true;
	}

		/*
		 * Turn()
		 *
		 * This is an optional command for SMTP that this class does not
		 * support. This method is here to make the RFC821 Definition
		 * complete for this class and __may__ be implimented in the future
		 *
		 * Implements from rfc 821: TURN <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250
		 * SMTP CODE FAILURE: 502
		 * SMTP CODE ERROR  : 500, 503
		 */
	function Turn() {
		$this->error = array("error" => "This method, TURN, of the SMTP ".
			"is not implemented");
		if($this->do_debug >= 1) {
			echo "SMTP -> NOTICE: ".$this->error["error"].$this->CRLF;
		}
		return false;
	}

		/*
		 * Verify($name)
		 *
		 * Verifies that the name is recognized by the server.
		 * Returns false if the name could not be verified otherwise
		 * the response from the server is returned.
		 *
		 * Implements rfc 821: VRFY <SP> <string> <CRLF>
		 *
		 * SMTP CODE SUCCESS: 250,251
		 * SMTP CODE FAILURE: 550,551,553
		 * SMTP CODE ERROR  : 500,501,502,421
		 */
	function Verify($name) {
		$this->error = null;
		if(!$this->connected()) {
			$this->error = array("error" => "Called Verify() without being connected");
			return false;
		}
		fputs($this->smtp_conn,"VRFY ".$name.$this->CRLF);
		$rply = $this->get_lines();
		$code = substr($rply,0,3);
		if($this->do_debug >= 2) {
			echo "SMTP -> FROM SERVER:".$this->CRLF.$rply;
		}
		if($code != 250 && $code != 251) {
			$this->error = array("error" => "VRFY failed on name '$name'","smtp_code" => $code,
				"smtp_msg" => substr($rply,4));
			if($this->do_debug >= 1) {
				echo "SMTP -> ERROR: ".$this->error["error"].": ".$rply.$this->CRLF;
			}
			return false;
		}
		return $rply;
	}

		/*INTERNAL FUNCTIONS*/

		/*
		 * get_lines()
		 *
		 * __internal_use_only__: read in as many lines as possible
		 * either before eof or socket timeout occurs on the operation.
		 * With SMTP we can tell if we have more lines to read if the
		 * 4th character is '-' symbol. If it is a space then we don't
		 * need to read anything else.
		 */
	function get_lines() {
		$data = '';
		while($str = fgets($this->smtp_conn,515)) {
			if($this->do_debug >= 4) {
				echo "SMTP -> get_lines(): \$data was \"$data\"".$this->CRLF;
				echo "SMTP -> get_lines(): \$str is \"$str\"".$this->CRLF;
			}
			$data .= $str;
			if($this->do_debug >= 4) {
				echo "SMTP -> get_lines(): \$data is \"$data\"".$this->CRLF;
			}
			if(substr($str,3,1) == " ") {
				break;
			}
		}
		return $data;
	}
}


?>
