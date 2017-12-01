$(document).ready(function(){

  // Inicializamos TinyMCE

  tinymce.init({
  selector: '.edit-textarea',
  language: 'es_MX',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
  });

  // Inicializacion para el datepicker e jquery-ui
  $('.datepicker').datepicker();

  // Agregar un servicio con AJAX
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
            <div class="card desc-tramite" id="' + data.id + '">\
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

  // Mostrar información de servicio con AJAX
  $('.service-moreinfo').click(function(event){
    event.preventDefault();
    var id = $(this).closest('.card').attr('id');

    $.ajax({
      type: 'POST',
      url: 'crud/services_read.php',
      data: {
        "id": id
      },
      success: function(data){
        $('#viewServiceModal h2').text(data.title);
        $('#viewServiceModal .description').html(data.content);
        $('#viewServiceModal .modal-footer').text("Cuota de recuperación: $" + data.cost);
      }
    });
  });

  // Editar un servicio por AJAX
  // Ya que es con modales y solo se muestra un resumen del contenido
  //   debemo sde traer el contenido completo por ajax
  $('.edit_service_button').click(function(){

    var id = $(this).closest('.card').attr('id');
    var nombre = $(this).closest('.card').find('.card-title').text();
    var costo = $(this).closest('.card').find('.card-subtitle').text();
    var contenido

    $.ajax({
      type: 'POST',
      url: 'crud/services_read.php',
      data: {
        "id": id
      },
      success: function(data){

        $('#eSeId').val(id);
        $('#eSeNombre').val(nombre);
        // $('#eSeDescripcion').val(descripcion);
        // Cambiamos el contenido en TinyMCE
        tinymce.get('eSeDescripcion').setContent(data.content);
        $('#eSeCosto').val(costo.replace('$', ''));
      }
    })
  });

  $('#update_service_button').click(function(){
    var servicio_id = $('#eSeId').val();
    var card = $('#' + servicio_id).parent();
    var nombre = $('#eSeNombre').val();
    // var descripcion = $('#eSeDescripcion').val();
    var descripcion = tinymce.get('eSeDescripcion').getContent();
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
        card.find('.card-text').text(($(descripcion).text()).substring(0, 120) + ' ...');
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

  $('.edit_user_button').click(function(){
    var item = $(this).closest('tr');
    var id = $(item).attr('id');
    var current_user = $(item).find('.username').text();
    $('#edit_usuario_id').val(id);
    $('#edit_usuarios_usuario').val(current_user);
  });

  $('#updateUserButton').click(function(){
    var id = $('#edit_usuario_id').val()
    var user = $('#edit_usuarios_usuario').val();
    var pass = $('#edit_usuarios_password').val();
    // if (!pass) {
    //   var pass = '';
    // }

    console.log(id);
    $.ajax({
      type: 'POST',
      url: '/crud/users_update.php',
      data: {
        "id": id,
        "user": user,
        "pass": pass
      },
      success: function(data){
        alert(data.message);
        if(!data.error){
          // Actualizamos con la nueva información
          $("#"+id).find('.username').text(user);
        }
      }
    });

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
        alert(data.message);
        if(!data.error){
          $(item).remove();
        }
      }
    })
  });

});
