<?php include('../parciales/header.php') ?>

<div class="container">
  <br>
  <h2 class="text-center">Reservación de servicio</h2>
  <h3 class="text-center">Una vez que envies tus datos nosotros nos pondremos en contacto contigo, para confirmar la disponibilidad.</h3>
  <div class="row">
    <div class="col login">

      <form action="/crud/reservations_create.php" method="POST">
        <div class="row">

          <div class="col-lg-8 col-sm-12">
            <div class="form-group">
              <label for="r_nombre">Nombre:</label>
              <input type="text" name="r_nombre" id="r_nombre" class="form-control" required>
            </div>
          </div>

          <div class="col-lg-4 col-sm-12">
            <div class="form-group">
              <label for="r_fecha">Fecha:</label>
              <input type="text" name="r_fecha" id="r_fecha" class="form-control datepicker" required>
            </div>
          </div>

          <div class="col-lg-6 col-sm-12">
            <div class="form-group">
              <label for="r_telefono">Telefono:</label>
              <input type="text" name="r_telefono" id="r_telefono" class="form-control" required>
            </div>
          </div>

          <div class="col-lg-6 col-sm-12">
            <div class="form-group">
              <label for="r_email">Email:</label>
              <input type="text" name="r_email" id="r_email" class="form-control">
            </div>
          </div>

         <input type="text" name="r_servicio_id" hidden value="<?php echo $_GET['id'] ?>">

          <div class="col-lg-12 text-center">
            <input type="submit" name="submit" value="Enviar Petición" class="btn btn-primary btn-lg text-center btn1">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include('../parciales/footer.php') ?>
