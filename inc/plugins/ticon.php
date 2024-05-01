<?php
/**
 * Threads Icons
 * 
 * PHP Version 5
 * 
 * @category MyBB_18
 * @package  Threads_Icons
 * @author   chack1172 <NBerardozzi@gmail.com>
 * @license  https://creativecommons.org/licenses/by-nc/4.0/ CC BY-NC 4.0
 * @link     http://www.chack1172.altervista.org/Projects/MyBB-18/Threads-Icons.html
 */

if(!defined('IN_MYBB')) {
    die('This file cannot be accessed directly.');
}

define("TICON_PATH", "/ticon");

if(defined("IN_ADMINCP")) {
    $plugins->add_hook("admin_config_plugins_deactivate_commit", "ticon_destroy");
    $plugins->add_hook('admin_config_settings_begin', 'ticon_lang');
}
else {
    $plugins->add_hook('newthread_do_newthread_start', 'ticon_lang');
    $plugins->add_hook('newthread_start', 'ticon_lang');
    $plugins->add_hook('editpost_start', 'ticon_lang');
    $plugins->add_hook("editpost_do_editpost_end", "ticon_insert_icon");
    $plugins->add_hook('editpost_end', 'ticon_editpost');
    $plugins->add_hook('forumdisplay_start', 'ticon_lang');
    $plugins->add_hook('forumdisplay_get_threads', 'ticon_icons');
    $plugins->add_hook('forumdisplay_thread_end', 'ticon_thread');
    $plugins->add_hook("datahandler_post_validate_post", "ticon_validate_icon");
    $plugins->add_hook("datahandler_post_validate_thread", "ticon_validate_icon");
    $plugins->add_hook("newthread_do_newthread_end", "ticon_insert_icon");
    $plugins->add_hook('newthread_end', 'ticon_newthread');
}

/** 
 *
 * Plugin info
 * 
 * @return array Info
 */
function ticon_info()
{
    global $lang, $mybb;
    ticon_lang();
    $destroy = <<<EOT
<p>
    <a style="color: red; font-weight: bold" href="index.php?module=config-plugins&amp;action=deactivate&amp;uninstall=1&amp;destroy=1&amp;plugin=ticon&amp;my_post_key={$mybb->post_code}">
        {$lang->ticon_destroy}
    </a>
</p>
EOT;
    
	return [
		'name'			=> $lang->ticon_title,
		'description'	=> $lang->ticon_desc.$destroy,
		'website'		=> $lang->ticon_url,
		'author'		=> 'chack1172',
		'authorsite'	=> $lang->ticon_chack1172,
		'version'		=> '1.1',
		'compatibility'	=> '18*',
		'codename'		=> 'ticon'
	];
}

function ticon_activate()
{   
}

function ticon_deactivate()
{
}

/** 
 *
 * Install the plugin
 * 
 */
function ticon_install()
{
    global $db, $mybb;
    
    $collation = $db->build_create_table_collation();
    $db->write_query("
        CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."threadicons` (
            `tid` int NOT NULL auto_increment,
            `icon` varchar(255) NOT NULL default '',
            PRIMARY KEY  (`tid`)
        ) ENGINE=MyISAM{$collation}
    ");
    
    $templates = [
        'forumdisplay_thread_icon_custom' => '<img src="{$ticon}" alt="" style="max-width: {$mybb->settings[\'ticon_width\']}px; max-height: {$mybb->settings[\'ticon_height\']}px">',
        'posticons_custom' => '<tr>
    <td class="trow1">
        <strong>{$lang->ticon_custom}</strong>
    </td>
    <td class="trow1">
        {$current_icon}
        <input class="fileupload" name="ticon" type="file">
    </td>
</tr>',
        'posticons_custom_edit' => '<div class="ticon_current">
	<div style="display: inline-block; vertical-align: middle">
		{$ticon}
	</div>
	<div style="display: inline-block; vertical-align: middle">
		<label><input type="radio" name="ticon_remove" value="0" checked> {$lang->ticon_noedit}</label>
		<br />
		<label><input type="radio" name="ticon_remove" value="1"> {$lang->ticon_remove}</label>
	</div>
</div>
<br />
<strong>{$lang->ticon_edit}</strong>
<br />',
    ];
    
    foreach($templates as $name => $content)
    {
        $insert_array[] = [
            'title' => $name,
            'template' => $db->escape_string($content),
            'sid' => '-2',
            'version' => '1807',
            'dateline' => time(),
        ];
    }
    $db->insert_query_multiple('templates', $insert_array);
    
    $group = [
        'name' => 'ticon',
		'title' => 'Konu Başına İkon Ekleme Ayarları',
		'description' => 'Konu başına ikon ekleme eklentisinin ayarlarını buradan yapabilirsiniz.',
        'disporder' => 1,
		'isdefault' => 0,
    ];
    $gid = $db->insert_query('settinggroups', $group);
    
    $settings = [
        'ticon_width' => [
            'title' => 'İkonun Maksimum Genişliği',
            'description' => 'İkonun maksimum genişliğini ayarlayın.',
            'optionscode' => 'numeric',
            'value' => '64',
            'disporder' => 0,
        ],
        'ticon_height' => [
            'title' => 'İkonun Maksimum Yüksekliği',
            'description' => 'İkonun maksimum yüksekliğini ayarlayın.',
            'optionscode' => 'numeric',
            'value' => '64',
            'disporder' => 0,
        ],
    ];
    foreach($settings as $name => $setting)
    {
        $setting['name'] = $name;
        $setting['gid'] = $gid;
        
        $db->insert_query('settings', $setting);
    }
    
    rebuild_settings();
    
    mkdir(MYBB_ROOT.$mybb->settings['uploadspath'].TICON_PATH);
}

