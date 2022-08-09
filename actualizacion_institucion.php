<?php 
include("conexion.php");
include('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="widdiv=device-widdiv, initial-scale=1">
	<style type="text/css">
		.tabla{
		display: block;
		width: 60%;
		margin-left: auto;
		margin-right: auto;
		margin-top: 10px;
		margin-bottom: 10px;
		}
		.fila{
		display: flex;
		margin-bottom: 10px;	
		}
		.columna{
		display: inline-block;
		text-align: left;
		width: 50%;
		}
		.campo{
			width: 100%;
		}
	</style>
	<title>Institucion</title>
</head>
<body>
<br><br>
<form action="p_actualizacion_institucion.php" method="post">
	<fieldset style="width: 60%;margin: auto;">
		<legend style="text-align: center ;">Datos De La Institucion</legend>
		<center>
			<div class="tabla">
				<div class="fila">
					<div class="columna">RUC: </div>
					<div class="columna">
						<input type="text" name="ruc" maxlength="11" required class="campo">
					</div>
				</div>
				<div class="fila">
					<div class="columna">Razon Social: </div>
					<div class="columna">
						<input type="text" name="razonsocial" maxlength="200" required class="campo">
				    </div>
				</div>
			    <div class="fila">
					<div class="columna">E-mail: </div>
					<div class="columna">
						<input type="email" name="email" maxlength="200" required class="campo">
					</div>
				</div>
				<div class="fila">
					<div class="columna">Telefono: </div>
					<div class="columna">
						<input type="text" name="telefono" maxlength="7" class="campo">
					</div>
				</div>
				<div class="fila">
					<div class="columna">Direccion: </div>
					<div class="columna">
						<input type="text" name="direccion" maxlength="200" required class="campo">
				    </div>
				</div>
			</div>
		</center>
		<br>				
	<center>
		<input type="submit" value="Actualizar" style="background-color: #3814EE;color: white; height: 50px;">
	</center>
	</fieldset>
</form>
</body>
</html>