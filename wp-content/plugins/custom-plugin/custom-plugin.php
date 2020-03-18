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

function add_my_custom_menu() {
	add_menu_page(
		'Custom Plugin',
		'Custom Plugin',
		'manage_options',
		'custom-plugin',
		'custom_plugin_callback_function',
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
		"all-page",
		"list_function"
	);
}

add_action( 'admin_menu', 'add_my_custom_menu' );

function custom_plugin_callback_function() {
	echo "<h1>Título</h1>";
}

function add_new_function(){
	echo "<h1>Add New</h1>";
}

function list_function(){
	echo "<h1>List's</h1>";
}