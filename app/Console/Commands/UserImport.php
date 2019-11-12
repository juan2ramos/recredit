<?php

namespace App\Console\Commands;

use App\Imports\ClientsImport;
use App\Imports\UsersImport;
use App\User;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class UserImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar excel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        for ($i= 87777;$i < 91420; $i++ ){
            $user = User::find($i);
            $user->assignRole('Credit');
        }
       //Excel::import(new UsersImport(), '1.xlsx', 'public');
    }
}
