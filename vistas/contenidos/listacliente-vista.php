<!--titulo del curso-->
<div class="row ">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="text-primary">Clientes Potenciales
                 
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
              <h2 class="card-title text-success mb-2">Estadistica de clientes</h2>
            
              <!--Estadisticas de los clientes-->
      
              <div class="row ">
                <div class="col-md-3 badge badge-warning">
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">Estado 1</p>
                      <p class="display-3 mb-4 font-weight-light">400</p>
                    </div>
      
                  </div>
                </div>
      
                <div class="col-md-3 badge badge-danger">
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">Estado 2</p>
                      <p class="display-3 mb-4 font-weight-light">450</p>
                    </div>
      
                  </div>
                </div>
      
                <div class="col-md-3 badge badge-info">
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">Estado 3</p>
                      <p class="display-3 mb-4 font-weight-light">220</p>
                    </div>
      
                  </div>
                </div>
      
      
                <div class="col-md-3 badge badge-success">
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">Estado 4</p>
                      <p class="display-3 mb-4 font-weight-light">125</p>
                    </div>
      
                  </div>
                </div>
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

              
                <hr>

                <div class="table-responsive">
                    <table class="table table-hover" id="bootstrap-data-table"
                    class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Ciudad</th>
                                 <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--resgistro de un alumno-->
                               
                            <?php
                            require_once("./controladores/clienteControlador.php");

                            //INSTANCIOAMOS LA CLASE//
                            $insEstado = new clienteControlador();
                            echo $insEstado->leer_cliente_controlador();

                            ?>
                           
                            <!--fin de registro de un alumno-->



                            <!--resgistro de un alumno-->
                      
                            <!--fin de registro de un alumno-->


                            <!--fin de registro de un alumno-->



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>