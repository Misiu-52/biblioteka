<h2>Wyszukiwarka</h2>
<form method="post" action="index.php?plik=wynik">
<p>Szukaj:
<input type="text" name="xfraza" size="40" maxlength="60"></p>
<p>Gatunek: <select name="xgat">
<option value="0">wszytskie</option>
<?php
require("conf.php");
$wynik = mysqli_query($conn, "SELECT * FROM gatunki ORDER BY gat");
while ($wiersz = mysqli_fetch_array($wynik))
{
echo '<option value="' . $wiersz["lp"] . '">' . $wiersz["gat"] . '</option>';
}
?>
</select></p>

Wydawnictwo: <select name="xwyd">
<option value="0">wszytskie</option>
<?php
require("conf.php");
$wynik = mysqli_query($conn, "SELECT * FROM wyd ORDER BY wyd");
while ($wiersz = mysqli_fetch_array($wynik))
{
echo '<option value="' . $wiersz["idwyd"] . '">' . $wiersz["wyd"] . '</option>';
}
?>
</select></p>
<p>
Wydano od: <input type="date" name="xod">
do: <input type="date" name="xdo">
</p>

<p>Sortowanie: <select name="xsort">
<option value="1">Tytuł polski</option>
<option value="2">Tytuł oryginalny</option>
<option value="3">Autor</option>
<option value="4">Data</option>
</select></p>
<p>
<input type="submit" value="Szukaj">
</p>
</form>