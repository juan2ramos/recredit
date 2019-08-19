<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(['id' => '1', 'name' => 'Leticia', 'region_id' => '1']);
        DB::table('cities')->insert(['id' => '2', 'name' => 'Apartado', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '3', 'name' => 'Bello', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '4', 'name' => 'Caldas', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '5', 'name' => 'El Carmen de Viboral', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '6', 'name' => 'Envigado', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '7', 'name' => 'Girardota', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '8', 'name' => 'La Ceja', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '9', 'name' => 'La Estrella', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '10', 'name' => 'Marinilla', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '11', 'name' => 'Medellin', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '12', 'name' => 'Puerto Berrio', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '13', 'name' => 'Rionegro', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '14', 'name' => 'Sabaneta', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '15', 'name' => 'Saravena', 'region_id' => '3']);
        DB::table('cities')->insert(['id' => '16', 'name' => 'Tame', 'region_id' => '3']);
        DB::table('cities')->insert(['id' => '17', 'name' => 'Barranquilla', 'region_id' => '4']);
        DB::table('cities')->insert(['id' => '18', 'name' => 'Sabanalarga', 'region_id' => '4']);
        DB::table('cities')->insert(['id' => '19', 'name' => 'Sabanalarga', 'region_id' => '4']);
        DB::table('cities')->insert(['id' => '20', 'name' => 'Santo Tomas', 'region_id' => '4']);
        DB::table('cities')->insert(['id' => '21', 'name' => 'Soledad', 'region_id' => '4']);
        DB::table('cities')->insert(['id' => '22', 'name' => 'Cartagena', 'region_id' => '5']);
        DB::table('cities')->insert(['id' => '23', 'name' => 'Chiquinquira', 'region_id' => '7']);
        DB::table('cities')->insert(['id' => '24', 'name' => 'Duitama', 'region_id' => '7']);
        DB::table('cities')->insert(['id' => '25', 'name' => 'Puerto Boyaca', 'region_id' => '7']);
        DB::table('cities')->insert(['id' => '26', 'name' => 'Sogamoso', 'region_id' => '7']);
        DB::table('cities')->insert(['id' => '27', 'name' => 'Tunja', 'region_id' => '7']);
        DB::table('cities')->insert(['id' => '28', 'name' => 'Florencia', 'region_id' => '8']);
        DB::table('cities')->insert(['id' => '29', 'name' => 'Aguazul', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '30', 'name' => 'Anserma', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '31', 'name' => 'Chinchina', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '32', 'name' => 'La Dorada', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '33', 'name' => 'Manizales', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '34', 'name' => 'Paz de Ariporo', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '35', 'name' => 'Yopal', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '36', 'name' => 'Popayan', 'region_id' => '10']);
        DB::table('cities')->insert(['id' => '37', 'name' => 'Fr. Aguachica', 'region_id' => '11']);
        DB::table('cities')->insert(['id' => '38', 'name' => 'Valledupar', 'region_id' => '11']);
        DB::table('cities')->insert(['id' => '39', 'name' => 'Quibdo', 'region_id' => '12']);
        DB::table('cities')->insert(['id' => '40', 'name' => 'Guacari', 'region_id' => '13']);
        DB::table('cities')->insert(['id' => '41', 'name' => 'Lorica', 'region_id' => '13']);
        DB::table('cities')->insert(['id' => '42', 'name' => 'Montelibano', 'region_id' => '13']);
        DB::table('cities')->insert(['id' => '43', 'name' => 'Monteria', 'region_id' => '13']);
        DB::table('cities')->insert(['id' => '44', 'name' => 'Sahagun', 'region_id' => '13']);
        DB::table('cities')->insert(['id' => '45', 'name' => 'Bogota', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '46', 'name' => 'Cajica', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '47', 'name' => 'Chia', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '48', 'name' => 'El Colegio', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '49', 'name' => 'Facatativa', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '50', 'name' => 'Funza', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '51', 'name' => 'Fusagasuga', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '52', 'name' => 'La Mesa', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '53', 'name' => 'Madrid', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '54', 'name' => 'Tocancipa', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '55', 'name' => 'Ubate', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '56', 'name' => 'Villeta', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '57', 'name' => 'Zipaquira', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '58', 'name' => 'San Jose del Guaviare', 'region_id' => '15']);
        DB::table('cities')->insert(['id' => '59', 'name' => 'Maicao', 'region_id' => '16']);
        DB::table('cities')->insert(['id' => '60', 'name' => 'Riohacha', 'region_id' => '16']);
        DB::table('cities')->insert(['id' => '61', 'name' => 'Cienaga', 'region_id' => '17']);
        DB::table('cities')->insert(['id' => '62', 'name' => 'El Banco Magdalena', 'region_id' => '17']);
        DB::table('cities')->insert(['id' => '63', 'name' => 'Santa Marta', 'region_id' => '17']);
        DB::table('cities')->insert(['id' => '64', 'name' => 'Acacias', 'region_id' => '18']);
        DB::table('cities')->insert(['id' => '65', 'name' => 'Granada', 'region_id' => '18']);
        DB::table('cities')->insert(['id' => '66', 'name' => 'Puerto Lopez', 'region_id' => '18']);
        DB::table('cities')->insert(['id' => '67', 'name' => 'Villavicencio', 'region_id' => '18']);
        DB::table('cities')->insert(['id' => '68', 'name' => 'Ipiales', 'region_id' => '19']);
        DB::table('cities')->insert(['id' => '69', 'name' => 'Pasto', 'region_id' => '19']);
        DB::table('cities')->insert(['id' => '70', 'name' => 'Tumaco', 'region_id' => '19']);
        DB::table('cities')->insert(['id' => '71', 'name' => 'Tuquerres', 'region_id' => '19']);
        DB::table('cities')->insert(['id' => '72', 'name' => 'Garzon', 'region_id' => '20']);
        DB::table('cities')->insert(['id' => '73', 'name' => 'Huila', 'region_id' => '20']);
        DB::table('cities')->insert(['id' => '74', 'name' => 'La plata', 'region_id' => '20']);
        DB::table('cities')->insert(['id' => '75', 'name' => 'Pitalito', 'region_id' => '20']);
        DB::table('cities')->insert(['id' => '76', 'name' => 'Cucuta', 'region_id' => '21']);
        DB::table('cities')->insert(['id' => '77', 'name' => 'Ocaña', 'region_id' => '21']);
        DB::table('cities')->insert(['id' => '78', 'name' => 'Pamplona', 'region_id' => '21']);
        DB::table('cities')->insert(['id' => '79', 'name' => 'San silvestre', 'region_id' => '21']);
        DB::table('cities')->insert(['id' => '80', 'name' => 'Puerto Asis', 'region_id' => '22']);
        DB::table('cities')->insert(['id' => '81', 'name' => 'Armenia', 'region_id' => '23']);
        DB::table('cities')->insert(['id' => '82', 'name' => 'Calarca', 'region_id' => '23']);
        DB::table('cities')->insert(['id' => '83', 'name' => 'Quimbaya', 'region_id' => '23']);
        DB::table('cities')->insert(['id' => '84', 'name' => 'Santa Rosa de Cabal', 'region_id' => '23']);
        DB::table('cities')->insert(['id' => '85', 'name' => 'Pereira', 'region_id' => '24']);
        DB::table('cities')->insert(['id' => '86', 'name' => 'San Andres', 'region_id' => '25']);
        DB::table('cities')->insert(['id' => '87', 'name' => 'B/bermeja', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '88', 'name' => 'Barbosa', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '89', 'name' => 'Bucaramanga', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '90', 'name' => 'Cimitarra', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '91', 'name' => 'Giron', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '92', 'name' => 'Piedecuesta', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '93', 'name' => 'San Gil', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '94', 'name' => 'Chaparral', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '95', 'name' => 'Espinal', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '96', 'name' => 'Girardot', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '97', 'name' => 'Honda', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '98', 'name' => 'Ibague', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '99', 'name' => 'Libano', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '100', 'name' => 'Mariquita', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '101', 'name' => 'Melgar', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '102', 'name' => 'Buenaventura', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '103', 'name' => 'Buga', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '104', 'name' => 'Caicedonia', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '105', 'name' => 'Cali', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '106', 'name' => 'Candelaria', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '107', 'name' => 'Cartago', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '108', 'name' => 'Cerrito', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '109', 'name' => 'Jamundi', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '110', 'name' => 'La union', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '111', 'name' => 'Palmira', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '112', 'name' => 'Roldanillo', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '113', 'name' => 'Sevilla', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '114', 'name' => 'Tulua', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '115', 'name' => 'Yumbo', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '116', 'name' => 'Zarzal', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '117', 'name' => 'Caqueta', 'region_id' => '8']);
        DB::table('cities')->insert(['id' => '118', 'name' => 'Floridablanca', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '119', 'name' => 'Mocoa', 'region_id' => '22']);

    }
}
