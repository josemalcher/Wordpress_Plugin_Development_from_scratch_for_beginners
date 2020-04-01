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