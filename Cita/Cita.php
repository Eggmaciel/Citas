<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <LINK REL='StyleSheet' HREF='../estilos/cita.css' >
    <script>
			function ComprobarCita(){
                var hora = $('#hora').val();
                var Nombre = $('#Nombre').val();
                var Apellido = $('#Apellido').val();
                var Citador = $('#Citador').val();
				$.ajax({
					type: 'post',
					datatype: 'text',
					url: './procesarCita.php?nombre=' + Nombre + '&apellido=' + Apellido + '&hora=' + hora + '&citador=' + Citador,
					success        :  function(res) { if(res == 1) { alert("La cita se registro con exito"); window.location.href = "../Index.php"; } 	
															else { $('#mensaje2').html('Usuario o contraseña erroneos, intentelo de nuevo');
																	setTimeout("$('#mensaje2').html('');", 5000);}
														},
						error          :  function() { alert("Error al enviar los datos"); }
					});
				
			}
		</script>
    <title>Cita</title>

</head>

<body>
    <h1>Citas disponibles</h1>
    <?php 
        //Establecer zona horaria local
        date_default_timezone_set('America/Mexico_City');

        $hoy = getdate();
        //echo $hoy['hours'];
        //echo date('l jS \of F Y h:i:s A');
        if($hoy['wday'] == 6 || $hoy['wday'] == 0){
            echo "<div class='no_citas'";
            echo "<h1 class='error'>No hay citas disponibles para hoy</h1>";
            echo "</div>";
        }else{
            require "../Funciones/conecta.php";

            $con = conecta();

            if(empty($_POST["Nombre"]) || empty($_POST["Apellido"])){
                header('Location: ../Index.php');
            }
            else{
                $Nombre = $_POST["Nombre"];
                $Apellido = $_POST["Apellido"];
                $area = $_POST['area'];
            }
            $sql = "SELECT * FROM fechas_no_validas WHERE Dia=".strval($hoy['mday'])." AND Mes = ".strval($hoy['mon'])." AND Anio = ".strval($hoy['year']);
            $res = $con->query($sql);
            if(mysqli_num_rows($res) > 0){
                echo "<div class='no_citas'";
                echo "<h1 class='error'>No hay citas disponibles para hoy</h1>";
                echo "</div>";
            }
            else{
                $sql = "SELECT * FROM citador WHERE Area = '$area'";
                $res = $con->query($sql);
                $idC = $res->fetch_assoc();   
                $sql = "SELECT * FROM horas_cita where Id_citador = " . $idC['Id_citador'] . " and Habilitada = 0";
                $res = $con->query($sql);
                while($row = $res->fetch_array()){
                    $id = $row["Id_hora"];
                    $horaC = $row["hora"];
                    $idCitador = $row['Id_citador'];
                    $hora = explode(":",$horaC);
                    
                    //($hoy['minutes']) >= intval($hora[1] )
                    //&& ($hoy['minutes']) < intval($hora[1])
                    if(($hoy['hours']) <= intval($hora[0])){
                        $sql2 = "SELECT * FROM cita_agenda WHERE Dia=".strval($hoy['mday'])." AND Mes=".strval($hoy['mon'])." AND Anio=".strval($hoy['year']) . " AND Hora = '$horaC'";
                        $res2 = $con->query($sql2);
                        if(mysqli_num_rows($res2) == 0){
                            
                        if(intval($hoy['hours']) < intval($hora[0])){
                            echo "<div class='citasD'";
                            echo "<h3 class='citaDisponible'>Cita disponible a las</h3>";
                            echo "<form class='citaDisponible' method='POST' action='./procesarCita.php'";
                            echo "<p class='horaDisponible'>".$horaC. "</p>";
                            echo "<input type='hidden' value='{$horaC}' id='hora' name='hora'/>";
                            echo "<input type='hidden' value='$Nombre' id='Nombre' name='Nombre'/>";
                            echo "<input type='hidden' value='$Apellido' id='Apellido' name='Apellido'/>";
                            echo "<input type='hidden' value='$idCitador' id='Citador' name='Citador'/>";
                            echo "<input type='submit' value='Agendar Cita'/>";
                            echo "</form>"; 
                            echo "</div>";  
                        }
                        else if($hoy['hours'] == intval($hora[0])){
                            if($hoy['minutes'] < intval($hora[1])){
                                echo "<form class='citaDisponible' method='POST' action='./procesarCita.php'";
                                echo "<p class='horaDisponible'>".$horaC. "</p>";
                                echo "<input type='hidden' value='{$horaC}' id='hora' name='hora'/>";
                                echo "<input type='hidden' value='$Nombre' id='Nombre' name='Nombre'/>";
                                echo "<input type='hidden' value='$Apellido' id='Apellido' name='Apellido'/>";
                                echo "<input type='hidden' value='$idCitador' id='Citador' name='Citador'/>";
                                echo "<input type='submit' value='Agendar Cita' onClick='ComprobarCita(); return false;'/>";
                                echo "</form>"; 
                            }
                        }
                        }
                    }
                }
            }
        }
    ?>
</body>
</html>