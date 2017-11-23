<?php $path = $_SERVER['DOCUMENT_ROOT']; ?>
<?php include($path.'/parciales/header.php') ?>
<?php include('../crud/histories_read.php') ?>

<div class="container">
  <br>
  <div class="row">
    <div class="col col-lg-12 text-center">
      <img src="<?php echo $historias[0]['imagen_url'] ?>" style="height: 320px; width: auto;"> 
    </div>
    <div class="col-lg-12">
      <h2 class="text-center"><?php echo $historias[0]['titulo'] ?></h2>
    </div>
    <div class="col-lg-12">
      <?php echo $historias[0]['contenido'] ?>
    </div>
  </div>
</div>

<?php include($path.'/parciales/footer.php') ?>