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
    <title><?php echo ($title ? $title : "Parroquia Apan"); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat:200i|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" media="screen" title="no title">
  </head>
  <body>
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col col-sm-12 no-gutters">
            <?php if($admin){?>
              <div class="login-info align-middle">
                <span class="align-middle">
                  <strong>Puedes amdinistrar!</strong> Recuerda salir de tu sesión antes de irte.
                </span>
                <a href="logout.php" class="btn btn-info btn-sm float-right">Cerrar Sesión</a>
              </div>
            <?php }else{ ?>
              <a href="login.php" class="btn btn-outline-secondary btn-sm float-right">Ingresar</a>
            <?php } ?>
          </div>
          <div class="col-md-12 conteTitulo">
            <h1 class="titulo text-center">Parroquia APAN Hidalgo</h1>
          </div>
        </div>
        <div class="row ">
          <div class="col-sm-12 col-md-8 offset-md-2">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #353734;">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mr-auto">
                   <li class="nav-item active">
                     <a class="btn menu" href="page_historia.php">HISTORIA <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item active">
                     <a class="btn menu" href="page_tramites.php">TRAMITES <span class="sr-only">(current)</span><span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item active">
                     <a class="btn  menu" href="page_informacion.php">INFORMACION <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item active">
                     <a class="btn  menu" href="page_quienes_somos.php">QUIENES SOMOS<span class="sr-only">(current)</span></a>
                   </li>
                   <li class="nav-item active">
                     <a class="btn  menu" href="page_acerca_de.php">ACERCA DE <span class="sr-only">(current)</span></a>
                   </li>

                 </ul>
               </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
