<?php 
//include("auth.php");
include("conexion.php");
//include("cabecera.php");
$sql="SELECT (C.fecharegistro)Fecha,
             (B.dni)Dni,
             (A.username)Emisor,
             (C.asunto)Asunto,
             (D.area)Area,
             (F.estadotramite)Estado
       FROM usuario A 
       INNER JOIN alumno  B ON A.idusuario = B.idusuario
       INNER JOIN tramite C ON A.idusuario = C.idusuario
       INNER JOIN area    D ON C.idarea    = D.idarea
       INNER JOIN historialtramite E ON C.idtramite       = E.idtramite
       INNER JOIN estadotramite F ON E.idhistorialtramite = F.idestadotramite";

$data=mysqli_query($cn,$sql);
//$data=mysqli_fetch_array($fila);
$cont = 1;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte General</title>
    <h1 align="center">Reporte General de Solicitantes</h1>
</head>
<body> 
    <table border="0" cellspacing="0" align="center" >
        <tr>
            <td> </td>
      
			<td> Seleccione Filtros</td>
		</tr>
		<tr>
            <td> </td>  
            <td> </td> 
			<td>Fecha Inicio</td>
            <td>Fecha Fin</td>
			<td>Estado de Tramite</td>
           
		</tr>
        <tr>
           <td> <button><a href="reportes" >Volver</a></button> </td>
           <td> </td>
           <td><input type="date" name="fechai"></td>
           <td><input type="date" name="fechaf"></td>
           <td><select name="lstestado">
                    <option value="Aceptado">Aceptado</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="Rechazado">Rechazado</option>
                </select> 
            </td>
           <td><button><a href=" " >Filtar Busqueda</a></button></td>
		</tr>
		<!--width="300" -->
	</table>      
<br><br>
            <table align="center"  border="1">
                <thead align="center">
                
                    <th>ID</th>
                    <th>Fecha de Emision</th>
                    <th>DNI</th>
                    <th>Emisor</th>
                    <th>Asunto</th>
                    <th>Area asignada</th>
                    <th>Estado</th>
                </thead>
                <tbody>
                    <?php foreach($data as $r){ ?> 
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
                <tbody>
            </table>			
</body>
</html>
 	



