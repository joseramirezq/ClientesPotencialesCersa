<?php
     if ($peticionAjax) {
        require_once('../modelos/secundariosModelo.php');
    } else {
        require_once('./modelos/secundariosModelo.php');
    }
   // require_once('../vistas/modulos/link.php');
    class secundariosControlador extends secundariosModelo{

        //INSERTAR DATOS 
        
        public function agregar_estados_controlador(){
            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $descripcion=mainModel::limpiar_cadena($_POST['descripcion']);
            $color=mainModel::limpiar_cadena($_POST['color']);

            $consulta3=mainModel::ejecutar_consulta_simple("SELECT 
            idestado FROM estado ");
            $numero=($consulta3->rowCount())+1;
            $codigo=mainModel::generar_codigo_aleatorio("ES", 1, $numero);
            
           

            $datosEstado=[
                "Nombre"=>$nombre,
                "Descripcion"=>$descripcion,
                "Color"=>$color,
                "Codigo"=>$codigo,
                "Estado"=>1
            ];
            $guardarEstado=secundariosModelo::agregar_estados_modelo($datosEstado);
            if($guardarEstado->rowCount()>=1){
                $direccion=SERVERURL."adestados";
               header('location:'.$direccion);
   
              
            }
        }

        public function agregar_categoria_controlador(){
            $nombre=mainModel::limpiar_cadena($_POST['nombre_cat']);
            $descripcion=mainModel::limpiar_cadena($_POST['descripcion_cat']);
            
            $consultacat=mainModel::ejecutar_consulta_simple("SELECT 
            	idcategoria FROM categoria ");
            $numero=($consultacat->rowCount())+1;
            $codigo=mainModel::generar_codigo_aleatorio("ES", 1, $numero);

            
            $datosCategoria=[
                "Nombre"=>$nombre,
                "Descripcion"=>$descripcion,
                "Codigo"=>$codigo,
                "Estado"=>1
              
            ];
            $guardarCategoria=secundariosModelo::agregar_categoria_modelo($datosCategoria);
            if($guardarCategoria->rowCount()>=1){
                $direccion=SERVERURL."adcategoria";
               header('location:'.$direccion);
   
              
            }
        }

        public function agregar_permiso_controlador(){
            $puesto=mainModel::limpiar_cadena($_POST['puesto']);
            $des_puesto=mainModel::limpiar_cadena($_POST['descripcion_puesto']);
            
            $consultacat=mainModel::ejecutar_consulta_simple("SELECT 
            	idcargo FROM cargo ");
            $numero=($consultacat->rowCount())+1;
            $codigo=mainModel::generar_codigo_aleatorio("ES", 1, $numero);
            
            $datosCargo=[
                "Puesto"=>$puesto,
                "Descripcion"=>$des_puesto,
                "Codigo"=>$codigo,
                "Estado"=>1

            ];
            $guardarCargo=secundariosModelo::agregar_permiso_modelo($datosCargo);
            if($guardarCargo->rowCount()>=1){
                $direccion=SERVERURL."adpermisos";
               header('location:'.$direccion);
   
              
            }
        }

     


        //ACTUALIZAR
        public function actualizar_estados_controlador(){
            $codigo=mainModel::limpiar_cadena($_POST['codigo']);
            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $descripcion=mainModel::limpiar_cadena($_POST['descripcion']);
            $color=mainModel::limpiar_cadena($_POST['color']);

            $datosEstado=[
                "Nombre"=>$nombre,
                "Descripcion"=>$descripcion,
                "Color"=>$color,
                "Codigo"=>$codigo,
              
            ];
            $guardarEstado=secundariosModelo::actualizar_estados_modelo($datosEstado);
           // if($guardarEstado->rowCount()>=1){
            $direccion=SERVERURL."adestados";
               header('location:'.$direccion);
   
              
          //  }
              
            }
        



        //MOPSTRAR DATOS
        //mostrar tabla cargo
        public function leer_permisos_controlador()
        {
            $tableper="";
            $conexion=mainModel::conectar();
            $datos=$conexion->query("
            SELECT * FROM cargo");

            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $tableper.='
                <tr>
                    <td>'.$rows['idcargo'].'</td>
                            <td>'.$rows['puesto'].'</td>
                            <td>'.$rows['descripcion'].'</td>

                            <td>
                                <button type="button" class="btn btn-warning btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#nusereditar">
                                    <i class="fa fa-pencil"></i> Editar
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#nusereliminar">
                                    <i class="fa fa-trash-o"></i> Eliminar
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#nuserdetalle">
                                    <i class="fa fa-drivers-license-o"></i> Ver
                                </button>
                            </td>
                        </tr>
                ';
            }
            return $tableper;
        }
         
        //mostrar tabla categoria
         public function leer_categorias_controlador(){
            $tablecat="";
            $conexion=mainModel::conectar();
            $datos=$conexion->query("
            SELECT * FROM categoria ORDER BY codigocat");

            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $tablecat.='
                <tr>
                    <td>'.$rows['codigocat'].'</td>
                            <td>'.$rows['nombre_cat'].'</td>
                            <td>'.$rows['descripcion_cat'].'</td>

                            <td>
                                <button type="button" class="btn btn-warning btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#nusereditar">
                                    <i class="fa fa-pencil"></i> Editar
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#nusereliminar">
                                    <i class="fa fa-trash-o"></i> Eliminar
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-dark btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#nuserdetalle">
                                    <i class="fa fa-drivers-license-o"></i> Ver
                                </button>
                            </td>
                        </tr>
                ';
            }
            return $tablecat;
         }

            //mostrar tabla estados
        public function leer_estados_controlador(){
            $table="";
            $conexion=mainModel::conectar();
            $datos=$conexion->query("
            SELECT * FROM estado WHERE estado_actual=1 ORDER BY codigoestado");

            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $table.='
                <tr>
                    <td>'.$rows['codigoestado'].'</td>
                    <td bgcolor="'.$rows['color'].'"></td>
                            <td>'.$rows['nombre_estado'].'</td>    
                            <td>'.$rows['descri_estado'].'</td>

                            <td >
                                <button type="button" class="btn btn-warning btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#'.$rows['codigoestado'].'">
                                    <i class="fa fa-pencil"></i> Editar
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#'.$rows['idestado'].'">
                                    <i class="fa fa-trash-o"></i> Eliminar
                                </button>
                            </td>
                         
                        </tr>



                            <div class="modal fade" id="'.$rows['codigoestado'].'" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!--Header-->
                                        <div class="modal-header bg-warning text-center">
                                            <h4 class="text-light text-center">
                                                <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-plus text-warning"></i></button>

                                                &nbsp;Editar Estado </h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-white">×</span>
                                            </button>
                                        </div>

                                        <!--EDITAR-->
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h1 class="card-title"> Verifique todos los datos ingresados antes de confirmar</h1>
                                                    <hr>

                                                    <form action="'.SERVERURL.'ajax/secundariosAjax.php" method="POST" class="forms-sample" autocomplete="off">
                                                        <div class="row">

                                                            <!--nombre/apellidos/correo-->

                                                            <div class="row">
                                                                <div class="col-md-12 form-group">
                                                                        <label for="exampleInputEmail1">Codigo</label>
                                                                        <input type="text" class="form-control" name="codigo" id="codigo" value="'.$rows['codigoestado'].'" readonly="readonly">
                                                                </div>

                                                                <div class="col-md-12 form-group">
                                                                    <label for="exampleInputEmail1">Nombres</label>
                                                                    <input type="text" class="form-control" name="nombre" id="nombre" value="'.$rows['nombre_estado'].'" placeholder="Nombre">
                                                                </div>

                                                                <div class="col-md-12 form-group">
                                                                    <label for="exampleInputPassword1">Descripcion</label>
                                                                    <input type="text" class="form-control" name="descripcion" value="'.$rows['descri_estado'].'" id="descripcion" placeholder="Apellidos">
                                                                </div>


                                                                <div class="col-md-12 form-group">
                                                                    <label for="exampleInputPassword1">Color</label>
                                                                    <input type="color"  name="color" id="color" value="'.$rows['color'].'" placeholder="Correo">
                                                                </div>

                                                            </div>


                                                            <!--permisos-->


                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <button type="submit" name="actualizar_estados" id="actualizar_estados" class="btn btn-warning"><i class="fa fa-check"></i>Actualizar</button>

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



                            <!--Eliminar-->

                        <div class="modal fade" id="'.$rows['idestado'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                          <form action="'.SERVERURL.'ajax/secundariosAjax.php" method="POST" class="forms-sample" autocomplete="off">
                                                                     
                                            <div class="col-md-2">
                                                <input type="hidden" class="form-control" name="codigo" id="codigo" value="'.$rows['codigoestado'].'" readonly="readonly">
                                            </div>
                                            <div class="col-md-8 form-group">
                                            <button type="submit" name="elimnar_estados" id="elimnar_estados" class="btn btn-danger"><i class="fa fa-check"></i>Eliminar</button>

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

   
    /// ELIMNAR 
    //elimnar estado 
    public function eliminar_estados_controlador(){
        $codigo=mainModel::limpiar_cadena($_POST['codigo']);
        $datosEstado=[
            "Codigo"=>$codigo,
            "Estado"=>0

          
        ];
        $eliminarEstado=secundariosModelo::eliminar_estados_modelo($datosEstado);
       // if($guardarEstado->rowCount()>=1){
        $direccion=SERVERURL."adestados";
           header('location:'.$direccion);

          
      //  }
          
        }
    

      //LAMADAS DESDE OTRAS VISTAS

      //LLAMADA DESDE vista de añadir preferencia
         public function cambios_estados_controlador(){
            $table="";
            $conexion=mainModel::conectar();
            $datos=$conexion->query("
            SELECT * FROM estado WHERE estado_actual=1 ORDER BY codigoestado");

            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $table.='
                <div class="col-sm-12">
                <div class="form-radio">
    
                  <label class="form-check-label">
                     <mark  style="background-color:'.$rows['color'].';" class=" text-white"><font color="">'.$rows['nombre_estado'].'</font> </mark><input type="radio" class="form-check-input" name="estado" id="estado" value="'.$rows['idestado'].'" checked="">
                     &nbsp;  '.$rows['descri_estado'].'
                  <i class="input-helper"></i></label>
                </div>
              </div>
                ';
            }
            return $table;
         }



          //LLAMADA DESDE vista de añadir preferencia
          public function cambios_cargos_controlador(){
            $opciones="";
            $conexion=mainModel::conectar();
            $datos=$conexion->query("
            SELECT * FROM cargo WHERE estado_actual=1");

            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $opciones.='
                <option value="'.$rows['idcargo'].'">'.$rows['puesto'].'</option>
              
                ';
            }
            return $opciones;
         }
      
      
      
}








   

    

    