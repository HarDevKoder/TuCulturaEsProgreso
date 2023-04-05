<?php
//iniciamos sesion para tener los datos disponibles
session_start();

//incluimos pagina con los datos generales
include 'datos.php';

//verificamos la procedencia para redireccionar
switch($opcionRefresco){
    case 1:
        header("location:pagosCheck.php");
    break;

    case 2:
        header("location:registrate.php");
    break;  

    case 3:
        header("location:subirDatosPagoClientes.php");
    break;    
}