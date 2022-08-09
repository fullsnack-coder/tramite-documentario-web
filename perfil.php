<style type="text/css">
	.tabla {
		display: table;
		width: 60%;
		margin-left: auto;
		margin-right: auto;
		background-color: #edeaea;
		border-spacing: 10px;
	}

	.fila {
		display: table-row;
		margin-bottom: 10px;
	}

	.columna {
		display: table-cell;
		text-align: left;
		width: 50%;
	}

	a {
		color: black;
		text-decoration-line: none;
		font-weight: bold;
	}

	.boton {
		display: block;
		width: 25%;
		height: 10px;
		padding: 25px 5px 25px 5px;
		background-color: #cbc0c0;
		vertical-align: middle;
		margin: auto;
		text-align: center;
		margin-bottom: 10px;
	}
</style>
<?php
include("utils/conexion.php");
include('utils/auth.php');
$codigo = $_SESSION['usuario'];
$tipo = $_SESSION['tipo'];

$sql = "select * from tipousuario where idtipousuario=$tipo";
$f = mysql_query($sql, $cn);
$r = mysql_fetch_array($f);

$tipo_usuario = $r['tipousuario'];
$tipo_usuario = strtolower($tipo_usuario);

$sql = "select u.*,a.* from usuario u ,$tipo_usuario a where a.idusuario=u.idusuario and u.idusuario=$codigo";
$f = mysql_query($sql, $cn);
$r = mysql_fetch_array($f);
$estado = $r['estado'];
if ($r['estado'] == 1) { // alumno
	if ($tipo == 1) {
		$sql = "select u.*,a.*,e.* from usuario u ,alumno a, escuela e where a.idusuario=u.idusuario and a.idescuela=e.idescuela and u.idusuario=$codigo";
		$f = mysql_query($sql, $cn);
		$r = mysql_fetch_array($f);
?>
		<div class="tabla">
			<div class="fila">
				<div class="columna">Codigo Universitario</div>
				<div class="columna"><?php echo $r['codigo_universitario']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">DNI</div>
				<div class="columna"><?php echo $r['dni']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Escuela</div>
				<div class="columna"><?php echo $r['escuela']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Apellidos</div>
				<div class="columna"><?php echo utf8_decode($r['apellidos']); ?></div>
			</div>
			<div class="fila">
				<div class="columna">Nombres</div>
				<div class="columna"><?php echo $r['nombres']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Direccion</div>
				<div class="columna"><?php echo $r['direccion']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">E-mail</div>
				<div class="columna"><?php echo $r['email']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Celular</div>
				<div class="columna"><?php echo $r['celular']; ?></div>
			</div>
		</div>
	<?php
	} else if ($tipo == 4) { // personal
		$sql = "SELECT *
			FROM personal as p INNER JOIN escuela as e
				ON p.idescuela = e.idescuela
					INNER JOIN area as a
				WHERE p.idusuario = $codigo";

		$f = mysql_query($sql, $cn);
		$r = mysql_fetch_array($f);

	?>
		<div class="tabla">
			<div class="fila">
				<div class="columna">Codigo Administrativo</div>
				<div class="columna"><?php echo $r["codigo_administrativo"]; ?></div>
			</div>
			<div class="fila">
				<div class="columna">DNI</div>
				<div class="columna"><?php echo $r["dni"]; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Nombre Completo</div>
				<div class="columna"><?php echo $r["nombres"]." ".$r["apellidos"]; ?></div>
			</div>
			<div class="fila">
				<div class="columna">E-mail</div>
				<div class="columna"><?php echo $r["email"]; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Celular</div>
				<div class="columna"><?php echo $r["celular"]; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Direccion</div>
				<div class="columna"><?php echo $r["direccion"]; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Escuela</div>
				<div class="columna"><?php echo $r["escuela"]; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Area</div>
				<div class="columna"><?php echo $r["area"]; ?></div>
			</div>
		</div>
	<?php
	} else if ($tipo == 2) { // egresado
		$sql = "select u.*,e.*,eg.* from usuario u ,egresado eg, escuela e where eg.idusuario=u.idusuario and eg.idescuela=e.idescuela and u.idusuario=$codigo";
		$f = mysql_query($sql, $cn);
		$r = mysql_fetch_array($f);
	?>
		<div class="tabla">
			<div class="fila">
				<div class="columna">DNI</div>
				<div class="columna"><?php echo $r['dni']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Escuela</div>
				<div class="columna"><?php echo $r['escuela']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Apellidos</div>
				<div class="columna"><?php echo $r['apellidos']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Nombres</div>
				<div class="columna"><?php echo $r['nombres']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Direccion</div>
				<div class="columna"><?php echo $r['direccion']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">E-mail</div>
				<div class="columna"><?php echo $r['email']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Celular</div>
				<div class="columna"><?php echo $r['celular']; ?></div>
			</div>
		</div>
	<?php
	} else if ($tipo == 3) { // institucion
		$sql = "select u.*,i.* from usuario u ,institucion i where i.idusuario=u.idusuario and u.idusuario=$codigo";
		$f = mysql_query($sql, $cn);
		$r = mysql_fetch_array($f);
	?>
		<div class="tabla">
			<div class="fila">
				<div class="columna">RUC</div>
				<div class="columna"><?php echo $r['ruc']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Razon Social</div>
				<div class="columna"><?php echo $r['razonsocial']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Razon Social</div>
				<div class="columna"><?php echo $r['direccion']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">E-mail</div>
				<div class="columna"><?php echo $r['email']; ?></div>
			</div>
			<div class="fila">
				<div class="columna">Telefono</div>
				<div class="columna"><?php echo $r['telefono']; ?></div>
			</div>
		</div>
<?php
	}
}
?>
<br>
<?php
$sql = "select * from tipousuario where idtipousuario=$tipo";
$f = mysql_query($sql, $cn);
$r = mysql_fetch_array($f);
$tipo_usuario = $r['tipousuario'];
$tipo_usuario = strtolower($tipo_usuario);
?>
<div class="boton">
	<a href="actualizacion_<?php echo $tipo_usuario; ?>.php">
		ACTUALIZAR
	</a>
</div>
<div class="boton" style="background-color: white;">
	<a href="principal.php">
		VOLVER
	</a>
</div>
<br>
<br>