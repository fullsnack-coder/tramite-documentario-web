<?php 
include("utils/conexion.php");
include('utils/auth.php');
$codigo=$_SESSION['usuario'];
$tipo=$_SESSION['tipo'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
	<style type="text/css">
		.tabla{
		display: block;
		width: 40%;
		margin: auto;
		padding: 5em 3em 5em 3em;
		background-color: #c7c7c7;
		}
		.fila{
		display: flex;
		margin-bottom: 10px;	
		}
		.columnaiz{
		display: inline-block;
		text-align: left;
		width: 40%;
		}
		.columnader{
		display: inline-block;
		text-align: left;
		width: 60%;
		}
		.campo{
			width: 100%;
		}
	</style>
	<title>Tramite</title>
</head>
<body>
<br><br>
<form action="p_tramite.php" method="post" enctype="multipart/form-data">
		<center>
			<div class="tabla">
				<div class="fila">
					<div class="columnaiz">Tipo de Tramite: </div>
					<div class="columnader">
						<select name="tipotramite" class="campo">
						<?php 
						//trabajar con base de datos
						$sql="select * from tipotramite";
						$fila=mysql_query($sql,$cn);
						while ($r=mysql_fetch_array($fila)) {
						?>
						<option value="<?php echo $r['idtipotramite']; ?>"><?php echo $r['tipotramite']; ?></option>
						<?php 
						}
						?>
						</select>
					</div>
				</div>
				<div class="fila">
					<div class="columnaiz">Area: </div>
					<div class="columnader">
						<select name="area" class="campo">
						<?php 
						//trabajar con base de datos
						$sql="select * from area";
						$fila=mysql_query($sql,$cn);
						while ($r=mysql_fetch_array($fila)) {
						?>
						<option value="<?php echo $r['idarea']; ?>"><?php echo $r['area']; ?></option>
						<?php 
						}
						?>
						</select>
					</div>
				</div>
				<div class="fila">
					<div class="columnaiz">Asunto: </div>
					<div class="columnader">
						<input type="text" name="asunto" class="campo">
					</div>
				</div>
				<div class="fila">
					<div class="columnaiz">Adjuntar: </div>
					<div class="columnader">
						<input type="file" name="archivo" class="campo">
					</div>
				</div>
				<br>
				<center>
				<input type="submit" value="REGISTRAR TRAMITE" style="background-color: #3814EE;color: white; height: 50px;">
				</center>	
			</div>
		</center>
</form>
</body>
</html>