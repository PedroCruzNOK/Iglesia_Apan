<?php include('parciales/header.php') ?>
<?php if(!$admin){
  Header("Location: /index.php");
} ?>
<?php include('crud/reservations_read.php') ?>

<br><br>
<h2 class="text-center">Reservacion de servicios</h2>
<div class="container login">
  <div class="row">
    <div class="col-lg-12 ">

      <table class="table table-striped table-hover" style="background-color: rgba(255,255,255, 0.65); border-radius: .2em;">
        <thead>
          <tr>
            <th>Servicio Reservado</th>
            <th>Contacto</th>
            <th>Dia/Hora</th>
            <th class="text-right" width="150">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($reservaciones as $key => $reservacion) { ?>
            <tr class="<?php if($reservacion['atendida'] == true ){ echo 'table-success'; } ?>">
              <td><?php echo $reservacion['s_nombre'] ?>
                <br>
                <?php if($reservacion['atendida'] == true){
                  echo '<span class="badge badge-success">Atendida</span>';
                }else{
                  echo '<span class="badge badge-secondary">Sin atender</span>';
                } ?>
              </td>
              <td>
                <?php echo $reservacion['nombre'].'<br>' ?>
                <?php echo $reservacion['telefono'].'<br>' ?>
                <?php echo $reservacion['email'] ?>
              </td>
              <td>
                <?php echo $reservacion['fecha'] ?><br>
                <?php echo $reservacion['hora'] ?><br>
              </td>
              <td class="text-right">
                <div class="btn-group">
                  <?php if(!$reservacion['atendida']) { ?>
                    <a href="crud/reservations_update.php?action=atendida&id=<?php echo $reservacion['reservacion_id'] ?>" class="btn btn-success btn-sm" style="color: white;">Atendida</a>
                  <?php } ?>
                  <a href="crud/reservations_delete.php?id=<?php echo $reservacion['reservacion_id'] ?>" class="btn btn-danger btn-sm" style="color: white;">Eliminar</a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?php include('parciales/footer.php') ?>
