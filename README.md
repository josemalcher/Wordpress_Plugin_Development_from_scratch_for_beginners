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

- wp-content/plugins/custom-plugin/views/add-new.php

```php
wp_enqueue_media();
```

- wp-content/plugins/custom-plugin/assets/js/script.js

```js
/*
    $("#btnImage").on("click", function () {
        let images = wp.media({
            title: "Upload Image",
            multiple: true
        }).open().on("select", function (e) {
            //let uploadedImages = images.state().get("selection"); // very imagens/files
            //let uploadedImages = images.state().get("selection").first(); // only // multile = false
            let uploadedImages = images.state().get("selection");
            let selectedImages = uploadedImages;
            //console.log(uploadedImages.toJSON());
            //console.log(selectedImages.url +" - " + selectedImages.title + " - " + selectedImages.filename);

            /!*  // multiple images - multile  true
            $.each(selectedImages, function (index, image) {
                console.log("image URL: " + image.url + " Title "+ image.title);
            })
            *!/
            selectedImages.map(function (image) {
                let itemDetails = image.toJSON();
                console.log(itemDetails);
                // multiples files
            });

        })
    });
 */

    $("#btnImage").on("click", function () {
        let images = wp.media({
            title: "Upload Image",
            multiple: false
        }).open().on("select", function (e) {
            let uploadedImages = images.state().get("selection").first(); // only // multile = false
            let selectedImages = uploadedImages.toJSON();

            $("#getImages").attr("src", selectedImages.url);

        })
    });


```

