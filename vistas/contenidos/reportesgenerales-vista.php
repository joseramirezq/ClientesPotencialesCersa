<?php

if ($_SESSION['privilegio_srcp'] == 1) {

  ?>
  <div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center">Reportes Globales por cursos</h4>
        <div class="row">
          <div class="col-3"> <p>[0%-60%] <span style = "color:RED;">INACEPTABLE</span></p></div>
          <div class="col-3">  <p>[61%-85%] <span style = "color:#FFE633;">REGULAR</span></p></div>
          <div class="col-3">  <p>[86%-100%] <span style = "color:#09C81A;">BUENO</span></p></div>
          <div class="col-3"><p>[>100%] <span style = "color:#7533FF;">ÓPTIMO</span></p></div>
          <div class="col-3"><p>R<span>: Reservo</span></p></div>
          <div class="col-3"><p>M<span>: Matriculados</span></p></div>
          <div class="col-3"><p>% (M) <span> : PORCENTAJE OBTENIDO (MATRICULADOS)</span></p></div>
          <div class="col-3"><p>% (PreInsc) <span> : PORCENTAJE OBTENIDO (PREINSCRITOS)</span></p></div>
       
        </div>
       
      
      
        
        
      </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Reporte Mayo</h4>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Inicio</th>
                  <th>Curso/Diplomado.</th>
                  <th>R</th>
                  <th>M</th>
                  <th>% (M)</th>
                  <th>Meta</th>
                  <th><i class="fa fa-facebook-square icon-sm"></i></th>
                  <th><i class="fa fa-stack-exchange icon-sm"></i></th>
                  <th>% (PreInsc)</th>
                  <th>Resp</th>
                </tr>
              </thead>
              <tbody>

                <?php
                require_once("./controladores/estadisticascursoControlador.php");
                //INSTANCIOAMOS LA CLASE//
                $mes = 5;
                $insInteres = new estadisticascursoControlador();
                echo $insInteres->reporte_general_curso($mes);
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
          <h4 class="card-title">Reporte Abril</h4>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Inicio</th>
                  <th>Curso/Diplomado.</th>
                  <th>R</th>
                  <th>M</th>
                  <th>% (M)</th>
                  <th>Meta</th>
                  <th><i class="fa fa-facebook-square icon-sm"></i></th>
                  <th><i class="fa fa-stack-exchange icon-sm"></i></th>
                  <th>% (PreInsc)</th>
                  <th>Resp</th>
                </tr>
              </thead>
              <tbody>

                <?php
                require_once("./controladores/estadisticascursoControlador.php");
                //INSTANCIOAMOS LA CLASE//
                $mes = 4;
                $insInteres = new estadisticascursoControlador();
                echo $insInteres->reporte_general_curso($mes);
                ?>


              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>









<?php } ?>