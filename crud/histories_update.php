<?php 
  include('config.php');

  $id       = $_POST['history_id'];
  $title    = $_POST['history_title'];
  $content  = $_POST['history_content'];
  $image_url= $_POST['history_image_url'];

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "UPDATE historias SET 
          titulo     = '$title',
          contenido  = '$content',
          imagen_url = '$image_url'
          WHERE historia_id = $id";

  if ($conexion->query($sql) === TRUE) {
      Header("Location: /page_historia.php?success="."Se creo con éxito la historia."); 
  } else {
      Header("Location: /page_historia.php?error="."Hubo un error al actualizar la historia, intentalo de nuevo.");
  }

  $conexion->close();
?>