

				<div class="card border-secondary mb-3 mx-auto" style="max-width: 60rem;">
				 

				  <div class="card-body text-secondary">

					{!! Form::model($model, [
						'route' => 'users.store',
						'method' => 'POST'
						]) !!}
				

					<div class="form-row">
						<div class="form-group col-md-6">	
							{!! Form::label('name','Nombre(*)') !!}
							{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required']) !!}
						</div>

						<div class="form-group col-md-6">
							{!! Form::label('email','Correo electrónico(*)') !!}
							{!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email','required']) !!}
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">	
							{!! Form::label('direccion','Dirección') !!}
							{!! Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion',]) !!}
						</div>

						<div class="form-group col-md-6">
							{!! Form::label('localidad','Localidad') !!}
							{!! Form::text('localidad', null, ['class' => 'form-control', 'id' => 'localidad',]) !!}
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-3">
							{!! Form::label('codigopostal','Código Postal') !!}
							{!! Form::text('codigopostal', null, ['class' => 'form-control', 'id' => 'codigopostal',]) !!}
						</div>

						<div class="form-group col-md-3">	
							{!! Form::label('telefono','Teléfono') !!}
							{!! Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefono',]) !!}
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-3">
							{!! Form::label('username','Usuario(*)') !!}
							{!! Form::text('username', null, ['class' => 'form-control', 'id' => 'username','required']) !!}
						</div>

						<div class="form-group col-md-3">
							{!! Form::label('password','Contraseña(*)') !!}
							{!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required']) !!}
						</div>

						{{-- <div class="form-group col-md-3">
							{!! Form::label('type','Tipo') !!}
							{!! Form::select('type', ['' => 'Seleccione un nivel', 'Gestor de clientes' => 'Gestor de clientes' , 'Administrador de usuarios' => 'Administrador de usuarios'], null, ['class' => 'form-control']) !!}
						</div> --}}
					</div>

					{!! Form::label('obligatorios','(*) Datos obligatorios') !!}
					
					 {!! Form::close() !!}					

				  </div> 	
				</div>

		

      	

     

 