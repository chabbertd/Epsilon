@extends('layouts.app')

@section('title','Listado de usuarios')

@section('content')


 <div class="card" style="margin-top: 30px;">
    
    <div class="card-header text-center" style="padding: 5px;">

        Listado de usuarios
        

    </div>

    <div class="card-body" style="padding: 5px;">
        <a href="{{ route('users.create') }}" class="btn btn-info btn-sm btnmodalcreateusr"  style="float: left;" title="Nuevo usuario">Nuevo usuario</a>
        
        
    <table id="tblusuarios" class="table table-striped table-sm" style="width:100%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
    </table>

    </div>


</div>


@endsection


<div class="modal fade" id="modal-ins" tabindex="-1" role="dialog" aria-labelledby="frm_ins_usuario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" id="modal-header-ins">
                <h5 class="modal-title" id="modal-title-ins">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modal-body-ins">


            </div>

            <div class="modal-footer" id="modal-footer-ins">
                <button type="button" class="btn btn-primary" id="modal-btn-insert">Registrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>        

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="frm_edit_usuario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" id="modal-header-edit">
                <h5 class="modal-title" id="modal-title-edit">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modal-body-edit">


            </div>

            <div class="modal-footer" id="modal-footer-edit">
                <button type="button" class="btn btn-primary" id="modal-btn-edit">Actualizar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>   	

<div class="modal fade" id="modal-roles" tabindex="-1" role="dialog" aria-labelledby="frm_roles_usuario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" id="modal-header-roles">
                <h5 class="modal-title" id="modal-title-roles">Configurar permisos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modal-body-roles">

                <div class="form-row">

                    <div class="form-group col-md-12"> 

                            <table id="tblusuario_rol" class="table table-striped table-sm" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Rol asignado</th>                               
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                
                            </table>

                                    

                    </div>

                </div>  

            </div>

            <div class="modal-footer" id="modal-footer-roles">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div> 

@push('scripts')
    

<script>


$('#tblusuarios').DataTable({
            scrollY: "100%",
            scrollCollapse: false,
            responsive: true,
            processing: true,
            serverSide: true,
            pageLength: 25,
            ajax: "{{ route('get.users') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'suspendido', name: 'suspendido',
                    render: function (data, type, row) {
                          return (data == true) ? 'Inactivo' : 'Activo';}
                    },
                {data: 'action', name: 'action'}
            ],
            language: idioma_espanol
        });



$('body').on('click', '.btnmodalcreateusr', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href');

  
    run_waitMe();

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
          
            $('#modal-body-ins').html(response);
            $('#modal-ins').modal('show');

            $('body').waitMe('hide');
        
        },
        error: function (xhr) {

                $('body').waitMe('hide');

                 swal({
                        title: 'Error',
                        text: 'Ocurrió un error al mostrar el formulario',
                        icon: 'error',
                        button: "Cerrar",
                    });
                }
    });  
    
});


$('body').on('click', '.edit', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href');

    run_waitMe();

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
          
            $('#modal-body-edit').html(response);
            $('#modal-edit').modal('show');

            $('body').waitMe('hide');
        
        },
        error: function (xhr) {
                 $('body').waitMe('hide');

                 swal({
                        title: 'Error',
                        text: 'Ocurrió un error al mostrar el formulario',
                        icon: 'error',
                        button: "Cerrar",
                    });
                }
    });  
    
});

$('body').on('click', '.btn-permisos', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href');   

    run_waitMe();

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
          
            $('#modal-body-roles').html(response);
            $('#modal-roles').modal('show');  

            $('body').waitMe('hide');

        },
        error: function (xhr) {
                $('body').waitMe('hide');

                 swal({
                        title: 'Error',
                        text: 'Ocurrió un error al mostrar el formulario',
                        icon: 'error',
                        button: "Cerrar",
                    });
                },
       
    });  
    
    
});



$('#modal-btn-insert').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body-ins form'),
        url = form.attr('action'),
        method = 'POST';

    run_waitMe();

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success: function (response) {
            form.trigger('reset');
            $('#modal-ins').modal('hide');
            $('#tblusuarios').DataTable().ajax.reload();

            $('body').waitMe('hide');

            swal({
                title : 'Nuevo usuario',
                text : 'El usuario ' + response.name + ' se registró exitosamente!',
                icon: 'success',
                button: "Cerrar",
            });
        },
        error : function (xhr) {
            var res = xhr.responseJSON;

            $('body').waitMe('hide');

            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block" style="font-size:12px;color:red;">' + value + '</span>');
                });
            }
        }
    })
});

