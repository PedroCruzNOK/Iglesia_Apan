<?php
  session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $admin = true;
  } else{
    $admin = false;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Insertamos el titulo, se da valor por default si no se definio antes -->
    <title><?php echo (isset($title) ? $title : "Parroquia Apan"); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat:200i|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/styles.css" media="screen" title="no title">
    <script src="/js/tinymce/tinymce.min.js"></script>
  </head>
  <body>
    <header>
      <div class="">
        <div class="row">
          <div class="col col-sm-12">
            <?php if($admin){?>
              <div class="login-info align-middle">
                <span class="align-middle">
                  <strong>Puedes amdinistrar!</strong> Recuerda salir de tu sesión antes de irte.
                </span>
                <div class="btn-group float-right" role="group" aria-label="Basic example">
                  <a href="/usuarios/" class="btn btn-sm btn-secondary">Usuarios</a>
                  <a href="/logout.php" class="btn btn-info btn-sm">Cerrar Sesión</a>
                </div>
              </div>
            <?php }else{ ?>
              <a href="login.php" class="btn btn-outline-secondary btn-sm float-right btn1">Ingresar</a>
            <?php } ?>
          </div>
          <div class="col-sm-12 col-md-12 conteTitulo">
            <h1 class="titulo text-center">PARROQUIA SAGRADO CORAZON DE JESUS</h1>
          </div>

        </div>

        <div class="row ">
          <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #261C14;">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mr-auto text-center ml-auto">
                   <li class="nav-item">
                     <a class="btn menu" href="/index.php">INICIO <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item active">
                     <a class="btn menu" href="/page_historia.php">HISTORIA <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item active">
                     <a class="btn menu" href="/page_tramites.php">TRAMITES e INFORMACION <span class="sr-only">(current)</span><span class="sr-only">(current)</span></a>
                   </li>

                   <li class="nav-item active">
                     <a class="btn  menu" href="/page_quienes_somos.php">QUIENES SOMOS<span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item active">
                     <a class="btn  menu" href="/page_acerca_de.php">ACERCA DE <span class="sr-only">(current)</span></a>
                   </li>

                 </ul>
                 <div class="redes_sociales d-flex flex-row justify-content-center">
                  <a href="#"class="btn btn-outline-primary mr-2">F</a>
                  <a href="#"class="btn btn-outline-danger">Y</a>
                 </div>
               </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
