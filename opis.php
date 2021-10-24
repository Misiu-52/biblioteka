<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
echo '<h2>Ocena dodana</h2>';
require("conf.php");
$xidw= $_GET["nr"];
$xtresc= $_POST["xtresc"];
$xuser= $_SESSION["id"];
$sql = mysqli_query($conn, "insert into oceny values('','$xidw','$xtresc','$xuser', now())");}


require("conf.php");
$nr= $_GET["nr"];
$wynik = mysqli_query($conn, "SELECT * FROM ksiazki, gatunki, wyd, okladka WHERE ksiazki.gatunek = gatunki.lp and ksiazki.wydawnictwo = wyd.idwyd and ksiazki.okladka = okladka.idokl and id=$nr");
$wiersz = mysqli_fetch_array($wynik);
echo '<div id="opis">';
echo '<img style="margin: 10px;" src="img/'.  $wiersz["id"] . '.jpg" height="350px" class="ksiazkaimg"/>';
echo '<div class="imgside"><h1>'.  $wiersz["tyt_pol"] . '<br>('.  $wiersz["tyt_org"] .')</h1>
<h2>Autor: '.  $wiersz["autor"] .'</h2>
<h2>Gatunek: '.  $wiersz["gat"] .'</h2>
<h2>Wydawnictwo: '.  $wiersz["wyd"] .'</h2>
<h2>Oprawa: '.  $wiersz["okl"] .'</h2>
<button>'. $wiersz["cena"] .' zł Kup teraz</button>';

if (($_SESSION['zalogowany'])== true)
{
    echo'<a href="index.php?plik=usun&nr=' . $nr . '"><button><i class="fas fa-trash-alt"></i></button></a>';
    echo' <a href="index.php?plik=edycjax&nr=' . $nr . '"><button type="button"><i class="fas fa-edit"></i></button></a>';
}

echo'</div>';

echo '<div class="opis">'.  $wiersz["opis"] .'</div>';

echo'<h2>Oceny książki</h2>';

$wynikkom = mysqli_query($conn, "SELECT * FROM oceny INNER JOIN uzytkownicy WHERE oceny.idus=uzytkownicy.iduser AND idks=$nr");
while ($wierszkom = mysqli_fetch_array($wynikkom))
{
    echo '<div class="ocena">
        <div class="headerocena">' . $wierszkom ["user"].'<span style="float: right;"> ' . $wierszkom ["datadod"].'</span>' ;
echo '</div>';
echo '<p>' . $wierszkom ["tresc"].'</p></div>';
}

?>
</div>
<?php
if (($_SESSION['zalogowany'])== true)
{
    echo'<h2><span class="ramka">Dodaj ocenę</span></h2>';
    echo'<form method="post" action="index.php?plik=opis&nr='.$nr.'">';
    echo'<P>Treść:';
    echo'<Br><textarea name="xtresc" cols="70" rows="5"></textarea>';
    echo'<P><input type="submit" value="Dodaj ocenę">';
	echo'<input type="reset" value="Wyczyść">';
    echo'<input type="hidden" name="xidw" value="'.$nr.'"/>';
}
?>