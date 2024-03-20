<?php
    require "./Funciones/conecta.php";
    require "./Funciones/comprobarSesion.php";
    probarSesion();

    $con = conecta();

    $id = $_GET['id'];
    
    if(empty($id)) header("Location: ./ListadoCitadores.php");

    $sql = "UPDATE cita_agenda SET Status = 1 WHERE id_cita=$id";

    $con->query($sql);

    header("Location: ./ListadoCita.php");

    ?>