<?php
/*
 Plugin Name: Custom Plugin
 Plugin URI: https://josemalcher.net
 Description: Plugin de Estudos
 Version: 1.0
 Author: José Malcher Jr
 Author URI: https://josemalcher.net
 License: GPL2
 */

define("PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define("PLUGIN_URL",      plugins_url(__FILE__));

function add_my_custom_menu() {
	add_menu_page(
		'customplugin',
		'Custom Plugin',
		'manage_options',
		'custom-plugin',
		'list_function',
		"dashicons-dashboard",
		11 );
	add_submenu_page(
		"custom-plugin",
		"Add New",
		"Add New",
		"manage_options",
		"add-new",
		"add_new_function"
	);
	add_submenu_page(
		"custom-plugin",
		"All Pages",
		"All Pages",
		"manage_options",
		"list_function",
		"list_function"
	);
}

add_action( 'admin_menu', 'add_my_custom_menu' );

function add_new_function(){
	include_once PLUGIN_DIR_PATH."/views/add-new.php";
}

function list_function(){
	include_once PLUGIN_DIR_PATH."/views/all-page.php";
}