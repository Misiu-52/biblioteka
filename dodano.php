<?php
require("conf.php");
$xpol= $_POST["xpol"];
$xorg= $_POST["xorg"];
$xautor= $_POST["xautor"];
$xdatawyd= $_POST["xdatawyd"];
$xgat= $_POST["xgat"];
$xwyd= $_POST["xwyd"];
$xokl= $_POST["xokl"];
$xcena= $_POST["xcena"];
$xrabat= $_POST["xrabat"];
$xopis= $_POST["xopis"];
$sql = mysqli_query($conn, "insert into ksiazki values('','$xpol','$xorg','$xautor','$xgat','$xwyd','$xopis','$xokl','$xcena','$xdatawyd')");
header( "refresh:0;url=index.php?plik=dodaj" );
?>