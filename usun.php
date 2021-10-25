<center><div class="error">Książka została usunięta!!!</div></center>
<?php
require("conf.php");
$nr= $_GET["nr"];
$wynik = mysqli_query($conn, "DELETE FROM ksiazki WHERE id=$nr");



?>