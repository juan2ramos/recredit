<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\User;
use App\Models\Point;

class ReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reasons')->insert(['id' => '1', 'name' => 'Reporte en centrales de riesgo']);
        DB::table('reasons')->insert(['id' => '2', 'name' => 'Capacidad de endeudamiento']);
        DB::table('reasons')->insert(['id' => '3', 'name' => 'Cédula Falsa']);
        DB::table('reasons')->insert(['id' => '4', 'name' => 'Cédula en alto estado de deterioro']);
        DB::table('reasons')->insert(['id' => '5', 'name' => 'Documento no Valido para estudio de crédito']);


    }
}
