<?php

if($_SESSION['privilegio_srcp']==1){
 
?>

<!--titulo del curso-->
<div class="row ">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-primary text-center">Cursos / Diplomados
                    <div class="btn-group dropdown float-right">
                        <a href="<?php SERVERURL; ?>agregarcurso"><button type="button" class="btn btn-success  btn-sm">
                                <i class="fa fa-plus"></i> Agregar nuevo
                            </button>
                        </a>

                    </div>
                </h3>
            </div>
        </div>
    </div>
</div>



<!--descripcion del curso y de los estados -->






<!--tabla de liosta de clientes-->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><i class="fa fa-graduation-cap text-primary icon-lg"></i> Lista de Cursos/Diplomados</h4>

                <!--fin fformulario de bisqueda-->
                <hr>

                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-hover" id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead class="bg bg-primary text-white">
                                <tr>
                                    <th>Codigo</th>
                                    <th>Categoria</th>
                                    <th>Nombre</th>
                                    <th>Fecha I.</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!--resgistro de un alumno-->
                                <?php
                                require_once("./controladores/cursoControlador.php");

                                //INSTANCIOAMOS LA CLASE//
                                $insCurso = new cursoControlador();
                                echo $insCurso->leer_cursos_controlador();

                                ?>


                                <!--fin de registro de un alumno-->



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php }?>
