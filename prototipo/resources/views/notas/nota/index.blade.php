@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Notas <a href="nota/create"><button class="btn btn-success">Nuevo</button></a> <a href="{{URL::action('NotasController@ver')}}"><button class="btn btn-warning">Importar</button></a></h3>
		<br>
		@include('notas.nota.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Unidad I</th>
					<th>Unidad II</th>
					<th>Unidad III</th>
					<th>Unidad IV</th>
					<th>Curso</th>
					<th>Estudiante</th>
					<th>Tipo Evaluación</th>
					<th>Opciones</th>
				</thead>

				@foreach($notas as $no)
					<tr>
						<td>{{$no->nota1}}</td>
						<td>{{$no->nota2}}</td>
						<td>{{$no->nota3}}</td>
						<td>{{$no->nota4}}</td>
						<td>{{$no->curso}}</td>
						<td>{{$no->nombre_estudiante.' '.$no->apellido_estudiante}}</td>
						<td>{{$no->tipo_evaluacion}}</td>
						<td>
							<a href="{{URL::action('NotasController@edit', $no->id)}}">
								<button class="btn btn-info fa fa-edit"></button>
							</a>


							<a href="" data-target="#modal-delete-{{$no->id}}" data-toggle="modal">
								<button class="btn btn-danger fa  fa-trash-o"></button>
							</a>
						</td>
					</tr>
					@include('notas.nota.modal')
				@endforeach
			</table>
		</div>
		{{$notas->render()}}
	</div>
</div>
@endsection
