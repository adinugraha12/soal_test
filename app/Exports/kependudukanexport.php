<?php

namespace App\Exports;

use App\Models\kependudukan;
use Maatwebsite\Excel\Concerns\FromCollection;

class kependudukanexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return kependudukan::all();
    }
}
