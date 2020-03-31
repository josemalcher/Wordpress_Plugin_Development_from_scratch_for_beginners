<?php
/*
 Plugin Name: My Books
 Plugin URI: https://josemalcher.net
 Description: Plugin de Estudos - My Books - https://www.youtube.com/watch?v=rC5A_ixZ5nQ&list=PLT9miexWCpPUQkQwL-COHmo0Jd0qxLjTn&index=25
 Version: 1.0
 Author: José Malcher Jr
 Author URI: https://josemalcher.net
 License: GPL2
 */
if ( ! defined( "ABSPATH" ) ) {
	exit;
}
if ( ! defined( "MY_BOOK_PLUGIN_DIR_PATH" ) ) {
	define( "PLUGIN_DIR_PATH", plugin_dir_path( __FILE__ ) );
}
if ( ! defined( "MY_BOOK_PLUGIN_URL" ) ) {
	define( "MY_BOOK_PLUGIN_URL", plugins_url() . "/my-books" );
}
define( "PLUGIN_VERSION", "1.0" );

function my_book_include_assets() {
	//styles
	wp_enqueue_style( "bootstrap", MY_BOOK_PLUGIN_URL . "/assets/css/bootstrap.min.css", '' );
	wp_enqueue_style( "datatable", MY_BOOK_PLUGIN_URL . "/assets/css/jquery.dataTables.min.css", '' );
	wp_enqueue_style( "notifybar", MY_BOOK_PLUGIN_URL . "/assets/css/jquery.notifyBar.css", '' );
	wp_enqueue_style( "style", MY_BOOK_PLUGIN_URL     . "/assets/css/styles.css", '' );

	//scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap.min.js',   MY_BOOK_PLUGIN_URL . '/assets/js/bootstrap.min.js', '', true );
	wp_enqueue_script( 'validation.min.js',  MY_BOOK_PLUGIN_URL . '/assets/js/jquery.validate.min.js', '', true );
	wp_enqueue_script( 'datatable.min.js',   MY_BOOK_PLUGIN_URL . '/assets/js/jquery.dataTables.min.js', '', true );
	wp_enqueue_script( 'jquery.notifyBar.js',MY_BOOK_PLUGIN_URL . '/assets/js/jquery.notifyBar.js', '', true );
	wp_enqueue_script( 'script.js',          MY_BOOK_PLUGIN_URL . '/my-books/assets/js/scripts.js', '', true );

	wp_localize_script( "script.js", "mybookajaxurl", admin_url( "admin-ajax.php" ) );
}

add_action( "init", "my_book_include_assets" );