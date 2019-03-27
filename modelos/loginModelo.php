<?php
if ($peticionAjax) {
    require_once('../core/mainModel.php');
} else {
    require_once('./core/mainModel.php');
}

class loginModelo extends mainModel{
    
    protected function iniciar_sesion_modelo($datos){
        $sql=mainModel::conectar()->prepare("SELECT * FROM usuario
        WHERE usuario_us=:Usuario AND pass_us=:Clave AND estado_us=:Estado");
        $sql->bindParam(":Usuario",$datos['Usuario']);
        $sql->bindParam(":Clave",$datos['Clave']);
        $sql->bindParam(":Estado",$datos['Estado']);
        $sql->execute();
        return $sql;

    }
    protected function cerrar_sesion_modelo($datos){
        if($datos['Usuario']!="" /*&& $datos['Toket_S']==$datos['Token']*/){
            $Abitacora=mainModel::actualizar_bitacora($datos['Codigo'], $datos['Hora']);
           if ($Abitacora->rowCount()==1) {
               session_unset();
               session_destroy();
                $respuesta="true";
           } else {
            $respuesta="false";
           }
           
        }else{
            $respuesta="false";
        }
        return $respuesta;
    }
}