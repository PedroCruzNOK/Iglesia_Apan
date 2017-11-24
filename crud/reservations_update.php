<?php 
  include('config.php');

  $id       = $_GET['id'];
  // $title    = $_POST['history_title'];
  // $content  = $_POST['history_content'];
  // $image_url= $_POST['history_image_url'];
  $action   = $_GET['action'];

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  if($action == 'atendida'){
    $sql = "UPDATE reservaciones SET atendida = true WHERE reservacion_id = $id";
  } else {

    $sql = "UPDATE reservaciones SET 
            titulo     = '$title',
            contenido  = '$content',
            imagen_url = '$image_url'
            WHERE historia_id = $id";
  }


  if ($conexion->query($sql) === TRUE) {
      Header("Location: /reservaciones_adm.php?success="."Peticion atendida"); 
  } else {
      Header("Location: /page_historia.php?error="."No se pudo registrar tu acción, intenta de nuevo.");
  }

  $conexion->close();
?>