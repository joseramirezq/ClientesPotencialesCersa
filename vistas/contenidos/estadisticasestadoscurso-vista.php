<?php

if($_SESSION['privilegio_srcp']==1){
 
?>
<div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <!--weather card-->
              <div class="card card-weather">
              <h4 class="text-center text-primary">Estados de los cursos en total</h4><br>
                <div class="card-body">
                  <div class="d-flex weakly-weather">

                    
                  <?php
                            require_once("./controladores/estadisticasControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insGenerales = new estadisticasControlador();
                        echo $insGenerales->total_estados_cursos_controlador();
                       ?>
                   

                  
                  </div>
                </div>
              </div>
              <!--weather card ends-->
            </div>
            
          </div>
 

          <div class="row">

<div class="col-lg-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="text-center text-primary">Detalle de Estados por curso-MAYO</h4>
      <div class="table-responsive">
      <table class="table table-hover dataTable no-footer" id="bootstrap-data-table" role="grid" aria-describedby="bootstrap-data-table_info">
    
         
          
          <?php
                require_once("./controladores/estadisticascursoControlador.php");
                //INSTANCIOAMOS LA CLASE//
                $mes=5;
                $insInteres = new estadisticascursoControlador();
            echo $insInteres->total_estados_interes_controlador($mes);
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
                  <h4 class="text-center text-primary">Detalle de Estados por curso - ABRIL</h4>
                  <div class="table-responsive">
                  <table class="table table-hover dataTable no-footer" id="bootstrap-data-table" role="grid" aria-describedby="bootstrap-data-table_info">
                
                     
                      
                      <?php
                            require_once("./controladores/estadisticascursoControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $mes=4;

                            $insInteres = new estadisticascursoControlador();
                        echo $insInteres->total_estados_interes_controlador($mes);
                        ?>
                        
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
         
</div>


<?php }?>

