<?php 
  include('config.php');

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM servicios WHERE servicio_id = $id";
  }else{
    $sql = "SELECT * FROM servicios";
  }


  $resultado = $conexion->query($sql);
  $servicios = array();

  if(isset($id)){
    if ($resultado->num_rows > 0) {

      $row = $resultado->fetch_assoc();

      header('Content-Type: application/json');
      echo json_encode(array(
        'error' => false,
        'message' => "Se agrego correctamente un nuevo registro.",
        'id' => $id,
        'title' => $row['nombre'],
        'content' => $row['descripcion'],
        'cost' => $row['costo']
      ));     
    } else {
      header('Content-Type: application/json');
      echo json_encode(array(
        'error' => true,
        'message' => "Error: " . $sql . "<br>" . $conexion->error
      ));
    }
  }else{
    if ($resultado->num_rows > 0) {
      // echo "<h2>Hay ". $resultado->num_rows ." registros</h2>";
      while ( $row = $resultado->fetch_assoc() ) {
        $servicios[] = $row;
      }
    } else {
      echo "<h1>No se encontro ningún servicio.</h1>";
    }
  }

  $conexion->close();
?>