<?php

$server = "localhost";
$bd = "animalcrossing";
$user = "root";
$pass = "";
//$user = "Gorka";
//$pass = "2d4wmi1";
//$user = "user";
//$pass = "pass";

$conexion = mysqli_connect($server, $user, $pass,$bd);
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