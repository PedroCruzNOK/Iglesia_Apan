<?php $title = "Login" ?>
<?php include("parciales/header.php") ?>
  <div class="row justify-content-sm-center">
    <br>
    <div class="col col-lg-3 login">

      <h1 class="text-center">INGRESAR</h1>
      <br><br>
      <form action="validar_sesion.php" method="post">
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" name="usuario" id=usuario required class="form-control">
        </div>

        <div class="form-group">

          <label for="password">Contraseña</label>
          <input type="password" name="password" id="password" required class="form-control">
        </div>
        <br>
        <input type="submit" name="submit" value="Ingresar" class="btn btn-lg btn-primary btn-expanded btn1">
      </form>
    </div>
  </div>
<?php include("parciales/footer.php") ?>
