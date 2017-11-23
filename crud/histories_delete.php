<?php 
  session_start();
  include('config.php');

  $id = $_GET['id'];

  // if($id == $_SESSION['user_id']){
  //    header('Content-Type: application/json');
  //     echo json_encode(array(
  //       'error' => true,
  //       'message' => "ERROR: No puedes eliminarte a ti mismo." 
  //     ));
  //     die();
  // }

  $conexion = new mysqli($host, $user, $pass, $db);

  if($conexion -> connect_error){
    die("La conexion falló: " . $conexion -> connect_error);
  }

  $sql = "DELETE FROM historias WHERE historia_id = $id";

  if ($conexion->query($sql) === TRUE) {
      // header('Content-Type: application/json');
      // echo json_encode(array(
      //   'error' => false,
      //   'message' => "El usuario fue ELIMINADO." 
      // )); 
      Header("Location: /page_historia.php?success="."Se ELIMINO con éxito la historia."); 

  } else {
      // header('Content-Type: application/json');
      // echo json_encode(array(
      //   'error' => true,
      //   'message' => "Error: " . $sql . "<br>" . $conexion->error
      // ));
      Header("Location: /page_historia.php?error="."Hubo un ERROR al eliminar la historia, intenta de nuevo.<br>"); 

  }

  $conexion->close();
?>