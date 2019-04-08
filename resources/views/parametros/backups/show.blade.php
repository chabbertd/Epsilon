	{!! Form::open() !!}

					<div class="form-row">
						<div class="form-group col">	
							{!! Form::label('fecha','Fecha/hora') !!}
							{!! Form::text('fecha', $model->created_at, ['class' => 'form-control form-control-sm', 'id' => 'created_at', 'required']) !!}
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col">	
							{!! Form::label('frecuencia','Frecuencia') !!}
							{!! Form::text('frecuencia', $model->frecuencia, ['class' => 'form-control form-control-sm', 'id' => 'frecuencia', 'required']) !!}
						</div>
					</div>

					<div class="form-row">

						<div class="form-group col">	
							{!! Form::label('ubicacion','Ubicación') !!}
							{!! Form::text('descripcion', $model->ubicacion, ['class' => 'form-control form-control-sm', 'id' => 'ubicacion', 'required']) !!}
						</div>
					</div>	

					<div class="form-row">

						<div class="form-group col">	
							{!! Form::label('observaciones','Observaciones') !!}
							<textarea class="form-control" id="observaciones" name="observaciones" rows="2">{{$model->observaciones}}</textarea>
						</div>
					</div>				

	{!! Form::close() !!}					

					
				