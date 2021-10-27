<?php
	if ($_SESSION['zalogowany']==FALSE)
	{
		header('Location: index.php?plik=home');
		exit();
	}
	if (!isset ($_GET['grupa'])) {$grupa=1;}
		else {$grupa=$_GET['grupa'];}

?>

<div id="opis">
<h3>Witaj <b><?php echo $_SESSION['user']?></b></h3>

<?php

$iduser=$_SESSION['id'];

require("conf.php");

echo '<h2>Twoje oceny</h2>';

$wynik = mysqli_query($conn, "select * from oceny");
$ile = mysqli_num_rows($wynik);
$poile=2;
$pomin=($grupa-1)*$poile;
$ilegrup = ceil($ile/$poile);

$wynikkom = mysqli_query($conn, "SELECT * FROM oceny INNER JOIN uzytkownicy WHERE oceny.idus=uzytkownicy.iduser AND idus=$iduser order by datadod desc LIMIT $pomin,$poile");
while ($wierszkom = mysqli_fetch_array($wynikkom))
{
    echo '<div class="ocena">
        <div class="headerocena">' . $wierszkom ["user"].'<span style="float: right;"> ' . $wierszkom ["datadod"].'</span>' ;
echo '</div>';
echo '<p>' . $wierszkom ["tresc"].'</p></div>';
}

?>

<!--
<h2>Dobierz własne kolory strony</h2>
<form method="post" action="index.php?plik=ustawienia">
<p>
	<label for="pdst">Kolor podstawowy:</label><br>
	<input type="color" id="pdst" name="kol_pdst" value="#689f38">
</p>
<p>
	<label for="ciem">Kolor ciemny:</label><br>
	<input type="color" id="ciem" name="kol_ciem" value="#387002">
</p>
<p>
	<label for="jas">Kolor jasny:</label><br>
	<input type="color" id="jas" name="kol_jas" value="#99d066">
</p>

<input type="submit" value="Zapisz">
</form>
-->
<?php 

if($ilegrup>1){

	if($grupa>1) {echo '<a href="index.php?plik=ustawienia&grupa='.($grupa-1).'"><button><</button></a>';}
	for ($j=0; $j<$ilegrup; $j++)
	{


		echo '<a href=index.php?plik=ustawienia&grupa=' . ($j+1) . '><button>' . ($j+1) . '</button></a>';

	}
	if($grupa<$ilegrup) {echo '<a href="index.php?plik=ustawienia&grupa='.($grupa+1).'"><button>></button></a>';}

}


?>
</div>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$kol_pdst= $_POST["kol_pdst"];
		$kol_ciem= $_POST["kol_ciem"];
		$kol_jas= $_POST["kol_jas"];
		$sql = mysqli_query($conn, "UPDATE `uzytkownicy` SET `kol_pdst` = '$kol_pdst', `kol_ciem` = '$kol_ciem', `kol_jas` = '$kol_jas' WHERE `uzytkownicy`.`iduser` = $iduser;");
		echo '<h2>Zmieniono styl</h2>';
		setcookie(kol_pdst, $kol_pdst);
		setcookie(kol_ciem, $kol_ciem);
		setcookie(kol_jas, $kol_jas);
    }
?>