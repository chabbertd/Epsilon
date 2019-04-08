<style type="text/css">
	
input[type=text]{
	border-radius: 14px;
}

</style>

{!! Form::model($model, [
						'route' => ['parametros.update', $model->id],
						'method' => 'PUT',
						]) !!}
				

					<div class="form-row">
						<div class="form-group col">	
							{!! Form::label('nombre','Nombre(*)') !!}
							{!! Form::text('nombre', null, ['class' => 'form-control form-control-sm border-bottom', 'id' => 'nombre', 'required']) !!}
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