/** 
 *
 * Check if plugin is installed
 * 
 * @return boolean Status of the plugin
 */
function ticon_is_installed()
{
    global $db;
    
    if($db->table_exists("threadicons"))
    {
        return true;
    } else {
        return false;
    }
}

/** 
 *
 * Uninstall the plugin
 * 
 */
function ticon_uninstall()
{
    global $db, $mybb;
    
    ticon_rmdir(MYBB_ROOT.$mybb->settings['uploadspath'].TICON_PATH);
    
    $db->delete_query("settings", "name IN ('ticon_width','ticon_height')");
    $db->delete_query("settinggroups", "name='ticon'");
    
    rebuild_settings();
    
    $db->delete_query("templates", "title IN ('forumdisplay_thread_icon_custom', 'posticons_custom', 'posticons_custom_edit')");
    $db->drop_table("threadicons");
}

/** 
 *
 * Delete the plugin
 * 
 */
function ticon_destroy()
{
    global $mybb, $message, $lang;
    
    if($mybb->input['destroy'] == 1)
    {
        ticon_lang();
        
        // extra files and dirs to remove
        $extra_files = [
            "inc/languages/english/admin/ticon.lang.php",
            "inc/languages/english/ticon.lang.php",
            "inc/languages/italiano/admin/ticon.lang.php",
            "inc/languages/italiano/ticon.lang.php"
        ];


        if(!empty($extra_files))
        {
            // remove extra files and dirs
            foreach($extra_files as $file)
            {
                if(!file_exists(MYBB_ROOT.$file))
                {
                    continue;
                }

                if(is_dir(MYBB_ROOT.$file))
                {
                    ticon_rmdir(MYBB_ROOT.$file);
                } else {
                    unlink(MYBB_ROOT.$file);
                }
            }
        }
        // remove plugin file
        unlink(__FILE__);
        
        $message = $lang->ticon_destroyed;
    }
}

/**
 *
 * Remove directory and its content
 * 
 * @param  string $dir path of the directory to remove
 * @return boolean
 */
function ticon_rmdir($dir)
{
    if(file_exists($dir) && is_dir($dir))
    {
        $files = array_diff(scandir($dir), ['.','..']);
        foreach($files as $file)
        {
          (is_dir($dir."/".$file)) ? ticon_rmdir($dir."/".$file) : unlink($dir."/".$file);
        }
        return rmdir($dir); 
    } else {
        return true;
    }
}

/** 
 *
 * Include language file
 * 
 */
function ticon_lang()
{
    global $lang;
    $lang->load("ticon");
}

/** 
 *
 * Load thread custom icons of the category
 * 
 */
