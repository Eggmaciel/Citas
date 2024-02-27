<?php 
	require "../../Funciones/comprobarSesionA.php";
	probarSesion();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Listado de administradores</title>
		<meta charset = 'utf-8'>
		<LINK REL='StyleSheet' HREF='../estilos/cita.css' >
		<link rel="stylesheet" href="../estilos/cabezeraAdmi.css">
        <link rel="stylesheet" href="../estilos/estilos_Administradores.css">
		<script src = "js/jquery-3.3.1.min.js"></script>
		<!--<script>
			function eliminaFilas(fila){
				//la funcion val es incompatible con las etiquetas tr/td, por lo que utilizo la alternativa attr()
				var id = $("#idr" + fila).attr("value");//Se recupera el valor de la fila seleccionada
				//id = console.log(id);
				//Se envian los datos con ajax
				if(confirm("Eliminar Registro?")){
					$.ajax ({
						type           :  'post',
						datatype       :  'text',
						url            :  'EliminarCitador.php?id='+id,
						//data           :  'id=' + id,
						success        :  function(res) { alert(res);// Si se pudo realizar la consulta se muestra un mensaje
										  $("#idr" + id).hide()},//Se esconde el fila seleccionada
						error          :  function() { alert('Error, registro no eliminado...'); }
					});
				}
			}
			 
		</script>-->
	</head>
	<body>
    <header >
		<div >
			<nav class="menu">
        <section class="menu__container">
            <h1 class="menu__logo">Administradores</h1>

            <ul class="menu__links">
                <li class="menu__item">
                    <a href="#" class="menu__link">Administradores</a>
                    <ul class="menu__nesting">
                        <li class="menu__inside">
                            <a href="#" class="menu__link menu__link--inside">Listado administradores</a>
                        </li>
                        <li class="menu__inside">
                            <a href="./registrarAdministrador.php" class="menu__link menu__link--inside">Registrar Administrador</a>
                        </li>
                        
                    </ul>
                </li>
    
                <li class="menu__item menu__item--show">
                    <a href="#" class="menu__link">Areas </a>
    
                    <ul class="menu__nesting">
                        <li class="menu__inside">
                            <a href="../Area/listadoAreas.php" class="menu__link menu__link--inside">Listado areas</a>
                        </li>
                        <li class="menu__inside">
                            <a href="../Area/registrarArea.php" class="menu__link menu__link--inside">Registrar area</a>
                        </li>
                        
                    </ul>
                </li>
    
                <li class="menu__item  menu__item--show">
                    <a href="#" class="menu__link">Citadores  </a>
    
                    <ul class="menu__nesting">
                        <li class="menu__inside">
                            <a href="../Citadores/ListadoCitadores.php" class="menu__link menu__link--inside">Listador citadores</a>
                        </li>
                        <li class="menu__inside">
                            <a href="../Citadores/registrarCitador.php" class="menu__link menu__link--inside">Registrar citador</a>
                        </li>
                    </ul>
                </li>
    
                <li class="menu__item">
                    <a href=" ../../Funciones/cerrarSesionA.php" class="menu__link">Cerrar sesion</a>
                </li>
    
            </ul>

            <div class="menu__hamburguer">
                <img src="assets/menu.svg" class="menu__img">
            </div>
        </section>
    </nav>
		</div>
	</header>
		<main class="principal">
			<h1 align='center'>Listado de Administradores</h1>
			<!--<h3 align='center' class="altaA"><a href='registrarCitador.php'>Registrar nuevo</a></h3>-->
			<div class='tabla'>
				<table align='center'>
						<tr class='columna'>
							<th>ID</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th></th>
						</tr>
						<?php
							//administradores_lista.php
							
							//realiza una coneccion a la base de datos
							require "../../funciones/conecta.php";
							$con = conecta();
							
							$sql = "SELECT * FROM administrador WHERE  Activo= 0";
							//Se realiza la consulta
							$res = $con->query($sql);
							//Se recupera los datos de la consulta y se guardan en variables
							while($row = $res->fetch_array()){
								$id         =$row["id_administrador"];
								$nombre     =$row["Nombre"];
								$apellidos  =$row["Apellido"];
								//Se crea tablas dinamicamente
								echo "<tr class='columna' id=\"idr$id\" value=\"$id\">";
									echo "<td name=\"idr$id\">$id</td>";
									echo "<td class='nombreCompleto'>$nombre</td>";
                                    echo "<td class='nombreCompleto'>$apellidos</td>";
									echo "<td class=\"Eliminar\"><a href=\"javascript:void(0);\" onClick=\"eliminaFilas($id)\">ELIMINAR</a></td>";
								echo "</tr>";
							}
						?>
				</table>
			</div>
		</main>
	</body>
</html>


