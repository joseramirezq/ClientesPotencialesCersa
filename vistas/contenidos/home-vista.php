<!--CONTENIDO DEL LA PAGINA-->

<div class="row">
    <div class="col-md-12">
        <h5 class="text-center text-dark"><i class="fa fa-bullhorn text-danger "></i> Se le recomienda que cierre sesión en un curso al terminar de atender a los clientes</h5>
        <a href="<?php SERVERURL ?>home"><button type="button" class="mb-0 btn btn-warning btn-fw"> <i class="fa fa-refresh"></i> Actualizar</button></a>
        <a href="<?php SERVERURL ?>homelista"><button type="button" class="mb-0 btn btn-dark btn-fw"> <i class="fa fa-list-ol"></i> Ver lista</button></a>
    </div>

    <div class="col-md-12">
    </div>
    
    <br>

</div>



<div class="row">
    <?php
    require_once("./controladores/cursoControlador.php");
    $insEspecialidad = new cursoControlador();
    echo $insEspecialidad->mostrar_cursos_controlador();
    ?>
</div>



<!--fin cursos-->