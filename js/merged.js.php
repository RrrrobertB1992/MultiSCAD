<?php
	//Used to start a buffer which allows the entire site to be loaded into memory before being processed and sent.
	ob_start("compress");
	//Function to remove un-needed information reducing page size and speeding up load times
	function compress($minify)
	{
		$minify = preg_replace('/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/', '', $minify);
		$minify = str_replace(array("\rn","\r","\n","\t",'  ','    ','    '), '', $minify);
		return $minify;
	}
	//Used to set the file content type as script/javascript
	header('Content-type: script/javascript');
	//Used to load Jquery JavaScript
	require('jquery.js');
	//Used to load bootstrap JavaScript
	require('bootstrap.js');
	//Used to load the sites Custom JavaScipt
	require('main.js');
	//Ends the buffer and startes the compression and sends it to the browser.
	ob_end_flush();
?>