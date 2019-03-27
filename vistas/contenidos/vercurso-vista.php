<!--titulo del curso-->


<div class="row ">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                
                    <?php
                        require_once("./controladores/cursoControlador.php");
                        $insCurso = new cursoControlador();
                     
                       // $variable=1;
                    echo $insCurso->ver_sesion_curso_controlador();

                    ?>
                 
                    
             </div>
        </div>
    </div>
</div>


<!--lista de participantes o interesado sen el curso-->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de interesados</h4>

                <!--fin fformulario de bisqueda-->
                <hr />

                <div class="table-responsive">
                    <table class="table table-hover" id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th>Nombre</th>
                                <th>Apellido</th>

                              

                                <th>Estado</th>
                             
                                <th>Fecha Cambio Estado</th>
                                <th>Atendico por</th>


                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--resgistro de un alumno-->
                            <?php
                                    require_once("./controladores/cursoControlador.php");
                                    $insInteres = new cursoControlador();
                                
                                // $variable=1;
                                echo $insInteres->solover_tabla_interesados_controlador();

                                ?>
                       
                            <!--fin de registro de un alumno-->
                            <!--resgistro de un alumno-->

                            <!--fin de registro de un alumno-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--NoDALES-->



<!--nodal agregar nuevo clieten-->
<?php
    require_once("./controladores/cursoControlador.php");
     $insCursoagregar = new cursoControlador();
      echo $insCursoagregar->agregar_interesados_controlador();

                                ?>

