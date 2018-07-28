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
	
	//Used to dynamically load the entire body of the website
	if ($handle = opendir('.')) {
		//Cycles though all files in the directory listed above in opendir
		while (false !== ($entry = readdir($handle))) {
			//Ignores "." and ".." directories which are not actual directories
			if ($entry != "." && $entry != ".." && strtolower(substr($entry, strrpos($entry, '.') + 1)) == 'css') {
				//Actually loads the file and processes it though php
				require("$entry");
			}
		}
		closedir($handle);
	}
	//Ends the buffer and startes the compression and sends it to the browser.
	ob_end_flush();
?>