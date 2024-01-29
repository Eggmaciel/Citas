<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <LINK REL='StyleSheet' HREF='./estilos/cita.css' >
    <script src = "./js/jquery-3.3.1.min.js"></script>
    <title>Bienvenido</title>

    <script>
        function validarDatos(){
            var nombre = $('#nombreR').val();
            var apellido = $('#apellidoR').val();
            var area = $('#area').val();
            if(nombre == "" || apellido == "" || area == 0){
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
<h1 aling="center">Agendar Cita</h1>
    <div class="Bienvenida">
        <form action="./Cita/Cita.php" method="POST">
            <input type="text" name="Nombre" id="nombreR" class="registro" placeholder="Nombre"/></br>
            <input type="text" name="Apellido" id="apellidoR" class="registro" placeholder="Primer apellido"/></br>
            <select name="area" id="area">
				<option value="0">Seleccionar</option>
				<option value="RecursosHumanos">Recursos Humanos</option>
				<option value="Control escolar">Control Escolar</option>
			</select><br><br>
            <div id="mensaje2" class="errorCampos"></div><br>
            <input type="submit" value="Hacer cita" onClick="return validarDatos();"/>
        </form>
    </div>
</body>
</html>