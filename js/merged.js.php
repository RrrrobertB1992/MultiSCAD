<?php
	ob_start("compress");
		function compress( $minify )
		{
			$minify = preg_replace( '/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/' , '' , $minify );
			$minify = str_replace( array("\rn", "\r", "\t", '  ', '   ', '    '), '', $minify );
			return $minify;
		}
		header('Content-type: script/javascript');
		readfile('jquery.js');
		readfile('bootstrap.js');
		readfile('main.js');
	ob_end_flush();
?>