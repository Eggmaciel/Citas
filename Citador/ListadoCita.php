<!Doctype html>
<html lang="esp">
    <head>
        <meta charset="utf-8"/>
        <LINK REL='StyleSheet' HREF='../estilos/cita.css' >
		<LINK REL='StyleSheet' HREF='../estilos/cabezera.css' >
        <title>Citas</title>
    </head>
    <body>
	<header class="cabezera">
		<div class="contenedor logo-nav-container">
			<a class="logo" href="#">Administradores</a>
			<nav class="navegador">	
				<ul>
					<li><a href="./Bienvenido.php">Inicio</a></li>
					<li><a href="../Hora/Administrar_hora.php" class="administradores">Administar hora</a></li>
					<li><a href="../Funciones/cerrarSesion.php">Cerrar sesion</a></li>
				</ul>
			</nav>
		</div>
	</header>
		<?php 
			require "../Funciones/comprobarSesion.php";
			probarSesion();
		?>
        <div name="Citas">
        <?php
							
			//realiza una coneccion a la base de datos
			require "../Funciones/conecta.php";
			$con = conecta();
			$hoy = getdate();
			/*Se prepara una consulta para mostrar todos los registros con status con valor  y eliminado con valor 0*/
			//$sql = "SELECT * FROM cita_agenda WHERE Status = 0 AND Mes = ". $hoy['mon'] . " AND Dia =" . $hoy['mday'] . " AND Anio = " . $hoy['year'];
			$sql = "SELECT * FROM cita_agenda WHERE Status = 0 AND Id_citador =" . $_SESSION['sesion']['idC'];
			//Se realiza la consulta
			$res = $con->query($sql);
			//Se recupera los datos de la consulta y se guardan en variables
			while($row = $res->fetch_array()){
            	$id = $row['id_cita'];
				$anio =$row["Anio"];
                $mes = $row['Mes'];
                $dia = $row['Dia'];
                $hora = $row['Hora'];
				$nombre = $row["Nombre"];
				$apellido  =$row["Apellido"];
				echo "<div class='cita'>";
				//Se crea tablas dinamicamente
				echo "<tr class='columna' id=\"idr$id\" value=\"$id\">";
				//echo "<td name=\"idr$id\">$id</td>";
                echo "<td class='cita'>".$dia."-".$mes."-".$anio."</td><br/>";
                echo "<td class='hora'>$hora</td><br/>";
				echo "<td class='nombre'>$nombre $apellido</td><br/>";
				//echo "<td class='Apellido'>$apellido</td><br/>";
				echo "<a href='./terminarCita.php?id=$id'>Terminada</a>";
									
				//echo "<td class=\"Cancelar\"><a href=\"javascript:void(0);\" onClick=\"eliminaFilas($id)\">ELIMINAR</a></td>";
				//echo "<td class=\"detalles\"><a href=\"productos_detalle.php?id=$id\">DETALLES</a></td>";
				//echo "<td class=\"edita\"><a href=\"productos_edita.php?id=$id\">EDITAR</a></td>";
				echo "</tr>";
            	echo "</div>";
			}
		?>
        </div>
    </body>
</html>

