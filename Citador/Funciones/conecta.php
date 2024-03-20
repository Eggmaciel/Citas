<?php
define("HOST", 'localhost');
define("BD", 'citas');//proyecto_progra_internet
define("USER_BD",'root');
define("PASS_BD",'');

function conecta(){
    $con = new mysqli(HOST, USER_BD, PASS_BD, BD);
    return $con;
}
?>