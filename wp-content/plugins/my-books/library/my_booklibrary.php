<?php

if ( $_REQUEST['param'] == "save_book" ) {
//print_r($_REQUEST); // Save Data DB table
	$wpdb->insert(
		my_book_table(),
		array(
			"name"       => $_REQUEST['name'],
			"author"     => $_REQUEST['author'],
			"about"      => $_REQUEST['about'],
			"book_image" => $_REQUEST['image_name'],
		)
	);
	echo json_encode( array( "status" => 1, "message" => "Book created successfully" ) );
} elseif ( $_REQUEST['param'] == "edit_book" ) {
	$wpdb->update( my_book_table(), array(
		"name"       => $_REQUEST['name'],
		"author"     => $_REQUEST['author'],
		"about"      => $_REQUEST['about'],
		"book_image" => $_REQUEST['image_name']
	), array(
		"id" => $_REQUEST['book_id']
	) );
	echo json_encode( array( "status" => 1, "message" => "Book UPDATE successfully" ) );
} elseif ( $_REQUEST['param'] == "delete_book" ) {
	$wpdb->delete(
		my_book_table(),
		array(
			"id" => $_REQUEST['id']
		)
	);
	echo json_encode( array( "status" => 1, "message" => "Book DELETED successfully" ) );
} elseif ( $_REQUEST['param'] == "save_author" ) {
	$wpdb->insert(
		my_authors_table(),
		array(
			"name"    => $_REQUEST['name'],
			"fb_link" => $_REQUEST['fb_link'],
			"about"   => $_REQUEST['about'],
		)
	);
	echo json_encode( array( "status" => 1, "message" => "Author add successfully" ) );
}elseif ( $_REQUEST['param'] == "save_student" ) {

	//usename should not be repeat : username_exists($_REQUEST['username'])
	//email should be unique: email_exists($_REQUEST['email'])

	$student_id = $user_id = wp_create_user($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['email']);

	$user = new WP_User($student_id);
	$user->set_role("wp_book_user_key");

	$wpdb->insert(
		my_students_table(),
		array(
			"name"    => $_REQUEST['name'],
			"email" => $_REQUEST['email'],
			"user_login_id" => $student_id,
		)
	);
	echo json_encode( array( "status" => 1, "message" => "Student ADD successfully" ) );
}