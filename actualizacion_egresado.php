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
		.select{
			width: 102%;
			height: 25px;
		}

	</style>
	<title>Egresado</title>
</head>
<body>
<br><br>
<form action="p_actualizacion_egresado.php" method="post">
	<fieldset style="width: 60%;margin: auto;">
		<legend style="text-align: center ;">Datos Personales</legend>
		<center>
			<div class="tabla">
				<div class="fila">
					<div class="columna">DNI: </div>
					<div class="columna">
						<input type="text" name="dni" maxlength="8" required class="campo">
					</div>
				</div>
				<div class="fila">
					<div class="columna">Escuela: </div>
					<div class="columna">
					<select name="lstescuela" class="select">
						<?php 
						//trabajar con base de datos
						$sql="select * from escuela";
						$fila=mysql_query($sql,$cn);
						while ($r=mysql_fetch_array($fila)) {
						?>
						<option value="<?php echo $r['idescuela']; ?>"><?php echo $r['escuela']; ?></option>
						<?php 
						}
						?>
					</select>
					</div>
				</div>
				<div class="fila">
					<div class="columna">Apellidos: </div>
					<div class="columna">
						<input type="text" name="apellidos" maxlength="200" required class="campo">
				    </div>
				</div>
				<div class="fila">
					<div class="columna">Nombres: </div>
					<div class="columna">
						<input type="text" name="nombres" maxlength="200" required class="campo">
				    </div>
				</div>
				<div class="fila">
					<div class="columna">Direccion: </div>
					<div class="columna">
						<input type="text" name="direccion" maxlength="200" required class="campo">
				    </div>
				</div>
			    <div class="fila">
					<div class="columna">E-mail: </div>
					<div class="columna">
						<input type="email" name="email" maxlength="200" required class="campo">
					</div>
				</div>
				<div class="fila">
					<div class="columna">Celular: </div>
					<div class="columna">
						<input type="text" name="celular" maxlength="9" class="campo">
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