<?php
    session_start();
    include 'funciones.php';
   
    $usuarioAdmin = trim($_POST['usuarioAdmin']);
    $passAdmin = trim($_POST['passAdmin']);
    $procedencia = $_SESSION['procedencia'];

    if($procedencia == 'vista'){
        header("location:../index.html");
    }else{
        //si son correctos, realizo accion
        if($usuarioAdmin == 'Admin' && $passAdmin == '123'){ 
            mensaje("Bienvenido Administrador",'subirDatosPagoClientes.php');
        }else{
            mensaje('Usuario o Contraseña Incorrectos', '../index.html');
        }
    }

   


   
        

        
            
        
    
    