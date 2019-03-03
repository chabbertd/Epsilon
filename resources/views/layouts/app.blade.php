<html>
    <head>
      <title>@yield('title')</title>
        
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        
      <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome/css/all.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('plugin/DataTables/datatables.min.css')}}"/>
           
    </head>

    <body>

        @include('layouts.partials.nav')


        <div class="container">

                @yield('content')

        </div>
            
    

    <script src="{{asset('js/jquery/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugin/DataTables/datatables.min.js')}}"></script>
   
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugin/sweetalert/sweetalert.min.js')}}"></script>

    <script>

     var idioma_espanol = {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
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
    </script>

     @stack('scripts')


    </body>
</html>
