<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
  protected $table='estudiante';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $guarded=[];
}
