<?php

namespace App\Exports;

use App\Models\agen;

use Maatwebsite\Excel\Concerns\FromCollection;

class dataagens implements FromCollection
{
    public function collection()
    {
        return agen::all();
    }
}
