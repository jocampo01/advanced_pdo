<?php
include 'main.php';
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	die ('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	die ('Please complete the registration form');
}
// Check to see if the email is valid.
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	die ('Email is not valid!');
}
// Username must contain only characters and numbers.
if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    die ('Username is not valid!');
}
// Password must be between 5 and 20 characters long.
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	die ('Password must be between 5 and 20 characters long!');
}
// Check if the account with that username already exists
$stmt = $pdo->prepare('SELECT id, password FROM accounts WHERE username = ? OR email = ?');
$stmt->execute([$_POST['username'], $_POST['email']]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);
// Store the result so we can check if the account exists in the database.
if ($account) {
	// Username already exists
	echo 'Username and/or email exists!';
} else {
	// Username doesnt exists, insert new account
	$stmt = $pdo->prepare('INSERT INTO accounts (username, password, email, activation_code) VALUES (?, ?, ?, ?)');
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$uniqid = uniqid();
	$stmt->execute([$_POST['username'], $password, $_POST['email'], $uniqid]);
	$from = 'Your Company Name <noreply@yourdomain.com>'; // Change "Your Company Name" and "yourdomain.com", do not remove the < and >
	$subject = 'Account Activation Required';
	$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Return-Path: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
	$activate_link = 'http://yourdomain.com/phplogin/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
	// Feel free to customize the email message below
	$message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
	mail($_POST['email'], $subject, $message, $headers);
	echo 'Please check your email to activate your account!';
}
?>
