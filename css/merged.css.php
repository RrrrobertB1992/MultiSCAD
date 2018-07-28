<?php
	//Used to start a buffer which allows all the CSS to be loaded into memory before being processed and sent.
	ob_start("compress");
	//Function to remove un-needed information reducing CSS size and speeding up load times
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
		$minify = str_replace(array("\rn","\r","\n","\t",'  ','   ','    '), '', $minify);
		return $minify;
	}
	//Used to set the file content type as text/css
	header('Content-type: text/css');
	
	//Used to dynamically load the entire css of the website
	if ($handle = opendir('.')) {
		//Cycles though all files in the directory listed above in opendir
		while (false !== ($entry = readdir($handle))) {
			//Ignores "." and ".." directories and only loades files ending with .css
			if ($entry != "." && $entry != ".." && strtolower(substr($entry, strrpos($entry, '.') + 1)) == 'css') {
				//Actually loads the file for combining
				require("$entry");
			}
		}
		closedir($handle);
	}
	//Ends the buffer and startes the compression and sends it to the browser.
	ob_end_flush();
?>