<?php include("parciales/header.php") ?>
  <h1>Ingreso</h1>
  <form action="verificar.php" method="post">
    <label>Correo</label>
    <input type="text" name="correo" id=correo required>
    <label>Contraseña</label>
    <input type="password" name="password" id="correo" required> 
    <br>
    <input type="submit" name="submit" value="Ingresar"> 
  </form>
<?php include("parciales/footer.php") ?>