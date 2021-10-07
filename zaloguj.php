<?php
	require("conf.php");
	
	if ((!isset($_POST['xlogin'])) || (!isset($_POST['xhaslo'])))
	{
		header('Location: index.php?plik=home');
		exit();
	}
	else
	{
		$login = $_POST['xlogin'];
		$haslo = $_POST['xhaslo'];

	
		if ($wynik = mysqli_query($conn, "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'"))
		{
			$ilu_userow = mysqli_num_rows($wynik);
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = mysqli_fetch_array($wynik);
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['user'] = $wiersz['user'];
				$_SESSION['kol_pdst'] = $wiersz['kol_pdst'];
				$_SESSION['kol_ciem'] = $wiersz['kol_ciem'];
				$_SESSION['kol_jas'] = $wiersz['kol_jas'];
				
				header('Location: index.php?plik=ustawienia');
				
			} else {
				header('Location: index.php?plik=logowanie');
				
			}
			
		}

	}
	
?>