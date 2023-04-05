<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1, maximum-scale=1,height=device-height, target-densitydpi=device-dpi">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600&display=swap" rel="stylesheet">   
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <title>Datos de Pago de Cliente</title>
    <link rel="stylesheet" href="../css/formularioSubirDatosPagoCliente.css?v=1">
    <!-- <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> -->
</head>
<body>

    <?php 
    
    session_start();
    $_SESSION['procedencia']='vista';

    ?>

    <div class="contenedor">
        <form action="" method="POST" class="formulario" name="login">
            <h2 class="titulo">Datos de Pago del Cliente</h2>

            <div class="frmControl">
                Usuario:
                <input type="text" name='cliente' required>
            </div>

            <div class="frmControl">
                Referente:
                <input type="text" name='referente' required>
            </div>

            <div class="frmControl">
                Link de Pago para Ventas:
                <input type="text" name='linkVentas' required>
            </div>

            <p>Insertar código QR</p>
            
            <div class="contenedorInputFileExt">
                <div class="contenedorInputFileInt">
                    <input type="file" name="imagenQr" id="archivo" required>
                </div>
            </div>
            

            <button type="submit" class="btn" name="enviar">Enviar</button>   

        </form>

        <div class="linksInferiores">
            ¿Ya tienes cuenta?<br />
            <a href="../php/login.php">Iniciar Sesión</a><br />
            <a href="../index.html">Salir</a>
        </div>    
     </div>   
</body>
</html>