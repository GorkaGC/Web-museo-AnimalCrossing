<?php

require 'juego.php';

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