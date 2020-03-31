<?php
wp_enqueue_style( "bootstrap_my_books", MY_BOOK_PLUGIN_URL   . "/assets/css/bootstrap.min.css", '' );
?>
<h3>Update Book</h3>
<hr>
<div class="container">
	<div class="row">
		<div class="notice notice-success is-dismissible"><p>Success notice dismissible</p></div>
		<div class="panel panel-primary">
			<div class="panel panel-heading">Edit Book</div>
			<div class="panel-body">
				<form class="form-horizontal" action="javascript:void(0)" id="frmEditBook">
					<div class="form-group">
						<label class="control-label col-sm-2" for="name">Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" placeholder="Enter Name">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="author">Author:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="author" placeholder="Enter Author">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="about">About:</label>
						<div class="col-sm-10">
							<textarea name="about" id="about" placeholder="Enter About"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="upload_img">Upload Image</label>
						<div class="col-sm-10">
							<input type="button" id="upload_img" class="btn btn-info" value="Upload Image">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">UPDATE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>