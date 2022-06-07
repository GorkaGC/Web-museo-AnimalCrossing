<?php

require 'order.php';

$server = "localhost";
$bd = "animalcrossing";
//$user = "root";
//$pass = "";
//$user = "Gorka";
//$pass = "2d4wmi1";
$user = "user";
$pass = "pass";

$conexion = mysqli_connect($server, $user, $pass,$bd);
$idPedido = $_GET['idPedido'];
//$sql = "SELECT `ORDER_ID`, `ITEM_ID`, `ITEM_QUANTITY`, `DETAIL_UNIT_PRICE` FROM details WHERE ORDER_ID = '$idPedido'";
//$sql = "SELECT `ORDER_ID`, d.`ITEM_ID`, `ITEM_QUANTITY`, `DETAIL_UNIT_PRICE`, `ITEM_DESCRIPTION` FROM item i, details d WHERE d.ITEM_ID = $idPedido;";
//$sql = "SELECT d.`ORDER_ID`, d.`ITEM_ID`, `ITEM_QUANTITY`, `DETAIL_UNIT_PRICE`, `ITEM_DESCRIPTION` FROM item i, details d, orders WHERE orders.ORDER_ID = $idPedido AND i.ITEM_ID = d.ITEM_ID;";
$sql = "SELECT d.`ORDER_ID`, d.`ITEM_ID`, `ITEM_QUANTITY`, `DETAIL_UNIT_PRICE`, `ITEM_DESCRIPTION` FROM item i, details d, orders o WHERE o.ORDER_ID = d.ORDER_ID AND d.ITEM_ID = i.ITEM_ID AND o.ORDER_ID = $idPedido;";


//var_dump($sql);
//die();
$result  = $conexion->query($sql);
$details = array();
$iteration = 0;
$row = mysqli_fetch_array($result);
//while ($row = mysqli_fetch_array($result)){
    $details[$iteration] = $row;
    $iteration++;
//}

echo json_encode($details);

?>