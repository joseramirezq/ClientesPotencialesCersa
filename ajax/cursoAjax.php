<?php
 $peticionAjax=true;
 require_once("../core/configgeneral.php");
//echo "probando al admin";
if(isset($_POST['ocuparcurso'])){
   require_once("../controladores/cursoControlador.php");
   
   //INSTANCIOAMOS LA CLASE
   $instanciaCurso= new cursoControlador();
   echo  $instanciaCurso->mostrar_sesion2_cursos_controlador();
  
}else

if(isset($_POST['cerrarcurso'])){
   require_once("../controladores/cursoControlador.php");
   
   //INSTANCIOAMOS LA CLASE
   $instanciaCursoCerrar= new cursoControlador();
   echo  $instanciaCursoCerrar->cerrar_cursos2_controlador();
  
}else if(isset($_POST['verinfocurso'])){
   require_once("../controladores/cursoControlador.php");
   
   //INSTANCIOAMOS LA CLASE
   $instanciaCurso= new cursoControlador();
   echo  $instanciaCurso->ver_curso_controlador();
  
}

else if(isset($_POST['agregarcursobd'])){
     require_once("../controladores/cursoControlador.php");
     
     //INSTANCIOAMOS LA CLASE
     $instanciaCurso= new cursoControlador();
    //valida los campos requeridos
     if(isset($_POST['nombre'])){
        echo  $instanciaCurso->agregar_curso_controlador();
     }else{

     }

 }else if(isset($_POST['actualizarcurso'])){

   require_once("../controladores/cursoControlador.php");
     
   //INSTANCIOAMOS LA CLASE
   $instanciaCurso= new cursoControlador();
  //valida los campos requeridos
   if(isset($_POST['nombre'])){
      echo  $instanciaCurso->actualizar_curso_controlador();
   }else{

   }

 }

 else if(isset($_POST['eliminar_curso'])){

   require_once("../controladores/cursoControlador.php");
     
   //INSTANCIOAMOS LA CLASE
   $instanciaCurso= new cursoControlador();
  //valida los campos requeridos
   if(isset($_POST['nombre'])){
      echo  $instanciaCurso->eliminar_curso_controlador();
   }else{

   }

 }
   else{
}
 
