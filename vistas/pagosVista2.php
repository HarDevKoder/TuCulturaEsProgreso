<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0,maximum-scale=1.0">
    <title>Pagos</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/formularioPagos.css?v=14">
    <script src="../js/main.js" defer></script>
    <link rel="shortcut icon" href="/imagenes/mejoradas/icon.png" type="image/x-icon">
</head>
<body>

    <!-- Contenedor general -->
    <div class="contenedor">         
        <!-- formulario de pagos 0=oculta 1=muestra-->
        <form action=" " class="formulario" id="formulario" name="formulario" method="POST" >
            <h2 class="titulo">Zona de Pago</h2>
            <p>
                <input type="radio"  name="tipoPago" value="registro" <?php if($tipoPago=="registro") echo "checked";?>>Comisión a quien invitó: <br />
                <input type="radio"  name="tipoPago" value="referente" <?php if($tipoPago=="referente") echo "checked";?>>Comisión a Referente: <br />
                <input type="radio"  name="tipoPago" value="autor" <?php if($tipoPago=="autor") echo "checked";?>>Comisión Autor: <br />
            </p>

            <div class="contenedorPagos">
                <div class="pagoQr">
                    <button type="submit" class="btnQr" name="pagoQr" id="qrBtn" onclick="overlayShow()" ></button>  
                </div>
            </div>           
        </form>

        <!-- capa opaca sobre pantalla para resaltar contenido -->
       <div class="overlay" id="overlay" <?php if($bandera==1){ echo ' style="display: none;"'; } ?>>
            <section class="close">
                <span class="icon-cross" id="cross" onclick="overlayClose()"></span>
            </section>
            <!-- contenedor para mostrar la imagen traida desde la BD -->
            <div class="mostrar">
                <img src="data:image/jpg;base64,<?php echo base64_encode($qr);?>" alt="">
            </div>
        </div>
        <div class="linksInferiores">
            ¿Ya tienes cuenta?<br />
            <a href="../php/login.php">Iniciar Sesión</a><br />
            <a href="../index.html">Salir</a>
        </div>  
    </div>  
    
</body>
</html>