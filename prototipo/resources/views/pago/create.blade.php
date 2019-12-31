@extends('layouts.admin')
@section('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Nuevo Pago</h3>
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


      {!!Form::open(array('url'=>'pago/','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
      {{Form::token()}}
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="estudiante_id">Estudiante</label>
            <select data-live-search="true" name="estudiante_id" id="estudiante_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
              @foreach($estudiantes as $est)
                <option value="{{$est->id}}">{{$est->nombres.' '.$est->apellidos}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <?php $fcha = date("Y-m-d");?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Fecha">Fecha de Pago</label>
            <input type="date" name="Fecha" value="<?php echo $fcha;?>" readonly class="form-control">
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Num_comprobante">Comprobante No.</label>
            <input type="number" name="Num_comprobante" value="{{old('Num_comprobante')}}" class="form-control">
          </div>
          <br>
          <br>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="Estado">Estado</label>
            <input type="text" name="Estado" value="Pagado" readonly class="form-control">
          </div>
          <br>
          <br>
        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form">
            <label>Concepto</label>
            <select name="pconcepto_id" id="pconcepto_id" class="form-control" data-live-search="true">
              @foreach($conceptos as $c)
                <option value="{{$c->id}}_{{$c->monto}}">{{$c->concepto}}</option>
              @endforeach
            </select>
          </div>
        </div>



        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
          <div class="form-group">
            <label for="monto">Monto</label>
            <input type="number" disabled name="pmonto" id="pmonto" class="form-control" placeholder="Monto">
          </div>
        </div>

        <div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
          <br>
          <div class="form-group">
            <button type="button" id="bt_add" class="btn btn-primary">
              Agregar
            </button>
          </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        </div>
        <table id="detalles" class= "table table-striped table-bordered table-condensed table-hover">
          <thead style="background-color: #c3f3ea">
            <th>Opciones</th>
            <th>Concepto</th>
            <th>Monto</th>
            <th>Subtotal</th>

          </thead>
          <tfoot>
            <th>TOTAL</th>
            <th></th>
            <th></th>
            <th><h4 id="total">Q/. 0.00</h4><input type="hidden" name="Total"id="Total"></th>

          </tfoot>
          <tbody>

          </tbody>
        </table>
      </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
        <div class="form-group">
          <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
          <button class="btn btn-primary" type="submit"> Guardar </button>
          <button class="btn btn-danger" type="reset"> Cancelar </button>
        </div>
      </div>

{!!Form::close()!!}




  @push ('scripts')

  <script>



   $(document).ready(function(){

      $('#bt_add').click(function(){

      agregar();

      });

    });


    var cont=0;

    total=0;

    subtotal=[];


   $("#guardar").hide();

   $('#pconcepto_id').change(mostrarValores);



   function mostrarValores(){

    datosConcepto=document.getElementById('pconcepto_id').value.split('_');

    $('#pmonto').val(datosConcepto[1]);

   }



   function agregar(){

      datosConceptos=document.getElementById('pconcepto_id').value.split('_');

      idconcepto=datosConceptos[0];
      concepto=$("#pconcepto_id option:selected").text();
      monto=$("#pmonto").val();

      if (idconcepto!="" && monto!="")
      {
        subtotal[cont]=parseInt(monto);
        total=total+subtotal[cont];
         var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="concepto_id[]" value="'+idconcepto+'">'+concepto+'</td><td><input type="number" name="monto[]" value="'+monto+'"></td><td>'+subtotal[cont]+'</td></tr>';
         cont++;
         limpiar();
         $('#total').html("Q." + total);
         $('#Total').val(total);
         evaluar();
         $('#detalles').append(fila);
      }
      else
      {
        alert("Error al ingresar el detalle de pago, revise los datos del concepto")
      }

  }





   function limpiar(){

      $("#pmonto").val("");
    }



    function evaluar()

    {

      if (total>0)

      {

        $("#guardar").show();

      }

      else

      {

        $("#guardar").hide();

      }

     }



   function eliminar(index){

    total=total-subtotal[index];

      $("#total").html("S/. " + total);

      $("#total_venta").val(total);

      $("#fila" + index).remove();

      evaluar();

   }

  </script>
@endpush
@endsection
