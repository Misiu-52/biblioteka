<h2>Dodaj swoją książkę</h2>

<form method="post" action="index.php?plik=dodaj">
Tytuł polski: <input required type="text" name="xpol" size="50" maxlength="35">
<P>Tytuł orginalny: <input required type="text" name="xorg" size="50" maxlength="35">
<P>Autor: <input required type="text" name="xautor" size="50" maxlength="60">
<P>Data: <input required type="date" name="xdatawyd">
Gatunek:
<select name="xgat">
<?php
require("conf.php");
$wynik = mysqli_query($conn, "select * from gatunki ORDER By gat");
while ($wiersz = mysqli_fetch_array($wynik))
{
	echo '<option value="' . $wiersz["lp"] . '">' . $wiersz["gat"] . '</option>';}
?>
</select>
<p>Wydawnictwo:
<select name="xwyd">
<?php
require("conf.php");
$wynik = mysqli_query($conn, "select * from wyd ORDER By wyd");
while ($wiersz = mysqli_fetch_array($wynik))
{
	echo '<option value="' . $wiersz["idwyd"] . '">' . $wiersz["wyd"] . '</option>';}
?>
</select></p>
<p>Typ okładki:
<select name="xokl">
<?php
require("conf.php");
$wynik = mysqli_query($conn, "select * from okladka ORDER By okl");
while ($wiersz = mysqli_fetch_array($wynik))
{
	echo '<option value="' . $wiersz["idokl"] . '">' . $wiersz["okl"] . '</option>';}
?>
</select></p>
Cena: <input type="number" name="xcena" value="0" min="0" max="1000"> zł
<P>Opis:<Br>
<Br><textarea required name="xopis" cols="70" rows="5"></textarea>
<P><input type="submit" value="Dodaj">
	<input type="reset" value="Wyczyść">
</form>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
			require("conf.php");
			$xpol= $_POST["xpol"];
			$xorg= $_POST["xorg"];
			$xautor= $_POST["xautor"];
			$xdatawyd= $_POST["xdatawyd"];
			$xgat= $_POST["xgat"];
			$xwyd= $_POST["xwyd"];
			$xokl= $_POST["xokl"];
			$xcena= $_POST["xcena"];
			$xopis= $_POST["xopis"];
			$sql = mysqli_query($conn, "insert into ksiazki values('','$xpol','$xorg','$xautor','$xgat','$xwyd','$xopis','$xokl','$xcena','$xdatawyd')");
			echo '<h2>Dodano książkę <font color="black">'.$xpol.'</font> do księgarni</h2>';
        }
?>