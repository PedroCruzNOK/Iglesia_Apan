$(document).ready(function(){
  $('#add_service_button').click(function(){

    var servicio = $('#servicio').val();
    var descripcion = $('#descripcion').val();
    var costo = $('#costo').val();

    $ .ajax({
      type: 'POST',
      url: 'crud/services_create.php',
      data: {
        "servicio": servicio,
        "descripcion": descripcion,
        "costo": costo
      },
      success: function(data){
        if(!data.error){
          alert(data.message);
        }

        // Limpiamos el formulario y cerramos el modal
        $('#addServiceModal .form-control').val('');

        // Agregamos el nuevo elemento a la vista para simular real-time
        card_structure = '\
          <div class="col col-lg-4 col-md-6 card-container">\
            <div class="card" id="' + data.id + '">\
              <div class="card-body">\
                <h4 class="card-title">' + data.name + '</h4>\
                <h6 class="card-subtitle mb-2 text-muted">$' + data.cost + '</h6>\
                <p class="card-text">' + data.description + '</p>\
                <a href="#" class="card-link">Mas información</a>\
                  <div class="btn-group float-right" role="group" aria-label="Basic example">\
                    <button data-toggle="modal" data-target="#editServiceModal" class="card-link btn btn-warning edit_service_button"><strong>x</strong> Editar</button>\
                    <button class="card-link btn btn-danger delete_service_button"><strong>x</strong> Eliminiar</button>\
                  </div>\
                <a href="#" class="card-link btn btn-primary float-right">Reservar</a>\
              </div>\
            </div>\
          </div>\
        ';

        $('#servicesContainer').append(card_structure);
      }
    });
  });

  $('.edit_service_button').click(function(){
    var id = $(this).closest('.card').attr('id');
    var nombre = $(this).closest('.card').find('.card-title').text();
    var costo = $(this).closest('.card').find('.card-subtitle').text();
    var descripcion = $(this).closest('.card').find('.card-text').text();

    console.log(costo.replace('$', ''));

    $('#eSeId').val(id);
    $('#eSeNombre').val(nombre);
    $('#eSeDescripcion').val(descripcion);
    $('#eSeCosto').val(costo.replace('$', ''));
  });

  $('#update_service_button').click(function(){
    var servicio_id = $('#eSeId').val();
    var card = $('#' + servicio_id).parent();
    var nombre = $('#eSeNombre').val();
    var descripcion = $('#eSeDescripcion').val();
    var costo = $('#eSeCosto').val();

    $.ajax({
      type: 'POST',
      url: 'crud/services_update.php',
      data: {
        "id":     servicio_id,
        "nombre": nombre,
        "descripcion": descripcion,
        "costo": costo 
      },
      success: function(data){
        if(!data.error){
          alert(data.message);
        }

        // Actualizamos los datos para simular real-time
        console.log($(card))
        card.find('.card-title').text(nombre);
        card.find('.card-subtitle').text("$" + costo);
        card.find('.card-text').text(descripcion);
      }
    });
  });

  $('.delete_service_button').click(function(){
    var card = $(this).closest('.card-container');
    var id = $(this).closest('.card').attr('id');

    // Confirmamos antes de eliminar
    if (confirm("¿Realmente desea eliminar este servicio?")){
      $.ajax({
        type: 'POST',
        url: 'crud/services_delete.php',
        data: {
          "id": id
        },
        success: function(data){
          if(!data.error){
            alert(data.message);
          }

          // Eliminar el elemento de la pagina actual
          $(card).remove();
        }
      });
    }
  });

  // Usuarios - Crear
  $('#createUserButton').click(function(){
    var user = $('#usuarios_usuario').val();
    var pass = $('#usuarios_password').val();

    console.log(user);
    console.log(pass);

    $.ajax({
      type: 'POST',
      url: '/crud/users_create.php',
      data: {
        "user": user,
        "pass": pass
      },
      success: function(data){
        if(!data.error){
          alert(data.message)
        }

        $('table tbody').append('\
          <tr>\
              <td>' + user + '</td>\
              <td class="text-right">\
                <div class="btn-group" role="group" aria-label="Basic example">\
                  <button type="button" class="btn btn-sm btn-secondary">Editar</button>\
                  <button type="button" class="btn btn-sm btn-danger">Eliminar</button>\
                </div>\
              </td>\
            </tr>\
          ');
        $('#addUserModal input').val('');
      }
    })
  });

  $('.delete_user_button').click(function(){
    var item = $(this).closest('tr');
    var id = $(this).closest('tr').attr('id');

    $.ajax({
      type: 'POST',
      url: '/crud/users_delete.php',
      data: {
        "id": id
      },
      success: function(data){
        if(!data.error){
          alert(data.message);
        }
        $(item).remove();
      }
    })
  });

});