[Voltar ao Índice](#indice)

---


## <a name="parte23">23 - Use of default wp_editor in Wordpress</a>

```php

global $wpdb;
$data = $wpdb->get_row(
        $wpdb->prepare("SELECT * FROM wp_custom_plugin ORDER BY id desc LIMIT 1")
);
print_r($data)

?>


<form action="#" id="form_custom_add">
    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row"><label for="input_name">Name</label></th>
            <td><input required name="input_name" type="text" id="input_name" value="<?=$data->name?>" class="regular-text"></td>
        </tr>
        <tr>
            <th scope="row"><label for="input_email">E-mail</label></th>
            <td><input required name="input_email" type="text" id="input_email" value="<?=$data->email?> class="regular-text"></td>
        </tr>
        <tr>
            <th>Add File</th>
            <td>
                <input id="btnImage" type="button" value="Upload Image" class="button  button-small button-secondary"/>
            </td>
        </tr>
        <tr>
            <th>IMAGEM</th>
            <td>
                <img id="getImages" src="" alt="" style="width: 300px">
            </td>
        </tr>
        <tr>
            <th>Descriptions</th>
            <td>
                <?php wp_editor(html_entity_decode($data->description), "description_id"); ?>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit" class="button button-primary">Salve</button>
            </td>
        </tr>

        </tbody>
    </table>
</form>
```

```js
   $("#form_custom_add").validate({
        submitHandler: function () {
            let name =  $("#input_name").val();
            let email = $("#input_email").val();
            let description = encodeURIComponent(tinyMCE.get("description_id").getContent());
            let post_data = "action=custom_plugin_library" +
                            "&param=savedata" +
                            "&email="+email+
                            "&name="+name+
                            "&desc="+description;
            $.post(ajaxurl, post_data, function (response) {
                console.log(response);
            })

        }
    });

```

```php

	global $wpdb;
	if($getParam == 'savedata'){
		$name =  isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
		$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
		$desc =  isset($_REQUEST['desc']) ? htmlspecialchars($_REQUEST['desc']) : '';

		$wpdb->insert(
			$wpdb->prefix."custom_plugin",
			array(
				"name" => $name,
				"email" => $email,
				"description" => $desc,
			));
		echo json_encode(array("status"=> 1, "msg"=>"data saved"));

	}

```

[Voltar ao Índice](#indice)

---


## <a name="parte24">24 - My Book Custom Plugin Introduction #1</a>

- https://www.youtube.com/watch?v=x-x4OkL0D-4&list=PLT9miexWCpPUQkQwL-COHmo0Jd0qxLjTn&index=24

[Voltar ao Índice](#indice)

---


## <a name="parte25">25 - "My Book" Plugin comment & constants #2</a>

```php
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


```

[Voltar ao Índice](#indice)

---


## <a name="parte26">26 - "My Book" Plugin asset libraries #3</a>

```php
function my_book_include_assets() {
	//styles
	//wp_enqueue_style( "bootstrap", MY_BOOK_PLUGIN_URL   . "/assets/css/bootstrap.min.css", '' );
	wp_enqueue_style( "datatable", MY_BOOK_PLUGIN_URL   . "/assets/css/jquery.dataTables.min.css", '' );
	wp_enqueue_style( "notifybar", MY_BOOK_PLUGIN_URL   . "/assets/css/jquery.notifyBar.css", '' );
	wp_enqueue_style( "styles", MY_BOOK_PLUGIN_URL      . "/assets/css/styles.css", '' );

	//scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap.min.js',   MY_BOOK_PLUGIN_URL   . '/assets/js/bootstrap.min.js', '', true );
	wp_enqueue_script( 'validation.min.js',  MY_BOOK_PLUGIN_URL   . '/assets/js/jquery.validate.min.js', '', true );
	wp_enqueue_script( 'datatable.min.js',   MY_BOOK_PLUGIN_URL   . '/assets/js/jquery.dataTables.min.js', '', true );
	wp_enqueue_script( 'jquery.notifyBar.js',MY_BOOK_PLUGIN_URL   . '/assets/js/jquery.notifyBar.js', '', true );
	wp_enqueue_script( 'scripts.js',          MY_BOOK_PLUGIN_URL  . '/assets/js/scripts.js', '', true );

	wp_localize_script( "script.js", "mybookajaxurl", admin_url( "admin-ajax.php" ) );
}

add_action( "init", "my_book_include_assets" );
```

[Voltar ao Índice](#indice)

---


## <a name="parte27">27 - "My Book" Plugin Menus/Submenus #4</a>

```php

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
		"Add New",
		"Add New",
		"manage_options",
		"add-new",
		"my_book_add" );
}

add_action( "admin_menu", "my_book_plugin_menus" );

//callback functions to menus and submenus
function my_book_list() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . "/views/book-list.php";
}

function my_book_add() {
	include_once MY_BOOK_PLUGIN_DIR_PATH . '/views/book-add.php';
}
```

[Voltar ao Índice](#indice)

---


## <a name="parte28">28 - "My Book" Plugin Create/Drop Table #5</a>

```php

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
```

[Voltar ao Índice](#indice)

---


## <a name="parte29">29 - "My Book" Plugin Internal Pages #6</a>

- wp-content/plugins/my-books/views/book-add.php
- wp-content/plugins/my-books/views/book-list.php
- wp-content/plugins/my-books/views/book-edit.php

[Voltar ao Índice](#indice)

---


## <a name="parte30">30 - "My Book" Plugin Validations/Media #7</a>

- wp-content/plugins/my-books/assets/js/scripts.js

```js

    $("#frmAddBook").validate({
        submitHandler: function () {
            console.log($("#frmAddBook").serialize());
        }
    });
    $("#frmEditBook").validate({
        submitHandler: function () {
            console.log($("#frmEditBook").serialize());
        }
    });
    $("#btn_upload").on("click", function () {
        let image = wp.media({
            title: "Upload Image for My Book",
            multiple: false
        }).open().on("select", function () {
            let uploaded_image = image.state().get("selection").first();
            let getImage = uploaded_image.toJSON().url;
            $("#show-image").html("<img src='" + getImage + "' style='height:'50px; width='50px' ' '>")
            $("#image_name").val(getImage)
        });
    })

```

- wp-content/plugins/my-books/views/book-add.php

```php
<?php
    wp_enqueue_style( "bootstrap_my_books", MY_BOOK_PLUGIN_URL   . "/assets/css/bootstrap.min.css", '' );

    wp_enqueue_media();
?>
<h3>ADD Books</h3>
<hr>
<div class="container">
    <div class="row">
        <div class="notice notice-success is-dismissible"><p>Success notice dismissible</p></div>
        <div class="panel panel-primary">
            <div class="panel panel-heading">Add books</div>
            <div class="panel-body">
                <form class="form-horizontal" action="javascript:void(0)" id="frmAddBook">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="author">Author:</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="author" name="author" placeholder="Enter Author">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="about">About:</label>
                        <div class="col-sm-10">
                            <textarea required name="about" id="about" placeholder="Enter About"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="upload_img">Upload Image</label>
                        <div class="col-sm-10">
                            <input type="button" id="btn_upload" class="btn btn-info" value="Upload Image">
                            <span id="show-image"></span>
                            <input type="hidden" id="image_name" name="image_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
```


[Voltar ao Índice](#indice)

---


## <a name="parte31">31 - "My Book" Plugin Insert/Show Data #8</a>

```php
<?php
wp_enqueue_style( "bootstrap_my_books", MY_BOOK_PLUGIN_URL . "/assets/css/bootstrap.min.css", '' );

global $wpdb;

$all_books = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT * FROM " . my_book_table() . " ORDER BY id DESC", ""
	), ARRAY_A
);
//print_r($all_books); die;

?>
<h3>List of BOoks</h3>
<hr>
<div class="container">
    <div class="row">
        <div hidden class="notice notice-success is-dismissible"><p>Success notice dismissible</p></div>
        <div class="panel panel-primary">
            <div class="panel panel-heading">List of books</div>
            <div class="panel-body">
                <table id="list-books" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Nr.</th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>About</th>
                        <th>Create at</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					if ( count( $all_books ) > 0 ) {
						$i = 1;
						foreach ( $all_books as $key => $value ) {
							?>
                            <tr>
                                <td><?=$i++;?></td>
                                <td><?=$value['id'];?></td>
                                <td><?=$value['name'];?></td>
                                <td><?=$value['author'];?></td>
                                <td><?=$value['about'];?></td>
                                <td><?=$value['created_at'];?></td>
                                <td><img src="<?=$value['book_image'];?>" style="width: 50px;height: 50px" alt="<?=$value['name'];?>"></td>
                                <td>
                                    <a class="btn btn-info" href="javascript:void(0)">Edit</a>
                                    <a class="btn btn-danger" href="javascript:void(0)">Delete</a>
                                </td>
                            </tr>
                    <?php
						}
					}
					?>


                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nr.</th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>About</th>
                        <th>Create at</th>
                        <th>Image</th>
                        <th>Action</th>
                </table>
            </div>
        </div>
    </div>
</div>
```

[Voltar ao Índice](#indice)

---


## <a name="parte32">32 - "My Book" Plugin Update/Delete Data #9</a>

```php
<?php
wp_enqueue_style( "bootstrap_my_books", MY_BOOK_PLUGIN_URL . "/assets/css/bootstrap.min.css", '' );

wp_enqueue_media();
global $wpdb;
$book_id     = isset( $_GET['edit'] ) ? intval( $_GET['edit'] ) : 0;
$book_detail = $wpdb->get_row(
	$wpdb->prepare(
		"SELECT * FROM " . my_book_table() . " WHERE id = %d ", $book_id
	), ARRAY_A
);
//print_r($book_detail);die;
?>
<h3>Update Book</h3>
<hr>
<div class="container">
    <div class="row">
        <div id="message_save" hidden class="notice notice-success is-dismissible"><p>UPDATE with Success</p></div>
        <div class="panel panel-primary">
            <div class="panel panel-heading">Add books</div>
            <div class="panel-body">
                <form class="form-horizontal" action="javascript:void(0)" id="frm_edit_Book">
                    <input type="hidden"
                           name="book_id"
                           value="<?= isset( $_GET['edit'] ) ? intval( $_GET['edit'] ) : 0 ?>">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control"
                                   id="name"
                                   name="name"
                                   value="<?php echo $book_detail['name'] ?>"
                                   placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="author">Author:</label>
                        <div class="col-sm-10">
                            <input required type="text"
                                   class="form-control"
                                   id="author"
                                   name="author"
                                   value="<?php echo $book_detail['author'] ?>"
                                   placeholder="Enter Author">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="about">About:</label>
                        <div class="col-sm-10">
                            <textarea required
                                      name="about"
                                      id="about"
                                      placeholder="Enter About">
                                <?php echo $book_detail['about'] ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="upload_img">Upload Image</label>
                        <div class="col-sm-10">
                            <input type="button" id="btn_upload" class="btn btn-info" value="Upload Image">
                            <span id="show-image">
                                <img src="<?php echo $book_detail['book_image'] ?>"
                                     style="height:50px;" alt="">
                            </span>
                            <input type="hidden"
                                   id="image_name"
                                   name="image_name"
                                   value="<?php echo $book_detail['book_image'] ?>"
                            />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
```

```php
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
```

```js
 $("#frm_edit_Book").validate({
        submitHandler: function () {
            let postdata = "action=mybooklibrary" +
                "&param=edit_book" +
                "&" + $("#frm_edit_Book").serialize();
            $.post(mybookajaxurl, postdata, function (response) {
                //console.log(response);
                let data = $.parseJSON(response);
                if (data.status == 1) {
                    // $.notifyBar({
                    //     cssClass: "success",
                    //     html: data.message
                    // });
                    $("#message_save").removeAttr('hidden');
                    // $("#name").val("");
                    // $("#author").val("");
                    // $("#about").val("");
                    // $("#show-image").val("");
                    // $("#image_name").val("");
                    setTimeout(function () {
                        location.reload()
                    }, 3000);
                } else {

                }
            });
        }
    });
```

-

- DELETE

```js

    $(".btnbookdelete").on("click", function () {
        let conf = confirm("Tem certeza que você quer apagar o resgistro?");
        if(conf){
            let book_id = $(this).attr("data-id");
            let postdata = "action=mybooklibrary" +
                "&param=delete_book"+
                "&id="+book_id;
            console.log(postdata);
            $.post(mybookajaxurl, postdata, function (response) {
                //console.log(response);
                let data = $.parseJSON(response);
                if (data.status == 1) {
                    // $.notifyBar({
                    //     cssClass: "success",
                    //     html: data.message
                    // });
                    setTimeout(function () {
                        location.reload()
                    }, 1000);
                } else {

                }
            });
        }
    });
```

```php
elseif ($_REQUEST['param'] == "delete_book"){
		$wpdb->delete(
			my_book_table(),
			array(
				"id" => $_REQUEST['id']
			)
		);
		echo json_encode(array("status"=>1, "message"=>"Book DELETED successfully"));
	}
```


[Voltar ao Índice](#indice)

---


## <a name="parte33">33 - "My Book" Plugin Extended features demo</a>



[Voltar ao Índice](#indice)

---


## <a name="parte34">34 - "My Book" Extended: Tables, Submenus</a>



[Voltar ao Índice](#indice)

---


## <a name="parte35">35 - "My Book" Extended: Building Layouts</a>

- https://www.youtube.com/watch?v=VRoYHnFPXRA&list=PLT9miexWCpPUQkQwL-COHmo0Jd0qxLjTn&index=35

[Voltar ao Índice](#indice)

---


## <a name="parte36">36 - Save & List Author's section data</a>

- https://www.youtube.com/watch?v=-U_e-G8G2Sc&list=PLT9miexWCpPUQkQwL-COHmo0Jd0qxLjTn&index=36

[Voltar ao Índice](#indice)

---


## <a name="parte37">37 - Save & List Student's section data</a>

- https://www.youtube.com/watch?v=TzoutEGHiW4&list=PLT9miexWCpPUQkQwL-COHmo0Jd0qxLjTn&index=37

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

