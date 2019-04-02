<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php SERVERURL;?>home">
          <img src="vistas/images/newlogo.png" alt="logo" class="img-fluid" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php SERVERURL;?>home">
          <img src="vistas/images/favicon.ico" alt="logo" class="img-fluid" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
       
          <li class="nav-item">
            <a href="<?php SERVERURL;?>home" class="nav-link">Inicio
              <span class="badge badge-primary ml-1"><i class="fa fa-book"></i> Cursos/Diplomados <i class="fa fa-graduation-cap"></i></span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="<?php SERVERURL;?>listacliente" class="nav-link">
            <i class="fa fa-child"></i>Clientes</a>
          </li>
          <li class="nav-item">
            <a href="<?php SERVERURL;?>estadisticasusuario" class="nav-link">
            <i class="fa fa-bar-chart-o"></i>Reportes</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
         <!-- <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">0</span>
            </a>
            DROPDOWN DE LAS NOTIFICACIONES DE MENSAJES 
             <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">Noticicaciones de Emails ejemplo 7
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
        
        
            
       </li>-->

         <!--NOTIFICACIONES CAMPANITA-->
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count"></span>
            </a>

             <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">Notificaciones 
                </p>
                <span class="badge badge-pill badge-warning float-right">Llamar a los clientes</span>
                <span class="badge badge-pill badge-success float-right">Nuevos</span>
              </a>
                 <?php
                require_once("./controladores/cursoControlador.php");
                 $insEspecialidad = new cursoControlador();
               echo $insEspecialidad->mostrar_notificaciones_controlador();

              ?>
            
            
             
            </div>
          </li>








          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <!--nombre del usuario que ha iniciado sesion-->  
            <span class="profile-text"><?php echo  $_SESSION['us_nombre'] ;?></span>
              <img class="img-xs rounded-circle" src="<?php echo $_SESSION['foto_srcp'];?>" alt="Foto Perfil">
            </a>
        
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          
              <a href="<?php SERVERURL;?>"  class="dropdown-item mt-2">
                Perfil
              </a>
          
              <a   href="<?php echo  $instanciaLogin->encryption($_SESSION['token_srcp']) ;?>" class="dropdown-item  btn-exit-system">
                Cerrar Sesión
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>