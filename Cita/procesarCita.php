
<?php 
require '../Funciones/conecta.php';

$con = conecta();

//$Cita = $_POST['cita'];
//$Cita = str_replace(" ", "/", $Cita);
//$Cita = explode("/",$Cita);
$hoy = getdate();
$Nombre = $_REQUEST['nombre'];
$Apellido = $_REQUEST['apellido'];
//$Cita = implode("/",$Cita);
$Hora = $_REQUEST['hora'];
$id = $_REQUEST['citador'];

$sql = "INSERT INTO cita_agenda
			(Anio,Mes,Dia,Hora,Nombre,Apellido,Id_citador)
			VALUES ('$hoy[year]','$hoy[mon]','$hoy[mday]','$Hora','$Nombre','$Apellido',".$id.")";

$res = $con->query($sql);

echo 1;

?>