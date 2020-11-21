<?php

namespace App\Imports;

use App\Family;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class FamilyImport implements 
    ToModel, 
    WithHeadingRow, 
    SkipsOnError, 
    WithValidation,
    SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Family([
            'id' => $row['id'],
            'kepala_keluarga' => $row['kepala_keluarga'],
        ]);
    }

    public function rules(): array
    {
        return [
            '0' => ['id', 'unique:family,id']
        ];
    }


}
