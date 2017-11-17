<?php $title = 'Tramites - Parroquia Apan' ?>
<?php include('parciales/header.php') ?>
<section class="servicios">
  <br>
  <h2 class="text-center">TRAMITES Y SERVICIOS</h2>
  <?php if($admin){ ?>
    <div class="row">
      <div class="col col-lg-12 text-center">
        <h2>Conoce los <strong>tramites y servicios</strong> que puedes realizar en tu parroquia.</h2>
        <h4> Envia tu reservación y nosotros nos pondremos en contacto contigo.</h4>
      </div>
      <div class="col-sm-12 text-center">
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addServiceModal">
          <strong>+</strong> Agregar Servicio
        </button>
      </div>
    </div>
  <?php } ?>
  <br>

  <div id="servicesContainer" class="row">

    <?php
      include('crud/services_read.php');

      foreach ($servicios as $key => $value) {
    ?>

      <div class="col col-lg-4 col-md-6 card-container">
        <div class="card" id="<?php echo $value['servicio_id']; ?>">
          <div class="card-body">
            <h4 class="card-title"><?php echo $value['nombre']; ?></h4>
            <h6 class="card-subtitle mb-2 text-muted">$<?php echo $value['costo']; ?></h6>
            <p class="card-text"><?php echo $value['descripcion']; ?></p>
            <a href="#" class="card-link">Mas información</a>
            <?php if($admin){ ?>
              <div class="btn-group float-right" role="group" aria-label="Basic example">
                <button data-toggle="modal" data-target="#editServiceModal" class="card-link btn btn-warning edit_service_button"><strong>x</strong> Editar</button>
                <button class="card-link btn btn-danger delete_service_button"><strong>x</strong> Eliminiar</button>
              </div>
            <?php } ?>
            <a href="#" class="card-link btn btn-primary float-right">Reservar</a>
          </div>
        </div>
      </div>

    <?php
      }
    ?>
  </div>
</section>

<?php include('parciales/footer.php'); ?>

<!-- Modal para agregar nuevos registros -->

<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- <form action="servicios_add.php" method="post" id="service_add"> -->
        <form id="service_add">

          <div class="form-group">
            <label for="servicio">Servicio</label>
            <input type="text" name="servicio" id=servicio required class="form-control">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea type="textarea" name="descripcion" id="descripcion" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="costo">Costo</label>
            <div class="input-group">
              <div class="input-group-addon">$</div>
              <input type="number" name="text" id="costo" class="form-control">
            </div>
          </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add_service_button">Crear</button>
        <!-- <input type="submit" name="submit" form="service_add" value="Crear" class="btn btn-primary"> -->
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA EDITAR REGISTROS -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editando Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="service_add">
            <input type="number" name="servicio_id" id="eSeId" hidden>
          <div class="form-group">
            <label for="servicio">Servicio</label>
            <input type="text" name="servicio" id="eSeNombre" required class="form-control">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea type="textarea" name="descripcion" id="eSeDescripcion" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="costo">Costo</label>
            <div class="input-group">
              <div class="input-group-addon">$</div>
              <input type="number" name="costo" id="eSeCosto" class="form-control">
            </div>
          </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update_service_button">Actualizar</button>
      </div>
    </div>
  </div>
</div>
