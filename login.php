<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "head.php";
    ?>
    <title>Login</title>
</head>

<body>
    <?php include "nav.php";

    if (empty($_SESSION['optionLogin'])) {
        $optionLogin = "login";
    } else {
        $optionLogin = $_SESSION['optionLogin'];
    }
    switch ($optionLogin) {
        case 'login':
    ?>
    <div class="login full-container">
        <div class="log container">
            <h1>Login</h1>
            <?php
                if (!empty($_GET['resultado'])) {
                    echo (($_GET['resultado'])) == 'exitoRegistro' ? '<h3 style="color:black">Usuario registrado correctamente.</h3>' : '<h3>Credenciales incorrectas, inténtelo otra vez.</h3>';                }
            ?>
            <form class="log-form" id="formulario-log" method="post" action="control.php?f=resultLogin">
                <label>Nombre:</label>
                <input type="text" id="log-name" name="userName" placeholder="Nombre">
                <label>Contraseña:</label>
                <input type="password" id="log-pass" name="userPass" placeholder="Contraseña">
                <input type="submit" id="log-submit" value="Login">
            </form>
            <p>¿No tiene cuenta?</p><a href="control.php?f=login&option=registro">Registrarse</a>
        </div>
    </div>
    <?php
            break;
        case 'registro':
        ?>
    <div class="register full-container">
        <div class="reg container">
            <h1>Registro</h1>
            <?php
                if (!empty($_GET['resultado'])) {
                    echo '<h3>Se ha producido un error.</h3>';
                }
            ?>
            <form class="reg-form" id="formulario-reg" method="post" action="control.php?f=resultRegistro">
                <label>Nombre:</label>
                <input type="text" name="userName" placeholder="Nombre">
                <label>Contraseña:</label>
                <input type="password" name="userPass" placeholder="Contraseña">
                <label>Email:</label>
                <input type="mail" name="userMail" placeholder="email">
                <input type="submit" value="Registrarse">
            </form>
            <p>¿Ya tiene cuenta?</p> <a href="control.php?f=login&option=login">Iniciar Sesión</a>
        </div>
    </div>
    <?php
            break;
    }
    ?>
    <?php include "footer.php"; ?>
</body>

</html>