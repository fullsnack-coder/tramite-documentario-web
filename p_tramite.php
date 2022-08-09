<?php 
include("utils/conexion.php");
include('utils/auth.php');
$codigo=$_SESSION['usuario'];
$tipo=$_SESSION['tipo'];
//recepcionar los datos del tramite
$tipotramite=$_POST['tipotramite'];
$area=$_POST['area'];
$asunto=$_POST['asunto'];
$idtramite=date("Y").$codigo.$area.generaid();
$archivo=$_FILES['archivo']['tmp_name'];
$nombre=$_FILES['archivo']['name'];
$password=generamepassword();
//insertar tramite
$sql1="insert into tramite(idtramite,idusuario,idarea,idtipotramite,asunto,password) values('$idtramite',$codigo,$area,$tipotramite,'$asunto','$password')";
mysql_query($sql1,$cn);

//insertar su historial y primer estado
$sql="insert into historialtramite(idtramite,idestadotramite) values('$idtramite',1)";
mysql_query($sql,$cn);

list($n,$e)=explode(".", $nombre);
if ($e='pdf') {
	// guardar archivo
	move_uploaded_file($archivo,"tramites/".$idtramite.".pdf");
}

function generamepassword(){
	//rand(valor min, valor max)
	//substr(cadena,posicion,caracteres)
	$pass="";
	$plantilla="qwertyuiopasdfghjklzxcvbnm1234567890";
	for ($i=0; $i < 11; $i++) { 
		$pass=$pass.substr($plantilla, rand(1,37),1);
	}
	return $pass;
}
function generaid(){
	$pass="";
	$plantilla="qwertyuiopasdfghjklzxcvbnm1234567890";
	for ($i=0; $i < 4; $i++) { 
		$pass=$pass.substr($plantilla, rand(1,37),1);
	}
	return $pass;
}
?>
	<style type="text/css">
		.tabla{
		display: block;
		width: 30%;
		margin: auto;
		padding: 5em 3em 5em 3em;
		background-color: #c7c7c7;
		}
		.fila{
		margin-bottom: 10px;	
		}
		.columna{
		display: inline-block;
		text-align: center;
		width: 80%;
		}
	</style>
	<title>Tramite</title>
</head>
<br><br>
		<center>
			<div class="tabla">
				<div class="fila">
					<div class="columna">USTED INGRESO UN NUEVO TRAMITE </div>
				</div>
				<div class="fila">
					<div class="columna">Se ha generado un id y una contrase&ntildea para el seguimiento de su expediente</div>
				</div>
				<div class="fila" style="display: flex;">
					<div class="columna" style="width: 60%;text-align: right; font-weight: bold"><p id="idtramite"><?php echo $idtramite; ?></p></div>
					<div class="columna" style="width: 20%;text-align: center; font-weight: bold;"><img src="copy.png" width="30px" height="30px" onclick="copiar('idtramite')"></div>
				</div>
				<div class="fila" style="display: flex;">
					<div class="columna" style="width: 60%;text-align: right; font-weight: bold"><p id="contra"><?php echo $password; ?></p></div>
					<div class="columna" style="width: 20%;text-align: center; font-weight: bold;"><img src="copy.png" width="30px" height="30px" onclick="copiar('contra')"></div>
				</div>
				<div class="fila">
					<div class="columna">recomendamos guardar este codigo en un sitio seguro</div>
				</div>
		</center>
		<br>
		<center>
				<button style="background-color: #3814EE;color: white; height: 50px; width: 15em;"><a href="principal.php" style="text-decoration: none;color: white;">Volver</a></button>
		</center>
<script type="text/javascript">
	function copiar(id_elemento) {
  		var aux = document.createElement("input");
  		aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
  		document.body.appendChild(aux);
  		aux.select();
  		document.execCommand("copy");
  		document.body.removeChild(aux);
}
</script>