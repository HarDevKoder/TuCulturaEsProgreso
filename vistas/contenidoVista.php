<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1, maximum-scale=1,height=device-height, target-densitydpi=device-dpi">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Contenido</title>
    <link rel="stylesheet" href="../css/estilosContenido.css?v=2">
    
</head>
<body>

    <div class="contenedor">

        <div class="contenedorLinks">

            <div class="cerrarSesion">
                <a href="../php/cerrar.php" class="linkCerrarSesion">Cerrar Sesión</a>
            </div>
                

            <div class="descargaLibro">
                <a href="../libro/Creatividad Motivacional_epub.epub" download="Creatividad Motivacional.epub"><img src="../imagenes/descargar-archivo.png" alt=""></a>
            </div>

        </div>



     

        <h2 class="titulo">Zona de Usuarios</h2>
        <hr class="border">

        <div class="notificaciones">
            <span>Top de Ventas: <?php echo $maximoValorRegistrado ?></span>
            <span>Ventas Totales: <?php echo $ventasTotales ?></span>
        </div>       

        <div class="pagos">

            <p>
                Es necesario tener una cuenta de PayU para realizar los pagos, en el siguiente link podrá ingresar al sitio para iniciar sesión o crear una cuenta.
            </p>

            <div class="imagen-pago">
                <a href="../vistas/payuVista.php"><img src="../imagenes/PayU.png" alt="" width="230px"></a>
            </div>

        </div>

        <div class="reportes">
            <p>
                Haz clic en el siguiente enlace para conocer un reporte de tu estado de ventas.
            </p>
            <div class="imagen-reportes">
                <a href="../php/reporteventas.php"><img src="../imagenes/ventas.png" alt="" width="200px"></a>
                </div>
            
        </div>

    </div>   
</body>
</html>