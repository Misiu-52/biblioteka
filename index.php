<!DOCTYPE html>
<html>
	<?php
	session_start();
	$debugmode=0;

	if (!isset($_SESSION['zalogowany'])) {
		$_SESSION['zalogowany']=FALSE;
	}

	if (!isset($_SESSION['admin'])) {
		$_SESSION['admin']=0;
	}

	if(!isset($_GET['plik'])) {$plik = 'home';}
	else{$plik = $_GET['plik'];}
	$roz = '.php';

	?>

	<head>
		<title>Księgarnia</title>
		<link rel="icon" href="img/0.png" type="image/x-icon"/>
		<link rel="shortcut icon" href="img/0.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/f3922ae06f.js" crossorigin="anonymous"></script>
	</head>
	<body>
	<img id="logo"src="img/0.png"/>
	<h1>Księgarnia</h1>
	<button id="btnScrollToTop"><i class="fas fa-chevron-up"></i></button>
		<?php
		include("menu.php");

		if (file_exists("$plik$roz")) {
			include "$plik$roz";
		}
		else {
			echo'<h2>Strona nie istnieje</h2>';
		}
		include("stopka.php");

		if ($debugmode==1) {
			include("debug.php");
		}
		?>
	</body>

	<script>
const btnScrollToTop = document.querySelector("#btnScrollToTop")

btnScrollToTop.addEventListener("click", function() {
    
    window.scrollTo({
        top:0,
        left:0,
        behavior: "smooth"

    })
});
</script>
</html>
<?php
// FUNKCJE
function img($path, $file) {
	$img=0;
    if (file_exists($path.$file.'.jpg')) {
        $img=$path.$file.'.jpg';
    }
    else if (file_exists($path.$file.'.jpeg')) {
        $img=$path.$file.'.jpeg';
    }
    else if (file_exists($path.$file.'.png')) {
        $img=$path.$file.'.png';
    }
    else if (file_exists($path.$file.'.bmp')) {
        $img=$path.$file.'.bmp';
    }
    else if (file_exists($path.$file.'.gif')) {
        $img=$path.$file.'.gif';
    }
	else if (file_exists($path.$file.'.webp')) {
        $img=$path.$file.'.webp';
    }
	else if (file_exists($path.$file.'.svg')) {
        $img=$path.$file.'.svg';
    }
    else {
        $img='img/user/0.jpg';
    }
	return $img;
}
?>