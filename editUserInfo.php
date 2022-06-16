<div class="user-info">
    <h3>Mi cuenta</h3>
    <form action="control.php?f=alterUserTable" method="post">
        <ol>
            <li>
                <p class="user-info-title">Nombre</p>
                <input type="text" name="userName" class="user-info-desc"
                    value="<?php echo $_SESSION['user']->getUserName() ?>">
            </li>
            <li>
                <p class="user-info-title">Apellidos</p>
                <input type="text" name="userLastname" class="user-info-desc"
                    value="<?php echo $_SESSION['user']->getUserLastname() ?>">
            </li>
            <li>
                <p class="user-info-title">Correo</p>
                <input type="text" name="userMail" class="user-info-desc"
                    value="<?php echo $_SESSION['user']->getUserMail() ?>">
            </li>
            <li>
                <p class="user-info-title">Dirección</p>

                <input type="text" name="userAddress" class="user-info-desc"
                    value="<?php echo $_SESSION['user']->getUserAddress() ?>">
            </li>
            <li>
                <p class="user-info-title">Contraseña</p>
                <input type="password" name="userPass" value="<?php echo $_SESSION['user']->getUserPass() ?>"
                    class="user-info-desc">
            </li>
        </ol>
        <input type="submit" value="Guardar">
    </form>
</div>

<div class="user-info delete-user-form">
    <form action="control.php?f=deleteUserAccount" method="post">
        <input type="submit" value="Borrar mi cuenta">
    </form>
</div>