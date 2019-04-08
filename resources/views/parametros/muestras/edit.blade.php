



					{!! Form::model($model, [
						'route' => ['muestras.update', $model->id],
						'method' => 'PUT'
						]) !!}
					
					<div class="form-row">  
					   <div class="form-group col">
					   	  {!! Form::label('sector','Sector(*)') !!}
					      <select class="custom-select mr-sm-2 sector" name="sector" id="sector">
					        
					        @foreach ($sectores as $sector)
					          	@if ( ($sector->id) == ($model->sector_id) )							
								   <option value="{{ $sector->id }}" selected>{{ $sector->nombre }}</option>
								 @else
								    <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
								 @endif
								    								 								  
							@endforeach	

					      </select>

					    </div>


					</div>

					<div class="form-row">
						<div class="form-group col">	
							{!! Form::label('nombre','Nombre de la muestra(*)') !!}
							{!! Form::text('nombre', null, ['class' => 'form-control form-control-sm', 'id' => 'nombre', 'required']) !!}
						</div>
					</div>

					<div class="form-row">

						<div class="form-group col">	
							{!! Form::label('descripcion','Descripción(*)') !!}
							{!! Form::text('descripcion', null, ['class' => 'form-control form-control-sm', 'id' => 'descripcion', 'required']) !!}
						</div>
					</div>						

					
					
					 {!! Form::close() !!}		

