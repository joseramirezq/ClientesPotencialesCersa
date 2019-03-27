<?php


if ($peticionAjax) {
    require_once('../modelos/interesModelo.php');
} else {
    require_once('./modelos/interesModelo.php');
}

class interesControlador extends interesModelo
{

    public function actualizar_interes_controlador()
    {   
        session_start(['name'=>'SRCP']);
        $idinteres = mainModel::limpiar_cadena($_POST['idinteres']);
        $idespecialidad = mainModel::limpiar_cadena($_POST['idespecialidad']);
        $codigousuario = mainModel::limpiar_cadena($_POST['codigousuario']);
       // $codigocliente = mainModel::limpiar_cadena($_POST['codigocliente']);
        $estado = mainModel::limpiar_cadena($_POST['estado']);
        $fechanotificacion = mainModel::limpiar_cadena($_POST['fechanotificacion']);
        $descripcion = mainModel::limpiar_cadena($_POST['descripcion']);
        $fechaactual= date('Y-m-d H:i:s');
      //  $boucher = mainModel::limpiar_cadena($_POST['boucher']);
        
      
      //Datos para actualizar control de usuario 
      $codigocontrol=$_SESSION['controlusuario'];

        $datosControlUsuario = [
            "Codigo" => $codigocontrol,
            "Fechaactualfinal"=>$fechaactual
                 ];
        $actualizarcontrolusuario = mainModel::actualizar_control_usuario($datosControlUsuario);
        

        $datosCurso = [
            "Idinteres" => $idinteres,
            //"Idespecialidad" => $idespecialidad,
            "Codigousuario" => $codigousuario,
           // "Codigocliente" => $codigocliente,
            "Estado" => $estado,
            "Fechanotificacion" => $fechanotificacion,
            "Fechaactual"=>$fechaactual,
            "Descripcion" => $descripcion
          // "Baucher" => $boucher
          

        ];
        $actualizarinteres = interesModelo::actualizar_interes_modelo($datosCurso);
        
        //if($actualizarinteres->rowCount()>=1){
                 
            $direccion=SERVERURL."sesioncurso";
            header('location:'.$direccion);
        //}else{
         //   $a= "<script>console.log( 'No insertado' );</script>";
        //}
    }
 }