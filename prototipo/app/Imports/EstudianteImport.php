<?php

namespace App\Imports;

use App\Estudiantes;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithValidation};

class EstudianteImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    public function model(array $row)
    {
        return new Estudiantes([
        'codigo'=> $row['codigo'],
        'nombres'=> $row['nombres'],
        'apellidos'=> $row['apellidos'],
        'fecha_nac'=> $row['fecha_nacimiento'],
        'direccion'=> $row['direccion'],
        'estado'=> $row['estado'],
        'genero_id'=> $row['genero']
        ]);
    }

    public function rules()
    {
      return [
        'codigo'=> 'required|string|max:45',
        'nombres'=> 'required|string|max:45',
        'apellidos'=> 'required|string|max:45',
        'fecha_nac',
        'direccion'=> 'required|string|max:100',
        'estado',
        'genero_id'
      ];
    }
}
