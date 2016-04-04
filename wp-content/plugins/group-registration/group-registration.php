<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 3/27/16
 * Time: 10:35 PM
 */
/*
Plugin Name: group-registration
Description: Плагин для регистрации группы
Version: 1.0
Author: Sergey Demidov
Author URI: http://omelchuck.ru
License: GPL2
*/
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : aspirin_1988@mail.ru)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
include ('includes/install.php');
add_action( 'admin_menu','add_menu');
reg_param();
function add_menu()  {
    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Add user group', 'add user group', 0, REG_GR_PLUGIN_FOLDER, 'get_main', REG_GR_PLUGIN_URL . 'images/icbw-16x16.png');

    //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function )
    add_submenu_page( REG_GR_PLUGIN_FOLDER , 'Add_group', 'Add group', 1, REG_GR_PLUGIN_FOLDER,'get_main');
    add_submenu_page( REG_GR_PLUGIN_FOLDER , 'Add_advanced_group', 'Add advanced group', 2, 'index','get_main1');
}
function reg_param()
{
    if( ! defined( 'REG_GR_PLUGIN_DIR' ) ){ define( 'REG_GR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); }
    // Plugin Folder URL
    if ( ! defined( 'REG_GR_PLUGIN_URL' ) ) { define( 'REG_GR_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); }

    // Plugin folder name
    if( ! defined( 'REG_GR_PLUGIN_FOLDER' ) ){ define('REG_GR_PLUGIN_FOLDER', basename(dirname(__FILE__) )); }
    // Plugin Root File QPath
    if ( ! defined( 'REG_GR_PLUGIN_FILE' ) ){ define( 'REG_GR_PLUGIN_FILE', __FILE__ ); }
}

function get_main()
{
    echo '<div class="fields_header"><div class="header" ><h1>Добавление списка разрешенных групп</h1> </div>';
    global $current_user;
    get_currentuserinfo();
    if (isset($_POST['submit']))
    {
        if (isset($_POST['name']) && isset($_POST['description'])) {
            $add=false;
//        add_group($current_user,(string)$_POST['name'],(string)$_POST['description']);
            $add=add_direct(1, (string)$_POST['name'], (string)$_POST['description'], $current_user);
            if ($add)
            {
                echo '<div class="mes_success"><h3>Запись была успешно добавлена!</h3></div>';
            }
            else
            {
                echo '<div class="mes_error"><h3>Входе операции добавления произошла ошибка!</h3></div>';
            }
        }
    }
    if (isset($_POST['edit']))
    {
        $edit=false;
        if (isset($_POST['name']) && isset($_POST['description'])) {
            $edit=edit_direct(1, $_POST['edit'],$_POST['name'],$_POST['description']);
            }
        if ($edit)
        {
            echo '<div class="mes_success"><h3>Запись былы успешно отредактирована!</h3></div>';
        }
        else
        {
            echo '<div class="mes_error"><h3>Входе операции редактирования произошла ошибка!</h3></div>';
        }
    }
    if (isset($_POST['del']))
    {
        $del=false;
        $del=del_direct(1,$_POST['del']);
        if ($del)
        {
            echo '<div class="mes_success"><h3>Запись была успешно удалена!</h3></div>';
        }
        else
        {
            echo '<div class="mes_error"><h3>Входе операции удаления произошла ошибка!</h3></div>';
        }
    }

    $template = file_get_contents(REG_GR_PLUGIN_DIR.'/admin.html');
    $res=show_all_directory(1);
    $tr='';
    foreach($res as $key=>$val)
    {
        $sel = 'checked';
        if ($val->gr_create)
        {
            $sel=  'checked="checked"';
        }
        else
        {
            $sel='';
        }
        $tr.='<form name="edit" method="post" action=""><tr><td>'.$val->id_direct.'</td><td><input type="text" name="name" value="'.$val->name.'"></td><td><input type="text" name="description" value="'.$val->description.'"></td><td><input type="checkbox" '.$sel.'"></td><td>'.$val->display_name.'</td><td><input type="submit" class="del" name="del" value="'.$val->id_direct.'"><input type="submit" class="edit" name="edit" value="'.$val->id_direct.'"></td></tr></form>';
    }
    $template=str_replace('{rows}',$tr,$template);
    echo  $template;
}

function get_main1()
{
    echo '<div class="fields_header"><div class="header" ><h1>Добавление списка разрешенных групп</h1> </div>';
    global $current_user;
    get_currentuserinfo();
    if (isset($_POST['submit']))
    {
        if (isset($_POST['name']) && isset($_POST['description'])) {
            $add=false;
//        add_group($current_user,(string)$_POST['name'],(string)$_POST['description']);
            $add=add_direct(2, (string)$_POST['name'], (string)$_POST['description'], $current_user);
            if ($add)
            {
                echo '<div class="mes_success"><h3>Запись была успешно добавлена!</h3></div>';
            }
            else
            {
                echo '<div class="mes_error"><h3>Входе операции добавления произошла ошибка!</h3></div>';
            }
        }
    }
    if (isset($_POST['edit']))
    {
        $edit=false;
        if (isset($_POST['name']) && isset($_POST['description'])) {
            $edit=edit_direct(2, $_POST['edit'],$_POST['name'],$_POST['description']);
        }
        if ($edit)
        {
            echo '<div class="mes_success"><h3>Запись былы успешно отредактирована!</h3></div>';
        }
        else
        {
            echo '<div class="mes_error"><h3>Входе операции редактирования произошла ошибка!</h3></div>';
        }
    }
    if (isset($_POST['del']))
    {
        $del=false;
        $del=del_direct(2,$_POST['del']);
        if ($del)
        {
            echo '<div class="mes_success"><h3>Запись была успешно удалена!</h3></div>';
        }
        else
        {
            echo '<div class="mes_error"><h3>Входе операции удаления произошла ошибка!</h3></div>';
        }
    }

    $template = file_get_contents(REG_GR_PLUGIN_DIR.'/admin.html');
    $res=show_all_directory(2);
    $tr='';
    foreach($res as $key=>$val)
    {
        $sel = 'checked';
        if ($val->gr_create)
        {
            $sel=  'checked="checked"';
        }
        else
        {
            $sel='';
        }
        $tr.='<form name="edit" method="post" action=""><tr><td>'.$val->id_direct.'</td><td><input type="text" name="name" value="'.$val->name.'"></td><td><input type="text" name="description" value="'.$val->description.'"></td><td><input type="checkbox" '.$sel.'"></td><td>'.$val->display_name.'</td><td><input type="submit" class="del" name="del" value="'.$val->id_direct.'"><input type="submit" class="edit" name="edit" value="'.$val->id_direct.'"></td></tr></form>';
    }
    $template=str_replace('{rows}',$tr,$template);
    echo  $template;
}
