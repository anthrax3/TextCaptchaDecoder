<?php
	include ('lib/TextCaptchaDecoder.class.php');
	
	$question = "what is 34 + 1?";
	//$question = "248 + 456 =";
	//$question = "what color has the sky?";
	
	$key = "[<YOUR API KEY]"; // Get your own key at http://www.textcaptchadecoder.com/
	
	$textdecoder = new TextCaptchaDecoder($key);	
		
	print $textdecoder->answer($question);
	//print $textdecoder->balance();	
?>