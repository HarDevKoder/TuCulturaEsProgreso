<?php
    //iniciamops sesion
    session_start();

    //incluimos archivo de funciones
    include 'funciones.php';

    //indicador de procedencia para realizar los refrescos (variable global de sesion )
    $_SESSION['opcionRefresco']=1;

        //Esperamos a que se presione el botón de consulta
        if (isset($_POST['consultarEstado'])) {

            //realizar la conexion con la base de datos
            $conexion = conectarBD('190.8.176.115','tucultur_Administrador','Hdv080272*','tucultur_Asociados');

           //incluimos los datos enviados por medio del formulario
           include 'datos.php';

            //se crea variable de sesion para almacenar el nombre del referente
           $_SESSION['referentePagosCheck']=$referidopor;

            //verificamos que el referente si exista
            $check=validaReferente($referidopor);  //function
            if($check==0){
                mensaje('El referente No existe!!','pagosCheck.php');
            }else{
                //cuenta las ventas del referente
                 $ventas=cuentaVentas($referidopor); //function (extraer ventas acumuladas)

                //en caso de no tener ventas lo habilita para realizar la primero (evita 0 mod 5=0)
                if($ventas == 0){
                    //habilita al referente para realizar su primera venta (caso especial)
                    modificarDatos($conexion,'usuarios','pago','1','usuario',$referidopor); //function
                }

                //verifico si el referente esta al dia con los pagos desde la base de datos
                $estadoPago = extraerDato($conexion,'pago','usuarios','usuario',$referidopor); //function

                //si se alcanzo el tope de ventas se bloquea al usuario en la bd (colocar pago=1)
                if($ventas%5 == 0 && $estadoPago == "0"){
                    //solo se puede pagar referente y autor, no registro
                    //con variable superglobal para ocultar opciones de pago en el formulario pagosVista2
                    $_SESSION['habilitaPago']=1; 

                    //se pide confirmación para realizar pagos y permitir el registro de usuarios           
                    mensaje('Se ha Alcanzado el Top de 5 ventas\nNo se puede Registrar mas!','pagosCheck.php');
                }else{
                    //solo se puede pagar registro, no referente ni autor
                    //con variable superglobal para ocultar opciones de pago en el formulario pagosVista2
                    $_SESSION['habilitaPago']=0;  

                    //habilita al referente para volver a registrar desps de haber pagado (caso especial)
                    modificarDatos($conexion,'usuarios','pago','0','usuario',$referidopor);

                    //si no ha alcanzado el tope de ventas proseguir a pagar
                    header("location:pagosOpciones.php");
                }  
            }
        }    
include '../vistas/pagosVista1.php';
?>