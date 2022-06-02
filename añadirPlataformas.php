<?php

include 'credenciales.php';

$conexion = mysqli_connect($servername, $username, $password, $database);
$idGame = $_GET['idGame'];
$sql = "SELECT `ID_GAME`, `PLATFORM_NAME` FROM platform WHERE ID_GAME = '$idGame'";

$result  = $conexion->query($sql);
$listPlatforms = array();
$iteration = 0;

while ($row = mysqli_fetch_array($result)){
    $listPlatforms[$iteration] = $row;
    $iteration++;
}

echo json_encode($listPlatforms);

?>