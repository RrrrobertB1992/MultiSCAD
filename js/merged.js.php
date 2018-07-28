<?php
//This entire file is used to combine all JavaScript files and reduce load requests down to 1 for JavaScript
	//Used to start a buffer which allows the entire site to be loaded into memory before being processed and sent.
	ob_start("compress");
	//Function to remove un-needed information reducing page size and speeding up load times
	function compress($minify)
	{
		$minify = preg_replace('/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/', '', $minify);
		$minify = str_replace(array("\rn","\r","\t",'  ','   ','    '), '', $minify);
		return $minify;
	}
	//Used to set the file content type as script/javascript
	header('Content-type: script/javascript');
	//Used to load Jquery JavaScript
	require('jquery.js');
	//Used to load bootstrap JavaScript
	require('bootstrap.js');
	//Used to load the sites custom JavaScipt, This will be split up to organise it better.
	require('main.js');
	//Ends the buffer and startes the compression and sends it to the browser.
	ob_end_flush();
?>