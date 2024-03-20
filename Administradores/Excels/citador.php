<?php
    require "../Funciones/conecta.php";
    require "../Funciones/comprobarSesionA.php";

    probarSesion();

    $sql = "SELECT * FROM citador";
	$con = conecta();
    $res = $con->query($sql);
    $doc = "citadores.xls";
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$doc);
    header('Pragma: no-cache');
    header('Expires: 0');

    echo "<table border=1>";
    echo "<tr>";
    echo "<th colspan=5> Reporte de los citadores registrados</th>";
    echo "</tr>";
    echo "<tr><th>ID CITADOR</th><th>NOMBRE</th><th>APELLIDO</th><th>AREA</th><th>STAT</th></tr>";
    while($row = $res->fetch_array()){
        echo "<tr>";
        echo '<td>'.$row['Id_citador'].'</td>';
        echo '<td>'.$row['Nombre'].'</td>';
        echo '<td>'.$row['Apellido'].'</td>';
        echo '<td>'.$row['Area'].'</td>';
        echo '<td>'.$row['stat'].'</td>';
        echo "</tr>";
    }
    echo "</table>";
?>