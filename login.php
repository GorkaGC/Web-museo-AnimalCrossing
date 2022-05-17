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
    <h1>Login</h1>
    <form method="post" action="control.php?f=resultLogin">
        <input type="text" name="userName">
        <input type="password" name="userPass">
        <input type="submit" value="Login">
    </form>
    ¿No tiene cuenta? <a href="control.php?f=login&option=registro">Registrarse</a>
    <?php
    break;

    case 'registro':
        ?>
        <h1>Registro</h1>
        <form method="post" action="control.php?f=resultRegistro">
            <input type="text" name="userName">
            <input type="password" name="userPass">
            <input type="mail" name="userMail">
            <input type="submit" value="Registrarse">
        </form>
        ¿Ya tiene cuenta? <a href="control.php?f=login&option=login">Iniciar Sesión</a>
        <?php



   break;
        }


  

    ?>




    <?php include "footer.php"; ?>
</body>

</html>