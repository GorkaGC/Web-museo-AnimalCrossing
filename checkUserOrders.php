<div class="user-info user-orders-table" id="user-orders-table">
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
                    onclick="getOrderDetails('<?php echo $_SESSION['allUserOrders'][$i]->getOrderID(); ?>')" alt=""
                    title="Ver detalle"></td>
        </tr>
        <?php
                            }
                        ?>
    </table>
    <?php
                    }
                    ?>

</div>

<div class="popup" id="popup" onclick="cerrarPopup()">
    <div id="miModal" class="modal">
        <div class="modal-contenido">
            <div class="detail-title">
            <h2>Detalle pedido nº <span id="order-ref"></span></h2>
            <a href="#user-orders-table">X</a>
            </div>
            <div class="detail">
                <p>Descripción producto: <span id="item-desc"></span></p>
                <p>Cantidad: <span id="item-quantity"></span></p>
                <p>Precio: <span id="item-price"></span>€</p>
                <p>Total pedido: <span id="order-total"></span>€</p>
                <p>Fecha pedido: <span id="order_date"></span></p>
                <p>Estado pedido: <span id="order_status"></span></p>
            </div>
        </div>
    </div>
</div>