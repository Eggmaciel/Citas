
<?php 
require '../Funciones/conecta.php';

$con = conecta();

//$Cita = $_POST['cita'];
//$Cita = str_replace(" ", "/", $Cita);
//$Cita = explode("/",$Cita);
$hoy = getdate();
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
//$Cita = implode("/",$Cita);
$Hora = $_POST['hora'];
$id = $_POST['Citador'];

$sql = "INSERT INTO cita_agenda
			(Anio,Mes,Dia,Hora,Nombre,Apellido,Id_citador)
			VALUES ('$hoy[year]','$hoy[mon]','$hoy[mday]','$Hora','$Nombre','$Apellido',".$id.")";

$res = $con->query($sql);

header('Location: ../Index.php');
?>