<?php
require "../Funciones/conecta.php";
require "../Funciones/comprobarSesionA.php";
$con = conecta();
probarSesion();
	
$id = $_GET['id'];

if(empty($id)) header("Location: ./ListadoAdministrador.php");
$sql = "SELECT * FROM administrador where id_administrador = $id";

$res = $con->query($sql);
$row = $res->fetch_assoc();

$nombre = $row['Nombre'];
$apellido = $row['Apellido'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Editar Administrador</title>
		<meta charset="utf-8">
		<LINK REL='StyleSheet' HREF='../estilos/estilos_alta.css' >
		<LINK REL='StyleSheet' HREF='../estilos/cabezera.css' >
		<script src = "../js/jquery-3.3.1.min.js"></script>
		<script>
				
			function VerificarEnviarInfo(){
				var nombre = $('#nombre').val();
				var apellido = $('#apellido').val();	
				if(nombre == "" || apellido == ""){
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
			<h1>Editar Administrador</h1>
			<p><a href="ListadoAdministrador.php">Listado Administradores</a> > Editar <?php echo $nombre?></p>
			<hr>
			<!--<p><a href="administradores_lista.php">Listado de Administradores</a> > Editar</p>-->
			<form name="Forma01" id="forma1" action="admiActualiza.php" method="POST">
				<input type="text" name="nombre" id="nombre" value="<?php echo $nombre?>" /><br>
				<input type="text" name="apellido" id="apellido" value="<?php echo $apellido?>" rows="5" cols="33"/><br>
				<input type="password" placeholder="contraseña" name="pass" id="pass"/><br>
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

