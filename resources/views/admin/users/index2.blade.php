@extends('layouts.app')

@section('title','Listado de usuarios')

@section('content')


<div class="card border-secondary mb-3 mx-auto" style="margin-top: 30px;">

  <div class="card-header">Listado de usuarios
	<a href="{{ route('users.create') }}" class="btn btn-info btn-sm" style="float: right;">Registrar nuevo usuario</a>
  </div>

  <div class="card-body text-secondary" style="padding: 0;">
  	

  	@if (session('status'))
		<div class="alert alert-success alert-dismissible fade show" role="alert"" style="margin:0;">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  			</button>
			{{ session('status') }}
		</div>
	@endif

	<table class="table table-striped">
		<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Usuario</th>
				<th>Permisos</th>
				<th>Acciones</th>
		</thead>
		<tbody>
				@foreach($users as $user)

					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->username }}</td>
						<td>
							@foreach($user->roles as $rol)
							{{ $rol->nombre}} <br>
							@endforeach
							</td>	

						<td>
													
							<a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-sm" data-id="{{ $user->id }}" data-toggle="modal" data-target="#EditarUsrModal" title="Editar usuario">
								<i class="fas fa-pencil-alt btn-abm"></i></a>
							
							<a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cogs btn-abm"></i></a>

							<a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-unlock-alt btn-abm"></i></a>

							<a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-ban btn-abm"></i></a>

							<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash-alt btn-abm"></i></a>

						</td>
					</tr>
				

				@endforeach

		</tbody>
	</table>
	

</div>
<div class="mx-auto">{{ $users->links() }}</div>
</div>


<div class="modal fade" id="EditarUsrModal" tabindex="-1" role="dialog" aria-labelledby="EditarUsrModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <div class="modal-body">
        {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

	<div class="form-row">
		<div class="form-group col-md-6">	
			{!! Form::label('name','Nombre(*)') !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
		</div>

		<div class="form-group col-md-6">
			{!! Form::label('email','Correo electrónico(*)') !!}
			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@mail.com', 'required']) !!}
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">	
			{!! Form::label('direccion','Dirección') !!}
			{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
		</div>

		<div class="form-group col-md-6">
			{!! Form::label('localidad','Localidad') !!}
			{!! Form::text('localidad', null, ['class' => 'form-control', 'placeholder' => 'Localidad']) !!}
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-3">
			{!! Form::label('codigopostal','Código Postal') !!}
			{!! Form::text('codigopostal', null, ['class' => 'form-control', 'placeholder' => 'Código Postal']) !!}
		</div>

		<div class="form-group col-md-3">	
			{!! Form::label('telefono','Teléfono') !!}
			{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-3">
			{!! Form::label('username','Usuario(*)') !!}
			{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Usuario','required']) !!}
		</div>
	
	</div>

	{!! Form::label('obligatorios','(*) Datos obligatorios') !!}


	<div class="modal-footer">
		
		{!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

    </div>

	{!! Form::close() !!}

    </div>

    



    </div>
  </div>
</div>



@endsection

@section('script')



@endsection
