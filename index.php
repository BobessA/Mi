<?php
include('./Includes/config.inc.php');

$find = current($pages);
if (isset($_GET['page'])) {
	if (isset($pages[$_GET['page']]) && file_exists("./Templates/Pages/{$pages[$_GET['page']]['file']}.tpl.php")) {
		$find = $pages[$_GET['page']];
	}
	else { 
		$find = $errorPage;
		header("HTTP/1.0 404 Not Found");
	}
}

include('./Templates/index.tpl.php'); 
?>