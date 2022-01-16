<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
echo '<h2>Ocena dodana</h2>';
require("conf.php");
$nr= $_GET["nr"];

$xtresc= htmlspecialchars($_POST["xtresc"]);
$xuser= htmlspecialchars($_SESSION["id"]);
$sql = mysqli_query($conn, "INSERT into oceny values('','$nr','$xtresc','$xuser', now())");}
if (!isset ($_GET['grupa'])) {$grupa=1;}
else {$grupa=$_GET['grupa'];}


require("conf.php");
$nr= $_GET["nr"];
$wynik = mysqli_query($conn, "SELECT * FROM ksiazki, gatunki, wyd, okladka WHERE ksiazki.gatunek = gatunki.lp AND ksiazki.wydawnictwo = wyd.idwyd AND ksiazki.okladka = okladka.idokl AND id=$nr");
$wiersz = mysqli_fetch_array($wynik);
echo '<div id="opis">';
echo '<img style="margin: 10px;" src="'.img('img/',$wiersz["id"]).'" height="350px" class="ksiazkaimg"/>';
echo '<div class="imgside"><h1>'.  $wiersz["tyt_pol"] . '<br>('.  $wiersz["tyt_org"] .')</h1>
<h2>Autor: '.  $wiersz["autor"] .'</h2>
<h2>Gatunek: '.  $wiersz["gat"] .'</h2>
<a href="index.php?plik=wyd&wyd=' . $wiersz["idwyd"] . '"><h2>Wydawnictwo: '.  $wiersz["wyd"] .'</h2></a>
<h2>Oprawa: '.  $wiersz["okl"] .'</h2>
<h2>Wydano: '.  $wiersz["datawyd"] .'</h2>
<button>'. $wiersz["cena"] .' zł Kup teraz</button>';

if (($_SESSION['admin'])== 1 )
{
    echo'<a href="index.php?plik=usun&nr=' . $nr . '"><button><i class="fas fa-trash-alt"></i></button></a>';
    echo' <a href="index.php?plik=edycja&nr=' . $nr . '"><button type="button"><i class="fas fa-edit"></i></button></a>';
}

echo'</div>';

echo '<div class="opis">'.  $wiersz["opis"] .'</div>';

echo'<h2>Oceny książki</h2>';

$wynik = mysqli_query($conn, "SELECT * FROM oceny WHERE idks=$nr;");
$ile = mysqli_num_rows($wynik);
echo '<h3>Liczba ocen: ';
echo  $ile .'</h3>';
$poile=4;
$pomin=($grupa-1)*$poile;
$ilegrup = ceil($ile/$poile);

$wynikkom = mysqli_query($conn, "SELECT * FROM oceny INNER JOIN uzytkownicy WHERE oceny.idus=uzytkownicy.iduser AND idks=$nr ORDER BY datadod DESC LIMIT $pomin,$poile");
while ($wierszkom = mysqli_fetch_array($wynikkom))
{
        echo '<div class="ocena">
        <div class="headerocena"><img src="'.img('img/user/',$wierszkom["idus"]).'" style="border-radius:50%; vertical-align:middle;" width="40px" height="40px"/>   ' . $wierszkom ["user"];
        if($wierszkom ["adminus"]==1){
            echo' <i class="fas fa-user-astronaut"></i>';
        }
        echo '<span style="float: right;"> ';
        
        if($_SESSION['admin']==1 or $wierszkom ["idus"]==$_SESSION['id']){
        echo '<a href="index.php?plik=usun&ocena=' . $wierszkom ["idoc"]. '"><button><i class="fas fa-trash-alt"></i></button></a>
        <a href="index.php?plik=edycja&ocena=' . $wierszkom ["idoc"] . '"><button type="button"><i class="fas fa-edit"></i></button></a>'; 
        }
        echo $wierszkom ["datadod"].'</span>' ;
        echo '</div>';
        echo '<p>' . $wierszkom ["tresc"].'</p></div>';
}

if($ilegrup>1){

	if($grupa>1) {echo '<a href="index.php?plik=opis&nr='.$nr.'&grupa='.($grupa-1).'"><button><</button></a>';}
	for ($j=0; $j<$ilegrup; $j++)
	{


		echo '<a href=index.php?plik=opis&nr='.$nr.'&grupa=' . ($j+1) . '><button>' . ($j+1) . '</button></a>';

	}
	if($grupa<$ilegrup) {echo '<a href="index.php?plik=opis&nr='.$nr.'&grupa='.($grupa+1).'"><button>></button></a>';}

}

?>
</div>
<?php
if (($_SESSION['zalogowany'])== TRUE)
{
    echo'<h2><span class="ramka">Dodaj ocenę</span></h2>';
    echo'<form method="post" action="index.php?plik=opis&nr='.$nr.'">';
    echo'<P>Treść:';
    echo'<Br><textarea name="xtresc" cols="70" rows="5"></textarea>';
    echo'<P><input type="submit" value="Dodaj ocenę">';
	echo'<input type="reset" value="Wyczyść">';
}
else {
    echo'<h3>Aby dodać ocenę musisz być zalogowany</h3>';

}
?>