$('#modal-btn-edit').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body-edit form'),
        url = form.attr('action'),
        method = 'PUT';

    run_waitMe();

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success: function (response) {

            form.trigger('reset');
            $('#modal-edit').modal('hide');
            $('#tblusuarios').DataTable().ajax.reload();

            $('body').waitMe('hide');

            swal({
                title : 'Modificar usuario',
                text : 'El usuario ' + response.name + ' se actualizó exitosamente!',
                icon: 'success',
                button: "Cerrar",
            });
        },
        error : function (xhr) {

            var res = xhr.responseJSON;
              // console.log(res);
            $('body').waitMe('hide');

            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block" style="font-size:12px;color:red;">' + value + '</span>');
                });
            }
        }
    })
});


$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: 'Confirmar eliminación ',
        text: 'Está seguro de eliminar a ' + title.slice(9) + ' ?',
        icon: "warning",
        buttons: {
            cancel: "Cancelar",
            aceptar: true,
        },
       
    }).then((result) => {

        if (result) {
            run_waitMe();

            $.ajax({
                url: url,
                type: "POST",
                data: {'_method': 'DELETE', '_token': csrf_token},
                success: function (response) {  

                    $('#tblusuarios').DataTable().ajax.reload();
                    $('body').waitMe('hide');
                    swal({
                        icon: 'success',
                        title: 'Eliminado',
                        text: 'Se ha eliminado el usuario en forma correcta.'
                    });
                },
                error: function (xhr) {
                    $('body').waitMe('hide');
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al intentar eliminar el usuario.'
                    });
                }
            });
        }
    });

});

$('body').on('click', '.btn-suspender', function (event) {
    event.preventDefault();

    var me = $(this),
      //  url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');
        id = me.attr('data-id');
        tipo = '';
        accion = '';

    swal({
        title: 'Suspensión/Habilitación de usuario',
        text: 'Habilite o suspenda a ' + title.slice(22) + ' segun corresponda',
        icon: "info",
        buttons: {
            cancel: "Cancelar",
            Habilitar: true,
            Suspender: true,
        },

       
    }).then((result) => {

        if (result) {
            if (result == 'Suspender'){tipo='Suspensión';accion='suspendido';}
                else{tipo='Habilitación';accion='habilitado';}

            run_waitMe();

            $.ajax({
                url: "{{ route('suspend.user') }}",
                type: "POST",
                data: {'_method': 'POST', '_token': csrf_token, 'tipo': tipo, 'id': id},
                success: function (response) { 

                    $('#tblusuarios').DataTable().ajax.reload();
                    $('body').waitMe('hide');
                    swal({
                        icon: 'success',
                        title: tipo,
                        text: 'Se ha '+accion+' al usuario en forma correcta.'
                    });
                },
                error: function (xhr) {
                    $('body').waitMe('hide');
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al intentar habilitar o suspender al usuario.'
                    });
                }
            });
        }
    });

});

$('body').on('click', '.btn-reset', function (event) {
    event.preventDefault();

    var me = $(this),
      //  url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content'),
        id = me.attr('data-id');

    swal({
        title: 'Blanqueo de contraseña',
        text: 'Se reiniciará la contraseña de ' + title.slice(22) + ' a 123456. \nEl usuario deberá cambiarla en el próximo ingreso.',
        icon: "info",
        buttons: {
            cancel: "Cancelar",
            Blanquear: true,
        },

       
    }).then((result) => {

        if (result) {
            run_waitMe();

            $.ajax({
                url: "{{ route('reset.user') }}",
                type: "POST",
                data: {'_method': 'POST', '_token': csrf_token, 'id': id},
                success: function (response) { 
                    $('body').waitMe('hide');
                    swal({
                        icon: 'success',
                        title: 'Blanqueo de contraseña',
                        text: 'Se ha reiniciado la contraseña de acceso en forma correcta.'
                    });
                },
                error: function (xhr) {
                    $('body').waitMe('hide');
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al intentar reiniciar la contraseña.'
                    });
                }
            });
        }
    });

});





</script>

@endpush

