<?php
$allowedHosts = array("localhost","127.0.0.1","192.168.0","192.168.1", "192.168.2");
if(in_array(substr($_SERVER['HTTP_HOST'],0,strrpos($_SERVER['HTTP_HOST'], ".")),$allowedHosts)) {
	phpinfo();
} else {
	header('HTTP/1.0 403 Forbidden');
	http_response_code(403);
	die("Forbidden <br> <br>You don't have permission to access PHP Info on this server.");
}
//phpinfo();
?>