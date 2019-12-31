<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pago;
use App\DetallePago;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PagoFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class PagoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $pagos=DB::table('pago as p')
      ->join('estudiante as est','p.estudiante_id','=','est.id')
      ->select('p.IdPago','p.Num_comprobante','p.Total','p.Fecha','p.Estado',DB::raw('est.nombres as est_nombres'),DB::raw('est.apellidos as est_apellidos'))
      ->where('p.Fecha','LIKE','%'.$query.'%')
      ->orderBy('p.Num_comprobante','asc')
      ->paginate(7);

      return view('pago.index',["pagos"=>$pagos,"searchText"=>$query]);
    }
  }

  public function create(){
    $estudiantes=DB::table('estudiante')->get();
    $conceptos=DB::table('concepto')->get();
    return view("pago.create",["estudiantes"=>$estudiantes,"conceptos"=>$conceptos]);
  }

public function store(PagoFormRequest $request /*Request $request*/){
  // try {

    DB::beginTransaction();

    $pago= new Pago;
    $pago->IdPago = $request->get('IdPago');
    $pago->Num_comprobante = $request->get('Num_comprobante');
    $pago->Fecha = $request->get('Fecha');
    $pago->Total = $request->get('Total');
    $pago->Estado = 1;
    $pago->estudiante_id = $request->get('estudiante_id');
    $pago->save();

    $idpago = $pago->IdPago;
    $idconcepto = $request->get('concepto_id');

    $cont = 0;

    while ($cont < count($idconcepto)) {
      $detalle=new DetallePago;
      $detalle->pago_id=$idpago;
      $detalle->concepto_id=$idconcepto[$cont];
      $detalle->save();
      $cont=$cont+1;
    }

    DB::commit();
  // }catch(\Exception $e){
  //   DB::rollback();
  // }
    return Redirect::to('pago/');
  }

  public function show($id){
    return view("pago.show",["pago"=>Pago::findOrFail($id)]);
  }

  public function edit($id){
    return view("pago.edit",["pago"=>Pago::findOrFail($id)]);
  }

  public function update(PagoFormRequest $request, $id){

    $pagp=Pago::findOrFail($id);
    $pago->Fecha = $request->get('Fecha');
    $pago->Total = $request->get('Total');
    $pago->Estado = $request->get('Estado');
    $pago->estudiante_id = $request->get('estudiante_id');
    $pago->detalle_id = $request->get('detalle_id');
    $pago->update();

    return Redirect::to('pago/');
  }

  public function destroy($id){
    $pago= DB::table('pago')->where('IdPago', '=',$id)->delete();
    return Redirect::to('pago/');
  }
}
