<?php
	//Used to start a buffer which allows the entire site to be loaded into memory before being processed and sent.
	ob_start("compress");
	//Function to remove un-needed information reducing page size and speeding up load times
	function compress($minify)
	{
		$regex  = array(
			"`^([\t\s]+)`ism" => '',
			"`^\/\*(.+?)\*\/`ism" => "",
			"`([\n\A;]+)\/\*(.+?)\*\/`ism" => "$1",
			"`([\n\A;\s]+)//(.+?)[\n\r]`ism" => "$1\n",
			"`(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+`ism" => "\n"
		);
		$minify = preg_replace(array_keys($regex), $regex, $minify);
		$minify = preg_replace('/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/', '', $minify);
		$minify = str_replace(array("\rn","\r","\n","\t",'  ','    ','    '), '', $minify);
		return $minify;
	}
	//Used to set the file content type as text/css
	header('Content-type: text/css');
	//Used to load bootstrap css
	require('bootstrap.min.css');
	//Used to load the sites font css
	require('font.css');
	//Used to load the sites main style css
	require('style.css');
	//Ends the buffer and startes the compression and sends it to the browser.
	ob_end_flush();
?>