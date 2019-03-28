<!--titulo-->
<div class="row ">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-primary text-center">
                <i class="fa fa-plus-circle text-primary icon-lg"></i>
                &nbsp; Agregar Curso/Diplomado</h3>
            </div>
        </div>
    </div>
</div>



<!--formulario de registro de un curso-->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-primary"> <i class="fa fa-bullhorn text-danger icon-lg"></i> LLene el formulario correctamente </h4>

                <hr>
                <form data-form="save" action="<?php echo SERVERURL; ?>ajax/cursoAjax.php" method="POST" class="forms-sample " autocomplete="off">

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">Tipo</label>
                            <select class="form-control form-control-lg" name="categoria" id="categoria">
                                <option value="1">Curso</option>
                                <option value="2">Diplomado</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-4">
                            <label>Nombre</label>

                            <input type="text" class="form-control form-control-lg" name="nombre" id="nombre" placeholder="Nombre del curso o diplomado" required>
                        </div>

                        <div class="form-group col-md-8">
                            <label>Descripcion</label>
                            <input type="text" class="form-control form-control-lg" name="descripcion" id="descripcion" placeholder="Corta descripcion del curso" required>
                        </div>

                                   
                        <div class="form-group col-md-4">
                            <label>Fecha Inicio</label>
                            <div class="input-group date border-primary form_date col-md-12 input-group-append" >
                                <input class="form-control" type="date"  name="fechainicio" id="fechainicio" required>
                               
                            </div>

                        </div>



                        <div class="form-group col-md-4">
                            <label>Fecha Fin</label>
                            <div class="input-group date border-primary form_date col-md-12 input-group-append">
                                <input class="form-control" type="date" name="fechafin" id="fechafin" value="" required>
                            </div>

                        </div>

                        <div class="form-group col-md-4">
                            <label>Duracion</label>
                            <input type="text" class="form-control form-control-lg" name="duracion" id="duracion" placeholder="Duracion" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Horario</label>
                            <input type="text" class="form-control" name="horario" id="horario" placeholder="Horario de clases" aria-label="Horario" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Costo Matricula</label>
                            <input type="number" class="form-control" name="costomatricula" id="costomatricula" placeholder="Costo matricula" aria-label="Costo Matricula" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Costo Certificado</label>
                            <input type="number" class="form-control" name="costocertificado" id="costocertificado" placeholder="Costo certificado" aria-label="Costo Certificado" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Costo Alternativo</label>
                            <input type="number" class="form-control" name="costoalternativo" id="costoalternativo" placeholder="Costo alternativo" aria-label="Costo alternativo" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Horas de certificación</label>
                            <input type="text" class="form-control form-control-lg" name="horascertificado" id="horascertificado" placeholder="Horas de certificacion" aria-label="Horas de certificacion" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">Modalidad</label>
                            <select class="form-control form-control-lg" name="modalidad" id="modalidad" required>
                                <option value="1">Virtual en Vivo</option>
                                <option value="2">Virtual /Solo accesos </option>
                                <option value="3">Presencial </option>

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Docente</label>
                            <input type="text" class="form-control" name="docente" id="docente" placeholder="Nombre del docente" aria-label="Nombre del Docente" required>
                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group">
                            <button type="submit" name="agregarcursobd" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
                            <a href="<?php echo SERVERURL ?>/home" class="btn btn-info"><i class="fa fa-meh-o"></i> Cancel</a>

                        </div>
                    </div>


                </form>
                <div class="RespuestaAjax"></div>
            </div>


        </div>
    </div>
</div> 