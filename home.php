		<h2>Strona główna</h2>

		<h3>Najnowsze książki</h3>

		<div class="wystawa">
		<?php
		require("conf.php");
		$wynik = mysqli_query($conn, "select * from ksiazki order by id desc limit 4");

		while ($wiersz = mysqli_fetch_array($wynik))
			{
			echo '<a href="index.php?plik=opis&nr=' . $wiersz ["id"] . '"><div class="ksiazka">';
			echo '<img width="240px" class="ksiazkaimg" src="img/' . $wiersz ["id"] . '.jpg" height="320px"/>';
			echo '<div class="ksiazkaname">' . $wiersz ["tyt_pol"] . '<br>'
			. $wiersz ["cena"] .' zł</div>';
			echo'</div></a>';
			}
			?>
		</div>

		<h3>Bestsellery</h3>
		
		<div class="wystawa">
		<?php
		require("conf.php");
		$wynik = mysqli_query($conn, "select * from ksiazki order by cena desc limit 4");

		while ($wiersz = mysqli_fetch_array($wynik))
			{
			echo '<a href="index.php?plik=opis&nr=' . $wiersz ["id"] . '"><div class="ksiazka">';
			echo '<img width="240px" class="ksiazkaimg" src="img/' . $wiersz ["id"] . '.jpg" height="320px"/>';
			echo '<div class="ksiazkaname">' . $wiersz ["tyt_pol"] . '<br>'
			. $wiersz ["cena"] .' zł</div>';
			echo'</div></a>';
			}
			?>
		<div>
		
		
		</div>
		</div>