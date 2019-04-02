<div class="row">

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center text-primary">Estados de Clientes </h3>
                <h2 class="text-center text-primary">Total </h2>
                <h4 class="text-center text-primary">(Cursos en linea)</h4>
                        <?php
                            require_once("./controladores/estadisticasControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insCat = new estadisticasControlador();
                            echo $insCat->total_clientes_controlador();
                            ?>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center text-primary">Estados de Clientes </h3>
                <h2 class="text-center text-primary">Hoy </h2>
               
                        <?php
                            require_once("./controladores/estadisticasControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insCat = new estadisticasControlador();
                            echo $insCat->total_clientes_hoy_controlador();
                            ?>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



   
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center text-primary">Detalle de clientes  </h3>
                <h2 class="text-center text-primary">INFORMACIÓN DETALLADA </h2>


                <div class="table-responsive">
                   <table class="table table-hover dataTable no-footer" id="bootstrap-data-table" role="grid" aria-describedby="bootstrap-data-table_info">
                        <thead class="bg bg-success text-white">
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                   Codigo
                                </th>
                                <th>
                                    Nombres
                                </th>
                                <th>
                                   Fecha de Registro
                                </th>
                                <th>
                                   Fecha Estado
                                </th>
                                <th>
                                   Curso
                                </th>
                                <th>
                                   Usuario
                                </th>

                                <th>
                                   Estado
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once("./controladores/estadisticasControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insCat = new estadisticasControlador();
                            echo $insCat->top_clientes_controlador();
                            ?>
                                                  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  

</div>

