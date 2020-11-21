<?php

namespace App\Imports;

use App\Jemaat;
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

class JemaatImport implements 
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
        return new Jemaat([
            'id' => $row['id'],
            'family_id' => $row['family_id'], 
            'status_keanggotaan' => $row['status_keanggotaan'],
            'nama' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'no_telp' => $row['no_telp'],
            'status' => $row['status'],
            'pekerjaan' => $row['pekerjaan'],
            'hobi' => $row['hobi'],
            'photo' => $row['photo'],
            'baptis' => $row['baptis'],
            
        ]);
    }

    public function rules(): array
    {
        return [
            '0' => ['id', 'unique:jemaat,id']
        ];
    }

}
