<?php
if ($peticionAjax) {
    require_once('../core/mainModel.php');
} else {
    require_once('./core/mainModel.php');
}

class estadisticasModelo extends mainModel
{
    //agregar estado modelo
    protected function total_clientes_controlador()
    {}
}