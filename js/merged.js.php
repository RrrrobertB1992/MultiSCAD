<?php
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
	//Used to dynamically load the entire JavaScript of the website
	if ($handle = opendir('.')) {
		//Cycles though all files in the directory listed above in opendir
		while (false !== ($entry = readdir($handle))) {
			//Ignores "." and ".." directories and only loades files ending with .js
			if ($entry != "." && $entry != ".." && strtolower(substr($entry, strrpos($entry, '.') + 1)) == 'js') {
				//Actually loads the file for combining
				require("$entry");
			}
		}
		closedir($handle);
	}
	//Ends the buffer and startes the compression and sends it to the browser.
	ob_end_flush();
?>