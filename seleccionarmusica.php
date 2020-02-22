<?php
include 'main.php';
checkLoggedIn($pdo);
?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if(isset($_POST['selectplantilla'])){
$Selectplantilla = $_POST['selectplantilla'];
$_SESSION['plantillaFile']=$Selectplantilla;
$plantillaFileVar=$_SESSION['plantillaFile'];
echo "<script>alert('Plantilla Seleccionada es $plantillaFileVar');</script>";
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
function seleccionada(){
var identificador=document.getElementById("selectmusica").options[document.getElementById("selectmusica").selectedIndex].value;

		var ajaxurl = 'ajax2.php',
        data =  {'identificador': identificador};
        $.post(ajaxurl, data, function (response) {
			$('#html').html(response);
			alert(response);
			$('#html').html('<audio src="http://localhost/advanced_pdo/audios/'+identificador+'" controls autoplay/></audio>');
        });
}
</script>
<script type="text/javascript">
function changevideo() {
var vid=document.getElementById("audio");
vid.play();
var objecto=new Object();
objecto.video='Marybel';
alert(objecto.video);

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
<form name="frmseleccionamusica" enctype="multipart/form-data" method="post" action="seleccionarcolor.php">
<p align="center">
<select id="selectmusica" name="selectmusica" onchange="seleccionada()" onkeyup="seleccionada()" >
<option value="" selected="selected">---- Musica---</option>
<?php 
       foreach(glob(dirname(__FILE__) . '/audios/*') as $fileaudio){
       $fileaudio = basename($fileaudio);
       echo "<option value='" . $fileaudio . "'>".$fileaudio."</option>";
    }
?>
</select> 
<br><br>
</p>
<div id="html" align="center">
<audio id="audio" autoplay>
<source type="audio/mp3">
 Your browser does not support the audio element.
</audio>
</div>
<div id="btn" align="center">
<input name="boton" id="boton" type="submit" value="Selecciona Color Texto"/>
</div>
</form>
</div>

  <?php include 'includes/footer.php';?>
    </body>
</html>