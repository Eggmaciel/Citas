<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src = "../js/jquery-3.3.1.min.js"></script>
    <LINK REL='StyleSheet' HREF='../estilos/cita.css' >
    <title>Citas disponibles</title>
    <script>
			function comprobarCita(){
                var hora = $('#hora').val();
                var Nombre = $('#Nombre').val();
                var Apellido = $('#Apellido').val();
                var Citador = $('#Citador').val();
				$.ajax({
					type: 'post',
					datatype: 'text',
					url: './procesarCita.php?nombre=' + Nombre + '&apellido=' + Apellido + '&hora=' + hora + '&citador=' + Citador,
					success        :  function(res) { if(res == 1) { alert("La cita se registro con exito"); window.location.href = "../Index.php"; } 	
															else { $('#mensaje2').html('Error al procesar cita');
																	setTimeout("$('#mensaje2').html('');", 5000);
                                                                    window.location.href = "../Index.php";}
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
                $sql = "SELECT * FROM citador WHERE Area = '$area' AND stat= 0";
                $res = $con->query($sql);
                //$idC = $res->fetch_array();
                while($row = $res->fetch_array()){   
                $sql = "SELECT * FROM horas_cita where Id_citador = " . $row['Id_citador'] . " and Habilitada = 0";
                $resC = $con->query($sql);
                while($row = $resC->fetch_array() and mysqli_num_rows($resC) > 0){
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
?>

                       <?php if (intval($hoy['hours']) < intval($hora[0])): ?>
                            <div class='citasD'>
                                <h3 class=''>Cita disponible a las</h3>
                                <form class='citaDisponible'>
                                    <p class='horaDisponible'><?php echo $horaC; ?></p>
                                    <input type='hidden' value='<?php echo $horaC; ?>' id="hora" name='hora'/>
                                    <input type='hidden' value='<?php echo $Nombre; ?>' id="Nombre" name='Nombre'/>
                                    <input type='hidden' value='<?php echo $Apellido; ?>' id="Apellido" name='Apellido'/>
                                    <input type='hidden' value='<?php echo $idCitador; ?>' id="Citador" name='Citador'/>
                                    <input type="submit" value="Agendar Cita" onClick="comprobarCita(); return false;"/>
                                </form>
                            </div>
                        <?php elseif ($hoy['hours'] == intval($hora[0])): ?> 
                            <?php if ($hoy['minutes'] < intval($hora[1])): ?>
                                
                                    <h3 class='citaDisponible'>Cita disponible a las</h3>
                                    <form class='citaDisponible'>
                                        <p class='horaDisponible'><?php echo $horaC ?></p>
                                        <input type='hidden' value='<?php echo $horaC; ?>' id='hora' name='hora'/>
                                        <input type='hidden' value='<?php echo $Nombre; ?>' id='Nombre' name='Nombre'/>
                                        <input type='hidden' value='<?php echo $Apellido; ?>' id='Apellido' name='Apellido'/>
                                        <input type='hidden' value='<?php echo $idCitador; ?>' id='Citador' name='Citador'/>
                                        <input type="submit" value="Agendar Cita" onClick="comprobarCita(); return false;"/>
                                    </form>
                                
                            <?php endif; ?>
                        <?php endif; ?>
                        
        <?php
                        }
                    }
                }
            }
            
        }
    ?>
</body>
</html>