<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "head.php";
    ?>
    <title>Tienda - Compra</title>
</head>

<body>
    <?php include "nav.php"; ?>

    <div class="tienda full-container">
        <div class="tienda-content container">
            <h1>Cesta</h1>
            <form class="form-compra" action="control.php?f=finalizarCompra" method="post">
                <div class="compra-blocks">
                    <div class="compra-info-block">
                        <h3>Cesta</h2>
                            <ol>
                                <li>
                                    <p class="info-title">Nombre</p>
                                    <p class="info-desc"><?php echo $_SESSION['cesta']->getNombre() ?></p>
                                </li>
                                <li>
                                    <p class="info-title">Precio</p>
                                    <p class="info-desc" id="item_price"> <?php echo $_SESSION['cesta']->getPrecio() ?>
                                    </p>
                                </li>
                                </li>
                                <li>
                                    <p class="info-title">Cantidad</p>
                                    <input type="number" min="1" name="item_quantity" value="1" id="item_quantity"
                                        oninput="actualizarTotal()"
                                        onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                </li>
                                <li>
                                    <p class="info-title">Total</p>
                                    <p class="info-desc" id="totalOrder">
                                        <?php echo $_SESSION['cesta']->getPrecio() ?>
                                    </p>
                                </li>
                            </ol>
                    </div>
                    <div class="compra-info-block">
                        <h3>Datos de envío</h2>
                            <ol>
                                <li>
                                    <p class="info-title">Nombre</p>
                                    <p class="info-desc"><?php echo $_SESSION['user']->getUserName() ?></p>
                                </li>
                                <li>
                                    <p class="info-title">Apellidos</p>
                                    <?php if (empty($_SESSION['user']->getUserLastname())) {
                                ?>
                                    <input required name="userLastname" type="text" class="info-desc">
                                    <?php
                            } else {
                                ?>
                                    <p class="info-desc"> <?php echo $_SESSION['user']->getUserLastname() ?> </p>
                                    <?php
                            }
                            ?>
                                </li>
                                </li>
                                <li>
                                    <p class="info-title">Correo</p>
                                    <p class="info-desc"><?php echo $_SESSION['user']->getUserMail() ?></p>
                                </li>
                                <li>
                                    <p class="info-title">Dirección</p>
                                    <?php if (empty($_SESSION['user']->getUserAddress())) {
                                ?>
                                    <input required name="userAddress" type="text" class="info-desc">
                                    <?php
                            } else {
                                ?>
                                    <p class="info-desc"> <?php echo $_SESSION['user']->getUserAddress() ?> </p>
                                    <?php
                            }
                            ?>
                                </li>
                            </ol>
                    </div>

                </div>

                <div class="compra-info-block">
                    <h3>Método de pago</h3>

                    <select name="metodoPago" id="metodoPago" onchange="actualizarMetodoPago();">
                        <option value="contrareembolso" selected>Contrareembolso</option>
                        <option value="tarjeta">Tarjeta</option>
                    </select>
                    <div id="metodoPagoC">Se pagará el importe total a la entrega del pedido.</div>
                    <div id="metodoPagoT">
                        Ha seleccionado pago con tarjeta, por favor, rellene los siguientes datos:
                        <div class="datosTarjeta">
                            <label for="">Propietario:</label>
                            <input type="text" name="propietarioTarjeta" placeholder="Usuario Usuariez">
                            <label for="">Número:</label>
                            <input type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" name="numeroTarjeta">
                            <label for="">Fecha Cad:</label>
                            <input type="text" name="caducidadTarjeta" pattern="[0-1][0-9]/[0-9][0-9]" placeholder="XX/XX">
                            <label for="">CVV:</label>
                            <input type="text" pattern="[0-9]{3}" name="claveTarjeta" placeholder="xxx">
                        </div>

                    </div>
                </div>
                <input type="submit" value="Finalizar compra">
            </form>
        </div>

    </div>


    <?php include "footer.php"; ?>
</body>

</html>