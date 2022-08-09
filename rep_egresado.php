<?php 
//include("auth.php");
include("utils/conexion.php");
//include("cabecera.php");
$sql="SELECT (C.fecharegistro)Fecha,
             (B.dni)Dni,
             (A.username)Emisor,
             (C.asunto)Asunto,
             (D.area)Area,
             (F.estadotramite)Estado
             FROM usuario A 
             INNER JOIN egresado  B ON A.idusuario = B.idusuario
             LEFT JOIN tramite C ON A.idusuario = C.idusuario
             LEFT JOIN area    D ON C.idarea    = D.idarea
             LEFT JOIN historialtramite E ON C.idtramite       = E.idtramite
            LEFT JOIN estadotramite F ON E.idhistorialtramite = F.idestadotramite";
$data= mysql_query($sql, $cn);
$cont = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Egresados</title>
    <h1>Reporte de Egresados Solicitantes</h1>
</head>
<body> 
<button><a href="reportes.php" >Volver</a></button>       
<br><br>
    <fieldset id="grupo" style="width:80%;">
    <legend>Reporte</legend>
            <table align="center">
                <tr align="center">
                    <td>ID</td>
                    <td>Fecha de Emision</td>
                    <td>Dni</td>
                    <td>Nombres de Egresado</td>
                    <td>Asunto</td>
                    <td>Area asignada</td>
                    <td>Estado</td>
                </tr>
                <?php while($r = mysql_fetch_array($data)){ ?> 
                    <tr>
                        <td><?php echo $cont?></td>
                        <td><?php echo $r['Fecha']?></td>
                        <td><?php echo $r['Dni']?></td>
                        <td><?php echo $r['Emisor']?></td>
                        <td><?php echo $r['Asunto']?></td>
                        <td><?php echo $r['Area']?></td>
                        <td><?php echo $r['Estado']?></td>    
                    </tr>
                <?php } ?> 
            </table>			
    </fieldset>
</body>
</html>
 	



