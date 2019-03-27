<!--titulo del curso-->
<div class="row ">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-primary">Usuarios
                    <div class="btn-group dropdown float-right">
                     <button type="button" class="btn btn-success  btn-sm" aria-haspopup="true" aria-expanded="false"
                        data-toggle="modal" data-target="#nuevousuario">
                                <i class="fa fa-plus"></i> Agregar nuevo
                        </button>
                       

                    </div>
                </h3>
            </div>
        </div>
    </div>
</div>

<!--tabla de liosta de clientes-->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Usuarios</h4>

              

                <!--fin fformulario de bisqueda-->
                <hr>

                <div class="table-responsive">
                    <table class="table table-hover" id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Usuario</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cargo</th>
                                <th>Configuracion</th>
                                <th>Detalle</th>

                            </tr>
                        </thead>
                        <tbody>

                            <!--resgistro de un alumno-->

                            <?php
                            require_once("./controladores/administradorControlador.php");

                            //INSTANCIOAMOS LA CLASE//
                            $insUser = new administradorControlador();
                            echo $insUser->leer_usuarios_controlador();

                            ?>

                            <!--fin de registro de un alumno-->






                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<!--NoDALES-->
<!--insertAR usuario-->

<div class="modal fade" id="nuevousuario" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header bg-success text-center">
                <h4 class="text-light text-center">
                    <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-plus text-success"></i></button>

                    &nbsp;Insertar nuevo Usuario </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"> Verifique todos los datos ingresados antes de confirmar</h1>
                            <form  data-form="save"  action="<?php echo SERVERURL;?>ajax/administradorAjax.php" method="POST" class="forms-sample" 
                autocomplete="off" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-12">
                            <!--nombre/apellidos/correo-->

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="exampleInputEmail1">Nombres</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="exampleInputPassword1">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos"
                                        placeholder="Apellidos" required>
                                </div>
                            

                            <div class=" col-md-6 form-group">
                                <label for="exampleInputPassword1">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo"
                                    placeholder="Correo" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
                            </div>
                            <div class="col-md-12 form-group">
                                       
                            <label for="exampleInputEmail1">Seleccione una foto</label>
                             <input class="form-control" type="file" name="foto" id="foto">
                                  
                            </div>
                            </div>
                        </div>

                        <!--cargo/usuario/contraseña-->
                        <div class="col-md-6">

                            <div class="form-group">
                                    <label for="exampleFormControlSelect1">Cargo</label>
                                    <select class="form-control form-control-lg" name="cargo" id="cargo">
                                    <?php
                                            require_once("./controladores/secundariosControlador.php");

                                            //INSTANCIOAMOS LA CLASE//
                                            $insCargos = new secundariosControlador();
                                            echo $insCargos->cambios_cargos_controlador();

                                     ?>
                           
                      
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="DNI" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input type="password" class="form-control" name="pass1" id="pass1"
                                    placeholder="Contraseña" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Repetir Contraseña</label>
                                <input type="password" class="form-control" name="pass2" id="pass2"
                                    placeholder="Repita Contraseña" required>
                            </div>
                        </div>

                        <!--permisos-->
                        <div class="col-md-6">

                            <h4>Permisos</h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-radio">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="permiso" id="permiso" value="1" checked=""> 
                                        Nivel 1 : Control total del sistema 
                                        <i class="input-helper"></i></label>
                                    </div>

                                    <div class="form-radio">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="permiso" id="permiso" value="2"> 
                                        Nivel 2 : Permiso para registro y actualización
                                        <i class="input-helper"></i></label>
                                    </div>

                                    <div class="form-radio">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="permiso" id="permiso" value="3"> 
                                        Nivel 3 : Permiso para registro
                                        <i class="input-helper"></i></label>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
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

<!--Eliminar-->

<div class="modal fade" id="nusereliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header bg-danger text-center">
                <h4 class="text-light text-center">
                    <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-exclamation text-danger"></i></button>

                    ¿Esta seguro de eliminar al Usuario 1?</h4>

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

                        <form class="forms-sample">
                            <div class="row">

                                <!--nombre/apellidos/correo-->

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1">Nombres</label>
                                        <input type="text" class="form-control" id="" placeholder="Nombre">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputPassword1">Apellidos</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Apellidos">
                                    </div>


                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputPassword1">Correo</label>
                                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Correo">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="exampleInputEmail1">Teléfono</label>
                                        <input type="text" class="form-control" id="" placeholder="Telefono">
                                    </div>
                                </div>


                                <!--cargo/usuario/contraseña-->
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Cargo</label>
                                        <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                            <option value="">Telemarket</option>
                                            <option value="">Gerente</option>
                                            <option value="">Administrador</option>
                                            <option value="">Cargo 4</option>
                                            <option value="">Cargo 5</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Usuario</label>
                                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="DNI">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contraseña</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                                    </div>
                                </div>

                                <!--permisos-->
                                <div class="col-md-6">

                                    <h4>Permisos</h4>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-check form-check-flat">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"> Permiso 1
                                                    <i class="input-helper"></i><i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check form-check-flat">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"> Permiso 2
                                                    <i class="input-helper"></i><i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check form-check-flat">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"> Permiso 3
                                                    <i class="input-helper"></i><i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check form-check-flat">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"> Permiso 4
                                                    <i class="input-helper"></i><i class="input-helper"></i></label>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="index.php" class="btn btn-success"><i class="fa fa-check"></i> Actualizar</a>
                                    <a href="index.php" class="btn btn-info"><i class="fa fa-meh-o"></i> Cancel</a>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 