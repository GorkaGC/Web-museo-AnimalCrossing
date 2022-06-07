<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include "head.php";
    ?>
    <title>Home</title>

    <style>
    .modal-contenido {
        background-color: aqua;
        width: 300px;
        padding: 10px 20px;
        margin: 20% auto;
        position: relative;
    }

    .modal {
        background-color: rgba(0, 0, 0, .8);
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        opacity: 0;
        pointer-events: none;
        transition: all 1s;
    }

    #miModal:target {
        opacity: 1;
        pointer-events: auto;
    }
    </style>

</head>

<body>
    <?php include "nav.php"; ?>

    <div class="user-full full-container">
        <div class="user-banner">
            <div class="user-banner-text">
                <h1>Hola, <spam><?php echo $_SESSION['user']->getUserName() ?></spam>
                </h1>
            </div>
        </div>
        <div class="user-content full-container">
            <div class="user-options-block container">
                <div class="user-option">
                    <a href="control.php?f=userInterfaceEditUserInfo">
                        <img src="./media/user_icon.png" alt="">
                        <label for="">Editar mis datos</label>
                    </a>
                </div>
                <div class="user-option">
                    <a href="control.php?f=userInterfacecheckUserOrders">
                        <img src="./media/user_orders_icon.png" alt="">
                        <label for="">Historial pedidos</label>
                    </a>
                </div>
                <div class="user-option">
                    <a href="control.php?f=logOut">
                        <img src="./media/logout_icon.png" alt="">
                        <label for="">Cerrar sesión</label>
                    </a>
                </div>
            </div>
            <div class="user-info-block container">

                <?php
    switch ($_SESSION['optionUserInterface']) {
        case "checkUserInfo":
            include 'checkUserInfo.php';
            break;
        case "editUserInfo":
            include 'editUserInfo.php';
            break;
        case "checkUserOrders":
            ?>
                <div class="user-info user-orders-table">
                    <h3 style="text-align: center; padding: 5px;">Historial pedidos</h3>
                    <?php 
                    $countOrders = sizeof($_SESSION['allUserOrders']);
                    if($countOrders == 0) {
                        ?>
                    <ol>
                        <li>
                            <p class="user-info-title">Nº Pedido</p>
                            <p class="user-info-desc">No existen datos.</p>
                        </li>
                        <li>
                            <p class="user-info-title">Estado</p>
                            <p class="user-info-desc">No existen datos.</p>
                        </li>
                        </li>
                        <li>
                            <p class="user-info-title">Fecha</p>
                            <p class="user-info-desc">No existen datos.</p>
                        </li>
                    </ol>
                    <?php
                    } else {
                        ?>
                    <table>
                        <tr>
                            <th>Nº Pedido</th>
                            <th>Estado</th>
                            <th>Fecha</th>

                        </tr>
                        <?php
                        for ($i=0; $i < $countOrders; $i++) {
                            ?>
                        <tr>
                            <td><?php echo $_SESSION['allUserOrders'][$i]->getOrderID() ?></td>
                            <td><?php echo $_SESSION['allUserOrders'][$i]->getOrderStatus() ?></td>
                            <td><?php echo $_SESSION['allUserOrders'][$i]->getOrderDate() ?></td>
                            <td><img src="./media/eye-vector.png"
                                    onclick="getOrderDetails('<?php echo $_SESSION['allUserOrders'][$i]->getOrderID(); ?>')"
                                    alt="" title="Ver detalle"></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <?php
                    }
                    ?>
                </div>
                <?php
            break;
    }
            ?>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">User Info</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p id="order-ref"></p>
                        <p id="item-desc"></p>
                        <p id="item-quantity"></p>
                        <p id="item-price"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <?php include "footer.php"; ?>
</body>

</html>