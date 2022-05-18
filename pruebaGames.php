<?php

/* $sql = "SELECT * FROM game";

function connectDB(){
    $server = "localhost";
    $bd = "animalcrossing";
    $user = "root";
    $pass = "";

    $conexion = mysqli_connect($server, $user, $pass,$bd);

    return $conexion;

}

function disconnectDB($conexion){

    $close = mysqli_close($conexion);

    return $close;
}

function getArraySQL($sql){
    //Creamos la conexión con la función anterior
    $conexion = connectDB();

    //generamos la consulta

        mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

    if(!$result = mysqli_query($conexion, $sql)){
        die();
    } 

    $rawdata = array(); //creamos un array

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;

    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }

    disconnectDB($conexion); //desconectamos la base de datos

    return $rawdata; //devolvemos el array
}

        $myArray = getArraySQL($sql);
        echo json_encode($myArray);
 */

require 'juego.php';

$server = "localhost";
$bd = "animalcrossing";
$user = "root";
$pass = "";

$conexion = mysqli_connect($server, $user, $pass,$bd);

$sql = "SELECT `ID_GAME`, `URL_COVER_IMG`, `TITLE_GAME`, `GAME_DESC`, `RELEASE_DATE` FROM game";

$result  = $conexion->query($sql);
$listGames = array();

while ($row = $result->fetch_assoc()){
    $game = new Juego($row['ID_GAME'], $row['URL_COVER_IMG'], $row['TITLE_GAME'], $row['GAME_DESC'], $row['RELEASE_DATE']);
    $listGames[] = $game;
}

echo json_encode($listGames);

?>