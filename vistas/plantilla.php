
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('vistas/modulos/link.php'); ?>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('vistas/modulos/script1.php'); ?>   
    <title><?php echo COMPANY;?></title>
   
    <!-- Facebook Pixel Code --><script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '259226141222886');
  fbq('track', 'PageView');
</script><noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=259226141222886&ev=PageView&noscript=1"
/></noscript><!-- End Facebook Pixel Code --><script>
  fbq('track', 'Purchase');
</script><script>
  fbq('track', 'Lead');
</script><script>
  fbq('track', 'CompleteRegistration');
</script><script>
  fbq('track', 'AddToCart');
</script><script>
  fbq('track', 'Search');
</script><script>
  fbq('track', 'Contact');
</script><script>
  fbq('track', 'FindLocation');
</script><script>
  fbq('track', 'Subscribe');
</script><script>
  fbq('track', 'Purchase');
</script><script>
  fbq('track', 'Purchase', {
    value: 1,
    currency: 'PEN',
  });
</script><!-- Facebook Pixel Code --><script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '550768331977025');
  fbq('track', 'PageView');
</script><noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=550768331977025&ev=PageView&noscript=1"
/></noscript><!-- End Facebook Pixel Code --><script>
  fbq('track', 'Purchase');
</script><script>
  fbq('track', 'Purchase', {
    value: 1,
    currency: '1',
  });
</script><script>
  fbq('track', 'Lead');
</script><script>
  fbq('track', 'CompleteRegistration');
</script><script>
  fbq('track', 'AddPaymentInfo');
</script><script>
  fbq('track', 'AddToCart');
</script><script>
  fbq('track', 'ViewContent');
</script><script>
  fbq('track', 'Contact');
</script><script>
  fbq('track', 'Subscribe');
</script>






</head>
<body>
 
<body>
<?php @ob_start(); ?>
    <?php
    
      $peticionAjax=false;

        require_once('./controladores/vistasControlador.php');
        $vist= new vistasControlador();
        $vistasRespuesta=$vist->obtener_vistas_controlador();

        if($vistasRespuesta=="login" || $vistasRespuesta=="404" || $vistasRespuesta=="informacion" || $vistasRespuesta=="obrasporimpuestos"   || $vistasRespuesta=="gracias" || $vistasRespuesta=="cursogracias"):
            if ($vistasRespuesta=="login" ) {
              require_once('./vistas/contenidos/login-vista.php');
            } else if($vistasRespuesta=="informacion"){
              require_once('./vistas/contenidos/informacion/seguridadsalud-vista.php');
            }else if($vistasRespuesta=="gracias"){
              require_once('./vistas/contenidos/informacion/gracias-vista.php');
            }else if($vistasRespuesta=="cursogracias"){
              require_once('./vistas/contenidos/informacion/cursogracias-vista.php');
            }
          else if($vistasRespuesta=="obrasporimpuestos"){
            require_once('./vistas/contenidos/informacion/obrasporimpuesto-vista.php');
          }
          else{
              require_once('./vistas/contenidos/404-vista.php');
            }
            
           
        else:
          session_start(['name'=>'SRCP']);
          require_once('./controladores/loginControlador.php');
          $instanciaLogin= new loginControlador();
          if(!isset($_SESSION['token_srcp'])){
              $instanciaLogin->forzar_cierre_sesion_controlador();
          }
        ?>
      
      <div class="container-scroller">
      <!-- NAVBAR -->
      <?php include('modulos/_navbar.php'); ?>
      
      <div class="container-fluid page-body-wrapper">
        <!-- SIDEBAR(BARRA LATERAL) -->
              <?php include('modulos/_sidebar.html'); ?>
        
         <!--CONTENIDO DEL LA PAGINA-->
        <div class="main-panel">
          <div class="content-wrapper">

            <!--Contenido-->
            <?php require_once $vistasRespuesta;?>



    
     </div>
          <!-- content-wrapper ends -->
          <!-- FOOTERS -->
        <?php include('modulos/_footer.html'); ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
  </div>
  <!--incluyendo alterta script para cierre de seccion-->
    <?php include('./vistas/modulos/logoutScript.php'); ?>   

    <?php endif;?>

    <?php include('vistas/modulos/script.php'); ?>    
  
 
</body>
</html>