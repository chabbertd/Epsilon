

				<div class="card border-secondary mb-3 mx-auto" style="max-width: 60rem;">
				 

				  <div class="card-body text-secondary">

					{!! Form::model($model, [
						'route' => 'users.store',
						'method' => 'POST'
						]) !!}
				

					<div class="form-row">
						<div class="form-group col-md-6">	
							{!! Form::label('name','Nombre(*)') !!}
							{!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'id' => 'name', 'required']) !!}
						</div>

						<div class="form-group col-md-6">
							{!! Form::label('email','Correo electrónico(*)') !!}
							{!! Form::text('email', null, ['class' => 'form-control form-control-sm', 'id' => 'email','required']) !!}
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">	
							{!! Form::label('direccion','Dirección') !!}
							{!! Form::text('direccion', null, ['class' => 'form-control form-control-sm', 'id' => 'direccion',]) !!}
						</div>

						<div class="form-group col-md-6">
							{!! Form::label('localidad','Localidad') !!}
							{!! Form::text('localidad', null, ['class' => 'form-control form-control-sm', 'id' => 'localidad',]) !!}
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-3">
							{!! Form::label('codigopostal','Código Postal') !!}
							{!! Form::text('codigopostal', null, ['class' => 'form-control form-control-sm', 'id' => 'codigopostal',]) !!}
						</div>

						<div class="form-group col-md-3">	
							{!! Form::label('telefono','Teléfono') !!}
							{!! Form::text('telefono', null, ['class' => 'form-control form-control-sm', 'id' => 'telefono',]) !!}
						</div>


					</div>

					<div class="form-row">
						<div class="form-group col-md-3">
							{!! Form::label('username','Usuario(*)') !!}
							{!! Form::text('username', null, ['class' => 'form-control form-control-sm', 'id' => 'username','required']) !!}
						</div>

						<div class="form-group col-md-3"></div>

						<div class="form-group col-md-3">
							<br>
							{!! Form::label('obligatorios','(*) Datos obligatorios') !!}

						</div>

					</div>

				

						

						{!! Form::label('contraseña','La contraseña inicial será 123456 y podrá modificarla el usuario al acceder al sistema.') !!}
					
					


						{{-- <div class="form-group col-md-3">
							{!! Form::label('type','Tipo') !!}
							{!! Form::select('type', ['' => 'Seleccione un nivel', 'Gestor de clientes' => 'Gestor de clientes' , 'Administrador de usuarios' => 'Administrador de usuarios'], null, ['class' => 'form-control']) !!}
						</div> --}}
					

					
					
					 {!! Form::close() !!}					

				  </div> 	
				</div>

		

      	

     

 