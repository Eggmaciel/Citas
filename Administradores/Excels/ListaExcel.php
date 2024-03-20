<?php 
	require "../Funciones/comprobarSesionA.php";

	probarSesion();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Listado de Excel</title>
		<meta charset = 'utf-8'>
		<LINK REL='StyleSheet' HREF='../estilos/cita.css' >
		<link rel="stylesheet" href="../estilos/cabezeraAdmi.css">
        <link rel="stylesheet" href="../estilos/estilos_Administradores.css">
		<script src = "../js/jquery-3.3.1.min.js"></script>
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

                <li class="menu__item  menu__item--show">
					<a href="#" class="menu__link">Descargar  </a>
				</li>
    
                <li class="menu__item">
                    <a href=" ../Funciones/cerrarSesionA.php" class="menu__link">Cerrar sesion</a>
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
							<th>Nombre</th>
							<th>Descargar</th>
						</tr>
						<tr class='columna'>
						    <td class='nombreCompleto'>Administradores</td>
							<td class="edita"><a href='./administradores.php'>Descargar</a></td>
						</tr>
                        <tr class='columna'>
						    <td class='nombreCompleto'>Areas</td>
							<td class="edita"><a href='./area.php'>Descargar</a></td>
						</tr>
                        <tr class='columna'>
						    <td class='nombreCompleto'>Citas</td>
							<td class="edita"><a href='./cita_agenda.php'>Descargar</a></td>
						</tr>
                        <tr class='columna'>
						    <td class='nombreCompleto'>Citadores</td>
							<td class="edita"><a href='./citador.php'>Descargar</a></td>
						</tr>
                        <tr class='columna'>
						    <td class='nombreCompleto'>Horas</td>
							<td class="edita"><a href='./horas_cita.php'>Descargar</a></td>
						</tr>
				</table>
			</div>
		</main>
	</body>
</html>


