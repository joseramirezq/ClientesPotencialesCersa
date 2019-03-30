<?php
  $peticionAjax=true;
 require_once("../core/configgeneral.php");
//echo "probando al admin";

if(isset($_POST['insertarusuario'])){
     require_once("../controladores/administradorControlador.php");
     
     //INSTANCIOAMOS LA CLASE//
     $insAdmin= new administradorControlador();
    //valida los campos requeridos
     if(isset($_POST['cargo']) && isset($_POST['nombre'])&& isset($_POST['apellidos'])){
        echo $insAdmin->agregar_administrador_controlador();
     }else{

     }


 }else if(isset($_POST['editarusuario'])){

   require_once("../controladores/administradorControlador.php");
     
   //INSTANCIOAMOS LA CLASE//
   $insAdmin= new administradorControlador();
  //valida los campos requeridos
   if(isset($_POST['cargo']) && isset($_POST['nombre'])&& isset($_POST['apellidos'])){
      echo $insAdmin->editar_administrador_controlador();
   }else{

   }


 }
 else if(isset($_POST['eliminar_usuario'])){

   require_once("../controladores/administradorControlador.php");
     
   //INSTANCIOAMOS LA CLASE//
   $insAdmin= new administradorControlador();
  //valida los campos requeridos
   if(isset($_POST['codigo'])){
      echo $insAdmin->eliminar_administrador_controlador();
   }

 }
   else{
    session_start();
    session_destroy();
    echo '<script> window.location.href="'.SERVERURL.'login" </script>';
 }
 
 /*require_once("../controladores/administradorControlador.php");
 $insAdmin= new administradorControlador();
 echo $insAdmin->agregar_administrador_controlador();*/