
<?php 
require '../Funciones/conecta.php';

$con = conecta();


$hoy = getdate();
$Nombre = $_REQUEST['nombre'];
$Apellido = $_REQUEST['apellido'];
$Hora = $_REQUEST['hora'];
$id = $_REQUEST['citador'];

if(empty($Nombre) or empty($Apellido) or empty($Hora) or empty($id)) echo 2;

else{

$sql = "INSERT INTO cita_agenda
			(Anio,Mes,Dia,Hora,Nombre,Apellido,Id_citador)
			VALUES ('$hoy[year]','$hoy[mon]','$hoy[mday]','$Hora','$Nombre','$Apellido',".$id.")";

$res = $con->query($sql);

echo 1;
}
?>