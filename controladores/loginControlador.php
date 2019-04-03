<?php
    if ($peticionAjax) {
        require_once('../modelos/loginModelo.php');
    } else {
        require_once('./modelos/loginModelo.php');
    }

class loginControlador extends loginModelo{

    public function iniciar_sesion_controlador(){

        $usuario=mainModel::limpiar_cadena($_POST['usuario']);
        $pass=mainModel::limpiar_cadena($_POST['pass']);
        $datosLogin=[
            'Usuario'=>$usuario,
            'Clave'=>$pass,
            'Estado'=>1
        ];

        $datosCuenta=loginModelo::iniciar_sesion_modelo($datosLogin);

        if($datosCuenta-> rowCount()==1){
           /* session_start(['name'=>'SRCP']);
            $url=SERVERURL."home";
            $urlLocation='<script> window.location="'.$url.'" </script>';
            return $urlLocation;*/
           $row=$datosCuenta->fetch();

            $fechaactual=date("Y-m-d");
            $yearActual=date("Y");
            $horaactual=date("h:i:s a");

            $consulta1=mainModel::ejecutar_consulta_simple("SELECT id FROM bitacora");
           

           $consulta2=mainModel::ejecutar_consulta_simple("SELECT * FROM cargo where idcargo=$row[idcargo]");
           $row2= $consulta2->fetch();

            $numero=($consulta1->rowCount())+1;
            $codigoB=mainModel::generar_codigo_aleatorio("CB", 7, $numero);
            $datosBitacora=[
                "Codigo"=>$codigoB,
                "Fecha"=>$fechaactual,
                "HoraInicio"=>$horaactual,
                "HoraFinal"=>"Sin registro",
                "Tipo"=>$row['permisos'],
               "Anio"=>$yearActual,
               "Cuenta"=>$row['codigousuario']

            ];
            $insertarBitacora=mainModel::guardar_bitacora($datosBitacora);
            if($insertarBitacora->rowCount()>=1){
                session_start(['name'=>'SRCP']);
                $_SESSION['id_usuario']=$row['idusuario'];
                $_SESSION['usuario_srcp']=$row['usuario_us'];
                $_SESSION['us_nombre']=$row['nombre_us'];
                $_SESSION['us_cargo']=$row2['puesto'];
                $_SESSION['sesioncurso']="libre";
                $_SESSION['curso']="libre";
                $_SESSION['codigocliente']="";
                $_SESSION['estadocliente']="";
                $_SESSION['cursover']=0;
               
                $_SESSION['privilegio_srcp']=$row['permisos'];
                $_SESSION['foto_srcp']=$row['foto_us'];
                $_SESSION['token_srcp']=md5(uniqid(mt_rand(),true));
                $_SESSION['codigo_srcp']=$row['codigousuario'];
                $_SESSION['codigo_bitacora_srcp']=$codigoB;

                //codigo para el control de usurios
                $_SESSION['controlusuario']="Sin codigo";


                $url=SERVERURL."home";
                 $urlLocation='<script> window.location="'.$url.'" </script>';
                return $urlLocation;
            }else{
                $error=$row['codigousuario'];
                return $error;
                    //alerta simple error 
                    //no hemos podido iniciar la session por problemas tecnicos
                    //por favor intente nuevamente
            }
        

        }
            else{
                $error='<script> function myFunction() {
                    alert("Usuario y contraseña Incorrecta");
                    
                  }
                  myFunction();
                   </script>';
                return $error;
                //alerta de que ocurrio un error inesperado
                //El nomnbre de usuario u contraseña no son correctos o su cuenta puede estar desabilitada
            }

    }

    public function forzar_cierre_sesion_controlador(){
        session_destroy();
        return header("Location: ".SERVERURL."login");
    }

    
    public function cerrar_sesion_controlador(){
        session_start(['name'=>'SRCP']);
        $token=mainModel::decryption($_GET['Token']);
        $hora=date("h:i:s a");

        $datos=[
            "Usuario"=>$_SESSION['codigo_srcp'],
             "Toket_S"=>$_SESSION['token_srcp'],
             "Token"=>$token,
             "Codigo"=> $_SESSION['codigo_bitacora_srcp'],
             "Hora"=>$hora
        ];
        //return "true";
        return loginModelo::cerrar_sesion_modelo($datos);
    }
    
}