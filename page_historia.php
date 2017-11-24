<?php include("parciales/header.php"); ?>
<?php include("crud/histories_read.php") ?>

<br>
<section class="historias">
  <h2 class="text-center">HISTORIAS</h2>
  <br>

  <!-- Mostramos el mensaje de exito o error segun los parametros -->
  <?php if(isset($_GET['success'])){ ?>
    <div class="alert alert-success text-center" role="alert">
      <?php echo $_GET['success'] ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>
  <?php if(isset($_GET['error'])){ ?>
    <div class="alert alert-danger text-center" role="alert">
      <?php echo $_GET['error'] ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>

  <div class="container">

    <?php if($admin) { ?>
      <div class="col col-sm-12 text-right">
        <a href="/historias/nueva.php" class="btn btn-success btn1"><strong>+</strong> Nueva Historia</a>
        <br><br>
      </div>
    <?php } ?>

    <?php foreach ($historias as $key => $history) { ?>
      <div class="row">


        <div class="col-sm-4 imagen-historia">
          <img  src="<?php if(empty($history['imagen_url'])){ echo 'images/captura2.JPG'; }else{ echo $history['imagen_url']; } ?> " alt="..." class="img-thumbnail">
        </div>
        <div class="col-sm-8">
          <div class="card">
            <div class="card-header titulo-historia text-center">
              <strong>
                <?php echo $history['titulo'] ?>
              </strong>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p><?php echo substr((strip_tags($history['contenido'])), 0, 120).' ...'; ?></p>
                <footer class="blockquote-footer">
                  <?php echo $history['fecha'] ?>
                  <a href="/historias/mostrar.php?id=<?php echo $history['historia_id'] ?>" class="float-right">Ver completo</a>
                </footer>
              </blockquote>
            </div>

            <?php if($admin){ ?>
              <div class="card-footer">

                <div class="btn-group float-right">
                  <a href="/historias/editar.php?id=<?php echo $history['historia_id'] ?>"class="btn btn-warning">Editar</a>
                  <a href="/crud/histories_delete.php?id=<?php echo $history['historia_id'] ?>" class="btn btn-danger">Eliminar</a>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>

      <hr>
    <?php } ?>

  </div>
</section>
<br>
<?php include("parciales/footer.php"); ?>
