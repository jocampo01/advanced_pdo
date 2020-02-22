<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// Edit the MySQL database details below
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// No need to edit below
try {
	$pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
	// If there is an error with the connection, stop the script and display the error.
	die('Failed to connect to database!');
}
// The below function will check if the user is logged-in and also check the remember me cookie
function checkLoggedIn($pdo) {
    if (isset($_COOKIE['rememberme']) && !empty($_COOKIE['rememberme']) && !isset($_SESSION['loggedin'])) {
    	// If the remember me cookie matches one in the database then we can update the session variables.
    	$stmt = $pdo->prepare('SELECT id, username FROM accounts WHERE rememberme = ?');
    	$stmt->execute([$_COOKIE['rememberme']]);
    	$account = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($account) {
    		// Found a match
    		session_regenerate_id();
    		$_SESSION['loggedin'] = TRUE;
    		$_SESSION['name'] = $account['username'];
    		$_SESSION['id'] = $account['id'];
    	} else {
    		// If the user is not logged in redirect to the login page.
    		header('Location: index.php');
    		exit();
    	}
    } else if (!isset($_SESSION['loggedin'])) {
    	// If the user is not logged in redirect to the login page.
    	header('Location: index.php');
    	exit();
    }
}
?>
