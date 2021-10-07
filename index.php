<!DOCTYPE html>
<html>
	<head>
		<title>Księgarnia</title>
		<link rel="icon" href="img/0.png" type="image/x-icon"/>
		<link rel="shortcut icon" href="img/0.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/f3922ae06f.js" crossorigin="anonymous"></script><link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all" rel="stylesheet" id="font-awesome-5-kit-css"><link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all" rel="stylesheet" id="font-awesome-5-kit-css"><link href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all" rel="stylesheet" id="font-awesome-5-kit-css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php 
		session_start();
		 ?>
		<style>

		</style>
	</head>
	<body>
	<img id="logo"src="img/0.png"/>
	<h1>Księgarnia</h1>

		<?php
		include("menu.php");

		
		if(!isset($_GET['plik'])) {$plik = 'home';}
		else{$plik = $_GET['plik'];}
		$roz = '.php';

		if (file_exists("$plik$roz")) {
			include "$plik$roz";
		}
		else {
			echo'<h2>Strona nie istnieje</h2>';
		}
		include("stopka.php")
		?>
	</body>
</html>