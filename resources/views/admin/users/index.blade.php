@extends('layouts.app')

@section('title','Listado de usuarios')

@section('content')

<div class="card-header" style="margin-top: 30px;background: white;padding-right: 10px;">Listado de usuarios

  
    <a href="{{ route('users.create') }}" class="btn btn-info btn-sm btnmodalcreateusr"  style="float: right;" title="Create User">Registrar nuevo usuario</a>
    
  </div>


<div class="card mb-3 mx-auto" style="padding: 10px;">


<table id="tblusuarios" class="table table-striped table-sm" style="width:100%;">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
    </table>

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

   

	


@push('scripts')
    

<script>


$('#tblusuarios').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('get.users') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action'}
            ],
            language: idioma_espanol
        });


$('body').on('click', '.btnmodalcreateusr', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title-ins').text(title);
    $('#modal-btn-save').text('Registrar');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
          
            $('#modal-body-ins').html(response);
            $('#modal-ins').modal('show');
        
        },
        error: function (xhr) {
                 swal({
                        title: 'Error',
                        text: 'Ocurrió un error al mostrar el formulario',
                        icon: 'error',
                        button: "Cerrar",
                    });
                }
    });  
    
});


$('#modal-btn-insert').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body-ins form'),
        url = form.attr('action'),
        //method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';
        method = 'POST';

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

            swal({
                title : 'Nuevo usuario',
                text : 'El usuario ' + response.name + ' se registró exitosamente!',
                icon: 'success',
                button: "Cerrar",
            });
        },
        error : function (xhr) {
            var res = xhr.responseJSON;
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




// $(function() {
//      var table = $('#example').DataTable({
//                             processing: true,
//                             serverSide: true,
//                             ajax: '{{ route('get.users') }}',
//                             columns: [
//                                 { data: 'id', name: 'id' },
//                                 { data: 'name', name: 'name' },
//                                 { data: 'email', name: 'email' },
//                                 { data: 'username', name: 'username' },
//                                 { defaultContent: '<button type="button" class="editar btn btn-info btn-sm" data-toggle="modal" data-target="#EditarUsrModal"><i class="fas fa-pencil-alt btn-abm"></i></button> <button type="button" class="eliminar btn-danger btn-sm" data-toggle="modal" data-target="#EliminarUsrModal"><i class="fas fa-trash-alt btn-abm"></i></button>' }
//                             ],
//                             language: idioma_espanol
//                         });

//             obtener_data_editar('#example tbody',table);
//             obtener_data_eliminar('#example tbody',table);

//         });


//     var obtener_data_editar = function(tbody, table){

//         $(tbody).on('click', 'button.editar', function(){

//             var data = table.row( $(this).parents('tr') ).data();
//             console.log(data);

//             $('#name').val(data.name);
//         });
//     }

//     var obtener_data_eliminar = function(tbody, table){

//         $(tbody).on('click', 'button.eliminar', function(){


            
//         });
//     }




        



</script>

@endpush

