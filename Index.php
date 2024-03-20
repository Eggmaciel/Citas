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
        <p style="display:inline">Nombre</p><input type="text" name="Nombre" id="nombreR" class="registro" placeholder="Nombre"/>
        <p style="display:inline">Apellido</p><input type="text" name="Apellido" id="apellidoR" class="registro" placeholder="Primer apellido"/>
            <?php 
            require "./Funciones/conecta.php";
            $con = conecta();
            $sql = "select * from area where activo=0";
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
            <div id="mensaje2" class="errorCampos"></div><br>
            <input type="submit" value="Hacer cita" onClick="return validarDatos();"/>
        </form>
    </div>
</body>
</html>