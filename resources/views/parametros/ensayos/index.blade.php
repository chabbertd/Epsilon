@extends('layouts.app')

@section('title','Listado de ensayos')

@section('content')




<div class="card" style="margin-top: 30px;">
	
	<div class="card-header text-center" style="padding: 0;">

        <a href="{{ route('ensayos.create') }}" class="btn btn-info btn-sm btnmodalcreateensayo"  style="float: left;padding: 2px;" title="Nuevo tipo de ensayo">Nuevo tipo de ensayo</a>

		Listado de Tipos de Ensayos
		

	</div>

	<div class="card-body" style="padding: 5px;">
				
		<table id="tblensayos" class="table table-striped table-sm" style="width:100%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ensayo</th>
                <th>Tipo de muestra</th>
                <th>Sector</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
    </table>


	</div>


</div>



@endsection

<div class="modal fade" id="modal-ins" tabindex="-1" role="dialog" aria-labelledby="frm_ins_ensayos" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="modal-header-ins">
                <h5 class="modal-title" id="modal-title-ins">Nuevo tipo de ensayo</h5>
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

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="frm_edit_ensayo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="modal-header-edit">
                <h5 class="modal-title" id="modal-title-edit">Editar tipo de ensayo</h5>
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


@push('scripts')
    

<script>


$('#tblensayos').DataTable({
            scrollY: "100%",
            scrollCollapse: false,
            responsive: true,
            processing: true,
            serverSide: true,         
            ajax: "{{ route('get.ensayos') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nombre', name: 'nombre'},
                {data: 'muestra', name: 'muestras.nombre'},
                {data: 'sector', name: 'sectors.nombre'},
                {data: 'descripcion', name: 'descripcion'},
                {data: 'action', name: 'action'}
            ],
            language: idioma_espanol
        });




$('body').on('click', '.btnmodalcreateensayo', function (event) {
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


$('body').on('click', '#modal-btn-insert', function (event) {
//$('#modal-btn-insert').click(function (event) {

    event.preventDefault();

    var form = $('#modal-body-ins form'),
        url = form.attr('action'),
        method = 'POST';

if ( $('#sector option:selected').val() == 'null' )
            {
            swal({
                                icon: 'warning',
                                title: 'Sector',
                                text: 'Debe seleccionar un sector a asignar.'
                            });
            }
    else if ( $('#muestra option:selected').val() == 'null' ){

        swal({
                                icon: 'warning',
                                title: 'Tipo de muestra',
                                text: 'Debe seleccionar un tipo de muestra a asignar.'
                            });
        }

      else{
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
                    $('#tblensayos').DataTable().ajax.reload();

                    $('body').waitMe('hide');

                    swal({
                        title : 'Nuevo tipo de ensayo',
                        text : 'Se registró el nuevo tipo exitosamente!',
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
            }
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
            $('#tblensayos').DataTable().ajax.reload();

            $('body').waitMe('hide');

            swal({
                title : 'Modificar tipo de ensayo',
                text : 'El ensayo se actualizó exitosamente!',
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

$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: 'Confirmar eliminación ',
        text: 'Está seguro de eliminar el tipo de ensayo?',
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

                    $('#tblensayos').DataTable().ajax.reload();
                    $('body').waitMe('hide');
                    swal({
                        icon: 'success',
                        title: 'Eliminado',
                        text: 'Se ha eliminado el tipo de ensayo en forma correcta.'
                    });
                },
                error: function (xhr) {
                    $('body').waitMe('hide');
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al intentar eliminar el tipo de ensayo.'
                    });
                }
            });
        }
    });

});


</script>

@endpush