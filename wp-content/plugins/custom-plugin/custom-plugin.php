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

define( "PLUGIN_DIR_PATH", plugin_dir_path( __FILE__ ) );
define( "PLUGIN_URL", plugins_url() );
define( "PLUGIN_VERSION", "1.0" );

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

function list_function() {
	include_once PLUGIN_DIR_PATH . "/views/all-page.php";
}

function add_new_function() {
	include_once PLUGIN_DIR_PATH . "/views/add-new.php";
}

function custon_plugin_assets() {
	// css files
	wp_enqueue_style(
		"cpl_style", // unique name for CSS file
		PLUGIN_URL . "/custom-plugin/assets/css/style.css",
		'', // Dependecy on outher files
		PLUGIN_VERSION
	); // CSS file path

	wp_enqueue_script(
		"cpl_script",
		PLUGIN_URL . "/custom-plugin/assets/js/script.js",
		'',
		PLUGIN_VERSION,
		true // in footer
	);
}

add_action( "init", "custon_plugin_assets" );

function custom_plugin_tables() {
	global $wpdb;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	if ( count( $wpdb->get_var( 'SHOW TABLES LIKE "wp_custom_plugin"' ) ) == 0 ) {

		$sql_query_to_create_table = "
	CREATE TABLE `wp_custom_plugin` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `name` varchar(150) DEFAULT NULL,
     `email` varchar(150) DEFAULT NULL,
     `phone` varchar(150) DEFAULT NULL,
     `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1";

		dbDelta( $sql_query_to_create_table );

	}
}

register_activation_hook( __FILE__, 'custom_plugin_tables' );

// table deleting code
function deactivate_table() {
	// uninstall mysql code
	global $wpdb;
	$wpdb->query( "DROP table IF Exists wp_custom_plugin" );

}

//If we want to delete table while deactivates then we should use
register_deactivation_hook( __FILE__, "deactivate_table" );

// If we want to delete then we have to change action hook,
//register_uninstall_hook( __FILE__, "deactivate_table" );

function create_page(){
	// code for create page
$page = array();
   $page['post_title']= "Custom Plugin Online Web Tutor";
   $page['post_content']= "Learning Platform for Wordpress Customization for Themes, Plugin and Widgets";
   $page['post_status'] = "publish";
   $page['post_slug'] = "custom-plugin-online-web-tutor";
   $page['post_type'] = "page";

  wp_insert_post($page); // post_id as return value

}

register_activation_hook(__FILE__,"create_page");