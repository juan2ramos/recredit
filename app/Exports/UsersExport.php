<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport implements FromQuery
{
    use Exportable;
    protected $dateInit;
    protected $dateEnd;

    public function __construct($dateInit, $dateEnd)
    {
        $this->dateInit = $dateInit;
        $this->dateEnd = $dateEnd;
    }

    public function query()
    {
        return User::whereBetween('created_at', [ $this->dateInit,  $this->dateEnd])->limit(9999);
    }
}
