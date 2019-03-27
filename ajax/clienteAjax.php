<?php

$peticionAjax=true;
require_once("../core/configgeneral.php");

if (isset($_POST['agregar_cliente'])) {
    require_once('../controladores/clienteControlador.php');
    $instanciaCliente = new clienteControlador();

    //validamos capos que se
   if (isset($_POST['nombre'])) {
            echo $instanciaCliente->agregar_cliente_controlador();
            //echo $instanciaCliente->agregar_cliente_controlador();
        } else { }

        ///LLAMAR VISTA DE SESION
}else if(isset($_POST['vistacambioestado'])){
    require_once('../controladores/clienteControlador.php');
    $insVistaCliente = new clienteControlador();

    if (isset($_POST['enlacecliente'])) {
        $_SESSION['codigocliente']=$_POST['enlacecliente'];
        $identificador=$_POST['idenestado'];
        $codigoclienteV= $_SESSION['codigocliente'];
        $idinterescontrol=$_POST['idinterescontrol'];
        echo $insVistaCliente->pasando_variable_controlador($codigoclienteV,$identificador,$idinterescontrol);
        
        $direccion=SERVERURL."sesionestados";
        header('location:'.$direccion);
        //echo $insVistaCliente->agregar_cliente_controlador();
        //echo $instanciaCliente->agregar_cliente_controlador();
    } else { }
}

    else if(isset($_POST['actualizar_cliente'])){

        require_once('../controladores/clienteControlador.php');
        $instanciaClienteActualizar = new clienteControlador();
    
        //validamos capos que se
       if (isset($_POST['idcliente'])) {
                echo $instanciaClienteActualizar->actualizar_cliente_controlador();
                //echo $instanciaCliente->agregar_cliente_controlador();
            } else { }

    }
    else{
    //aqui debemos votar al login porque ha ocurido quizas una insercion
}
