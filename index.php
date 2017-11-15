<?php
  session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  ?>
    <p>
      Eres <strong><?php echo $_SESSION['username'] ?></strong> - 
      <a href="logout.php">salir</a>
    </p>
  <?php
  } 
?>

<?php 
  $title = "Iglesia Apan";
  include("parciales/header.php");
?>
  <header>
    <a href="login.php">Administrar</a>
    <h1>Titulo principal de esta página</h1>
    <nav>
      <ul>  
        <li>Início</li>
        <li>Historias</li>
        <li>Tramites</li>
        <li>Información</li>
        <li>Quienes somos</li>
        <li>Acerca de</li>
      </ul>
    </nav>
  </header>
  <section>
    Sección del Slider
  </section>
  <section>
    Sección del Mapa
  </section>
<?php include('parciales/footer.php') ?>