<?php
    require "../../Funciones/conecta.php";

    $con = conecta();

    $id = $_GET['idA'];

    if(empty($id)) header("Location: ./listadoAreas.php");

    $sql = "UPDATE area SET activo = 1 WHERE id_area = $id";
	$con->query($sql);

    header("Location: ./listadoAreas.php");