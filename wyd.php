<?php
require("conf.php");
$wyd = $_GET["wyd"];
$wynik = mysqli_query($conn, "SELECT * FROM wyd WHERE idwyd=$wyd");
$wynikile = mysqli_query($conn, "SELECT * FROM ksiazki WHERE wydawnictwo=$wyd");
$wiersz = mysqli_fetch_array($wynik);
echo '<div id="opis">';
echo '<div class="imgside"><h1>' .  $wiersz["wyd"] . '
<h2>Telefon: ' .  $wiersz["tel"] . '</h2>
<h2>E-mail: ' .  $wiersz["mail"] . '</h2>
<h2>Adres: ' .  $wiersz["wyd"] . '</h2>
<h2>Książek w bazie: ' .  mysqli_num_rows($wynikile). '</h2>';

if (($_SESSION['admin']) == 1) {
    echo '<a href="index.php?plik=usun&wyd=' . $wyd . '"><button><i class="fas fa-trash-alt"></i></button></a>';
    echo ' <a href="index.php?plik=edycja&wyd=' . $wyd . '"><button type="button"><i class="fas fa-edit"></i></button></a>';
}

echo '</div>';
?>
<div class="sklep">
    <?php
    $k=0;
$wynik = mysqli_query($conn, "SELECT * FROM ksiazki WHERE wydawnictwo=$wyd");
    while ($wiersz = mysqli_fetch_array($wynik)) {
        echo '<a href="index.php?plik=opis&nr=' . $wiersz["id"] . '"><div class="ksiazka" style="--kol:' . $k++ . '">';
        echo '<img class="ksiazkaimg" src="' . img('img/', $wiersz["id"]) . '" height="320px"/>';
        echo '<div class="ksiazkaname">' . $wiersz["tyt_pol"] . '<br>'
            . $wiersz["cena"] . ' zł</div>';
        echo '</div></a>';
    }
    ?>
</div>