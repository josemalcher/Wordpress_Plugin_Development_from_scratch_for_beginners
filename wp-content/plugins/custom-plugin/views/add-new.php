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
*/

/*
$wpdb->query(
	$wpdb->prepare(
		"  INSERT INTO wp_custom_plugin (name, email, phone) VALUES ('%s', '%s', '%s')",
		"Jose Prepare", "jose@prepare.com.br","919988776"
	)
);
*/

?>


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
            <td>
                <button type="submit" class="button button-primary">Salve</button>
            </td>
        </tr>

        </tbody>
    </table>
</form>

