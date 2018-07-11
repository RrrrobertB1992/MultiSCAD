<?php
ob_start("compress");

    function compress( $minify )
    {
		$minify = preg_replace( '/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/' , '' , $minify );
		$minify = str_replace( array("\rn", "\r", "\t", '  ', '   ', '    '), '', $minify );
        return $minify;
    }


header('Content-type: script/javascript');
readfile('jquery.3.3.1.js');
	//
readfile('bootstrap.min.js');
	//
readfile('main.js');
	//
	
	ob_end_flush();
?>