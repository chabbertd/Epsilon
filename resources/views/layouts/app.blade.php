<html>
    <head>
      <title>@yield('title')</title>
        
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      {{-- CSRF TOKEN --}}
     <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        
      <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome/css/all.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('plugin/DataTables/datatables.min.css')}}"/>
      <link rel="stylesheet" type="text/css" href="{{asset('plugin/JquerywaitMe/waitMe.css')}}"/>
           
    </head>

    <body>

        @include('layouts.partials.nav')


        <div class="container">

                @yield('content')

        </div>
            
    <div class="modal fade" id="modal-resetpassword" tabindex="-1" role="dialog" aria-labelledby="frm_resetpassword" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="modal-header-resetpassword">
                <h5 class="modal-title" id="modal-title-resetpassword">Cambiar contraseña de acceso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modal-body-resetpassword">

               

                    <div class="form-group col-md-12"> 
                           
                        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

                            <div class="form-row">
                                <div class="form-group col-md-12">   
                                    {!! Form::label('passwordold','Contraseña anterior(*)') !!}
                                    {!! Form::password('passwordold', ['class' => 'form-control', 'placeholder' => '********', 'required']) !!}
                                
                                    {!! Form::label('passwordnew','Contraseña nueva(*)') !!}
                                    {!! Form::password('passwordnew', ['class' => 'form-control', 'placeholder' => '********', 'required']) !!}

                                    {!! Form::label('passwordnewconfirm','Repetor contraseña nueva(*)') !!}
                                    {!! Form::password('passwordnewconfirm', ['class' => 'form-control', 'placeholder' => '********', 'required']) !!}

                                </div>
                            </div>

                            

                            
                                    

                    </div>

               

            </div>

            <div class="modal-footer" id="modal-footer-resetpassword">
                <button type="button" class="btn btn-primary" id="modal-btn-aceptar">Aceptar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
    </div> 


    <script src="{{asset('js/jquery/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugin/DataTables/datatables.min.js')}}"></script>
   
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugin/sweetalert/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugin/JquerywaitMe/waitMe.js')}}"></script>

    <script>

     var idioma_espanol = {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "No hay datos disponibles",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                                        },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                    }
                            } 

      $('.btn-cambiarpassword').click(function (event) {
            event.preventDefault();

            var form = $('#modal-resetpassword form');

            form.trigger('reset');
            $('#modal-resetpassword').modal('show');

            // var me = $(this),
            //     //url = me.attr('href');   
            //     idrol = $('.rol').val(),
            //     csrf_token = $('meta[name="csrf-token"]').attr('content'),
            //     iduser = "";
            

            // if ( $('.rol option:selected').val() == 'null' )
            //     {
            //     swal({
            //                         icon: 'warning',
            //                         title: 'Rol',
            //                         text: 'Debe seleccionar un rol a asignar.'
            //                     });
            //     }
            //   else{
            //     $.ajax({
            //                 url: "",
            //                 type: "POST",
            //                 data: {'_method': 'POST', '_token': csrf_token, 'idrol': idrol, 'iduser': iduser},
            //                 success: function (response) { 

            //                   $('#tblusuario_rol').DataTable().ajax.reload();
            //                     swal({
            //                         icon: 'success',
            //                         title: 'Permisos',
            //                         text: 'Se asignó el rol en forma correcta.'
            //                     });
            //                 },
            //                 error: function (xhr) {
            //                     swal({
            //                         icon: 'error',
            //                         title: 'Rol "' + $('.rol option:selected').text()+'"',
            //                         text: 'Ocurrió un error al intentar asignar el rol, por favor verifique que el usuario no lo tenga ya asignado.'
            //                     });
            //                 }
            //             });
            //      }  
    
      });                      


       function run_waitMe(){
        
        $('body').waitMe({
              effect : 'bounce',
              text : 'Por favor espere...',
              bg: 'rgba(216,213,213,0.7)',
              color: '#016495',
              maxSize : 50,
              waitTime : 5000,
              textPos : 'vertical',
              fontSize : '18px',
              source : 'img.svg',
              onClose : function() {}
             });
        }


    </script>

     @stack('scripts')


    </body>
</html>
