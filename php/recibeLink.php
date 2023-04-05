<?php
    //se realiza una consulta a la tabla usuarios de base de datos MYSQL tucultur_Asociados
    //de la tabla se extrae el valor que exista en el campo link de un usuario referente determinado
    //el usuario a ser consultado se pasa por POST desde el formulario de envio de datos
    //una vez traido el dato correspondiente al estado de pago (1 o 0), se realizan acciones pertinentes
    //las acciones del caso se realizan a través de la invocación de una función
    //------------------------------------------------------------------------------------------------------------------
    //-------- Declaración de variables a utilizar
    //------------------------------------------------------------------------------------------------------------------
    $tipoPago="";
    $valor ="";
    //------------------------------------------------------------------------------------------------------------------
    //-------- Verificamos que se hayan enviado los datos (presionado el boton)
    //------------------------------------------------------------------------------------------------------------------
    if($_SERVER['REQUEST_METHOD']=='POST'){       //verificar si se presiono el boton enviar datos             
        
        if(isset($_POST['tipoPago']) && isset($_POST['referente'])){
            $tipoPago=$_POST['tipoPago'];
            $valor=strtolower($_POST['referente']);   //Guardamos en una variable el valor del placeholder que vamos a consultar 
            // echo $tipoPago . "<br />";
            // echo $valor;
        }
        include('conexion.php');                  //Realizamos la conexion a la base de datos
    //------------------------------------------------------------------------------------------------------------------
    //-------- Se verifica que no se haya dejado el campo del formulario sin llenar 
    //------------------------------------------------------------------------------------------------------------------   
        if(empty($valor) or empty($tipoPago)){
            echo alerta('Datos Incompletos !!', 10);
        }else{ 
     //------------------------------------------------------------------------------------------------------------------
    //-------- Se verifica que el usuario exista en la base de datos
    //------------------------------------------------------------------------------------------------------------------
            $sql = "SELECT(usuario) total FROM usuarios where usuario= '$valor'"; 
            $result = mysqli_query($conexion, $sql);  
            $fila = mysqli_fetch_assoc($result);      //estado =null indica que no existe el usuario en la base de datos 
            $estado = $fila['total'];               
            if($estado==null){                       // si el usuario no existe muestra mensaje y regresa al formulario
                echo alerta('El usuario no existe en la base de datos', 10);
            }else{                                   // si el usuario existe haga lo siguiente
                echo alerta('El usuario si existe en la base de datos, vamos a pagar', 10);
                if($tipoPago =='autor'){
                    header("location:https://biz.payulatam.com/L0c7d8fCD47F384");
                }elseif($tipoPago =='registro'){
                    include('conexion.php'); 
                    $sql = "SELECT(link) total FROM usuarios where usuario= '$valor'"; //consulta valor del campo pago segun usuario
                    $result = mysqli_query($conexion, $sql);            
                    $fila = mysqli_fetch_assoc($result);
                    $estado = $fila['total']; 
                    header("location:$estado");
                }elseif($tipoPago =='referente'){
                    include('conexion.php'); 
                    $sql = "SELECT(link25) total FROM usuarios where usuario= '$valor'"; //consulta valor del campo pago segun usuario
                    $result = mysqli_query($conexion, $sql);            
                    $fila = mysqli_fetch_assoc($result);
                    $estado = $fila['total']; 
                    header("location:$estado");
                }
            }
        }       
    } 
   //------------------------------------------------------------------------------------------------------------------
   //-------- funcion para mostrar mensajes de aceptación y rechazo
   //------------------------------------------------------------------------------------------------------------------
    function alerta($mensaje , $tiempo){                            //funcion recibe parametros
       $salida=                                                   //se guarda el resultado en variable
       "<script>
       alert('$mensaje');                                      
       setTimeout(() => location.href = 'recibeLink.php', $tiempo);
       </script>";
        return $salida;                                             //se retorna el resultado de la funcion
    }

    function traerLink($tipoPago){
        if($tipoPago == "registro" ){
            $campo="link";
        }else if($tipoPago == "referente"){
            $campo="link25";
        }
        include('conexion.php'); 
        $sql = "SELECT($campo) total FROM usuarios where usuario= '$valor'"; //consulta valor del campo pago segun usuario
        $result = mysqli_query($conexion, $sql);            
        $fila = mysqli_fetch_assoc($result);
        $estado = $fila['total'];                  //el valor del campo pago se guarda en la variable estado
        // $conexion->close();
        return $estado;
    }




    include('../vistas/pagosVista.php');      //traemos la vista del formulario
?>