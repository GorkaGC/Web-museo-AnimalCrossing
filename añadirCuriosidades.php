<?php

require 'juego.php';

include 'credenciales.php';

$conexion = mysqli_connect($servername, $username, $password, $database);
$idGame = $_GET['idGame'];
$sql = "SELECT `ID_GAME`, `DESCRIPTION` FROM curiosity WHERE ID_GAME = '$idGame'";

$result  = $conexion->query($sql);
$listCuriosities = array();
$iteration = 0;

while ($row = mysqli_fetch_array($result)){
    $listCuriosities[$iteration] = $row;
    $iteration++;
}

echo json_encode($listCuriosities);

?>