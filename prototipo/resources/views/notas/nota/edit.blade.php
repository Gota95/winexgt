@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Nota de: {{$nota->nombre_estudiante.' '.$nota->apellido_estudiante}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::model($nota,['method'=>'PATCH','route'=>['nota.update',$nota->id]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nota">Unidad I</label>
							<input type="number" name="nota1" required value="{{$nota->nota1}}" class="form-control" step="0.01" min="0">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nota">Unidad II</label>
							<input type="number" name="nota2" required value="{{$nota->nota2}}" class="form-control" step="0.01" min="0">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nota">Unidad III</label>
							<input type="number" name="nota3" required value="{{$nota->nota3}}" class="form-control" step="0.01" min="0">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nota">Unidad IV</label>
							<input type="number" name="nota4" required value="{{$nota->nota4}}" class="form-control" step="0.01" min="0">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="estudiante_id">Estudiante </label>
						<select data-live-search="true" name="estudiante_id" id="estudiante_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($estudiantes as $est)
								@if ($nota->estudiante_id==$est->id)
									<option value="{{$est->id}}" selected>{{$est->nombres.' '.$est->apellidos}}</option>
								@else
									<option value="{{$est->id}}">{{$est->nombres.' '.$est->apellidos}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="curso_id">Curso </label>
						<select data-live-search="true" name="curso_id" id="curso_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($cursos as $cur)
								@if ($nota->curso_id==$cur->id)
									<option value="{{$cur->id}}" selected>{{$cur->curso}}</option>
								@else
									<option value="{{$cur->id}}">{{$cur->curso}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="tipo_evaluacion_id">Tipo de Evaluacion </label>
						<select data-live-search="true" name="tipo_evaluacion_id" id="tipo_evaluacion_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($tevaluaciones as $te)
								@if ($nota->tipo_evaluacion_id==$te->id)
									<option value="{{$te->id}}" selected>{{$te->tipo}}</option>
								@else
									<option value="{{$te->id}}">{{$te->tipo}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>

			</div>



			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
