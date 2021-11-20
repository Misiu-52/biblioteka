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
<h3>Witaj <b><?php echo $_SESSION['user']?></b> w Księgarnii</h3>

<?php

$iduser=$_SESSION['id'];

require("conf.php");

echo'<h2>Zmień awatar</h2>';
echo'<p><img style="border-radius:50%; height:300px; width:300px;"src="'.img('img/user/',$iduser).'"/></p>';
?>
<form method="post" action="index.php?plik=ustawienia" enctype="multipart/form-data">
<p><input type="file" name="xobraz" accept="image/png, image/jpeg, image/jpg, image/bmp, image/gif, image/webp, image/svg"></p>
<P><input type="submit" value="Dodaj">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require("conf.php");
	$target_dir = "img/user/";
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
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "bmp" && $imageFileType != "webp" && $imageFileType != "svg" ) {
	  echo "Tylko obrazy w formacie JPG, JPEG, PNG, BMP, WEBP, SVG i GIF są obsługiwane.";
	  $uploadOk = 0;
	}
	else{
		switch ($imageFileType) {
			case "jpg":
				$target_file=$target_dir.$iduser.".jpg";
				break;
			case "jpeg":
				$target_file=$target_dir.$iduser.".jpeg";
				break;
			case "png":
				$target_file=$target_dir.$iduser.".png";
				break;
			case "gif":
				$target_file=$target_dir.$iduser.".gif";
				break;
			case "bmp":
				$target_file=$target_dir.$iduser.".bmp";
				break;
			case "webp":
				$target_file=$target_dir.$iduser.".webp";
				break;
			case "svg":
				$target_file=$target_dir.$iduser.".svg";
				break;
			default:
				echo "Wysyłanie obrazu się nie powiodło.";
				$uploadOk == 0;
			}
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	echo "Wysyłanie się nie powiodło.";
	// if everything is ok, try to upload file
	} else {
	if (move_uploaded_file($_FILES["xobraz"]["tmp_name"], $target_file)) {
		
		echo "Obraz ". htmlspecialchars( basename( $_FILES["xobraz"]["name"])). " wysłano.";
		header("Refresh:0");

		} 
	else {
		echo "Wysyłanie się nie powiodło.";
	}
	}
}

echo '<br><h2>Twoje oceny</h2>';
$wynik = mysqli_query($conn, "SELECT * from oceny WHERE idus=$iduser;");
$ile = mysqli_num_rows($wynik);
echo '<h3>Wstawiłeś ocen: ';
echo  $ile .'</h3>';
$poile=4;
$pomin=($grupa-1)*$poile;
$ilegrup = ceil($ile/$poile);
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

	$wynikkom = mysqli_query($conn, "SELECT * FROM oceny INNER JOIN uzytkownicy WHERE oceny.idus=uzytkownicy.iduser AND idus=$iduser order by datadod desc LIMIT $pomin,$poile");
	while ($wierszkom = mysqli_fetch_array($wynikkom))
	{
		echo '<a href="index.php?plik=opis&nr='.$wierszkom ["idks"].'" target="_blank"><div class="ocena">
			<div class="headerocena"><img src="'.img('img/user/',$wierszkom ["idus"]).'" style="border-radius:50%; vertical-align:middle;" width="40px" height="40px"/>   ' . $wierszkom ["user"];
			if($wierszkom ["adminus"]==1){
				echo' <i class="fas fa-user-astronaut"></i>';
			}
		echo'<span style="float: right;"> ' . $wierszkom ["datadod"].'</span>' ;
		echo '</div>';
		echo '<p>' . $wierszkom ["tresc"].'</p></div></a>';
}

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