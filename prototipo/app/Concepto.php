<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
  protected $table='concepto';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'concepto',
    'monto',
    'activo'
  ];
}
