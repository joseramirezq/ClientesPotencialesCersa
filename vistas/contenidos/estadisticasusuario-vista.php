<div class="row">

            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center">Tiempo de atencion a clientes potenciales por Usuario</h3>
                  <h3 class="text-primary text-center">HOY</h3>
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
  <div class="card">
    <div class="card-body">
        <h3 class="card-title text-center">Tiempo de atencion a clientes potenciales por Usuario</h3>
        <h3 class="text-primary text-center">SEMANA</h3>
          <?php
                require_once("./controladores/estadisticascursoControlador.php");
                //INSTANCIOAMOS LA CLASE//
                $insInteres = new estadisticascursoControlador();
            echo $insInteres->tabla_semana_control_usuarios();
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

  <div class="card">
    <div class="card-body">
      <h3 class="card-title text-center">Tiempo de atencion a clientes potenciales por Usuario</h3>
        <h3 class="text-primary text-center">MES</h3>
          <?php
                require_once("./controladores/estadisticascursoControlador.php");
                //INSTANCIOAMOS LA CLASE//
                $insInteres = new estadisticascursoControlador();
            echo $insInteres->tabla_mes_control_usuarios();
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
        <h4 class="">Buscar Fechas</h4>
   
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