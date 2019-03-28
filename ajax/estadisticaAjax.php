<?php

$peticionAjax=true;
require_once("../core/configgeneral.php");

if (isset($_POST['buscar_fechas_usuarios'])) {
    require_once('../controladores/estadisticascursoControlador.php');
    $instanciaBusqueda = new estadisticascursoControlador();

    //validamos capos que se
   if (isset($_POST['fechainicio_usuario'])) {
      //echo "estadisticas";
          echo $instanciaBusqueda->tabla_busqueda_control_usuarios();
            //echo $instanciaCliente->agregar_cliente_controlador();
        } else { }

        ///LLAMAR VISTA DE SESION
}