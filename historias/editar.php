<?php include('../parciales/header.php') ?>
<?php include('../crud/histories_read.php') ?>
  <div class="container">
  <div class="row">
    <div class="col col-12">
      <br>
      <h2 class="text-center">Editando Historia</h2>

      <form id="editHistoryForm" action="/crud/histories_update.php" method="POST">
        <div class="row">
          <div class="col col-sm-12">
            <input type="text-center" name="history_id" value="<?php echo $historias[0]['historia_id'] ?>" hidden>
            <div class="form-group">
              <label for="history_title">Titulo</label>
              <input type="text" name="history_title" class="form-control" value="<?php echo $historias[0]['titulo'] ?>">
            </div>

            <div class="form-group">
              <label for="history_content">Titulo</label>
              <textarea type="text" name="history_content" class="form-control edit-textarea">
                <?php echo $historias[0]['contenido'] ?>
              </textarea>
            </div>

            <div class="form-group">
              <label for="history_image_url">Url de imagen</label>
              <input type="text" name="history_image_url" class="form-control" value="<?php echo $historias[0]['imagen_url'] ?>">
            </div>

          </div>

          <div class="col-sm-12 text-right">
            <input type="submit" name="submit" value="Actualizar Historia" class="btn btn-primary btn-lg text-right">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include('../parciales/footer.php') ?>