

	{!! Form::model($model, [
		'route' => 'muestras.store',
		'method' => 'POST'
		]) !!}

		<div class="form-row">  
		   <div class="form-group col">
		      <select class="custom-select mr-sm-2 rol" name="sector" id="sector">
		        <option value="null" hidden>Seleccione el sector</option>

		        	@foreach ($sectores as $sector)
					    <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
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

	
			
