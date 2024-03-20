<?php 
	
	function probarSesion(){
		session_start();
	
		if(!isset($_SESSION['sesion']['id']) or !isset($_SESSION['sesion']['idA'])){ 
				session_destroy();
				header("Location: ../");
		}
	}
?>