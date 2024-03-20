<?php
    require "../Funciones/conecta.php";
    require "../Funciones/comprobarSesionA.php";

    probarSesion();

    $sql = "SELECT * FROM cita_agenda";
	$con = conecta();
    $res = $con->query($sql);
    $doc = "citaAgenda.xls";
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$doc);
    header('Pragma: no-cache');
    header('Expires: 0');

    echo "<table border=1>";
    echo "<tr>";
    echo "<th colspan=8> Reporte de las citas registradas</th>";
    echo "</tr>";
    echo "<tr><th>ID CITA</th><th>AÑO</th><th>MES</th><th>DIA</th><th>HORA</th><th>NOMBRE</th><th>APELLIDO</th><th>ID CITADOR</th></tr>";
    while($row = $res->fetch_array()){
        echo "<tr>";
        echo '<td>'.$row['id_cita'].'</td>';
        echo '<td>'.$row['Anio'].'</td>';
        echo '<td>'.$row['Mes'].'</td>';
        echo '<td>'.$row['Dia'].'</td>';
        echo '<td>'.$row['Hora'].'</td>';
        echo '<td>'.$row['Nombre'].'</td>';
        echo '<td>'.$row['Apellido'].'</td>';
        echo '<td>'.$row['Id_citador'].'</td>';
        echo "</tr>";
    }
    echo "</table>";
?>