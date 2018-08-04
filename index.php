<?php
	//Used to start a buffer which allows the entire site to be loaded into memory before being processed and sent.
	ob_start("compressIndex");
	//Function to remove un-needed information reducing page size and speeding up load times
	function compressIndex($minify)
	{
		$minify = preg_replace('/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/', '', $minify);
		$minify = str_replace(array("\rn","\r","\t",'  ','   ','    '), '', $minify);
		return $minify;
	}
	//used to load header.html file which contains all header information, CSS and navigation
	require('header.html');
	//Used to dynamically load the entire body of the website
	if ($handle = opendir('body')) {
		//Cycles though all files in the directory listed above in opendir
		while (false !== ($entry = readdir($handle))) {
			//Ignores "." and ".." directories which are not actual directories
			if ($entry != "." && $entry != "..") {
				//Used to load the first line of the page, which is where the disable line should be.
				$disabledCheck = fgets(fopen("body\\".$entry, 'r'));
				/*Used to check the first line of the page to see if it is disabled.  Use <?php //DISABLED ?>" to disable a page*/
				if (strpos($disabledCheck, 'DISABLED') === false) {
					//Loads the page if it is not disabled
					require("body/$entry");
				}
			}
		}
		closedir($handle);
	}
	//Used to load footer.html, which contains everything under the body of the website, as well as loading required JS
	require('footer.html');
	//Ends the buffer and startes the compression and sends it to the browser.
	ob_end_flush();
?>