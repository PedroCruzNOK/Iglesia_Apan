<?php $path = $_SERVER['DOCUMENT_ROOT']; ?>
<?php include($path.'/parciales/header.php') ?>
<?php include('../crud/histories_read.php') ?>

<div class="container">
  <br>
  <div class="row detalle-historia">
    <div class="col-lg-12">
      <h2 class="text-center"><?php echo $historias[0]['titulo'] ?></h2>
    </div>
    <br>
    <div class="col-lg-8">
      <?php echo $historias[0]['contenido'] ?>
    </div>
    <div class="col col-lg-4 text-center ">
      <img class="imagen-historia-detalle" src="<?php echo $historias[0]['imagen_url'] ?>" style="height: auto; width:100%;">
    </div>


  </div>
</div>

<?php include($path.'/parciales/footer.php') ?>
