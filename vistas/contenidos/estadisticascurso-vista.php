<div class="row">
                    <?php
                            require_once("./controladores/estadisticascursoControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insGenerales = new estadisticascursoControlador();
                        echo $insGenerales->estadisticas_generales_controlador();
                        ?>


</div>                  
<div class="row">

            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Lista de cursos con intereses</h4>
                  <div class="table-responsive">
                  <table class="table table-hover dataTable no-footer" id="bootstrap-data-table" role="grid" aria-describedby="bootstrap-data-table_info">
                      <thead>
                     
                        <tr>
                          <th>
                            Posicion
                          </th>
                          <th>
                            Estados
                          </th>
                          <th>
                            Codigo
                          </th>
                          <th>
                            Nombre
                          </th>
                          <th>
                            Interesados
                          </th>
                         
                         
                          <th>
                            Fecha de registro
                          </th>
                          <th>
                            En línea
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            require_once("./controladores/estadisticascursoControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insInteres = new estadisticascursoControlador();
                        echo $insInteres->total_clientes_interes_controlador();
                        ?>
                        
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
         
</div>


