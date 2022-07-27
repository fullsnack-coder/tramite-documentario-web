<?php

    include("utils/auth.php");
    include("utils/conexion.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRA USUARIOS</title>
</head>
<body>
    <table border="1" >
        <tr>
            <td>ID de Usuario</td>
            <td>Nombre de Usuario</td>
            <td>Tipo de Usuario</td>
            <td>Estado de cuenta</td>
            <td>Accion</td>
        </tr>
        <?php
            $sqlUsers = "SELECT *
                FROM usuario AS u INNER JOIN tipousuario AS tu
                    ON u.idtipousuario = tu.idtipousuario
                                  INNER JOIN estadocuenta as ec
                    ON ec.idestadocuenta = u.idestadocuenta ORDER BY u.idusuario";

            $fila = mysql_query($sqlUsers);
            while($r = mysql_fetch_array($fila)){
        ?>
            <tr>
                <td>
                    <?php echo $r["idusuario"] ?>
                </td>
                <td>
                    <?php echo $r["username"] ?>
                </td>
                <td>
                    <?php echo $r["tipousuario"] ?>
                </td>
                <td>
                    <?php echo $r["estadocuenta"] ?>
                </td>
                <td>
                    <?php

                        if ($r["idtipousuario"] == 5) {

                        } else {
                            if ($r["idestadocuenta"] == 1) {
                                ?>
                            <a href="p_administrarusuarios.php?userId=<?php echo $r["idusuario"]?>&action=enable">HABILITAR</a>
                            <?php
                            } else {
                            ?>
                            <a href="p_administrarusuarios.php?userId=<?php echo $r["idusuario"]?>&action=disable">DESHABILITAR</a>
                            <?php
                            }
                        }
                            ?>
                        
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <a href="principal.php">Regresar</a>
</body>
</html>