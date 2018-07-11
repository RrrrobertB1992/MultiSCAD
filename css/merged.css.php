<?php
ob_start("compress");

    function compress( $minify )
    {
	/* remove comments */
    	$regex = array(
"`^([\t\s]+)`ism"=>'',
"`^\/\*(.+?)\*\/`ism"=>"",
"`([\n\A;]+)\/\*(.+?)\*\/`ism"=>"$1",
"`([\n\A;\s]+)//(.+?)[\n\r]`ism"=>"$1\n",
"`(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+`ism"=>"\n"
);
$minify = preg_replace(array_keys($regex),$regex,$minify);

$minify = preg_replace( '/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/' , '' , $minify );
        /* remove tabs, spaces, newlines, etc. */
    	$minify = str_replace( array("\rn", "\r", "\n", "\t", '  ', '    ', '    '), '', $minify );

        return $minify;
    }
	
	header('Content-type: text/css');
    /* css files for combining */
    require('bootstrap.min.css');
    require('style.css');
	require('all.css');

	ob_end_flush();
?>