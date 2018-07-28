<?php
ob_start("compress");

    function compress( $minify )
    {
		$minify = preg_replace( '/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/' , '' , $minify );
		$minify = str_replace( array("\rn", "\r", "\t", '  ', '   ', '    '), '', $minify );
        return $minify;
    }

	
require('header.html');
	//header.html includes all required header information as well as CSS loading and logo


if ($handle = opendir('exports')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            require("exports/$entry");
        }
    }
    closedir($handle);
}
	
	
require('footer.html');
	//footer.html includes everything that controls the badge section
	
	ob_end_flush();
?>