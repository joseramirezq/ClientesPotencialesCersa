<?php
  $peticionAjax=true;
 require_once("../core/configgeneral.php");
//echo "probando al admin";

if(isset($_GET['Curso'])){
   require_once('../controladores/cursoControlador.php');
   $instanciaSesionCurso=new cursoControlador();
   //echo "true";
   echo $instanciaSesionCurso->iniciar_sesion_curso();

 }else{
    session_start();
    session_destroy();
    echo '<script> window.location.href="'.SERVERURL.'login" </script>';
 }
 
 /*require_once("../controladores/administradorControlador.php");
 $insAdmin= new administradorControlador();
 echo $insAdmin->agregar_administrador_controlador();*/