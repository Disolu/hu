<?php 
	if(Auth::user()->idrol==1)
	{
		$variable = "layouts.index";
	} 
	elseif(Auth::user()->idrol==2)
	{
		$variable = "layouts.responsable";	
	}
	elseif(Auth::user()->idrol==3)
	{
		$variable = "layouts.secretaria";	
	}
	elseif(Auth::user()->idrol==4)
	{
		$variable = "layouts.profesor";	
	}
	elseif(Auth::user()->idrol==5)
	{
		$variable = "layouts.legal";	
	}
?>
@extends("$variable")
@section('cuerpo')
<div class="tabs" id="page-wrapper">
	{!! Form::open(['route' => ['updatealumno',$id], 'method' => 'put']) !!}
	{!! csrf_field() !!}
	<ul class="nav nav-tabs">
		<li class="active">
			<a href="#alumno" data-toggle="tab" aria-expanded="false"><i class="fa fa-star"></i> Datos del alumno</a>
		</li>
		<li class="">
			<a href="#padre" data-toggle="tab" aria-expanded="true"> Datos del padre</a>
		</li>
		<li class="">
			<a href="#otros" data-toggle="tab" aria-expanded="true"> Otros datos</a>
		</li>			
	</ul>
	<div class="tab-content">
		<div id="alumno" class="tab-pane active">
			<h2>Alumno</h2>
			@include('alertas.request')
			@include('alertas.success')
			
			<div class="col-xs-6">                                
				<div class="form-group">
					<label>Nombre</label>
					<input type="text" name="nombres" class="form-control" id="validate" placeholder="Ingrese un nombre" value="{!! $alumno->nombres !!}" data-bind="value: anombre">
				</div>
				<div class="form-group">
					<label>Apellido Paterno</label>
					<input type="text" name="apellido_paterno" class="form-control" id="validate" placeholder="Ingrese un apellido paterno" value="{!! $alumno->apellido_paterno !!}" data-bind="value: apaterno">
				</div>
				<div class="form-group">
					<label>Apellido Materno</label>
					<input type="text" name="apellido_materno" class="form-control" id="validate" placeholder="Ingrese un apellido materno" value="{!! $alumno->apellido_materno !!}" data-bind="value: amaterno">
				</div>
				<div class="form-group">
					<label>Sexo</label>
					<select class="form-control" id="validate" name="sexo" data-bind="value: sexo">
						<option value="M" <?php echo ($alumno->sexo=='M' ? 'selected="selected"' : '' ); ?> >Masculino</option>
						<option value="F" <?php echo ($alumno->sexo=='F' ? 'selected="selected"' : '' ); ?> >Femenino</option>
					</select>
				</div>
				<div class="form-group">
					<label>Fecha de Nacimiento</label>
					<input type="date" name="fecha_nacimiento" pattern="dd/mm/yyyy" class="form-control" id="fechaNac" value="{!! $alumno->fecha_nacimiento !!}"	data-bind="value: afechaNac" placeholder="Seleccione su fecha de nacimiento">
				</div>
				<div class="form-group">
					<label>DNI</label>
					<input class="form-control" id="validate" name="dni" value="{!! $alumno->dni !!}" pattern="^[0-9]+$" placeholder="Ingrese un DNI" data-bind="value: adni">
				</div>
			</div>

			<div class="col-xs-6">
				<div class="form-group">
					<label>Departamento</label>
					<select class="form-control" name="departamento" data-bind="value: adepartamento">
						<option value="1">Lima</option>						
					</select>
				</div>
				<div class="form-group">
					<label>Provincia</label>
					<select class="form-control" name="provincia" data-bind="value: aprovincia">
						<option value="1">Lima</option>						
					</select>					
				</div>
				<div class="form-group">
					<label>Distrito</label>
					<select class="form-control" name="distrito" data-bind="value: adistrito">
						<option value="1">Villa El Salvador</option>						
					</select>					
				</div>
				<div class="form-group">
					<label>Dirección</label>
					<input class="form-control" name="direccion" type="text" value="{!! $alumno->direccion !!}" placeholder="Ingrese una dirección" data-bind="value: adireccion">
				</div>
				<div class="form-group">
					<label>Teléfono</label>
					<input class="form-control" name="telefono" type="text" value="{!! $alumno->telefono !!}" placeholder="Ingrese un telefono" data-bind="value: atelefono">
				</div>
			</div>
			
			<div style="clear:both"></div>
		</div>

		<div id="padre" class="tab-pane">
			<div class="col-xs-4">
				<h4>Datos del Padre</h4>
				<div class="form-group">
					<label>Nombres</label>
					<input type="text" id="validate" class="form-control" placeholder="Nombres" name="p_nombre" value="{!! $apoderado->p_nombres !!}">
				</div>
				<div class="form-group">
					<label>Apellidos</label>
					<input type="text" id="validate" class="form-control" placeholder="Apellidos" name="p_apellidos" value="{!! $apoderado->p_apellidos !!}" data-bind="value: p_apellido">
				</div>
				<div class="form-group">
					<label>Dni</label>
					<input type="text" class="form-control" placeholder="DNI" name="p_dni" value="{!! $apoderado->p_dni !!}" data-bind="value: p_dni">
				</div>
				<div class="form-group">
					<label>Estado Civil</label>
					<select class="form-control" name="p_estadocivil" data-bind="value: p_estadocivil">
						<option value="1" <?php echo($apoderado->p_estadocivil == 1 ? "selected='selected'" : ''); ?> >Soltero</option>
						<option value="2" <?php echo($apoderado->p_estadocivil == 2 ? "selected='selected'" : ''); ?>>Casado</option>
						<option value="3" <?php echo($apoderado->p_estadocivil == 3 ? "selected='selected'" : ''); ?>>Separado</option>
						<option value="4" <?php echo($apoderado->p_estadocivil == 4 ? "selected='selected'" : ''); ?>>Viudo</option>
						<option value="5" <?php echo($apoderado->p_estadocivil == 5 ? "selected='selected'" : ''); ?>>Otro</option>
					</select>					
				</div>
				<div class="form-group">
					<label>Lugar de residencia</label>
					<input type="text" class="form-control" placeholder="Lugar de residencia" name="p_lugarresidencia" value="{!! $apoderado->p_lugarresidencia !!}" data-bind="value: p_lugarresidencia">
				</div>
				<div class="form-group">
					<label>Teléfono fijo</label>
					<input type="text" class="form-control" placeholder="Teléfono fijo" name="p_telefonofijo" value="{!! $apoderado->p_telefonofijo !!}" data-bind="value: p_telefonofijo">
				</div>
				<div class="form-group">
					<label>Teléfono trabajo</label>
					<input type="text" class="form-control" placeholder="Teléfono trabajo" name="p_telefonotrabajo" value="{!! $apoderado->p_telefonotrabajo !!}" data-bind="value: p_telefonotrabajo">
				</div>
				<div class="form-group">
					<label>Celular personal</label>
					<input type="text" class="form-control" placeholder="Celular personal" name="p_celular" value="{!! $apoderado->p_celular !!}" data-bind="value: p_celular">
				</div>
				<div class="form-group">
					<label>email</label>
					<input type="email" class="form-control" placeholder="Email" name="p_email" value="{!! $apoderado->p_email !!}" data-bind="value: p_email">
				</div>
			</div>  

			<div class="col-xs-4">  
				<h4>Datos de la Madre</h4>
				<div class="form-group">
					<label>Nombres</label>
					<input type="text" id="validate" class="form-control" placeholder="Nombres" name="m_nombres" value="{!! $apoderado->m_nombres !!}" data-bind="value: m_nombres">
				</div>
				<div class="form-group">
					<label>Apellidos</label>
					<input type="text" id="validate" class="form-control" placeholder="Apellidos" name="m_apellidos" value="{!! $apoderado->m_apellidos !!}" data-bind="value: m_apellido">
				</div>
				<div class="form-group">
					<label>Dni</label>
					<input type="text" class="form-control" placeholder="DNI" name="m_dni" value="{!! $apoderado->m_dni !!}" data-bind="value: m_dni">
				</div>
				<div class="form-group">
					<label>Estado Civil</label>
					<select class="form-control" name="m_estadocivil" data-bind="value: m_estadocivil">
						<option value="1" <?php echo($apoderado->m_estadocivil == 1 ? "selected='selected'" : ''); ?> >Soltero</option>
						<option value="2" <?php echo($apoderado->m_estadocivil == 2 ? "selected='selected'" : ''); ?>>Casado</option>
						<option value="3" <?php echo($apoderado->m_estadocivil == 3 ? "selected='selected'" : ''); ?>>Separado</option>
						<option value="4" <?php echo($apoderado->m_estadocivil == 4 ? "selected='selected'" : ''); ?>>Viudo</option>
						<option value="5" <?php echo($apoderado->m_estadocivil == 5 ? "selected='selected'" : ''); ?>>Otro</option>
					</select>
				</div>
				<div class="form-group">
					<label>Lugar de residencia</label>
					<input type="text" class="form-control" placeholder="Lugar de residencia" name="m_lugarresidencia" value="{!! $apoderado->m_lugarresidencia !!}" data-bind="value: m_lugarresidencia">
				</div>
				<div class="form-group">
					<label>Teléfono fijo</label>
					<input type="text" class="form-control" placeholder="Teléfono fijo" name="m_telefonofijo" value="{!! $apoderado->m_telefonofijo !!}" data-bind="value: m_telefonofijo">
				</div>
				<div class="form-group">
					<label>Teléfono trabajo</label>
					<input type="text" class="form-control" placeholder="Teléfono trabajo" name="m_telefonotrabajo" value="{!! $apoderado->m_telefonotrabajo !!}" data-bind="value: m_telefonotrabajo">
				</div>
				<div class="form-group">
					<label>Celular personal</label>
					<input type="text" class="form-control" placeholder="Celular personal" name="m_celular" value="{!! $apoderado->m_celular !!}" data-bind="value: m_celular">
				</div>
				<div class="form-group">
					<label>email</label>
					<input type="email" class="form-control" placeholder="Email" name="m_email" value="{!! $apoderado->m_email !!}" data-bind="value: m_email">
				</div>
			</div>  

			<div class="col-xs-4">
				<h4>Datos del Apoderado</h4>

				<div class="form-group">
					<label>Nombres</label>
					<input type="text" class="form-control" placeholder="Nombres" name="a_nombre" value="{!! $apoderado->a_nombres !!}" data-bind="value: a_nombres">
				</div>
				<div class="form-group">
					<label>Apellidos</label>
					<input type="text" class="form-control" placeholder="Apellidos" name="a_apellido" value="{!! $apoderado->a_apellidos !!}" data-bind="value: a_apellido">
				</div>
				<div class="form-group">
					<label>Dni</label>
					<input type="text" class="form-control" placeholder="DNI" name="a_dni" value="{!! $apoderado->a_dni !!}" data-bind="value: a_dni">
				</div>
				<div class="form-group">
					<label>Estado Civil</label>
					<select class="form-control" name="a_estadocivil" data-bind="value: a_estadocivil">
						<option value="1" <?php echo($apoderado->a_estadocivil == 1 ? "selected='selected'" : ''); ?> >Soltero</option>
						<option value="2" <?php echo($apoderado->a_estadocivil == 2 ? "selected='selected'" : ''); ?>>Casado</option>
						<option value="3" <?php echo($apoderado->a_estadocivil == 3 ? "selected='selected'" : ''); ?>>Separado</option>
						<option value="4" <?php echo($apoderado->a_estadocivil == 4 ? "selected='selected'" : ''); ?>>Viudo</option>
						<option value="5" <?php echo($apoderado->a_estadocivil == 5 ? "selected='selected'" : ''); ?>>Otro</option>
					</select>					
				</div>
				<div class="form-group">
					<label>Lugar de residencia</label>
					<input type="text" class="form-control" placeholder="Lugar de residencia" name="a_lugarresidencia" value="{!! $apoderado->a_lugarresidencia !!}" data-bind="value: a_lugarresidencia">
				</div>
				<div class="form-group">
					<label>Teléfono fijo</label>
					<input type="text" class="form-control" placeholder="Teléfono fijo" name="a_telefonofijo" value="{!! $apoderado->a_telefonofijo !!}" data-bind="value: a_telefonofijo">
				</div>
				<div class="form-group">
					<label>Teléfono trabajo</label>
					<input type="text" class="form-control" placeholder="Teléfono trabajo" name="a_telefonotrabajo" value="{!! $apoderado->a_telefonotrabajo !!}" data-bind="value: a_telefonotrabajo">
				</div>
				<div class="form-group">
					<label>Celular personal</label>
					<input type="text" class="form-control" placeholder="Celular personal" name="a_celular" value="{!! $apoderado->a_celular !!}" data-bind="value: a_celular">
				</div>
				<div class="form-group">
					<label>email</label>
					<input type="email" class="form-control" placeholder="Email" name="a_email" value="{!! $apoderado->a_email !!}" data-bind="value: a_email">
				</div>	                
			</div>	                
			<div style="clear:both"></div>
		</div> 

		<div id="otros" class="tab-pane">
			<h2>Otros datos</h2>
			<div class="col-xs-5">
				<div class="form-group">
					<label>Tipos de sangre</label>
					<input type="text" class="form-control" placeholder="Tipos de sangre" data-bind="value: tipo_sangre" value="{!! $otherdata->tiposangre !!}" name="tiposangre">
				</div>
				<div class="form-group">
					<label>Religión</label>
					<select class="form-control" data-bind="value: religion" name="religion">						
						<option value="10">Ninguna</option>
						<option value="1" <?php echo($otherdata->idreligion == 1 ? "selected='selected'" : ''); ?>> Catolica</option>
						<option value="2" <?php echo($otherdata->idreligion == 2 ? "selected='selected'" : ''); ?>> Cristiana</option>
						<option value="3" <?php echo($otherdata->idreligion == 3 ? "selected='selected'" : ''); ?>> Testigo de Jehova</option>
						<option value="4" <?php echo($otherdata->idreligion == 4 ? "selected='selected'" : ''); ?>> Mormon</option>
						<option value="5" <?php echo($otherdata->idreligion == 5 ? "selected='selected'" : ''); ?>> Dios Madre</option>
						<option value="6" <?php echo($otherdata->idreligion == 6 ? "selected='selected'" : ''); ?>> Adventista</option>
						<option value="7" <?php echo($otherdata->idreligion == 7 ? "selected='selected'" : ''); ?>> Insrealita</option>
						<option value="8" <?php echo($otherdata->idreligion == 8 ? "selected='selected'" : ''); ?>> Judio</option>
						<option value="9" <?php echo($otherdata->idreligion == 9 ? "selected='selected'" : ''); ?>> Otro</option>			
					</select>

				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" placeholder="Email" data-bind="value: email" value="{!! $otherdata->email !!}" name="email">
				</div>
			</div>

			<div class="col-xs-5">
				<div class="form-group">
					<label>Hermanos en la institución</label>
					<input type="text" class="form-control" placeholder="Hermanos en la institución" value="{!! $otherdata->qty_hermanos !!}" data-bind="value: qty_hermanos" name="qty_hermanos">
				</div>
				<div class="form-group">
					<label>Celular personal</label>
					<input type="text" class="form-control" placeholder="Celular personal" value="{!! $otherdata->celular !!}" data-bind="value: celular" name="celular">
				</div>
				<div class="form-group">
					<label>Seguro afiliado</label>
					<input type="text" class="form-control" placeholder="Seguro afiliado" value="{!! $otherdata->seguro !!}" data-bind="value: seguro" name="seguro">
				</div>
			</div>

			<div style="clear:both"></div>
		</div>

		<div class="panel panel-info">
			<div class="panel-body">
				<b>Se Matriculó para: </b><code>Es importante seleccionar las siguientes opciones:</code><br />	
				<div class="row">
		  <div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="periodo" id="cboPeriodo" class="form-control mb-md" data-bind="options: periodos, optionsText: 'nombre', optionsValue: 'idperiodomatricula', value: pediodoSeleccionado"></select>
				</div>
			</fieldset>
		  </div>
		  <div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="sede"  id="cboSede" class="form-control mb-md" data-bind="options: sedes, optionsText: 'nombre', optionsValue: 'idsede',  optionsCaption: 'Seleccione una Sede', value: sedeSeleccionada"></select>
				</div>
			</fieldset>
		  </div>
		  <div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="nivel"  id="cboNivel" class="form-control mb-md" data-bind="options: niveles, optionsText: 'nombre', optionsValue: 'idnivel',  optionsCaption: 'Seleccione un Nivel', value: nivelSeleccionado"></select>
				</div>
			</fieldset>
		  </div>
			<div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="grado"  id="cboGrado" class="form-control mb-md" data-bind="options: grados, optionsText: 'nombre', optionsValue: 'idgrado',  optionsCaption: 'Seleccione un Grado', value: gradoSeleccionado"></select>
				</div>
			</fieldset>
			</div>
		</div>		

				<div class="col-xs-5">
					<label>Estado de Matricula</label> <br>
					<div class="btn-group" data-toggle="buttons">
					@foreach($EstadoMatricula as $estado )
						<label class="btn btn-default  btn-sm <?php echo($matricula->idestadomatricula == $estado->idestadomatricula ? 'active' :''); ?>">
							<input type="radio" id="validate" name="alu_estado" autocomplete="off" value="{!! $estado->idestadomatricula !!}" <?php echo($matricula->idestadomatricula == $estado->idestadomatricula ? 'checked="checked"' :''); ?>> 
							{!! $estado->nombre !!}
						</label>
					@endforeach	
					</div>
				</div>

				<div class="col-xs-5">
					<label>Estado del Alumno</label> <br>
					<div class="btn-group" data-toggle="buttons">
					@foreach($EstadoAlumno as $estadoAlumno )					
						<label class="btn btn-default  btn-sm <?php echo($estadoAlumno->idestadoalumno == $alumno->idestadoalumno ? 'active' :''); ?> ">
							<input type="radio" id="validate" name="estadoalumno" autocomplete="off" value="{!! $estadoAlumno->idestadoalumno !!}" <?php echo($estadoAlumno->idestadoalumno == $alumno->idestadoalumno ? 'checked="checked"' :''); ?> > 
							{!! $estadoAlumno->nombre !!}
						</label>
					@endforeach	
					</div>
				</div>

				<div class="col-xs-2">
					<div class="form-group">
						<p>¿Impedimento?</p>
						<div class="col-sm-12">
							<div class="radio-custom radio-danger">
								<input type="radio" id="radioExample5" name="impedimento" value="1" <?php echo($alumno->impedimento == 1 ? 'checked="checked"' :''); ?> >
								<label for="radioExample5">Si</label>
							</div>
							<div class="radio-custom radio-danger">
								<input type="radio" id="radioExample4" name="impedimento" value="0" <?php echo($alumno->impedimento == 0 ? 'checked="checked"' :''); ?>>
								<label for="radioExample4">No</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel-footer">
			<button class="btn btn-primary" type="submit">Actualizar Alumno</button>
			<a href="{!! route('alumnobuscar') !!}" class="btn btn-default ml-sm">Cancelar</a>
		</div>	
	</div>

	{!!Form::close()!!}		
