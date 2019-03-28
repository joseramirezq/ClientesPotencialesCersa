<!--titulo del curso-->
<div class="row ">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="text-primary text-center">  Clientes Potenciales
              
              </h3>
            </div>
          </div>
        </div>
      </div>
      
      
      
      <!--descripcion del curso y de los estados -->
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            <h2 class="card-title text-primary mb-2"><i class="fa fa-cubes text-primary icon-lg"></i>  Estados por Cliente</h2>
            
              <!--Estadisticas de los clientes-->
      
              <div class="row ">

              
              <?php
                require_once("./controladores/clienteControlador.php");
                 $insEspecialidad = new clienteControlador();
               echo $insEspecialidad->estados_cliente_controlador();

              ?>


               
      
          
      
      
                
              </div>
      
            </div>
          </div>
        </div>
      </div>
      
      



<!--tabla de liosta de clientes-->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Clientes</h4>     
                
                           <?php
                            require_once("./controladores/clienteControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insEstado = new clienteControlador();
                            echo $insEstado->leer_cliente_controlador();
                            ?>                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>