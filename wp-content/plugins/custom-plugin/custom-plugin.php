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
define("PLUGIN_URL",      plugins_url());

function add_my_custom_menu() {
	add_menu_page(
		"Custom Plugin",
		"Custom Plugin",
		"manage_options",
		"custom-plugin",
		"list_function",
		"dashicons-dashboard",
		11 );
	add_submenu_page(
		"custom-plugin",
		" Custom Plugin",
		 "List All",
		 "manage_options",
		"custom-plugin",
		 "list_function"
	);
	add_submenu_page(
		"custom-plugin",
		 "Add New",
		 "Add New",
		  "manage_options",
		 "custom-plugin-add-new",
		   "add_new_function"
	);
}
add_action( 'admin_menu', 'add_my_custom_menu' );

function list_function(){
	include_once PLUGIN_DIR_PATH."/views/all-page.php";
}

function add_new_function(){
	include_once PLUGIN_DIR_PATH."/views/add-new.php";
}

