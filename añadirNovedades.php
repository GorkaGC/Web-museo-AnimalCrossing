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
$sql = "SELECT `ID_GAME`, `NEW_DESCRIPTION` FROM new WHERE ID_GAME = '$idGame'";

$result  = $conexion->query($sql);
$listNews = array();
$iteration = 0;

while ($row = mysqli_fetch_array($result)){
    $listNews[$iteration] = $row;
    $iteration++;
}

echo json_encode($listNews);

?>