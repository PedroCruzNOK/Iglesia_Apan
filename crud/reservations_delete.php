<?php 
  include('config.php');

  $id          = $_GET['id'];

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "DELETE FROM reservaciones WHERE reservacion_id = $id";

  if ($conexion->query($sql) === TRUE) {
      Header("Location: /reservaciones_adm.php"); 
  } else {
      Header("Location: /reservaciones_adm.php"); 
  }

  $conexion->close();
?>