<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper">

                        <form action="" method="POST" class="forms-sample">

                            <h3 class="text-center">Inicio de Sesion</h3><br>
                            <div class="form-group">
                                <label class="label">Usuario</label>
                                <div class="input-group">
                                    <input required=""  type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label">Contraseña</label>
                                <div class="input-group">
                                    <input required="" type="password" name="pass" id="pass" class="form-control" placeholder="*********">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block">Login</button>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <div class="form-check form-check-flat mt-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" checked> Recordar contraseña
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">
                                <button class="btn btn-block g-login">
                            </div>
                            <div class="text-block text-center my-3">
                                <span class="text-small font-weight-semibold">Si se ha olvidado su usuario o contraseña</span>
                                <a href="register.html" class="text-black text-small">contacte con el Administrador</a>
                            </div>
                        </form>
                    </div>
                    <ul class="auth-footer">

                    </ul>
                    <p class="footer-text text-center">copyright © 2018 Cersa. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php
 if(isset($_POST['usuario']) && isset($_POST['pass'])){
    require_once("./core/configgeneral.php");
     require_once("./controladores/loginControlador.php");
     $instanciaLogin= new loginControlador();
     echo   $instanciaLogin->iniciar_sesion_controlador();
 }
?> 