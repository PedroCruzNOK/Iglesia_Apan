<?php session_start(); ?>
<?php include('parciales/header.php') ?>
<?php
  $host    = "localhost";
  $usuario = "iglesia";
  $pass    = "aaaX4#efsW098_____!Asad43";
  $db      = "iglesiapan";
  $tabla   = "usuarios";

  $conexion = new mysqli($host, $usuario, $pass, $db);

  if ($conexion->connect_error) {
   die("La conexion falló: " . $conexion->connect_error);
  }

  $username = $_POST['usuario'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM $tabla WHERE usuario = '$username'";

  $resultado = $conexion->query($sql);


  if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_array(MYSQLI_ASSOC);
    // if (password_verify($password, $row['password'])) {
    if (md5($password) == $row['password']) {
      $_SESSION['loggedin'] = true;
      $_SESSION['user_id'] = $row['usuario_id'];
      $_SESSION['username'] = $username;
      // $_SESSION['start'] = time();
      // $_SESSION['expire'] = $_POSTSESSION['start'] + (5 * 60);

?>
      <div class="container">
        <div class="row justify-content-center">
          <div class="column col-sm-12 col-md-8 text-center login">
            <br><br>
            <h1>Bienvenido <strong><?php echo $_SESSION['username'] ?></strong></h1>
            <p>Tu sesión es: <?php echo session_id(); ?></p>
            <a href="index.php" class="btn btn-primary btn-lg btn1">Continuar</a>
          </div>
        </div>
      </div>
<?php
    }
    else{
      echo "Username o Password estan incorrectos.";
      echo "<br><a href='login.php'>Volver a Intentarlo</a>";
    }
  }
  mysqli_close($conexion);
?>
<?php include('parciales/footer.php') ?>
