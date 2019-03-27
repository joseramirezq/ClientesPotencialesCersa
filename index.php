
<?php 
    require_once('./core/configgeneral.php');
    require_once('./controladores/vistasControlador.php');

    $plantilla= new vistasControlador();
    $plantilla->obtener_plantilla_controlador();
   