</div>
@stop

@section('scripts')
@parent
<!--knockout-->
{!! Html::script('assets/javascripts/knockout-3.3.0.js') !!}

<!-- KnockoutJS Mapping http://knockoutjs.com/documentation/plugins-mapping.html -->
{!! Html::script('assets/javascripts/knockout.mapping.min.js') !!}
<script>
	var baseURL = "{!! config('app.urlglobal') !!}";
	function VacantesFormViewModel () {
		var fo = this;

		fo.periodos = ko.observableArray([]);
		fo.pediodoSeleccionado = ko.observable(null);
		fo.sedes    = ko.observableArray([]);
		fo.sedeSeleccionada    = ko.observable(null);
		fo.niveles  = ko.observableArray([]);
		fo.nivelSeleccionado   = ko.observable(null);
		fo.grados   = ko.observableArray([]);
		fo.gradoSeleccionado   = ko.observable(null);
		fo.secciones= ko.observableArray([]);
		fo.seccionSeleccionada = ko.observable(null);
		fo.aulas    = ko.observableArray([]);
		fo.aulaSeleccionada    = ko.observable(null);



		fo.cargarsedes = function () {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getSedes",
				dataType: "json",               
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var sedesRaw =  e.sedes;
                //limpio el arrray
                fo.sedes.removeAll();
                for (var i = 0; i < sedesRaw.length; i++) {
                	fo.sedes.push(sedesRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.cargarNiveles = function (sedeSeleccionada) {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getNivel",
				data: {sede:sedeSeleccionada},
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var nivelesRaw =  e.nivel;
                //limpio el arrray
                fo.niveles.removeAll();
                for (var i = 0; i < nivelesRaw.length; i++) {
                	fo.niveles.push(nivelesRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.sedeSeleccionada.subscribe(function(newValue) {
			if (newValue) {
				fo.cargarNiveles(newValue);
			}
		});

		fo.cargarGrados = function (sede , nivel) {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getGrados",
				data: {sede:sede, nivel:nivel},
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var gradosRaw =  e.grado;
                //limpio el arrray
                fo.grados.removeAll();
                for (var i = 0; i < gradosRaw.length; i++) {
                	fo.grados.push(gradosRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.nivelSeleccionado.subscribe(function(newValue) {
			if (newValue) {
				fo.cargarGrados(fo.sedeSeleccionada() ,newValue);
			}
		});

		fo.cargarSecciones = function (sede , nivel, grado) {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getSecciones",
				data: {sede:sede, nivel:nivel, grado:grado},
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var seccionRaw =  e.secciones;
                //limpio el arrray
                fo.secciones.removeAll();
                for (var i = 0; i < seccionRaw.length; i++) {
                	fo.secciones.push(seccionRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.gradoSeleccionado.subscribe(function(newValue) {
			if (newValue) {
				fo.cargarSecciones(fo.sedeSeleccionada(), fo.nivelSeleccionado(), newValue);
			}
		});


		fo.seccionSeleccionada.subscribe(function(newValue) {
			if (newValue) {
				fo.cargarAulas(fo.sedeSeleccionada(), fo.nivelSeleccionado(), fo.gradoSeleccionado(), newValue);
			}
		});

		fo.cargarsedes();       
	}    
	var viewModel = new VacantesFormViewModel();

	$(function(){
		ko.applyBindings(viewModel, $("#page-wrapper")[0]); 
	});
</script>
@stop