<?php
    // Se incluye liberia de Funciones PHP
    include 'funciones.php';
    // Se realiza Conexión a Base de Datos
    $conexion = conectarBd( '190.8.176.115', 'tucultur_Administrador', 'Hdv080272*', 'tucultur_Asociados' );
    // Consulta para traer los Usuarios Registrados
    $sql = "SELECT usuario FROM Registro";
    // Se guarda el resultado en variable
    $result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang = 'es'>
    <head>
        <meta charset = 'UTF-8'>
        <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0, user-scalable=no,minimum-scale=1.0,maximum-scale=1.0'>
        <title>Tabla de datos</title>
        <link rel = 'stylesheet' href = '../css/estilosReporteVentas.css'>
    </head>
    <body>
        <!-- Contenedor General -->
        <div class = 'contenedor'>
            <!-- link para cerrar sesion de usuario -->
            <div class = 'cerrarSesion'>
                <a href = 'cerrar.php'>Cerrar Sesión</a>
            </div>
            <!-- Formulario Para Buscar Ventas de Referente -->
            <form method = 'POST'>
                <!-- Lista Desplegable con los Usuarios Registrados -->
                <div class="selectContainer">
                    <select name="usuario" id="usuarios" class="usuarios" required>
                        <option value="" >Seleccione un usuario</option>
                        <?php
                            // Inicializar el contador
                            $contador = 1;
                            // Loop para crear las opciones del cuadro de lista
                            while ($row = $result->fetch_assoc()) {
                                // echo '<option value="' . $row["usuario"]. $row["usuario"] . '">' . $row["usuario"] . '</option>';
                                echo '<option value="' . $row["usuario"] . '">' . $contador . '. ' . $row["usuario"] . '</option>';
                                // Incrementar el contador
                                $contador++;
                            }
                        ?>
                    </select>
                </div>
                <!-- Boton de Envio de Consulta -->
                <div class="botonContainer">
                    <button type = 'submit' class = 'boton' name = 'buscar'>buscar</button>
                </div>
            </form>
            <!-- Tabla que muestra los Datos Basicos del Referente Consultado -->
            <table class = 'padre'>
                <caption>DATOS  USUARIO</caption>
                <!-- Encabezados de La tabla de Datos de Usuario -->
                <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Usuario</th>
                    <th>Afiliado Por</th>
                </tr>
                <!-- Controlador PHP -->
                <?php
                    // Se captura el Referente ingresado en el formuario
                    $valor = $_POST[ 'usuario' ];
                    // var_dump($valor);
                    // Se Consultan los Datos del usuario en la base de datos
                    $sql = "SELECT * FROM Registro where usuario = '$valor' ";
                    // Resultado de la consulta guardado en variable
                    $resultado = mysqli_query( $conexion, $sql );
                    // Mientras haya datos que mostrar, genera Columna de datos (Registro) 
                    while( $mostrar = mysqli_fetch_array( $resultado ) ) {
                ?>
                <tr>
                    <td><?php echo $mostrar[ 'nombre' ] ?></td>
                    <td><?php echo $mostrar[ 'cedula' ] ?></td>
                    <td><?php echo $mostrar[ 'usuario' ] ?></td>
                    <td><?php echo $mostrar[ 'referidopor' ] ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <!-- Tabla que muestra las ventas realizadas por el referente -->
            <table class = 'hijos'>
                <caption>USUARIOS REFERIDOS</caption>
                <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Usuario</th>
                    <th>Fecha y Hora</th>
                </tr>
                <?php
                    $valor = $_POST[ 'usuario' ];
                    $sql = "SELECT * FROM Registro where referidopor = '$valor' ";
                    $resultado = mysqli_query( $conexion, $sql );
                    while( $mostrar = mysqli_fetch_array( $resultado ) ) {
                ?>
                <tr>
                    <td><?php echo $mostrar[ 'nombre' ] ?></td>
                    <td><?php echo $mostrar[ 'cedula' ] ?></td>
                    <td><?php echo $mostrar[ 'usuario' ] ?></td>
                    <td><?php echo $mostrar[ 'fecha' ] ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>