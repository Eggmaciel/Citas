<?php
require "../../Funciones/conecta.php";
require "../../Funciones/comprobarSesionA.php";
$con = conecta();
probarSesion();
	
$id = $_GET['id'];

$sql = "SELECT * FROM area where id_area = $id";

$res = $con->query($sql);
$row = $res->fetch_assoc();

$nombre = $row['nombre_area'];
$descripcion = $row['descripcion'];
$iniciales = $row['iniciales'];
$status = ($row['activo']==1) ? 'Activo' : 'Inactivo';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Editar Administrador</title>
		<meta charset="utf-8">
		<LINK REL='StyleSheet' HREF='../estilos/estilos_alta.css' >
		<LINK REL='StyleSheet' HREF='../estilos/cabezera.css' >
		<script src = "../../js/jquery-3.3.1.min.js"></script>
		<script>
				
			function VerificarEnviarInfo(){
				var nombre = $('#nombre').val();
				var iniciales = $('#iniciales').val();
				var descripcion = $('#descripcion').val();		
				if(nombre == "" || iniciales == "" || descripcion == ""){
					$('#mensaje2').html('Faltan campos por llenar');
					setTimeout("$('#mensaje2').html('');", 5000);
					return false;
				}
			}
			
			function limpiarCampo(){
				$('#mensaje1').html('');
			}
		
		</script>
		<style>
			.error{
				display:inline;
				color:#FF0000;
			}
		</style>
	</head>
	<body>
		<main class="principal">
			<h1>Editar Area</h1>
			<p><a href="listadoAreas.php">Listado de Areas</a> > Editar <?php echo $nombre?></p>
			<hr>
			<!--<p><a href="administradores_lista.php">Listado de Administradores</a> > Editar</p>-->
			<form name="Forma01" id="forma1" action="areaActualiza.php" method="POST">
				<input type="text" name="nombre" id="nombre" value="<?php echo $nombre?>" /><br>
				<input type="text" name="iniciales" id="iniciales" value="<?php echo $iniciales?>" rows="5" cols="33"/><br>
				<textarea  name="descripcion" id="descripcion" onFocus="limpiarCampo();"><?php echo $descripcion?></textarea>
				<div id="mensaje1" class="errorCorreo"></div>
				<input type="hidden" id="id_sel" name="id" value="<?php echo $id?>" />
				<input type="submit" value="Salvar" onClick="return VerificarEnviarInfo();"/>
				<div id="mensaje2" class="errorCampos"></div><br>
				
			</form>
		</main>
	</body>
</html>
<!--onChange="valorRol();"-->
<!--onFocus="limpiarCampo();" onBlur="validarMail();"-->
<!--onclick=" muestra(); return false;"-->

