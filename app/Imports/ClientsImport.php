<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ClientsImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $key => $row) {



        }

    }
}
