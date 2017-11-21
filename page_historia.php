<?php include("parciales/header.php"); ?>
<br>
<section class="historias">
  <h2 class="text-center">HISTORIAS</h2>
  <br>
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

      <div class="row">

        <?php if($admin) { ?>
          <div class="col col-sm-12 text-right">
            <a href="/historias/nueva.php" class="btn btn-success"><strong>+</strong> Nueva Historia</a>
            <br><br>
          </div>
        <?php } ?>

        <div class="col-sm-4">
          <img src="images/captura2.JPG" alt="..." class="img-thumbnail">
        </div>
        <div class="col-sm-8">
          <div class="card">
            <div class="card-header">
              <strong>
                Quote
              </strong>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">
                  18 Diciembre 2017
                  <a href="#" class="float-right">Ver completo</a>
                </footer>
              </blockquote>
            </div>

            <?php if($admin){ ?>
              <div class="card-footer">
                
                <div class="btn-group float-right">
                  <a href="#" class="btn btn-warning">Editar</a>
                  <a href="#" class="btn btn-danger">Eliminar</a>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>

      <hr>

  </div>
</section>
<br>
<?php include("parciales/footer.php"); ?>
