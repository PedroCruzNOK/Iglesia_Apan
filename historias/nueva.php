<?php $path = $_SERVER['DOCUMENT_ROOT']; ?>
<?php include($path.'/parciales/header.php') ?>
<?php include('../crud/histories_read.php') ?>

<div class="container">
  <div class="row">
    <div class="col col-12">
      <br>
      <h2 class="text-center">Nueva Historia</h2>
      <form id="newHistoryForm" action="/crud/histories_create.php" method="POST">
        <div class="row">
          <div class="col col-sm-12">
            <div class="form-group">
              <label for="history_title">Titulo</label>
              <input type="text" name="history_title" class="form-control">
            </div>

            <div class="form-group">
              <label for="history_content">Titulo</label>
              <textarea type="text" name="history_content" class="form-control edit-textarea" rows="15"></textarea>
            </div>

            <div class="form-group">
              <label for="history_image_url">Url de imagen</label>
              <input type="text" name="history_image_url" class="form-control">
            </div>

          </div>

          <div class="col-sm-12 text-right">
            <input type="submit" name="submit" value="Crear Historia" class="btn btn-primary btn-lg text-right">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<?php include($path.'/parciales/footer.php') ?>