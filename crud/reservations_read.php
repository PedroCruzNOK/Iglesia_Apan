<?php 
  include('config.php');

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  if( isset($_GET['id']) ){
    $id = $_GET['id'];
    $sql = "SELECT * FROM reservaciones WHERE reservacion_id = $id";
  }else{
    $sql = "SELECT
              reservaciones.reservacion_id,
              reservaciones.reservacion_id,
              reservaciones.nombre,
              servicios.nombre AS s_nombre,
              reservaciones.telefono,
              reservaciones.email,
              reservaciones.fecha,
              reservaciones.atendida
              FROM reservaciones INNER JOIN servicios ON reservaciones.servicio_id = servicios.servicio_id";
  }

  $resultado = $conexion->query($sql);
  $reservaciones = array();

  if ($resultado->num_rows > 0) {
    // echo "<h2>Hay ". $resultado->num_rows ." registros</h2>";
    while ( $row = $resultado->fetch_assoc() ){
      $reservaciones[] = $row;
    }
  } else {
    echo "<h1>No se encontro ningúna reservación.</h1>";
  }
  $conexion->close();
?>