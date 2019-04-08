@extends('layouts.app')

@section('title','Listado de sectores')

@section('content')



<div class="card" style="margin-top: 30px;">
	
	<div class="card-header text-center" style="padding: 0;">

        <a href="{{ route('sectores.create') }}" class="btn btn-info btn-sm btnmodalcreatesector"  style="float: left;padding: 2px;" title="Nuevo sector">Nuevo sector</a>

		Listado de Sectores
		

	</div>

	<div class="card-body" style="padding: 5px;">

		
		
		<table id="tblsectores" class="table table-striped table-sm" style="width:100%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
    </table>

	</div>


</div>



@endsection

<div class="modal fade" id="modal-ins" tabindex="-1" role="dialog" aria-labelledby="frm_ins_sector" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="modal-header-ins">
                <h5 class="modal-title" id="modal-title-ins">Nuevo sector</h5>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="modal-header-edit">
                <h5 class="modal-title" id="modal-title-edit">Editar sector</h5>
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


$('#tblsectores').DataTable({
            scrollY: "100%",
            scrollCollapse: false,
            responsive: true,
            processing: true,
            serverSide: true,
            bPaginate: false,
            bFilter: false,
            ajax: "{{ route('get.sectores') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nombre', name: 'nombre'},
                {data: 'descripcion', name: 'descripcion'},
                {data: 'action', name: 'action'}
            ],
            language: idioma_espanol
        });



$('body').on('click', '.btnmodalcreatesector', function (event) {
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
            $('#tblsectores').DataTable().ajax.reload();

            $('body').waitMe('hide');

            swal({
                title : 'Nuevo sector',
                text : 'Se registró el sector exitosamente!',
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
            $('#tblsectores').DataTable().ajax.reload();

            $('body').waitMe('hide');

            swal({
                title : 'Modificar sector',
                text : 'El sector se actualizó exitosamente!',
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
        text: 'Está seguro de eliminar el sector?',
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

                    $('#tblsectores').DataTable().ajax.reload();
                    $('body').waitMe('hide');
                    swal({
                        icon: 'success',
                        title: 'Eliminado',
                        text: 'Se ha eliminado el sector en forma correcta.'
                    });
                },
                error: function (xhr) {
                    $('body').waitMe('hide');
                    swal({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al intentar eliminar el sector.'
                    });
                }
            });
        }
    });

});



            



</script>



@endpush