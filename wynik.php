<h2>Wynik szukania</h2>
<?php
if (!isset($_GET['grupa']))
	{
	$xfraza = $_POST['xfraza'];
	$xgat = $_POST['xgat'];
	$xwyd = $_POST['xwyd'];
	$xokl = $_POST['xokl'];
	$xod = $_POST['xod'];
	$xdo = $_POST['xdo'];
	$xsort = $_POST['xsort'];
	$_SESSION['xfraza'] = $xfraza;
	$_SESSION['xgat'] = $xgat;
	$_SESSION['xwyd'] = $xwyd;
	$_SESSION['xokl'] = $xokl;
	$_SESSION['xod'] = $xod;
	$_SESSION['xdo'] = $xdo;
	$_SESSION['xsort'] = $xsort;
	}
else
	{
	$xfraza = $_SESSION['xfraza'];
	$xgat = $_SESSION['xgat'];
	$xwyd = $_SESSION['xwyd'];
	$xokl = $_SESSION['xokl'];
	$xod = $_SESSION['xod'];
	$xdo = $_SESSION['xdo'];
	$xsort = $_SESSION['xsort'];	
	}
echo 'Szukana fraza: <b><font color="black">';
if ($xfraza==""){echo '-';}
else {echo $xfraza;}
echo'</font></b>' ;
echo ', gatunek: ';

require("conf.php");
$wynik = mysqli_query($conn, "SELECT * FROM gatunki WHERE lp=$xgat");
$wiersz = mysqli_fetch_array($wynik);

echo '<b>';
if ($xgat=="0"){
	echo 'wszystkie';
	$xgat="";
}
else {
	$xgat="AND gatunek=".$xgat;
	echo '<font color= "black"> ' . $wiersz["gat"] . '</font>';
}
echo'</font></b>' ;
echo ', wydawnictwo: ';
$wynik = mysqli_query($conn, "SELECT * FROM wyd WHERE idwyd=$xwyd");
$wiersz = mysqli_fetch_array($wynik);

echo '<b>';
if ($xwyd=="0"){
	echo 'wszystkie';
	$xwyd="";
}
else {
	$xwyd="AND wydawnictwo=".$xwyd;
	echo '<font color= "black"> ' . $wiersz["wyd"] . '</font>';
}
echo ', oprawa: ';
$wynik = mysqli_query($conn, "SELECT * FROM okladka WHERE idokl=$xokl");
$wiersz = mysqli_fetch_array($wynik);

echo '<b>';
if ($xokl=="0"){
	echo 'wszystkie';
	$xwyd="";
}
else {
	$xokl="AND okladka=".$xokl;
	echo '<font color= "black"> ' . $wiersz["okl"] . '</font>';
}
echo ', data wydania: <b>' ;
if($xod=="" && $xdo=="") {echo 'wszystkie';}
echo '<font color ="black">';
if($xod=="" && $xdo<>"") {echo 'do ' . $xdo;}
if($xod<>"" && $xdo=="") {echo 'od ' . $xod;}
if($xod<>"" && $xdo<>"") {echo $xod . ' - ' . $xdo;}
echo '</font>';
echo '</b><br><br>';

if (!isset($_GET['grupa'])) {$grupa=1;}
 else {$grupa=$_GET['grupa'];}
require("conf.php");
if ($xdo=="") {$xdo=9999;}
if ($xsort==1) {$zsort="ORDER BY tyt_pol";}
if ($xsort==2) {$zsort="ORDER BY tyt_org";}
if ($xsort==3) {$zsort="ORDER BY autor";}
if ($xsort==4) {$zsort="ORDER BY datawyd DESC";}
$wynik = mysqli_query($conn, "SELECT * FROM ksiazki WHERE (tyt_pol LIKE '%$xfraza%' OR tyt_org LIKE '%$xfraza%' OR autor LIKE '%$xfraza%') AND (year(datawyd)>='$xod' AND year(datawyd) <='$xdo') $xgat $xwyd $xokl $zsort");
$ile = mysqli_num_rows($wynik);
$poile=6;
$pomin=($grupa-1)*$poile;
$ilegrup = ceil($ile/$poile);
$wynik = mysqli_query($conn, "SELECT * FROM ksiazki WHERE (tyt_pol LIKE '%$xfraza%' OR tyt_org LIKE '%$xfraza%' OR autor LIKE '%$xfraza%') AND (year(datawyd)>='$xod' AND year(datawyd) <='$xdo') $xgat $xwyd $xokl $zsort LIMIT $pomin,$poile");
?>
<div class="sklep">
<?php

while ($wiersz = mysqli_fetch_array($wynik))
			{
	echo '<a href="index.php?plik=opis&nr=' . $wiersz ["id"] . '"><div class="ksiazka">';
	echo '<img class="ksiazkaimg" src="'.img('img/',$wiersz["id"]).'" height="320px"/>';
	echo '<div class="ksiazkaname">' . $wiersz ["tyt_pol"] . '<br>'
	. $wiersz ["cena"] .' z??</div>';
	echo'</div></a>';
}
?>
</div>
<?php

if($ilegrup>1){

if ($grupa>1) {echo '<a href="index.php?plik=wynik&grupa=' . ($grupa-1) . '"><Button><</Button></a> ';}
for ($j=0; $j<$ilegrup; $j++)
{
	echo '<a href=index.php?plik=wynik&grupa=' . ($j+1) . '><Button>' . ($j+1). '</Button></a> ';
}
if ($grupa<$ilegrup) {echo '<a href="index.php?plik=wynik&grupa=' . ($grupa+1) . '"><Button>></Button></a>';}}
?>
</center>