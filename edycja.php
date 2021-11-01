<?php
require("conf.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_GET["nr"])) {
			$nr= $_GET["nr"];
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
			echo '<center><div class="warn"><i class="fas fa-exclamation-circle"></i> Edytowano książkę '.$xpol.'</div></center>';
        }

		if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_GET["ocena"])) {
			$ocena= $_GET["ocena"];
			require("conf.php");
			$xtresc= $_POST["xtresc"];
			$sql = mysqli_query($conn, "UPDATE oceny SET tresc='$xtresc' WHERE idoc='$ocena'") or die(mysqli_error($conn));
			echo '<center><div class="warn"><i class="fas fa-exclamation-circle"></i> Edytowano ocenę</div></center>';
        }

if(isset($_GET["nr"])){
	$nr= $_GET["nr"];

	$wynik = mysqli_query($conn, "SELECT * FROM ksiazki, gatunki WHERE ksiazki.gatunek= gatunki.lp AND id=$nr");
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
$wynikg = mysqli_query($conn, "SELECT * FROM gatunki ORDER BY gat");
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
$wynikw = mysqli_query($conn, "SELECT * FROM wyd ORDER BY wyd");
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
$wyniko = mysqli_query($conn, "SELECT * FROM okladka ORDER BY okl");
while ($wierszo = mysqli_fetch_array($wyniko))
{
	echo '<option value="' . $wierszo["idokl"] . '" ';	
if ($wierszo["okl"]==$wierszo["idokl"])	{echo ' selected'; }
echo	'>' . $wierszo["okl"] . '</option>';
}
$wynik = mysqli_query($conn, "SELECT * FROM ksiazki, gatunki WHERE ksiazki.gatunek= gatunki.lp AND id=$nr");
$wiersz = mysqli_fetch_array($wynik);
?>
</select></p>
Cena: <input type="number" name="xcena" min="0" max="1000" value="<?php echo $wiersz["cena"]; ?>"> zł
<P>Opis:<Br>
<Br><textarea required name="xopis" cols="70" rows="5"><?php echo $wiersz["opis"]; ?></textarea>
<P><input type="submit" value="Edytuj">
</form>
<?php
}

if(isset($_GET["ocena"])){
	$ocena= $_GET["ocena"];

	$wynik = mysqli_query($conn, "SELECT * FROM oceny, uzytkownicy WHERE oceny.idus= uzytkownicy.iduser AND idoc=$ocena");
	$wiersz = mysqli_fetch_array($wynik);

    $idus=$wiersz ["idus"];
    $roz = '.jpg';
    if (file_exists("img/user/$idus$roz")) {
        $idusjpg=$idus.$roz;
    }
    else {
        $idusjpg="0.jpg";
    }

    echo '<center><div class="ocena" style="width:60vw;">
        <div class="headerocena"><img src="img/user/'.$idusjpg.'" style="border-radius:50%; vertical-align:middle;" width="40px" height="40px"/>   ' . $wiersz ["user"].'<span style="float: right;"> ' . $wiersz ["datadod"].'</span>' ;
echo '</div>';
echo '<p>' . $wiersz ["tresc"].'</p></div></center>';

?>
	<form method="post" action="index.php?plik=edycja&ocena=<?php echo $ocena; ?>">
	<Br><textarea required name="xtresc" cols="70" rows="5"><?php echo $wiersz ["tresc"]; ?></textarea>
	<P><input type="submit" value="Edytuj">
	</form>

<?php

}
?>