<?php 
	session_start();
	
	if(isset($_SESSION['sesion']['id'])){
		header('Location:./Admi/ListadoAdministrador.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Log-in</title>
		<meta charset="utf-8"/>
		<script src = "../js/jquery-3.3.1.min.js"></script>
		<LINK REL='StyleSheet' HREF='../estilos/cita.css' >
		<script>
			function verificarInfo(){
				var nombre = $('#usuario').val();
				var pass = $('#contra').val();
				
				if(nombre == "" || pass == ""){
					$('#mensaje1').html('Faltan campos por llenar');
					setTimeout("$('#mensaje1').html('');", 5000);
				}
				else{
					$.ajax({
						type: 'post',
						datatype: 'text',
						url: './Admi/InicioSesionAdmi.php?nombre=' + nombre + '&pass=' + pass,
						success        :  function(res) { if(res == 1) { window.location.href = "./Admi/ListadoAdministrador.php"; } 	
															else { $('#mensaje2').html('Usuario o contraseña erroneos, intentelo de nuevo');
																	setTimeout("$('#mensaje2').html('');", 5000);}
														},
						error          :  function() { alert("Error al enviar los datos"); }
					});
				}
			}
		</script>
		<style>
			.mensaje {
				color: red;
			}
		</style>
	</head>
	<body>
		<h1>Iniciar Sesion</h1>
		<div id="FormularioLogin" class="Bienvenida">
			<form id="Forma01" name="Forma01">
				<input type="text" id="usuario" class="registro" placeholder="Ingresa nombre"/><br><br>
				<input type="password" id="contra" class="registro"/><br><br>
				<input type="submit" value="Log in" onClick="verificarInfo(); return false;"/><br>
				<div class="mensaje" id="mensaje1"></div>
				<div class="mensaje" id="mensaje2"></div>
			</form>
		</div>
	</body>
</html>