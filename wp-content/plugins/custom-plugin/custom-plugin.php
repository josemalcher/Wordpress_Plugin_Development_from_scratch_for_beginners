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

/** Step 1. */
function add_my_custom_menu() {
	add_menu_page(
		'Custom Plugin',
		'Custom Plugin',
		'manage_options',
		'custom-plugin',
		'custom_plugin_callback_function',
		"dashicons-dashboard",
	11);
}

/** Step 2 (from text above). */
add_action( 'admin_menu', 'add_my_custom_menu' );

/** Step 3. */
function custom_plugin_callback_function() {
	echo "<h1>Título</h1>";
}