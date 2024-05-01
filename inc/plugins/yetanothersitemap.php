<?php
/*
	Yet Another Sitemap Plugin (YASM)
	Copyright (C) 2020 NoRules
	Part of the code is based in the work of:
	- Mostafa Shirali <https://mypgr.ir/>
	- Wolfgang Ninaus <wolfgang.ninaus@cdx.at>
	- Crazycat <crazycat@c-p-f.org>
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The GNU General Public License is available at http://www.gnu.org/licenses/gpl-3.0.html.
*/

if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}
// Plugin information
function yetanothersitemap_info()
{
	global $db, $mybb;
	$yetanothersitemap_config = "";
	if($mybb->settings['yasmenable'] == 1)
	{
		$query = $db->simple_select('settinggroups', 'gid', "name='yetanothersitemap'");  //pillar GID
		$yasmgid = $db->fetch_field($query, "gid");
		$yetanothersitemap_config = '<style>@media not all and (min-width:1150px){.estilodiv{display:contents}.estilolink{font-weight:700}}@media only screen and (min-width:1150px){.estilodiv{float:right;margin-top:-5px}.estilolink{color:#3025b3;padding:.8rem;text-decoration:none;border-style:double;margin-right:-.4rem;font-size:large}}</style><div class="estilodiv"><a class="estilolink" href="index.php?module=config-settings&action=change&gid=' . $yasmgid . '">Settings</a></div>';		
	}
	return array
	(
		"name" 				=> "<span style=\"color: #3025b3;\">Yet Another Sitemap (YASM)</span>",
		"description"		=> "YASM - Create a sitemap for your forum and update it with the frequency you want. ".$yetanothersitemap_config,
		"website" 			=> "",
		"author" 			=> "NoRules",
		"authorsite" 		=> "https://community.mybb.com/user-4384.html",
		"version" 			=> "1.3",
		"codename"        	=> "yetanothersitemap",
		"compatibility" 	=>	"18*",
	);
}

function yetanothersitemap_install()
{
    global $db, $cache;
	// tasks
    $new_task = [
        'title'       => 'Yet Another Sitemap (update)',
        'description' => 'Performs scheduled operations for the Yet Another Sitemap plugin.',
        'file'        => 'yetanothersitemap_update',
        'minute'      => '0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55',
        'hour'        => '*',
        'day'         => '*',
        'month'       => '*',
        'weekday'     => '*',
        'enabled'     => '1',
        'logging'     => '1',
    ];

    require_once MYBB_ROOT . '/inc/functions_task.php';
    $new_task['nextrun'] = fetch_next_run($new_task);
    $db->insert_query('tasks', $new_task);
    $cache->update_tasks();
}

function yetanothersitemap_uninstall()
{
    global $db, $cache;
	// uninstall task
    $db->delete_query('tasks', "file='yetanothersitemap_update'");
    $cache->update_tasks();
}

function yetanothersitemap_is_installed()
{
    global $db;
    // manual check to avoid caching issues
    $query = $db->simple_select('settinggroups', 'gid', "name='yetanothersitemap'");
    return (bool)$db->num_rows($query);
}

