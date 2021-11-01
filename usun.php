<?php
if (isset($_GET["nr"])){

require("conf.php");
$nr= $_GET["nr"];
$wynik = mysqli_query($conn, "DELETE FROM ksiazki WHERE id=$nr");
echo'<center><div class="error"><i class="fas fa-exclamation-triangle"></i> Książka została usunięta!!!</div></center>';

header( "refresh:3;url=index.php" );
}

if (isset($_GET["ocena"])){
    require("conf.php");
    $ocena= $_GET["ocena"];
    $wynik = mysqli_query($conn, "DELETE FROM oceny WHERE idoc=$ocena");
    echo'<center><div class="error"><i class="fas fa-exclamation-triangle"></i> Ocena została usunięta!!!</div></center>';
    
    header( "refresh:3;url=index.php" );

}
?>