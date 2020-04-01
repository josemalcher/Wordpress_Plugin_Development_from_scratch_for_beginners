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