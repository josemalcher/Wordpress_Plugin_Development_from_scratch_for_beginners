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

- https://developer.wordpress.org/reference/functions/wp_enqueue_style/

```
wp_enqueue_style - CSS
wp_enqueue_script - Script

add_action("wp_enqueue_scripts", "function") 

```

```php
function custon_plugin_assets(){
	// css files
	wp_enqueue_style(
		"cpl_style", // unique name for CSS file
		PLUGIN_URL."/custom-plugin/assets/css/style.css",
	'', // Dependecy on outher files
	PLUGIN_VERSION
	); // CSS file path

	wp_enqueue_script(
		"cpl_script",
		PLUGIN_URL. "/custom-plugin/assets/js/script.js",
	'',
	PLUGIN_VERSION,
	true // in footer
	);
}
add_action("init", "custon_plugin_assets");
```


[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - Make Database Table on Plugin Activation</a>

- https://developer.wordpress.org/reference/functions/register_activation_hook/

```php

function custom_plugin_tables(){
	global $wpdb;
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	if (count($wpdb->get_var('SHOW TABLES LIKE "wp_custom_plugin"')) == 0){

		$sql_query_to_create_table = "
	CREATE TABLE `wp_custom_plugin` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `name` varchar(150) DEFAULT NULL,
     `email` varchar(150) DEFAULT NULL,
     `phone` varchar(150) DEFAULT NULL,
     `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1";

		dbDelta($sql_query_to_create_table);

	}
}
register_activation_hook(__FILE__,'custom_plugin_tables');
```


[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - Drop Table when Plugin Uninstalls/Delete</a>

```php
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
```

[Voltar ao Índice](#indice)

---


## <a name="parte10">10 - Wordpress Page on plugin activation</a>

- https://developer.wordpress.org/reference/functions/wp_insert_post/

```php

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
```

[Voltar ao Índice](#indice)

---


## <a name="parte11">11 - Delete Wordpress page by Plugin</a>

```php
//register id in wp-option
$post_id = wp_insert_post( $page ); // post_id as return value
add_option( "custom_plugin_page_id", $post_id );  // wp_options table from the name of custom_plugin_page_id

//delete page
$the_post_id = get_option( "custom_plugin_page_id" );
if ( ! empty( $the_post_id ) ) {
    wp_delete_post( $the_post_id, true );
}


```

[Voltar ao Índice](#indice)

---


## <a name="parte12">12 - Custom JavaScript on Wordpress page</a>

- https://developer.wordpress.org/reference/functions/wp_localize_script/

- https://developer.wordpress.org/reference/functions/admin_url/

```php
// (...)
	$objecto_array = array("name"=> "José Malcher jr",
	                       "site"=>"wwww.josemalcher.net",
						   "ajaxurl", admin_url("admin-ajax.php"));
	wp_localize_script("cpl_script", "online_web_tutor", $objecto_array);
}
add_action( "init", "custon_plugin_assets" );

function myJScode(){
	?>
<script type="text/javascript">
	//alert("Ola alert"); //in template front
	let on_line_tutor = {"admin_url": " <?=admin_url('admin-ajax.php'); ?> "}
	console.log(on_line_tutor);
</script>
<?php
}
add_action("wp_head", "myJScode");

```


[Voltar ao Índice](#indice)

---


## <a name="parte13">13 - Simple Ajax Request in Wordpress</a>

```php
if ( isset( $_REQUEST['action'] ) ) { // it checks the action param is set or not
	switch ( $_REQUEST['action'] ) {  // if set pass to switch method to match case
		case "custom_plugin_library":
			add_action( "admin_init", "add_custom_plugin_library" );
			function add_custom_plugin_library() { // function attached with the action hook
				global $wpdb;
				include_once PLUGIN_DIR_PATH . "/library/custom-plugin-lib.php"; // ajax handler file within /library folder
			}

			break;
	}
}

