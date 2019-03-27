<!--Inicio de vista cliente nuevo-->


<!--titulo del curso-->
<div class="row ">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                        <?php
                                    // $codigo=$_GET['codigo'];
                                     require_once("./controladores/clienteControlador.php");
                                     $insCurso = new clienteControlador();
                                     echo $insCurso->cliente_actualizacion_estado();

                                ?>                        
               



<!--formulario de configuracion para el cliente-->

<!--fin del formulario para configuracion del cliente-->


<!--fin  de vista cliente nuevo-->
