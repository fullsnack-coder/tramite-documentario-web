<?php

    session_start();

    if (isset($_SESSION["auth"]) && $_SESSION["auth"] == "1") {
        header("location: principal.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Inicia Sesión</title>
</head>
<body>
    <?php
        require("login.php");
    ?>
</body>
</html>