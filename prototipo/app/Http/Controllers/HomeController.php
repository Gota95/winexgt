<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $alumnos=DB::table('estudiante')
      ->select(DB::raw('COUNT(estado) as conteo'))
      ->where('estado','=','1')
      ->get();
      $usuarios=DB::table('users')
      ->select(DB::raw('COUNT(id) as usuarios'))
      ->get();
      $personal=DB::table('personal as p')
      ->join('cargo as c','p.cargo_id','=','c.id')
      ->select(DB::raw('COUNT(p.id) as personal'))
      ->where('c.cargo','!=','Estudiante')
      ->get();
      return view('home',["alumnos"=>$alumnos,"usuarios"=>$usuarios]);
    }
}
