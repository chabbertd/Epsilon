@extends('layouts.app')

@section('title','Listado de usuarios')

@section('content')

<div class="card-header" style="margin-top: 30px;background: white;padding-right: 10px;">Registro de Log's de usuarios

</div>


<div class="card mb-3 mx-auto" style="padding: 10px;">


<table id="tbllogs" class="table table-striped table-sm" style="width:100%;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Descripción</th>
                <th>Fecha/hora</th>              
            </tr>
        </thead>
        
    </table>

 </div>



@endsection



@push('scripts')
    

<script>


$('#tbllogs').DataTable({
            scrollY: "100%",
            scrollCollapse: false,
            responsive: true,
            processing: true,
            serverSide: true,
            pageLength: 25,
            ajax: "{{ route('get.logs') }}",
            columns: [
                {data: 'id', name: 'logs.id'},
                {data: 'name', name: 'users.name'},
                {data: 'descripcion', name: 'logs.descripcion'},
                {data: 'fecha', name: 'logs.created_at'},
            ],
            language: idioma_espanol
        });




</script>

@endpush