<?php $title = 'Usuarios - Parroquia Apan' ?>
<?php include('../parciales/header.php') ?>
<?php
if(!$admin){
// Redireccion a los visitantes
  header("Location: /");
  die();
} else {
?>

<div class="container">
  <div class="row justify-content-lg-center">
    <div class="col-lg-6">
      <br>
      <h2>Usuarios del Sistema</h2>
      <br>
      <table class="table table-striped ">
        <thead class="thead-dark">
          <th>Usuario</th>
          <th class="text-center">Acciones</th>
        </thead>
        <tbody>
          <?php include('../crud/users_read.php'); ?>
          <?php foreach ($usuarios as $key => $usuario) { ?>
            <tr id="<?php echo $usuario['usuario_id'] ?>">
              <td><?php echo $usuario['usuario'] ?></td>
              <td class="text-right">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-sm btn-secondary">Editar</button>
                  <button type="button" class="btn btn-sm btn-danger delete_user_button">Eliminar</button>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <br>

    </div>
    <div class="col col-lg-12 text-center">
      <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addUserModal" id="addUserButton">
        Nuevo Usuario
      </button>
    </div>
  </div>
</div>
<?php include('../parciales/footer.php') ?>

<!-- Modales para editar y crear usuarios -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="user_add">
          <div class="form-group">
            <label for="usuario_usuario">Usuario</label>
            <input type="text" name="servicio" id="usuarios_usuario" required class="form-control">
          </div>
          <div class="form-group">
            <label for="usuarios_password">Contraseña</label>
            <input type="password" name="usuarios_password" id="usuarios_password" required class="form-control"></input>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="createUserButton">Crear Usuario</button>
      </div>
    </div>
  </div>
</div>
<?php  
}
?>