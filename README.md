# Text Captcha Decoder and Solver
The fastest, the best and the cheapest

Check out http://www.textcaptchadecoder.com/

----
Usage

```php
<?php
	include ('lib/TextCaptchaDecoder.class.php');
	
	$key = "[<YOUR API KEY]"; // Get your own key at http://www.textcaptchadecoder.com/
	
	$textdecoder = new TextCaptchaDecoder($key);	
		
	print $textdecoder->answer($question);
	//print $textdecoder->balance();
```

----
Sponsors:

- https://www.captchaco.in/
- http://www.textcaptchadecoder.com/
- https://www.captchasolutions.com/
- https://www.isnare.com/
- http://www.solvecaptchas.com/
