<?php 
//recepcionar los datos
//recepcionar los datos
include("utils/conexion.php");
include('utils/auth.php');
$c=$_SESSION['usuario'];
$tipo=$_SESSION['tipo'];

$tipo_usuario=$_GET['tipo'];
$codigo=$_GET['idtramite'];
//trabajar con la base de datos
$sql="select a.*,u.*,t.*,tip.*,ar.*,h.*,e.* from $tipo_usuario a,usuario u, tramite t, tipotramite tip,area ar, historialtramite h, estadotramite e where a.idusuario=u.idusuario and u.idusuario=t.idusuario and t.idtipotramite=tip.idtipotramite and t.idarea=ar.idarea and t.idtramite=h.idtramite and h.idestadotramite=e.idestadotramite and t.idtramite='$codigo' Order by h.fechaactualizacion desc";
$fila=mysql_query($sql,$cn);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
	<style type="text/css">
		#contenedor{
			width: 60%;
			margin: auto;
			text-align: center;
		}
		a{
			color: black;
			text-decoration-line:none ;
			font-weight: bold;
		}
		.boton{
			display: inline-block;
			width: 40%;
			margin: auto;
			height: 20px;
			padding: 15px 20px 15px 20px;
			background-color: #cbc0c0;
			vertical-align: middle;
			text-align: center;
			border-radius: 6px;
		}
	</style>
	<title>Consulta Tramite</title>
</head>
<body>
<br>
<br>
<br><br>
<div id="contenedor">
<p align="left"><b>SEGUIMIENTO</b></p>
<p align="left">Visualizando los movimientos del expediente: <?php echo $codigo; ?></p>
<br>
<center>
	<table cellspacing="15" border="0" bgcolor="#e3e2e2" style="width:100%">
			<tr>
				<td><b>ID</b></td>
				<td><b>AREA</b></td>
				<td><b>TIPO DE DOCUMENTO</b></td>
				<td><b>REMITENTE</b></td>
				<td><b>ESTADO</b></td>
				<td><b>FECHA</b></td>
			</tr>
<?php 
while ($r=mysql_fetch_array($fila)) { 
$idtramite=$r['idtramite'];
$password=$r['password'];
?>
			<tr>
				<td><?php echo $r['idtramite']; ?></td>
				<td><?php echo $r['area']; ?></td>
				<td><?php echo $r['tipotramite']; ?></td>
				<td><?php  
				if ($tipo==1) {
					echo $r['apellidos']." ".$r['nombres'];
				}elseif ($tipo==2) {
					echo $r['apellidos']." ".$r['nombres'];
				}elseif ($tipo==3) {
					echo $r['razonsocial'];
				}

				?></td>
				<td><?php echo $r['estadotramite']; ?></td>
				<td><?php echo $r['fechaactualizacion']; ?></td>
			</tr>
	
<?php  
}
?>
</table>
</center>
<br>
		<div class="boton">
			<a href="principal.php">
					CONSULTAR OTRO EXPEDIENTE
			</a>
		</div>
		<div class="boton">
			<a href="p_consulta.php?idtramite=<?php echo $idtramite; ?>&password=<?php echo $password; ?>">
					 VOLVER
			</a>
		</div>
</div>
<br><br>		
</body>
</html>