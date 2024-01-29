<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <LINK REL='StyleSheet' HREF='./estilos/cita.css' >
    <script src = "../js/jquery-3.3.1.min.js"></script>
    <title>Bienvenido</title>

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
<h1 aling="center"> Registrar</h1>
    <div class="Bienvenida">
        <form action="./registrarC.php" method="POST">
            <input type="text" name="Nombre" id="nombreR" class="registro" placeholder="Nombre"/></br>
            <input type="text" name="Apellido" id="apellidoR" class="registro" placeholder="Primer apellido"/></br>
            <select name="area" id="area">
				<option value="0">Seleccionar</option>
				<option value="RecursosHumanos">Recursos Humanos</option>
				<option value="ControlEscolar">Control Escolar</option>
			</select><br><br>
            <input type="password" name="contra" id="contra" class="registro"/></br>
            <div id="mensaje2" class="errorCampos"></div><br>
            <input type="submit" value="Registrar" onClick="return validarDatos();"/>
        </form>
    </div>
</body>
</html>