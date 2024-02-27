<?php
	//Administradores_elimina.php
	require "../../Funciones/conecta.php";
    require "../../Funciones/comprobarSesionA.php";
    probarSesion();
	$con = conecta();
	
	//Recibe variables
	$id = $_REQUEST['id'];
	
	if(!empty($id)) {
		//$sql = "DELETE FROM administradores WHERE id = $id";
		$sql = "UPDATE citador SET stat = 1 WHERE Id_citador = $id";
		$con->query($sql);
	}
	//echo $sql;
	//Mensaje que retorna en Ajax
	echo "Se elimino exitosamente el registro con id: $id";
	//header("Location: administradores_lista.php");
?>