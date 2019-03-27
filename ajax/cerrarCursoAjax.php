<?php
  $peticionAjax=true;
 require_once("../core/configgeneral.php");
//echo "probando al admin";

if(isset($_GET['Especialidad'])){
   require_once('../controladores/cursoControlador.php');
   $instanciaS=new cursoControlador();
   //echo "true";
   echo $instanciaS->cerrar_sesion_curso();

 }else{
    session_start();
    session_destroy();
    echo '<script> window.location.href="'.SERVERURL.'login" </script>';
 }
 
 /*require_once("../controladores/administradorControlador.php");
 $insAdmin= new administradorControlador();
 echo $insAdmin->agregar_administrador_controlador();*/