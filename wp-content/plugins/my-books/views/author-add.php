<?php
wp_enqueue_media();
?>
<h3>Add New Author</h3>
<hr>
<div class="container">
    <div class="row">
        <div id="message_save" hidden class="notice notice-success is-dismissible"><p>Salve with Success</p></div>
        <div class="panel panel-primary">
            <div class="panel panel-heading">Add New Author</div>
            <div class="panel-body">
                <form class="form-horizontal" action="javascript:void(0)" id="frm_add_author">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fb_link">Fb Link:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fb_link" name="fb_link" placeholder="Facebook">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="about">About:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" required name="about" id="about" placeholder="Enter About"></textarea>
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