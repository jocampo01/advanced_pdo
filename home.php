<?php
include 'main.php';
checkLoggedIn($pdo);
?>
<?php
ini_set('memory_limit', '64M');
// Notificar todos los errores de PHP
error_reporting(-1);
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
// Notificar todos los errores de PHP (ver el registro de cambios)
error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
         <meta http-equiv="Cache-Control" content="no-cache" />
         <meta http-equiv="refresh" content="200" />
         <meta name="robots" content="all" />
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<meta name="keywords" content="Video Virales FX DB,crear video,ffmpeg" />
		<meta name="description" content="Video Virales FX DB">
		<meta name="author" content="http://www.diegobautista.com" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<title>Video Viral FX DB</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/advanced_pdo/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/advanced_pdo/favicon.ico">
    <link rel="icon" type="image/x-icon" href="http://localhost/advanced_pdo/favicon.ico">
		<style rel="stylesheet" type="text/css">
		* {
  padding: 0;
  margin: 0;
}
p {
  margin-bottom: 20px;
}
.wrapper {
  width: 80%;
  margin: auto;
  overflow:hidden;
}
header {
  background: rgba(0,0,0,0.9);
  width: 100%;
  position: fixed;
  z-index: 10;
}

nav {
  float: left; /* Desplazamos el nav hacia la izquierda */
}
nav ul {
  list-style: none;
  overflow: hidden; /* Limpiamos errores de float */
}
nav ul li {
  float: left;
  font-family: Arial, sans-serif;
  font-size: 16px;
}
nav ul li a {
  display: block; /* Convertimos los elementos a en elementos bloque para manipular el padding */
  padding: 20px;
  color: #fff;
  text-decoration: none;
}
nav ul li:hover {
  background: #3ead47;
}
.contenido {
  padding-top: 80px;
}
input,textarea,select {
	outline:0;
	font-family: Tahoma, Geneva, sans-serif;
}
.contact input[type="text"], .contact input[type="email"] {
	display: block;
	margin-top: 15px;
	padding: 15px;
	border: 1px solid #dfe0e0;
	width: 500px;
}
.contact input[type="text"]:focus, .contact input[type="email"]:focus {
	border: 1px solid #c6c7c7;
}
.contact textarea {
	resize: none;
	margin-top: 15px;
	padding: 15px;
	border: 1px solid #dfe0e0;
	width: 700px;
	height: 200px;
}
.contact textarea:focus {
	border: 1px solid #c6c7c7;
}
.contact input[type="submit"] {
	display: block;
	margin-top: 15px;
	padding: 15px;
	border: 0;
	background-color: #518acb;
	font-weight: bold;
	color: #fff;
	cursor: pointer;
	width: 150px;
}
.contact input[type="submit"]:hover {
	background-color: #3670b3;
}
		</style>
<script>
$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("Sigue los pasos para crear tu video");
			window.location="uploading.php";
        });
    });
});
</script>
<script>
function TiempoActividad()
{
    setTimeout("DestruirSesion()", 6000000);
}
function DestruirSesion()
{
    location.href = "logout.php";
}
</script>
	</head>
	<body class="loggedin" onload="TiempoActividad()">
	<div class="header">
	<header>
		<h1>Video Viral FX DB</h1>
	</header>
	</div>

		<nav class="navtop">
			<div>
			<h1>Video Viral FX DB</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="contacto.php"><i class="fas fa-user-circle"></i>Contacto</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h1 class="primaryText">Crea <strong>"Tus videos Virales Con Video Viral FX DB"</strong> </h1>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
			
			<div id="btn" align="center">
<input name="boton" id="boton" type="submit" value="Empieza a crear tu video" onclick="window.location.href='uploading.php'"/>
		</div>
		
		

    <footer id="footer">
        <div class="container">
            <p>Copyright © All Right Reserved</p>
        </div>
    </footer>
    <script>
        $('footer').footerReveal({
            shadow: false
        });
    </script>
   
	
    </body>
</html>
