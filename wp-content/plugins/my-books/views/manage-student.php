<?php

global $wpdb;

$allstudents = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT * FROM " . my_students_table() . " ORDER BY ID DESC "
	)
);
print_r( $allstudents )

?>
<h3>List of Student's</h3>
<hr>
<div class="container">
    <div class="row">
        <div hidden class="notice notice-success is-dismissible"><p>Success notice dismissible</p></div>
        <div class="panel panel-primary">
            <div class="panel panel-heading">List of Student</div>
            <div class="panel-body">
                <table id="list-books" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Nr.</th>
                        <th>id</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Username</th>
                        <th>Create at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

					<?php

					if ( count( $allstudents ) > 0 ) {
						$i = 1;
						foreach ( $allstudents as $key => $value ) {
							$userdetails = get_userdata( $value->user_login_id ); //wp function
							?>
                            <tr>
                                <td><?php echo $i ++; ?></td>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $userdetails->user_login; ?></td>
                                <td><?php echo $value->created_at; ?></td>
                                <td>
                                    <button class="btn btn-danger">Delete</button>
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
                        <th>E-mail</th>
                        <th>Username</th>
                        <th>Create at</th>
                        <th>Action</th>
                </table>
            </div>
        </div>
    </div>
</div>