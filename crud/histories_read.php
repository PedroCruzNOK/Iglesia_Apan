<?php 
  include('config.php');

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  if( isset($_GET['id']) ){
    $id = $_GET['id'];
    $sql = "SELECT * FROM historias WHERE historia_id = $id";
  }else{
    $sql = "SELECT * FROM historias";
  }

  $resultado = $conexion->query($sql);
  $historias = array();

  if ($resultado->num_rows > 0) {
    // echo "<h2>Hay ". $resultado->num_rows ." registros</h2>";
    while ( $row = $resultado->fetch_assoc() ){
      $historias[] = $row;
    }
  } else {
    echo "<h1>No se encontro ningúna historia.</h1>";
  }
  $conexion->close();
?>