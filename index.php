<?php
ob_start("compress");

    function compress( $minify )
    {
		$minify = preg_replace( '/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/' , '' , $minify );
		$minify = str_replace( array("\rn", "\r", "\t", '  ', '   ', '    '), '', $minify );
        return $minify;
    }

	
readfile('main/header.html');
	//header.html includes all required header information as well as CSS loading
readfile('main/logo.html');
	//logo.html includes all the codes for the logo and header text
readfile('main/navbar.html');
	//navbar.html includes everything that controls the top navigation bar
readfile('exports/_svgInput.html');
	//_svgInput.html includes everything that controls the SVG section
readfile('exports/_badge.html');
	//_badge.html includes everything that controls the badge section
readfile('exports/_bookmark.html');
	//_bookmark.html includes everything that controls the badge section
readfile('exports/_formCutter.html');
	//_formCutter.html includes everything that controls the badge section
readfile('exports/_keychain.html');
	//_badge.html includes everything that controls the badge section
readfile('exports/_lithophane.html');
	//_badge.html includes everything that controls the badge section
readfile('exports/_stamp.html');
	//_badge.html includes everything that controls the badge section
readfile('exports/_stencil.html');
	//_badge.html includes everything that controls the badge section
readfile('exports/_export.html');
	//_badge.html includes everything that controls the badge section
readfile('main/footer.html');
	//_badge.html includes everything that controls the badge section
	
	ob_end_flush();
?>