<?php
	
	if ($_SESSION['zalogowany']==TRUE)
	{
		header('Location: index.php?plik=ustawienia');
		exit();
	}

  if(isset($_GET['rejestracja'])) {
    echo '<center><div class="info"><i class="fas fa-info-circle"></i> Po rejestracji czas na logowanie</div></center>';
  }
?>

<form method="post" action="index.php?plik=zaloguj">
  <label for="login">Login:</label><br>
  <p><input type="text" id="username" name="xlogin" size="23"></p>
  <label for="pwd">Hasło:</label><br>
  <p><input type="password" id="pwd" name="xhaslo" size="15"></p>
  <p><input type="submit" value="Zaloguj"></p>
</form>

<a href="index.php?plik=rejestracja"><button>Rejestracja</button></a>