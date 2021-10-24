<div id="menu">
<a href="index.php?plik=home" class="menuItem"><i class="fas fa-home"></i></a>
<a href="index.php?plik=sklep" class="menuItem"><i class="fas fa-shopping-basket"></i></a>
<a href="index.php?plik=dodaj" class="menuItem"><i class="fas fa-plus"></i></a>
<a href="index.php?plik=znajdz" class="menuItem"><i class="fas fa-search"></i></a>
<a href="index.php?plik=logowanie" class="menuItem"><i class="far fa-user-circle"></i></a>

<?php
	
	if ($_SESSION['zalogowany']==TRUE)
	{
		echo'<a href="index.php?plik=wyloguj" class="menuItem"><i class="fas fa-sign-out-alt"></i></a>';
	}
?>
</div>