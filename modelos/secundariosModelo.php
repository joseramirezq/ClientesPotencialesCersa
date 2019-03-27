<?php
if ($peticionAjax) {
    require_once('../core/mainModel.php');
} else {
    require_once('./core/mainModel.php');
}

class secundariosModelo extends mainModel
{
    //agregar estado modelo
    protected function agregar_estados_modelo($datos)
    {
    
        $sql=self::conectar()->prepare("INSERT INTO 
        estado(codigoestado, nombre_estado, descri_estado, color, estado_actual)
        VALUES(:Codigo, :Nombre, :Descripcion, :Color, :Estado)");
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Descripcion", $datos['Descripcion']);
        $sql->bindParam(":Color", $datos['Color']);
        $sql->bindParam(":Codigo", $datos['Codigo']);
        $sql->bindParam(":Estado", $datos['Estado']);
        $sql->execute();
        return $sql;
    }

    //actulizar estado modelo
    protected function actualizar_estados_modelo($datos)
    {   $sql=self::conectar()->prepare("UPDATE estado  SET nombre_estado=:Nombre, descri_estado=:Descripcion, color=:Color WHERE codigoestado=:Codigo");
    
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Descripcion", $datos['Descripcion']);
        $sql->bindParam(":Color", $datos['Color']);
        $sql->bindParam(":Codigo", $datos['Codigo']);
     
        $sql->execute();
        return $sql;
    }

    //eliminar estado modelo
    
     protected function eliminar_estados_modelo($datos)
     {   $sql=self::conectar()->prepare("UPDATE estado  SET estado_actual=:Estado WHERE codigoestado=:Codigo");
     
        $sql->bindParam(":Estado", $datos['Estado']);
         $sql->bindParam(":Codigo", $datos['Codigo']);
      
         $sql->execute();
         return $sql;
     }
 


    protected function agregar_categoria_modelo($datos)
    {
    
        $sql=self::conectar()->prepare("INSERT INTO
        categoria(codigocat, nombre_cat, descripcion_cat, estado_actual)
        VALUES(:Codigo, :Nombre, :Descripcion, :Estado)");
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Descripcion", $datos['Descripcion']);
        $sql->bindParam(":Codigo", $datos['Codigo']);
        $sql->bindParam(":Estado", $datos['Estado']);
        $sql->execute();
       return $sql;
    }

    protected function agregar_permiso_modelo($datos)
    {
        $sql=self::conectar()->prepare("INSERT INTO 
        cargo(codigocargo, puesto, descripcion, estado_actual)
        VALUES(:Codigo, :Puesto, :Descripcion, :Estado)");
        $sql->bindParam(":Puesto",$datos['Puesto']);
        $sql->bindParam(":Descripcion",$datos['Descripcion']);
        $sql->bindParam(":Codigo", $datos['Codigo']);
        $sql->bindParam(":Estado", $datos['Estado']);
        $sql->execute();
        return $sql;
    }

    protected function leer_estados_modelo($datos){

    }
}

