<?php
    require "../Funciones/conecta.php";
    require "../Funciones/comprobarSesionA.php";

    probarSesion();

    $sql = "SELECT * FROM horas_cita";
	$con = conecta();
    $res = $con->query($sql);
    $doc = "horasCita.xls";
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$doc);
    header('Pragma: no-cache');
    header('Expires: 0');

    echo "<table border=1>";
    echo "<tr>";
    echo "<th colspan=3> Reporte de las horas registradas</th>";
    echo "</tr>";
    echo "<tr><th>ID HORA</th><th>HORA</th><th>ID CITADOR</th></tr>";
    while($row = $res->fetch_array()){
        echo "<tr>";
        echo '<td>'.$row['Id_hora'].'</td>';
        echo '<td>'.$row['hora'].'</td>';
        echo '<td>'.$row['Id_citador'].'</td>';
        echo "</tr>";
    }
    echo "</table>";
?>