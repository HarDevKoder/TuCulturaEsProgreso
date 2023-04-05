<?php
//iniciamos sesion 
session_start();

//incluimos pagina con datos
include 'datos.php';

//incluimos pagina de funciones propias 
include 'funciones.php';


if(isset($_POST['pagoQr'])){

    // //capturamos el valor del referente del form de pagos check ($referidopor)
    $referidopor=$_SESSION['referentePagosCheck'];

    //realizar la conexion con la base de datos
    $conexion = conectarBD('190.8.176.115','tucultur_Administrador','Hdv080272*','tucultur_Asociados');

    // capturamos el valor del tipo de pago (registro,referente o autor) 
    switch($tipoPago){
        
        case 'registro':
            //extraigo el link de pago para REGISTRAR
            $qr = extraerDato($conexion,'qrRegistro','usuarios','usuario',$referidopor);   
            //inicializamos variable bandera para mostrar el div contenedor de la imagen(bandera = 0)
            $bandera=0;          
        break;

        case 'referente':
            //extraigo el link de pago para liquidar al REFERENTE
            $qr = extraerDato($conexion,'qrReferente','usuarios','usuario',$referidopor);
            //inicializamos variable bandera para mostrar el div contenedor de la imagen(bandera = 0)
            $bandera=0;       
        break;

        case 'autor':
            //extraigo el link de pago para liquidar al AUTOR
            $qr = extraerDato($conexion,'qrAutor','usuarios','usuario',$referidopor);
            //inicializamos variable bandera para mostrar el div contenedor de la imagen(bandera = 0)
            $bandera=0;       
        break; 

        default:
            //si no se selecciona un medio de pago, se oculta el overlay (bandera=1))
            $bandera=1;    
        break;
    }
    
}else{
    //inicializamos variable bandera para ocultar el div contenedor de la imagen(bandera = 1)
    $bandera=1;
}

include '../vistas/pagosVista2.php';