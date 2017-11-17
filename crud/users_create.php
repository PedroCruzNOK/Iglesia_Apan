<?php 
  include('config.php');

  $usuario  = $_POST['user'];
  $password = $_POST['pass'];

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "INSERT INTO usuarios(usuario, password)
          VALUES('$usuario', md5('$password'));";

  if ($conexion->query($sql) === TRUE) {
      $id_result = mysqli_insert_id($conexion);
      header('Content-Type: application/json');
      echo json_encode(array(
        'error' => false,
        'message' => "Se agrego con éxito un nuevo usuario.",
        'id' => $id_result
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