<!--titulo del curso-->
<div class="row ">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-primary">Agregar Usuario</h3>
            </div>
        </div>
    </div>
</div>



<!--formulario de configuracion para el cliente-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title"> Verifique todos los datos ingresados antes de confirmar</h1>
                <hr>

                <form  data-form="save"  action="<?php echo SERVERURL;?>ajax/administradorAjax.php" method="POST" class="forms-sample FormularioAjax" 
                autocomplete="off" >
                    <div class="row">
                        <div class="col-md-4">
                            <!--nombre/apellidos/correo-->

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="exampleInputEmail1">Nombres</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="exampleInputPassword1">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos"
                                        placeholder="Apellidos">
                                </div>
                            

                            <div class=" col-md-6 form-group">
                                <label for="exampleInputPassword1">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo"
                                    placeholder="Correo">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                            </div>
                            <div class="col-md-12 form-group">
                                       
                            <label for="exampleInputEmail1">Seleccione una foto</label>
                             <input class="form-control" type="file" name="foto" id="foto">
                                  
                            </div>
                            </div>
                        </div>

                        <!--cargo/usuario/contraseña-->
                        <div class="col-md-4">

                            <div class="form-group">
                                    <label for="exampleFormControlSelect1">Cargo</label>
                                    <select class="form-control form-control-lg" name="cargo" id="cargo">
                                      <option value="1">Telemarket</option>
                                      <option value="2">Gerente</option>
                                      <option value="3">Administrador</option>
                                      <option value="4">Cargo 4</option>
                                      <option value="5">Cargo 5</option>
                      
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="DNI">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input type="password" class="form-control" name="pass1" id="pass1"
                                    placeholder="Contraseña">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Repetir Contraseña</label>
                                <input type="password" class="form-control" name="pass2" id="pass2"
                                    placeholder="Repita Contraseña">
                            </div>
                        </div>

                        <!--permisos-->
                        <div class="col-md-4">

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
                            <a href="index.php" class="btn btn-info"><i class="fa fa-meh-o"></i> Cancel</a>
                        </div>
                    </div>
                </form>
                <div class="RespuestaAjax">
                </div>


            </div>
        </div>
    </div>
</div>
<!--fin del formulario para configuracion del cliente-->