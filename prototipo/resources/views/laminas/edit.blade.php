@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Lamina: {{$laminas->nombre}}</h3>
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

			{!!Form::model($laminas,['method'=>'PATCH','route'=>['laminas.update',$laminas->id]])!!}
			{{Form::token()}}
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" required value="{{($laminas->nombre)}}" class="form-control" placeholder="Nombre...">
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="lamina">Lamina</label>
              <input type="file" name="lamina" class="form-control">
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <input type="textarea" name="descripcion" required value="{{($laminas->descripcion)}}" class="form-control">
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="categoria_id">Categoría </label>
              <select data-live-search="true" name="categoria_id" id="categoria_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
                @foreach($categorias as $cat)
									@if ($laminas->categoria_id==$cat->id)
										<option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
									@else
										<option value="{{$cat->id}}">{{$cat->nombre}}</option>
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
@endsection
