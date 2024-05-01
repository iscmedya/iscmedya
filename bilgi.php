<?php
define("IN_MYBB", 1);

require "./global.php";
require "./inc/functions_post.php";

add_breadcrumb("bilgi");

eval("\$bilgi.= \"".$templates->get("bilgi")."\";");
output_page($bilgi);
?>