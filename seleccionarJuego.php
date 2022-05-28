<?php

require 'juego.php';

$server = "localhost";
$bd = "animalcrossing";
//$user = "root";
//$pass = "";
//$user = "Gorka";
//$pass = "2d4wmi1";
$user = "user";
$pass = "pass";

$conexion = mysqli_connect($server, $user, $pass,$bd);
$idGame = $_GET['idGame'];
$sql = "SELECT `ID_GAME`, `URL_COVER_IMG`, `TITLE_GAME`, `GAME_DESC`, `RELEASE_DATE`, `URL_TRAILER` FROM game WHERE ID_GAME = '$idGame'";

$result  = $conexion->query($sql);
$listGames = array();
$iteration = 0;

while ($row = mysqli_fetch_array($result)){
    $listGames[$iteration] = $row;
    $iteration++;
}

echo json_encode($listGames);

?>