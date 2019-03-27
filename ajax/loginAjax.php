<?php
  $peticionAjax=true;
 require_once("../core/configgeneral.php");
//echo "probando al admin";

if(isset($_GET['Token'])){
   require_once('../controladores/loginControlador.php');
   $instanciaCerrar=new loginControlador();
   //echo "true";
   echo $instanciaCerrar->cerrar_sesion_controlador();

 }else{
    session_start();
    session_destroy();
    echo '<script> window.location.href="'.SERVERURL.'login" </script>';
 }
 
 /*require_once("../controladores/administradorControlador.php");
 $insAdmin= new administradorControlador();
 echo $insAdmin->agregar_administrador_controlador();*/