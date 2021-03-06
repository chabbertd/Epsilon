
	{!! Form::model($model, [
		'route' => 'ensayos.store',
		'method' => 'POST'
		]) !!}

		<div class="form-row">  
		   <div class="form-group col">
		   	{!! Form::label('sector','Sector(*)') !!}
		      <select class="custom-select mr-sm-2 sector" name="sector" id="sector">
		        <option value="null" hidden>Seleccione el sector</option>

		        	@foreach ($sectores as $sector)
					    <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
					@endforeach	

		      </select>
		    </div>


		</div>

		<div class="form-row">  
		   <div class="form-group col">
		   		{!! Form::label('tipomuestra','Tipo de muestra(*)') !!}
		      <select class="custom-select mr-sm-2 muestra" name="muestra" id="muestra">
		        <option value="null" hidden>Seleccione el tipo de muestra</option>

		        	{{-- @foreach ($muestras as $muestra)
					    <option value="{{ $muestra->id }}">{{ $muestra->nombre }}</option>
					@endforeach	 --}}

		      </select>
		    </div>


		</div>

	<div class="form-row">
		<div class="form-group col">	
			{!! Form::label('nombre','Nombre del ensayo(*)') !!}
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

	
			
<script type="text/javascript">
	

	$('.sector').on('change', '', function (e) {
		//alert('id sector = ' + $('.sector').val());
		var 
			idsector = e.target.value,
		 	url =  "{{ url('muestrasporsector') }}?id=" + idsector;

		 run_waitMe();

	    $.ajax({
	        url: url,
	        dataType: 'json',
	        success: function (response) {
	    
	            $('#muestra').empty();
		 	    $('#muestra').append('<option value="null" hidden>Seleccione el tipo de muestra</option>');
		 	    $.each(response, function(fetch, regenciesObj){
			    //console.log(data);
			    $('#muestra').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
				  });

	            $('body').waitMe('hide');
	        
	        },
	        error: function (xhr) {

	                $('body').waitMe('hide');

	                 swal({
	                        title: 'Error',
	                        text: 'Ocurrió un error al mostrar el formulario',
	                        icon: 'error',
	                        button: "Cerrar",
	                    });
	                }
	    }); 

		// $.get(url,function(data) {

		// 	  $('#muestra').empty();
		// 	  $('#muestra').append('<option value="0" disable="true" selected="true"></option>');

		// 	  $.each(data, function(fetch, regenciesObj){
		// 	    //console.log(data);
		// 	    $('#muestra').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
		// 	  });

		// });
	});



	

</script>