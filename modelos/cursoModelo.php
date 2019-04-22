<?php
if ($peticionAjax) {
    require_once('../core/mainModel.php');
} else {
    require_once('./core/mainModel.php');
}

class cursoModelo  extends mainModel
{
    protected function agregar_curso_modelo($datos)
    {

        /*$sql = self::conectar()->prepare("INSERT INTO 
        especialidad(idcategoria, nombre_es, descripcion_es, duracion_es)
        VALUES(:Categoria, :Nombre, :Descripcion, :Duracion)");*/

        $sql = self::conectar()->prepare("INSERT INTO 
        especialidad(idcategoria, nombre_es, descripcion_es, duracion_es, fecha_inicio, fecha_fin ,
        horas_certificado, costo_matricula, costo_certi, costo_alternativo, horario, docente, modalidad, sesion)
        VALUES(:Categoria, :Nombre, :Descripcion, :Duracion , :FechaI, :FechaF, :Horascerti, :Costomatricula,
        :Costocerti, :Costoalternativo, :Horario, :Docente, :Modalidad, :Sesion )");

       

        $sql->bindParam(":Categoria", $datos['Categoria']);
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Descripcion", $datos['Descripcion']);
       $sql->bindParam(":Duracion", $datos['Duracion']);
        $sql->bindParam(":FechaI", $datos['FechaI']);
        $sql->bindParam(":FechaF", $datos['FechaF']);
        $sql->bindParam(":Horascerti", $datos['Horascerti']);
        $sql->bindParam(":Costomatricula", $datos['Costomatricula']);
        $sql->bindParam(":Costocerti", $datos['Costocerti']);
        $sql->bindParam(":Costoalternativo", $datos['Costoalternativo']);
        $sql->bindParam(":Horario", $datos['Horario']);
        $sql->bindParam(":Docente", $datos['Docente']);
        $sql->bindParam(":Modalidad", $datos['Modalidad']);
        $sql->bindParam(":Sesion", $datos['Sesion']);



        $sql->execute();
        return $sql;
    }

    protected function actualizar_curso_modelo($datos)
    {   $sql=self::conectar()->prepare("UPDATE especialidad  SET
        idcategoria=:Categoria, nombre_es=:Nombre, descripcion_es=:Descripcion, duracion_es=:Duracion,
        fecha_inicio=:FechaI, fecha_fin=:FechaF,horas_certificado=:Horascerti, costo_matricula=:Costomatricula,
         costo_certi=:Costocerti, costo_alternativo=:Costoalternativo, horario=:Horario, docente=:Docente, 
         modalidad=:Modalidad WHERE idespecialidad=:Idespecialidad");
    
        $sql->bindParam(":Idespecialidad", $datos['Idespecialidad']);
        $sql->bindParam(":Categoria", $datos['Categoria']);
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Descripcion", $datos['Descripcion']);
       $sql->bindParam(":Duracion", $datos['Duracion']);
        $sql->bindParam(":FechaI", $datos['FechaI']);
        $sql->bindParam(":FechaF", $datos['FechaF']);
        $sql->bindParam(":Horascerti", $datos['Horascerti']);
        $sql->bindParam(":Costomatricula", $datos['Costomatricula']);
        $sql->bindParam(":Costocerti", $datos['Costocerti']);
        $sql->bindParam(":Costoalternativo", $datos['Costoalternativo']);
        $sql->bindParam(":Horario", $datos['Horario']);
        $sql->bindParam(":Docente", $datos['Docente']);
        $sql->bindParam(":Modalidad", $datos['Modalidad']);

        $sql->execute();
        return $sql;
    }

    protected function eliminar_curso_modelo($datos)
    {   $sql=self::conectar()->prepare("UPDATE especialidad  SET
        estado_actual=:Estadoactual WHERE idespecialidad=:Idespecialidad");
    
        $sql->bindParam(":Idespecialidad", $datos['Idespecialidad']);
        $sql->bindParam(":Estadoactual", $datos['Estadoactual']);
   

        $sql->execute();
        return $sql;
    }

    protected function cambiar_estado_correos($datos)
    {   
       
        //$total= $datos['Total'];
        $Idespecialidad= $datos;
        
      
        $sql=self::conectar()->prepare("UPDATE interes SET
        envio_correo=1 WHERE envio_correo=0 AND idespecialidad=$Idespecialidad");

       
      ;
   

        $sql->execute();
        return $sql;
    }

    protected function agregar_sesion_curso_modelo($datos){

        $sql=self::conectar()->prepare("UPDATE especialidad SET sesion=:Usuario WHERE idespecialidad=:Curso");
    
        $sql->bindParam(":Usuario", $datos['Codigusuario']);
        $sql->bindParam(":Curso", $datos['Codigocurso']);
         $sql->execute();
         
         return $sql;
       
    
   }

   protected function cerrar_sesion_curso_modelo($datos){

    $sql=self::conectar()->prepare("UPDATE especialidad SET sesion='disponible' WHERE idespecialidad=:Codigocurso");
  
    $sql->bindParam(":Codigocurso", $datos['Codigocursoc']);
     $sql->execute();
     
     return $sql;
   

}

   /* protected function cerrar_sesion_curso_modelo($datos){
        
        $SesionMain=mainModel::actualizar_cerrar_curso_sesion( $datos['Curso']);
     if ($SesionMain->rowCount()==1) {
               $_SESSION['sesioncurso']="libre";
               $_SESSION['curso']= "libre";
               $respuesta="true";
          } else {
           $respuesta="false";
          }
          
     
       return $respuesta;
   }*/
}

