<?php
include 'main.php';
// First we check if the email and code exists...
if (isset($_GET['email'], $_GET['code'])) {
	$stmt = $pdo->prepare('SELECT * FROM accounts WHERE email = ? AND activation_code = ?');
	$stmt->execute([$_GET['email'], $_GET['code']]);
	// Store the result so we can check if the account exists in the database.
	$account = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($account) {
		if (isset($_POST['password'], $_POST['cpassword'])) {
			if ($_POST['password'] == $_POST['cpassword']) {
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$stmt = $pdo->prepare('UPDATE accounts SET activation_code = ?, password = ? WHERE email = ? AND activation_code = ?');
				$stmt->execute(['activated', $password, $_GET['email'], $_GET['code']]);
				die ('Your account is now activated, you can now login!');
			} else {
				die('Passwords do not match!');
			}
		}
	} else {
		die('The account is already activated or doesn\'t exist!');
	}
} else {
	die('No email and/or code specified!');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Reset Password</title>
		<link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="register">
			<h1>Reset Password</h1>
			<p style="padding:0 15px;">Please reset your password below to activate your account.</p>
			<form action="activate.php?email=<?=$_GET['email']?>&code=<?=$_GET['code']?>" method="post" autocomplete="off">
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="New Password" id="password" required>
				<label for="cpassword">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="cpassword" placeholder="Confirm Password" id="cpassword" required>
				<input type="submit" value="Save">
			</form>
		</div>
	</body>
</html>
