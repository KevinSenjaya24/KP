<?php

namespace App\Exports;

use App\Jemaat;
use Maatwebsite\Excel\Concerns\FromCollection;

class JemaatExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jemaat::all();
    }
}
