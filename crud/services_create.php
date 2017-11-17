<?php 
  include('config.php');

  $nombre      = $_POST['servicio'];
  $descripcion = $_POST['descripcion'];
  $costo       = $_POST['costo'];

  // $nombre = 'name';
  // $descripcion = 'description';
  // $costo = 12345;

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "INSERT INTO servicios(nombre, descripcion, costo)
          VALUES('$nombre', '$descripcion', $costo);";

  if ($conexion->query($sql) === TRUE) {
      $id_result = mysqli_insert_id($conexion);
      header('Content-Type: application/json');
      echo json_encode(array(
        'error' => false,
        'message' => "Se agrego correctamente un nuevo registro.",
        'id' => $id_result,
        'name' => $nombre,
        'description' => $descripcion,
        'cost' => $costo
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