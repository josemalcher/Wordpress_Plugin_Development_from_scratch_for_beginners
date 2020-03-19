# Wordpress Plugin Development from scratch for beginners

https://www.youtube.com/playlist?list=PLT9miexWCpPUQkQwL-COHmo0Jd0qxLjTn

## <a name="indice">Índice</a>

1. [Wordpress plugin basics and introduction](#parte1)     
2. [Wordpress Plugin Comment Section](#parte2)     
3. [Wordpress Plugin Menus on Activation](#parte3)     
4. [Wordpress Submenus of Plugin Menu](#parte4)     
5. [Manage Wordpress plugin code files](#parte5)     
6. [Link Asset Files to Wordpress Plugin](#parte6)     
7. [Link Js, CSS, Images to Plugin file](#parte7)     
8. [Make Database Table on Plugin Activation](#parte8)     
9. [Drop Table when Plugin Uninstalls/Delete](#parte9)     
10. [Wordpress Page on plugin activation](#parte10)     
11. [Delete Wordpress page by Plugin](#parte11)     
12. [Custom JavaScript on Wordpress page](#parte12)     
13. [Simple Ajax Request in Wordpress](#parte13)     
14. [Post Form data in Wordpress Plugin](#parte14)     
15. [About Wordpress global $wpdb Object](#parte15)     
16. [Insert data to Wordpress Database](#parte16)     
17. [Wordpress Update/Delete to Database](#parte17)     
18. [AJAX Request by Action hook Wordpress](#parte18)     
19. [By wp_ajax_{action} Post Data to Server](#parte19)     
20. [About Shortcodes Concept in Wordpress](#parte20)     
21. [Parameterized Shortcodes in Wordpress](#parte21)     
22. [Uploading from media library to plugin](#parte22)     
23. [Use of default wp_editor in Wordpress](#parte23)     
24. [My Book Custom Plugin Introduction #1](#parte24)     
25. ["My Book" Plugin comment & constants #2](#parte25)     
26. ["My Book" Plugin asset libraries #3](#parte26)     
27. ["My Book" Plugin Menus/Submenus #4](#parte27)     
28. ["My Book" Plugin Create/Drop Table #5](#parte28)     
29. ["My Book" Plugin Internal Pages #6](#parte29)     
30. ["My Book" Plugin Validations/Media #7](#parte30)     
31. ["My Book" Plugin Insert/Show Data #8](#parte31)     
32. ["My Book" Plugin Update/Delete Data #9](#parte32)     
33. ["My Book" Plugin Extended features demo](#parte33)     
34. ["My Book" Extended: Tables, Submenus](#parte34)     
35. ["My Book" Extended: Building Layouts](#parte35)     
36. [Save & List Author's section data](#parte36)     
37. [Save & List Student's section data](#parte37)     
38. [Front-end page of plugin to list books](#parte38)     
39. ["page-template" hook | Book list layout](#parte39)     
40. [Listing Created books to Frontend UI](#parte40)     
41. [Login and Logout Filter hooks Wordpress](#parte41)     
---


## <a name="parte1">1 - Wordpress plugin basics and introduction</a>



[Voltar ao Índice](#indice)

---


## <a name="parte2">2 - Wordpress Plugin Comment Section</a>

- https://www.youtube.com/watch?v=MKsHl_-rqw

- wp-content/plugins/custom-plugin/custom-plugin.php

```php
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


```



[Voltar ao Índice](#indice)

---


## <a name="parte3">3 - Wordpress Plugin Menus on Activation</a>

```php
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
```

[Voltar ao Índice](#indice)

---


## <a name="parte4">4 - Wordpress Submenus of Plugin Menu</a>

```php
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


```

[Voltar ao Índice](#indice)

---


## <a name="parte5">5 - Manage Wordpress plugin code files</a>

- https://www.youtube.com/watch?v=XBpXbZVYr8M

```php

define("PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define("PLUGIN_URL",      plugins_url(__FILE__));

function list_function(){
	include_once PLUGIN_DIR_PATH."/views/all-page.php";
}

function add_new_function(){
	include_once PLUGIN_DIR_PATH."/views/add-new.php";
}

```


[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - Link Asset Files to Wordpress Plugin</a>

1. Make folders to contain CSS, JS, Images, Font families, Plugin PHP files etc.
2. All assets you can further move into /custom-plgin/assets/
3. And All php views files we can put into /custom-plugin/views/

- wp-content/plugins/custom-plugin/views/all-page.php

```php
<link rel="stylesheet" href="<?=PLUGIN_URL.'/custom-plugin/assets/css/style.css';?>">

<?php
	echo "<h1>List All</h1>";
	
?>

<script src="<?=PLUGIN_URL.'/custom-plugin/assets/js/script.js';?>"></script>

```

[Voltar ao Índice](#indice)

---


## <a name="parte7">7 - Link Js, CSS, Images to Plugin file</a>



[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - Make Database Table on Plugin Activation</a>



[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - Drop Table when Plugin Uninstalls/Delete</a>



[Voltar ao Índice](#indice)

---


## <a name="parte10">10 - Wordpress Page on plugin activation</a>



[Voltar ao Índice](#indice)

---


## <a name="parte11">11 - Delete Wordpress page by Plugin</a>



[Voltar ao Índice](#indice)

---


## <a name="parte12">12 - Custom JavaScript on Wordpress page</a>



[Voltar ao Índice](#indice)

---


## <a name="parte13">13 - Simple Ajax Request in Wordpress</a>



[Voltar ao Índice](#indice)

---


## <a name="parte14">14 - Post Form data in Wordpress Plugin</a>



[Voltar ao Índice](#indice)

---


## <a name="parte15">15 - About Wordpress global $wpdb Object</a>



[Voltar ao Índice](#indice)

---


## <a name="parte16">16 - Insert data to Wordpress Database</a>



[Voltar ao Índice](#indice)

---


## <a name="parte17">17 - Wordpress Update/Delete to Database</a>



[Voltar ao Índice](#indice)

---


## <a name="parte18">18 - AJAX Request by Action hook Wordpress</a>



[Voltar ao Índice](#indice)

---


## <a name="parte19">19 - By wp_ajax_{action} Post Data to Server</a>



[Voltar ao Índice](#indice)

---


## <a name="parte20">20 - About Shortcodes Concept in Wordpress</a>



[Voltar ao Índice](#indice)

---


## <a name="parte21">21 - Parameterized Shortcodes in Wordpress</a>



[Voltar ao Índice](#indice)

---


## <a name="parte22">22 - Uploading from media library to plugin</a>



[Voltar ao Índice](#indice)

---


## <a name="parte23">23 - Use of default wp_editor in Wordpress</a>



[Voltar ao Índice](#indice)

---


## <a name="parte24">24 - My Book Custom Plugin Introduction #1</a>



[Voltar ao Índice](#indice)

---


## <a name="parte25">25 - "My Book" Plugin comment & constants #2</a>



[Voltar ao Índice](#indice)

---


## <a name="parte26">26 - "My Book" Plugin asset libraries #3</a>



[Voltar ao Índice](#indice)

---


## <a name="parte27">27 - "My Book" Plugin Menus/Submenus #4</a>



[Voltar ao Índice](#indice)

---


## <a name="parte28">28 - "My Book" Plugin Create/Drop Table #5</a>



[Voltar ao Índice](#indice)

---


## <a name="parte29">29 - "My Book" Plugin Internal Pages #6</a>



[Voltar ao Índice](#indice)

---


## <a name="parte30">30 - "My Book" Plugin Validations/Media #7</a>



[Voltar ao Índice](#indice)

---


## <a name="parte31">31 - "My Book" Plugin Insert/Show Data #8</a>



[Voltar ao Índice](#indice)

---


## <a name="parte32">32 - "My Book" Plugin Update/Delete Data #9</a>



[Voltar ao Índice](#indice)

---


## <a name="parte33">33 - "My Book" Plugin Extended features demo</a>



[Voltar ao Índice](#indice)

---


## <a name="parte34">34 - "My Book" Extended: Tables, Submenus</a>



[Voltar ao Índice](#indice)

---


## <a name="parte35">35 - "My Book" Extended: Building Layouts</a>



[Voltar ao Índice](#indice)

---


## <a name="parte36">36 - Save & List Author's section data</a>



[Voltar ao Índice](#indice)

---


## <a name="parte37">37 - Save & List Student's section data</a>



[Voltar ao Índice](#indice)

---


## <a name="parte38">38 - Front-end page of plugin to list books</a>



[Voltar ao Índice](#indice)

---


## <a name="parte39">39 - "page-template" hook | Book list layout</a>



[Voltar ao Índice](#indice)

---


## <a name="parte40">40 - Listing Created books to Frontend UI</a>



[Voltar ao Índice](#indice)

---


## <a name="parte41">41 - Login and Logout Filter hooks Wordpress</a>



[Voltar ao Índice](#indice)

---

