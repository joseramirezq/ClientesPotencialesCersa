<!--Inicio de vista cliente nuevo-->


<!--titulo del curso-->
<div class="row ">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-primary">Agregar Cliente</h3>
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

                <form data-form="save"  action="<?php echo SERVERURL;?>ajax/clienteAjax.php" method="POST" class="forms-sample FormularioAjax" 
                autocomplete="off" >
                 <div class="row">
                        <div class="col-md-4">
                            <!--nombre/apellidos/correo-->

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="exampleInputEmail1">Nombres</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="exampleInputPassword1">Apellidos</label>
                                    <input type="text" class="form-control"  name="apellidos" id="apellidos" 
                                        placeholder="Apellidos">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Correo</label>
                                <input type="email" class="form-control"  name="correo" id="correo" 
                                    placeholder="Correo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Teléfono</label>
                                <input type="text" class="form-control"  name="telefono" id="telefono" required 
                                 placeholder="Telefono">
                            </div>
                        </div>

                        <!--telefono/profesion/grado-->
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Profesión</label>
                                <input type="text" class="form-control"  name="profesion" id="profesion" 
                                    placeholder="Profesion">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Grado</label>
                                <input type="text" class="form-control"  name="grado" id="grado"  placeholder="grado">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pais</label>
                                <input type="text" class="form-control"  name="pais" id="pais"  placeholder="pais" value="Perú">
                            </div>
                        </div>

                        <!--departamento/distrito/direccion-->
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Departamento</label>
                                <input type="text" class="form-control"  name="departamento" id="departamento" 
                                    placeholder="Departamento">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Distrito</label>
                                <input type="text" class="form-control"  name="distrito" id="distrito" 
                                    placeholder="Distrito">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Direccion</label>
                                <input type="text" class="form-control"  name="direccion" id="direccion" 
                                    placeholder="Direccion">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
                            <a href="<?php SERVERURL?>home" hred class="btn btn-info text-white"><i class="fa fa-meh-o"></i> Cancel</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
<!--fin del formulario para configuracion del cliente-->


<!--fin  de vista cliente nuevo-->
