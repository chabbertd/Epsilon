{!! Form::model($model, [
						'route' => ['empresas.update', $model->id],
						'method' => 'PUT'
						]) !!}
				

					
						<div class="form-group"  style="margin-bottom: 5px;">	
							{!! Form::label('razonsocial','Razón Social(*)') !!}
							{!! Form::text('razonsocial', null, ['class' => 'form-control form-control-sm', 'id' => 'razonsocial', 'required']) !!}
						</div>

						<div class="form-group"  style="margin-bottom: 5px;">
							{!! Form::label('CUIT','CUIT') !!}
							{!! Form::text('cuit', null, ['class' => 'form-control form-control-sm', 'id' => 'cuit','required']) !!}
						</div>			

						<div class="form-group"  style="margin-bottom: 5px;">
							{!! Form::label('condicioniva','Condición IVA(*)') !!}
							<select class="custom-select mr-sm-2" name="condicioniva" id="condicioniva">
						       	
						    @if ( ($model->condicioniva) == "IVA Responsable Inscripto")			
							 <option value="IVA Responsable Inscripto" selected>IVA Responsable Inscripto</option>
							 @else ><option value="IVA Responsable Inscripto">IVA Responsable Inscripto</option>
							 @endif
								     
						    @if ( ($model->condicioniva) == "IVA Excento")			
							 <option value="IVA Excento" selected>IVA Excento</option>
							 @else ><option value="IVA Excento">IVA Excento</option>
							 @endif

						    @if ( ($model->condicioniva) == "Responsable Monotributo")			
							 <option value="Responsable Monotributo" selected="">Responsable Monotributo</option>
							 @else ><option value="Responsable Monotributo">Responsable Monotributo</option>
							 @endif

						    @if ( ($model->condicioniva) == "Monotributista Social")			
							 <option value="Monotributista Social" selected="">Monotributista Social</option>
							 @else ><option value="Monotributista Social">Monotributista Social</option>
							 @endif

						     @if ( ($model->condicioniva) == "IVA No Alcanzado")			
							 <option value="IVA No Alcanzado" selected="">IVA No Alcanzado </option>
							 @else ><option value="IVA No Alcanzado">IVA No Alcanzado </option>
							 @endif
					
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
                                <textarea class="form-control" id="observaciones" name="observaciones" rows="2">{{ $model->observaciones }}</textarea>
                        </div>




						

						


					


						{{-- <div class="form-group col-md-3">
							{!! Form::label('type','Tipo') !!}
							{!! Form::select('type', ['' => 'Seleccione un nivel', 'Gestor de clientes' => 'Gestor de clientes' , 'Administrador de usuarios' => 'Administrador de usuarios'], null, ['class' => 'form-control']) !!}
						</div> --}}
					

					
					
					 {!! Form::close() !!}					

					
			
