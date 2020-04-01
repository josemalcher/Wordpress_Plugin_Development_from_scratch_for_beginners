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
	define( "MY_BOOK_PLUGIN_DIR_PATH", plugin_dir_path( __FILE__ ) );
}
if ( ! defined( "MY_BOOK_PLUGIN_URL" ) ) {
	define( "MY_BOOK_PLUGIN_URL", plugins_url() . "/my-books" );
}
define( "PLUGIN_VERSION", "1.0" );

function my_book_include_assets() {
	//styles
//	wp_enqueue_style( "bootstrap_my_books", MY_BOOK_PLUGIN_URL   . "/assets/css/bootstrap.min.css", '' );
	wp_enqueue_style( "datatable", MY_BOOK_PLUGIN_URL . "/assets/css/jquery.dataTables.min.css", '' );
	wp_enqueue_style( "notifybar", MY_BOOK_PLUGIN_URL . "/assets/css/jquery.notifyBar.css", '' );
	wp_enqueue_style( "styles", MY_BOOK_PLUGIN_URL . "/assets/css/styles.css", '' );

	//scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery.js', MY_BOOK_PLUGIN_URL . '/assets/js/jquery.js', '', true );
	wp_enqueue_script( 'bootstrap.min.js', MY_BOOK_PLUGIN_URL . '/assets/js/bootstrap.min.js', '', true );
	wp_enqueue_script( 'validation.min.js', MY_BOOK_PLUGIN_URL . '/assets/js/jquery.validate.min.js', '', true );
	wp_enqueue_script( 'datatable.min.js', MY_BOOK_PLUGIN_URL . '/assets/js/jquery.dataTables.min.js', '', true );
	wp_enqueue_script( 'jquery.notifyBar.js', MY_BOOK_PLUGIN_URL . '/assets/js/jquery.notifyBar.js', '', true );
	wp_enqueue_script( 'scripts.js', MY_BOOK_PLUGIN_URL . '/assets/js/scripts.js', '', true );

	wp_localize_script( "scripts.js", "mybookajaxurl", admin_url( "admin-ajax.php" ) );
}

add_action( "init", "my_book_include_assets" );

function my_book_plugin_menus() {
	add_menu_page(
		"My Book",
		"My Book",
		"manage_options",
		"book-list",
		"my_book_list",
		"dashicons-book-alt",
		30 );
	add_submenu_page(
		"book-list",
		"Book List",
		"Book List",
		"manage_options",
		"book-list",
		"my_book_list" );
	add_submenu_page(
		"book-list",
		"Add Book",
		"Add Book",
		"manage_options",
		"book-new",
		"my_book_add" );
	add_submenu_page(
		"book-list",
		"",
		"",
		"manage_options",
		"edit-book",
		"my_book_update" );

}

add_action( "admin_menu", "my_book_plugin_menus" );

//callback functions to menus and submenus
function my_book_list() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . "/views/book-list.php";
}

function my_book_add() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . '/views/book-add.php';
}
function my_book_update() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . '/views/book-edit.php';
}

function my_book_table() {
	global $wpdb;
	return $wpdb->prefix . "my_books";
}

function my_book_generates_table_script() {
	global $wpdb;
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	$sql = "  CREATE TABLE `" . my_book_table() . "` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `author` varchar(255) DEFAULT NULL,
    `about` text,
    `book_image` text,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	dbDelta( $sql );
}
register_activation_hook( __FILE__, "my_book_generates_table_script" );

function drop_table_plugin_books() {
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS " . my_book_table() );
}
register_deactivation_hook( __FILE__, "drop_table_plugin_books" );
// register_uninstall_hook(__FILE__,"drop_table_plugin_books");

// form ADD AJAX
add_action("wp_ajax_mybooklibrary", "my_book_ajax_handler");
function my_book_ajax_handler(){
	global $wpdb;
	if($_REQUEST['param'] == "save_book"){
		//print_r($_REQUEST); // Save Data DB table
		$wpdb->insert(
			my_book_table(),
			array(
				"name" => $_REQUEST['name'],
				"author" => $_REQUEST['author'],
				"about" => $_REQUEST['about'],
				"book_image" => $_REQUEST['image_name'],
			)
		);
		echo json_encode(array("status"=>1, "message"=>"Book created successfully"));
	}elseif ($_REQUEST['param'] == "edit_book"){
		$wpdb->update(my_book_table(), array(
			"name" => $_REQUEST['name'],
			"author" => $_REQUEST['author'],
			"about" => $_REQUEST['about'],
			"book_image" => $_REQUEST['image_name']
		), array(
			"id" => $_REQUEST['book_id']
		));
		echo json_encode(array("status"=>1, "message"=>"Book UPDATE successfully"));
	}
	wp_die();
}