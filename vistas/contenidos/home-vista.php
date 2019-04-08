<!--CONTENIDO DEL LA PAGINA-->  

<div class="row">
            

             

              <div class="col-md-12">
               <a href="<?php SERVERURL ?>homelista"><button type="button" class="mb-0 btn btn-dark btn-fw"> <i class="fa fa-list-ol"></i> Ver lista</button></a> 
              </div>


            </div>

            <br>

            <!--curos-->
          <div class="row text-center">

              <!--un formato agregar curso-->
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                  <div class="card-head">
                    <br><br>
                      <h4 class="text-center">Agregar Curso / Dip</h4>
                      <div class="text-center">
                        <a href="<?php SERVERURL;?>agregarcurso"><button type="button" class="btn btn-icons btn-lg btn-rounded btn-outline-primary">
                            <i class="fa fa-plus fa-10x"></i>
                          </button>
                          </a>
                    
                          </div>
                    
                  </div>
                </div>
              </div>
            <!--fin formato un curso-->

          
            <!--Curso de especialidad-->

              <?php
                require_once("./controladores/cursoControlador.php");
                 $insEspecialidad = new cursoControlador();
               echo $insEspecialidad->mostrar_cursos_controlador();

              ?>
            <!--fin formato un curso-->
            
          </div>
<!--fin cursos-->