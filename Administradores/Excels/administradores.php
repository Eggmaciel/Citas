<?php
    require "../Funciones/conecta.php";
    require "../Funciones/comprobarSesionA.php";

    probarSesion();

    $sql = "SELECT * FROM administrador";
	$con = conecta();
    $res = $con->query($sql);
    $doc = "administradores.xls";
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$doc);
    header('Pragma: no-cache');
    header('Expires: 0');

    echo "<table border=1>";
    echo "<tr>";
    echo "<th colspan=3> Reporte de las horas registradas</th>";
    echo "</tr>";
    echo "<tr><th>ID ADMINISTRADOR</th><th>NOMBRE</th><th>APELLIDO</th></tr>";
    while($row = $res->fetch_array()){
        echo "<tr>";
        echo '<td>'.$row['id_administrador'].'</td>';
        echo '<td>'.$row['Nombre'].'</td>';
        echo '<td>'.$row['Apellido'].'</td>';
        echo "</tr>";
    }
    echo "</table>";
?>