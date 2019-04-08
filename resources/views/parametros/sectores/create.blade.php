

					{!! Form::model($model, [
						'route' => 'sectores.store',
						'method' => 'POST',
						'id' => 'formeditsector'
						]) !!}
				

					<div class="form-row">
						<div class="form-group col">	
							{!! Form::label('nombre','Nombre(*)') !!}
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

	
			



      	

     
