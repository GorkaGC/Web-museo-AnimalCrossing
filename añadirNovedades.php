<?php

include 'credenciales.php';

$conexion = mysqli_connect($servername, $username, $password,$database);
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