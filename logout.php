<?php
session_start();
session_destroy();
if (isset($_COOKIE['rememberme'])) {
    unset($_COOKIE['rememberme']);
    setcookie('rememberme', '', time() - 3600);
}
 echo "<script>alert('Ha terminado la session!');</script>";
// Redirect to the login page:
header('Location: index.php');
?>
