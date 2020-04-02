<?php

wp_enqueue_media();
?>
<h3>ADD Books</h3>
<hr>
<div class="container">
    <div class="row">
        <div id="message_save" hidden class="notice notice-success is-dismissible"><p>Salve with Success</p></div>
        <div class="panel panel-primary">
            <div class="panel panel-heading">Add books</div>
            <div class="panel-body">
                <form class="form-horizontal" action="javascript:void(0)" id="frmAddBook">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="author">Author:</label>
                        <div class="col-sm-10">
                            <!--                            <input required type="text" class="form-control" id="author" name="author" placeholder="Enter Author">-->
                            <select name="author" id="author" class="form-control">
                                <option value="-1" disabled selected> -- Select a Author --</option>
								<?php
								global $wpdb;
								$getallAuthors = $wpdb->get_results(
									$wpdb->prepare(
										"SELECT * from " . my_authors_table() . " ORDER by id desc ", ""
									)
								);
								foreach ( $getallAuthors as $index => $author ) {
									?>
                                    <option value="<?php echo $author->id; ?>"><?php echo $author->name; ?></option>
									<?php
								}
								?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="about">About:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" required name="about" id="about"
                                      placeholder="Enter About"></textarea>
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