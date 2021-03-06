@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Bimestre: {{$bimestre->bimestre}}</h3>
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

			{!!Form::model($bimestre,['method'=>'PATCH','route'=>['bimestre.update',$bimestre->id]])!!}
			{{Form::token()}}
			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="bimestre">Bimestre</label>
						<input type="text" name="bimestre" required value="{{$bimestre->bimestre}}" class="form-control" placeholder="Bimestre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="ciclo_id">Ciclo </label>
						<select data-live-search="true" name="ciclo_id" id="ciclo_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($ciclos as $ci)
								@if ($bimestre->ciclo_id==$ci->id)
									<option value="{{$ci->id}}" selected>{{$ci->fecha_inicio.' - '.$ci->fecha_fin}}</option>
								@else
									<option value="{{$ci->id}}">{{$ci->fecha_inicio.' - '.$ci->fecha_fin}}</option>
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
