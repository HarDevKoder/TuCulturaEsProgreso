<?php
session_start();
//---------------------------------------------------------------------------------------
//FUNCION PARA GENERAR MENSAJES DE ALERTA
//---------------------------------------------------------------------------------------
function mensaje($mensaje, $pagina){
    // echo "<script>alert('$mensaje');</script>";
    echo "<script>setTimeout(() => location.href = '$pagina', 1)</script>;";
    echo "<script>alert('$mensaje');</script>";
}

//---------------------------------------------------------------------------------------
//FUNCION PARA MOSTRAR MENSAJE DE CONFIRMACIÓN (tested!!)
//---------------------------------------------------------------------------------------
function mensajeConfirmacion($linkTrue,$mensaje,$linkFalse){
    echo
    "<script>  
        if (confirm('$mensaje')) {
            location.href = '$linkTrue'
        }else{
            location.href = '$linkFalse'
        }  
    </script>";
}

//---------------------------------------------------------------------------------------
//FUNCION PARA REALIZAR CONEXION CON BASE DE DATOS (tested!!)
//---------------------------------------------------------------------------------------
function conectarBd($server,$user,$pass,$bd){
    $conexion=new mysqli($server, $user, $pass , $bd);
    
    //evitamos errores por caractees especiales como la ñ o tildes (cotejamiento)
    $conexion->set_charset("utf8");

    //si la conexión falla muestra mensaje de error
    if(!$conexion){
        echo 'Error en la conexión';
    } else{
        echo 'Conexión exitosa';
    }

    return $conexion;
}

//---------------------------------------------------------------------------------------
//FUNCION PARA CONTAR LAS VENTAS TOTALES DE TODOS LOS REFERENTES
//---------------------------------------------------------------------------------------
function contarRegistros( $conexion, $tabla ) {
    $sql = "SELECT COUNT(*) as total FROM $tabla";
    $resultado = $conexion->query( $sql );
    $fila = $resultado->fetch_assoc();
    return $fila[ 'total' ];
}

//---------------------------------------------------------------------------------------
//FUNCION QUE DETERMINA LA MAYOR CANTIDAD DE VENTAS POR REFERENTE
//---------------------------------------------------------------------------------------
function mayorValorRegistrado ( $conexion, $userEmail ) {
    $consulta = 'SELECT COUNT(*) AS contador FROM Registro GROUP BY referidopor ORDER BY contador DESC LIMIT 1';
    $resultado = $conexion->query( $consulta );
    if ( $resultado->num_rows > 0 ) {
      $fila = $resultado->fetch_assoc();
      $maximo = $fila[ 'contador' ];
    } else {
      $maximo = 0;
    }
    $conexion->close();
    return $maximo;
  }









//---------------------------------------------------------------------------------------
//FUNCION PARA CONTAR LAS VENTAS DE UN USUARIO
//---------------------------------------------------------------------------------------

function cuentaVentas($referidopor){

    //realizamos la conexion a la base de datos
    include 'conexion.php';

    //contamos los registros que tengan el referido que se intenta registrar 
    $consultar= "SELECT COUNT(*) total FROM Registro where referidopor= '$referidopor'";       
         
    //guardamos el resultado de la consulta en la variable conteo
    $resultado=mysqli_query($conexion, $consultar);
    $fila = mysqli_fetch_assoc($resultado);
    $numVentas=intval($fila['total']);             //guardamos la cantidad de ventas que lleve
    return $numVentas;
}    

//---------------------------------------------------------------------------------------
//FUNCION QUE MUESTRA ERRORES DE VALIDACION DE REGISTRO DE USUARIOS
//---------------------------------------------------------------------------------------
function erroresValidacionDatos($conteoUsuario, $conteoReferente){
    if ($conteoUsuario == 1 && $conteoReferente == 0) {
        echo "<script>alert(`* El usuario ya existe!! \n* El Referente no Existe`)</script>";
        echo "<script>setTimeout(() => location.href = 'refrescos.php', 3)</script>;";
        $errores = 1;
    } elseif ($conteoUsuario == 1 && $conteoReferente == 1) {
        echo "<script>alert(`El usuario ya existe!!`)</script>";
        echo "<script>setTimeout(() => location.href = 'refrescos.php', 3)</script>;";
        $errores = 1;
    } elseif ($conteoUsuario == 0 && $conteoReferente == 0) {
        echo "<script>alert(`El Referente no Existe`)</script>";
        echo "<script>setTimeout(() => location.href = 'refrescos.php', 3)</script>;";
        $errores = 1;
    } else {
        $errores = 0;
    }
    return $errores;
}

