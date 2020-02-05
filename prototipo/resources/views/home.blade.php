@extends('layouts.admin')
@section('contenido')
  <div class="row">
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
        @foreach ($alumnos as $a)
          <h3>{{ $a->conteo }}</h3>
        @endforeach

          <h5 style="color: blue">Alumnos Activos</h5>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="estudiantes_encargados/estudiantes/" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
        @foreach ($usuarios as $u)
          <h3>{{ $u->usuarios }}</h3>
        @endforeach

          <h5 style="color: blue">Usuarios Activos</h5>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="usuarios/" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
        @foreach ($usuarios as $u)
          <h3>{{ $u->usuarios }}</h3>
        @endforeach

          <h5 style="color: blue">Personal Administrativo</h5>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="personal_administrativo/personal/" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

@endsection
