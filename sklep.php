<h2>Sklep</h2>
<?php

if (!isset ($_GET['grupa'])) {$grupa=1;}
	else {$grupa=$_GET['grupa'];}

require("conf.php");
$wynik = mysqli_query($conn, "select * from ksiazki");
$ile = mysqli_num_rows($wynik);
$poile=6;
$pomin=($grupa-1)*$poile;
$ilegrup = ceil($ile/$poile);

$wynik = mysqli_query($conn, "select * from ksiazki order by cena desc LIMIT $pomin,$poile");
$i=$pomin+1;
?>
<div class="sklep">
		<?php

		while ($wiersz = mysqli_fetch_array($wynik))
			{
			echo '<a href="index.php?plik=opis&nr=' . $wiersz ["id"] . '"><div class="ksiazka">';
			echo '<img class="ksiazkaimg" src="img/' . $wiersz ["id"] . '.jpg" height="320px"/>';
			echo '<div class="ksiazkaname">' . $wiersz ["tyt_pol"] . '<br>'
			. $wiersz ["cena"] .' zł</div>';
			echo'</div></a>';
			}
			?>
		</div>

<p>
<?php 

if($ilegrup>1){

	if($grupa>1) {echo '<a href="index.php?plik=sklep&grupa='.($grupa-1).'"><button><</button></a>';}
	for ($j=0; $j<$ilegrup; $j++)
	{


		echo '<a href=index.php?plik=sklep&grupa=' . ($j+1) . '><button>' . ($j+1) . '</button></a>';

	}
	if($grupa<$ilegrup) {echo '<a href="index.php?plik=sklep&grupa='.($grupa+1).'"><button>></button></a>';}

}


?>
</p>