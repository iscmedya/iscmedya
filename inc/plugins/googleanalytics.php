<?php
// Main Plugin file for the plugin Google Analytics
// © 2014 - 2024 juventiner
// ----------------------------------------
// Last Update: 08.01.2024

if(!defined('IN_MYBB'))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

$plugins->add_hook('pre_output_page','googleanalytics');
$plugins->add_hook("usercp_options_end", "googleanalytics_usercp");
$plugins->add_hook("usercp_do_options_end", "googleanalytics_usercp");

function googleanalytics_info()
{
	global $lang;
	$lang->load('googleanalytics');
	
	return array
	(
		'name'			=> $lang->googleanalytics_info_name,
		'description'	=> $lang->googleanalytics_info_desc,
		'website'		=> 'http://community.mybb.com/user-32469.html',
		'author'		=> 'juventiner',
		'authorsite'	=> 'https://www.mybboard.de/forum/user-5490.html',
		'version'		=> '2.4',
		'versioncode'	=> '2400',
		'compatibility' => '16*,18*',
		'codename'		=> 'googleanalytics'
	);
}

function googleanalytics_install() {
	global $db;
	
	// Add field for user option
	$db->query("ALTER TABLE ".TABLE_PREFIX."users ADD DisableGoogleAnalytics int NOT NULL default '0'");
}

function googleanalytics_is_installed()
{
	global $db;
	
	if($db->field_exists("DisableGoogleAnalytics", "users"))
	{
		return true;
	}
	else 
	{
		return false;
	}
}

function googleanalytics_uninstall()
{
	global $db;
	
	if($db->field_exists("DisableGoogleAnalytics", "users"))
		$db->query("ALTER TABLE ".TABLE_PREFIX."users DROP COLUMN DisableGoogleAnalytics");
	
	$db->delete_query("settings", "name IN('googleanalytics_status','googleanalytics_allow_to_hide','googleanalytics_settings_groups_disable_tracking','ga4_measurement_id')");
	$db->delete_query("settinggroups", "name IN('googleanalytics')");
}

// This function runs when the plugin is activated.
function googleanalytics_activate()
{
	global $db, $lang, $cache;
	$lang->load('googleanalytics');
	
	$CacheData = $cache->read('googleanalytics_versionhistory');
	$OldVersion = $CacheData['versioncode'];
	
	$PluginData = googleanalytics_info();
	$contents = array(
		'version' => $PluginData['version'],
		'versioncode' => $PluginData['versioncode']
	);	
	$cache->update('googleanalytics_versionhistory', $contents);

###### This section is only nessesary if the version is lower 2.2 or you install the plugin first time ######
if(empty($OldVersion) && !$db->field_exists("DisableGoogleAnalytics", "users"))
{
	$insertarray = array(
		'name' => 'googleanalytics',
		'title' => $db->escape_string($lang->googleanalytics_settings_name),
		'description' => $db->escape_string($lang->googleanalytics_settings_desc),
		'disporder' => 35,
		'isdefault' => 0,
	);
	$gid = $db->insert_query("settinggroups", $insertarray);
	
	$insertarray = array(
		'name' => 'googleanalytics_status',
		'title' => $db->escape_string($lang->googleanalytics_settings_status_name),
		'description' => $db->escape_string($lang->googleanalytics_settings_status_desc),
		'optionscode' => 'yesno',
		'value' => 0,
		'disporder' => 1,
		'gid' => $gid
	);
	$db->insert_query("settings", $insertarray);
	
	$insertarray = array(
		'name' => 'googleanalytics_allow_to_hide',
		'title' => $db->escape_string($lang->googleanalytics_settings_allow_to_hide_name),
		'description' => $db->escape_string($lang->googleanalytics_settings_allow_to_hide_desc),
		'optionscode' => 'yesno',
		'value' => 1,
		'disporder' => 3,
		'gid' => $gid
	);
	$db->insert_query("settings", $insertarray);
	
	$insertarray = array(
		'name' => 'googleanalytics_settings_groups_disable_tracking',
		'title' => $db->escape_string($lang->googleanalytics_settings_groups_disable_tracking_name),
		'description' => $db->escape_string($lang->googleanalytics_settings_groups_disable_tracking_desc),
		'optionscode' => 'groupselect',
		'value' => 4,
		'disporder' => 10,
		'gid' => $gid
	);
	$db->insert_query("settings", $insertarray);
}
###### The section above is only nessesary if the version is lower 2.2 or you install the plugin first time ######

	//run update to install new functions
	googleanalytics_update($CacheData['versioncode']);

	rebuild_settings();

}

