<?php
        $servidor = '190.8.176.115';
        $user='tucultur_Administrador';
        $clave='Hdv080272*';
        $base_datos='tucultur_Asociados';

        $conexion=new mysqli($servidor, $user, $clave , $base_datos);
        $conexion->set_charset("utf8");

        if(!$conexion){
            echo 'Error en la conexión' . "<br />";
        }
        // else{
        //     echo 'conexion establecida';
        // }
?>