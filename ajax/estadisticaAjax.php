<?php

$peticionAjax=true;
require_once("../core/configgeneral.php");

if (isset($_POST['buscar_fechas_usuarios'])) {
    require_once('../controladores/estadisticasControlador.php');
    $instanciaCliente = new estadisticasControlador();

    //validamos capos que se
   if (isset($_POST['fechainicio_usuario'])) {
       echo "estadisticas";
           // echo $instanciaCliente->agregar_cliente_controlador();
            //echo $instanciaCliente->agregar_cliente_controlador();
        } else { }

        ///LLAMAR VISTA DE SESION
}