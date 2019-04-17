<?php
     
        if ($peticionAjax) {
            require_once('../modelos/estadisticascursoModelo.php');
           
        } else {
            require_once('./modelos/estadisticascursoModelo.php');
          
        }

        class estadisticascursoControlador extends estadisticascursoModelo{

           

        public function total_clientes_interes_controlador($mes)
        {
                    $porcentaje=0;
                    $table="";
                    $contador=0;
                    $cantidadpormes=0;
                    
                    $conexion=mainModel::conectar();

                    //cantidad de clientes en total


                    $datosparaInteres = $conexion->query("
                    SELECT *  FROM especialidad  where estado_actual=0 and MONTH(fecha_inicio)=$mes and fecha_fin>curdate()");
                    $datosparaInteres = $datosparaInteres->fetchAll();
                    foreach ($datosparaInteres as $rowsparainteres) {
                      $idespecialidades=$rowsparainteres['idespecialidad'];

                      

            
           
            //cantidad total de interesados
            $cantTotal=0;
            $datoscantestado = $conexion->query("
            SELECT COUNT(*) AS total FROM interes where idespecialidad=$idespecialidades");
            $datoscantestado = $datoscantestado->fetchAll();
            foreach ($datoscantestado as $rowsestadocant) {
            $cantTotal=$rowsestadocant['total'];
            }
            $cantidadpormes=$cantidadpormes+ $cantTotal;

                }

            //estados de cada interes
            $idcat=0;
            $datosespe = $conexion->query("
            SELECT *  FROM especialidad  where estado_actual=0 and MONTH(fecha_inicio)=$mes and fecha_fin>curdate()");
            $datosespe = $datosespe->fetchAll();
            foreach ($datosespe as $rowsespecialidad) {
            $idespecialidad=$rowsespecialidad['idespecialidad'];
            $idcat=$rowsespecialidad['idcategoria'];


            $contador++;
        
            //nombre de categoria
            
            $datoscat = $conexion->query("
            SELECT 	nombre_cat FROM categoria WHERE idcategoria='$idcat'");
            $datoscat = $datoscat->fetchAll();
            foreach ($datoscat as $rowscat) {
            $nombrecat=$rowscat['nombre_cat'];
            }


            //interesados por curso
           
            $totalinterescurso=0;
            $datosinteres = $conexion->query("
            SELECT COUNT(*) AS totalint FROM interes WHERE idespecialidad='$idespecialidad'");
            $datosinteres = $datosinteres->fetchAll();
            foreach ($datosinteres as $rowsinteres) {
            $totalinterescurso=$rowsinteres['totalint'];
            }
            if($cantidadpormes>0){
            $porcentaje=(($totalinterescurso*100)/$cantidadpormes);}
        
           
               //USUARIO EN LINEA

              $nombreuser="Disponible";
              $codigousuer=$rowsespecialidad['sesion'];
              if($codigousuer!="Disponible"){
              
           
               $datosuser = $conexion->query("
               SELECT nombre_us FROM usuario WHERE codigousuario='$codigousuer'");
               $datosuser = $datosuser->fetchAll();
               foreach ($datosuser as $rowsuser) {
                
               $nombreuser=$rowsuser['nombre_us'];
               if($nombreuser==""){
                $nombreuser="Disponible";
               }
              }
               }



            $table.='
            <tr>
                <td class="font-weight-medium">
                  '.$contador.'
                </td>
                <td class="font-weight-medium">
                '.$rowsespecialidad['idespecialidad'].'
              </td>

                <td class="font-weight-medium">
                  '.$nombrecat.'
                </td>

                <td>
                '.$rowsespecialidad['nombre_es'].'
                </td>

                <td>
                '.$totalinterescurso.' de '.$cantidadpormes.' --->   '.round($porcentaje,2).' %
                  <div class="progress">
                     <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: '.$porcentaje.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>

                
                <td class="text-danger">
                '.$rowsespecialidad['fecha_registro'].'
                </td>
                
                <td class="bg">
                '.$nombreuser.'
                </td>
          </tr> 
          ';
            

            }
                return $table;

        }

        public function total_estados_interes_controlador($mes)
        {            $prematri=0;
                    $porcentaje=0;
                    $table="";
                    
                    $conexion=mainModel::conectar();

                    //cantidad de clientes en total
            
           

           
            $table.='
               <thead class="bg bg-primary text-white">
                    <tr>
                   
                        <th>
                         Curso
                        </th>
                       ';

           $datosEstado = $conexion->query("
            SELECT * FROM estado "); 
             $datosEstado = $datosEstado->fetchAll();
            foreach ($datosEstado as $rowsEstado) {
           
                         $table.=' <th>
                                   '.$rowsEstado['nombre_estado'].'
                                 </th>';
                               }

            //estados de cada interes

            $table.=' 
            <th>
                Pre Inscritos
                </th>
                <th>
                Total
                </th>
                
              </tr>
            </thead>
            <tbody>';


            $idcat=0;
           
            $datosespe = $conexion->query("
            SELECT *  FROM especialidad  where estado_actual=0 and MONTH(fecha_inicio)=$mes and fecha_fin>curdate()");
            $datosespe = $datosespe->fetchAll();
            foreach ($datosespe as $rowsespecialidad) {
            $sumadeestados=0;
            $idespecialidad=$rowsespecialidad['idespecialidad'];
            $idcat=$rowsespecialidad['idcategoria'];

            $table.='
            <tr>
                <td class="font-weight-medium">
                '.$rowsespecialidad['nombre_es'].'
                </td>';
            $datosEstado = $conexion->query("
            SELECT * FROM estado  ORDER BY idestado"); 
             $datosEstado = $datosEstado->fetchAll();
            foreach ($datosEstado as $rowsEstado) {
              $idestado=$rowsEstado['idestado'];
            

            
            //interesados por curso
           
            $totalinterescurso=0;
            $datosinteres = $conexion->query("
            SELECT COUNT(*) AS totalint FROM interes WHERE idespecialidad='$idespecialidad' AND idestado=$idestado ORDER BY idestado");
            $datosinteres = $datosinteres->fetchAll();
            foreach ($datosinteres as $rowsinteres) {
              $cantidadestado=$rowsinteres['totalint'];
              if($idestado==8){
                $prematri= $cantidadestado;

              }
              $sumadeestados+= $cantidadestado;
              $total=$sumadeestados-$prematri;
              $prematri=0;


              $table.='
           
              <td class="font-weight-medium">
              '.$cantidadestado.'
            </td>
           
          ';
            
            }
           }

  
            $table.='
           
                <td class="font-weight-medium">
                '.$total.'
              </td>

                <td class="bg">
                '.$sumadeestados.'
                  </td>
                 
          </tr> 
          ';
            
        }
            
                return $table;

        }

        
        public function estadisticas_generales_controlador(){
            $tableGe="";
            $contador=0;
            $fecha=date("Y-m-d ");  
                    
            $conexion=mainModel::conectar();

            //cantidad de clientes en total
            $totalcursos=0;
            $datosCur= $conexion->query("
            SELECT COUNT(*) as total FROM especialidad WHERE estado_actual=0 and fecha_fin>curdate()");
            $datosCur = $datosCur->fetchAll();
            foreach ($datosCur as $datosCur) {
              $totalcursos=$datosCur['total'];

            }
            $totalcursos2=0;
            $datosCurso= $conexion->query("
            SELECT COUNT(*) as totalcursos FROM especialidad WHERE idcategoria='1' and estado_actual=0 and fecha_fin>curdate() ");
            $datosCurso = $datosCurso->fetchAll();
            foreach ($datosCurso as $datosCurso) {
              $totalcursos2=$datosCurso['totalcursos'];

            }

            $totaldiplomados=0;
            $datosDiplomados= $conexion->query("
            SELECT COUNT(*) as total FROM especialidad WHERE idcategoria='2' and estado_actual=0 and fecha_fin>curdate()");
            $datosDiplomados = $datosDiplomados->fetchAll();
            foreach ($datosDiplomados as $datosDip) {
              $totaldiplomados=$datosDip['total'];

            }


            $datosCur= $conexion->query("
            SELECT COUNT(*) as total FROM especialidad WHERE estado_actual=0 and fecha_fin>curdate()");
            $datosCur = $datosCur->fetchAll();
            foreach ($datosCur as $datosCur) {
              $totalcursos=$datosCur['total'];

            }

            //el capo de los cursos o dimplomados
            $variablemayor=0;
            $nombrecurso="";
            $nombrecursomayor="";
            $idespecialidad=0;
            $datosespe = $conexion->query("
            SELECT *  FROM especialidad WHERE estado_actual=0 and fecha_fin>curdate() ");
            $datosespe = $datosespe->fetchAll();
            foreach ($datosespe as $rowsespecialidad) {
            $idespecialidad=$rowsespecialidad['idespecialidad'];
            $nombrecurso=$rowsespecialidad['nombre_es'];

            $totalinterescurso=0;
            $datosinteres = $conexion->query("
            SELECT COUNT(*) AS totalint FROM interes WHERE idespecialidad='$idespecialidad'");
            $datosinteres = $datosinteres->fetchAll();
            foreach ($datosinteres as $rowsinteres) {
            $totalinterescurso=$rowsinteres['totalint'];
            }

            if( $variablemayor<$totalinterescurso){
                $variablemayor=$totalinterescurso;
                $nombrecursomayor= $nombrecurso;

            }

           
             }

         


              $contador++;
                $tableGe.='
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card card-statistics">
                      <div class="card-body">
                        <div class="clearfix">
                          <div class="float-left">
                            <i class="fa fa-desktop text-danger icon-lg"></i>
                          </div>
                          <div class="float-right">
                            <p class="mb-0 text-right">Total de Cursos/Dip</p>
                            <div class="fluid-container">
                              <h3 class="font-weight-medium text-right mb-0">'. $totalcursos.'</h3>
                            </div>
                          </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                          <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Datos hasta el '.$fecha.'
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card card-statistics">
                      <div class="card-body">
                        <div class="clearfix">
                          <div class="float-left">
                            <i class="fa fa-graduation-cap text-warning icon-lg"></i>
                          </div>
                          <div class="float-right">
                            <p class="mb-0 text-right">Diplomados</p>
                            <div class="fluid-container">
                              <h3 class="font-weight-medium text-right mb-0">'.$totaldiplomados.'</h3>
                            </div>
                          </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                          <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Datos hasta el '.$fecha.'
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card card-statistics">
                      <div class="card-body">
                        <div class="clearfix">
                          <div class="float-left">
                            <i class="fa fa-book text-success icon-lg"></i>
                          </div>
                          <div class="float-right">
                            <p class="mb-0 text-right">Cursos</p>
                            <div class="fluid-container">
                              <h3 class="font-weight-medium text-right mb-0">'.$totalcursos2.'</h3>
                            </div>
                          </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                          <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Datos hasta el '.$fecha.'
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card card-statistics">
                      <div class="card-body">
                        <div class="clearfix">
                          <div class="float-left">
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                          </div>
                          <div class="float-right">
                            <p class="mb-0 text-right">Mayor interes</p>
                            <div class="fluid-container">
                              <h3 class="font-weight-medium text-right mb-0">'.$variablemayor.'</h3>
                            </div>
                          </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                          <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Nombre :'.$nombrecursomayor.'
                        </p>
                      </div>
                    </div>
                  </div>
                  
           ';
        

        return $tableGe;
        }

        public function tabla_control_usuarios(){

          date_default_timezone_set('America/Lima');
         setlocale(LC_TIME, 'spanish');
         
      
          $table="";
          $idusuario=0;
          $porcentaje=0;
          $fecha=date("Y-m-d");
          $fechaactual=strftime(" %d de %B de %Y ");
          

          $conexion=mainModel::conectar();
          //contador de segundos en total
          $contadortotal=0;
          $datostotal = $conexion->query("
          SELECT TIMESTAMPDIFF(SECOND, `fecha_inicio`,`fecha_fin`) as segundos
          FROM `controlusuario` WHERE fecha='$fecha'");
          $datostotal = $datostotal->fetchAll();
          foreach ($datostotal as $rowstotal) {
          
        
            $contadortotal=$contadortotal+$rowstotal['segundos'];
          }

         
            $hours=floor($contadortotal / 3600);
            $minutos= floor(($contadortotal % 3600)/60);
            $segundos=(($contadortotal % 3600)%60);
          

          $table.=' 
          <h4 class="text-primary text-center">'. $fechaactual.'</h4>
          <h3><i class="fa fa-clock-o text-danger icon-lg"></i> '.$hours.' h '.$minutos.' m '.$segundos.' s </h3>
          <div class="table-responsive">
          <table class="table table-hover dataTable no-footer" id="bootstrap-data-table" role="grid" aria-describedby="bootstrap-data-table_info">
              <thead class="table-danger">
             
                <tr>
                  <th>
                   Codigo Usuario
                  </th>
                  <th>
                    Nombre Usuario
                  </th>
                  <th>
                    Interaciones
                  </th>
                  <th>
                   Tiempo
                  </th>
                  <th>
                    Porcentaje
                  </th>

                  
                 
                </tr>
              </thead>
              <tbody>
              ';
          
          //mostrar todos los usuarios activos
            
            $datosusuario = $conexion->query("
            SELECT * FROM usuario WHERE estado_us=1 AND permisos=3");
            $datosusuario = $datosusuario->fetchAll();
            foreach ($datosusuario as $rowsusuario) {

              $idusuario=$rowsusuario['idusuario'];


              //funcion contar segundos por cada usuario
              $cont=0;
              $contadorsegundo=0;
              $datoscontrol = $conexion->query("
              SELECT TIMESTAMPDIFF(SECOND, `fecha_inicio`,`fecha_fin`) as segundos
              FROM `controlusuario` WHERE codigousuario='$idusuario' AND 	fecha='$fecha'");
              $datoscontrol = $datoscontrol->fetchAll();
              foreach ($datoscontrol as $rowscontrol) {
            
                $contadorsegundo=$contadorsegundo+$rowscontrol['segundos'];
                $cont++;
              }

              $hours2=floor($contadorsegundo / 3600);
              $minutos2= floor(($contadorsegundo % 3600)/60);
              $segundos2=(($contadorsegundo % 3600)%60);
              if($contadortotal>0){
              $porcentaje= ($contadorsegundo*100)/$contadortotal;}
           
            
            $table.='
           
            <tr>
                <td class="font-weight-medium">
                  '.$rowsusuario['codigousuario'].'
                </td>
                <td class="font-weight-medium">
                '.$rowsusuario['nombre_us'].'
                </td>

                <td class="font-weight-medium">
                '.$cont.'
                </td>
                
                <td>
                '.$hours2.' h '.$minutos2.' m '.$segundos2.' s
                </td>
                <td>
                '.round($porcentaje,2).'%
                </td>

                

                

          </tr> 
          ';
         }

            
                return $table;

        }

        public function tabla_semana_control_usuarios(){

                 
          $table="";
          $idusuario=0;
          $porcentaje=0;
          $fecha=date("Y-m-d");
          $SemanaPasada = date('Y-m-d', strtotime('-1 week')) ; // resta 1 semana
          $SemanaPas = date('d/m/Y', strtotime('-1 week')) ; // resta 1 semana
          $fech=date("d/m/Y");

          $conexion=mainModel::conectar();
          //contador de segundos en total
          $contadortotal=0;
          $datostotal = $conexion->query("
          SELECT TIMESTAMPDIFF(SECOND, `fecha_inicio`,`fecha_fin`) as segundos
          FROM `controlusuario` WHERE fecha BETWEEN '$SemanaPasada' AND '$fecha'");
          $datostotal = $datostotal->fetchAll();
          foreach ($datostotal as $rowstotal) {
        
            $contadortotal=$contadortotal+$rowstotal['segundos'];
          }

         
            $hours=floor($contadortotal / 3600);
            $minutos= floor(($contadortotal % 3600)/60);
            $segundos=(($contadortotal % 3600)%60);
          

          $table.=' 
          <h4 class="text-primary text-center">Desde '. $SemanaPas.' hasta '.$fech.' </h4>
          <h3><i class="fa fa-clock-o text-danger icon-lg"></i> '.$hours.' h '.$minutos.' m '.$segundos.' s </h3>
          <div class="table-responsive">
          <table class="table table-hover dataTable no-footer" id="bootstrap-data-table" role="grid" aria-describedby="bootstrap-data-table_info">
              <thead class="table-danger">
             
                <tr>
                  <th>
                   Codigo Usuario
                  </th>
                  <th>
                    Nombre Usuario
                  </th>
                  <th>
                    Interaciones
                  </th>
                  <th>
                   Tiempo
                  </th>
                  <th>
                    Porcentaje
                  </th>

                
                 
                </tr>
              </thead>
              <tbody>
              ';
          
          //mostrar todos los usuarios activos
            
            $datosusuario = $conexion->query("
            SELECT * FROM usuario WHERE estado_us=1 AND permisos=3");
            $datosusuario = $datosusuario->fetchAll();
            foreach ($datosusuario as $rowsusuario) {
              $idusuario=$rowsusuario['idusuario'];


              //funcion contar segundos por cada usuario
              $cont=0;
              $contadorsegundo=0;
              $datoscontrol = $conexion->query("
              SELECT TIMESTAMPDIFF(SECOND, `fecha_inicio`,`fecha_fin`) as segundos
              FROM `controlusuario` WHERE codigousuario='$idusuario' AND 	fecha BETWEEN '$SemanaPasada' AND '$fecha'");
              $datoscontrol = $datoscontrol->fetchAll();
              foreach ($datoscontrol as $rowscontrol) {
            
                $contadorsegundo=$contadorsegundo+$rowscontrol['segundos'];
                $cont++;
              }

              $hours2=floor($contadorsegundo / 3600);
              $minutos2= floor(($contadorsegundo % 3600)/60);
              $segundos2=(($contadorsegundo % 3600)%60);
              if($contadortotal>0){
              $porcentaje= ($contadorsegundo*100)/$contadortotal;}
           
            
            $table.='
           
            <tr>
                <td class="font-weight-medium">
                  '.$rowsusuario['codigousuario'].'
                </td>
                <td class="font-weight-medium">
                '.$rowsusuario['nombre_us'].'
                </td>

                <td class="font-weight-medium">
                '.$cont.'
                </td>
                
                <td>
                '.$hours2.' h '.$minutos2.' m '.$segundos2.' s
                </td>
                <td>
                '.round($porcentaje,2).'%
                </td>

                

          </tr> 
          ';
         }

            
                return $table;

        }

        public function tabla_mes_control_usuarios(){

         // date_default_timezone_set('Europe/Madrid');

         // setlocale(LC_TIME, 'spanish');


          $table="";
          $idusuario=0;
          $porcentaje=0;
          $fecha=date("Y-m-d");
          $elMesPasado = date('Y-m-d', strtotime('-1 month')) ;

          $fech=date("d/m/Y");
          $elMesPasad = date('d/m/Y', strtotime('-1 month')) ;
        // $fechaactual=strftime(" %d de %B de %Y %H:%M");
          
          
         // $fecha1=date("Y/m/d");
         // $elMesPasado1 = date('Y/m/d', strtotime('-1 month')) ;// rest // resta 1 semana

          $conexion=mainModel::conectar();
          //contador de segundos en total
         
          $contadortotal=0;
          $datostotal = $conexion->query("
          SELECT TIMESTAMPDIFF(SECOND, `fecha_inicio`,`fecha_fin`) as segundos
          FROM `controlusuario` WHERE fecha BETWEEN '$elMesPasado' AND '$fecha'");
          $datostotal = $datostotal->fetchAll();
          foreach ($datostotal as $rowstotal) {
        
            $contadortotal=$contadortotal+$rowstotal['segundos'];
            
          }

         
            $hours=floor($contadortotal / 3600);
            $minutos= floor(($contadortotal % 3600)/60);
            $segundos=(($contadortotal % 3600)%60);
          

          $table.='
          <h4 class="text-primary text-center">Desde '. $elMesPasad.' hasta '.$fech.' </h4>
          <h3><i class="fa fa-clock-o text-danger icon-lg"></i> '.$hours.' h '.$minutos.' m '.$segundos.' s </h3>
          <div class="table-responsive">
          <table class="table table-hover dataTable no-footer" id="bootstrap-data-tablee" role="grid" aria-describedby="bootstrap-data-table_info">
              <thead class="table-danger">
             
                <tr>
                  <th>
                   Codigo Usuario
                  </th>
                  <th>
                    Nombre Usuario
                  </th>
                  <th>
                    Interaciones
                  </th>
                  <th>
                   Tiempo
                  </th>
                  <th>
                    Porcentaje
                  </th>

                 
                </tr>
              </thead>
              <tbody>
              ';
          
          //mostrar todos los usuarios activos
            
            $datosusuario = $conexion->query("
            SELECT * FROM usuario WHERE estado_us=1 AND permisos=3");
            $datosusuario = $datosusuario->fetchAll();
            foreach ($datosusuario as $rowsusuario) {
              $idusuario=$rowsusuario['idusuario'];


              //funcion contar segundos por cada usuario
              $cont=0;
              $contadorsegundo=0;
              $datoscontrol = $conexion->query("
              SELECT TIMESTAMPDIFF(SECOND, `fecha_inicio`,`fecha_fin`) as segundos
              FROM `controlusuario` WHERE codigousuario='$idusuario' AND 	fecha BETWEEN '$elMesPasado' AND '$fecha'");
              $datoscontrol = $datoscontrol->fetchAll();
              foreach ($datoscontrol as $rowscontrol) {
            
                $contadorsegundo=$contadorsegundo+$rowscontrol['segundos'];
                $cont++;
              }

              $hours2=floor($contadorsegundo / 3600);
              $minutos2= floor(($contadorsegundo % 3600)/60);
              $segundos2=(($contadorsegundo % 3600)%60);
              if($contadortotal>0){
              $porcentaje= ($contadorsegundo*100)/$contadortotal;}
           
            
            $table.='
           
            <tr>
                <td class="font-weight-medium">
                  '.$rowsusuario['codigousuario'].'
                </td>
                <td class="font-weight-medium">
                '.$rowsusuario['nombre_us'].'
                </td>

                <td class="font-weight-medium">
                '.$cont.'
                </td>
                
                <td>
                '.$hours2.' h '.$minutos2.' m '.$segundos2.' s
                </td>
                <td>
                '.round($porcentaje,2).'%
                </td>

                

          </tr> 
          ';
         }

            
                return $table;

        }



        public function tabla_busqueda_control_usuarios(){

          $fechainicio=$_POST['fechainicio_usuario'];
          $fechafin=$_POST['fechafin_usuario'];
         
          $table="";
          $idusuario=0;
          $porcentaje=0;
          $fecha=date("Y-m-d");

          $conexion=mainModel::conectar();
          //contador de segundos en total
          $contadortotal=0;
          $datostotal = $conexion->query("
          SELECT TIMESTAMPDIFF(SECOND, `fecha_inicio`,`fecha_fin`) as segundos
          FROM `controlusuario` WHERE fecha BETWEEN '$fechainicio' AND '$fechafin'");
          $datostotal = $datostotal->fetchAll();
          foreach ($datostotal as $rowstotal) {
        
            $contadortotal=$contadortotal+$rowstotal['segundos'];
          }

         
            $hours=floor($contadortotal / 3600);
            $minutos= floor(($contadortotal % 3600)/60);
            $segundos=(($contadortotal % 3600)%60);
          

          $table.=' <p class="text-danger">Tiempo total de atencion al cliente entre '. $fechainicio.' - '. $fechafin.' :</p><h3><i class="fa fa-clock-o text-danger icon-lg"></i> '.$hours.' h '.$minutos.' m '.$segundos.' s </h3>
          <div class="table-responsive">
          <table class="table table-hover dataTable no-footer" id="bootstrap-data-table" role="grid" aria-describedby="bootstrap-data-table_info">
              <thead class="table-danger">
             
                <tr>
                  <th>
                   Codigo Usuario
                  </th>
                  <th>
                    Nombre Usuario
                  </th>
                  <th>
                    Interaciones
                  </th>
                  <th>
                   Tiempo
                  </th>
                  <th>
                    Porcentaje
                  </th>

                  <th>
                    Fecha (Hoy)
                  </th>
                 
                </tr>
              </thead>
              <tbody>
              ';
          
          //mostrar todos los usuarios activos
            
            $datosusuario = $conexion->query("
            SELECT * FROM usuario WHERE estado_us=1 AND permisos=3");
            $datosusuario = $datosusuario->fetchAll();
            foreach ($datosusuario as $rowsusuario) {
              $idusuario=$rowsusuario['idusuario'];


              //funcion contar segundos por cada usuario
              $contadorsegundo=0;
              $datoscontrol = $conexion->query("
              SELECT TIMESTAMPDIFF(SECOND, `fecha_inicio`,`fecha_fin`) as segundos
              FROM `controlusuario` WHERE codigousuario='$idusuario' AND 	fecha BETWEEN '$fechainicio' AND '$fechafin'");
              $datoscontrol = $datoscontrol->fetchAll();
              foreach ($datoscontrol as $rowscontrol) {
            
                $contadorsegundo=$contadorsegundo+$rowscontrol['segundos'];
              }

              $hours2=floor($contadorsegundo / 3600);
              $minutos2= floor(($contadorsegundo % 3600)/60);
              $segundos2=(($contadorsegundo % 3600)%60);
              if($contadortotal>0){
              $porcentaje= ($contadorsegundo*100)/$contadortotal;}
           
            
            $table.='
           
            <tr>
                <td class="font-weight-medium">
                  '.$rowsusuario['codigousuario'].'
                </td>
                <td class="font-weight-medium">
                '.$rowsusuario['nombre_us'].'
                </td>

                <td class="font-weight-medium">
                '.$rowsusuario['nombre_us'].'
                </td>
                
                <td>
                '.$hours2.' h '.$minutos2.' m '.$segundos2.' s
                </td>
                <td>
                '.round($porcentaje,2).'%
                </td>

                <td>
                '.$fecha.'
                </td>

                

          </tr> 
          ';
         }

            
                return $table;

             }
    }