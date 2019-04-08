@extends('layouts.app')

@section('title','Copias de resguardo')


@section('content')


 <div class="card" style="margin-top: 30px;">
    
    <div class="card-header text-center" style="padding: 0;">
        Configuración de copias de resguardo
    </div>


    <div class="card-body" style="padding-top: 10px;padding-bottom: 0;">

        {!! Form::open([
                        'route' => ['configbkp.update', $config[0]->id],
                        'method' => 'PUT',
                        'id' => 'formbackup'
                        ]) !!}

            <a href="#" class="btn btn-info btn-sm btngrabar"  title="Grabar configuración">Grabar configuración</a>

            <div class="card-deck" style="padding-top: 10px;">
                            
                    <div class="card">  
                        <div class="card-body"><h5 class="card-title">Ubicación</h5>
                          <p class="card-text"></p><p class="card-text"><small class="text-muted"></small></p>
                          <input type="text" class="form-control form-control-sm" id="ubicacion" name="ubicacion">
                        </div>

                        <div class="card-footer">
                          <small class="text-muted">Ingrese la ruta completa en la cual se guardarán los archivos.</small>
                        </div>
                    </div>               
                 
                

                    <div class="card"> 
                        <div class="card-body"><h5 class="card-title">Frecuencia</h5>
                          <p class="card-text"></p><p class="card-text"><small class="text-muted"></small></p>

                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="frecuencia" value="Ninguna" id="ninguna" 

                              @if ( ($config[0]->frecuencia) == ('Ninguna') )  checked >
                               @else > 
                              @endif

                              <label class="form-check-label" for="exampleRadios1">
                                Ninguna</label>
                          </div>

                          {{-- <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="frecuencia" value="1minuto" id="1minuto"

                              @if ( ($config[0]->frecuencia) == ('1minuto') )  checked >
                               @else > 
                              @endif

                              <label class="form-check-label" for="exampleRadios1">
                                1 Minuto</label>
                          </div> --}}

                          {{-- <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="frecuencia" value="5minutos" id="5minutos"

                              @if ( ($config[0]->frecuencia) == ('5minutos') )  checked >
                               @else > 
                              @endif

                              <label class="form-check-label" for="exampleRadios1">
                                5 Minutos</label>
                          </div> --}}

                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="frecuencia" value="Diaria" id="diaria"

                              @if ( ($config[0]->frecuencia) == ('Diaria') )  checked >
                               @else > 
                              @endif

                              <label class="form-check-label" for="exampleRadios1">
                                Diaria</label>
                          </div>

                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="frecuencia" value="Semanal" id="semanal"

                              @if ( ($config[0]->frecuencia) == ('Semanal') )  checked >
                               @else > 
                              @endif
                              
                              <label class="form-check-label" for="exampleRadios2">
                                Semanal</label>
                          </div>

                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="frecuencia" value="Quincenal" id="quincenal"

                              @if ( ($config[0]->frecuencia) == ('Quincenal') )  checked >
                               @else > 
                              @endif

                              <label class="form-check-label" for="exampleRadios3">
                                Quincenal</label>
                          </div>

                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="frecuencia" value="Mensual" id="mensual"

                              @if ( ($config[0]->frecuencia) == ('Mensual') )  checked >
                               @else > 
                              @endif

                              <label class="form-check-label" for="exampleRadios3">
                                Mensual</label>
                          </div>

                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="frecuencia" value="Anual" id="anual"

                              @if ( ($config[0]->frecuencia) == ('Anual') )  checked >
                               @else > 
                              @endif

                              <label class="form-check-label" for="exampleRadios3">
                                Anual</label>
                          </div>

                        </div>

                        <div class="card-footer">
                          <small class="text-muted">Seleccione la periodicidad para la generación de las copias de resguardo</small>
                        </div>
                    </div>

                </div>

                    <div class="card-deck" style="padding-top: 25px;">
                
                        <div class="card">  
                            <div class="card-body"><h5 class="card-title">Observaciones</h5>
                              <p class="card-text"></p><p class="card-text"><small class="text-muted"></small></p>
                              <div class="form-group">
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="2"></textarea>
                              </div>
                            </div>

                            <div class="card-footer">
                              <small class="text-muted">Ingrese algun comentario que considere necesario.</small>
                            </div>
                        </div>
                    </div>


        {!! Form::close() !!}   

    </div>

        <div class="card-header text-center" style="padding: 0; margin-bottom: 20px;">
        Listado de copias 
        </div>
        
        <table id="tblbackups" class="table table-striped table-sm" style="width:100%;padding: 15px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Ubicación</th>
                <th>Frecuencia</th>
                <th>Acciones</th>
               
            </tr>
        </thead>
        
         </table>

    </div>



@endsection

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="frm_edit_bkp" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="modal-header-edit">
                <h5 class="modal-title" id="modal-title-edit">Copia de resguardo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="modal-body-edit">


            </div>

            <div class="modal-footer" id="modal-footer-edit">
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div> 

@push('scripts')
    

<script>

$('#ubicacion').val('{{ $config[0]->ubicacion }}');
$('#observaciones').val('{{ $config[0]->observaciones }}');


$('#tblbackups').DataTable({
            scrollY: "300",
            scrollCollapse: false,
            responsive: true,
            processing: true,
            serverSide: true,
            bFilter: false,
            ajax: "{{ route('get.backups') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'created_at', name: 'created_at'},
                {data: 'ubicacion', name: 'ubicacion'},
                {data: 'frecuencia', name: 'frecuencia'},
                {data: 'action', name: 'action'}  
            ],
            language: idioma_espanol
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


$('body').on('click', '.btngrabar', function (event) {
//$('#modal-btn-insert').click(function (event) {

    event.preventDefault();

    var form = $('#formbackup'),
        url = form.attr('action'),
        method = 'PUT';

    run_waitMe();

    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success: function (response) {

            $('body').waitMe('hide');

            swal({
                title : 'Backup',
                text : 'Se registró la configuración exitosamente!',
                icon: 'success',
                button: "Cerrar",
            });
        },
        error : function (xhr) {

            $('body').waitMe('hide');

            swal({
                        title: 'Error',
                        text: 'Ocurrió un error al guardar la configuración',
                        icon: 'error',
                        button: "Cerrar",
                    });
        }
    })
});




</script>


@endpush