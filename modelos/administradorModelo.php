<?php
if ($peticionAjax) {
    require_once('../core/mainModel.php');
} else {
    require_once('./core/mainModel.php');
}

class administradorModelo extends mainModel
{

    protected function agregar_administrador_modelo($datos)
    {
    
        $sql = self::conectar()->prepare("INSERT INTO 
        usuario(idcargo,codigousuario, nombre_us,  apellidos_us, correo_us, telefono_us, foto_us, usuario_us, pass_us, estado_us, permisos)
         VALUES(:Idcargo, :Codigo, :Nombre, :Apellidos, :Correo, :Telefono, :Foto, :Usuario, :Pass, :Estado, :Permiso)");
          $sql->bindParam(":Idcargo", $datos['Idcargo']);
          $sql->bindParam(":Codigo", $datos['Codigo']);
          $sql->bindParam(":Nombre", $datos['Nombre']);
          $sql->bindParam(":Apellidos", $datos['Apellidos']);
          $sql->bindParam(":Correo", $datos['Correo']);
          $sql->bindParam(":Telefono", $datos['Telefono']);
         
           $sql->bindParam(":Foto", $datos['Foto']);
           $sql->bindParam(":Usuario", $datos['Usuario']);
           $sql->bindParam(":Pass", $datos['Pass']);
           $sql->bindParam(":Estado", $datos['Estado']);
           $sql->bindParam(":Permiso", $datos['Permiso']);


        $sql->execute();
        return $sql;
    }


    
    protected function actualizar_administrador_modelo($datos)
    {
    
        $sql = self::conectar()->prepare("UPDATE usuario
        SET idcargo =:Idcargo, nombre_us=:Nombre,  apellidos_us=:Apellidos, correo_us=:Correo, telefono_us=:Telefono, 
        foto_us=:Foto, usuario_us=:Usuario, pass_us=:Pass, estado_us=:Estado, permisos=:Permiso WHERE codigousuario=:Codigo");
       
          $sql->bindParam(":Idcargo", $datos['Idcargo']);
          $sql->bindParam(":Codigo", $datos['Codigo']);
          $sql->bindParam(":Nombre", $datos['Nombre']);
          $sql->bindParam(":Apellidos", $datos['Apellidos']);
          $sql->bindParam(":Correo", $datos['Correo']);
          $sql->bindParam(":Telefono", $datos['Telefono']);
         
           $sql->bindParam(":Foto", $datos['Foto']);
           $sql->bindParam(":Usuario", $datos['Usuario']);
           $sql->bindParam(":Pass", $datos['Pass']);
           $sql->bindParam(":Estado", $datos['Estado']);
           $sql->bindParam(":Permiso", $datos['Permiso']);


        $sql->execute();
        return $sql;
    }

    protected function eliminar_usuario_modelo($datos)
    {
    
        $sql = self::conectar()->prepare("UPDATE usuario
        SET estado_us =:Estado
        WHERE codigousuario=:Codigo");
       
          $sql->bindParam(":Estado", $datos['Estado']);
          $sql->bindParam(":Codigo", $datos['Codigo']);
          
        $sql->execute();
        return $sql;
    }


}

