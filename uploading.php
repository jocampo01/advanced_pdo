<?php
include 'main.php';
checkLoggedIn($pdo);
?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("config.php");
if(isset($_POST['upload'])){
//if (isset($_REQUEST['upload']))
//{
$name=$_FILES['uploadvideo']['name'];
 $type=$_FILES['uploadvideo']['type'];
$size=$_FILES['uploadvideo']['size'];
$cname=str_replace(" ","_",$name);
$tmp_name=$_FILES['uploadvideo']['tmp_name'];
$target_path="videos/";
$target_path=$target_path.basename($cname);
if(move_uploaded_file($_FILES['uploadvideo']['tmp_name'],$target_path))
{
$query = "INSERT INTO videos(name,location) VALUES('".$cname."','".$target_path."')";
mysqli_query($con,$query);
echo "<script>alert('Tu video se subio Correctamente! $cname');</script>";
$_SESSION['videoFile']=$cname;
$videoFileVar=$_SESSION['videoFile'];
 echo "<script>alert('variables uploading $videoFileVar');</script>";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/advanced_pdo/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/advanced_pdo/favicon.ico">
    <link rel="icon" type="image/x-icon" href="http://localhost/advanced_pdo/favicon.ico">
<script>
$(document).ready(function(){
    $('#btn').click(function(){
        var clickBtnValue = $(this).val();
		var nombrevideo= <?php echo $cname ?>;
		alert(nombrevideo);
        var ajaxurl = 'ajaxVideoCreator.php',
        data =  {'nombrevideo': nombrevideo};
        $.post(ajaxurl, data, function (response) {

        });
    });
});

</script>
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
		<div id="videoUpload" align="center">
		  <label for="favcolor">Selecciona un video para cargarlo y transformarlo:</label>
<form name="video" enctype="multipart/form-data" method="post" action="">
<input name="MAX_FILE_SIZE" value="100000000000000"  type="hidden"/>
<input type="file" name="uploadvideo" />
<input type="submit" name="upload" value="SUBMIT" />
</form>
<br></br>

	    <h1 class="primaryText"><strong>"Cuando termines da click en el Boton siguiente para continuar"</strong></h1>
						<div id="btn" align="center">
<input name="boton" id="boton" type="submit" value="Seleccionar el Video Cargado" onclick="window.location.href='seleccionarvideo.php'"/>
</button>
		</div>
		</div>
  <?php include 'includes/footer.php';?>
    </body>
</html>