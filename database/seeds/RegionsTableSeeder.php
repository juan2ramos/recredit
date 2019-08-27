<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert(['id' => '1', 'name' => 'Amazonas']);
        DB::table('regions')->insert(['id' => '2', 'name' => 'Antioquia']);
        DB::table('regions')->insert(['id' => '3', 'name' => 'Arauca']);
        DB::table('regions')->insert(['id' => '4', 'name' => 'Atlantico']);
        DB::table('regions')->insert(['id' => '5', 'name' => 'Bolivar']);
        DB::table('regions')->insert(['id' => '6', 'name' => 'Boyaca']);
        DB::table('regions')->insert(['id' => '7', 'name' => 'Caldas']);
        DB::table('regions')->insert(['id' => '8', 'name' => 'Caqueta']);
        DB::table('regions')->insert(['id' => '9', 'name' => 'Casanare']);
        DB::table('regions')->insert(['id' => '10', 'name' => 'Cauca']);
        DB::table('regions')->insert(['id' => '11', 'name' => 'Cesar']);
        DB::table('regions')->insert(['id' => '12', 'name' => 'Choco']);
        DB::table('regions')->insert(['id' => '13', 'name' => 'Cordoba']);
        DB::table('regions')->insert(['id' => '14', 'name' => 'Cundinamarca']);
        DB::table('regions')->insert(['id' => '15', 'name' => 'Guaviare']);
        DB::table('regions')->insert(['id' => '16', 'name' => 'La Guajira']);
        DB::table('regions')->insert(['id' => '17', 'name' => 'Magdalena']);
        DB::table('regions')->insert(['id' => '18', 'name' => 'Meta']);
        DB::table('regions')->insert(['id' => '19', 'name' => 'Nariño']);
        DB::table('regions')->insert(['id' => '20', 'name' => 'Huila']);
        DB::table('regions')->insert(['id' => '21', 'name' => 'Norte de santander']);
        DB::table('regions')->insert(['id' => '22', 'name' => 'Putumayo']);
        DB::table('regions')->insert(['id' => '23', 'name' => 'Quindio']);
        DB::table('regions')->insert(['id' => '24', 'name' => 'Risaralda']);
        DB::table('regions')->insert(['id' => '25', 'name' => 'San andres']);
        DB::table('regions')->insert(['id' => '26', 'name' => 'Santander']);
        DB::table('regions')->insert(['id' => '27', 'name' => 'sucre']);
        DB::table('regions')->insert(['id' => '28', 'name' => 'Tolima']);
        DB::table('regions')->insert(['id' => '29', 'name' => 'Valle del Cuaca']);
    }
}
