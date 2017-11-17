<?php 
  session_start();
  include('config.php');

  $id = $_POST['id'];

  if($id == $_SESSION['user_id']){
     header('Content-Type: application/json');
      echo json_encode(array(
        'error' => true,
        'message' => "ERROR: No puedes eliminarte a ti mismo." 
      ));
      die();
  }

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