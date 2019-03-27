<!--informacion de el cliente-->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class=" text-primary mb-2">Cliente : Jose Luis Ramirez Quiroz</h3>
                    </div>

                    <div class="col-md-4">
                        <div class="btn-group dropdown float-right">
                            <a href="<?php SERVERURL;?>editarcliente">
                                <button type="button" class="btn btn-warning btn-sm" aria-haspopup="true"
                                    aria-expanded="false">
                                    Configurar
                                </button>
                            </a>
                        </div>
                        <div class="btn-group dropdown float-right">

                            <button type="button" class="btn btn-success  btn-sm" aria-haspopup="true"
                                aria-expanded="false" data-toggle="modal" data-target="#miModal">
                                Agregar Interes
                            </button>

                        </div>
                    </div>

                </div>


                <!-- Modal  Busqueda-->
                <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header bg-success">
                                <h3 class="text-light">Agregar Interes</h3>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-light">×</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="card-body">

                                    <!--formulario busqueda normal-->
                                    <div class="row">
                                        <form class="form-sample">
                                            <p class="card-description">
                                                Cursos y diplomados
                                            </p>
                                            <div class="row">

                                                <div class="col-md-10">
                                                    <div class="form-group row">

                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control"
                                                                placeholder="Escriba el nombre de curso o diplomado">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">

                                                        <button type="button" class="btn btn-primary  btn-sm"
                                                            aria-haspopup="true" aria-expanded="false"
                                                            data-toggle="modal" data-target="#nodalresultados">
                                                            Buscar
                                                        </button>

                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                    <hr>


                                    <!--formulario busqueda especial-->
                                    <div class="row">
                                        <form class="form-sample">
                                            <p class="card-description">
                                                Busqueda especial
                                            </p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Tipo</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option>Curso</option>
                                                                <option>Diplomado</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Mes</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option>Enero</option>
                                                                <option>Febrero</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Año</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control">
                                                                <option>2019</option>
                                                                <option>2018</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8"></div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-2 btn-center">Buscar</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                    <hr>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--nodal resultados-->
                <div class="modal fade" id="nodalresultados" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header bg-dark">
                                <h4 class="text-light">Resultados de Busqueda</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-light">×</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Tipo
                                                </th>
                                                <th>
                                                    Curso
                                                </th>
                                                <th>
                                                    Selecionar
                                                </th>

                                            </tr>
                                        </thead>
                                        <!--cuerpo y formulari de envio de cursos-->
                                        <form action="" class="forms-sample">
                                            <tbody>
                                                <tr class="table-warning">
                                                    <td>
                                                        Curso
                                                    </td>
                                                    <td>
                                                        Actualizacion de derecho penal
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-flat">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">Si
                                                                <i class="input-helper"></i></label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr class="table-danger">
                                                    <td>
                                                        Cur.
                                                    </td>
                                                    <td>
                                                        Portugues-Nivel Básico
                                                    </td>
                                                    <td>
                                                            <div class="form-check form-check-flat">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input">Si
                                                                        <i class="input-helper"></i></label>
                                                                </div>
                                                    </td>

                                                </tr>
                                                <tr class="table-info">
                                                    <td>
                                                        Dip.
                                                    </td>
                                                    <td>
                                                        Obras por impuestos
                                                    </td>
                                                    <td>
                                                            <div class="form-check form-check-flat">
                                                                    <label class="form-check-label">
                                                                        <input type="checkbox" class="form-check-input">Si
                                                                        <i class="input-helper"></i></label>
                                                                </div>
                                                    </td>

                                                </tr>


                                            </tbody>
                                        </form>
                                    </table>
                                </div>

                                <hr>
                                <div class="btn-group dropdown float-right">
                                    <a href="alumnodetalle.php">
                                        <button type="button" class="btn btn-success btn-sm" aria-haspopup="true"
                                            aria-expanded="false">
                                            Agregar interes
                                        </button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!--infomacion del contacto-->
                <div class="row">
                    <div class="col-md-3">
                        <address class="">
                            <p class="font-weight-bold">
                                Correo
                            </p>
                            <p class="mb-2">
                                jlramirezq@unc.edu.pe
                            </p>
                            <p class="font-weight-bold">
                                Telefono
                            </p>
                            <p>
                                964923450
                            </p>
                        </address>
                    </div>


                    <div class="col-md-3">
                        <address class="">
                            <p class="font-weight-bold">
                                Profesión
                            </p>
                            <p class="mb-2">
                                Ingeniero de Sistemas
                            </p>
                            <p class="font-weight-bold">
                                Grado
                            </p>
                            <p>
                                Egresado
                            </p>
                        </address>
                    </div>


                    <div class="col-md-3">
                        <address class="">
                            <p class="font-weight-bold">
                                Pais
                            </p>
                            <p class="mb-2">
                                Perú
                            </p>
                            <p class="font-weight-bold">
                                Departamento
                            </p>
                            <p>
                                Cajamarca
                            </p>
                        </address>
                    </div>


                    <div class="col-md-3">
                        <address class="">
                            <p class="font-weight-bold">
                                Distrito
                            </p>
                            <p class="mb-2">
                                Baños del Inca
                            </p>
                            <p class="font-weight-bold">
                                Direccion
                            </p>
                            <p>
                                Jr. Progreso N° 540
                            </p>
                        </address>
                    </div>
                </div>
                <!--fin informacion del contacto-->

            </div>

        </div>
    </div>
</div>
<!--fin informaicon de los clientes-->



<!--historial-->
<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Historial</h4>

            <form action="">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control" placeholder="Escribe curso/telemarket/fecha">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-inverse-success" type="button">Buscar</button>
                    </span>
                </div>
            </form>

            <hr>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Curso
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Estado
                            </th>
                            <th>
                                Telemarket
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-warning">
                            <td>
                                1
                            </td>
                            <td>
                                Actualizacion de derecho penal
                            </td>
                            <td>
                                01/02/2019
                            </td>
                            <td>
                                Estado 1
                            </td>
                            <td>
                                Usuario 1
                            </td>
                        </tr>
                        <tr class="table-danger">
                            <td>
                                2
                            </td>
                            <td>
                                Portugues-Nivel Básico
                            </td>
                            <td>
                                10/02/2019
                            </td>
                            <td>
                                Estado 2
                            </td>
                            <td>
                                Usuario 2
                            </td>
                        </tr>
                        <tr class="table-info">
                            <td>
                                3
                            </td>
                            <td>
                                Obras por impuestos
                            </td>
                            <td>
                                12/02/2019
                            </td>
                            <td>
                                Estado 3
                            </td>
                            <td>
                                Usuario 1
                            </td>
                        </tr>
                        <tr class="table-success">
                            <td>
                                4
                            </td>
                            <td>
                                Ofimatica professional
                            </td>
                            <td>
                                20/02/2019
                            </td>
                            <td>
                                Estado 1
                            </td>
                            <td>
                                Usuario 5
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>