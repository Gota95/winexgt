{!! Form::open(array('url'=>'pago/','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="form-group">
	<div class="input-group">
		<input type="date" class="form-control" name="searchText" placeholder="ingrese el número de carnet" value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
		</input>
	</div>
</div>

{{Form::close()}}
