<?php
     
        if ($peticionAjax) {
            require_once('../modelos/estadisticasModelo.php');
           
        } else {
            require_once('./modelos/estadisticasModelo.php');
          
        }

        class estadisticasControlador extends estadisticasModelo{

           

        public function total_clientes_controlador()
        {
                    $cantidadCli="";
                    $table="";
                    
                    $conexion=mainModel::conectar();

                    //cantidad de clientes en total
                    $datosCli = $conexion->query("
                    SELECT COUNT(*) AS TOTAL FROM cliente where fincurso>curdate()");
                    $datosCli = $datosCli->fetchAll();
                    foreach ($datosCli as $rowsCli) {
                    $cantidadCli=$rowsCli['TOTAL'];
                }

      

            $table.=' 
            <p class="card-description">
                Total de Clientes :
                <strong>'.$cantidadCli.'    </strong>
            </p>

           
                  
            ';
          //  $table.='    <p class="mb-2">Clientes Nuevos</p><p class="display-3 mb-4 font-weight-light">'.$totalhoy.'</p> </div>
           // </div>';
        
            //cantidad de estados
            $cantestados="";
            $datoscantestado = $conexion->query("
            SELECT COUNT(*) AS totalestado FROM interes");
            $datoscantestado = $datoscantestado->fetchAll();
            foreach ($datoscantestado as $rowsestadocant) {
            $cantestados=$rowsestadocant['totalestado'];
            }

            $table.='

            <p class="card-description">
              Total de Clientes en diferentes estados :
               <strong>'.$cantestados.'</strong>
            </p>

            <div class="table-responsive">
            <table class="table">
                <thead class="bg bg-primary text-white">
                    <tr>
                        <th>Estado</th>
                        <th>Cantidad.</th>
                        <th>Porcentaje</th>
                        <th>Grafica</th>
                    </tr>
                </thead>
                <tbody>';


            //estados de cada interes
            $idestado=0;
            $datosestadoG = $conexion->query("
            SELECT *  FROM estado");
            $datosestadoG = $datosestadoG->fetchAll();
            foreach ($datosestadoG as $rowsestadog) {
            $idestado=$rowsestadog['idestado'];
        

            $porcentaje=0;
            $estados="";
            $datosestado = $conexion->query("
            SELECT COUNT(*) AS totalestado FROM interes WHERE idestado='$idestado'");
            $datosestado = $datosestado->fetchAll();
            foreach ($datosestado as $rowsestado) {
            $estados=$rowsestado['totalestado'];
            }
            $porcentaje=($estados*100)/$cantestados;

            $table.='
            <style>
            .bcolores{
                background-color: '.$rowsestadog['color'].';
            }
            </style>

            <tr>
            <td> <label class="badge "> '.$rowsestadog['nombre_estado'].'</label></td>
            <td>'.$estados.'</td>
            <td>'.round($porcentaje,2).'%</td>

           
            <td>
              <div class="progress">
                  <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$porcentaje.'%" aria-valuenow="'.$estados.'" aria-valuemin="0" aria-valuemax="'.$cantestados.'">
                  </div>
               </div>
            </td>

            </tr> ';
            
            }
             return $table;

        }

        public function total_clientes_hoy_controlador()
        {
                    $cantidadCli="";
                    $table="";
                    
                    $conexion=mainModel::conectar();

                    //cantidad de clientes en total
                    $datosCli = $conexion->query("
                    SELECT COUNT(*) AS TOTAL FROM cliente where DATE_FORMAT(fecha_registro,'Y-m-d')=curdate()");
                    $datosCli = $datosCli->fetchAll();
                    foreach ($datosCli as $rowsCli) {
                    $cantidadCli=$rowsCli['TOTAL'];
                }

        
                //cantidad de nuevos REVISAR NO FUNCIONA ESTA FUNCION
                $totalhoy="";
                $datosClifecha = $conexion->query("
                
                SELECT COUNT(*) AS TOTALHOY FROM cliente WHERE DATE_FORMAT(fecha_registro,'Y-m-d')=curdate()");
                $datosClifecha = $datosClifecha->fetchAll();
                foreach ($datosClifecha as $rows) {
                $totalhoy=$rows['TOTALHOY'];
            }

            $table.=' 
            <p class="card-description">
                Cambios de estado de : 
                <strong> '.date('d-m-Y').'    </strong>
            </p>

           
                  
            ';
          //  $table.='    <p class="mb-2">Clientes Nuevos</p><p class="display-3 mb-4 font-weight-light">'.$totalhoy.'</p> </div>
           // </div>';
        
            //cantidad de estados
            $cantestados=0;
            $datoscantestado = $conexion->query("
            SELECT COUNT(*) AS totalestado FROM interes WHERE  DATE_FORMAT(`fecha_cambio_estado`,'%Y-%m-%d')=CURDATE()");
            $datoscantestado = $datoscantestado->fetchAll();
            foreach ($datoscantestado as $rowsestadocant) {
            $cantestados=$rowsestadocant['totalestado'];
            }

            if($cantestados==0){
              $cantestados=1000;
            }

            $table.='

            <p class="card-description">
              Total de Clientes en diferentes estados :
               <strong>'.$cantestados.'</strong>
            </p>

            <div class="table-responsive">
            <table class="table">
                <thead class="bg bg-warning text-white">
                    <tr>
                        <th>Estado</th>
                        <th>Cantidad.</th>
                        <th>Porcentaje</th>
                        <th>Grafica</th>
                    </tr>
                </thead>
                <tbody>';


            //estados de cada interes
            $idestado=0;
            $datosestadoG = $conexion->query("
            SELECT *  FROM estado");
            $datosestadoG = $datosestadoG->fetchAll();
            foreach ($datosestadoG as $rowsestadog) {
            $idestado=$rowsestadog['idestado'];
        

            $porcentaje=0;
            $estados="";
            $datosestado = $conexion->query("
            SELECT COUNT(*) AS totalestado FROM interes WHERE idestado='$idestado' AND DATE_FORMAT(`fecha_cambio_estado`,'%Y-%m-%d')=CURDATE()");
            $datosestado = $datosestado->fetchAll();
            foreach ($datosestado as $rowsestado) {
            $estados=$rowsestado['totalestado'];
            }
            $porcentaje=($estados*100)/$cantestados;

            $table.='
            <style>
            .bcolores{
                background-color: '.$rowsestadog['color'].';
            }
            </style>

            <tr>
            <td> <label class="badge "> '.$rowsestadog['nombre_estado'].'</label></td>
            <td>'.$estados.'</td>
            <td>'.round($porcentaje,2).'%</td>

           
            <td>
              <div class="progress">
                  <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$porcentaje.'%" aria-valuenow="'.$estados.'" aria-valuemin="0" aria-valuemax="'.$cantestados.'">
                  </div>
               </div>
            </td>

            </tr> ';
            

            }



                
                
            
                    
                        return $table;

        }
        
        public function top_clientes_controlador(){
            $tabletop="";
            $contador=0;
                    
            $conexion=mainModel::conectar();

            //cantidad de clientes en total
            $datosIntre = $conexion->query("
            SELECT * FROM interes WHERE fincurso>curdate()");
            $datosIntre = $datosIntre->fetchAll();
            foreach ($datosIntre as $rowsInte) {
              $codigocliente=$rowsInte['codigocliente'];
              $idespecialidad=$rowsInte['idespecialidad'];
              $idusuario=$rowsInte['idusuario'];
              $idestado=$rowsInte['idestado'];
    

              //ESPECIALIDAD
              $datosespecialidad = $conexion->query("
              SELECT nombre_es FROM especialidad WHERE idespecialidad='$idespecialidad'");
              $datosespecialidad = $datosespecialidad->fetchAll();
              foreach ($datosespecialidad as $rowsespe) {
                $nombrees=$rowsespe['nombre_es'];
              }

                 //usuario
                 $datosus= $conexion->query("
                 SELECT nombre_us FROM usuario WHERE idusuario=$idusuario");
                 $datosus = $datosus->fetchAll();
                 foreach ($datosus as $rowsus) {
                   $nombreus=$rowsus['nombre_us'];
                 }


                 //estado
                 $datoestado= $conexion->query("
                 SELECT nombre_estado FROM estado WHERE idestado=$idestado");
                 $datoestado = $datoestado->fetchAll();
                 foreach ($datoestado as $rowsestado) {
                   $nombreestado=$rowsestado['nombre_estado'];
                 }
   


                $datosCli = $conexion->query("
              SELECT * FROM cliente WHERE codigocliente='$codigocliente'");
              $datosCli = $datosCli->fetchAll();
              foreach ($datosCli as $rowsCli) {


              $contador++;


                $tabletop.='
                <tr>

                <td class="font-weight-medium">
                 '.$contador.'
                </td>

                <td class="font-weight-medium">
                '.$rowsInte['codigocliente'].'
                 </td>

                <td>
                '.$rowsCli['nombres_cli'].' '.$rowsCli['apellidos_cli'].'
                </td>

                <td>
                '.$rowsCli['fecha_registro'].'
                </td>

                <td>
                '.$rowsInte['fecha_cambio_estado'].'
                </td>

                <td>
                '.$nombrees.'
                </td>

                <td>
                '.$nombreus.'
                </td>

                <td>
                '.$nombreestado.'
                </td>

              </tr>
           ';
        }

        
        }
        return $tabletop; 
      }
     
    }