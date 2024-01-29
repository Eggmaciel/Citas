<?php 
	
	function probarSesion(){
		session_start();
	
		if(!isset($_SESSION['sesion']['id'])){ 
				session_destroy();
				header("Location: localhost:/Proyecto/");
		}
	}
?>