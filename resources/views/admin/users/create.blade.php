@extends('layouts.app')

@section('title','Creación de usuarios.')


@section('content')



<div class="card border-secondary mb-3 mx-auto" style="max-width: 60rem;margin-top: 30px;">
  <div class="card-header">Creación de usuarios</div>

  <div class="card-body text-secondary">
    
	@if ($errors->any())
		<div class="alert alert-danger alert-dismissible fade show" role="alert"">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  			</button>	
			<ul>

				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach	
			</ul>
		</div>
	@endif

	{!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

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

		<div class="form-group col-md-3">
			{!! Form::label('password','Contraseña(*)') !!}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '************', 'required']) !!}
		</div>

		{{-- <div class="form-group col-md-3">
			{!! Form::label('type','Tipo') !!}
			{!! Form::select('type', ['' => 'Seleccione un nivel', 'Gestor de clientes' => 'Gestor de clientes' , 'Administrador de usuarios' => 'Administrador de usuarios'], null, ['class' => 'form-control']) !!}
		</div> --}}
	</div>

	{!! Form::label('obligatorios','(*) Datos obligatorios') !!}
	
	<div class="form-group">
			{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}



	</div>


	{!! Form::close() !!}


  </div> 	
</div>


@endsection
