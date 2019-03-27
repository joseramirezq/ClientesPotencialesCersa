<?php
  $peticionAjax=true;
 require_once("../core/configgeneral.php");
//echo "probando al admin";

if(isset($_POST['nombre'])){
     require_once("../controladores/administradorControlador.php");
     
     //INSTANCIOAMOS LA CLASE//
     $insAdmin= new administradorControlador();
    //valida los campos requeridos
     if(isset($_POST['cargo']) && isset($_POST['nombre'])&& isset($_POST['apellidos'])){
        echo $insAdmin->agregar_administrador_controlador();
     }else{

     }


 }else{
    session_start();
    session_destroy();
    echo '<script> window.location.href="'.SERVERURL.'login" </script>';
 }
 
 /*require_once("../controladores/administradorControlador.php");
 $insAdmin= new administradorControlador();
 echo $insAdmin->agregar_administrador_controlador();*/