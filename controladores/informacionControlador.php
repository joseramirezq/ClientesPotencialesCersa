<?php
    if ($peticionAjax) {
        require_once('../modelos/informacionModelo.php');
    } else {
        require_once('./modelos/informacionModelo.php');
    }

class informacionControlador extends informacionModelo{

    public function agregar_informacion_controlador(){

        $cursointeres=1;
        $codigodeusuario="Facebook";

        $conexion=mainModel::conectar();
        $datosEs = $conexion->query("
        SELECT fecha_fin FROM especialidad WHERE idespecialidad=$cursointeres ");
        $datosEs = $datosEs->fetchAll();
        foreach ($datosEs as $rowsEs) {
            $fincurso=$rowsEs['fecha_fin'];
        
        }


        $nombre=mainModel::limpiar_cadena($_POST['nombre']);
        $apellidos="";
        $correo=mainModel::limpiar_cadena($_POST['correo']);
        $telefono=mainModel::limpiar_cadena($_POST['telefono']);
        $profesion=mainModel::limpiar_cadena($_POST['profesion']);
        $grado=mainModel::limpiar_cadena($_POST['grado']);
        $detalle=mainModel::limpiar_cadena($_POST['detalle']);
        $pais="";
        $departamento=mainModel::limpiar_cadena($_POST['departamento']);
        $distrito="";
        $direccion="";

        $dni="";
        $fecha="";
        $alumno="";
       

        $consulta3=mainModel::ejecutar_consulta_simple("SELECT 
        idcliente FROM cliente ");
        $numero=($consulta3->rowCount())+1;
        $codigo=mainModel::generar_codigo_aleatorio("CLI", 1, $numero);

        
        $estado=1;
        
        $codigodeusuario="Facebook";

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

 
    
}