/*
 // Sugestão no comentário do vídeo
function add_custom_plugin_library_2(){
	global $wpdb;

	if(isset($_POST['action'])){
		switch ($_POST['action']){
			case "add_custom_plugin_library_2":
				global $wpdb;
				include_once PLUGIN_DIR_PATH . "/library/custom-plugin-lib.php"; // ajax handler file within /library folder
				break;
		}
	}
	wp_die(); // this is required to terminate immediately and return a proper response
}
add_action("wo_ajax_custom_plugin_library", "add_custom_plugin_library_2");

*/
```

[Voltar ao Índice](#indice)

---


## <a name="parte14">14 - Post Form data in Wordpress Plugin</a>

- wp-content/plugins/custom-plugin/views/add-new.php

```html
<h2>Form AJAX</h2>
<hr>
<form action="#" id="form_custom_add">
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row"><label for="input_name">Name</label></th>
            <td><input required name="input_name" type="text" id="input_name" value="" class="regular-text"></td>
        </tr>
        <tr>
            <th scope="row"><label for="input_email">E-mail</label></th>
            <td><input required name="input_email" type="text" id="input_email" value="" class="regular-text"></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit" class="button button-primary">Salve</button></td>
        </tr>

        </tbody>
    </table>
</form>


```

- wp-content/plugins/custom-plugin/assets/js/script.js

```js
    $("#form_custom_add").validate({
        submitHandler: function () {
            //console.log($("#form_custom_add").serialize());
            let post_data = $("#form_custom_add").serialize() + "&action=custom_plugin_library&param=post_form_data";
            //console.log(post_data);

            $.post(ajaxurl, post_data, function (response) {
                let data = $.parseJSON(response);
                console.log(data);
                console.log("Name: " + data.input_name + "Email: " + data.input_email);

            })

        }
    })
```



[Voltar ao Índice](#indice)

---


## <a name="parte15">15 - About Wordpress global $wpdb Object</a>

- https://codex.wordpress.org/Class_Reference/wpdb

```
$wpdb->query(" CUSTOM_QUERY FOR INSERT/UPDATE/DELETE ")
  
$wpdb->insert("TABLE_NAME","DATA")
 
$wpdb->udpate("TABLE_NAME","DATA");
  
$wpdb->delete("TABLE_NAME","DATA");

```

[Voltar ao Índice](#indice)

---


## <a name="parte16">16 - Insert data to Wordpress Database</a>

- 1. wpdb::insert( ‘table’, array( ‘column’ = ‘foo’, ‘field’ = ‘bar’ ) ) 
- 2. wpdb::insert( ‘table’, array( ‘column’ = ‘foo’, ‘field’ = 1337 ), array( ‘%s’, ‘%d’ ) )

```php
<?php
//simple insert operation on page refresh
global $wpdb;

/*
$wpdb->insert(
	"wp_custom_plugin",
	array(
		"name"  => "José",
		"email" => "email@jose.com.br",
		"phone" => "91980809922",
	)
)
*/

$wpdb->query(
        $wpdb->prepare(
                "  INSERT INTO wp_custom_plugin (name, email, phone) VALUES ('%s', '%s', '%s')",
                "Jose Prepare", "jose@prepare.com.br","919988776"
        )
);

?>
```


[Voltar ao Índice](#indice)

---


## <a name="parte17">17 - Wordpress Update/Delete to Database</a>

Steps to do Update data of Wordpress table:

- 1: wpdb::update( string $table, array $data, array $where, array|string $format = null, array|string $where_format = null )
- 2: wpdb::query and wpdb::prepare

Steps to do Delete data from Wordpress table:

- 1: wpdb::delete( string $table, array $where, array|string $where_format = null )
- 2: wpdb::query and wpdb::prepare

```php
// Update
/*
    $wpdb->update(
        "wp_custom_plugin",  // DB
        array(
                "email" => "updateemail@update.com" // COntains update values with colums name
        ),
        array(
                "id"=> 2 // WHERE
        )
);

$wpdb->query(
	$wpdb->prepare(
		"UPDATE wp_custom_plugin SET email = '%s' WHERE id = '%d'",
		"prepareUPDATE@prepare.com.br",3
	)
);*/

