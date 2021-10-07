<?php

	session_start();
	
	session_unset();
	
	header('Location: index.php?plik=home');

?>