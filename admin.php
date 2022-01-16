<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["xgat"])) {
    $xgat = htmlspecialchars($_POST["xgat"]);
    require("conf.php");
    $sql = mysqli_query($conn, "INSERT INTO gatunki VALUES('','$xgat')") or die(mysqli_error($conn));
    echo '<center><div class="suc"><i class="fas fa-check"></i> Dodano gatunek</div></center>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["xokl"])) {
    $xokl = htmlspecialchars($_POST["xokl"]);
    require("conf.php");
    $sql = mysqli_query($conn, "INSERT INTO okladka VALUES('','$xokl')") or die(mysqli_error($conn));
    echo '<center><div class="suc"><i class="fas fa-check"></i> Dodano typ okładki</div></center>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["xwyd"])) {
    $xwyd = htmlspecialchars($_POST["xwyd"]);
	$xtel = htmlspecialchars($_POST["xtel"]);
	$xmail = htmlspecialchars($_POST["xmail"]);
	$xadres = htmlspecialchars($_POST["xadres"]);
    require("conf.php");
    $sql = mysqli_query($conn, "INSERT INTO wyd VALUES('','$xwyd','$xtel','$xmail','$xadres')") or die(mysqli_error($conn));
    echo '<center><div class="suc"><i class="fas fa-check"></i> Dodano wydawnictwo</div></center>';
}

?>
<h2>Użytkownicy</h2>
<div class="adminpanel">
    <div class="galeriaprofil">
        <?php

        if ($_SESSION['admin'] != 1) {
            header('Location: index.php?plik=home');
            exit();
        }

        require("conf.php");
        $wynik = mysqli_query($conn, "SELECT * FROM uzytkownicy");
        while ($wiersz = mysqli_fetch_array($wynik)) {
            echo '<div class="profil"><img src="' . img('img/user/', $wiersz["iduser"]) . '" style="border-radius:50%; vertical-align:middle;" width="40px" height="40px"/>   ' . $wiersz["user"];
            if ($wiersz["adminus"] == 1) {
                echo ' <i class="fas fa-user-astronaut"></i>';
            }
            echo '<span style="float: right;"><a href="index.php?plik=usun&user=' . $wiersz["iduser"] . '"><button><i class="fas fa-trash-alt"></i></button></a>
<a href="index.php?plik=edycja&user=' . $wiersz["iduser"] . '"><button type="button"><i class="fas fa-edit"></i></button></a></span>';
            echo '</div>';
        }

        ?>
    </div>

    <div class="admindodaj" class="gat">
        <h2>Gatunki</h2>
        <div class="doditem">
            <?php
            $wynikg = mysqli_query($conn, "SELECT * FROM gatunki");
            while ($wierszg = mysqli_fetch_array($wynikg)) {
                echo '<div class="profil" style="height:40px;">   ' . $wierszg["gat"];

                echo '<span style="float: right;"><a href="index.php?plik=usun&gat=' . $wierszg["lp"] . '"><button><i class="fas fa-trash-alt"></i></button></a>
                <a href="index.php?plik=edycja&gat=' . $wierszg["lp"] . '"><button type="button"><i class="fas fa-edit"></i></button></a></span>';
                echo '</div>';
            }

            echo '<h3><span class="ramka">Dodaj gatunek</span></h3>';
            echo '<form method="post" action="index.php?plik=admin">';
            echo '<P>Nazwa gatunku:';
            echo '<Br><input type="text" name="xgat">';
            echo '<P><input type="submit" value="Dodaj gatunek">';
            echo '<input type="reset" value="Wyczyść"></form>';
            ?>
        </div>
    </div>
    <div class="admindodaj" class="okl">
        <h2>Okładki</h2>
        <div class="doditem">
            <?php
            $wyniko = mysqli_query($conn, "SELECT * FROM okladka");
            while ($wierszo = mysqli_fetch_array($wyniko)) {
                echo '<div class="profil" style="height:40px;">   ' . $wierszo["okl"];

                echo '<span style="float: right;"><a href="index.php?plik=usun&okl=' . $wierszo["idokl"] . '"><button><i class="fas fa-trash-alt"></i></button></a>
                <a href="index.php?plik=edycja&okl=' . $wierszo["idokl"] . '"><button type="button"><i class="fas fa-edit"></i></button></a></span>';
                echo '</div>';
            }

            echo '<h3><span class="ramka">Dodaj okładkę</span></h3>';
            echo '<form method="post" action="index.php?plik=admin">';
            echo '<P>Typ okładki:';
            echo '<Br><input type="text" name="xokl">';
            echo '<P><input type="submit" value="Dodaj okładkę">';
            echo '<input type="reset" value="Wyczyść"></form>';
            ?>
        </div>
    </div>
    <div class="admindodaj" class="wyd">
        <h2>Wydawnictwa</h2>
        <div class="doditem">
            <?php
            $wynikw = mysqli_query($conn, "SELECT * FROM wyd");
            while ($wierszw = mysqli_fetch_array($wynikw)) {
                echo '<div class="profil" style="height:40px;">   ' . $wierszw["wyd"];

                echo '<span style="float: right;"><a href="index.php?plik=usun&wyd=' . $wierszw["idwyd"] . '"><button><i class="fas fa-trash-alt"></i></button></a>
            <a href="index.php?plik=edycja&wyd=' . $wierszw["idwyd"] . '"><button type="button"><i class="fas fa-edit"></i></button></a></span>';
                echo '</div>';
            }

            echo '<h3><span class="ramka">Dodaj wydawnictwo</span></h3>';
            echo '<form method="post" action="index.php?plik=admin"><br>
            Nazwa wydawnictwa
            <Br><input type="text" required name="xwyd"><Br>
            Numer telefonu
            <Br><input type="tel" required name="xtel" placeholder="123456789"><Br>
            E-mail
            <Br><input type="email" required name="xmail"><Br>
            Adres
            <Br><input type="text" required name="xadres"><Br>
            <P><input type="submit" value="Dodaj wydawnictwo"> <input type="reset" value="Wyczyść">
            </form>';
            ?>
        </div>
    </div>
</div>
</div>