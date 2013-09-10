<?php
require 'formhelpers.php';

session_start();

if (!empty($_POST["_submit_check"])) {
	if ($formErros = validate_form()) {
		show_form($formErros);
	} else {
		// Add the username to the session
		session_regenerate_id(TRUE);
		$_SESSION["USERNAME"] = $_POST["username"];
		header("Location: main.php");
	}
} else {
	show_form();
}

function validate_form() {
	$errors = array();
	// Some sample usernames and passwords
	$users = array(
			'kuma'     => 'mon',
			'alice'   => 'wonderland',
			);

	// Make sure user name is valid
	if (! array_key_exists($_POST['username'], $users)) {
		$errors[] = 'Please enter a valid username.';
		return $errors;
	}
	 
	// See if password is correct
	if ($users[ $_POST['username']] != $_POST['password']) {
		$errors[] = 'Please enter a valid password.';
	}

	return $errors;
}

function show_form($errorMessage = null) {
	print '<form method="POST" action="'.$_SERVER['PHP_SELF'].'">';

	if ($errorMessage) {
		print '<ul><li>';
		print implode('</li><li>',$errorMessage);
		print '</li></ul>';
	}
	print 'Username: ';
	input_text('username', $_POST);
	print '<br/>';

	print 'Password: ';
	input_password('password', $_POST);
	print '<br/>';

	input_submit('submit','Log In');

	print '<input type="hidden" name="_submit_check" value="1"/>';
	print '</form>';
}

function input_password($field_name, $values) {
	print '<input type="password" name="' . $field_name .'" value="';
	if (!empty($values[$field_name])) {
		print htmlentities($values[$field_name]) . '">';
	}else{
		print '">';
	}
}
