<?php

namespace App\Exports;

use App\Family;
use Maatwebsite\Excel\Concerns\FromCollection;

class FamilyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Family::all();
    }
}
