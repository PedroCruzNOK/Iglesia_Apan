<?php 
  include('config.php');

  $id          = $_POST['id'];
  $nombre      = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $costo       = $_POST['costo'];

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "UPDATE servicios SET 
          nombre      = '$nombre',
          descripcion = '$descripcion',
          costo       = $costo
          WHERE servicio_id = $id";

  if ($conexion->query($sql) === TRUE) {
      header('Content-Type: application/json');
      echo json_encode(array(
        'error' => false,
        'message' => "El servicio se actualizó correctamente." 
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