// Plugin activation
function yetanothersitemap_activate()
{
	global $db;
	
    $query = $db->simple_select("settinggroups", "COUNT(*) AS yasmrows");
    $yasmrows = $db->fetch_field($query, "yasmrows");
	
	$settings_group = array(
        "name" => "yetanothersitemap",
        "title" => "Yet Another Sitemap (YASM)",
        "description" => "Yet Another Sitemap (YASM) Settings",
        "disporder"		=> $yasmrows+1,
        "isdefault"		=> 0
        );
    $db->insert_query("settinggroups", $settings_group);
    $yasmgid = $db->insert_id();

	$setting_1 = array(
	"name" 			=> "yasmenable",
	"title" 		=> "Active",
	"description" 	=> "Do you want to active the plugin?",
	"optionscode" 	=> "yesno",
	"value" 		=> 1,
	"disporder" 	=> 1,
	"gid" 			=> (int)$yasmgid,
	);
	$setting_2 = array(
	"name"			=> "yasmfreq",
	"title"			=> "Threads Frequency",
	"description"	=> "Select your threads\' update frequency. You can choose among <strong>Hourly</strong>, <strong>Daily</strong>, <strong>Weekly</strong>, <strong>Monthly</strong>, <strong>Yearly</strong>, <strong>Always</strong>, <strong>Never</strong>",
	"optionscode"	=> "select\nhourly=Hourly\ndaily=Daily\nweekly=Weekly\nmonthly=Monthly\nyearly=Yearly\nalways=Always\nnever=Never",
	"value"			=> "weekly",
	"disporder"		=> 2,
	"gid"			=> (int)$yasmgid,
	);
	$setting_3 = array(
	"name"			=> "yasmpriority",
	"title"			=> "Threads Priority",
	"description"	=> "Select your threads\' priority. Valid values range from 0.0 to 1.0. Please note that assigning a high priority to all of the URLs on your site is not likely to help you. Since the priority is relative, it is only used to select between URLs on your site.",
	"optionscode"	=> "select\n0.0=0.0\n0.1=0.1\n0.2=0.2\n0.3=0.3\n0.4=0.4\n0.5=0.5\n0.6=0.6\n0.7=0.7\n0.8=0.8\n0.9=0.9\n1.0=1.0",
	"value"			=> 0.5,
	"disporder"		=> 3,
	"gid"			=> (int)$yasmgid,
	);
	$setting_4 = array(
	"name" 			=> "yasmstyleenable",
	"title" 		=> "Style XML",
	"description" 	=> "Do you want to style the XML file? For XML content, the style information is not obligatory, and XML sitemaps are not visible to visitors only to bots.",
	"optionscode" 	=> "yesno",
	"value" 		=> 0,
	"disporder" 	=> 4,
	"gid" 			=> (int)$yasmgid,
	);
	$setting_5 = array(
	"name" 			=> "yasmhiddenshow",
	"title" 		=> "Show Hidden Threads",
	"description" 	=> "Do you want to list in the sitemap the guest hidden threads? If they are listed, guests will not have access to them, as in the forum. Only the link of the thread will show up.",
	"optionscode" 	=> "yesno",
	"value" 		=> 0,
	"disporder" 	=> 5,
	"gid" 			=> (int)$yasmgid,
	);
	$setting_6 = array(
	"name" 			=> "yasmeventsshow",
	"title" 		=> "Show Events",
	"description" 	=> "Do you want to list Events in the sitemap?",
	"optionscode" 	=> "yesno",
	"value" 		=> 0,
	"disporder" 	=> 6,
	"gid" 			=> (int)$yasmgid,
	);
	$setting_7 = array(
	"name"			=> "yasmeventfreq",
	"title"			=> "Events Frequency",
	"description"	=> "Select your sitemap\'s update frequency for the Events. Recommended: <strong>Never</strong>",
	"optionscode"	=> "select\nhourly=Hourly\ndaily=Daily\nweekly=Weekly\nmonthly=Monthly\nyearly=Yearly\nalways=Always\nnever=Never",
	"value"			=> "never",
	"disporder"		=> 7,
	"gid"			=> (int)$yasmgid,
	);
	$setting_8 = array(
	"name"			=> "yasmeventpriority",
	"title"			=> "Events Priority",
	"description"	=> "Select your sitemap\'s priority for the Events. Valid values range from 0.0 to 1.0. Please note that assigning a high priority to all of the URLs on your site is not likely to help you. Since the priority is relative, it is only used to select between URLs on your site.",
	"optionscode"	=> "select\n0.0=0.0\n0.1=0.1\n0.2=0.2\n0.3=0.3\n0.4=0.4\n0.5=0.5\n0.6=0.6\n0.7=0.7\n0.8=0.8\n0.9=0.9\n1.0=1.0",
	"value"			=> 0.5,
	"disporder"		=> 8,
	"gid"			=> (int)$yasmgid,
	);
	$setting_9 = array(
	"name" 			=> "yasmhelpdocsshow",
	"title" 		=> "Show Help Documments",
	"description" 	=> "Do you want to list in the sitemap the Help Documments?",
	"optionscode" 	=> "yesno",
	"value" 		=> 0,
	"disporder" 	=> 9,
	"gid" 			=> (int)$yasmgid,
	);
	$setting_10 = array(
	"name"			=> "yasmhelpdocsfreq",
	"title"			=> "Help Documments Frequency",
	"description"	=> "Select your sitemap\'s update frequency for the Help Documments. Recommended: <strong>Never</strong>",
	"optionscode"	=> "select\nhourly=Hourly\ndaily=Daily\nweekly=Weekly\nmonthly=Monthly\nyearly=Yearly\nalways=Always\nnever=Never",
	"value"			=> "never",
	"disporder"		=> 10,
	"gid"			=> (int)$yasmgid,
	);
	$setting_11 = array(
	"name"			=> "yasmhelpdocspriority",
	"title"			=> "Help Documments Priority",
	"description"	=> "Select your sitemap\'s priority for the Help Documments. Valid values range from 0.0 to 1.0. Please note that assigning a high priority to all of the URLs on your site is not likely to help you. Since the priority is relative, it is only used to select between URLs on your site.",
	"optionscode"	=> "select\n0.0=0.0\n0.1=0.1\n0.2=0.2\n0.3=0.3\n0.4=0.4\n0.5=0.5\n0.6=0.6\n0.7=0.7\n0.8=0.8\n0.9=0.9\n1.0=1.0",
	"value"			=> 0.3,
	"disporder"		=> 11,
	"gid"			=> (int)$yasmgid,
	);
	$setting_12 = array(
	"name"			=> "yasmupdatetime",
	"title"			=> "Update Frequency of the Sitemap",
	"description"	=> "Select your sitemap\'s task automatic update frequency. It could be from 15 minutes to weekly. This is the minimum time interval to update the sitemap. Please note that assigning a lower update frequency to big forums could result in high load of the server. Recommended: <strong>Daily</strong>",
	"optionscode"	=> "select\n15=15 Minutes\n30=30 Minutes\n60=Hourly\n120=2 Hours\n180=3 Hours\n240=4 Hours\n300=5 Hours\n360=6 Hours\n720=12 Hours\n1440=Daily\n10080=Weekly",
	"value"			=> 1440,
	"disporder"		=> 12,
	"gid"			=> (int)$yasmgid,
	);
	
	$db->insert_query("settings", $setting_1);
	$db->insert_query("settings", $setting_2);
	$db->insert_query("settings", $setting_3);
	$db->insert_query("settings", $setting_4);
	$db->insert_query("settings", $setting_5);
	$db->insert_query("settings", $setting_6);
	$db->insert_query("settings", $setting_7);
	$db->insert_query("settings", $setting_8);
	$db->insert_query("settings", $setting_9);
	$db->insert_query("settings", $setting_10);
	$db->insert_query("settings", $setting_11);
	$db->insert_query("settings", $setting_12);
	rebuild_settings();
}

