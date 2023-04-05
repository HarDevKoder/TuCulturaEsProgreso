<?php
    include 'funciones.php';
    $conexion = conectarBd('190.8.176.115','tucultur_Administrador','Hdv080272*','tucultur_Asociados');
    // conexion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no,minimum-scale=1.0,maximum-scale=1.0">
    <title>Tabla de datos</title>
    <link rel="stylesheet" href="../css/estilosReporteVentas.css?v=1">
</head>
<body>
<div class="contenedor">

    <div class="cerrarSesion">
        <a href="cerrar.php">Cerrar Sesión</a>  
    </div>   

    <form method="POST">
		<input type="text" name="valor" class= "usuario-caja" placeholder="Usuario a Consultar">
        <button type="submit" class="boton" name="buscar">Consultar</button>
	</form> 

    <table class="padre">
        <caption>DATOS DEL USUARIO</caption>
        <tr>
            <th>Nombre</th>
            <th>Cedula</th>
            <th>Usuario</th>
            <th>Afiliado Por</th>
        </tr>

        <?php

            $valor=$_POST['valor'];
 
            $sql= "SELECT * FROM Registro where usuario = '$valor' ";
            $resultado = mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($resultado)){

        ?>

            <tr>
            <td><?php echo $mostrar['nombre'] ?></td>
            <td><?php echo $mostrar['cedula'] ?></td>
            <td><?php echo $mostrar['usuario'] ?></td>
            <td><?php echo $mostrar['referidopor'] ?></td>
            </tr>

        <?php
            }
        ?>

    </table>

    <div class="separador"></div>

    <table class="hijos">
        <caption>USUARIOS REFERIDOS</caption>
        <tr>
            <th>Nombre</th>
            <th>Cedula</th>
            <th>Usuario</th>
            <th>Fecha y Hora</th>
        </tr>

        <?php

            $valor=$_POST['valor'];
  
            $sql= "SELECT * FROM Registro where referidopor = '$valor' ";
            $resultado = mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($resultado)){

        ?>

            <tr>
            <td><?php echo $mostrar['nombre'] ?></td>
            <td><?php echo $mostrar['cedula'] ?></td>
            <td><?php echo $mostrar['usuario'] ?></td>
            <td><?php echo $mostrar['fecha'] ?></td>
            </tr>

        <?php
            }
        ?>

    </table>

</div>
</body>
</html>