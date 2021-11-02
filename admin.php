<h2>Użytkownicy</h2>
<div class="adminpanel">
<div class="galeriaprofil">
<?php

if ($_SESSION['admin']!=1)
{
    header('Location: index.php?plik=home');
    exit();
}

require("conf.php");
$wynik = mysqli_query($conn, "SELECT * FROM uzytkownicy");
while ($wiersz = mysqli_fetch_array($wynik))
{
$idus=$wiersz ["iduser"];
$roz = '.jpg';
if (file_exists("img/user/$idus$roz")) {
    $idusjpg=$idus.$roz;
}
else {
    $idusjpg="0.jpg";
}
echo '<div class="profil"><img src="img/user/'.$idusjpg.'" style="border-radius:50%; vertical-align:middle;" width="40px" height="40px"/>   ' . $wiersz ["user"];
if($wiersz ["adminus"]==1){
    echo' <i class="fas fa-user-astronaut"></i>';
}
echo '<span style="float: right;"><a href="index.php?plik=usun&user=' . $wiersz ["user"]. '"><button><i class="fas fa-trash-alt"></i></button></a>
<a href="index.php?plik=edycja&user=' . $wiersz ["iduser"] . '"><button type="button"><i class="fas fa-edit"></i></button></a></span>' ;
echo '</div>';
}

?>
</div>

    <div class="admindodaj" class="gat">
        <h2>Gatunki</h2>
        <div class="doditem">
            <?php
            $wynikg = mysqli_query($conn, "SELECT * FROM gatunki");
            while($wierszg = mysqli_fetch_array($wynikg)){
                echo '<div class="profil" style="height:40px;">   ' . $wierszg ["gat"];

                echo '<span style="float: right;"><a href="index.php?plik=usun&gat=' . $wierszg ["lp"]. '"><button><i class="fas fa-trash-alt"></i></button></a>
                <a href="index.php?plik=edycja&gat=' . $wierszg ["lp"] . '"><button type="button"><i class="fas fa-edit"></i></button></a></span>' ;
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="admindodaj" class="okl">
    <h2>Okładki</h2>
        <div class="doditem">
        <?php
            $wyniko = mysqli_query($conn, "SELECT * FROM okladka");
            while($wierszo = mysqli_fetch_array($wyniko)){
                echo '<div class="profil" style="height:40px;">   ' . $wierszo ["okl"];

                echo '<span style="float: right;"><a href="index.php?plik=usun&okl=' . $wierszo ["idokl"]. '"><button><i class="fas fa-trash-alt"></i></button></a>
                <a href="index.php?plik=edycja&okl=' . $wierszo ["idokl"] . '"><button type="button"><i class="fas fa-edit"></i></button></a></span>' ;
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="admindodaj" class="wyd">
    <h2>Wydawnictwa</h2>
        <div class="doditem">
        <?php
            $wynikw = mysqli_query($conn, "SELECT * FROM wyd");
            while($wierszw = mysqli_fetch_array($wynikw)){
            echo '<div class="profil" style="height:40px;">   ' . $wierszw ["wyd"];
            
            echo '<span style="float: right;"><a href="index.php?plik=usun&wyd=' . $wierszw ["idwyd"]. '"><button><i class="fas fa-trash-alt"></i></button></a>
            <a href="index.php?plik=edycja&wyd=' . $wierszw ["idwyd"] . '"><button type="button"><i class="fas fa-edit"></i></button></a></span>' ;
            echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
</div>