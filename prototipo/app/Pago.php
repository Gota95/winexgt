<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $table='pago';
  protected $primaryKey='IdPago';

  public $timestamps =false;

  protected $fillable = [
    'Num_comprobante',
    'Total',
    'Fecha',
    'Estado',
    'estudiante_id'
  ];
}
