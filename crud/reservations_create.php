<?php 
  include('../parciales/header.php');
  include('config.php');

  // $id      = $_POST['r_id'];
  $name    = $_POST['r_nombre'];
  $phone   = $_POST['r_telefono'];
  $email   = $_POST['r_email'];
  $fecha   = $_POST['r_fecha'];
  $service = $_POST['r_servicio_id'];

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "INSERT INTO reservaciones(nombre, telefono, email, fecha, servicio_id)
          VALUES('$name', '$phone', '$email', '$fecha', $service)";

  if ($conexion->query($sql) === TRUE) {
      $id_result = mysqli_insert_id($conexion);
      // Header("Location: /page_historia.php?success="."Se creo con éxito la historia.");
      echo '<br><h1>La reservacion se realizo con exito, pronto nos pondremos en contacto contigo.</h1><br>';
  } else {
      // Header("Location: /page_historia.php?error="."Hubo un error al crear la historia, intenta de nuevo.");  
      echo '<br><h1><strong>ERROR</strong> al reservar, intenta de nuevo o ponte en contacto con nosotros.</h1><br>';
  }

  $conexion->close();
?>