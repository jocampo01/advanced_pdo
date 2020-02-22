<?php
include 'main.php';
checkLoggedIn($pdo);
ini_set('display_errors', -1);
error_reporting(E_ALL);
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
<?php
	/*
	Ignore stdin, ignore stdout, redirect stderr to logfile
    "< NUL > NUL 2> ffmpeg.log",
    Run command in background
    "&",
	*/
	
$videoFile=$_SESSION['videoFile'];
$plantillaFile=$_SESSION['plantillaFile'];
$audioFile=$_SESSION['audioFile'];
$emoticonFile=$_SESSION['emoticonFile'];
$textocabecera=$_SESSION['textocabecera'];
$textopie=$_SESSION['textopie'];
	echo "Iniciando ffmpeg ... \n\n";
	echo "<br><br>";
	echo "Building video with overlay image..." . PHP_EOL . PHP_EOL;

    //Declaracion de Variables
	$plantillaFile=$_SESSION['plantillaFile'];
	$logoFile='http://localhost/advanced_pdo/logo/adidas.png';
	$videoFile='./videos/'.$videoFile;
    $AudioFile='./audios/'.$audioFile;
	$SalidaOuput='./output/output.mp4';
	$SalidaOuput2='./output/output2.mp4';
	$SalidaOuput3='./output/output3.mp4';
	$salidaoutputplantilla='./outputimages/outputplantilla.png';
	$outimgtexto='./outputimages/outimgtexto.png';
	$ImageFile='http://localhost/advanced_pdo/plantillas/Square-DB1.png';
	$fileplantillaVideo="";


    //PASO  1	
	//echo "<script>alert('#######Paso 1 Agregando texto cabecera a imagen######');</script>";
		   foreach(glob(dirname(__FILE__) . '/plantillas/*') as $fileplantilla){
       $fileplantilla = basename($fileplantilla);
	   if($fileplantilla==$plantillaFile){
		   $fileplantillaVideo=$fileplantilla;
		   //echo "<script>alert('fileplantilla $fileplantillaVideo');</script>";
	   }


    }

	$plantillaFile='./plantillas/'.$fileplantillaVideo;
	$cmd = 'ffmpeg -i '.$plantillaFile.' -vf "drawtext=text='.$textocabecera.':fontcolor=blue:fontsize=50:fontfile=arial.ttf: x=250: y=50" -y '.$salidaoutputplantilla.' 1>Log.txt 2>&1';
    print_r($cmd);
    system($cmd);


	//PASO  1.1
	//echo "<script>alert('#######Paso 1.1 Agregando texto pie a imagen######');</script>";
	
	$cmd = 'ffmpeg -i '.$salidaoutputplantilla.' -vf "drawtext=text='.$textopie.':fontcolor=blue:fontsize=80:fontfile=arial.ttf: x=40: y=920" -y '.$outimgtexto.' 1>Log.txt 2>&1';
    print_r($cmd);
    system($cmd);

    //PASO  2	
	//echo "<script>alert('********Paso 2 Agregando imagen a video******');</script>"; 
	$cmd = 'ffmpeg -loop 1 -i '.$outimgtexto.' -i '.$videoFile.' -filter_complex "[1:v]scale=1100:-1[fg];[0:v][fg]overlay=(W-w)/2:(H-h)/2:shortest=1" -y '.$SalidaOuput.' 1>Log.txt 2>&1';
    print_r($cmd);
    system($cmd);
	
    //PASO  3	
	//echo "<script>alert('======Paso 3 Agregando audio a video=======');</script>"; 
    echo "\n\n";
    $cmd = 'ffmpeg -i '.$SalidaOuput.' -i '.$AudioFile.' -vcodec copy -filter_complex amix -map 0:v -map 0:a -map 1:a -shortest -b:a 192k -y '.$SalidaOuput2.' 1>Log.txt 2>&1';
    print_r($cmd);
    system($cmd);


	//paso 4
	//echo "<script>alert('********Paso 2 Agregando Logo a video overlay******');</script>"; 
	//ffmpeg -i videopre.mp4 -i adidas.png -filter_complex "overlay =x=(main_w-overlay_w)/2:y =(main_h-overlay_h)/2" -y videoprefinal.mp4
	$cmd = 'ffmpeg -i '.$SalidaOuput2.' -i '.$logoFile.' -filter_complex "overlay =x=(main_w-overlay_w)/2:y =(main_h-overlay_h)/2" -y '.$SalidaOuput3.' 1>Log.txt 2>&1';
    print_r($cmd);
    system($cmd);
	echo "<br></br>";
    echo "Se ha completado con Exito la Creacion del Video Viral BY Video Viral FX DB.\n";



	?>
		</div>
  <?php include 'includes/footer.php';?>
    </body>
</html>