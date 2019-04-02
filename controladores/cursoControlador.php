<?php


if ($peticionAjax) {
    require_once('../modelos/cursoModelo.php');
} else {
    require_once('./modelos/cursoModelo.php');
}

class cursoControlador extends cursoModelo
{

    public function agregar_curso_controlador()
    {
        $categoria = mainModel::limpiar_cadena($_POST['categoria']);
        $nombre = mainModel::limpiar_cadena($_POST['nombre']);
        $duracion = mainModel::limpiar_cadena($_POST['duracion']);
        $descripcion = mainModel::limpiar_cadena($_POST['descripcion']);
        $fechainicio = mainModel::limpiar_cadena($_POST['fechainicio']);
        $fechafin = mainModel::limpiar_cadena($_POST['fechafin']);
        $horario = mainModel::limpiar_cadena($_POST['horario']);
        $costomatricula = mainModel::limpiar_cadena($_POST['costomatricula']);
        $costocertificado = mainModel::limpiar_cadena($_POST['costocertificado']);
        $costoalternativo = mainModel::limpiar_cadena($_POST['costoalternativo']);
        $horascertificado = mainModel::limpiar_cadena($_POST['horascertificado']);
        $modalidad = mainModel::limpiar_cadena($_POST['modalidad']);
        $docente = mainModel::limpiar_cadena($_POST['docente']);
        $sesion="disponible";

        $datosCurso = [
            "Categoria" => $categoria,
            "Nombre" => $nombre,
            "Descripcion" => $descripcion,
            "Duracion" => $duracion,
            "FechaI" => $fechainicio,
            "FechaF" => $fechafin,
            "Horario" => $horario,
            "Costomatricula" => $costomatricula,
            "Costocerti" => $costocertificado,
            "Costoalternativo" => $costoalternativo,
            "Horascerti" => $horascertificado,
            "Modalidad" => $modalidad,
            "Docente" => $docente,
            "Sesion"=>$sesion

        ];
        $guardarCurso = cursoModelo::agregar_curso_modelo($datosCurso);
       
       /* if($guardarCurso->rowCount()>=1){
            $alerta=[
                "Alerta"=>"limpiar",
                "Titulo"=>"Usuario Registrado",
                "Texto"=>"El usuario se ha registrado con exito en el sistema",
                "Tipo"=>"success"
            ];
        }else{
            $alerta=[
                "Alerta"=>"simple",
                "Titulo"=>"Ocurrio un error inesperado",
                "Texto"=>"No hemos podido insertar el usuario en el sistema",
                "Tipo"=>"error"
            ];
        }
       */
       
      if($guardarCurso->rowCount()>=1){
           $direccion=SERVERURL."listacurso";
          header('location:'.$direccion);

          
      }

          //  return mainModel::sweet_alert($alerta);

    }


    public function actualizar_curso_controlador()
    {   
        $idespecialidad = mainModel::limpiar_cadena($_POST['idespecialidad']);
        $categoria = mainModel::limpiar_cadena($_POST['categoria']);
        $nombre = mainModel::limpiar_cadena($_POST['nombre']);
        $duracion = mainModel::limpiar_cadena($_POST['duracion']);
        $descripcion = mainModel::limpiar_cadena($_POST['descripcion']);
        $fechainicio = mainModel::limpiar_cadena($_POST['fechainicio']);
        $fechafin = mainModel::limpiar_cadena($_POST['fechafin']);
        $horario = mainModel::limpiar_cadena($_POST['horario']);
        $costomatricula = mainModel::limpiar_cadena($_POST['costomatricula']);
        $costocertificado = mainModel::limpiar_cadena($_POST['costocertificado']);
        $costoalternativo = mainModel::limpiar_cadena($_POST['costoalternativo']);
        $horascertificado = mainModel::limpiar_cadena($_POST['horascertificado']);
        $modalidad = mainModel::limpiar_cadena($_POST['modalidad']);
        $docente = mainModel::limpiar_cadena($_POST['docente']);

        $datosCurso = [
            "Idespecialidad" => $idespecialidad,
            "Categoria" => $categoria,
            "Nombre" => $nombre,
            "Descripcion" => $descripcion,
            "Duracion" => $duracion,
            "FechaI" => $fechainicio,
            "FechaF" => $fechafin,
            "Horario" => $horario,
            "Costomatricula" => $costomatricula,
            "Costocerti" => $costocertificado,
            "Costoalternativo" => $costoalternativo,
            "Horascerti" => $horascertificado,
            "Modalidad" => $modalidad,
            "Docente" => $docente

        ];
        $ActualizarCurso = cursoModelo::actualizar_curso_modelo($datosCurso);
           $direccion=SERVERURL."listacurso";
          header('location:'.$direccion);
    }

    
    public function eliminar_curso_controlador()
    {
        $idespecialidad = mainModel::limpiar_cadena($_POST['idespecialidad']);
        $estadoactual = 1;
       

        $datosCurso = [
            "Idespecialidad" => $idespecialidad,
            "Estadoactual" => $estadoactual
          

        ];
        $ActualizarCurso = cursoModelo::eliminar_curso_modelo($datosCurso);
           $direccion=SERVERURL."listacurso";
          header('location:'.$direccion);




    }


