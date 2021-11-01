<?php

		$wszystko_OK=true;

		$login = $_POST['xlogin'];
		
		if ((strlen($login)<3) || (strlen($login)>20))
		{
			$wszystko_OK=false;
            header('Location: index.php?plik=rejestracja&error=1');
		}
		
		if (ctype_alnum($login)==false)
		{
			$wszystko_OK=false;
			header('Location: index.php?plik=rejestracja&error=2');
		}
		
		$haslo1 = $_POST['xhaslo1'];
		$haslo2 = $_POST['xhaslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			header('Location: index.php?plik=rejestracja&error=3');
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			header('Location: index.php?plik=rejestracja&error=4');
		}		
			
		require "conf.php";	

				$rezultat = mysqli_query($conn, "SELECT * FROM uzytkownicy WHERE user='$login'");
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
                    header('Location: index.php?plik=rejestracja&error=5');
				}
				
				if ($wszystko_OK==true)
				{
                    $rejestracja=mysqli_query($conn, "INSERT INTO `uzytkownicy`(`iduser`, `user`, `pass`, `admin`, `kol_pdst`, `kol_ciem`, `kol_jas`) VALUES (DEFAULT,'$login','$haslo1','0','0','0','0')");
					header('Location: index.php?plik=logowanie&rejestracja=1');
				}				
?>