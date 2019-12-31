<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tareas</title>
    {{-- SE DEFINE EL ESTILO DEL FORMULARIO PARA LA VISTA AMIGABLE --}}
  <style>
  table{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  td, th{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  tr:nth-child(even){
    background-color: #dddddd;
  }
  </style>
</head>
<body>
  <img src="img/logo.png"  height="100" width="100">
  <SPAN style="position: absolute; top: 0 px; right:   150 px;"><b> Instituto Normal Mixto de Occidente "Justo Rufino Barrios"</b> </span>
  <SPAN style="position: absolute; top: 20 px; right:  250 px;"><b> Tareas de Alumnos</b> </span>
  {{-- creamos la tabla con los diferentes campos de encabezado y el cuerpo que contiene los datos obtenidos anteriormente --}}
    <div class="row">
    </div>
    <table>
      <tr>
        <th>No.</th>
        <th>Tarea</th>
        <th>Curso</th>
        <th>Detalle</th>
        <th>Entrega</th>
        <th>Punteo</th>
        <th>Observaciones</th>
      </tr>
      <?php $cont=1 ?>
     @foreach($actividades as $a)
       <tr>
        <td><?php echo $cont;?></td>
					<td>{{$a->Nombre_Actividad}}</td>
					<td>{{$a->curso}}</td>
					<td>{{$a->Detalle}}</td>
					<td>{{'De '.$a->Fecha_inicio.' A '.$a->Fecha_fin}}</td>
          <td>{{$a->Punteo}}</td>
          <td>{{$a->Observaciones}}</td>
       </tr>
			 <?php $cont=$cont+1;?>
     @endforeach
    </table>
</body>
</html>
