
			

					{!! Form::model($model, [
						'route' => 'clientes.store',
						'method' => 'POST'
						]) !!}
				

					
						<div class="form-group"  style="margin-bottom: 5px;">	
							{!! Form::label('name','Nombre y apellido(*)') !!}
							{!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'id' => 'name', 'required']) !!}
						</div>

						<div class="form-group"  style="margin-bottom: 5px;">
							{!! Form::label('CUIT','CUIT') !!}
							{!! Form::text('cuit', null, ['class' => 'form-control form-control-sm', 'id' => 'cuit','required']) !!}
						</div>			

						<div class="form-group"  style="margin-bottom: 5px;">
							{!! Form::label('condicioniva','Condición IVA(*)') !!}
							<select class="custom-select mr-sm-2" name="condicioniva" id="condicioniva">
						        <option value="" hidden selected>Seleccione condicion IVA</option>
						       	<option value="IVA Responsable Inscripto">IVA Responsable Inscripto</option>
						       	<option value="IVA Excento">IVA Excento</option>
						       	<option value="Responsable Monotributo">Responsable Monotributo</option>
						       	<option value="Monotributista Social">Monotributista Social</option>
						       	<option value="IVA No Alcanzado">IVA No Alcanzado </option>					
						      </select>
					     </div>

						<div class="form-group"  style="margin-bottom: 5px;">
							{!! Form::label('email','Correo electrónico(*)') !!}
							{!! Form::text('email', null, ['class' => 'form-control form-control-sm', 'id' => 'email','required']) !!}
						</div>
				

					
						<div class="form-group"  style="margin-bottom: 5px;"	
							{!! Form::label('direccion','Dirección') !!}
							{!! Form::text('direccion', null, ['class' => 'form-control form-control-sm', 'id' => 'direccion',]) !!}
						</div>

						<div class="form-group"  style="margin-bottom: 5px;">
							{!! Form::label('localidad','Localidad') !!}
							{!! Form::text('localidad', null, ['class' => 'form-control form-control-sm', 'id' => 'localidad',]) !!}
						</div>
					

					
						<div class="form-group"  style="margin-bottom: 5px;">
							{!! Form::label('codigopostal','Código Postal') !!}
							{!! Form::text('codigopostal', null, ['class' => 'form-control form-control-sm', 'id' => 'codigopostal',]) !!}
						</div>

						<div class="form-group"  style="margin-bottom: 5px;">	
							{!! Form::label('telefono','Teléfono') !!}
							{!! Form::text('telefono', null, ['class' => 'form-control form-control-sm', 'id' => 'telefono',]) !!}
						</div>

						<div class="form-group" style="margin-bottom: 5px;">
								{!! Form::label('observaciones','Observaciones') !!}
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="2"></textarea>
                        </div>




						

						


					


						{{-- <div class="form-group col-md-3">
							{!! Form::label('type','Tipo') !!}
							{!! Form::select('type', ['' => 'Seleccione un nivel', 'Gestor de clientes' => 'Gestor de clientes' , 'Administrador de usuarios' => 'Administrador de usuarios'], null, ['class' => 'form-control']) !!}
						</div> --}}
					

					
					
					 {!! Form::close() !!}					

					
			

		
