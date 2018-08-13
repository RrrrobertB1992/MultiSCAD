<?php
$allowedHosts = array("192.168.0","192.168.1", "192.168.2");
$bypassLogin = "admin";
if(!isset($_REQUEST['login'])) {
	$_REQUEST['login']="";
}
if(in_array(substr($_SERVER['REMOTE_ADDR'],0,strrpos($_SERVER['REMOTE_ADDR'], ".")),$allowedHosts) or $_SERVER['REMOTE_ADDR']=="::1" or $_SERVER['REMOTE_ADDR']=="127.0.0.1" or $_REQUEST['login']=="$bypassLogin") {
	phpinfo();
} else {
	header('HTTP/1.0 403 Forbidden');
	http_response_code(403);
	include("errDocs/403.html");
}
//phpinfo();
?>