<?php

if ($peticionAjax) {
    require_once('../core/configApp.php');
} else {
    require_once('./core/configApp.php');
}
class mainModel
{

    protected function conectar()
    {
        $enlace = new PDO(SGBD, USER, PASS);
        return $enlace;
    }
    protected function ejecutar_consulta_simple($consulta)
    {
        $respuesta=self::conectar()->prepare($consulta);
        $respuesta->execute();
        return $respuesta;
     }

     //crear cuentas /usuarios
     protected function agregar_cuenta($datos){
        $sql=self::conectar()->prepare("INSERT INTO 
        usuario(idcargo, nombre_us, apellidos_us, correo_us, telefono_us ,foto_us, usuario_us, pass_us, estado_us)
         VALUES(:Idcargo,:Nombre,:Apellidos, :Correo, :Telefono, :Foto, :Usuario, :Pass, :Estado)");

         $sql->bindParam(":Idcargo",$datos['Idcargo']);
         $sql->bindParam(":Nombre",$datos['Nombre']);
         $sql->bindParam(":Apellidos",$datos['Apellidos']);
         $sql->bindParam(":Correo",$datos['Correo']);
         $sql->bindParam(":Telefono",$datos['Telefono']);
         $sql->bindParam(":Foto",$datos['Foto']);
         $sql->bindParam(":Usuario",$datos['Usuario']);
         $sql->bindParam(":Pass",$datos['Pass']);
         $sql->bindParam(":Estado",$datos['Estado']);

         $sql->execute();
         return $sql;
        
     }
     //eliminar cuenta
     protected function eliminar_cuenta($codigo){
         $sql=self::conectar()->prepare("DELETE FROM usuario WHERE idusuario=:Idusuario");
          $sql->bindParam("Idusuario",$codigo);
         $sql->execute();
         return $sql;

     }

     //tablas de insercion y eliminacion que se utilizaran en otras modelos
     //inicio
     //inicio

     //tabla cliente
     protected function agregar_cliente($datos){
        $sql=self::conectar()->prepare("INSERT INTO 
        cliente(nombres_cli, apellidos_cli, correo_cli, telefono_cli, profesion_cli, grado_cli, pais_cli, departamento_cli, distrito_cli, direccion_cli)
        VALUES(:Nombre, :Apellidos, :Correo, :Telefono, :Profesion, :Grado, :Pais, :Departamento, :Distrito, :Direccion)");
        $sql->bindParam(":Nombre",$datos['Nombre']);
        $sql->bindParam(":Apellidos",$datos['Apellidos']);
        $sql->bindParam(":Correo",$datos['Correo']);
        $sql->bindParam(":Telefono",$datos['Telefono']);
        $sql->bindParam(":Profesion",$datos['Profesion']);
        $sql->bindParam(":Grado",$datos['Grado']);
        $sql->bindParam(":Pais",$datos['Pais']);
        $sql->bindParam(":Departamento",$datos['Departamento']);
        $sql->bindParam(":Distrito",$datos['Distrito']);
        $sql->bindParam(":Direcccion",$datos['Direccion']);

        $sql->execute();
        return $sql;
     }
     protected function eliminar_cliente($codigo){
         $sql=self::conectar()->prepare("DELETE FROM cliente WHERE idcliente=:Idcliente");
         $sql->bindParam("Idcliente",$codigo);
         $sql->execute();
         return $sql;

     }

     //tabla curso 
     protected function agregar_especialidad($datos){
         $sql=self::conectar()->prepare("INSERT INTO 
         especialidad(idcategoria, nombre_es, descripcion_es, duracion_es, fecha_inicio, fecha_fin , horas_certificado, costo_matricula, costo_certi, costo_alternativo)
         VALUES(:Idcategoria, :Nombre, :Descripcion, :Duracion , :FechaI, :FechaF, :Horascerti, :Costomatricula, :Costocerti, :Costoalternativo )");
         $sql->bindParam(":Idcategoria",$datos['Idcategoria']);
         $sql->bindParam(":Nombre",$datos['Nombre']);
         $sql->bindParam(":Descripcion",$datos['Descripcion']);
         $sql->bindParam(":Duracion",$datos['Duracion']);
         $sql->bindParam(":FechaI",$datos['FechaI']);
         $sql->bindParam(":FechaF",$datos['FechaF']);
         $sql->bindParam(":Horascerti",$datos['Horascerti']);
         $sql->bindParam(":Costomatricula",$datos['Costomatricula']);
         $sql->bindParam(":Costocerti",$datos['Costocerti']);
         $sql->bindParam(":Costoalternativo",$datos['Costoalternativo']);

         $sql->execute();
         return $sql;
     }

     protected function eliminar_especialidad($codigo){
        $sql=self::conectar()->prepare("DELETE FROM especilidad WHERE idespecilidad=:Idespecialidad");
        $sql->bindParam(":Idespecialidad", $codigo);
        $sql->execute();
        return $sql;
     }

     //tabla interes //la mas grande de todas las tablas xd
     
     protected function agregar_interes($datos){
        $sql=self::conectar()->prepare("INSERT INTO 
        interes(idestado, idusuario, idespecialidad, idcliente, descri_estado, fecha_notificacion)
        VALUES(:Idestado, :Idusuario, :Idespecialiad, :Idcliente, :Descripcion, :Fechanotificacion)");
        $sql->bindParam(":Idestado",$datos['Idestado']);
        $sql->bindParam(":Idusuario",$datos['Idusuario']);
        $sql->bindParam(":Idespecialidad",$datos['Idespecialidad']);
        $sql->bindParam(":Idcliente",$datos['Idcliente']);
        $sql->bindParam(":Descripcion",$datos['Descripcion']);
        $sql->bindParam(":Fechanotificacion",$datos['Fechanotificacion']);
        
        $sql->execute();
        return $sql;
     }
     protected function eliminar_interes($datos){
         $sql=self::conectar()->prepare("DELETE FROM interes WHERE idinteres=:Idinteres");
         $sql->execute();
         return $sql;
     }

     //tablas opcionales

     //tabla cargo
     protected function eliminar_cargo($codigo){
         $sql=self::conectar()->prepare("DELETE FROM cargo WHERE idcargo=:Idcargo");
         $sql->bindParam(":Idcargo",$codigo);
         $sql->execute();
         return $sql;

     }
     //tabla categoria
     protected function eliminar_categoria($codigo){
         $sql=self::conectar()->prepare("DELETE FROM categoria WHERE idcategoria=:Idcategoria");
         $sql->bindParam("Idcategoria",$codigo);
         $sql->execute();
         return $sql;
   
     }
     //estado
     protected function eliminar_estado($codigo){
         $sql=self::conectar()->prepare("DELETE FROM estado WHERE idestado=:Idestado");
         $sql->bindParam("Idestado",$codigo);
         $sql->execute();
         return $sql;

     }

     //fin de tablas para otros modelos 
     //fin
     //fin 



     //funcion bitacora
     protected function guardar_bitacora($datos){
        $sql=self::conectar()->prepare("INSERT INTO
         bitacora(BitacoraCodigo, BitacoraFecha, BitacoraHoraInicio, BitacoraHoraFinal, BitacoraTipo, BitacoraYear, CuentaCodigo )
         values(:Codigo, :Fecha, :HoraInicio, :HoraFinal, :Tipo, :Anio, :Cuenta)");
         $sql->bindParam(":Codigo",$datos['Codigo']);
         $sql->bindParam(":Fecha",$datos['Fecha']);
         $sql->bindParam(":HoraInicio",$datos['HoraInicio']);
         $sql->bindParam(":HoraFinal",$datos['HoraFinal']);
         $sql->bindParam(":Tipo",$datos['Tipo']);
         $sql->bindParam(":Anio",$datos['Anio']);
         $sql->bindParam(":Cuenta",$datos['Cuenta']);
         $sql->execute();
         return $sql;
       }

        //funcion guardar controlusuario
     protected function guardar_control_usuario($datos){
        $sql=self::conectar()->prepare("INSERT INTO
         controlusuario(codigocontrol, codigousuario, fecha_inicio, fecha_fin, fecha, codigointeres)
         values(:Codigocontrol, :Codigousuario, :Fechainicio, :Fechafin, :Fecha, :Idinteres)");
         $sql->bindParam(":Codigocontrol",$datos['Codigocontrol']);
         $sql->bindParam(":Codigousuario",$datos['Codigousuario']);
         $sql->bindParam(":Fechainicio",$datos['Fechainicio']);
         $sql->bindParam(":Fechafin",$datos['Fechafin']);
         $sql->bindParam(":Fecha",$datos['Fecha']);
         $sql->bindParam(":Idinteres",$datos['Idinteres']);
         
         $sql->execute();
         return $sql;
       }


       //funccion actualizar bitacora
       protected function actualizar_bitacora($codigo,$hora){
        $sql=self::conectar()->prepare("UPDATE bitacora SET BitacoraHoraFinal=:Hora WHERE 	BitacoraCodigo=:Codigo");
        $sql->bindParam(":Hora",$hora);
        $sql->bindParam(":Codigo",$codigo);
         $sql->execute();
         return $sql;
    }

       //funccion actualizar control usuario
       protected function actualizar_control_usuario($datos){
        $sql=self::conectar()->prepare("UPDATE controlusuario SET fecha_fin=:Fechaactualfinal WHERE codigocontrol=:Codigo");
        $sql->bindParam(":Codigo",$datos['Codigo']);
        $sql->bindParam(":Fechaactualfinal",$datos['Fechaactualfinal']);
         $sql->execute();
         return $sql;
    }

    protected function actualizar_curso_sesion($usuario,$curso){
        $sql=self::conectar()->prepare("UPDATE especialidad SET sesion=:Usuario WHERE 	idespecialidad=:Curso");
        $sql->bindParam(":Usuario",$usuario);
        $sql->bindParam(":Curso",$curso);
         $sql->execute();
         return $sql;
    }

    protected function actualizar_cerrar_curso_sesion($curso){
        $sql=self::conectar()->prepare("UPDATE especialidad SET sesion='0' WHERE 	idespecialidad=:Curso");
       
        $sql->bindParam(":Curso",$curso);
         $sql->execute();
         return $sql;
    }
  

    // funccion eliminar bitacora
    protected function eliminar_bitacora($codigo){
        $sql=self::conectar()->prepare("DELETE FROM bitacora WHERE CuentaCodigo=:Cuenta");
        $sql->bindParam(":Cuenta",$codigo);
        $sql->execute();
        return $sql;
    }



     //encriptacion de el suario
     public static function encryption($string){
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }
    public static function decryption($string){
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    protected function generar_codigo_aleatorio($letra, $longitud, $num){
        for($i=1;$i<=$longitud;$i++){
            $numero=rand(0,9);
            $letra.=$numero;
        }
        return $letra.$num;
    }
    protected function limpiar_cadena($cadena){
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena); //elimina los eslashes
        $cadena=str_ireplace("<script>","",$cadena); //remplaza valor  por el segundo valor een este caso vacio y al final tielo que quieres que se enliempie
        $cadena=str_ireplace("</script>","",$cadena);
        $cadena=str_ireplace("<script src>","",$cadena);
        $cadena=str_ireplace("<script type=>","",$cadena);
        $cadena=str_ireplace("SELECT * FROM","",$cadena);
        $cadena=str_ireplace("DELETE FROM","",$cadena);
        $cadena=str_ireplace("INSERT INTO","",$cadena);
        $cadena=str_ireplace("_ _","",$cadena);
        $cadena=str_ireplace("^","",$cadena);
        $cadena=str_ireplace("[","",$cadena);
        $cadena=str_ireplace("]","",$cadena);
        $cadena=str_ireplace("==","",$cadena);
        $cadena=str_ireplace(";","",$cadena);

        return $cadena;
    }

    protected function sweet_alert($datos){
        if($datos['Alerta']=="simple"){
           $alerta="
           <script>
             swal(
                    '".$datos['Titulo']."',
                    '".$datos['Texto']."',
                    '".$datos['Tipo']."'
             );
            </script>
            ";
        }else if($datos['Alerta']=="recargar"){

            $alerta="
            <script>
                swal({
                    title: '".$datos['Titulo']."',
                    text: '".$datos['Texto']."',
                    type:  '".$datos['Tipo']."',
                    confirmButtonText: 'Aceptar'
                }).then(function(){
                   location.reload();
                });
            </script>
            ";

        }
        elseif($datos['Alerta']=="limpiar"){

            $alerta="
            <script>
                swal({
                    title: '".$datos['Titulo']."',
                    text: '".$datos['Texto']."',
                    type:  '".$datos['Tipo']."',
                    confirmButtonText: 'Aceptar'
                }).then(function(){
                   $('.FormularioAjax')[0].reset();
                });
            </script>
            ";

        }
        return $alerta;
    }
}

