<div id="menu">
<a href="index.php?plik=home" class="menuItem" title="Strona główna"><i class="fas fa-home"></i></a>
<a href="index.php?plik=sklep" class="menuItem" title="Sklep"><i class="fas fa-shopping-basket"></i></a>
<a href="index.php?plik=dodaj" class="menuItem" title="Dodaj książkę"><i class="fas fa-plus"></i></a>
<!-- <a href="index.php?plik=znajdz" class="menuItem" title="Wyszukiwarka"><i class="fas fa-search"></i></a> -->
<a href="index.php?plik=logowanie" class="menuItem" title="Konto"><i class="far fa-user-circle"></i></a>

<?php

	if ($_SESSION['admin']==1)
	{
		echo'<a href="index.php?plik=admin" class="menuItem" title="Admin panel"><i class="fas fa-user-astronaut"></i></a>';
	}
	
	if ($_SESSION['zalogowany']==TRUE)
	{
		echo'<a href="index.php?plik=wyloguj" class="menuItem" title="Wyloguj"><i class="fas fa-sign-out-alt"></i></a>';
	}
?>
</div>