function ticon_icons()
{
    global $db, $thread_icons, $fid;
    
    $query = $db->write_query("
        SELECT t.tid, ti.icon
        FROM ".TABLE_PREFIX."threadicons ti
        LEFT JOIN ".TABLE_PREFIX."threads t ON (t.tid = ti.tid)
        WHERE t.fid = {$fid}
    ");
    
    $thread_icons = [];
    if($db->num_rows($query) > 0) {
        while($icon = $db->fetch_array($query)) {
            $tid = $icon['tid'];
            $thread_icons[$tid] = $icon['icon'];
        }
    }
}

/** 
 *
 * Show thread custom icon
 * 
 */
function ticon_thread()
{
    global $lang, $mybb, $thread, $templates, $icon, $thread_icons;
    
    $tid = $thread['tid'];
    if(isset($thread_icons[$tid]) && !empty($thread_icons[$tid]))
    {
        $ticon = $mybb->settings['bburl']."/".$thread_icons[$tid];
        eval('$icon = "'.$templates->get("forumdisplay_thread_icon_custom").'";');
    }
}

/** 
 *
 * Add form to upload icon in new thread page
 * 
 */
function ticon_newthread()
{
    global $lang, $templates, $posticons;
    
    eval('$posticons .= "'.$templates->get("posticons_custom").'";');
}

/** 
 *
 * Add form to upload icon in edit post page
 * 
 */
function ticon_editpost()
{
    global $lang, $templates, $posticons, $thread, $pid, $db, $mybb;
    
    if($pid == $thread['firstpost'])
    {
        $query = $db->simple_select("threadicons", "*", "tid = {$thread['tid']}");
        if($db->num_rows($query) > 0)
        {
            $ticon = $db->fetch_array($query);
            if(!empty($ticon['icon']))
            {
                $ticon = $mybb->settings['bburl']."/".$ticon['icon'];
                eval('$ticon = "'.$templates->get("forumdisplay_thread_icon_custom").'";');
                eval('$current_icon = "'.$templates->get("posticons_custom_edit").'";');
            }
        }
        
        eval('$posticons .= "'.$templates->get("posticons_custom").'";');
    }
}

/** 
 *
 * Validate uploaded icon
 * 
 * @param  array &$data
 * @return boolean
 */
function ticon_validate_icon(&$data)
{
    global $lang, $ticon;
    if(!empty($_FILES['ticon']['name']) && !empty($_FILES['ticon']['type']))
    {
        if($_FILES['ticon']['size'] > 0)
        {
            $ticon = $_FILES['ticon'];
            
            if(!is_uploaded_file($ticon['tmp_name']))
            {
                $data->set_error("ticon_uploadfailed");
                return false;
            }

            $ext = get_extension(my_strtolower($ticon['name']));
            if(!preg_match("#^(gif|jpg|jpeg|jpe|bmp|png)$#i", $ext))
            {
                $data->set_error("ticon_type");
                return false;
            }
        }
    }
}

/** 
 *
 * Upload custom icon and insert it in the database
 * 
 */
function ticon_insert_icon()
{
    global $db, $mybb, $ticon, $tid;
    
    if($mybb->input['ticon_remove'] == 1)
    {
        require_once(MYBB_ROOT . "inc/functions_upload.php");
        $query = $db->simple_select("threadicons", "*", "tid = {$tid}");
        if($db->num_rows($query) > 0)
        {
            $icon = $db->fetch_array($query);
            delete_uploaded_file($icon['icon']);
        }
        $db->delete_query("threadicons", "tid = {$tid}");
    }
    
    if(!empty($ticon['name']))
    {
        require_once(MYBB_ROOT . "inc/functions_upload.php");

        $ext = get_extension(my_strtolower($ticon['name']));
        $time = TIME_NOW;
        $filename = "thread_{$tid}_{$time}.{$ext}";
        $iconpath = str_replace("./", "", $mybb->settings['uploadspath']).TICON_PATH;
        $file = upload_file($ticon, $iconpath, $filename);
        if($file['error'] || !file_exists($iconpath."/".$filename))
        {
            delete_uploaded_file($iconpath."/".$filename);
            return false;
        }

        $query = $db->simple_select("threadicons", "*", "tid = {$tid}");
        if($db->num_rows($query) > 0)
        {
            $icon = $db->fetch_array($query);
            delete_uploaded_file($icon['icon']);
            $db->update_query("threadicons", ["icon" => $iconpath."/".$filename], "tid = {$tid}");
        }
        else
        {
            $data_array = [
                'tid' => $tid,
                'icon' => $iconpath."/".$filename,
            ];
            $db->insert_query("threadicons", $data_array);
        }
    }
}