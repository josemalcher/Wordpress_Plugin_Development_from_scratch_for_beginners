<?php

global $wpdb;
$getallAuthors = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT * FROM " . my_authors_table() . " ORDER BY ID DESC", "" )
);
//print_r( $getallAuthors );
?>
<h3>List of Author's</h3>
<hr>
<div class="container">
    <div class="row">
        <div hidden class="notice notice-success is-dismissible"><p>Success notice dismissible</p></div>
        <div class="panel panel-primary">
            <div class="panel panel-heading">List of Author</div>
            <div class="panel-body">
                <table id="list-books" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Nr.</th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Fb Link</th>
                        <th>About</th>
                        <th>Create at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					if ( count( $getallAuthors ) > 0 ) {
						$i = 1;
						foreach ( $getallAuthors as $key => $value ) {
							?>
                            <tr>
                                <td><?php echo $i ++; ?></td>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->fb_link; ?></td>
                                <td><?php echo $value->about; ?></td>
                                <td> <?php echo $value->created_at; ?></td>
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
                        <th>Fb Link</th>
                        <th>About</th>
                        <th>Create at</th>
                        <th>Action</th>
                </table>
            </div>
        </div>
    </div>
</div>