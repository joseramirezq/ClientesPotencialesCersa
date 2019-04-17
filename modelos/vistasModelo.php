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
            "estadisticasestadoscurso",
            "enviarcorreos",


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
            "sesionestadoactual",

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
        } elseif($vistas == "informacion") {
            $contenido = "informacion";
        }

        //cursos abril
        elseif($vistas == "obrasporimpuestos") {
            $contenido = "obrasporimpuestos";


        //cursos de mayo
        } elseif($vistas == "analisisdisenoMayo") {
            $contenido = "analisisdisenoMayo";
        }
        elseif($vistas == "autocadMayo") {
            $contenido = "autocadMayo";
        }

        elseif($vistas == "edificacionesMayo") {
            $contenido = "edificacionesMayo";
        }
        elseif($vistas == "hidraulicaMayo") {
            $contenido = "hidraulicaMayo";
        }
        elseif($vistas == "valorizacionMayo") {
            $contenido = "valorizacionMayo";
        }
        elseif($vistas == "pmbokMayo") {
            $contenido = "pmbokMayo";
        }
        elseif($vistas == "saneamientoMayo") {
            $contenido = "saneamientoMayo";
        }
        elseif($vistas == "sistemainfoMayo") {
            $contenido = "sistemainfoMayo";
        }
        elseif($vistas == "supervicionobrasMayo") {
            $contenido = "supervicionobrasMayo";
        }

        //gracias 
        else if($vistas=="gracias"){
            $contenido = "gracias";

        } else if($vistas=="cursogracias"){
            $contenido = "cursogracias";
        }else{
            $contenido = "404";
        }
        return $contenido;
    }
}
