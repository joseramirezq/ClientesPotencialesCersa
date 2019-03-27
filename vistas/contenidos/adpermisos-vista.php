<!--titulo del curso-->
<div class="row ">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h3 class="text-primary">Permisos
          <div class="btn-group dropdown float-right">
              <button type="button" class="btn btn-success btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#nuevocargo">
                            <i class="fa fa-plus"></i> Agregar Nuevo
                  </button>

          </div>
        </h3>
      </div>
    </div>
  </div>
</div>

<!--tabla de liosta de clientes-->
<!--tabla de liosta de clientes-->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Estado</h4>
                <hr>

                <div class="table-responsive">
                    <table class="table table-hover" id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                
                                <th>Editar</th>
                                <th>Eliminar</th>
                                 <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--resgistro de un alumno-->
                          
                            <?php
                            require_once("./controladores/secundariosControlador.php");

                            //INSTANCIOAMOS LA CLASE//
                            $insPermiso = new secundariosControlador();
                            echo $insPermiso->leer_permisos_controlador();

                            ?>
                            <!--fin de registro de un alumno-->



                            <!--fin de registro de un alumno-->


                            <!--fin de registro de un alumno-->



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<!--NoDALES-->

<!--Eliminar-->

<div class="modal fade" id="nusereliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header bg-danger text-center">
                <h4 class="text-light text-center">
                    <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-exclamation text-danger"></i></button>

                    ¿Esta seguro de eliminar el estado</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body bg-center">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 form-group">
                        <a href="" class="btn btn-success"><i class="fa fa-check"></i> Aceptar</a>
                        <button class="btn btn-info"><i class="fa fa-meh-o"></i> Cancel</button>
                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>
        </div>
    </div>
</div>

<!--Editar-->

<div class="modal fade" id="nusereditar" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header bg-warning text-center">
                <h4 class="text-light text-center">
                    <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-pencil text-warning"></i></button>

                    Editar al usuario :70212063 </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"> Verifique todos los datos ingresados antes de confirmar</h1>
                        <hr>

                        <form  action="<?php echo SERVERURL; ?>ajax/secundariosAjax.php" method="POST" class="forms-sample" autocomplete="off">
                            <div class="row">

                                <!--nombre/apellidos/correo-->

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputEmail1">Nombres</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputPassword1">Descripcion</label>
                                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Apellidos">
                                    </div>


                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputPassword1">Color</label>
                                        <input type="text" class="form-control" name="color" id="color" placeholder="Correo">
                                    </div>

                                </div>


                                <!--permisos-->


                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit"  name="insertar_estados" id="insertar_estados" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
                                   
                                    <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class=""><i class="fa fa-meh-o"></i> Cancel</a></span>
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--fin nodel editara-->


<!--mas informacion-->

<div class="modal fade" id="nuserdetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header bg-dark">
                <h4 class="text-light text-center">Usuario :Jose Luis Ramirez</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <address class="">
                                    <p class="font-weight-bold">
                                        Cargo
                                    </p>
                                    <p class="mb-2">
                                        Telemarket
                                    </p>
                                    <p class="font-weight-bold">
                                        Correo
                                    </p>
                                    <p>
                                        jlramirezq@gmail.com
                                    </p>
                                </address>
                            </div>


                            <div class="col-md-6">
                                <address class="">
                                    <p class="font-weight-bold">
                                        Telefono
                                    </p>
                                    <p class="mb-2">
                                        964923450
                                    </p>
                                    <p class="font-weight-bold">
                                        Usuario
                                    </p>
                                    <p>
                                        70212063
                                    </p>
                                </address>
                            </div>


                            <div class="col-md-6">
                                <address class="">
                                    <p class="font-weight-bold">
                                        Permiso
                                    </p>
                                    <p class="mb-2">
                                        <ul>
                                            <li>permiso 1</li>
                                            <li>permiso 2</li>
                                            <li>permiso 3</li>
                                            <li>permiso 4</li>
                                        </ul>
                                    </p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--insertAR ESTADO-->

<div class="modal fade" id="nuevocargo" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header bg-success text-center">
                <h4 class="text-light text-center">
                    <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-plus text-success"></i></button>

                    &nbsp;Insertar nueva Función </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"> Verifique todos los datos ingresados antes de confirmar</h1>
                        <hr>

                        <form  action="<?php echo SERVERURL; ?>ajax/secundariosAjax.php" method="POST" class="forms-sample" autocomplete="off">
                            <div class="row">

                                <!--nombre/apellidos/correo-->

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputEmail1">Puesto</label>
                                        <input type="text" class="form-control" name="puesto" id="puesto" placeholder="Nombre">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputPassword1">Descripcion</label>
                                        <input type="text" class="form-control" name="descripcion_puesto" id="descripcion_puesto" placeholder="Apellidos">
                                    </div>



                                </div>


                                <!--permisos-->


                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit"  name="insertar_permiso" id="insertar_permiso" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
                                   
                                    <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class=""><i class="fa fa-meh-o"></i> Cancel</a></span>
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>



        </div>
    </div>
</div> 