
<?php 
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); 
?>
<?php
echo "";
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
?>