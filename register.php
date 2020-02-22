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
// We need to check if the account with that username exists.
$stmt = $pdo->prepare('SELECT id, password FROM accounts WHERE username = ? OR email = ?');
$stmt->execute([$_POST['username'], $_POST['email']]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);
if ($account) {
	// Username/email already exists
	echo 'Username and/or email exists!';
} else {
	// Username doesnt exists, insert new account
	$stmt = $pdo->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)');
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$stmt->execute([$_POST['username'], $password, $_POST['email']]);
	echo 'You have successfully registered, you can now login!';
}
?>
