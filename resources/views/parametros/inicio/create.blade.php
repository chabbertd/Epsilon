{!! Form::model($model, [
						'route' => 'parametros.store',
						'method' => 'POST',
						]) !!}
				

					<div class="form-row">
						<div class="form-group col">	
							{!! Form::label('nombre','Nombre(*)') !!}
							{!! Form::text('nombre', null, ['class' => 'form-control form-control-sm', 'id' => 'nombre', 'required']) !!}
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col">	
							{!! Form::label('valor','Valor(*)') !!}
							{!! Form::text('valor', null, ['class' => 'form-control form-control-sm', 'id' => 'valor', 'required']) !!}
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col">	
							{!! Form::label('prefijo','Prefijo') !!}
							{!! Form::text('prefijo', null, ['class' => 'form-control form-control-sm', 'id' => 'prefijo']) !!}
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col">	
							{!! Form::label('sufijo','Sufijo') !!}
							{!! Form::text('sufijo', null, ['class' => 'form-control form-control-sm', 'id' => 'sufijo']) !!}
						</div>
					</div>

					<div class="form-row">

						<div class="form-group col">	
							{!! Form::label('descripcion','Descripción(*)') !!}
							{!! Form::text('descripcion', null, ['class' => 'form-control form-control-sm', 'id' => 'descripcion', 'required']) !!}
						</div>
					</div>					

					
					
					 {!! Form::close() !!}		