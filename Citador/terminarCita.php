<?php
    require "../Funciones/conecta.php";

    $con = conecta();

    $id = $_GET['id'];

    $sql = "UPDATE cita_agenda SET Status = 1 WHERE id_cita=$id";

    $con->query($sql);

    header("Location: ./ListadoCita.php");

    ?>