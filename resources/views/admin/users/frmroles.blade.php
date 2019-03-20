			
<form>

<div class="form-row">  
   <div class="col"> 
      <select class="custom-select mr-sm-2 rol">
        <option value="null" hidden>Seleccione el rol</option>

        	@foreach ($roles as $rol)
			    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
			@endforeach	

      </select>
    </div>

    <div class="col"> 
    	<button class="btn btn-info btn-asignarrol">Asignar rol</button>
    </div>


</div>



</form>

<div class="card text-center">

<div class="card-header">Listado de roles asignados a {{ $user->name }} </div>	

</div>

<div class="form-row">

	<div class="form-group col-md-12"> 

			<table id="tblusuario_rol" class="table table-striped table-sm" style="width:100%;">
		        <thead>
		            <tr>
		                <th>Id</th>
		                <th>Rol</th>			                	              
		                <th>Acciones</th>
		            </tr>
		        </thead>
		        
		        
		    </table>

				 	

	</div>

</div>
			

		
<script>

$('#tblusuario_rol').DataTable({
        scrollY: "150",
        scrollCollapse: false,
        searching: false,
        paging: false,
        info: false,
        responsive: true,
        processing: true,
        serverSide: true,         
        ajax: "{{ route('get.roles') }}?id={{ $user->id }}",   
        columns: [
      		{data: "role_id", name: "role_user.user_id"},
            {data: "nombre", name: "roles.nombre"},            
            {data: "action", name: "action"},
        ],
        language: idioma_espanol
    });


$('.btn-asignarrol').click(function (event) {
    event.preventDefault();

    var me = $(this),
        //url = me.attr('href');   
        idrol = $('.rol').val(),
        csrf_token = $('meta[name="csrf-token"]').attr('content'),
        iduser = "{{ $user->id }}";
    

    if ( $('.rol option:selected').val() == 'null' )
    		{
    		swal({
		                        icon: 'warning',
		                        title: 'Rol',
		                        text: 'Debe seleccionar un rol a asignar.'
		                    });
    		}
    	else{
    		run_waitMe();
		    $.ajax({
		                url: "{{ route('insert.rol') }}",
		                type: "POST",
		                data: {'_method': 'POST', '_token': csrf_token, 'idrol': idrol, 'iduser': iduser},
		                success: function (response) { 

		                	$('#tblusuario_rol').DataTable().ajax.reload();
		                	$('body').waitMe('hide');
		                    swal({
		                        icon: 'success',
		                        title: 'Permisos',
		                        text: 'Se asignó el rol en forma correcta.'
		                    });
		                },
		                error: function (xhr) {
		                	$('body').waitMe('hide');
		                    swal({
		                        icon: 'error',
		                        title: 'Rol "' + $('.rol option:selected').text()+'"',
		                        text: 'Ocurrió un error al intentar asignar el rol, por favor verifique que el usuario no lo tenga ya asignado.'
		                    });
		                }
		            });
		     }  
    
});

$('body').on('click', '.btn-deleterol', function (event) {
    event.preventDefault();

        var me = $(this),

        idrol = me.attr('data-id'),
        iduser = me.attr('data-iduser'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

        run_waitMe();

    	$.ajax({
	                url: "{{ route('delete.rol') }}",
	                type: "POST",
	                data: {'_token': csrf_token, 'idrol': idrol, 'iduser': iduser},
	                success: function (response) { 

	                	$('#tblusuario_rol').DataTable().ajax.reload();
	                	$('body').waitMe('hide');
	                    swal({
	                        icon: 'success',
	                        title: 'Permisos',
	                        text: 'Se eliminó el rol en forma correcta.'
	                    });
	                },
	                error: function (xhr) {
	                	$('body').waitMe('hide');
	                    swal({
	                        icon: 'error',
	                        title: 'Rol ',
	                        text: 'Ocurrió un error al intentar eliminar el rol.'
	                    });
	                }
	            });  

});



</script>
      	

     
