<?php 

function abrirLectura(){
   return fopen("../Citas.txt",'r');
}

function abrirEscritura(){
   return fopen("../Citas.txt",'a');
}

function cerrarArchivo($archivo){
    fclose($archivo);
}

function insertarCita($cita,$archivo){
    $cita = "\n" . $cita;
    fputs($archivo, $cita);
}

function recuperarCita(){
    $archivo = abrirLectura();
    return fgets($archivo);

}
function modificarCita(){}
?>