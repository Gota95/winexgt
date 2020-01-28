<?php

namespace App\Imports;

use App\Notas;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow};

class NotasImport implements ToModel, WithHeadingRow
{
      use Importable;

      public function model(array $row)
      {
          return new Notas([
          'nota1'=> $row['unidad_i'],
          'nota2'=> $row['unidad_ii'],
          'nota3'=> $row['unidad_iii'],
          'nota4'=> $row['unidad_iv'],
          'estudiante_id'=> $row['estudiante'],
          'curso_id'=> $row['curso'],
          'tipo_evaluacion_id'=> $row['tipo_evaluacion'],
          ]);
      }
}
