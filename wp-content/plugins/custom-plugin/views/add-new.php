<h2>Form AJAX</h2>
<hr>


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
$wpdb->query(
	$wpdb->prepare(
		"  INSERT INTO wp_custom_plugin (name, email, phone) VALUES ('%s', '%s', '%s')",
		"Jose Prepare", "jose@prepare.com.br","919988776"
	)
);
*/

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
wp_enqueue_media();

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

