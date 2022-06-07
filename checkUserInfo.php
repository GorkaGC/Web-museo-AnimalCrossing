<div class="user-info">
    <h3>Mi cuenta</h3>
    <ol>
        <li>
            <p class="user-info-title">Nombre</p>
            <p class="user-info-desc"><?php echo $_SESSION['user']->getUserName() ?></p>
        </li>
        <li>
            <p class="user-info-title">Apellidos</p>
            <?php if (empty($_SESSION['user']->getUserLastname())) {
                                ?>
            <p class="user-info-desc"> - </p>
            <?php
                            } else {
                                ?>
            <p class="user-info-desc"> <?php echo $_SESSION['user']->getUserLastname() ?> </p>
            <?php
                            }
                            ?>
        </li>
        </li>
        <li>
            <p class="user-info-title">Correo</p>
            <p class="user-info-desc"><?php echo $_SESSION['user']->getUserMail() ?></p>
        </li>
        <li>
            <p class="user-info-title">Dirección</p>
            <?php if (empty($_SESSION['user']->getUserAddress())) {
                                ?>
            <p class="user-info-desc"> - </p>
            <?php
                            } else {
                                ?>
            <p class="user-info-desc"> <?php echo $_SESSION['user']->getUserAddress() ?> </p>
            <?php
                            }
                            ?>
        </li>
    </ol>
</div>
<div class="user-info">
    <h3>Mi último pedido</h3>
    <ol>
        <li>
            <p class="user-info-title">Nº Pedido</p>
            <?php if (empty($_SESSION['lastOrder']->getOrderID())) {
                                ?>
            <p class="user-info-desc"> - </p>
            <?php
                            } else {
                                ?>
            <p class="user-info-desc"> <?php echo $_SESSION['lastOrder']->getOrderID() ?> </p>
            <?php
                            }
                            ?>
        </li>
        <li>
            <p class="user-info-title">Estado</p>
            <?php if (empty($_SESSION['lastOrder']->getOrderID())) {
                                ?>
            <p class="user-info-desc"> - </p>
            <?php
                            } else {
                                ?>
            <p class="user-info-desc"> <?php echo $_SESSION['lastOrder']->getOrderStatus() ?> </p>
            <?php
                            }
                            ?>
        </li>
        </li>
        <li>
            <p class="user-info-title">Fecha</p>
            <?php if (empty($_SESSION['lastOrder']->getOrderStatus())) {
                                ?>
            <p class="user-info-desc"> - </p>
            <?php
                            } else {
                                ?>
            <p class="user-info-desc"> <?php echo $_SESSION['lastOrder']->getOrderDate() ?> </p>
            <?php
                            }
                            ?>
        </li>
    </ol>
</div>