<?php
    require "../Funciones/conecta.php";
    require "../Funciones/comprobarSesionA.php";

    probarSesion();

    $sql = "SELECT * FROM area";
	$con = conecta();
    $res = $con->query($sql);
    $doc = "areas.xls";
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$doc);
    header('Pragma: no-cache');
    header('Expires: 0');

    echo "<table border=1>";
    echo "<tr>";
    echo "<th colspan=5> Reporte de las areas registradas</th>";
    echo "</tr>";
    echo "<tr><th>ID AREA</th><th>NOMBRE AREA</th><th>DESCRIPCION</th><th>INICIALES</th><th>STAT</th></tr>";
    while($row = $res->fetch_array()){
        echo "<tr>";
        echo '<td>'.$row['id_area'].'</td>';
        echo '<td>'.$row['nombre_area'].'</td>';
        echo '<td>'.$row['descripcion'].'</td>';
        echo '<td>'.$row['iniciales'].'</td>';
        echo "</tr>";
    }
    echo "</table>";
?>