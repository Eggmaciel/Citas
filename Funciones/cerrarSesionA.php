<?php
session_start();

session_destroy();

header("Location:../Administradores/index.php");
?>