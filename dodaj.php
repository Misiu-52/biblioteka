<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["xpol"])){
			require("conf.php");

			$xpol= $_POST["xpol"];
			$xorg= $_POST["xorg"];
			$xautor= $_POST["xautor"];
			$xdatawyd= $_POST["xdatawyd"];
			$xgat= $_POST["xgat"];
			$xwyd= $_POST["xwyd"];
			$xokl= $_POST["xokl"];
			$xcena= $_POST["xcena"];
			$xopis= $_POST["xopis"];

			$target_dir = "img/";
			$target_file = $target_dir . basename($_FILES["xobraz"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			  $check = getimagesize($_FILES["xobraz"]["tmp_name"]);
			  if($check !== false) {
				echo "Obraz - " . $check["mime"] . ".";
				$uploadOk = 1;
			  } else {
				echo "To nie jest obraz.";
				$uploadOk = 0;
			  }
			}
			
			// Allow certain file formats
			if($imageFileType != "jpg") {
			  echo "Wymaganym formatem jest jpg.";
			  $uploadOk = 0;
			}
			else{
				$sqlfile=mysqli_query($conn,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '2021_2b1_biblioteka' AND TABLE_NAME = 'ksiazki';");
				$sqlfilefetch = $sqlfile->fetch_assoc();
				$target_file=$target_dir.$sqlfilefetch["AUTO_INCREMENT"].".jpg";

			}
			
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "Wysyłanie się nie powiodło.";
			// if everything is ok, try to upload file
			} else {
			  if (move_uploaded_file($_FILES["xobraz"]["tmp_name"], $target_file)) {
				
				echo "Obraz ". htmlspecialchars( basename( $_FILES["xobraz"]["name"])). " wysłano.";

				$sql = mysqli_query($conn, "INSERT INTO ksiazki VALUES('','$xpol','$xorg','$xautor','$xgat','$xwyd','$xopis','$xokl','$xcena','$xdatawyd')");
				} 
			else {
				echo "Wysyłanie się nie powiodło.";
			  }
			}
			
			echo '<br><div class="suc">Dodano książkę <font color="white">'.$xpol.'</font> do księgarni</div>';
			
        }
?>
<h2>Dodaj swoją książkę</h2>

<form method="post" action="index.php?plik=dodaj" enctype="multipart/form-data">
Tytuł polski: <input required type="text" name="xpol" size="50" maxlength="35">
<P>Tytuł orginalny: <input required type="text" name="xorg" size="50" maxlength="35">
<P>Autor: <input required type="text" name="xautor" size="50" maxlength="60">
<P>Data: <input required type="date" name="xdatawyd">
Gatunek:
<select name="xgat">
<?php
require("conf.php");
$wynik = mysqli_query($conn, "SELECT * FROM gatunki ORDER By gat");
while ($wiersz = mysqli_fetch_array($wynik))
{
	echo '<option value="' . $wiersz["lp"] . '">' . $wiersz["gat"] . '</option>';}
?>
</select>
<p>Wydawnictwo:
<select name="xwyd">
<?php
require("conf.php");
$wynik = mysqli_query($conn, "SELECT * FROM wyd ORDER By wyd");
while ($wiersz = mysqli_fetch_array($wynik))
{
	echo '<option value="' . $wiersz["idwyd"] . '">' . $wiersz["wyd"] . '</option>';}
?>
</select></p>
<p>Typ okładki:
<select name="xokl">
<?php
require("conf.php");
$wynik = mysqli_query($conn, "SELECT * FROM okladka ORDER By okl");
while ($wiersz = mysqli_fetch_array($wynik))
{
	echo '<option value="' . $wiersz["idokl"] . '">' . $wiersz["okl"] . '</option>';}
?>
</select></p>
Cena: <input type="number" name="xcena" value="0" min="0" max="1000"> zł
<P>Opis:<Br>
<Br><textarea required name="xopis" cols="70" rows="5"></textarea>
<p><input type="file" name="xobraz"></p>
<P><input type="submit" value="Dodaj">
	<input type="reset" value="Wyczyść">
</form>