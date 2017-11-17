<?php 
  include('config.php');

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "SELECT * FROM servicios;";

  $resultado = $conexion->query($sql);
  $servicios = array();

  if ($resultado->num_rows > 0) {
    // echo "<h2>Hay ". $resultado->num_rows ." registros</h2>";
    while ( $row = $resultado->fetch_assoc() ) {
      $servicios[] = $row;
    }
  } else {
    echo "<h1>No se encontro ningún servicio.</h1>";
  }
  $conexion->close();
?>