<?php
session_start();

session_destroy();

header("Location:../Citador/index.php");
?>