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
if(!defined("ABSPATH"))
	exit;
if(!defined("MY_BOOK_PLUGIN_DIR_PATH"))
	define( "PLUGIN_DIR_PATH", plugin_dir_path(__FILE__) );
if(!defined("MY_BOOK_PLUGIN_URL"))
	define( "MY_BOOK_PLUGIN_URL", plugins_url()."/my-books" );
define( "PLUGIN_VERSION", "1.0" );

