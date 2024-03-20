<?php
require "../Funciones/conecta.php";
require "../Funciones/comprobarSesionA.php";
$con = conecta();
probarSesion();
	
$id = $_GET['id'];

if(empty($id)) header("Location: ./ListadoCitador.php");

$sql = "SELECT * FROM citador where Id_citador = $id";

$res = $con->query($sql);
$row = $res->fetch_assoc();

$nombre = $row['Nombre'];
$apellido = $row['Apellido'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Editar Citador</title>
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
			<h1>Editar citador</h1>
			<p><a href="ListadoCitadores.php">Listado Citadores</a> > Editar <?php echo $nombre?></p>
			<hr>
			<!--<p><a href="administradores_lista.php">Listado de Administradores</a> > Editar</p>-->
			<form name="Forma01" id="forma1" action="citadorActualiza.php" method="POST">
				<input type="text" name="nombre" id="nombre" value="<?php echo $nombre?>" /><br>
				<input type="text" name="apellido" id="apellido" value="<?php echo $apellido?>" rows="5" cols="33"/><br>
				<input type="password" placeholder="contraseña" name="pass" id="pass"/><br>
				<?php
				$sql = "select * from area";
            	$res = $con->query($sql);
            	echo "<select name='area' id='area'>";
				echo "<option value='0'>Seleccionar</option>";
                while($row = $res->fetch_array()){
                    $nombre_area = $row['nombre_area'];
                    $iniciales = $row["iniciales"];
                   echo '<option value="'.$iniciales.'">'.$nombre_area.'</option>';
                }
				echo "</select>";
			?>
				<div id="mensaje1" class="errorCorreo"></div>
				<input type="hidden" id="id_sel" name="id" value="<?php echo $id?>" /><br>
				<input type="submit" value="Salvar" onClick="return VerificarEnviarInfo();"/>
				<div id="mensaje2" class="errorCampos"></div><br>
				
			</form>
		</main>
	</body>
</html>
<!--onChange="valorRol();"-->
<!--onFocus="limpiarCampo();" onBlur="validarMail();"-->
<!--onclick=" muestra(); return false;"-->

