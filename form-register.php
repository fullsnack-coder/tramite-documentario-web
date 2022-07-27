<?php
    include("utils/conexion.php");

    $sqlTipoUsuario = "SELECT * FROM tipousuario WHERE idtipousuario != 5";
    $fila = mysql_query($sqlTipoUsuario);
?>

<form action="p_register.php" method="post">
    <input type="text" name="username" placeholder="Ingresa el nombre de usuario" required>
    <input type="password" name="password" placeholder="Ingresa tu contraseña" required>
    <input type="password" name="repassword" placeholder="Ingresa tu contraseña nuevamente" required>
    <select name="tipousuario" required>
        <option disabled selected value>--Selecciona un tipo de usuario--</option>
        <?php
            while ($r = mysql_fetch_array($fila)) {
        ?>
        <option value="<?php echo $r["idtipousuario"]?>">
            <?php echo $r["tipousuario"] ?>
        </option>
        <?php
            }
        ?>
    </select>
    
    <button type="submit">Registrarme</button>
    <div>
        Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>
    </div>
</form>