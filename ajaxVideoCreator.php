<?php
include 'main.php';
checkLoggedIn($pdo);
?>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['selectemoticons'])){
$emoticonseleccionado = $_POST['selectemoticons'];
$_SESSION['emoticonFile']=$emoticonseleccionado;
$emoticonFile=$_SESSION['emoticonFile'];
echo "<script>alert('El color es $emoticonFile');</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	     <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
         <meta http-equiv="Cache-Control" content="no-cache" /> 
         <meta name="robots" content="all" />
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<meta name="keywords" content="Video Virales FX DB,crear video,ffmpeg" />
		<meta name="description" content="Video Virales FX DB">
		<meta name="author" content="http://www.diegobautista.com" />
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<title>Video Viral FX DB</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		 <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/advanced_pdo/favicon.ico">
        <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/advanced_pdo/favicon.ico">
    <link rel="icon" type="image/x-icon" href="http://localhost/advanced_pdo/favicon.ico">
<script type="text/javascript">

</script>
    </head>
		<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Video Viral FX</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="contacto.php"><i class="fas fa-user-circle"></i>Contacto</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content" align="center">
		<form name="frmseleccionaemoticons" enctype="multipart/form-data" method="post" action="ffmpeg_exec.php">
<?php
$videoFile=$_SESSION['videoFile'];
$plantillaFile=$_SESSION['plantillaFile'];
$audioFile=$_SESSION['audioFile'];
$emoticonFile=$_SESSION['emoticonFile'];
$textocabecera=$_SESSION['textocabecera'];
$textopie=$_SESSION['textopie'];
print_r($videoFile);
echo "<br>";
echo "<br>";
print_r($plantillaFile);
echo "<br>";
echo "<br>";
print_r($audioFile);
echo "<br>";
echo "<br>";
print_r($emoticonFile);
echo "<br>";
echo "<br>";
print_r($textocabecera);
echo "<br>";
echo "<br>";
print_r($textopie);

?>
<div id="btn" align="center">
<input name="boton" id="boton" type="submit" value="Generar Video Viral">
</div>
</form>
  <?php include 'includes/footer.php';?>
    </body>
</html>