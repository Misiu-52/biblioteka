<?php
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php?plik=home');
		exit();
	}
?>

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

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		require("conf.php");
		$kol_pdst= $_POST["kol_pdst"];
		$kol_ciem= $_POST["kol_ciem"];
		$kol_jas= $_POST["kol_jas"];
		$iduser = $_SESSION['id'];
		$sql = mysqli_query($conn, "UPDATE `uzytkownicy` SET `kol_pdst` = '$kol_pdst', `kol_ciem` = '$kol_ciem', `kol_jas` = '$kol_jas' WHERE `uzytkownicy`.`iduser` = $iduser;");
		echo '<h2>Zmieniono styl</h2>';
    }
?>