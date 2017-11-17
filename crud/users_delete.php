<?php 
  include('config.php');

  $id = $_POST['id'];

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "DELETE FROM usuarios WHERE usuario_id = $id";

  if ($conexion->query($sql) === TRUE) {
      header('Content-Type: application/json');
      echo json_encode(array(
        'error' => false,
        'message' => "El usuario fue ELIMINADO." 
      )); 
  } else {
      header('Content-Type: application/json');
      echo json_encode(array(
        'error' => true,
        'message' => "Error: " . $sql . "<br>" . $conexion->error
      ));
  }

  $conexion->close();
?>