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

if (isset($_GET["user"]) and $_SESSION['admin']==1){
    require("conf.php");
    $user= $_GET["user"];
    $wynik = mysqli_query($conn, "DELETE FROM uzytkownicy WHERE iduser=$user");
    echo'<center><div class="error"><i class="fas fa-exclamation-triangle"></i> Usunięto użytkownika!!!</div></center>';
    
    header( "refresh:3;url=index.php" );

}

if (isset($_GET["gat"]) and $_SESSION['admin']==1){
    require("conf.php");
    $gat= $_GET["gat"];
    $wynik = mysqli_query($conn, "DELETE FROM gatunki WHERE lp=$gat");
    echo'<center><div class="error"><i class="fas fa-exclamation-triangle"></i> Usunięto gatunek książki!!!</div></center>';
    
    header( "refresh:3;url=index.php" );

}

if (isset($_GET["okl"]) and $_SESSION['admin']==1){
    require("conf.php");
    $okl= $_GET["okl"];
    $wynik = mysqli_query($conn, "DELETE FROM okladka WHERE idokl=$okl");
    echo'<center><div class="error"><i class="fas fa-exclamation-triangle"></i> Usunięto typ okładki!!!</div></center>';
    
    header( "refresh:3;url=index.php" );

}

if (isset($_GET["wyd"]) and $_SESSION['admin']==1){
    require("conf.php");
    $wyd= $_GET["wyd"];
    $wynik = mysqli_query($conn, "DELETE FROM wyd WHERE idwyd=$wyd");
    echo'<center><div class="error"><i class="fas fa-exclamation-triangle"></i> Usunięto wydawnictwo!!!</div></center>';
    
    header( "refresh:3;url=index.php" );

}
?>