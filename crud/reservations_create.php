<?php 
  include('../parciales/header.php');
  include('config.php');

  // $id      = $_POST['r_id'];
  $name    = $_POST['r_nombre'];
  $phone   = $_POST['r_telefono'];
  $email   = $_POST['r_email'];
  $date    = $_POST['r_fecha'];
  $time    = $_POST['r_hora'];
  $service = $_POST['r_servicio_id'];

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  // sprintf nos ayuda a prevenir ataques SQLInjection
  // mysqli__real_escape_string nos ayuda a escapar de simbolos
  // como las diagonales invertidas, comillas simples o dobles y otros simbolos
  $sql = sprintf("INSERT INTO reservaciones(nombre, telefono, email, fecha, hora, servicio_id)
          VALUES('%s', '%s', '%s', '%s', '%s', %u)",
          mysqli_real_escape_string($conexion, $name),
          mysqli_real_escape_string($conexion, $phone),
          mysqli_real_escape_string($conexion, $email),
          mysqli_real_escape_string($conexion, $date),
          mysqli_real_escape_string($conexion, $time),
          $service);

  if ($conexion->query($sql) === TRUE) {
      $id_result = mysqli_insert_id($conexion);
      // Header("Location: /page_historia.php?success="."Se creo con éxito la historia.");
      ?>

      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            
            <br>
            <h1 style="background-color: #D8EED7; color: #1B3B16; padding: .5em 1em;">La reservacion se realizo con exito, pronto nos pondremos en contacto contigo.</h1>
            <br>
            <a href="/" class="btn btn-primary btn-lg">Continuar</a>
          </div>
        </div>
      </div>

      <?php
  } else {
      // Header("Location: /page_historia.php?error="."Hubo un error al crear la historia, intenta de nuevo."); 
    ?>

      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            
            <br>
            <h1 style="background-color: #EED7D9; color: #3B1816; padding: .5em 1em;"><strong>ERROR</strong> al reservar, intenta de nuevo o ponte en contacto con nosotros.</h1>
            <br>
            <a href="/" class="btn btn-primary btn-lg">Continuar</a>
          </div>
        </div>
      </div>
    <?php
      // echo "Error: " . $sql . "<br>" . $conexion->error;
  }

  $conexion->close();
?>