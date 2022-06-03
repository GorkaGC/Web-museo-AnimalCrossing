<?php

require 'juego.php';

include 'credenciales.php';

$conexion = mysqli_connect($servername, $username, $password,$database);
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