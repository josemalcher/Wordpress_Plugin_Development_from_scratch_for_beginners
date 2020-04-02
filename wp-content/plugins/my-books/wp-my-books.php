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
/*
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
}*/

function my_book_include_assets() {
	$slug           = '';
	$pages_includes = array(
		"book-list",
		"edit-book",
		"add-new",
		"book-new",
		"add-author",
		"remove-author",
		"add-student",
		"remove-student",
		"course-tracker"
	);
	$currentPage    = $_GET['page'];
	if ( in_array( $currentPage, $pages_includes ) ) {
		wp_enqueue_style( "bootstrap_my_books", MY_BOOK_PLUGIN_URL   . "/assets/css/bootstrap.min.css", '' );
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
		"Add New Author",
		"Add New Author",
		"manage_options",
		"add-author",
		"my_author_add" );
	add_submenu_page(
		"book-list",
		"Manage Author",
		"Manage Author",
		"manage_options",
		"remove-author",
		"my_author_remove" );
	add_submenu_page(
		"book-list",
		"Add New Student",
		"Add New Student",
		"manage_options",
		"add-student",
		"my_student_add" );
	add_submenu_page(
		"book-list",
		"Manage Student",
		"Manage Student",
		"manage_options",
		"remove-student",
		"my_student_remove" );
	add_submenu_page(
		"book-list",
		"Course Tracker",
		"Course Tracker",
		"manage_options",
		"course-tracker",
		"course_tracker" );


	add_submenu_page(
		null, // ocultar link do menu
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

function my_author_add() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . "/views/author-add.php";
}

function my_author_remove() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . "/views/manage-author.php";
}

function my_student_add() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . "/views/student-add.php";
}

function my_student_remove() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . "/views/manage-student.php";
}

function course_tracker() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . "/views/course-tracker.php";
}

function my_book_table() {
	global $wpdb;

	return $wpdb->prefix . "my_books";
}

function my_authors_table() {
	global $wpdb;

	return $wpdb->prefix . "my_authors"; // wp_my_authors
}

function my_students_table() {
	global $wpdb;

	return $wpdb->prefix . "my_students"; // wp_my_students
}

function my_enrol_table() {
	global $wpdb;

	return $wpdb->prefix . "my_enrol"; // wp_my_enrol
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

	$sql2 = "
           CREATE TABLE `" . my_authors_table() . "` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) DEFAULT NULL,
            `fb_link` text,
            `about` text,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1
            ";
	dbDelta( $sql2 );

	$sql3 = "
                CREATE TABLE `" . my_students_table() . "` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) DEFAULT NULL,
                `email` varchar(255) DEFAULT NULL,
                `user_login_id` int(11) DEFAULT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1

     ";
	dbDelta( $sql3 );

	$sql4 = "
          CREATE TABLE `" . my_enrol_table() . "` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `student_id` int(11) NOT NULL,
            `book_id` int(11) NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1
     ";
	dbDelta( $sql4 );

	// User ROLE Registration
	add_role("wp_book_user_key", "My Book user", array(
		"read"=>true
	));
}

register_activation_hook( __FILE__, "my_book_generates_table_script" );

function drop_table_plugin_books() {
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS " . my_book_table() );
	$wpdb->query( "DROP TABLE IF EXISTS " . my_authors_table() );
	$wpdb->query( "DROP TABLE IF EXISTS " . my_students_table() );
	$wpdb->query( "DROP TABLE IF EXISTS " . my_enrol_table() );

	//removing user_role <----
	if ( get_role( "wp_book_user_key" ) ) {
		remove_role( "wp_book_user_key" );
	}

}

register_deactivation_hook( __FILE__, "drop_table_plugin_books" );
// register_uninstall_hook(__FILE__,"drop_table_plugin_books");

// form ADD AJAX
add_action( "wp_ajax_mybooklibrary", "my_book_ajax_handler" );
function my_book_ajax_handler() {
	global $wpdb;
	include_once MY_BOOK_PLUGIN_DIR_PATH . "/library/my_booklibrary.php";
	wp_die();
}