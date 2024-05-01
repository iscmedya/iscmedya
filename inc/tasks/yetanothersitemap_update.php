<?php
/**
 * Yet Another Sitemap (YASM) Task
 * Copyright 2020 NoRules <https://community.mybb.com/user-4384.html>
 */
if (!defined("IN_MYBB")) {
    die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}
function task_yetanothersitemap_update($task)
{
	global $mybb;
    $mapfile = MYBB_ROOT . 'sitemap.xml';
    if (file_exists($mapfile)) {
        $stats = stat($mapfile);
        if ((TIME_NOW - $stats['mtime']) > (60 * $mybb->settings['yasmupdatetime'])) {
			yetanothersitemap_do();
			add_task_log($task, "YASM: Sitemap Updated");
        }
	}
	elseif (!file_exists($mapfile)){
			yetanothersitemap_do();
			add_task_log($task, "YASM: Sitemap file created");
	}
	else {
		add_task_log($task, "All OK");
	}
}