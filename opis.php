<?php
require("conf.php");
$nr= $_GET["nr"];
$wynik = mysqli_query($conn, "select * from ksiazki, gatunki, wyd, okladka WHERE ksiazki.gatunek = gatunki.lp and ksiazki.wydawnictwo = wyd.idwyd and ksiazki.okladka = okladka.idokl and id=$nr");
$wiersz = mysqli_fetch_array($wynik);
echo '<div id="opis">';
echo '<img style="margin: 10px;" src="img/'.  $wiersz["id"] . '.jpg" height="350px" class="ksiazkaimg"/>';
echo '<div class="imgside"><h1>'.  $wiersz["tyt_pol"] . '<br>('.  $wiersz["tyt_org"] .')</h1>
<h2>Autor: '.  $wiersz["autor"] .'</h2>
<h2>Gatunek: '.  $wiersz["gat"] .'</h2>
<h2>Wydawnictwo: '.  $wiersz["wyd"] .'</h2>
<h2>Oprawa: '.  $wiersz["wyd"] .'</h2>
<button>'. $wiersz["cena"] .' zł Kup teraz</button></div>';
echo '<div class="opis">'.  $wiersz["opis"] .'</div>';

?>
</div>