// DELETE Operation
/*
$wpdb->delete(
        "wp_custom_plugin",
        array(
                "id"=>5
        )
);

$wpdb->query(
        $wpdb->prepare(
                "DELETE FROM wp_custom_plugin WHERE id= %d", 6
        )
)
*/

```

[Voltar ao Índice](#indice)

---


## <a name="parte18">18 - AJAX Request by Action hook Wordpress</a>

- https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_(action)

- wp-content/plugins/custom-plugin/custom-plugin.php

```php
add_action('wp_ajax_custom_plugin', 'prefix_ajax_custom_plugin');
function prefix_ajax_custom_plugin(){
	print_r($_REQUEST);
	wp_die();
}
```

- wp-content/plugins/custom-plugin/assets/js/script.js

```js

    // Outher ajax request
    $("#form_custom_add_outherPage").on("click", function (e) {
        e.preventDefault();
        console.log("Open Anither Page has Opened");
        console.log(ajaxurl);
        $.post(ajaxurl, {action:"custom_plugin", name:"Online Web TUTOR", Tut:"WP Plugin Developer" }, function (response) {
            console.log(response);
        });
    })

```


[Voltar ao Índice](#indice)

---


## <a name="parte19">19 - By wp_ajax_{action} Post Data to Server</a>

```php
add_action('wp_ajax_custom_ajax_req', 'prefix_ajax_custom_ajax_req');
function prefix_ajax_custom_ajax_req(){
	echo json_encode($_REQUEST);
	wp_die();
}
```

```js
    $("#form_custom_add_outherPage").validate({
        submitHandler: function () {
            let post_data = $("#form_custom_add_outherPage").serialize() + "&action=custom_ajax_req&param=post_form_data";
            //console.log(post_data);
            $.post(ajaxurl, post_data, function (response) {
                let data = $.parseJSON(response);
                console.log(data);
                console.log("Name: " + data.input_name + "Email: " + data.input_email);

            })

        }
    });
```

[Voltar ao Índice](#indice)

---


## <a name="parte20">20 - About Shortcodes Concept in Wordpress</a>

```php
add_shortcode("custom-plugin", "customPluginFunction");
function customPluginFunction(){
	//echo "**** Olá short CODE! **** ";
	include_once PLUGIN_DIR_PATH.'/views/shortcode-template.php';
}
```

```php
<?=do_shortcode("[custom-plugin]")?>
```

[Voltar ao Índice](#indice)

---


## <a name="parte21">21 - Parameterized Shortcodes in Wordpress</a>

```php

add_shortcode( "custom-plugin-parameter", "customPluginFunctionParam" );
function customPluginFunctionParam( $params ) {
	$values = shortcode_atts(
		array( // default values of params
			"name"   => "WP - PLUGIN CUSTOM NAME",
			"author" => "José Malcher"
		),
		$params, // dynamic params coming shortcode values
		'custom-plugin-parameter' // optional parameter
	);
	echo "---- Name: " . $values['name'] . " e author: " . $values['author'] . " ----";
} // [custom-plugin-parameter name='Curso WP Plugin' author='Sanjay Kumar']

add_shortcode( 'tag-based', "customPluginFunctionTag" );
function customPluginFunctionTag( $param, $content, $tag ) {
	if ( $tag == "tag-based" ) {
		echo "<h1>" . $content . "</h1>";
	}

	if ( $tag == "called_me_down"){
		echo "This is another advance format od wp shortcode";
	}

} // [tag-based] Informações aqui [/tag-based]
add_shortcode("called_me_down", "customPluginFunctionTag");
```

```
[custom-plugin]

[custom-plugin-parameter name='Curso WP Plugin' author='Sanjay Kumar']

[tag-based] Shortcode com TAG [/tag-based]

[called_me_down]
```

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

