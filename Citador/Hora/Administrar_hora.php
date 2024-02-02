<?php
 require "../../Funciones/conecta.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <LINK REL='StyleSheet' HREF='../../estilos/cita.css' >
    <LINK REL='StyleSheet' HREF='../../estilos/cabezera.css' >
    <title></title>
</head>

<body>
<header class="cabezera">
	<div class="contenedor logo-nav-container">
		<a class="logo" href="#">Administradores</a>
		<nav class="navegador">	
			<ul>
				<li><a href="../Bienvenido.php">Inicio</a></li>
				<li><a href="../ListadoCita.php" class="banner">Citas pendientes</a></li>
				<li><a href="../../Funciones/cerrarSesion.php">Cerrar sesion</a></li>
			</ul>
		</nav>
	</div>
</header>
    <?php 
        require "../../Funciones/comprobarSesion.php";
        probarSesion();
    ?>
    <h1>Horas</h1>
    <h3 align="center">Agregar nueva hora</h3>
    <div class="citasD">
        <form action="hora_salvar.php" method="POST">
            <input type="text" id="time-input" name="Newtime" placeholder="17:00"/>
            <input type="hidden" name="idCitador" value="<?php echo $_SESSION['sesion']['idC']; ?>"/>
            <input type="submit" value="Agregar hora" />
        </form>
    </div>
    <h3 align="center">Modificar Horas</h3>
    <?php 
    $con = conecta();
    $sql = "SELECT * FROM horas_cita WHERE Id_citador =" . $_SESSION['sesion']['idC'];
    $res = $con->query($sql);
        while($row = $res->fetch_array()){
            $id =$row["Id_hora"];
			$hora =$row["hora"];
            echo "<div class='citasD'>";
            echo '<form action="./Actualizar_hora.php" method="POST">';
            echo '   <input type="hidden" name="id_hora" id="id_ora" value="'.$id.'"/></br>';
            echo    '<input type="text" name="hora" id="hora" placeholder="'.$hora.'"/>';
            echo    '<input type="submit" value="Cambiar hora" />';
            echo '</form>';
            if($row['Habilitada'] == 0){
                echo "<a href='./DeshabilitarHora.php?idH=$id'>Deshabilitar hora</a>";
            }
            else{
                echo "<a href='./HabilitarHora.php?idH=$id'>Habilitar hora</a>";
            }
            
            echo "</div>";
        }

    ?>
    

</body>
</html>