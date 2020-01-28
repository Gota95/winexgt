@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Cargar Notas</h3>
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

			{!!Form::open(array('url'=>'/subno','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}


				<div class="row">
					{{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="grado_id">Grado </label>
							<select data-live-search="true" name="grado_id" id="grado_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
								@foreach($carreras as $c)
									<option value="{{$c->id}}">{{$c->carrera}}</option>
								@endforeach
							</select>
						</div>
					</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="grado_id">Grado </label>
						<select data-live-search="true" name="grado_id" id="grado_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($grados as $gra)
								<option value="{{$gra->id}}">{{$gra->grado}}</option>
							@endforeach
						</select>
					</div>
				</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="grado_id">Grado </label>
								<select data-live-search="true" name="grado_id" id="grado_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
									@foreach($secciones as $s)
										<option value="{{$s->id}}">{{$s->seccion}}</option>
									@endforeach
								</select>
							</div>
						</div> --}}

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="notas">Importar</label>
						<input type="file" name="notas" class="form-control">
					</div>
				</div>

			</div>


			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
@endsection
