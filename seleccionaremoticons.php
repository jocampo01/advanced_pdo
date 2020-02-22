<?php
include 'main.php';
checkLoggedIn($pdo);
?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

?>
<?php 
if(isset($_POST['color'])){
$selectcolor=$_POST['color'];
$_SESSION['color']=$selectcolor;
$plantillaFileVar=$_SESSION['color'];
echo "<script>alert('El color es $plantillaFileVar');</script>";
}
$textocabecera=$_POST['textocabecera'];
$_SESSION['textocabecera']=$textocabecera;
$textocabecera=$_SESSION['textocabecera'];
 echo "<script>alert('You did not vote $textocabecera');</script>";
$textopie=$_POST['textopie'];
$_SESSION['textopie']=$textopie;
$textopie=$_SESSION['textopie'];
 echo "<script>alert('You did not vote $textopie');</script>";

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
document.getElementById("selectemoticons").style.background = 'url("'+'http://localhost/advanced_pdo/emoticons/'+document.getElementById("selectemoticons").options[document.getElementById("selectemoticons").selectedIndex].value+'") no-repeat 90%'; 
var identificador=document.getElementById("selectemoticons").options[document.getElementById("selectemoticons").selectedIndex].value;
        $.ajax({
          url:"ajax2.php",
          method:"POST",
          data:{'identificador':identificador},
          cache:"false",
          success:function(data) {
		$('#html').html('<img src="http://localhost/advanced_pdo/emoticons/'+identificador+'" alt="" width="350" height="350" />');
		
          }
        });
}
</script>
    </head>
	<body class="loggedin">
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
<form name="frmseleccionaemoticons" enctype="multipart/form-data" method="post" action="ajaxVideoCreator.php">
<p align="center">
<body onload="cimagenes()">
<select id="selectemoticons" name="selectemoticons" onchange="seleccionada()" onkeyup="seleccionada()" >
      <option value="" selected="selected">-Selecciona Emoticons-</option>
  <?php 
       foreach(glob(dirname(__FILE__) . '/emoticons/*') as $fileemoticon){
       $fileemoticon = basename($fileemoticon);
       echo "<option value='" . $fileemoticon . "'>".$fileemoticon."</option>";
    }
?>

</select> 
<br><br>
</p>
<p align="center">
<div id="html" align="center">
</div>
<div id="btn" align="center">
<input name="boton" id="boton" type="submit" value="Ir a Caracteristicas del Video"/>
</div>
</form>
  <?php include 'includes/footer.php';?>
    </body>
</html>