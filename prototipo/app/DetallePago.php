<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePago extends Model
{
  protected $table='detallepago';
  protected $primaryKey='IdDetallePago';

  public $timestamps =false;

  protected $fillable = [
    'Monto',
    'pago_id',
    'concepto_id'
  ];
}
