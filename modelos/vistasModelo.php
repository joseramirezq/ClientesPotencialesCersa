<?php

class vistasModelo
{

    protected function obtener_vistas_modelo($vistas)
    {
        //lista blanca , menos el login
        $listaBlanca = [
            "home",
            "homelista",
            "usuario",

            //vistas clientes
            "listacliente",
            "agregarcliente",
            "detallecliente",
            "editarcliente",
            "estadisticascliente",

            "clientesmatriculados",
            "clientesprematriculados"
            ,

            //vistas curso
            "listacurso",
            "agregarcurso",
            "detallecurso",
            "editarcurso",
            "estadisticascurso",

            //vista usuarios
            "listausuario",
            "agregarusuario",
            "estadisticasusuario",



            //vistas reportes
            "graficos",

            //sesiones
            "sesioncurso",
            "vercurso",
            "sesionestados",

            //otrasvistas
            "adcategoria",
            "adestados",
            "adpermisos",


            //prematricula
            
        ];

        //si el valor que recibe de el controladro esta en la lista blanca
        if (in_array($vistas, $listaBlanca)) {

            if (is_file("./vistas/contenidos/".$vistas."-vista.php")) {
                $contenido = "./vistas/contenidos/".$vistas."-vista.php";
            } else { 
                $contenido = "login";
            }
        } elseif ($vistas == "login") {
            $contenido = "login";
        } elseif ($vistas == "index") {
            $contenido = "login";
        } elseif($vistas == "prematricula") {
            $contenido = "prematricula";
        }else if($vistas=="formularioinfo"){
            $contenido = "formularioinfo";
        }else{
            $contenido = "404";
        }
        return $contenido;
    }
}
