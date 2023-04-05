<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0,maximum-scale=1.0">
    <link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/fonts.css">
	<script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/estilosPrincipal.css">
    <title>Contador ventas</title>
</head>
<body class="grid-container">
<!-- -------------------------------------------------------------------------------- -->
<!-- ------------------ ENVIO DE DATOS AL CORREO ------------------------------------ -->
<!-- -------------------------------------------------------------------------------- -->
<?php
function contador(){
        $contadorTxt= file_get_contents('../contador.txt');     //Lectura del estado del contador en el txt
        $contadorEnt=intval($contadorTxt);                      //Conversion de texto a entero
        $contadorEnt++;                                     //Se incrementa el contador
            if($contadorEnt > 25){                              //Si se llega a 50 ventas, se 
                $contadorEnt=1;                                 //reinicia la cuenta
            }
        file_put_contents('../contador.txt',$contadorEnt);      //se escribe el nuevo dato en el txt
        return $contadorEnt;
    } 
?>
<!-- -------------------------------------------------------------------------------- -->
<!-- ------------------ CONTENIDO HTML DEL CONTADOR --------------------------------- -->
<!-- -------------------------------------------------------------------------------- -->

    <header class="header">
            <div class="logo">
                <img src="../imagenes/logo.png" alt="">
            </div>

            <div class="menu_bar">
                <a href="#" class="bt-menu"><span class="icon-menu"></span></a>
            </div>
            
            <nav>
                <ul>
                    <li><a href="../index.html"><span class="icon-home"></span>Inicio</a></li>
                    <li><a href="../index.html#dos"><span class="icon-stats-dots"></span>Misión</a></li>
                    <li><a href="../index.html#tres"><span class="icon-eye"></span>Visión</span></a></li>
                    <li><a href="../index.html#cuatro"><span class="icon-file-text2"></span>Términos</a></li>
                    <li><a href="../index.html#cinco"><span class="icon-users"></span>Producto</a></li>
                    <li><a href="../index.html#seis"><span class="icon-envelop"></span>Contacto</a></li>
                </ul>
            </nav>		
       
    </header>
    <main class="main">
        <div class="container-contador">

            <div class="cuenta">
                <p>Eres el comprador número:</p>
                <h2>
                    <?php 
                        echo "<br/>" . contador(); //MUESTRA EN PANTALLA VALOR DEL CONTADOR
                    ?>
                </h2>
            </div>

            <div class="descarga">
                <a href="../libro/Creatividad Motivacional_epub.epub" download="Creatividad Motivacional.epub"><img src="../imagenes/descargar-archivo.png" alt=""></a>
            </div>

        </div>
    </main>

    <footer class="footer">
        <div class="contenido-pie">
           <a href="https://www.facebook.com/clasificados.engirabieness" target="_blank"> <img src="../imagenes/facebook.png" alt=""></a>
            <p>
              E-mail:girabienes77@gmail.com <span id="seis"></span><br>
              Luis Fernando García García <br>
            </p>
         
            <div class="whatsapp">
                <a href="https://api.whatsapp.com/send?phone=+57 3148850295"><img src="../imagenes/whatsapp.jpg" alt=""></a>
                <p>Envianos un Mensaje</p>
             </div>
 
        </div>
     
    </footer>
</body>
</html>