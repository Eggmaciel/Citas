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
		<script src = "../../js/jquery-3.3.1.min.js"></script>
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
                            <a href="../Admi/ListadoAdministrador.php" class="menu__link menu__link--inside">Listado administradores</a>
                        </li>
                        <li class="menu__inside">
                            <a href="../Admi/registrarAdministrador.php" class="menu__link menu__link--inside">Registrar Administrador</a>
                        </li>
                        
                    </ul>
                </li>
    
                <li class="menu__item menu__item--show">
                    <a href="#" class="menu__link">Areas </a>
    
                    <ul class="menu__nesting">
                        <li class="menu__inside">
                            <a href="#" class="menu__link menu__link--inside">Listado areas</a>
                        </li>
                        <li class="menu__inside">
                            <a href="./registrarArea.php" class="menu__link menu__link--inside">Registrar area</a>
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

        </section>
    </nav>
		</div>
	</header>
		<main class="principal">
			<h1 align='center'>Listado de Areas</h1>
			<h3 align='center' class="altaA"><a href='registrarArea.php'>Registrar nuevo</a></h3>
			<div class='tabla'>
				<table align='center'>
						<tr class='columna'>
							<th>ID</th>
							<th>Nombre</th>
							<th>Iniciales</th>
							<th>Editar</th>
						</tr>
						<?php
							
							require "../../Funciones/conecta.php";
							$con = conecta();
							
							$sql = "SELECT * FROM area";
							//Se realiza la consulta
							$res = $con->query($sql);
							//Se recupera los datos de la consulta y se guardan en variables
							while($row = $res->fetch_array()){
								$id         =$row["id_area"];
								$nombre     =$row["nombre_area"];
								$Iniciales  =$row["iniciales"];
								//Se crea tablas dinamicamente
								echo "<tr class='columna' id=\"idr$id\" value=\"$id\">";
									echo "<td name=\"idr$id\">$id</td>";
									echo "<td class='nombreCompleto'>$nombre </td>";
									echo "<td class='area'>$Iniciales</td>";
									echo "<td class=\"edita\"><a href=\"editarArea.php?id=$id\">EDITAR</a></td>";
								echo "</tr>";
							}
						?>
				</table>
			</div>
		</main>
	</body>
</html>

<!--<button class="botonD" id="igual" value="=" onclick="calcular($('#valor').val(),$('#operacion').val()); return false;">=</button>-->
