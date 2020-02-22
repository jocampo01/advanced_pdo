<?php
include 'main.php';
checkLoggedIn($pdo);
?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
 if(isset($_POST['selectVideo'])){
$miSelectvideo = $_POST['selectVideo'];
$_SESSION['videoFile']=$miSelectvideo;
$videoFileVar=$_SESSION['videoFile'];
 echo "<script>alert('seleccionar videos $videoFileVar');</script>";
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
function cimagenes(){   
   for (var i = document.getElementById("selectplantilla").length - 1; i >= 0; i--) {
       document.getElementById("selectplantilla").options[i].style.background = 
       'url("'+'http://localhost/advanced_pdo/plantillas/'+document.getElementById("selectplantilla").options[i].value+'") no-repeat right';       
   };
}
function seleccionada(){
document.getElementById("selectplantilla").style.background = 'url("'+'http://localhost/advanced_pdo/plantillas/'+document.getElementById("selectplantilla").options[document.getElementById("selectplantilla").selectedIndex].value+'") no-repeat 90%'; 
var identificador=document.getElementById("selectplantilla").options[document.getElementById("selectplantilla").selectedIndex].value;
        $.ajax({
          url:"ajax2.php",
          method:"POST",
          data:{'identificador':identificador},
          cache:"false",
          success:function(data) {
		$('#html').html('<img src="http://localhost/advanced_pdo/plantillas/'+identificador+'" alt="" width="350" height="350" />');
		
          }
        });
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
<form name="frmseleccionaplantilla" enctype="multipart/form-data" method="post" action="seleccionarmusica.php">
<p align="center">
<select id="selectplantilla" name="selectplantilla" onchange="seleccionada()" onkeyup="seleccionada()" required>
      <option value="" selected="selected">---- PLANTILLA---</option>
  <?php 
       foreach(glob(dirname(__FILE__) . '/plantillas/*') as $fileplantilla){
       $fileplantilla = basename($fileplantilla);
       echo "<option value='" . $fileplantilla . "'>".$fileplantilla."</option>";

		}
?>
</select> 
<br><br>
</p>
<p align="center">
<div id="html" align="center">
<p align="center">
</p>
</div>
<p align="center">
<div id="btn" align="center">
<input name="boton" id="boton" type="submit" value="Selecciona tu musica"/>
</div>
</p>
</form>
  <?php include 'includes/footer.php';?>
    </body>
</html>