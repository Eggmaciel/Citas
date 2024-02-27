<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <LINK REL='StyleSheet' HREF='../estilos/cita.css' >
	<link rel="stylesheet" href="../estilos/cabezeraAdmi.css">
    <link rel="stylesheet" href="../estilos/estilos_Administradores.css">
    <script src = "../../js/jquery-3.3.1.min.js"></script>
    <title>Bienvenido</title>

    <script>
        function validarDatos(){
            var nombreA = $('#nombreA').val();
            var iniciales = $('#iniciales').val();
            var descripcion = $('#desc').val();
            if(nombreA == "" || iniciales == "" || descripcion == ""){
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
    <?php
    require "../../Funciones/comprobarSesionA.php";
    probarSesion();
    ?>
<h1 aling="center">Registrar area</h1>
    <div class="Bienvenida">
        <form action="./agregarArea.php" method="POST">
            <input type="text" name="NombreArea" id="nombreA" class="registro" placeholder="Nombre del area"/></br>
            <input type="text" name="Iniciales" id="iniciales" class="registro" placeholder="Iniciales"/></br>
            <textarea placeholder="Descripcion" name="descripcion" id="desc" class="registro"></textarea></br>
            <div id="mensaje2" class="errorCampos"></div><br>
            <input type="submit" value="Registrar" onClick="return validarDatos();"/>
        </form>
    </div>
</body>
</html>