// Plugin deactivation
function yetanothersitemap_deactivate()
{
	global $db;
	$db->query("DELETE FROM ".TABLE_PREFIX."settinggroups WHERE name='yetanothersitemap'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmenable'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmfreq'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmpriority'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmstyleenable'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmhiddenshow'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmeventsshow'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmeventfreq'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmeventpriority'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmhelpdocsshow'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmhelpdocsfreq'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmhelpdocspriority'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmupdatetime'");
	$db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name='yasmmodalwindow'");
	rebuild_settings();
}

function yetanothersitemap_do()
{
	global $mybb, $db, $templates;

	if($mybb->settings['yasmenable'] == 1)
	{
		if($mybb->settings['yasmhiddenshow'] == 1)
		{
			$cadenafids = "";
		}
		else
		{
			$existencia = $db->query("SELECT NULL FROM ".TABLE_PREFIX."forumpermissions LIMIT 1");
			$tabla_vacia = $db->num_rows($existencia);
			if($tabla_vacia != 0)
			{
				$db->free_result($existencia);
				$result = $db->query("SELECT * FROM ".TABLE_PREFIX."forumpermissions WHERE gid = 1 AND canview = 0"); //consulta para sacar las fids
				$fids_num = $db->num_rows($result);
				$fids = "";

				while($row = $db->fetch_array($result))
				{
				// Esto crea un string como: fid1, fid2, fid3,
					$fids .= $row['fid'].", ";
				}
				// Esto quita el ultimo espacio y coma del string generado con lo cual el string queda: fid1, fid2, fid3
				$fids = substr($fids,0,-2);
				//$cadenafids = "AND visible = 0";
				$cadenafids = "AND fid NOT IN (".$fids.")";
			}
			else
			{
				$cadenafids = "AND NOT visible = 0";
			}
		}
		$threads = $db->query("SELECT tid, DATE_FORMAT(FROM_UNIXTIME(lastpost),'%Y-%m-%dT%H:%i:%sZ') AS lastmod FROM ".TABLE_PREFIX."threads WHERE NOT dateline = 0 {$cadenafids} ORDER BY tid DESC");
		$threads_num = $db->num_rows($threads);
		$index_last_mod = date("Y-m-d\TH:i:s\Z");   
		$content='
<url>
	<loc>'.$mybb->settings['bburl'].'/</loc>
	<lastmod>'.$index_last_mod.'</lastmod>
	<changefreq>daily</changefreq>
	<priority>1.0</priority>
</url>';
		//Portal Active
		$portalactivo = $db->query("SELECT value FROM ".TABLE_PREFIX."settings WHERE name = 'portal'");
		$portalactivo_info=$db->fetch_array($portalactivo);
		if($portalactivo_info['value'] == 1)
		{
			$content.='
<url>
	<loc>'.$mybb->settings['bburl'].'/portal.php</loc>
	<lastmod>'.$index_last_mod.'</lastmod>
	<changefreq>daily</changefreq>
	<priority>1.0</priority>
</url>';
		}
		//Threads
		for($i=0;$i<$threads_num;$i++)
		{
			$threads_info=$db->fetch_array($threads);
			$threadslink = get_thread_link($threads_info['tid']);
			$content.='
<url>
	<loc>'.$mybb->settings['bburl'].'/'.$threadslink.'</loc>
	<lastmod>'.$threads_info['lastmod'].'</lastmod>
	<changefreq>'.$mybb->settings['yasmfreq'].'</changefreq>
	<priority>'.$mybb->settings['yasmpriority'].'</priority>
</url>
';
		}
		//Events
		if($mybb->settings['yasmeventsshow'] == 1)
		{
			$eventos = $db->query("SELECT eid, DATE_FORMAT(FROM_UNIXTIME(dateline),'%Y-%m-%dT%H:%i:%sZ') AS eventdate FROM ".TABLE_PREFIX."events WHERE visible = 1 AND private = 0"); //consulta para sacar los eids ;
			if($eventos)
			{
				$eventos_num = $db->num_rows($eventos);
				for($i=0;$i<$eventos_num;$i++)
				{
					$eventos_info=$db->fetch_array($eventos);
					$eventoslink = get_event_link($eventos_info['eid']);
					$content.='
<url>
	<loc>'.$mybb->settings['bburl'].'/'.$eventoslink.'</loc>
	<lastmod>'.$eventos_info['eventdate'].'</lastmod>
	<changefreq>'.$mybb->settings['yasmeventfreq'].'</changefreq>
	<priority>'.$mybb->settings['yasmeventpriority'].'</priority>
</url>
';
				}
			}
		}
		//Help Docs
		if($mybb->settings['yasmhelpdocsshow'] == 1)
		{
			$ayudas = $db->query("SELECT hid FROM ".TABLE_PREFIX."helpdocs WHERE enabled = 1"); //consulta para sacar los hids
			if($ayudas)
			{
				$ayudas_num = $db->num_rows($ayudas);
				for($i=0;$i<$ayudas_num;$i++)
				{
					$ayudas_info=$db->fetch_array($ayudas);
					$content.='
<url>
	<loc>'.$mybb->settings['bburl'].'/misc.php?action=help&amp;hid='.$ayudas_info['hid'].'</loc>
	<changefreq>'.$mybb->settings['yasmhelpdocsfreq'].'</changefreq>
	<priority>'.$mybb->settings['yasmhelpdocspriority'].'</priority>
</url>
';
				}
			}
		}
		$sitemap="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		if($mybb->settings['yasmstyleenable'] == 1)
		{
			$sitemap.="<?xml-stylesheet type=\"text/xsl\" href=\"/inc/plugins/yetanothersitemap/yasm_template.xml\"?>\n";
		}
		$sitemap.="<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">"
	.$content.
"</urlset>
";
		$handle = @fopen(MYBB_ROOT . 'sitemap.xml', 'w+');
		fwrite($handle, $sitemap);
		fclose($handle);
	}
}

