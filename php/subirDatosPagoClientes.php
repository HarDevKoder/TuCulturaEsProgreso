<?php
    session_start();
    include 'datos.php';
    include 'funciones.php';

    //indicador de procedencia para realizar los refrescos (variable global de sesion )
    $_SESSION['opcionRefresco']=3;

    if(isset($_POST['enviar'])){
        //realizo la conexion a la base de datos
        $conexion = conectarBd('190.8.176.115','tucultur_Administrador','Hdv080272*','tucultur_Asociados');

        //
        modificarDatos($conexion,'usuarios','linkRegistro',$linkVentas,'usuario',$cliente);

        
        // //obtengo el tamaño del archivo para verificar su existencia
        // $revisar = getimagesize($_FILES["imagenQr"]["tmp_name"]);
   
        // //si el archivo a enviar ha sido cargado (tamaño !== 0)
        // if($revisar !== false){
        //     //guardo las caracteristicas de la imagen
        //     $img = $_FILES['imagenQr']['tmp_name'];
       
        //     //almaceno el contenido de la imagen
        //     $imgContenido = addslashes(file_get_contents($img));

                
    }


   
    include '../vistas/subirDatosPagoClienteVista.php';