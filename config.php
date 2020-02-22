<?php


// OAuth & site configuration
$oauthClientID     = 'Google_Project_Client_ID';
$oauthClientSecret = 'Google_Project_Client_Secret';
$baseURL           = 'http://example.com/';
$redirectURL       = $baseURL.'upload.php';

define('OAUTH_CLIENT_ID',$oauthClientID);
define('OAUTH_CLIENT_SECRET',$oauthClientSecret);
define('REDIRECT_URL',$redirectURL);
define('BASE_URL',$baseURL);

$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "";         /* Password */
$dbname = "tutorial";   /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

