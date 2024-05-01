<?php
define("IN_MYBB", 1);

require "./global.php";
require "./inc/functions_post.php";

add_breadcrumb("gizlilik_bildirimi");

eval("\$gizlilik_bildirimi.= \"".$templates->get("gizlilik_bildirimi")."\";");
output_page($gizlilik_bildirimi);
?>