<!--CONTENIDO DEL LA PAGINA-->  

<div class="row">
            
          

              <div class="col-md-2">
               <a href="<?php echo SERVERURL; ?>home"><button type="button" class="mb-0 btn btn-dark btn-fw"> <i class="fa fa-tablet"></i> Ver en Tarjetas</button></a> 
              </div>


            </div>

            <br>

            <!--curos-->
          <div class="row text-center">         
            <!--Curso de especialidad-->
            <table class="table table-hover dataTable no-footer" id="bootstrap-data-table" >
                      <thead class="bg bg-primary text-white">
                        <tr>
                          <th>Nombre</th>
                          <th>Fecha Inicio</th>
                          <th>Costo</th>
                          <th>Registros</th>
                          <th>Estado</th>
                          <th>Ver</th>
                          <th>Usuario</th>
                          
                        </tr>
                      </thead>
                      <tbody>

                   

                      
                      <?php
                require_once("./controladores/cursoControlador.php");
                 $insEspecialidad = new cursoControlador();
               echo $insEspecialidad->mostrar_tabla_cursos_controlador();

              ?>
                      </tbody>
                    </table>

            
            <!--fin formato un curso-->
            </div>
            </div>
            </div>
          </div>
<!--fin cursos-->