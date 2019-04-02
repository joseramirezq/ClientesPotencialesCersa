<?php
     $codigocliente="Sin codigo";
        if ($peticionAjax) {
            require_once('../modelos/clienteModelo.php');
           
        } else {
            require_once('./modelos/clienteModelo.php');
          
        }

        class clienteControlador extends clienteModelo{

           

        public function agregar_cliente_controlador(){
                //PARA AGREGAR INTERES
                 $cursointeres=$_POST['idespecialidad'];
                $codigodeusuario=$_POST['codigousuario'];

                $conexion=mainModel::conectar();
                $datosEs = $conexion->query("
                SELECT fecha_fin FROM especialidad WHERE idespecialidad=$cursointeres ");
                $datosEs = $datosEs->fetchAll();
                foreach ($datosEs as $rowsEs) {
                    $fincurso=$rowsEs['fecha_fin'];
                
                }


                $nombre=mainModel::limpiar_cadena($_POST['nombre']);
                $apellidos=mainModel::limpiar_cadena($_POST['apellidos']);
                $correo=mainModel::limpiar_cadena($_POST['correo']);
                $telefono=mainModel::limpiar_cadena($_POST['telefono']);
                $profesion=mainModel::limpiar_cadena($_POST['profesion']);
                $grado=mainModel::limpiar_cadena($_POST['grado']);
                $pais=mainModel::limpiar_cadena($_POST['pais']);
                $departamento=mainModel::limpiar_cadena($_POST['departamento']);
                $distrito=mainModel::limpiar_cadena($_POST['distrito']);
                $direccion=mainModel::limpiar_cadena($_POST['direccion']);

                $dni=mainModel::limpiar_cadena($_POST['dni']);
                $fecha=mainModel::limpiar_cadena($_POST['fechanacimiento']);
                $alumno=mainModel::limpiar_cadena($_POST['alumno']);
                $detalle=mainModel::limpiar_cadena($_POST['detalle']);

                $consulta3=mainModel::ejecutar_consulta_simple("SELECT 
                idcliente FROM cliente ");
                $numero=($consulta3->rowCount())+1;
                $codigo=mainModel::generar_codigo_aleatorio("CLI", 1, $numero);

                
                $estado=1;
                session_start(['name'=>'SRCP']);
                $codigodeusuario=$_SESSION['id_usuario'];
  
                $datosInteres=[
                      "Estado"=>$estado,
                      "Usuario"=>$codigodeusuario,
                      "Curso"=>$cursointeres, //aqui debemos pasar el parametro del curso
                      "Cliente"=>$codigo,
                      "Fincurso"=>$fincurso,
                      "Descripcion"=>"Cliente nuevo",
                  ];
                  clienteModelo::agregar_interes_modelo($datosInteres);

                $datosCliente=[
                    "Codigo"=>$codigo,
                    "Nombre"=>$nombre,
                    "Apellidos"=>$apellidos,
                    "Correo"=>$correo,
                    "Telefono"=>$telefono,
                    "Profesion"=>$profesion,
                    "Grado"=>$grado,
                    "Pais"=>$pais,
                    "Departamento"=>$departamento,
                    "Distrito"=>$distrito,
                    "Direccion"=>$direccion,

                    "Dni"=>$dni,
                    "Fecha"=>$fecha,
                    "Detalle"=>$detalle,
                    "Fincurso"=>$fincurso,
                    "Alumno"=>$alumno

                ];
                $guardarCliente=clienteModelo::agregar_cliente_modelo($datosCliente);

                if($guardarCliente->rowCount()>=1){
                 
                    $direccion=SERVERURL."sesioncurso";
                    header('location:'.$direccion);
                }else{
                    $a= "<script>console.log( 'No insertado' );</script>";
                }
             
            
                return $a;
            }


                //MOSTRAR CLIENTES EN ESTADO CLIENTE 
                public function actualizar_cliente_controlador(){
                    //PARA AGREGAR INTERES
                    // $cursointeres=$_POST['idespecialidad'];
                    //$codigodeusuario=$_POST['codigousuario'];
    
                    $idcliente=mainModel::limpiar_cadena($_POST['idcliente']);
                    $nombre=mainModel::limpiar_cadena($_POST['nombre']);
                    $apellidos=mainModel::limpiar_cadena($_POST['apellidos']);
                    $correo=mainModel::limpiar_cadena($_POST['correo']);
                    $telefono=mainModel::limpiar_cadena($_POST['telefono']);
                    $profesion=mainModel::limpiar_cadena($_POST['profesion']);
                    $grado=mainModel::limpiar_cadena($_POST['grado']);
                    $pais=mainModel::limpiar_cadena($_POST['pais']);
                    $departamento=mainModel::limpiar_cadena($_POST['departamento']);
                    $distrito=mainModel::limpiar_cadena($_POST['distrito']);
                    $direccion=mainModel::limpiar_cadena($_POST['direccion']);
    
                    $dni=mainModel::limpiar_cadena($_POST['dni']);
                    $fecha=mainModel::limpiar_cadena($_POST['fechanacimiento']);
                    $alumno=mainModel::limpiar_cadena($_POST['alumno']);
                    $detalle=mainModel::limpiar_cadena($_POST['detalle']);
    
                    $datosClienteA=[
                        "Idcliente"=>$idcliente,
                        "Nombre"=>$nombre,
                        "Apellidos"=>$apellidos,
                        "Correo"=>$correo,
                        "Telefono"=>$telefono,
                        "Profesion"=>$profesion,
                        "Grado"=>$grado,
                        "Pais"=>$pais,
                        "Departamento"=>$departamento,
                        "Distrito"=>$distrito,
                        "Direccion"=>$direccion,
    
                        "Dni"=>$dni,
                        "Fecha"=>$fecha,
                        "Detalle"=>$detalle,
                        "Alumno"=>$alumno
    
                    ];
                    $actualizarCliente=clienteModelo::actualizar_cliente_modelo($datosClienteA);
    
                    
                     
                        $direccion=SERVERURL."sesionestados";
                        header('location:'.$direccion);
                   
                 
                
                   
                }
    
    
                    //MOSTRAR CLIENTES EN ESTADO CLIENTE 
    
                    
public function matri_cliente_controlador(){

    $idinteres=mainModel::limpiar_cadena($_POST['idinteres']);
    $des_interes=mainModel::limpiar_cadena($_POST['des_interes']);
    $datosClienteA=[
        "Idinteres"=>$idinteres,
        "Des_interes"=>$des_interes
    ];
    $actualizarCliente=clienteModelo::matri_cliente_modelo($datosClienteA);
    $direccion=SERVERURL."clientesprematriculados";
    header('location:'.$direccion);
                    
                    


   }
   
public function cliente_actualizacion_estado(){
        //
        $idespecialidad=0;
        $tarjetaEstado="";
        $cod= $_SESSION['codigocliente'];
        $conexion=mainModel::conectar();

        //variables de interes
        $idinteres="";
        $descriestado="";
        $fechacambio="";
        //SELECIONADO CURSO
        $usuario=$_SESSION['codigo_srcp'];
        $datosEs = $conexion->query("
            SELECT * FROM especialidad WHERE sesion='$usuario' ");
        $datosEs = $datosEs->fetchAll();
        foreach ($datosEs as $rowsEs) {
            $idespecialidad=$rowsEs['idespecialidad'];
           
        }

        //datos de interes que serviran par ala inseriocn 
        $datosInteres = $conexion->query("
            SELECT * FROM interes WHERE idespecialidad='$idespecialidad'AND codigocliente='$cod' ORDER by idestado ");
        $datosInteres = $datosInteres->fetchAll();
        foreach ($datosInteres as $rowsInt) {

            $descriestado=$rowsInt['descri_estado'];
            $fechacambio=$rowsInt['fecha_cambio_estado'];
            $fechanotifi=$rowsInt['fecha_notificacion'];
            $idinteres=$rowsInt['idinteres'];
            $idusuario=$rowsInt['idusuario'];
            
        }

        //selecionando cliente
        $datosCliente = $conexion->query("
        SELECT * FROM cliente WHERE codigocliente='$cod'  ");
        $datosCliente = $datosCliente->fetchAll();
       
        foreach($datosCliente as $rows){
            $tarjetaEstado.='
            <h3 class="text-primary">Cliente:'.$rows['nombres_cli'].' '.$rows['apellidos_cli'].'
            
            <div class="btn-group dropdown float-right">
                        <button type="button" class="btn btn-success" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#'.$rows['nombres_cli'].'">
                        Editar Cliente
                        </button>
              </div>
              </h3>
            <br><hr>
                <div class="btn-group dropdown ">
                    ';


                    //DATOS DEL ESTADO 
                    $estado=$_SESSION['estadocliente'];
                    $datosEstado = $conexion->query("
                    SELECT * FROM estado WHERE 	idestado='$estado' ");
                    $datosEstado = $datosEstado->fetchAll();
                    foreach ($datosEstado as $rowsEstado) {
                        $tarjetaEstado.=' <mark style="color:'.$rowsEstado['color'].';"><i class="menu-icon  fa fa-cubes"></i>'.$rowsEstado['nombre_estado'].' </mark>&nbsp; 
                         <mark class="text-white bg-primary">  &nbsp; &nbsp; <i class="fa fa-clipboard"></i> '.$descriestado.'</mark>&nbsp; 
                         <mark class="text-white bg-primary" > &nbsp; &nbsp; <i class="fa fa-calendar"></i> '.$fechacambio.'</mark>&nbsp; 
                         <mark class="text-white bg-primary">  &nbsp; &nbsp; <i class="fa fa-bell-o"></i>  '.$fechanotifi.'</mark>&nbsp; 
                         <mark class="text-white bg-primary">  &nbsp; &nbsp; <i class="fa fa-user"></i> '.$idusuario.'</mark>';
                    } 
                    $tarjetaEstado.='
                </div>
                <hr>
                  <!--infomacion del contacto-->
                  <div class="row">
                        <div class="col-md-3">
                            <address class="">
                                <p class="font-weight-bold">
                                    Correo
                                </p>
                                <p class="mb-2">
                                '.$rows['correo_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                    Telefono
                                </p>
                                <p>
                                '.$rows['telefono_cli'].'
                                </p>
                            </address>
                        </div>
    
    
                        <div class="col-md-3">
                            <address class="">
                                <p class="font-weight-bold">
                                    Profesión
                                </p>
                                <p class="mb-2">
                                '.$rows['profesion_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                    Grado
                                </p>
                                <p>
                                '.$rows['grado_cli'].'
                                </p>
                            </address>
                        </div>
    
    
                        <div class="col-md-3">
                            <address class="">
                                <p class="font-weight-bold">
                                    Pais
                                </p>
                                <p class="mb-2">
                                '.$rows['pais_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                    Departamento
                                </p>
                                <p>
                                '.$rows['departamento_cli'].'
                                </p>
                            </address>
                        </div>
    
    
                        <div class="col-md-3">
                            <address class="">
                                <p class="font-weight-bold">
                                    Distrito
                                </p>
                                <p class="mb-2">
                                '.$rows['distrito_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                Dirección
                                </p>
                                <p>
                                '.$rows['direccion_cli'].'
                                </p>
                            </address>
                        </div>
                    </div>
                    <!--fin informacion del contacto-->


<!--Nodal de editar -->
            <div class="modal fade" id="'.$rows['nombres_cli'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header bg-warning">
                            <h3 class="text-light text-center">Editar Cliente</h3>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">×</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <div class="form-group">
                                <p class="text-center">Verifique todos los datos ingresados antes de confirmar </p>

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
                                                                    <input type="hidden" class="form-control" name="idcliente" id="idcliente" value="'.$rows['idcliente'].'">
                        
                                                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Nombre"  value="'.$rows['dni_cli'].'">
                                                                </div>
                                                                <div class="col-md-5 form-group">
                                                                    <label for="exampleInputEmail1">Fecha Nacimiento</label>
                                                                    <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" placeholder="Nombre" value="'.$rows['fechanacimiento_cli'].'">
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <label for="exampleInputEmail1">Alumno</label>
                                                                    <select class="form-control form-control-lg" name="alumno" id="alumno">
                                                                        <option value="'.$rows['alumno_cli'].'">'.$rows['alumno_cli'].'</option>
                                                                        <option value="Nuevo">Nuevo</option>
                                                                        <option value="ExAlumno">ExAlumno</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputEmail1">Nombres</label>
                                                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="'.$rows['nombres_cli'].'">
                                                                </div>

                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Apellidos</label>
                                                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" value="'.$rows['apellidos_cli'].'">
                                                                </div>

                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Correo</label>
                                                                    <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo" value="'.$rows['correo_cli'].'">
                                                                </div>
                                                                <div class=" col-md-6 form-group">
                                                                    <label for="exampleInputEmail1">Teléfono</label>
                                                                    <input type="text" class="form-control" name="telefono" id="telefono"  placeholder="Telefono" value="'.$rows['telefono_cli'].'">
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <!--telefono/profesion/grado-->
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Profesión</label>
                                                                    <input type="text" class="form-control" name="profesion" id="profesion" placeholder="Profesion" value="'.$rows['profesion_cli'].'">
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Grado</label>
                                                                    <input type="text" class="form-control" name="grado" id="grado" placeholder="grado" value="'.$rows['grado_cli'].'">
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Pais</label>
                                                                    <input type="text" class="form-control" name="pais" id="pais" placeholder="pais" value="'.$rows['pais_cli'].'">
                                                                </div>

                                                                <div class=" col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Departamento</label>
                                                                    <input type="text" class="form-control" name="departamento" id="departamento" placeholder="Departamento" value="'.$rows['departamento_cli'].'"> 
                                                                </div>
                                                                <div class=" col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Distrito</label>
                                                                    <input type="text" class="form-control" name="distrito" id="distrito" placeholder="Distrito" value="'.$rows['distrito_cli'].'">
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label for="exampleInputPassword1">Direccion</label>
                                                                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion"  value="'.$rows['direccion_cli'].'">
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="exampleInputPassword1">Detalle</label>
                                                                    <input type="text" class="form-control" name="detalle" id="detalle" placeholder="Detalle" value="'.$rows['detalle_cli'].'">
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <button type="submit" name="actualizar_cliente" class="btn btn-warning"><i class="fa fa-check"></i> Actualizar</button>
                                                            <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class=""><i class="fa fa-meh-o"></i> Cancel</span>
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
                    
            </div>
            </div>
        </div>
    </div>
    
            ';
        }
        $tarjetaEstado.='<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title"> Verifique todos los datos ingresados antes de confirmar</h1>
                            
                                        <div class="col-12 grid-margin">
                                            <div class="card">
                                            <div class="card-body">
                                                
                                                <form action="'.SERVERURL.'ajax/interesAjax.php" method="POST" class="forms-sample" 
                                                autocomplete="off" enctype="multipart/form-data">
                                                <input type="hidden" name="idespecialidad" id="idespecialidad"  value="'.$idespecialidad.'">
                                                <input type="hidden" name="codigousuario" id="codigousuario"  value="'.$usuario.'">
                                                <input type="hidden" name="codigocliente" id="codigocliente" value="'.$cod.'">
                                                <input type="hidden" name="idinteres" id="idinteres" value="'.$idinteres.'">
                                               
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <!--modelo de estado que se cambiara-->
                                                        
                                                            <!--fin del modelo que se cambiara-->
                                                            <!--modelo de estado que se cambiara-->
                                                           ';
                                                                    $datosE=$conexion->query("
                                                                    SELECT * FROM estado WHERE estado_actual=1 AND idestado<>1 ORDER BY codigoestado");
                                                           
                                                                    $datosE=$datosE->fetchAll();
                                                                    foreach($datosE as $rowsE){
                                                                        $tarjetaEstado.='
                                                                        <div class="col-sm-12">

                                                                        <div class="form-group">
                                                                        
               
                                                                            <div class="form-radio">
                                                                           
                                                                                
                                                                              <input  type="radio" class="form-check-input" name="estado" id="estado"  value="'.$rowsE['idestado'].'" > 
                                                                                <p> <font  style="background-color: '.$rowsE['color'].';"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>&nbsp;'.$rowsE['nombre_estado'].' : &nbsp;  '.$rowsE['descri_estado'].'</p> 
                                                                                <i class="input-helper"></i><i class="input-helper"></i>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-radio">
                                                            
                                                                        
                                                                        </div>
                                                                      </div>
                                                                      
                                                                      
                                                                        '; 
                                                                    }
                                              
                                                          
                                                        
                                            $tarjetaEstado.='     </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                <!--inicio del nuevo formulario-->
                                                        <div class="card">
                                                            <div class="card-body">
                                                            <!--fecha-->
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                
                                                                    <input type="datetime-local"  class="form-control" name="fechanotificacion" id="fechanotificacion">
                                                             
                                                                </div>
                                                            </div>
                                                            <!--descripcion-->
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                <div class="input-group-prepend bg-primary border-primary">
                                                                    <span class="input-group-text bg-transparent">
                                                                    <i class=" fa fa-align-left text-white"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Descripcion"  name="descripcion" id="descripcion" aria-describedby="colored-addon2">
                                                                </div>
                                                            </div>
                                                            <!--baucher-->
                                                            <div class="form-group">
                                                            
                                                                <div class="input-group">
                                                                    <input class="form-control" type="file" name="boucher" id="boucher>
                                                                    <div class="input-group-append bg-primary border-primary">
                                                                        <span class="input-group-text bg-transparent">
                                                                        <i class="fa fa-file-text-o text-white"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                        
                                                            
                                                        
                                                            </div></div></div>
                                                        </div>
                                                        <!--findel nuevo formukario-->
                                                    
                                                    
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                        <div class="form-group">
                                                            <button type="submit" name="actualizarinteres" class="btn btn-success"><i class="fa fa-check"></i> Actualizar</button>
                                                            <a href="'.SERVERURL.'sesioncurso" class="btn btn-info"><i class="fa fa-meh-o"></i> Cancel</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                   
                                                </form>
                                            </div>
                                            
                                            </div>
                                        </div>
                        
                                    </div>
                                </div>
                            </div>
                        </div>';
        return $tarjetaEstado;
        }



        public function   pasando_variable_controlador($variable,$identificador,$idinterescontrol){
            session_start(['name'=>'SRCP']);
            $_SESSION['codigocliente']=$variable;
            $_SESSION['estadocliente']=$identificador;
            $codigousuario=$_SESSION['id_usuario'];
            $fechaactualcompleta=date("Y-m-d H:i:s");
            
            $fechaactual=date("Y-m-d");
            $consulta1=mainModel::ejecutar_consulta_simple("SELECT idcontrol FROM controlusuario");
            $numero=($consulta1->rowCount())+1;

            $codigoCu=mainModel::generar_codigo_aleatorio("CB", 2, $numero);
            $_SESSION['controlusuario']=$codigoCu;

            $datosControlUsuario = [
                "Idinteres" => $idinterescontrol,
                "Codigousuario" => $codigousuario,
                "Fechainicio" => $fechaactualcompleta,
                "Fechafin" => $fechaactualcompleta,
                "Fecha" => $fechaactual,
                "Codigocontrol"=>$codigoCu
    
            ];

            $insertarControlusuario=mainModel::guardar_control_usuario($datosControlUsuario);
           

            //insertar datos para el control usuario

        }    
        
        
        public function leer_cliente_prematriculado_controlador(){
            $table="";
            $conexion=mainModel::conectar();

            $datoscli=$conexion->query("
            SELECT COUNT(*) as totalcli FROM interes WHERE idestado=3 and fincurso>curdate()");
            $datoscli=$datoscli->fetchAll();
            foreach($datoscli as $rowscli){
                $totalcli=$rowscli['totalcli'];
            }

            $table.='  
            <h4 class="text-primary"> <i class="fa fa-child text-primary icon-lg"></i> Total de clientes  : '.$totalcli.'</h4>
            <hr>
                <div class="table-responsive">
                <table class="table table-hover" id="bootstrap-data-table"
            class="table table-striped table-bordered">
                <thead class="bg bg-primary text-white">
                    <tr>
                        <th>Codigo</th>
                        <th>Curso</th>
                        <th>Nombre</th>
                     
                        
                         <th>Detalle</th>
                         <th>Des/Deuda</th>
                         <th>Matricular</th>
                    </tr>
                </thead>
                <tbody>
                ';
            $datosclinte=$conexion->query("
            SELECT idinteres,codigocliente, idespecialidad FROM interes WHERE idestado=3 and fincurso>curdate()");
            $datosclinte=$datosclinte->fetchAll();
            foreach($datosclinte as $rowscliente){
                     $idinteres=$rowscliente['idinteres']; 
                    $idcliente=$rowscliente['codigocliente'];
                    $codigocurso=$rowscliente['idespecialidad'];
            
            $datoscurso=$conexion->query("
            SELECT nombre_es FROM especialidad WHERE idespecialidad=$codigocurso");
            $datoscurso=$datoscurso->fetchAll();
            foreach($datoscurso as $rowscurso){
                    $nombrecurso=$rowscurso['nombre_es'];
                  
                }

            $datos=$conexion->query("
            SELECT * FROM cliente WHERE codigocliente='$idcliente'");
            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $table.='
                <tr>
                <td>'.$rows['codigocliente'].'</td>
                <td>'.$nombrecurso.'</td>
                <td>'.$rows['nombres_cli'].' '.$rows['apellidos_cli'].'</td>
                
            
                
                <td>
                    <button type="button" class="btn btn-inverse-dark" aria-haspopup="true" aria-expanded="false"
                        data-toggle="modal" data-target="#'.$rows['codigocliente'].'">
                        <i class="fa fa-drivers-license-o"></i> Ver
                    </button>
                </td>
                <form action="'.SERVERURL.'ajax/clienteAjax.php"   method="post">
              
                <td>
                
                <input type="text"  name="des_interes">

               </td>
                <td>
                <input type="hidden"   name="idinteres" value="'.$idinteres.'">
                   
                    <button type="submit" name="matricular" class="btn btn-danger">
                        <i class="fa fa-drivers-license-o"></i> Matricular
                    </button>
                    </form>
                </td>
            </tr>

            <!--DETALLE-->  
            <div class="modal fade" id="'.$rows['codigocliente'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <!--Header-->
                  <div class="modal-header bg-dark">
                      <h4 class="text-light text-center"> <i class="fa fa-child text-white icon-lg"></i> Cliente: &nbsp;'.$rows['nombres_cli'].'</h4>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-white">×</span>
                      </button>
                  </div>

                  <!--Body-->
                  <div class="modal-body">
                      <div class="card">
                      <div class="card-body">
                          <div class="row">
                          <div class="col-md-6">
                              <address class="">
                              <p class="font-weight-bold">
                              Nombres
                              </p>
                              <p class="mb-2">
                              '.$rows['nombres_cli'].' &nbsp; '.$rows['apellidos_cli'].'
                              </p>
                              <p class="font-weight-bold">
                                  Correo
                              </p>
                              <p>
                              '.$rows['correo_cli'].'
                              </p>
                              </address>
                          </div>


                          <div class="col-md-6">
                              <address class="">
                              <p class="font-weight-bold">
                             Teléfono
                              </p>
                              <p class="mb-2">
                              '.$rows['telefono_cli'].'
                              </p>
                              <p class="font-weight-bold">
                                  Profesion
                              </p>
                              <p>
                              '.$rows['profesion_cli'].'
                              </p>
                              </address>
                          </div>

                          <div class="col-md-6">
                                <address class="">
                                <p class="font-weight-bold">
                                Grado
                                </p>
                                <p class="mb-2">
                                '.$rows['grado_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                   Departamento
                                </p>
                                <p>
                                '.$rows['departamento_cli'].'
                                </p>
                                </address>
                            </div> 
                            
                            <div class="col-md-6">
                                <address class="">
                                <p class="font-weight-bold">
                                Distrito
                                </p>
                                <p class="mb-2">
                                '.$rows['distrito_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                Direccion
                                </p>
                                <p>
                                '.$rows['direccion_cli'].'
                                </p>
                                </address>
                            </div>   



                         


                          </div>
                      </div>
                      </div>
                  </div>
                  </div>
              </div>
           </div>
           <!--FINDETALLE--> 

                ';
            }
            }
            return $table;
         }
         //mostrar tabla estados


         public function leer_cliente_matriculado_controlador(){
            $table="";
            $conexion=mainModel::conectar();

            $datoscli=$conexion->query("
            SELECT COUNT(*) as totalcli FROM interes WHERE idestado=7 and fincurso>curdate()");
            $datoscli=$datoscli->fetchAll();
            foreach($datoscli as $rowscli){
                $totalcli=$rowscli['totalcli'];
            }

            $table.='  
            <h4 class="text-primary"> <i class="fa fa-child text-primary icon-lg"></i> Total de clientes  : '.$totalcli.'</h4>
            <hr>
                <div class="table-responsive">
                <table class="table table-hover" id="bootstrap-data-table"
            class="table table-striped table-bordered">
                <thead class="bg bg-primary text-white">
                    <tr>
                        <th>Codigo</th>
                        <th>Curso</th>
                        <th>Nombre</th>
                     
                        
                         <th>Detalle</th>
                         <th>Descripcion</th>
                       
                    </tr>
                </thead>
                <tbody>
                ';
            $datosclinte=$conexion->query("
            SELECT idinteres,codigocliente,descri_estado, idespecialidad FROM interes WHERE idestado=7 and fincurso>curdate()");
            $datosclinte=$datosclinte->fetchAll();
            foreach($datosclinte as $rowscliente){
                     $idinteres=$rowscliente['idinteres']; 
                    $idcliente=$rowscliente['codigocliente'];
                    $descri_estado=$rowscliente['descri_estado'];
                    $codigocurso=$rowscliente['idespecialidad'];
            
            $datoscurso=$conexion->query("
            SELECT nombre_es FROM especialidad WHERE idespecialidad=$codigocurso");
            $datoscurso=$datoscurso->fetchAll();
            foreach($datoscurso as $rowscurso){
                    $nombrecurso=$rowscurso['nombre_es'];
                  
                }

            $datos=$conexion->query("
            SELECT * FROM cliente WHERE codigocliente='$idcliente'");
            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $table.='
                <tr>
                <td>'.$rows['codigocliente'].'</td>
                <td>'.$nombrecurso.'</td>
                <td>'.$rows['nombres_cli'].' '.$rows['apellidos_cli'].'</td>
                
            
                
                <td>
                    <button type="button" class="btn btn-inverse-dark" aria-haspopup="true" aria-expanded="false"
                        data-toggle="modal" data-target="#'.$rows['codigocliente'].'">
                        <i class="fa fa-drivers-license-o"></i> Ver
                    </button>
                </td>


                <td>
                    '.$descri_estado.'
                 </td>
              
              
         
                
            </tr>

            <!--DETALLE-->  
            <div class="modal fade" id="'.$rows['codigocliente'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <!--Header-->
                  <div class="modal-header bg-dark">
                      <h4 class="text-light text-center"> <i class="fa fa-child text-white icon-lg"></i> Cliente: &nbsp;'.$rows['nombres_cli'].'</h4>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-white">×</span>
                      </button>
                  </div>

                  <!--Body-->
                  <div class="modal-body">
                      <div class="card">
                      <div class="card-body">
                          <div class="row">
                          <div class="col-md-6">
                              <address class="">
                              <p class="font-weight-bold">
                              Nombres
                              </p>
                              <p class="mb-2">
                              '.$rows['nombres_cli'].' &nbsp; '.$rows['apellidos_cli'].'
                              </p>
                              <p class="font-weight-bold">
                                  Correo
                              </p>
                              <p>
                              '.$rows['correo_cli'].'
                              </p>
                              </address>
                          </div>


                          <div class="col-md-6">
                              <address class="">
                              <p class="font-weight-bold">
                             Teléfono
                              </p>
                              <p class="mb-2">
                              '.$rows['telefono_cli'].'
                              </p>
                              <p class="font-weight-bold">
                                  Profesion
                              </p>
                              <p>
                              '.$rows['profesion_cli'].'
                              </p>
                              </address>
                          </div>

                          <div class="col-md-6">
                                <address class="">
                                <p class="font-weight-bold">
                                Grado
                                </p>
                                <p class="mb-2">
                                '.$rows['grado_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                   Departamento
                                </p>
                                <p>
                                '.$rows['departamento_cli'].'
                                </p>
                                </address>
                            </div> 
                            
                            <div class="col-md-6">
                                <address class="">
                                <p class="font-weight-bold">
                                Distrito
                                </p>
                                <p class="mb-2">
                                '.$rows['distrito_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                Direccion
                                </p>
                                <p>
                                '.$rows['direccion_cli'].'
                                </p>
                                </address>
                            </div>   



                         


                          </div>
                      </div>
                      </div>
                  </div>
                  </div>
              </div>
           </div>
           <!--FINDETALLE--> 

                ';
            }
            }
            return $table;
         }
        public function leer_cliente_controlador(){
            $table="";
            $conexion=mainModel::conectar();

            $datoscli=$conexion->query("
            SELECT COUNT(*) as totalcli FROM cliente where fincurso>curdate() ");
            $datoscli=$datoscli->fetchAll();
            foreach($datoscli as $rowscli){
                $totalcli=$rowscli['totalcli'];
            }

            $table.='  
            <h4 class="text-primary"> <i class="fa fa-child text-primary icon-lg"></i> Total de clientes  : '.$totalcli.'</h4>
            <hr>
                <div class="table-responsive">
                <table class="table table-hover" id="bootstrap-data-table"
            class="table table-striped table-bordered">
                <thead class="bg bg-primary text-white">
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                      
                        <th>Ciudad</th>
                         <th>Detalle</th>
                         <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                ';
            
            $datos=$conexion->query("
            SELECT * FROM cliente where fincurso>curdate() ORDER BY fecha_registro DESC");
            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $table.='
                <tr>
                <td>'.$rows['codigocliente'].'</td>
                <td>'.$rows['nombres_cli'].'</td>
                <td>'.$rows['apellidos_cli'].'</td>
                <td>'.$rows['correo_cli'].'</td>
                
                <td>'.$rows['departamento_cli'].'</td>
                <td>'.$rows['fecha_registro'].'</td>
                <td>
                    <button type="button" class="btn btn-inverse-dark" aria-haspopup="true" aria-expanded="false"
                        data-toggle="modal" data-target="#'.$rows['codigocliente'].'">
                        <i class="fa fa-drivers-license-o"></i> Ver
                    </button>
                </td>
            </tr>

            <!--DETALLE-->  
            <div class="modal fade" id="'.$rows['codigocliente'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <!--Header-->
                  <div class="modal-header bg-dark">
                      <h4 class="text-light text-center"> <i class="fa fa-child text-white icon-lg"></i> Cliente: &nbsp;'.$rows['nombres_cli'].'</h4>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-white">×</span>
                      </button>
                  </div>

                  <!--Body-->
                  <div class="modal-body">
                      <div class="card">
                      <div class="card-body">
                          <div class="row">
                          <div class="col-md-6">
                              <address class="">
                              <p class="font-weight-bold">
                              Nombres
                              </p>
                              <p class="mb-2">
                              '.$rows['nombres_cli'].' &nbsp; '.$rows['apellidos_cli'].'
                              </p>
                              <p class="font-weight-bold">
                                  Correo
                              </p>
                              <p>
                              '.$rows['correo_cli'].'
                              </p>
                              </address>
                          </div>


                          <div class="col-md-6">
                              <address class="">
                              <p class="font-weight-bold">
                             Teléfono
                              </p>
                              <p class="mb-2">
                              '.$rows['telefono_cli'].'
                              </p>
                              <p class="font-weight-bold">
                                  Profesion
                              </p>
                              <p>
                              '.$rows['profesion_cli'].'
                              </p>
                              </address>
                          </div>

                          <div class="col-md-6">
                                <address class="">
                                <p class="font-weight-bold">
                                Grado
                                </p>
                                <p class="mb-2">
                                '.$rows['grado_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                   Departamento
                                </p>
                                <p>
                                '.$rows['departamento_cli'].'
                                </p>
                                </address>
                            </div> 
                            
                            <div class="col-md-6">
                                <address class="">
                                <p class="font-weight-bold">
                                Distrito
                                </p>
                                <p class="mb-2">
                                '.$rows['distrito_cli'].'
                                </p>
                                <p class="font-weight-bold">
                                Direccion
                                </p>
                                <p>
                                '.$rows['direccion_cli'].'
                                </p>
                                </address>
                            </div>   



                         


                          </div>
                      </div>
                      </div>
                  </div>
                  </div>
              </div>
           </div>
           <!--FINDETALLE--> 

                ';
            }
            return $table;
         }

         public function estados_cliente_controlador(){
            $table="";

            $conexion=mainModel::conectar();

            //selecionados todos los estados
            $datos=$conexion->query("
            SELECT * FROM estado where estado_actual=1");
            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $idestado=$rows['idestado'];

                //contamos todos los intereses en el id que me pasan
                $datosinteres=$conexion->query("
                SELECT COUNT(*) as intereses FROM interes WHERE idestado=$idestado ");
                $datosinteres=$datosinteres->fetchAll();
                foreach($datosinteres as $datosinteres){
                    $numerointeresados=$datosinteres['intereses'];

                }
                $table.='
                <div class="col-md-2" badge style="background-color:'.$rows['color'].'" >
                    <div class="wrapper d-flex justify-content-between">
                        <div class="side-left">
                        <p class="mb-2">'.$rows['nombre_estado'].'</p>
                        <p class="display-3 mb-4 font-weight-light">'.$numerointeresados.'</p>
                        </div>
        
                    </div>
                </div>
                ';
            }
            return $table;
         }
    }