// This function runs when the plugin is deactivated.
function googleanalytics_deactivate(){

	
}

function googleanalytics_update($versioncode)
{
	global $db, $lang, $mybb;
	$lang->load('googleanalytics');
	
	//fetch Settinggroup
	$query = $db->simple_select("settinggroups", "gid", "name='googleanalytics'");
	$settingsgroup = $db->fetch_array($query);
	
	if(empty($versioncode))
	{
		$versioncode = 1;
	}
	
	if($versioncode < 2200)
	{
		$insertarray = array(
			'name' => 'ga4_measurement_id',
			'title' => $db->escape_string($lang->settings_info_measurement_id),
			'description' => $db->escape_string($lang->settings_discription_measurement_id),
			'optionscode' => 'text',
			'value' => '',
			'disporder' => 2,
			'gid' => $settingsgroup['gid']
		);
		$db->insert_query("settings", $insertarray);
	}
	
	if($versioncode < 2400)
	{
		$trackingId = $mybb->settings['ga4_measurement_id'] ?: $mybb->settings['googleanalytics_ID'];
		$db->update_query("settings", $update_array, "name='googleanalytics_ID'");
		
		//delete old obsolete settings
		$db->delete_query("settings", "name IN('googleanalytics_ID','googleanalytics_ga_version','googleanalytics_ip_anonymize')");
	}

}

function googleanalytics_usercp() {

	global $db, $mybb, $templates, $user, $lang;
	
	$lang->load('googleanalytics');
	
	if($mybb->settings['googleanalytics_allow_to_hide'] == 1 && !is_member($mybb->settings['googleanalytics_settings_groups_disable_tracking'], $mybb->user['uid'])) {
	
	if($mybb->request_method == "post")
	{
		$update_array = array(
			"DisableGoogleAnalytics" => intval($mybb->input['DisableGoogleAnalytics'])
		);		
		$db->update_query("users", $update_array, "uid = '".$user['uid']."'");
	}
	
	$add_option = '</tr><tr>
<td valign="top" width="1"><input type="checkbox" class="checkbox" name="DisableGoogleAnalytics" id="DisableGoogleAnalytics" value="1" {$GLOBALS[\'$GoogleAnalyticsChecked\']} /></td>
<td><span class="smalltext"><label for="DisableGoogleAnalytics">{$lang->googleanalytics_disable_usercp}</label></span></td>';

	$find = '{$lang->show_codebuttons}</label></span></td>';
	$templates->cache['usercp_options'] = str_replace($find, $find.$add_option, $templates->cache['usercp_options']);
	
	$GLOBALS['$GoogleAnalyticsChecked'] = '';
	if($user['DisableGoogleAnalytics'])
	{
		$GLOBALS['$GoogleAnalyticsChecked'] = "checked=\"checked\"";
	}
	}
}

function googleanalytics($page)
{
	global $mybb;
	
	if(($mybb->settings['googleanalytics_status'] == 1 && ($mybb->user['DisableGoogleAnalytics'] == 0 || $mybb->settings['googleanalytics_allow_to_hide'] == 0) && !is_member($mybb->settings['googleanalytics_settings_groups_disable_tracking'], $mybb->user['uid'])) && !empty($mybb->settings['ga4_measurement_id']))
	{
		$page=str_replace("<head>","<head><script async src=\"https://www.googletagmanager.com/gtag/js?id=".htmlspecialchars_uni($mybb->settings['ga4_measurement_id'])."\"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', '".htmlspecialchars_uni($mybb->settings['ga4_measurement_id'])."');</script>",$page);
	}
	
	return $page;
}
?>
