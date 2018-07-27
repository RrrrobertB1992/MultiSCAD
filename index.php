<?php
ob_start("compress");

    function compress( $minify )
    {
		$minify = preg_replace( '/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/' , '' , $minify );
		$minify = str_replace( array("\rn", "\r", "\t", '  ', '   ', '    '), '', $minify );
        return $minify;
    }

	
readfile('main/header.html');
	//header.html includes all required header information as well as CSS loading and logo
readfile('main/navbar.html');
	//navbar.html includes everything that controls the top navigation bar
	

if ($handle = opendir('exports')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            readfile("exports/$entry");
        }
    }
    closedir($handle);
}
	
	
readfile('main/footer.html');
	//footer.html includes everything that controls the badge section
	
	ob_end_flush();
?>