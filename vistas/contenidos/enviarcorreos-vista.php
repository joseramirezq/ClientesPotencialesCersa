<div class="row">
    <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lista de direcciones electrónicas por enviar</h4>
                        <p class="card-description">
                            Revisar que los direcciones electrónicas esteen correctos antes de copiarlos
                        </p>
                        

                            <script>
                                function copiarAlPortapapeles(id_elemento) {
                                var aux = document.createElement("input");
                                aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
                                document.body.appendChild(aux);
                                aux.select();
                                document.execCommand("copy");
                                document.body.removeChild(aux);
                                }
                            </script>

                            <p id="p1">
                                         <?php
                                            require_once("./controladores/cursoControlador.php");
                                            $insEspecialidad = new cursoControlador();
                                            echo $insEspecialidad->mostrar_correos();
                                         ?>
                            </p>
                            <p id="p2" style="visibility: hidden">
                                         <?php
                                            require_once("./controladores/cursoControlador.php");
                                            $insEspecialidad = new cursoControlador();
                                            echo $insEspecialidad->mostrar_correos_dos();
                                         ?>
                            </p>
                            <button onclick="copiarAlPortapapeles('p2')" class="btn btn-success mr-2">Copiar</button>
                              
                             <div><hr></div>
                            
                        <form class="forms-sample">
                            <div class="form-group"> 
                                <label for="">Hacer clic en el botón "YA ENVIE CORREOS" si usted ya envio todos los correos a las direcciones electrónicas de la lista</label><br>
                                <button type="submit" class="btn btn-dark mr-2">Ya envie correos</button>
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lista de direcciones electrónicas por enviar</h4>
                        <p class="card-description">
                            Revisar que los direcciones electrónicas esteen correctos antes de copiarlos
                        </p>
                        

                            <script>
                                function copiarAlPortapapeles(id_elemento) {
                                var aux = document.createElement("input");
                                aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
                                document.body.appendChild(aux);
                                aux.select();
                                document.execCommand("copy");
                                document.body.removeChild(aux);
                                }
                            </script>

                            <p id="p1">
                                         <?php
                                            require_once("./controladores/cursoControlador.php");
                                            $insEspecialidad = new cursoControlador();
                                            echo $insEspecialidad->mostrar_correos();
                                         ?>
                            </p>
                            <p id="p2" style="visibility: hidden">
                                         <?php
                                            require_once("./controladores/cursoControlador.php");
                                            $insEspecialidad = new cursoControlador();
                                            echo $insEspecialidad->mostrar_correos_dos();
                                         ?>
                            </p>
                            <button onclick="copiarAlPortapapeles('p2')" class="btn btn-success mr-2">Copiar</button>
                              
                             <div><hr></div>
                            
                        <form class="forms-sample">
                            <div class="form-group"> 
                                <label for="">Hacer clic en el botón "YA ENVIE CORREOS" si usted ya envio todos los correos a las direcciones electrónicas de la lista</label><br>
                                <button type="submit" class="btn btn-dark mr-2">Ya envie correos</button>
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>