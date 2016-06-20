<?php
/*
File: TextCaptchaDecoder.class.php
Date: 06/21/2016
Version 1.0.0
Author: Glenn Prialde
Copyright Text Captcha Decoder http://www.textcaptchadecoder.com/ 2016. All rights reserved world-wide.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* You must provide a link back to www.henryranch.net on the site on which this software is used.
* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer 
in the documentation and/or other materials provided with the distribution.
* Neither the name of the HenryRanch LCC nor the names of its contributors nor authors may be used to endorse or promote products derived 
from this software without specific prior written permission.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS 
OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL 
THE AUTHORS, OWNERS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES 
OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, 
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER 
DEALINGS IN THE SOFTWARE.  
*/

class TextCaptchaDecoder {

	private $endpoint = 'http://www.textcaptchadecoder.com/api.php';
	private $apikey = null;
	
	public function __construct($key) {
		$this->apikey = $key;
	}
	
	public function answer($question) { 
		return $this->ask($question);
	}	

	public function balance() { 
		$data = array();
		$data['key'] = $this->apikey;
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->endpoint);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$balance = curl_exec($ch);
		curl_close($ch);
		
		return $balance;
	}
	
	private function ask($question) {
		$data = array();
		$data['key'] = $this->apikey;
		$data['question'] = $question;
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->endpoint);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$answer = curl_exec($ch);
		curl_close($ch);
		
		$answer = explode('|',trim($answer));
		$answer = empty($answer[1]) ? trim($answer[0]) : trim($answer[2]);
												
		return $answer;		
	}

}

?>