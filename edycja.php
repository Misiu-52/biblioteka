<?php
require("conf.php");
$nr= $_GET["nr"];
$wynik = mysqli_query($conn, "select * from ksiazki, gatunki WHERE ksiazki.gatunek= gatunki.lp and id=$nr");
$wiersz = mysqli_fetch_array($wynik);

?>

<h2>Edycja książki</h2>

<form method="post" action="index.php?plik=edycja&nr=<?php echo $nr; ?>">
Tytuł polski: <input required type="text" name="xpol" size="50" maxlength="35" value="<?php echo $wiersz["tyt_pol"]; ?>">
<P>Tytuł orginalny: <input required type="text" name="xorg" size="50" maxlength="35" value="<?php echo $wiersz["tyt_org"]; ?>">
<P>Autor: <input required type="text" name="xautor" size="50" maxlength="60" value="<?php echo $wiersz["autor"]; ?>">
<P>Data: <input required type="date" name="xdatawyd" value="<?php echo $wiersz["datawyd"]; ?>">
Gatunek:
<select name="xgat">
<?php
require("conf.php");
$wynikg = mysqli_query($conn, "select * from gatunki ORDER By gat");
while ($wierszg = mysqli_fetch_array($wynikg))
{
	echo '<option value="' . $wierszg["lp"] . '" ';	
if ($wiersz["gat"]==$wierszg["lp"])	{echo ' selected'; }
echo	'>' . $wierszg["gat"] . '</option>';
}
?>
</select>
<p>Wydawnictwo:
<select name="xwyd">
<?php
require("conf.php");
$wynikw = mysqli_query($conn, "select * from wyd ORDER By wyd");
while ($wierszw = mysqli_fetch_array($wynikw))
{
	echo '<option value="' . $wierszw["idwyd"] . '" ';	
if ($wierszw["wyd"]==$wierszw["idwyd"])	{echo ' selected'; }
echo	'>' . $wierszw["wyd"] . '</option>';
}
?>
</select></p>
<p>Typ okładki:
<select name="xokl">
<?php
require("conf.php");
$wyniko = mysqli_query($conn, "select * from okladka ORDER By okl");
while ($wierszo = mysqli_fetch_array($wyniko))
{
	echo '<option value="' . $wierszo["idokl"] . '" ';	
if ($wierszo["okl"]==$wierszo["idokl"])	{echo ' selected'; }
echo	'>' . $wierszo["okl"] . '</option>';
}
$wynik = mysqli_query($conn, "select * from ksiazki, gatunki WHERE ksiazki.gatunek= gatunki.lp and id=$nr");
$wiersz = mysqli_fetch_array($wynik);
?>
</select></p>
Cena: <input type="number" name="xcena" min="0" max="1000" value="<?php echo $wiersz["cena"]; ?>"> zł
<P>Opis:<Br>
<Br><textarea required name="xopis" cols="70" rows="5"><?php echo $wiersz["opis"]; ?></textarea>
<P><input type="submit" value="Edytuj">
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
			$sql = mysqli_query($conn, "UPDATE ksiazki SET tyt_pol='$xpol', tyt_org='$xorg', autor='$xautor', gatunek='$xgat', wydawnictwo='$xwyd', opis='$xopis', okladka='$xokl',cena='$xcena', datawyd='$xdatawyd' WHERE id='$nr'") or die(mysqli_error($conn));
			echo '<h2>Edytowano książkę <font color="black">'.$xpol.'</font></h2>';
        }
?>