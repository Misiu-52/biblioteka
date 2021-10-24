<h2>Książka została usunięta!!!</h2>
<?php
require("conf.php");
$nr= $_GET["nr"];
$wynik = mysqli_query($conn, "DELETE FROM ksiazki WHERE id=$nr");



?>