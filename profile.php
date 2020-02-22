<?php
include 'main.php';
checkLoggedIn($pdo);
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $pdo->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->execute([$_SESSION['id']]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);
// Handle edit profile post data
if (isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	$stmt = $pdo->prepare('UPDATE accounts SET username = ?, password = ?, email = ? WHERE id = ?');
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = $account['password'] != $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $account['password'];
	$stmt->execute([$_POST['username'], $password, $_POST['email'], $_SESSION['id']]);
	// Update the session variables
	$_SESSION['name'] = $_POST['username'];
	// Fetch the updated account details
	$stmt = $pdo->prepare('SELECT password, email FROM accounts WHERE id = ?');
	$stmt->execute([$_SESSION['id']]);
	$account = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<?php if (!isset($_GET['action'])): ?>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$account['password']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$account['email']?></td>
					</tr>
				</table>
				<a href="profile.php?action=edit">Edit Details</a>
			</div>
		</div>
		<?php elseif ($_GET['action'] == 'edit'): ?>
		<div class="content">
			<h2>Edit Profile Page</h2>
			<div>
				<form action="profile.php" method="post">
					<label for="username">Username</label>
					<input type="text" value="<?=$_SESSION['name']?>" name="username" id="username">
					<label for="password">Password</label>
					<input type="password" value="<?=$account['password']?>" name="password" id="password">
					<label for="email">Email</label>
					<input type="email" value="<?=$account['email']?>" name="email" id="email">
					<br>
					<input type="submit" value="Save">
				</form>
			</div>
		</div>
		<?php endif; ?>
	</body>
</html>
