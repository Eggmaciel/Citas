<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <LINK REL='StyleSheet' HREF='../estilos/cita.css' >
	<link rel="stylesheet" href="../estilos/cabezeraAdmi.css">
    <link rel="stylesheet" href="../estilos/estilos_Administradores.css">
    <script src = "../js/jquery-3.3.1.min.js"></script>
    <title>Registrar citador</title>

    <script>
        function validarDatos(){
            var nombre = $('#nombreR').val();
            var apellido = $('#apellidoR').val();
            var area = $('#area').val();
            var pass = $('#contra').val();
            if(nombre == "" || apellido == "" || area == 0 || pass == ""){
                $('#mensaje2').html('Faltan campos por llenar');
                setTimeout("$('#mensaje2').html('');", 5000);
                
				return false;
            }
            else {
                
                return true;
            }
        }
    </script>
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
                            <a href="#.php" class="menu__link menu__link--inside">Registrar citador</a>
                        </li>
                    </ul>
                </li>

                <li class="menu__item  menu__item--show">
					<a href="../Excels/ListaExcel.php" class="menu__link">Descargar </a>
				</li>
    
                <li class="menu__item">
                    <a href=" ../Funciones/cerrarSesionA.php" class="menu__link">Cerrar sesion</a>
                </li>
            </ul>
        </section>
    </nav>
		</div>
	</header>
    <?php
        require "../Funciones/comprobarSesionA.php";
        probarSesion();
    ?>
<h1 aling="center">Registrar</h1>
    <div class="Bienvenida">
        <form action="./registrarC.php" method="POST">
            <input type="text" name="Nombre" id="nombreR" class="registro" placeholder="Nombre"/></br>
            <input type="text" name="Apellido" id="apellidoR" class="registro" placeholder="Primer apellido"/></br>
            <?php 
            require "../Funciones/conecta.php";
            $con = conecta();
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
            <input type="password" placeholder="contraseña" name="contra" id="contra" class="registro"/>
            <div id="mensaje2" class="errorCampos"></div>
            <input type="submit" value="Registrar" onClick="return validarDatos();"/>
        </form>
    </div>
</body>
</html>