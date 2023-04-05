<?php
//iniciamos sesion
session_start();

//DATOS DEL FORMULARIO DE REGISTRO
$nombre = trim(strtolower($_POST['nombre']));
$cedula = trim($_POST['cedula']);
$telefono = trim($_POST['telefono']);
$usuario = trim(strtolower($_POST['usuario']));
$pass = trim($_POST['pass']);
$pass = hash('sha512', $pass);
$referidopor = trim(strtolower($_POST['referidopor']));

//DATOS DE TIPO DE PAGO A REALIZAR
$tipoPago=$_POST['tipoPago'];


//DATOS DEL FORMULARIO DE DATOS DE PAGO DEL CLIENTE
$cliente = trim(strtolower($_POST['cliente']));
$referente = trim(strtolower($_POST['referente']));
$linkVentas = trim($_POST['linkVentas']);

//VARIABLES DE SESION
$habilitaPago = $_SESSION['habilitaPago'];          //indica que opcion de pago debe habilitarse
$opcionRefresco = $_SESSION['opcionRefresco'];      //indica desde que pagina se ha direccionado al refresco
        //1- pagosCheck
        //2- registrate
        //3- Pagos de  clientes


