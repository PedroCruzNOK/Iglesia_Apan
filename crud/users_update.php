<?php 
  include('config.php');

  $id   = $_POST['id'];
  $username = $_POST['user'];
  $userpass = $_POST['pass'];

  // $id       = 12;
  // $username = 'ab';
  // $userpass = '';

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  if(!empty($pass)){
    $sql = "UPDATE usuarios SET 
            usuario      = '$username',
            password = md5('$userpass')
            WHERE usuario_id = $id";
  }else{
    $sql = "UPDATE usuarios SET 
            usuario      = '$username'
            WHERE usuario_id = $id";
  }

  if ($conexion->query($sql) === TRUE) {
      header('Content-Type: application/json');
      echo json_encode(array(
        'error' => false,
        'message' => "El usuario se actualizó correctamente." 
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