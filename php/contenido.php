<?php  
    session_start();
    require 'funciones.php';
    // Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
    if (isset($_SESSION['usuario'])) {
        

        // require '../vistas/contenidoVista.php';

        //CONEXION A BASE DE DATOS (Guardo config en variable)
        $conexion = conectarBd( '190.8.176.115', 'tucultur_Administrador', 'Hdv080272*', 'tucultur_Asociados' );
        echo "<br>";

        //CONTEO DE VENTAS TOTALES DE LA BASE DE DATOS
        $ventasTotales = contarRegistros($conexion, 'Registro');
        echo $ventasTotales;

        //MAYOR VALOR REGISTRADO POR CADA USUARIO
        $maximoValorRegistrado = mayorValorRegistrado ( $conexion, $userEmail );


        // echo "<h1>$ventasTotales</h1>";
        // echo "Top de ventas: $maximoValorRegistrado";

        require '../vistas/contenidoVista.php';

    } else {
        header('Location: login.php');
        die();
    }
?>