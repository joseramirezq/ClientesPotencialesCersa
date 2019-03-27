<?php
  $peticionAjax=true;
 require_once("../core/configgeneral.php");
//echo "probando al admin";
require_once("../controladores/secundariosControlador.php");
  //INSTANCIOAMOS LA CLASE//
  $instancia= new secundariosControlador();
//ESTADOS
if(isset($_POST['insertar_estados'])){
    //valida los campos requeridos
     if(isset($_POST['nombre'])){
        echo $instancia->agregar_estados_controlador();
             
     }else{

     }

//CATEGORIA
 }else if(isset($_POST['insertar_categoria'])){

   //valida los campos requeridos
    if(isset($_POST['nombre_cat'])){
       echo $instancia->agregar_categoria_controlador();
    }else{

    }

  //PERMISO
 }else if(isset($_POST['insertar_permiso'])){
    //valida los campos requeridos
     if(isset($_POST['puesto'])){
       // echo "llego gasta aqui";
      echo $instancia->agregar_permiso_controlador();
     }else{

     }
//ENVIAR AL LOGIN
 }else if(isset($_POST['actualizar_estados'])){
  
   //valida los campos requeridos
   if(isset($_POST['codigo'])){
      //echo "llego gasta aqui";
     echo $instancia->actualizar_estados_controlador();
   }else{

   }
 }
   else if(isset($_POST['elimnar_estados'])){
      echo $instancia->eliminar_estados_controlador();
   }
   else
   {
    session_start();
    session_destroy();
    echo '<script> window.location.href="'.SERVERURL.'login" </script>';
 }
 
 /*require_once("../controladores/administradorControlador.php");
 $insAdmin= new administradorControlador();
 echo $insAdmin->agregar_administrador_controlador();*/