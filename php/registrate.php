<?php
//iniciamos sesion
session_start();

//invocamos pagina con funciones
include 'funciones.php';

//indicador de procedencia para realizar los refrescos (variable global de sesion )
$_SESSION['opcionRefresco']=2;

//solo se realizaran las acciones si se presiona el boton enviar
if (isset($_POST['enviar'])) {

    //Traer los datos del formulario
    include 'datos.php';

    //validamos que no exista el usuario y que exista el referido
    // include 'validacionDatos.php';
    $conteoUsuario= validaUsuario($usuario);            //funcion
    $conteoReferente= validaReferente($referidopor);    //funcion

    //mostramos mensajes de error en caso de existir despues de la validacion
    $errores= erroresValidacionDatos($conteoUsuario, $conteoReferente); //funcion

    //si ha pasado todas las validaciones procedea realizar el registro
    if ($errores == 0) {  

        //contamos las ventas registradas del refgerente en la base de datos
        $numVentas= cuentaVentas($referidopor); //funcion  

        //Calculamos las ventas a ser mostradas luego del registro
        $msg = calcularVentas($numVentas); //funcion

        //insertamos el registro y mostramos mensaje con el numero  de ventas realizadas
        insertarDatos($msg);  //función
    }
}
include '../vistas/registrateVista.php';
?>