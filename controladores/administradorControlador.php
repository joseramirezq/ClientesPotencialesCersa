<?php
     if ($peticionAjax) {
        require_once('../modelos/administradorModelo.php');
    } else {
        require_once('./modelos/administradorModelo.php');
    }

    class administradorControlador extends administradorModelo{
        
        public function agregar_administrador_controlador()
        {

            $cargo=mainModel::limpiar_cadena($_POST['cargo']);
            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $apellidos=mainModel::limpiar_cadena($_POST['apellidos']);
            $usuario=mainModel::limpiar_cadena($_POST['usuario']);
            $pass1=mainModel::limpiar_cadena($_POST['pass1']);
            $pass2=mainModel::limpiar_cadena($_POST['pass2']);
            $telefono=mainModel::limpiar_cadena($_POST['telefono']);
            $correo=mainModel::limpiar_cadena($_POST['correo']);
            $permiso=mainModel::limpiar_cadena($_POST['permiso']);

            $consulta3=mainModel::ejecutar_consulta_simple("SELECT 
            idusuario FROM usuario ");
            $numero=($consulta3->rowCount())+1;
            $codigo=mainModel::generar_codigo_aleatorio("US", 3, $numero);

            $foto =$_FILES['foto']['name'];
            $ruta =$_FILES['foto']['tmp_name'];
            $destino=SERVERURL."vistas/images/usuarios/".$foto;
            copy($ruta,$destino);
            

           if($pass1!=$pass2){

            //alertas para mostrar en caso no se ejecuta algo 
               $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"Las contraseñas que acabas de ingresar no coinciden, intente nuevamente",
                    "Tipo"=>"error"
                ];
              
                
               //echo '<script>  console.log("Hello world!"); </script>';
               
            }else{
                $dataUsuario=[
                    "Idcargo"=>$cargo,
                    "Codigo"=>$codigo, 
                    "Nombre"=>$nombre,
                    "Apellidos"=>$apellidos,
                    "Correo"=>$correo, 
                    "Telefono"=>$telefono,            
                    "Usuario"=>$usuario, 
                    "Pass"=>$pass1, 
                    "Estado"=>"1", 
                    "Permiso"=>"$permiso",
                    "Foto"=>"$destino"
                    
                   
                ];
                $guardarUsuario=administradorModelo::agregar_administrador_modelo($dataUsuario);
                if($guardarUsuario->rowCount()>=1){
                    $direccion=SERVERURL."listausuario";
                   header('location:'.$direccion);
       
                  
                }
           
              /*  $consulta1=mainModel::ejecutar_consulta_simple("SELECT 
                usuario_us FROM usuario WHERE usuario_us='$usuario'");
                if ($consulta1->rowCount()>=1) {
                        $alerta=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error inesperado",
                            "Texto"=>"El usuario que acaba de ingresar ya se encuentra registrado en el sistema",
                            "Tipo"=>"error"
                        ];
                } else {
                    if($correo!=""){
                        $consulta2=mainModel::ejecutar_consulta_simple("SELECT 
                          correo_us FROM usuario WHERE correo_us='$correo'");
                          $ec=$consulta2->rowCount();

                    }else{
                        $ec=0;


                    }
                    if($ec>=1){
                        //ERROR SI EL IMAIL SE ENCUENTRA INGRESADO
                        $alerta=[
                            "Alerta"=>"simple",
                            "Titulo"=>"Ocurrio un error inesperado",
                            "Texto"=>"El EMAIL qeu acaba ingresar ya se enceuntra registrado en el sistema",
                            "Tipo"=>"error"
                        ];
                    }else{
                        //GENERANDO CODIGO DEL USUARIO
                        $consulta3=mainModel::ejecutar_consulta_simple("SELECT 
                        idusuario FROM usuario ");
                        $numero=($consulta3->rowCount())+1;
                        $codigo=mainModel::generar_codigo_aleatorio("US", 3, $numero);
                        
                        //ENCRIPTAR PASS
                        $clave=mainModel::encryption($pass1);

                        //ENVIANDO DATOS AL MODELO
                        $dataUsuario=[
                            "Idcargo"=>$cargo,
                            "Codigo"=>$codigo, 
                            "Nombre"=>$nombre,
                            "Apellidos"=>$apellidos,
                            "Correo"=>$correo, 
                            "Telefono"=>$telefono,            
                            "Usuario"=>$usuario, 
                            "Pass"=>$pass1, 
                            "Estado"=>"1", 
                            "Permiso"=>"$permiso"
                            
                           
                        ];
                        $guardarUsuario=administradorModelo::agregar_administrador_modelo($dataUsuario);
                        //VERIFICAMOS SI SE INSERTO EL REGISTRO
                        if($guardarUsuario->rowCount()>=1){
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
                    }
                }
                
*/
              }
            //return mainModel::sweet_alert($alerta);
            
        }


        public function eliminar_administrador_controlador(){
            $codigo=mainModel::limpiar_cadena($_POST['codigo']);
            $datosEstado=[
                "Codigo"=>$codigo,
                "Estado"=>2
    
              
            ];
            $eliminaradmin=administradorModelo::eliminar_usuario_modelo($datosEstado);
           // if($guardarEstado->rowCount()>=1){
            $direccion=SERVERURL."listausuario";
               header('location:'.$direccion);
    
              
          //  }
        }

        public function editar_administrador_controlador()
        {
            $codigo=mainModel::limpiar_cadena($_POST['codigo']);

            $cargo=mainModel::limpiar_cadena($_POST['cargo']);
            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $apellidos=mainModel::limpiar_cadena($_POST['apellidos']);
            $usuario=mainModel::limpiar_cadena($_POST['usuario']);
            $pass1=mainModel::limpiar_cadena($_POST['pass1']);
            $pass2=mainModel::limpiar_cadena($_POST['pass2']);
            $telefono=mainModel::limpiar_cadena($_POST['telefono']);
            $correo=mainModel::limpiar_cadena($_POST['correo']);
            $permiso=mainModel::limpiar_cadena($_POST['permiso']);

            $foto =$_FILES['foto']['name'];
            $ruta =$_FILES['foto']['tmp_name'];
            $destino=SERVERURL."vistas/images/usuarios/".$foto;
            copy($ruta,$destino);
            

         
                $dataUsuario=[
                    "Idcargo"=>$cargo,
                    "Codigo"=>$codigo, 
                    "Nombre"=>$nombre,
                    "Apellidos"=>$apellidos,
                    "Correo"=>$correo, 
                    "Telefono"=>$telefono,            
                    "Usuario"=>$usuario, 
                    "Pass"=>$pass1, 
                    "Estado"=>"1", 
                    "Permiso"=>"$permiso",
                    "Foto"=>"$destino"
                    
                   
                ];
                $actualizarUsuario=administradorModelo::actualizar_administrador_modelo($dataUsuario);
               
                    $direccion=SERVERURL."listausuario";
                   header('location:'.$direccion);
       
                  
           
            
        }




          //mostrar tabla estados
          public function leer_usuarios_controlador(){
            $tableuser="";
            $conexion=mainModel::conectar();
            $datos=$conexion->query("
            SELECT * FROM usuario WHERE estado_us=1 ORDER BY idusuario");
            $datos=$datos->fetchAll();
            foreach($datos as $rows){
                $idcargo=$rows['idcargo'];
                $datos2=$conexion->query("
                SELECT * FROM cargo WHERE idcargo='$idcargo'");
                foreach($datos2 as $rows2){
                    $cargo=$rows2['puesto'];
                }
                $permiso=$rows['permisos'];
                if($permiso==1){
                    $permiso="Nivel 1";
                }elseif($permiso==2){
                    $permiso="Nivel 2";
                }else{
                    $permiso="Nivel 3";  
                }
                
                $tableuser.='
                <tr>
                    <td>'.$rows['codigousuario'].'</td>
                    <td>'.$rows['usuario_us'].'</td>
                    <td>'.$rows['nombre_us'].'</td>
                    <td>'.$rows['apellidos_us'].'</td>
                    <td>'.$cargo.'</td>
                    <td>

                    <button type="button" class="btn btn-warning btn-sm" aria-haspopup="true" aria-expanded="false"
                        data-toggle="modal" data-target="#editar'.$rows['idusuario'].'">
                        <i class="fa fa-pencil"></i> Editar
                    </button>

                    <button type="button" class="btn btn-danger btn-sm" aria-haspopup="true" aria-expanded="false"
                        data-toggle="modal" data-target="#'.$rows['codigousuario'].'">
                        <i class="fa fa-trash-o"></i> Eliminar
                    </button>
                    </td>
                    <td>
                    <button type="button" class="btn btn-dark btn-sm" aria-haspopup="true" aria-expanded="false"
                        data-toggle="modal" data-target="#'.$rows['idusuario'].'">
                        <i class="fa fa-drivers-license-o"></i> Ver
                    </button>
                    </td>
              </tr>

            <!--DETALLE-->  
              <div class="modal fade" id="'.$rows['idusuario'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header bg-dark">
                        <h4 class="text-light text-center">Usuario :'.$rows['nombre_us'].'</h4>

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
                                Cargo
                                </p>
                                <p class="mb-2">
                                '.$cargo.'
                                </p>
                                <p class="font-weight-bold">
                                    Correo
                                </p>
                                <p>
                                '.$rows['correo_us'].'
                                </p>
                                </address>
                            </div>


                            <div class="col-md-6">
                                <address class="">
                                <p class="font-weight-bold">
                               Teléfono
                                </p>
                                <p class="mb-2">
                                '.$rows['telefono_us'].'
                                </p>
                                <p class="font-weight-bold">
                                    Usuario
                                </p>
                                <p>
                                '.$rows['usuario_us'].'
                                </p>
                                </address>
                            </div>


                            <div class="col-md-6">
                                <address class="">
                                <p class="font-weight-bold">
                                    Permiso
                                </p>
                                <p class="mb-2">
                                <ul>
                                      <li>'.$permiso.'</li>
                                   
                                </ul>
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



                <!--eDITAR-->
                
            <div class="modal fade" id="editar'.$rows['idusuario'].'" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header bg-warning text-center">
                        <h4 class="text-light text-center">
                            <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-plus text-warning"></i></button>

                            &nbsp;Editar al Usuario :'.$rows['nombre_us'].' </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

        <!--Body-->
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title"> Verifique todos los datos ingresados antes de confirmar</h1>
                        <form  data-form="save"  action="'.SERVERURL.'ajax/administradorAjax.php" method="POST" class="forms-sample" 
            autocomplete="off" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-12">
                        <!--nombre/apellidos/correo-->

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Nombres</label>
                                <input type="hidden" class="form-control" name="codigo" id="codigo" placeholder="Nombre" value="'.$rows['codigousuario'].'" required>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="'.$rows['nombre_us'].'" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="exampleInputPassword1">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="'.$rows['apellidos_us'].'"
                                    placeholder="Apellidos" required>
                            </div>
                        

                        <div class=" col-md-6 form-group">
                            <label for="exampleInputPassword1">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" value="'.$rows['correo_us'].'"
                                placeholder="Correo">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputEmail1">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="'.$rows['telefono_us'].'">
                        </div>
                        <div class="col-md-12 form-group">
                                   
                        <label for="exampleInputEmail1">Seleccione una foto</label>
                         <input class="form-control" type="file" name="foto" id="foto" value="'.$rows['foto_us'].'">
                              
                        </div>
                        </div>
                    </div>

                    <!--cargo/usuario/contraseña-->
                    <div class="col-md-6">

                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Cargo</label>
                                <select class="form-control form-control-lg" name="cargo" id="cargo">
                                ';
                                $idcargo=$rows['idcargo'];
                                $datoscargo=$conexion->query("
                                SELECT * FROM cargo WHERE estado_actual=1");
                                $datoscargo=$datoscargo->fetchAll();
                                foreach($datoscargo as $rowsdatos){

                         $tableuser.='<option value="'.$rowsdatos['idcargo'].'">'.$rowsdatos['puesto'].'</option>
                                ';}
                         $tableuser.='
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="DNI" value="'.$rows['usuario_us'].'" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" name="pass1" id="pass1" value="'.$rows['pass_us'].'" 
                                placeholder="Contraseña" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Repetir Contraseña</label>
                            <input type="password" class="form-control" name="pass2" id="pass2" value="'.$rows['pass_us'].'"
                                placeholder="Repita Contraseña" required>
                        </div>
                    </div>

                    <!--permisos-->
                    <div class="col-md-6">

                                                <h4>Permisos</h4>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="form-radio">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="permiso" id="permiso" value="1" checked=""> 
                                                            Nivel 1 : Control total del sistema 
                                                            <i class="input-helper"></i></label>
                                                        </div>

                                                        <div class="form-radio">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="permiso" id="permiso" value="2"> 
                                                            Nivel 2 : Permiso para registro y actualización
                                                            <i class="input-helper"></i></label>
                                                        </div>

                                                        <div class="form-radio">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="permiso" id="permiso" value="3"> 
                                                            Nivel 3 : Permiso para registro
                                                            <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <button type="submit" name="editarusuario" class="btn btn-warning"><i class="fa fa-check"></i> Actualizar</button>
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

                        <div class="modal fade" id="'.$rows['codigousuario'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-header bg-danger text-center">
                                        <h4 class="text-light text-center">
                                            <button class="btn btn-icons btn-rounded btn-light"><i class="fa fa-exclamation text-danger"></i></button>

                                            ¿Esta seguro de eliminar al usuario : '.$rows['nombre_us'].'</h4>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="text-white">×</span>
                                        </button>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body bg-center">
                                        <div class="row">
                                          <form action="'.SERVERURL.'ajax/administradorAjax.php" method="POST" class="forms-sample" autocomplete="off">
                                                                     
                                            <div class="col-md-2">
                                                <input type="hidden" class="form-control" name="codigo" id="codigo" value="'.$rows['codigousuario'].'" readonly="readonly">
                                            </div>
                                            <div class="col-md-8 form-group">
                                            <button type="submit" name="eliminar_usuario" id="eliminar_usuario" class="btn btn-danger"><i class="fa fa-check"></i>Eliminar</button>

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
            return $tableuser;
            }

    }
    