function yasm_aviso_sitemap()
{
	global $mybb, $db;
	if($mybb->settings['yasmmodalwindow'] != 1)
	{
		$query = $db->simple_select('settinggroups', 'gid', "name='yetanothersitemap'");  //pillar GID
		$yasmgid = $db->fetch_field($query, "gid");
	
		$setting_modal = array(
			"name" 			=> "yasmmodalwindow",
			"title" 		=> "Active",
			"description" 	=> "Modal Window has been shown?",
			"optionscode" 	=> "yesno",
			"value" 		=> 1,
			"disporder" 	=> 13,
			"gid" 			=> 9999,
		);
		$db->insert_query("settings", $setting_modal);
		rebuild_settings();

		echo '<style>.modal2{display:none;position:fixed;z-index:1;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:#000;background-color:rgba(0,0,0,.4)}.modal-content{background-color:#fefefe;padding:20px;border:4px solid #20bf6b!important;width:500px;max-width:60%;text-align:center;font-size:x-large;border-radius:16px;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%)}.close{font-size:28px;font-weight:700;border:none;vertical-align:top;overflow:hidden;text-decoration:none;color:inherit;background-color:inherit;text-align:center;cursor:pointer;white-space:nowrap;position:absolute;top:4px;right:3px;margin:0;z-index:1101;line-height:20px}.close:focus,.close:hover{color:#000;text-decoration:none;cursor:pointer}.modaltext{font-size:18px;text-align:left}</style>
			<div id="sitemap_activation" class="modal2">
				<div class="modal-content">
					<span class="close">&times;</span>
					<strong>Sitemap plugin is Activated</strong><br /><br />
					<span class="modaltext">Please go to: \'Configuration\' > \'Settings\' > \'Plugin Settings\' > \'<a href="index.php?module=config-settings&action=change&gid=' . $yasmgid . '">Yet Another Sitemap (YASM)</a>\'<br /><br />
					Remember: if it\'s the first time you activate the plugin, it will take some time creating the new Sitemap.<br /><br />
					The URL of the Sitemap will be:<br />
					<a href="' .$mybb->settings['bburl']. '/sitemap.xml" target="_blank">' .$mybb->settings['bburl']. '/sitemap.xml</a><br />
					(File will be created as soon as you configure its settings)<br /><br />
					Enjoy!</span>
				</div>
			</div>
			<script type="text/javascript">var modal=document.getElementById("sitemap_activation"),span=document.getElementsByClassName("close")[0];function modalshow(){modal.style.display="block"}span.onclick=function(){modal.style.display="none"},window.onclick=function(o){o.target==modal&&(modal.style.display="none")},window.onload=modalshow;</script>
		';
	}
}

// General Hooks
$plugins->add_hook("admin_load","yasm_aviso_sitemap");
$plugins->add_hook("admin_config_settings_change_commit", "task_yetanothersitemap_index");
$plugins->add_hook("index_end", "task_yetanothersitemap_index");

function task_yetanothersitemap_index() {
    global $mybb, $db;
    $query = $db->simple_select('tasks', '*', "file='yetanothersitemap_update'");
    $task = $db->fetch_array($query);
    require_once MYBB_ROOT."inc/functions_task.php";
    run_task($task['tid']);
}
?>