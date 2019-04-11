<!--titulo del curso-->
<?php

if($_SESSION['privilegio_srcp']==1){
 
?>
<div class="row ">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="text-primary text-center">  Clientes Matriculados
              
              </h3>
            </div>
          </div>
        </div>
</div>
      
      
      
   
      



<!--tabla de liosta de clientes-->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Clientes</h4>     
                
                           <?php
                            require_once("./controladores/clienteControlador.php");
                            //INSTANCIOAMOS LA CLASE//
                            $insEstado = new clienteControlador();
                            echo $insEstado->leer_cliente_matriculado_controlador();
                            ?>                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>