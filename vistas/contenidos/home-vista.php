<!--CONTENIDO DEL LA PAGINA-->  

<div class="row">
              <div class="col-md-6">

                <!--formulario de busqueda-->
                <form action="">
                      <div class="input-group ">
                          <input type="text" class="form-control" placeholder="Escribe nombre curso o diplomado">
                          <span class="input-group-append">
                              <button class="file-upload-browse btn btn-inverse-primary" type="button"> <i class="fa fa-search"></i> Buscar</button>
                          </span>
                      </div>
                  </form>

                  <!--fin fformulario de bisqueda-->
              </div>

              <div class="col-md-2">
                  <div class="btn-group dropdown">
                        <button type="button" class="btn btn-warning dropdown-toggle " data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                         
                      <i class="fa fa-calendar-o"></i> Ordenar por fecha
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item badge badge-danger" aria-haspopup="true" aria-expanded="false"
                            data-toggle="modal" data-target="#nodalcambioestado" href="#">
                            <i class="fa fa-reply fa-fw"></i>Reciente</a><br>
                          <a class="dropdown-item badge badge-info" href="#">
                            <i class="fa fa-reply fa-fw"></i>Antiguo</a><br>
                        </div>
                   </div>
             </div>
              <div class="col-md-2">
                  <div class="btn-group dropdown">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-desktop"></i> Ordenar por Tipo
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item badge badge-danger" aria-haspopup="true" aria-expanded="false"
                            data-toggle="modal" data-target="#nodalcambioestado" href="#">
                            <i class="fa fa-reply fa-fw"></i>Curso</a><br>
                          <a class="dropdown-item badge badge-info" href="#">
                            <i class="fa fa-reply fa-fw"></i>Diplomado</a><br>
                        </div>
                   </div>
              </div>

              <div class="col-md-2">
               <a href="cursolista.php"><button type="button" class="mb-0 btn btn-dark btn-fw"> <i class="fa fa-list-ol"></i> Ver lista</button></a> 
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