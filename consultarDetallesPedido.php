<?php

require 'order.php';

include 'credenciales.php';

$conexion = mysqli_connect($servername, $username, $password,$database);
$idPedido = $_GET['idPedido'];
$sql = "SELECT `STATUS`, `ORDER_DATE`, d.`ORDER_ID`, `ITEM_QUANTITY`, `DETAIL_UNIT_PRICE`, `ITEM_DESCRIPTION` FROM item i, details d, orders o WHERE o.ORDER_ID = d.ORDER_ID AND d.ITEM_ID = i.ITEM_ID AND o.ORDER_ID = $idPedido;";


$result  = $conexion->query($sql);
$details = array();
$iteration = 0;

$row = mysqli_fetch_array($result);
$details[$iteration] = $row;


echo json_encode($details);

?>