<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu desplegable</title>
    <link rel="stylesheet" href="estilos/cabezeraAdmi.css">
</head>
<body>
    <nav class="menu">
        <section class="menu__container">
            <h1 class="menu__logo">Jordan Alex.</h1>

            <ul class="menu__links">
                <li class="menu__item">
                    <a href="#" class="menu__link">Admi</a>
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
                    <a href="href=../../Funciones/cerrarSesionA.php" class="menu__link">Cerrar sesion</a>
                </li>
    
            </ul>

            <div class="menu__hamburguer">
                <img src="assets/menu.svg" class="menu__img">
            </div>
        </section>
    </nav>

    <script src="js/app.js"></script>
</body>
</html>
