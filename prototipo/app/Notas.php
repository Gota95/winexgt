<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
  protected $table='nota';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $guarded=[];
}
