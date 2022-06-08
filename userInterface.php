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

    </style>

</head>

<body>
    <?php include "nav.php"; ?>

    <div class="user-full full-container">
        <div class="user-banner">
            <div class="user-banner-text">
                <h1>Hola, <span><?php echo $_SESSION['user']->getUserName() ?></span>
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
            include 'checkUserOrders.php';
            break;
    }
            ?>
            </div>
        </div>




        <?php include "footer.php"; ?>
</body>

</html>