//---------------------------------------------------------------------------------------
//FUNCION QUE INSERTA DATOS EN LAS TABLAS DE REGISTRO Y USUARIOS
//---------------------------------------------------------------------------------------
function insertarDatos($msg){
    include 'conexion.php';
    include 'datos.php';

    //Enviamos los datos del registro general a la tabla Registro
    $insertar = "INSERT INTO Registro(nombre,cedula,telefono,usuario,pass,referidopor) VALUES('$nombre','$cedula','$telefono','$usuario', '$pass', '$referidopor') ";

    //guardamos el resultado del envio en variable
    $resultado = mysqli_query($conexion, $insertar);

    //Enviamos los datos a la tabla usuarios
    $insertar = "INSERT INTO usuarios(usuario,pago) VALUES('$usuario','0') ";

    //guardamos el resultado del envio en variable
    $resultado = mysqli_query($conexion, $insertar);

    //si hubo envio exitoso, lo decimos
    if ($resultado) {

        //indicador de procedencia para realizar los refrescos (variable global de sesion )
        $_SESSION['opcionRefresco']=2;

        echo "<script>alert(`Registro Exitoso\nFelicidades por tu venta número $msg`)</script>";
        echo "<script>setTimeout(() => location.href = 'refrescos.php', 3)</script>";

    } else {
        echo
            "<script>
            alert('El registro ha fallado')
            window.location='../index.html';
            </script>";
    }
}

//---------------------------------------------------------------------------------------
//FUNCION QUE VALIDA LA EXISTENCIA DEL USUARIO
//---------------------------------------------------------------------------------------
function validaUsuario($usuario){
    //realizamos la conexion con el servidor
    include 'conexion.php';

    //contamos los registros que tengan el nombre usuario que se intenta registrar
    $consultar = "SELECT COUNT(*) total FROM Registro where usuario= '$usuario'";

    //guardamos el resultado de la consulta en la variable conteo
    $resultado = mysqli_query($conexion, $consultar);
    $fila = mysqli_fetch_assoc($resultado);
    $conteoUsuario = intval($fila['total']); //resultado de la validacion del usuario
    return $conteoUsuario;
}

//---------------------------------------------------------------------------------------
//FUNCION QUE VALIDA LA EXISTENCIA DEL REFERENTE
//---------------------------------------------------------------------------------------
function validaReferente($referidopor){
    //realizamos la conexion con el servidor
    include 'conexion.php';

    //contamos los registros que tengan el referido que se intenta registrar
    $consultar = "SELECT COUNT(*) total FROM usuarios where usuario= '$referidopor'";

    //guardamos el resultado de la consulta en la variable conteo
    $resultado = mysqli_query($conexion, $consultar);
    $fila = mysqli_fetch_assoc($resultado);
    $conteoReferente = intval($fila['total']); //resultado de la validacion del referernte
    return $conteoReferente;
}

//---------------------------------------------------------------------------------------
//FUNCION PARA INSERTAR (ACTUALIZAR) DATOS DE PAGO DEL CLIENTE
//---------------------------------------------------------------------------------------
function modificarDatos($conexion,$tabla,$campoModificar,$valorModificar,$campoReferencia,$valorReferencia){
 
    $sql = "UPDATE `".$tabla."` SET `".$campoModificar."`='$valorModificar' WHERE `".$campoReferencia."`='$valorReferencia'";
    if ($conexion->query($sql) === FALSE) {
        echo "Error actualizando datos: " . $conexion->error;
    }
    // else{
        
    //     mensaje('Datos Ingresados Correctamente', 'refrescos.php');
    // }
}

//------------------------------------------------------------------------------------------------------------
// FUNCION PARA GUARDAR EN VARIABLE EL DATO DE CAMPO DE UNA TABLA DE BASE DE DATOS DE ACUERDO A UNA CONDICION
//------------------------------------------------------------------------------------------------------------
function extraerDato($conexion,$campo,$tabla,$campoCondicion,$valorCondicion){
    //se consulta el link de pago de la tabla usuarios que coincida con el usuario
    $consulta = "SELECT `".$campo."` FROM `".$tabla."` WHERE `".$campoCondicion."`='$valorCondicion'" ;  

    //guardamos el resultado de la consulta en la variable resultados (arreglo)
    $resultados = mysqli_query($conexion, $consulta);

    //recorremos el arreglo para guardar los resultados  en la variable $valores
    while($valores = mysqli_fetch_array($resultados)){
        //extraemos el valor del campo deseado (linkRegistro) y lo gardamos en variable ($link)
        $link= $valores[$campo];
    }    
    //retornamos la variable con el resultado
    return $link;
}

//------------------------------------------------------------------------------------------------------------
// FUNCION QUE CALCULA EL NUMERO DE VENTAS A MOSTRAR LUEGO DE REALIZAR EL REGISTRO
//------------------------------------------------------------------------------------------------------------

function calcularVentas($numVentas){
    //incrementamos en 1 el valor de ventas leido(antes de registrar)
    $numVentas += 1;
    //si se ha llegado al tope de ventas(en este caso 10 por el modulo)   
    if($numVentas %10 == 0){
        //asignamos el valor maximo para ser mostrado(evitando que sea 0)
        $msg =10;
    }else{
        //si no se ha llegado al tope, se muestra el valor entregado por el modulo
        $msg = $numVentas % 10;
    }
    return $msg;
}