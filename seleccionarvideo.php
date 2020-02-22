<?php
include 'main.php';
checkLoggedIn($pdo);
?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
function seleccionada(){
var identificador=document.getElementById("selectVideo").options[document.getElementById("selectVideo").selectedIndex].value;

		var ajaxurl = 'ajax2.php',
        data =  {'identificador': identificador};
        $.post(ajaxurl, data, function (response) {
			$('#html').html(response);
			alert(response);
			$('#html').html('<video src="http://localhost/advanced_pdo/videos/'+identificador+'" controls autoplay/></video>');
        });
}
</script>
<script type="text/javascript">
function changevideo() {
var vid=document.getElementById("video");
vid.play();
}
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
<div class="content">
<form name="frmseleccionavideo" enctype="multipart/form-data" method="post" action="seleccionarplantilla.php">
<p align="center">
<select id="selectVideo" name="selectVideo" onchange="seleccionada()" onkeyup="seleccionada()" >
<option id="" value="" selected>- V I D E O S -
<?php
       foreach(glob(dirname(__FILE__) . '/videos/*') as $file){
       $file = basename($file);
       echo "<option value='" . $file . "'>".$file."</option>";

		}
?>
</select>
<br><br>

<div id="html" align="center">
<video id="video" width="450" height="450" controls>
<source type="video/mp4">
Tu navegador no soporta HTML5 Video.
</video>
</div>

<p align="center">
<div id="btn" align="center">
<input name="boton" id="boton" type="submit" value="ir a seleccionar Plantilla"/>
</div>
</p>
</form>
  <?php include 'includes/footer.php';?>
    </body>
</html>