    //mostrar tabla estados
    public function leer_cursos_controlador()
    {
        $table = "";
        $conexion = mainModel::conectar();
        $datos = $conexion->query("
        SELECT * FROM especialidad WHERE estado_actual=0  and fecha_fin>curdate() ORDER BY `especialidad`.`fecha_inicio` DESC ");

        $datos = $datos->fetchAll();
        foreach ($datos as $rows) {

            //nombre de la categoia
            $idcat = $rows['idcategoria'];
            $datos2 = $conexion->query("
            SELECT nombre_cat FROM categoria WHERE idcategoria='$idcat'");
            foreach ($datos2 as $rows2) {
                $categoria = $rows2['nombre_cat'];
            }


            $table .= '
                <tr>
                            <td>' . $rows['idespecialidad'] . '</td>
                            <td>' . $categoria . '</td>
                            <td>' . $rows['nombre_es'] . '</td>                  
                            <td>' . $rows['fecha_inicio'] . '</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#'.$rows['idespecialidad'].'">
                                    <i class="fa fa-pencil"></i> Editar
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#'.$rows['idespecialidad'].'1">
                                    <i class="fa fa-trash-o"></i> Eliminar
                                </button>
                            </td>
                </tr>

              ';

                //EDITAR
                $table.='
                <div class="modal fade" id="'.$rows['idespecialidad'].'" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header bg-warning text-center">
                                    <h4 class="text-light text-center">
                                        <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-pencil text-warning"></i></button>

                                        Editar </h4>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-white">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h1 class="card-title"> Verifique todos los datos ingresados antes de confirmar</h1>
                                            <hr>
                                            <form  action="'.SERVERURL.'ajax/cursoAjax.php" method="POST" class="forms-sample" autocomplete="off">
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="exampleFormControlSelect1">Tipo</label>
                                                                <select class="form-control form-control-lg" name="categoria" id="categoria">
                                                                    <option value="'.$rows['idcategoria'].'">'.$categoria.'</option>
                                                                    <option value="1">Curso</option>
                                                                    <option value="2">Diplomado</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-8">
                                                                <label>Nombre</label>
                                                                <input type="hidden" class="form-control form-control-lg" name="idespecialidad" id="idespecialidad" value="'.$rows['idespecialidad'].'" placeholder="Nombre del curso o diplomado" required>
                                                                <input type="text" class="form-control form-control-lg" name="nombre" id="nombre" value="'.$rows['nombre_es'].'" placeholder="Nombre del curso o diplomado" required>
                                                            </div>
                                    
                                                        </div>
                                    
                                                        <div class="row">
                                    
                                                           
                                    
                                                            <div class="form-group col-md-12">
                                                                <label>Descripcion</label>
                                                                <input type="text" class="form-control form-control-lg" name="descripcion" id="descripcion" value="'.$rows['descripcion_es'].'" placeholder="Corta descripcion del curso" required>
                                                            </div>
                                    
                                                                    
                                                            <div class="form-group col-md-6">
                                                                <label>Fecha Inicio</label>
                                                                <div class="input-group date border-primary form_date col-md-12 input-group-append" >
                                                                    <input class="form-control" type="date"  name="fechainicio" id="fechainicio"  value="'.$rows['fecha_inicio'].'" required>
                                                                
                                                                </div>
                                    
                                                            </div>
                                    
                                    
                                    
                                                            <div class="form-group col-md-6">
                                                                <label>Fecha Fin</label>
                                                                <div class="input-group date border-primary form_date col-md-12 input-group-append">
                                                                    <input class="form-control" type="date" name="fechafin" id="fechafin" value="'.$rows['fecha_fin'].'" required>
                                                                </div>
                                    
                                                            </div>
                                    
                                                            <div class="form-group col-md-4">
                                                                <label>Duracion</label>
                                                                <input type="text" class="form-control form-control-lg" name="duracion" id="duracion" value="'.$rows['duracion_es'].'" placeholder="Duracion" required>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Horario</label>
                                                                <input type="text" class="form-control" name="horario" id="horario" value="'.$rows['horario'].'" placeholder="Horario de clases" aria-label="Horario" required>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Costo Matricula</label>
                                                                <input type="number" class="form-control" name="costomatricula" id="costomatricula" value="'.$rows['costo_matricula'].'" placeholder="Costo matricula" aria-label="Costo Matricula" required>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Costo Certificado</label>
                                                                <input type="number" class="form-control" name="costocertificado" id="costocertificado" value="'.$rows['costo_certi'].'" placeholder="Costo certificado" aria-label="Costo Certificado" required>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Costo Alternativo</label>
                                                                <input type="number" class="form-control" name="costoalternativo" id="costoalternativo" value="'.$rows['costo_alternativo'].'" placeholder="Costo alternativo" aria-label="Costo alternativo" required>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Horas de certificación</label>
                                                                <input type="text" class="form-control form-control-lg" name="horascertificado" id="horascertificado" value="'.$rows['horas_certificado'].'" placeholder="Horas de certificacion" aria-label="Horas de certificacion" required>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="exampleFormControlSelect1">Modalidad</label>
                                                                <select class="form-control form-control-lg" name="modalidad" id="modalidad" required>
                                                                    <option value="'.$rows['modalidad'].'">Virtual en Vivo</option>
                                                                    <option value="1">Virtual en Vivo</option>
                                                                    <option value="2">Virtual /Solo accesos </option>
                                                                    <option value="3">Presencial </option>
                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <label>Docente</label>
                                                                <input type="text" class="form-control" name="docente" id="docente" value="'.$rows['docente'].'" placeholder="Nombre del docente" aria-label="Nombre del Docente" required>
                                                            </div>
                                    
                                                        </div>
                                    
                                    
                                                        <div class="row">

                                                      
                                                            <div class="form-group">
                                                                <button type="submit" name="actualizarcurso" class="btn btn-warning"><i class="fa fa-check"></i> Actualizar</button>
                                                                
                                                                <button type="button" class="btn btn-info" data-dismiss="modal" >
                                                                    <i class="fa fa-meh-o"></i> Cancel
                                                                </button>

                                                            
                                    
                                                            </div>
                                                        </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                ';


                //ELIMINAR
                $table.='
                <div class="modal fade" id="'.$rows['idespecialidad'].'1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header bg-danger text-center">
                            <h4 class="text-light text-center">
                                <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-exclamation text-danger"></i></button>

                                ¿Esta seguro de eliminar el estado</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-white">×</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body bg-center">
                            <div class="row">
                              <form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST" class="forms-sample" autocomplete="off">
                                                         
                                <div class="col-md-2">
                                    <input type="hidden" class="form-control" name="idespecialidad" id="idespecialidad" value="'.$rows['idespecialidad'].'" readonly="readonly">
                                </div>
                                <div class="col-md-8 form-group">
                                <button type="submit" name="eliminar_curso" id="eliminar_curso" class="btn btn-danger"><i class="fa fa-check"></i>Eliminar</button>

                                <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class=""><i class="fa fa-meh-o"></i> Cancel</a></span>
                                    </button>
                                </div>
                                <div class="col-md-2"></div>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
                ';
        }
        return $table;
    }



    public function mostrar_notificaciones_controlador(){
        $notifiacion="";
        $clientesnuevos=0;
        $des=1000000;
        $fecha=date("Y-m-d");
        


        $conexion = mainModel::conectar();


        $datosnuevos = $conexion->query("
        SELECT idespecialidad FROM interes WHERE idestado=1");
        $datosnuevos = $datosnuevos->fetchAll();
        foreach ($datosnuevos as $rowsnuevos) {
            $nuevos=$rowsnuevos['idespecialidad'];

            $datosEspecia = $conexion->query("
            SELECT * FROM especialidad WHERE idespecialidad='$nuevos'");
            $datosEspecia = $datosEspecia->fetchAll();
            foreach ($datosEspecia as $rowsespe) {
                $especialidads=$rowsespe['nombre_es'];
                
                $datosfinal = $conexion->query("
                SELECT COUNT(*) AS nuevosfinal FROM interes 
                WHERE idespecialidad='$nuevos' and idestado=1");
                $datosfinal = $datosfinal->fetchAll();
                foreach ($datosfinal as $rowsfinal) {
                    $nuevosfinal=$rowsfinal['nuevosfinal'];
                }

            }
                    if($nuevos==$des){
                       
                       
                    }else{
                        $des=$nuevos;
                        $notifiacion.='
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                            '.$nuevosfinal.'
                            </div>
                          </div>
                          <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-medium text-dark">'.$especialidads.'</h6>
                            <p class="font-weight-light small-text">
                              Clientes nuevos 
                            </p>
                          </div>
                        </a>';
                  
                  
            
           

        }
    }


      //contado la cantidad de nuevos
        $datosSesion2 = $conexion->query("
        SELECT COUNT(*) AS nuevos FROM interes WHERE idestado=1");

        $datosSesion2 = $datosSesion2->fetchAll();
        foreach ($datosSesion2 as $rowssesion2) {
            $clientesnuevos=$rowssesion2['nuevos']; }


        //cursos con las notificaciones que esta programadas para hoy
        $datosSesion = $conexion->query("
        SELECT * FROM interes WHERE DATE_FORMAT(`fecha_notificacion`,'%Y-%m-%d')=curdate()");
        $datosSesion = $datosSesion->fetchAll();
        foreach ($datosSesion as $rowssesione) {
            $idinteres=$rowssesione['idespecialidad'];
            $hora=$rowssesione['fecha_notificacion'];

            $datosSesiones = $conexion->query("
            SELECT * FROM especialidad WHERE idespecialidad='$idinteres'");
            $datosSesiones = $datosSesiones->fetchAll();
            foreach ($datosSesiones as $rowssesiones) {
                $especialidad=$rowssesiones['nombre_es'];

                $notifiacion.='   <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                   1
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium text-dark"> '.$especialidad.' </h6>
                    <p class="font-weight-light small-text">
                     llamar '. $hora.' 
                    </p>
                  </div>
                </a>';
            
            }
        
        }

        $notifiacion.='
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <div class="preview-icon bg-danger">
            '.$clientesnuevos.'
            </div>
          </div>
          <div class="preview-item-content">
            <h6 class="preview-subject font-weight-medium text-dark">Clientes Nuevos</h6>
            <p class="font-weight-light small-text">
              Todos los cursos
            </p>
          </div>
        </a>


     


        
        ';
        return $notifiacion;

    }
    //mostrar cursos en el inicio
    public function mostrar_cursos_controlador()
    {
        
        $tarjeta = "";
        $conexion = mainModel::conectar();
        $fecha=date("Y-m-d");

        //validacion 
        $codigousuario=$_SESSION['codigo_srcp'];
        $con=0;
        $datosSesion = $conexion->query("
        SELECT COUNT(*) AS sesiones FROM especialidad WHERE sesion='$codigousuario'");

        $datosSesion = $datosSesion->fetchAll();
        foreach ($datosSesion as $rowssesion) {
           if($rowssesion['sesiones']>=1){
                $con=1;
           }
        }

        if($con==0){
        $datos = $conexion->query("
            SELECT * FROM especialidad WHERE estado_actual=0  AND  fecha_fin > CURDATE() ORDER BY sesion<>'disponible' DESC,	fecha_inicio ");
    
        $datos = $datos->fetchAll();
        foreach ($datos as $rows) {


            $tarjeta .= '
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <h4 class="text-center">'.$rows['nombre_es'].'</h4>
                  <div class="float-left">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fa fa-calendar-o icon-sm text-danger"></i>
                          <p class="mb-0 ml-1">
                          FI : '.$rows['fecha_inicio'].'
                          </p>
                          
                      </div>
                      <div class="d-flex flex-row align-items-center">
                          <i class="fa fa-money icon-sm text-danger"></i>
                          <p class="mb-0 ml-1">
                          S/. '.($rows['costo_matricula']+$rows['costo_certi']).'
                          </p>
                      </div>
                    
                  </div>
                  <div class="float-right">
                    <p class="mb-0 text-right">Registros</p>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0">';

            $idinteres= $rows['idespecialidad'];
             $datos2 = $conexion->query("
            SELECT COUNT(*)  AS total FROM interes WHERE idespecialidad=$idinteres");
            $datos2 = $datos2->fetchAll();
            foreach ($datos2 as $rows2) {
                
            $tarjeta .= '<p><i class="fa fa-list-ul icon-sm text-success"></i> '.$rows2['total'].'</p>';

            }
            $tarjeta .= '
                        </h3>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                   <div class="btn-group" role="group" aria-label="First group">';

               if($rows['sesion']==$_SESSION['codigo_srcp']){
                $tarjeta .= '<a href="sesioncurso" class="btn btn-success"><i class="fa fa-star-o"></i> En linea</a>
               ';
             }
                if($rows['sesion']=="disponible"){
                  $tarjeta .= '<form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">
                    <input type="hidden" name="codigocurso" value="'.$rows['idespecialidad'].'">
                    <input type="hidden" name="codigousuario" value="'.$_SESSION['codigo_srcp'].'">
                    <button type="submit" name="ocuparcurso"  class="btn btn-primary"><i class="fa fa-star-o"></i> Disponible </button>
                   </form>  ';
                }

                if($rows['sesion']!=$_SESSION['codigo_srcp'] && $rows['sesion']!="disponible"){
                    $tarjeta .= '<a href="" class="btn btn-danger"><i class="fa fa-star-o"></i> Ocupado</a>
                   ';
                 }

                
            
            $tarjeta .= '<form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">
            <input type="hidden" name="codigocursover" value="'.$rows['idespecialidad'].'">
            <button type="submit" name="verinfocurso"  class="btn btn-dark"><i class="fa fa-eye"></i> Ver </button>
             </form>  
            
                      </div>
                  </div>
                  
                </div>
                
              
                ';
                  
                    $codigouser=$rows['sesion'];
                    $datosUSER = $conexion->query("
                        SELECT nombre_us FROM usuario WHERE codigousuario='$codigouser'");
                
                    $datosUSER = $datosUSER->fetchAll();
                    foreach ($datosUSER as $rowsUSER) {
                     $tarjeta .= ' <p class="text-muted mt-3 mb-0">
                     <i class="fa fa-user-circle-o mr-1" aria-hidden="true"></i> '.$rowsUSER['nombre_us'].'</p>';
                    }
            $tarjeta .= ' 
              </div>
            </div>
          </div>

                ';
        }}

        if($con==1){
            $datos = $conexion->query("
                SELECT * FROM especialidad WHERE sesion!='disponible'  ORDER BY 	fecha_inicio");
        
            $datos = $datos->fetchAll();
            foreach ($datos as $rows) {
    
    
                $tarjeta .= '
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="text-center">'.$rows['nombre_es'].'</h4>
                      <div class="float-left">
                        <div class="d-flex flex-row align-items-center">
                            <i class="mdi mdi-compass icon-sm text-danger"></i>
                              <p class="mb-0 ml-1">
                              '.$rows['fecha_inicio'].'
                              </p>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                              <i class="mdi mdi-compass icon-sm text-danger"></i>
                              <p class="mb-0 ml-1">
                              '.$rows['costo_matricula'].'
                              </p>
                          </div>
                        
                      </div>
                      <div class="float-right">
                        <p class="mb-0 text-right">Registros</p>
                        <div class="fluid-container">
                          <h3 class="font-weight-medium text-right mb-0">';
    
                $idinteres= $rows['idespecialidad'];
                 $datos2 = $conexion->query("
                SELECT COUNT(*)  AS total FROM interes WHERE idespecialidad=$idinteres");
                $datos2 = $datos2->fetchAll();
                foreach ($datos2 as $rows2) {
                    
                $tarjeta .= '<p> '.$rows2['total'].'</p>';
    
                }
                $tarjeta .= '
                            </h3>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                       <div class="btn-group" role="group" aria-label="First group">';
    
                   if($rows['sesion']==$_SESSION['codigo_srcp']){
                    $tarjeta .= '<a href="sesioncurso" class="btn btn-success"><i class="fa fa-star-o"></i> En linea</a>
                   ';
                 }
                    if($rows['sesion']=="disponible"){
                      $tarjeta .= '<form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">
                        <input type="hidden" name="codigocurso" value="'.$rows['idespecialidad'].'">
                        <input type="hidden" name="codigousuario" value="'.$_SESSION['codigo_srcp'].'">
                        <button type="submit" name="ocuparcurso"  class="btn btn-primary"><i class="fa fa-star-o"></i> Disponible </button>
                       </form>  ';
                    }
    
                    if($rows['sesion']!=$_SESSION['codigo_srcp'] && $rows['sesion']!="disponible"){
                        $tarjeta .= '<a href="" class="btn btn-danger"><i class="fa fa-star-o"></i> Ocupado</a>
                       ';
                     }
                     

                     $tarjeta .= '<form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">
            <input type="hidden" name="codigocursover" value="'.$rows['idespecialidad'].'">
            <button type="submit" name="verinfocurso"  class="btn btn-dark"><i class="fa fa-eye"></i> Ver </button>
             </form>  
                    
                     </div>
                      </div>
                      
                    </div>
                    
                  
                    
                ';
                  
                $codigouser=$rows['sesion'];
                $datosUSER = $conexion->query("
                    SELECT nombre_us FROM usuario WHERE codigousuario='$codigouser'");
            
                $datosUSER = $datosUSER->fetchAll();
                foreach ($datosUSER as $rowsUSER) {
                 $tarjeta .= ' <p class="text-muted mt-3 mb-0">
                 <i class="fa fa-user-circle-o mr-1" aria-hidden="true"></i> Usuario:  '.$rowsUSER['nombre_us'].'</p>';
                }
        $tarjeta .= ' 
               
               
        </div>
        </div>
        </div>
    
                    ';
            }}
        return $tarjeta;
    }




    public function mostrar_tabla_cursos_controlador()
    {
        
        $tarjeta = "";
        $conexion = mainModel::conectar();
        $fecha=date("Y-m-d");

        //validacion 
        $codigousuario=$_SESSION['codigo_srcp'];
        $con=0;
        $datosSesion = $conexion->query("
        SELECT COUNT(*) AS sesiones FROM especialidad WHERE sesion='$codigousuario'");

        $datosSesion = $datosSesion->fetchAll();
        foreach ($datosSesion as $rowssesion) {
           if($rowssesion['sesiones']>=1){
                $con=1;
           }
        }

        if($con==0){
        $datos = $conexion->query("
            SELECT * FROM especialidad WHERE estado_actual=0 ORDER BY sesion<>'disponible' DESC,	fecha_inicio ");
    
        $datos = $datos->fetchAll();
        foreach ($datos as $rows) {

            $tarjeta .= '  
                <tr class="bg bg-inverse-primary">
                    <td>'.$rows['nombre_es'].'</td>
                    <td>'.$rows['fecha_inicio'].'</td>
                    <td>'.($rows['costo_matricula']+$rows['costo_certi']).'</td>
                                  
                 ';

  

            $idinteres= $rows['idespecialidad'];
             $datos2 = $conexion->query("
            SELECT COUNT(*)  AS total FROM interes WHERE idespecialidad=$idinteres");
            $datos2 = $datos2->fetchAll();
            foreach ($datos2 as $rows2) {

                $tarjeta .= '  
              
                    <td>'.$rows2['total'].'</td>
                
                 
                 ';
      
            }
       

               if($rows['sesion']==$_SESSION['codigo_srcp']){
                $tarjeta .= '<td><a href="sesioncurso" class="btn btn-success"><i class="fa fa-star-o"></i> En linea</a></td>
               ';
             }
                if($rows['sesion']=="disponible"){
                  $tarjeta .= '<td><form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">
                    <input type="hidden" name="codigocurso" value="'.$rows['idespecialidad'].'">
                    <input type="hidden" name="codigousuario" value="'.$_SESSION['codigo_srcp'].'">
                    <button type="submit" name="ocuparcurso"  class="btn btn-primary"><i class="fa fa-star-o"></i> Disponible </button>
                   </form></td>  ';
                }

                if($rows['sesion']!=$_SESSION['codigo_srcp'] && $rows['sesion']!="disponible"){
                    $tarjeta .= '<td><a href="" class="btn btn-danger"><i class="fa fa-star-o"></i> Ocupado</a></td>
                   ';
                 }

                
            
            $tarjeta .= '<td><form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">
            <input type="hidden" name="codigocursover" value="'.$rows['idespecialidad'].'">
            <button type="submit" name="verinfocurso"  class="btn btn-dark"><i class="fa fa-eye"></i> Ver </button>
             </form> </td>
             
             <td><i class="fa fa-user-o"></i> 
            
                 
              
                ';
                  
                    $codigouser=$rows['sesion'];
                    $datosUSER = $conexion->query("
                        SELECT nombre_us FROM usuario WHERE codigousuario='$codigouser'");
                
                    $datosUSER = $datosUSER->fetchAll();
                    foreach ($datosUSER as $rowsUSER) {
                     
                            $tarjeta .= '
                            '.$rowsUSER['nombre_us'].'';

                    }

                    $tarjeta .= '</td></tr>';
        
        }}

        if($con==1){
            $datos = $conexion->query("
                SELECT * FROM especialidad WHERE sesion!='disponible'  ORDER BY 	fecha_inicio");
        
            $datos = $datos->fetchAll();
            foreach ($datos as $rows) {
    
    
                $tarjeta .= '  
                <tr>
                    <td>'.$rows['nombre_es'].'</td>
                    <td>'.$rows['fecha_inicio'].'</td>
                    <td>'.($rows['costo_matricula']+$rows['costo_certi']).'</td>
                                  
                 ';

    
                $idinteres= $rows['idespecialidad'];
                 $datos2 = $conexion->query("
                SELECT COUNT(*)  AS total FROM interes WHERE idespecialidad=$idinteres");
                $datos2 = $datos2->fetchAll();
                foreach ($datos2 as $rows2) {
                    
                $tarjeta .= '<td> '.$rows2['total'].'</td>';
    
                }
                  
                   if($rows['sesion']==$_SESSION['codigo_srcp']){
                    $tarjeta .= '<td> <a href="sesioncurso" class="btn btn-success"><i class="fa fa-star-o"></i> En linea</a></td> 
                   ';
                 }
                    if($rows['sesion']=="disponible"){
                      $tarjeta .= '<td><form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">
                        <input type="hidden" name="codigocurso" value="'.$rows['idespecialidad'].'">
                        <input type="hidden" name="codigousuario" value="'.$_SESSION['codigo_srcp'].'">
                        <button type="submit" name="ocuparcurso"  class="btn btn-primary"><i class="fa fa-star-o"></i> Disponible </button>
                       </form></td>   ';
                    }
    
                    if($rows['sesion']!=$_SESSION['codigo_srcp'] && $rows['sesion']!="disponible"){
                        $tarjeta .= '<td><a href="" class="btn btn-danger"><i class="fa fa-star-o"></i> Ocupado</a></td>
                       ';
                     }
                     

                     $tarjeta .= '<td><form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">
            <input type="hidden" name="codigocursover" value="'.$rows['idespecialidad'].'">
            <button type="submit" name="verinfocurso"  class="btn btn-dark"><i class="fa fa-eye"></i> Ver </button>
             </form></td>  
                    
                   
                  
                    
                ';
                  
                $codigouser=$rows['sesion'];
                $datosUSER = $conexion->query("
                    SELECT nombre_us FROM usuario WHERE codigousuario='$codigouser'");
            
                $datosUSER = $datosUSER->fetchAll();
                foreach ($datosUSER as $rowsUSER) {
                 $tarjeta .= '<td>  Usuario:  '.$rowsUSER['nombre_us'].'</td></tr>';
                }
     
            }}
            
        return $tarjeta;
    }



    /*public function iniciar_sesion_curso(){
        session_start(['name'=>'SRCP']);

        if($_SESSION['sesioncurso']=="libre"){
            $Codigo=$_GET['Curso'];
           //$Codigo=1;
           $_SESSION['curso']= $Codigo;
            $datos=[
                "Usuario"=>$_SESSION['codigo_srcp'],
                 "Curso"=>$Codigo
              
            ];
            //return "true";
            return cursoModelo::iniciar_sesion_curso_modelo($datos);
        }
        else if($_SESSION['sesioncurso']=="ocupado"){
            return "ocupado";
        }else{
            return "false";
        }
     
       
    }*/

   /* public function cerrar_sesion_curso(){
        session_start(['name'=>'SRCP']);

        if($_SESSION['sesioncurso']=="ocupado"){
            $Codigo=$_GET['Especialidad'];
           //$Codigo=1;
         
            $datos=[
              
                 "Curso"=>$Codigo
              
            ];
            //return "true";
            return cursoModelo::cerrar_sesion_curso_modelo($datos);
        }
       else{
            return "false";
        }
     
       
    }*/
     //mostrar cursos en el inicio
    /* public function mostrar_sesion_cursos_controlador()
     {
        //session_start(['name'=>'SRCP']);
        //$categoria = mainModel::limpiar_cadena($_GET['Curso']);    
         $tarjeta = "";
         $conexion = mainModel::conectar();
         $curso=$_SESSION['curso'];      
         $datosd = $conexion->query("
             SELECT * FROM especialidad WHERE idespecialidad='$curso' ");
 
         $datosd = $datosd->fetchAll();
         foreach ($datosd as $rows) {
 
 
             $tarjeta .= '
                    '.$rows['nombre_es'].'
                
                 ';
         }
         return $tarjeta;
     }
*/

     public function mostrar_sesion2_cursos_controlador()
     {
        $codigocurso = mainModel::limpiar_cadena($_POST['codigocurso']);
        $codigousuario = mainModel::limpiar_cadena($_POST['codigousuario']);
       

        $datosCurso = [
            "Codigocurso" => $codigocurso,
            "Codigusuario" => $codigousuario,
        

        ];
        $guardarsesionCurso = cursoModelo::agregar_sesion_curso_modelo($datosCurso);
        if($guardarsesionCurso->rowCount()>=1){
            $direccion=SERVERURL."sesioncurso";
           header('location:'.$direccion);

          
        }

        
    
    
    }

    public function ver_curso_controlador(){
        $codigocurso = mainModel::limpiar_cadena($_POST['codigocursover']);
       // $guardarsesionCurso = cursoModelo::agregar_sesion_curso_modelo($datosCurso);
       session_start(['name'=>'SRCP']);
       $_SESSION['cursover']=$codigocurso;
            $direccion=SERVERURL."vercurso";
           header('location:'.$direccion);

        
    }

    public function cerrar_cursos2_controlador()
    {
       $codigocerrar= mainModel::limpiar_cadena($_POST['codigocerrar']);
     
       $datosCursoCerrar = [
           "Codigocursoc" => $codigocerrar  

       ];
       $guardarsesionCurso = cursoModelo::cerrar_sesion_curso_modelo($datosCursoCerrar);
       if($guardarsesionCurso->rowCount()>=1){
           $direccion=SERVERURL."home";
          header('location:'.$direccion);
         
       }
 
   }

   public function top_curso_controlador(){
    $tarjeta = "";

    $conexion=mainModel::conectar();
    $datos = $conexion->query("
    SELECT * FROM especialidad WHERE estado_actual=0  ORDER BY 	fecha_inicio");

    $datos = $datos->fetchAll();
    foreach ($datos as $rows) {

        
        

        $tarjeta .= '
        <div class="col-sm-4 col-md-3 grid-margin stretch-card ¿">
            <div class="card  badge-success">
                <div class="card-body">
                    <h4 class="card-title text-white text-center"><i class="fa fa-graduation-cap"></i>'.$rows['nombre_es'].'</h4>
                    <div class="media">
                        <h1>1 | </h1>
                        <div class="media-body">
                           ';

                        $idinteres= $rows['idespecialidad'];
                        $datos2 = $conexion->query("
                        SELECT COUNT(*)  AS total FROM interes WHERE idespecialidad=$idinteres");
                        $datos2 = $datos2->fetchAll();
                        foreach ($datos2 as $rows2) {
                            
                        $tarjeta .= ' <h4 class="card-text text-center">Número de Participantes : '.$rows2['total'].'</h4>';

                          }
                                
                         $tarjeta .= '</div>
                    </div>
                </div>
            </div>
        </div>';
   }
    return $tarjeta;
   }


    public function sesion_curso_exitoso_controlador()
    {
       //session_start(['name'=>'SRCP']);
       //$categoria = mainModel::limpiar_cadena($_GET['Curso']);    
        $tarjeta = "";
        
        $contadorestados=array();
        $conexion = mainModel::conectar();
        $usuario=$_SESSION['codigo_srcp'];
        $datosd = $conexion->query("
            SELECT * FROM especialidad WHERE sesion='$usuario' ");

        $datosd = $datosd->fetchAll();
        foreach ($datosd as $rows) {



            $tarjeta .= '<h3 class="text-primary">'.$rows['nombre_es'].'
                   <div class="btn-group dropdown float-right">
                        <button type="button" class="btn btn-success" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#agregarcli">
                            Agregar Cliente
                        </button>

                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            En línea
                        </button>
                        <div class="dropdown-menu ">
                            <form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">       
                            
                                <input type="hidden" name="codigocerrar" value="'.$rows['idespecialidad'].'">
                                   <button  type="submit" name="cerrarcurso" class="dropdown-item text-danger " >
                                <i class="fa fa-reply fa-fw"></i>
                                <p class="">Cerrar Session</p>
                            </button>
                            </form> 
                        </div>
                    </div>
                    </h3>
                ';

                //Descripcion del curso 
                $tarjeta .= '
                    <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-success mb-2">
                                    Detalle del Curso/Diplomado
                                </h2>

                                <div class="row">
                                    <div class="col-md-3">
                                        <address class="">
                                            <p class="font-weight-bold">
                                                Fecha
                                            </p>
                                            <p class="mb-2">
                                            '.$rows['fecha_inicio'].'
                                            </p>
                                            <p class="font-weight-bold">
                                                Duración
                                            </p>
                                            <p>
                                            '.$rows['duracion_es'].'
                                            </p>
                                        </address>
                                    </div>

                                    <div class="col-md-3">
                                        <address class="">
                                            <p class="font-weight-bold">
                                                Modalidad
                                            </p>
                                           
                                             '; 
                                             
                                    if($rows['modalidad']==1){
                                        $tarjeta .= '<p class="mb-2">Virtual en Vivo</p>';
                                            }
                                          else  if($rows['modalidad']==2){
                                                $tarjeta .= '<p class="mb-2">Solo Accesos</p>';
                                                    }else{
                                                        $tarjeta .= '<p class="mb-2">Presencial</p>';
                                              
                                                    }
                                    $tarjeta .= ' 
                                            <p class="font-weight-bold">
                                                Certificacion
                                            </p>
                                            <p>
                                            '.$rows['horas_certificado'].'
                                            </p>
                                        </address>
                                    </div>

                                    <div class="col-md-3">
                                        <address class="">
                                            <p class="font-weight-bold">
                                                Costo matricula
                                            </p>
                                            <p class="mb-2">
                                            '.$rows['costo_matricula'].'
                                            </p>
                                            <p class="font-weight-bold">
                                                Costo certificado
                                            </p>
                                            <p>
                                            '.$rows['costo_certi'].'
                                            </p>
                                        </address>
                                    </div>

                                    <div class="col-md-3">
                                        <address class="">
                                            <p class="font-weight-bold">
                                                Costo total
                                            </p>
                                            '; 
                                             
                                            $costototal=$rows['costo_matricula']+$rows['costo_certi'];
                                            
                                                $tarjeta .= '  <p class="mb-2">
                                               '.$costototal.'
                                            </p>';

                                                   
                                            $tarjeta .= '  
                                          
                                            <p class="font-weight-bold">
                                                Costo Alternativo
                                            </p>
                                            <p>
                                                '.$rows['costo_alternativo'].'
                                            </p>
                                        </address>
                                    </div>
                                </div>
                                <div class="row ">
                                ';

                               //ESTADOS
                                 //SECCION ESTADOS
           
                                                    
                          
                                //$estado=$rows['idestado'];
                                $to=0;
                                $datosEstado = $conexion->query("
                                SELECT * FROM estado WHERE estado_actual=1");
                                $datosEstado = $datosEstado->fetchAll();
                                foreach ($datosEstado as $rowsEstado) {




                                        //datos de interes 
                                            $t=80;
                                            $idestado=$rowsEstado['idestado'];
                                            $idespecialidad=$rows['idespecialidad'];
                                            $datosInteres = $conexion->query("
                                            SELECT COUNT(*) AS totalestado FROM interes WHERE idespecialidad='$idespecialidad' AND idestado='$idestado'");
                                        $datosInteres = $datosInteres->fetchAll();
                                        foreach ($datosInteres as $rowsInt) {
                                            $t=$rowsInt['totalestado'];
                                            
                                        
                                    }

                                 
                                                        
                                $tarjeta .= '   
                                    <div class="col-md-2 badge " style="background-color:'.$rowsEstado['color'].';">
                                        <div class="wrapper d-flex justify-content-between">
                                            <div class="side-left">
                                                <p class="mb-2 ">'.$rowsEstado['nombre_estado'].'</p>
                                                <p class="display-3 mb-4 font-weight-light text-white" >'.$t.'</p>
                                            </div>
                                        </div>
                                    </div>';
                                }

                                $tarjeta .= '   
                          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        return $tarjeta;
    }

    public function ver_sesion_curso_controlador(){
        $tarjeta = "";
        $idesp=$_SESSION['cursover'];
        $conexion = mainModel::conectar();
        $datosd = $conexion->query("
        SELECT * FROM especialidad WHERE idespecialidad='$idesp' ");

       $datosd = $datosd->fetchAll();
       foreach ($datosd as $rows) {

        $tarjeta .= '<h3 class="text-primary">'.$rows['nombre_es'].'
               <div class="btn-group dropdown float-right">
                  
                    <div class="dropdown-menu ">
                        <form action="'.SERVERURL.'ajax/cursoAjax.php" method="POST">       
                        
                            <input type="hidden" name="codigocerrar" value="'.$rows['idespecialidad'].'">
                               <button  type="submit" name="cerrarcurso" class="dropdown-item text-danger " >
                            <i class="fa fa-reply fa-fw"></i>
                            <p class="">Cerrar Session</p>
                        </button>
                        </form> 
                    </div>
                </div>
                </h3>
            ';

            //Descripcion del curso 
            $tarjeta .= '
                <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-success mb-2">
                                Detalle del Curso/Diplomado
                            </h2>

                            <div class="row">
                                <div class="col-md-3">
                                    <address class="">
                                        <p class="font-weight-bold">
                                            Fecha
                                        </p>
                                        <p class="mb-2">
                                        '.$rows['fecha_inicio'].'
                                        </p>
                                        <p class="font-weight-bold">
                                            Duración
                                        </p>
                                        <p>
                                        '.$rows['duracion_es'].'
                                        </p>
                                    </address>
                                </div>

                                <div class="col-md-3">
                                    <address class="">
                                        <p class="font-weight-bold">
                                            Modalidad
                                        </p>
                                       
                                         '; 
                                         
                                if($rows['modalidad']==1){
                                    $tarjeta .= '<p class="mb-2">Virtual en Vivo</p>';
                                        }
                                      else  if($rows['modalidad']==2){
                                            $tarjeta .= '<p class="mb-2">Solo Accesos</p>';
                                                }else{
                                                    $tarjeta .= '<p class="mb-2">Presencial</p>';
                                          
                                                }
                                $tarjeta .= ' 
                                        <p class="font-weight-bold">
                                            Certificacion
                                        </p>
                                        <p>
                                        '.$rows['horas_certificado'].'
                                        </p>
                                    </address>
                                </div>

                                <div class="col-md-3">
                                    <address class="">
                                        <p class="font-weight-bold">
                                            Costo matricula
                                        </p>
                                        <p class="mb-2">
                                        '.$rows['costo_matricula'].'
                                        </p>
                                        <p class="font-weight-bold">
                                            Costo certificado
                                        </p>
                                        <p>
                                        '.$rows['costo_certi'].'
                                        </p>
                                    </address>
                                </div>

                                <div class="col-md-3">
                                    <address class="">
                                        <p class="font-weight-bold">
                                            Costo total
                                        </p>
                                        '; 
                                         
                                        $costototal=$rows['costo_matricula']+$rows['costo_certi'];
                                        
                                            $tarjeta .= '  <p class="mb-2">
                                           '.$costototal.'
                                        </p>';

                                               
                                        $tarjeta .= '  
                                      
                                        <p class="font-weight-bold">
                                            Costo Alternativo
                                        </p>
                                        <p>
                                            '.$rows['costo_alternativo'].'
                                        </p>
                                    </address>
                                </div>
                            </div>
                         
                            ';
                        }
        return $tarjeta;
    }

    public function tabla_interesados_controlador()
    {
       //session_start(['name'=>'SRCP']);
       //$categoria = mainModel::limpiar_cadena($_GET['Curso']);    
        $idespecialidad=0;
        $tarjeta = "";
        $conexion = mainModel::conectar();

        //SELECIONADO CURSO
        $usuario=$_SESSION['codigo_srcp'];
        $datosEs = $conexion->query("
            SELECT * FROM especialidad WHERE sesion='$usuario' ");
        $datosEs = $datosEs->fetchAll();
        foreach ($datosEs as $rowsEs) {
            $idespecialidad=$rowsEs['idespecialidad'];
        }

       
        //SECCION INTERES
        $datosInteres = $conexion->query("
            SELECT * FROM interes WHERE idespecialidad='$idespecialidad' ORDER by idestado ");
        $datosInteres = $datosInteres->fetchAll();
        foreach ($datosInteres as $rows) {
            $interes_des=$rows['descri_estado'];

        //SELECIONAR cliente
        $codigoCliente=$rows['codigocliente'];
        $datosCliente = $conexion->query("
        SELECT * FROM cliente WHERE codigocliente='$codigoCliente' ");
        $datosCliente = $datosCliente->fetchAll();
     
        foreach ($datosCliente as $rowsCliente) {
            $tarjeta .= '
                    <tr>
                        <td>'.$rows['codigocliente'].'</td>
                        <td>'.$rowsCliente['nombres_cli'].'</td>
                        <td>'.$rowsCliente['apellidos_cli'].'</td>

                        <td class="text-danger">
                            <form action="'.SERVERURL.'ajax/clienteAjax.php" method="POST">
                                <input type="hidden" name="enlacecliente" value="'.$rows['codigocliente'].'">
                                <input type="hidden" name="idenestado" value="'.$rows['idestado'].'">
                                <input type="hidden" name="idinterescontrol" value="'.$rows['idinteres'].'">
                               
                                    <button type="submit" name="vistacambioestado" class="btn btn-success  btn-sm">
                                         Atender
                                    </button>
                              
                            </form>
                        </td>


                        <td>
                            <div class="btn-group dropdown float-right">';
                          
                            
                    //SECCION ESTADOS
                    $estado=$rows['idestado'];
                    $datosEstado = $conexion->query("
                    SELECT * FROM estado WHERE 	idestado='$estado' ");
                    $datosEstado = $datosEstado->fetchAll();
                    foreach ($datosEstado as $rowsEstado) {
                     $tarjeta .= '<button type="button" style="color:'.$rowsEstado['color'].';" class="btn  btn-sm white-text " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                 '.$rowsEstado['nombre_estado'].'
                                </button>

                                <button type="button" style="background-color:'.$rowsEstado['color'].';" class=" btn btn-inverse btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#'.$rowsEstado['idestado'].'">
                             
                                </button>

                            ';

                    }

                    $tarjeta .= '     
                            </div>
                        </td>
                        <td>
                        '.$rows['fecha_notificacion'].'
                        </td>
                        <td>
                        '.$rows['fecha_cambio_estado'].'
                        </td>
                     
                     </tr>';
        }}
        return $tarjeta;
    }

    public function solover_tabla_interesados_controlador()
    {
       //session_start(['name'=>'SRCP']);
       //$categoria = mainModel::limpiar_cadena($_GET['Curso']);    
        $idespecialidad=0;
        $tarjeta = "";
        $nombreusuario="";
        $conexion = mainModel::conectar();

        //SELECIONADO CURSO
        $idespe=$_SESSION['cursover'];
         
        //SECCION INTERES
        $datosInteres = $conexion->query("
            SELECT * FROM interes WHERE idespecialidad='$idespe' ORDER by idestado ");
        $datosInteres = $datosInteres->fetchAll();
        foreach ($datosInteres as $rows) {

            
            $coduser=$rows['idusuario'];
            $datosUusario = $conexion->query("
            SELECT nombre_us FROM usuario WHERE idusuario='$coduser'");
        $datosUusario = $datosUusario->fetchAll();
        foreach ($datosUusario as $rowsUsuario) {
            $nombreusuario=$rowsUsuario['nombre_us'];
        }

        //SELECIONAR cliente
        $codigoCliente=$rows['codigocliente'];
        $datosCliente = $conexion->query("
        SELECT * FROM cliente WHERE codigocliente='$codigoCliente' ");
        $datosCliente = $datosCliente->fetchAll();
     
        foreach ($datosCliente as $rowsCliente) {
            $tarjeta .= '
                    <tr>
                        <td>'.$rows['codigocliente'].'</td>
                        <td>'.$rowsCliente['nombres_cli'].'</td>
                        <td>'.$rowsCliente['apellidos_cli'].'</td>
                        <td>
                            <div class="btn-group dropdown float-right">';
                          
                            
                    //SECCION ESTADOS
                    $estado=$rows['idestado'];
                    $datosEstado = $conexion->query("
                    SELECT * FROM estado WHERE 	idestado='$estado' ");
                    $datosEstado = $datosEstado->fetchAll();
                    foreach ($datosEstado as $rowsEstado) {
                     $tarjeta .= '<button type="button" style="background-color:'.$rowsEstado['color'].';" class="btn  btn-sm white-text " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                 '.$rowsEstado['nombre_estado'].'
                                </button>

                                <button type="button" style="background-color:'.$rowsEstado['color'].';" class=" btn btn-inverse btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#'.$rowsEstado['idestado'].'">
                                      <i class="fa fa-comments-o"></i>
                                </button>

                                <!--NODAL DESCRIPCION DE ESTADO ACTUAL-->

                                <div class="modal fade" id="'.$rowsEstado['idestado'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!--Header-->
                                        <div class="modal-header " style="background-color:'.$rowsEstado['color'].';">
                                            <h3 class="text-white text-center">Estado 1</h3>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="white-text">×</span>
                                            </button>
                                        </div>

                                        <!--Body-->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <p class="text-center">Fecha 01/02/2019</p>
                                                <hr />
                                                <p>'.$rows['descri_estado'].'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                    }

                    $tarjeta .= '     
                            </div>
                        </td>
                       
                        <td>
                        '.$rows['fecha_cambio_estado'].'
                        </td>
                        <td>
                        '.$nombreusuario.'
                        </td>
                       
                        <td>
                            <a href="alumnodetalle.php" class="btn btn-inverse-dark ">Ver</a>
                        </td>
                     </tr>';
        }}
        return $tarjeta;
    }



    
    public function agregar_interesados_controlador()
    {
       //session_start(['name'=>'SRCP']);
       //$categoria = mainModel::limpiar_cadena($_GET['Curso']);    
        $idespecialidad=0;
        $tarjeta = "";
        $conexion = mainModel::conectar();

        //SELECIONADO CURSO
        $usuario=$_SESSION['codigo_srcp'];
        $datosEs = $conexion->query("
            SELECT * FROM especialidad WHERE sesion='$usuario' and estado_actual=0");
        $datosEs = $datosEs->fetchAll();
        foreach ($datosEs as $rowsEs) {
            $idespecialidad=$rowsEs['idespecialidad'];
        }

         $tarjeta .= '
         <div class="modal fade" id="agregarcli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header bg-success">
                            <h3 class="text-light text-center">Agregar Cliente</h3>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">×</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <div class="form-group">
                                <p class="text-center">Verifique todos los datos ingresados antes de confirmar</p>

                                <div class="row">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">

                                                <form action="'.SERVERURL.'ajax/clienteAjax.php" method="POST" class="forms-sample" autocomplete="off">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!--nombre/apellidos/correo-->

                                                            <div class="row">
                                                                <div class="col-md-3 form-group">
                                                                    <label for="exampleInputEmail1">DNI</label>
                                                                    <input type="hidden" class="form-control" name="idespecialidad" id="idespecialidad" value="'.$idespecialidad.'" >
                                                                    <input type="hidden" class="form-control" name="codigousuario" id="codigousuario" value="'. $usuario.'">
                                                               
                                                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Nombre" >
                                                                </div>
                                                                <div class="col-md-5 form-group">
                                                                    <label for="exampleInputEmail1">Fecha Nacimiento</label>
                                                                    <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" >
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <label for="exampleInputEmail1">Alumno</label>
                                                                    <select class="form-control form-control-lg" name="alumno" id="alumno">
                                                                        <option value="Nuevo">Nuevo</option>
                                                                        <option value="ExAlumno">ExAlumno</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputEmail1">Nombres</label>
                                                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                                                                </div>

                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Apellidos</label>
                                                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
                                                                </div>

                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Correo</label>
                                                                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo">
                                                                </div>
                                                                <div class=" col-md-6 form-group">
                                                                    <label for="exampleInputEmail1">Teléfono</label>
                                                                    <input type="text" class="form-control" name="telefono" id="telefono"  placeholder="Telefono">
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <!--telefono/profesion/grado-->
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Profesión</label>
                                                                    <input type="text" class="form-control" name="profesion" id="profesion" placeholder="Profesion">
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Grado</label>
                                                                    <input type="text" class="form-control" name="grado" id="grado" placeholder="grado">
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Pais</label>
                                                                    <input type="text" class="form-control" name="pais" id="pais" placeholder="pais" value="Perú">
                                                                </div>

                                                                <div class=" col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Departamento</label>
                                                                    <input type="text" class="form-control" name="departamento" id="departamento" placeholder="Departamento">
                                                                </div>
                                                                <div class=" col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Distrito</label>
                                                                    <input type="text" class="form-control" name="distrito" id="distrito" placeholder="Distrito">
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Direccion</label>
                                                                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion">
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="exampleInputPassword1">Detalle</label>
                                                                    <input type="text" class="form-control" name="detalle" id="detalle" placeholder="Direccion">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <button type="submit" name="agregar_cliente" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
                                                            <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class=""><i class="fa fa-meh-o"></i> Cancel</a></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
                   ';
        
        return $tarjeta;
    }


   
   
}
