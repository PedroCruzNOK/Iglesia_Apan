<?php 
  include('../parciales/header.php');
  include('config.php');

  $titulo    = $_POST['history_title'];
  $contenido = $_POST['history_content'];
  $imagen_url     = $_POST['history_image_url'];

  // echo $titulo;
  // echo "<hr>";
  // echo $contenido;
  // echo "<hr>";
  // echo $imagen_url;

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "INSERT INTO historias(titulo, contenido, imagen_url, fecha)
          VALUES('$titulo', '$contenido', '$imagen_url', CURDATE())";

  if ($conexion->query($sql) === TRUE) {
      $id_result = mysqli_insert_id($conexion);
      // header('Content-Type: application/json');
      // echo json_encode(array(
      //   'error' => false,
      //   'message' => "Se creo con éxito la historia.",
      //   'id' => $id_result,
      //   'name' => $titulo,
      //   'description' => $contenido,
      //   'cost' => $fecha
      // ));     
      Header("Location: /page_historia.php?success="."Se creo con éxito la historia.");
  } else {
      // header('Content-Type: application/json');
      // echo json_encode(array(
      //   'error' => true,
      //   'message' => "Error: " . $sql . "<br>" . $conexion->error
      // ));
      Header("Location: /page_historia.php?error="."Hubo un error al crear la historia, intenta de nuevo.");  
  }

  $conexion->close();
?>