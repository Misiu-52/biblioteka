<?php
	if (isset($_SESSION['zalogowany']) AND $_SESSION['zalogowany']==TRUE)
	{
		header('Location: index.php?plik=ustawienia');
		exit();
	}

  if(!isset($_GET['error'])) {
    $error= '0';
  }
  else{
    $error = $_GET['error'];
  }

  switch ($error) {
    case 1:
      echo '<center><div class="warn"><i class="fas fa-exclamation-circle"></i> Login musi posiadać od 3 do 20 znaków!</div></center>';
      break;
    case 2:
      echo '<center><div class="warn"><i class="fas fa-exclamation-circle"></i> Login może składać się tylko z liter i cyfr (bez polskich znaków)</div></center>';
      break;
    case 3:
      echo '<center><div class="warn"><i class="fas fa-exclamation-circle"></i> Hasło musi posiadać od 8 do 20 znaków!</div></center>';
      break;
    case 4:
      echo '<center><div class="warn"><i class="fas fa-exclamation-circle"></i> Podane hasła nie są identyczne!</div></center>';
      break;
    case 5:
      echo '<center><div class="warn"><i class="fas fa-exclamation-circle"></i> Istnieje już użytkownik o takim loginie! Wybierz inny.</div></center>';
      break;
    default:
      echo '';
  }

?>

<br>
<form method="post" action="index.php?plik=zarejestruj">
  <label for="login">Login:</label><br>
  <input type="text" id="username" name="xlogin" size="23"><br>
  <label for="pwd">Hasło:</label><br>
  <input type="password" id="pwd" name="xhaslo1" size="15"><br>
  <label for="pwd">Powtórz hasło:</label><br>
  <input type="password" id="pwd" name="xhaslo2" size="15"><br>
  <input type="submit" value="Zarejestruj">
</form>
<a href="index.php?plik=logowanie"><button>Logowanie</button></a>