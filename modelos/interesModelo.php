<?php
if ($peticionAjax) {
    require_once('../core/mainModel.php');
} else {
    require_once('./core/mainModel.php');
}

class interesModelo extends mainModel
{

  //  protected function agregar_interes_modelo($datos)
//{
    
   //     $sql=self::conectar()->prepare("INSERT INTO 
     //   interes(idestado, idusuario/*, idespecialidad, codigocliente, descri_estado*/)
       // VALUES(:Estado, :Usuario/*, :Curso, :Cliente, :Descripcion*/)");
        //$sql->bindParam(":Estado",$datos['Estado']);
        //$sql->bindParam(":Usuario",$datos['Usuario']);
       /* $sql->bindParam(":Curso",$datos['Curso']);
        $sql->bindParam(":Cliente",$datos['Cliente']);
        $sql->bindParam(":Descripcion",$datos['Descripcion']);*/
        
        
       // $sql->execute();
        //return $sql;
   // }


   protected function actualizar_interes_modelo($datos)
    {
    
       // $sql=self::conectar()->prepare("UPDATE 
        //interes SET  idusuario=:Codigousuario, idestado=:Estado, fecha_notificacion=:Fechanotificacion, descri_estado=:Descripcion
       // WHERE idinteres=:Idinteres ");

        $sql=self::conectar()->prepare("UPDATE 
        interes SET  idestado=:Estado, descri_estado=:Descripcion, fecha_notificacion=:Fechanotificacion, 	fecha_cambio_estado=:Fechaactual 
        WHERE idinteres=:Idinteres ");


      
        $sql->bindParam(":Idinteres", $datos['Idinteres']);
       // $sql->bindParam(":Idespecialidad",$datos['Idespecialidad']);
       // $sql->bindParam(":Codigousuario", $datos['Codigousuario']);
        //$sql->bindParam(":Codigocliente",$datos['Codigocliente']);
        $sql->bindParam(":Estado" ,$datos['Estado']);
        $sql->bindParam(":Fechanotificacion", $datos['Fechanotificacion']);
        $sql->bindParam(":Fechaactual", $datos['Fechaactual']);
        
       $sql->bindParam(":Descripcion", $datos['Descripcion']);
      //  $sql->bindParam(":Baucher",$datos['Baucher']);
        
        
        
        $sql->execute();
       return $sql;
    }
}

