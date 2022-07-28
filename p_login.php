<?php

    session_start();
    include("utils/conexion.php");

    $usuario = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM usuario 
        WHERE username = '$usuario' 
        AND password = '$password'
        AND idestadocuenta = 2";


    $fila = mysql_query($query);
    $r = mysql_fetch_array($fila);
    $existeUsuario = mysql_num_rows($fila);

    if ($existeUsuario <= 0) {
        header("location: /tramite-documentario/index.php");
    } else {
        $idusuario = $r["idusuario"];
        $tipousuario = $r["idtipousuario"];
        
        $_SESSION["usuario"] = $idusuario;
        $_SESSION["tipo"] = $tipousuario;
        //TODO: agregar la variable tipo de usuario
        $_SESSION["auth"] = 1;
        header("location: /tramite-documentario/principal.php");
    }
?>