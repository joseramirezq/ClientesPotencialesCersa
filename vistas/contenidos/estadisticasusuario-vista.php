<div class="row">

            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Tiempo de atencion a clientes potenciales por Usuario</h3>
               
                      <?php
                            require_once("./controladores/estadisticascursoControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insInteres = new estadisticascursoControlador();
                        echo $insInteres->tabla_control_usuarios();
                        ?>
                        
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
         
</div>


<div class="row">
            <div class="col-lg-12 grid-margin">
              <h4>Tiempo de atención a clientes potenciales entre dos fechas</h4>
              <p>Inserte la fecha de inicio y fecha de fin de búsqueda</p>
                 

              <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      
                      <form class="forms-sample " action="<?php SERVERURL;?>ajax/estadisticaAjax.php" method="POST" >

                        <div class="row">

                        <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Fecha Inicio</label>
                          <input type="date" name="fechainicio_usuario" class="form-control" id="fechainicio_usuario" required>
                        </div>
                        </div>
                        <div class="col-6">

                       
                        <div class="form-group">
                          <label for="exampleInputPassword1">Fecha Fin</label>
                          <input type="date" name="fechafin_usuario" class="form-control" id="fechafin_usuario" required>
                        </div>
                        </div>
                        <div class="col-6">
                        <button type="submit" name="buscar_fechas_usuarios" class="btn btn-success mr-2">Buscar</button>
                        </div>
                      </form>

                      </div>

                    </div>
                  </div>
                </div>
             
              </div>
            </div>
                
             
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Estados </h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                           Codigo
                          </th>
                          <th>
                            Estado
                          </th>
                          <th>
                           Cantidad de clientes
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="font-weight-medium">
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td class="text-danger">
                            45
                          </td>
                       
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">

            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Tiempo de atencion a clientes potenciales por Usuario</h3>
               
                      <?php
                            require_once("./controladores/estadisticascursoControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insInteres = new estadisticascursoControlador();
                        echo $insInteres->tabla_control_usuarios();
                        ?>
                        
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
         
</div>