<?php
	
	if (isset($_SESSION['zalogowany']))
	{
		header('Location: index.php?plik=ustawienia');
		exit();
	}
?>

<form method="post" action="index.php?plik=zaloguj">
  <label for="login">Login:</label><br>
  <input type="text" id="username" name="xlogin" size="23"><br>
  <label for="pwd">Hasło:</label><br>
  <input type="password" id="pwd" name="xhaslo" size="15"><br>
  <input type="submit" value="Zaloguj">
</form>

<a href="index.php?plik=rejestracja"><button>Rejestracja</button></a>