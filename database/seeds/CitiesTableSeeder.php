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
        DB::table('cities')->insert(['id' => '1', 'name' => 'ACACIAS', 'region_id' => '18']);
        DB::table('cities')->insert(['id' => '2', 'name' => 'AGUACHICA', 'region_id' => '11']);
        DB::table('cities')->insert(['id' => '3', 'name' => 'AGUAZUL', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '4', 'name' => 'ANSERMA', 'region_id' => '7']);
        DB::table('cities')->insert(['id' => '5', 'name' => 'APARTADO', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '6', 'name' => 'ARAUCA', 'region_id' => '3']);
        DB::table('cities')->insert(['id' => '7', 'name' => 'ARMENIA', 'region_id' => '23']);
        DB::table('cities')->insert(['id' => '8', 'name' => 'BARBOSA', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '9', 'name' => 'BARRANCABERMEJA', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '10', 'name' => 'BARRANQUILLA', 'region_id' => '4']);
        DB::table('cities')->insert(['id' => '11', 'name' => 'BELLO', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '12', 'name' => 'BOGOTA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '13', 'name' => 'BUCARAMANGA', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '14', 'name' => 'BUENAVENTURA', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '15', 'name' => 'BUGA', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '16', 'name' => 'CAICEDONIA', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '17', 'name' => 'CAJICA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '18', 'name' => 'CALARCA', 'region_id' => '23']);
        DB::table('cities')->insert(['id' => '19', 'name' => 'CALDAS', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '20', 'name' => 'CALI', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '21', 'name' => 'CANDELARIA', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '22', 'name' => 'Florencia', 'region_id' => '8']);
        DB::table('cities')->insert(['id' => '23', 'name' => 'CARTAGENA', 'region_id' => '5']);
        DB::table('cities')->insert(['id' => '24', 'name' => 'CARTAGO', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '25', 'name' => 'CAUCASIA', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '26', 'name' => 'CHAPARRAL', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '27', 'name' => 'CHIA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '28', 'name' => 'CHINCHINA', 'region_id' => '7']);
        DB::table('cities')->insert(['id' => '29', 'name' => 'CHIQUINQUIRA', 'region_id' => '6']);
        DB::table('cities')->insert(['id' => '30', 'name' => 'CIENAGA', 'region_id' => '17']);
        DB::table('cities')->insert(['id' => '31', 'name' => 'CIMITARRA', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '32', 'name' => 'COPACABANA', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '33', 'name' => 'CUCUTA', 'region_id' => '21']);
        DB::table('cities')->insert(['id' => '34', 'name' => 'DOSQUEBRADAS', 'region_id' => '24']);
        DB::table('cities')->insert(['id' => '35', 'name' => 'DUITAMA', 'region_id' => '6']);
        DB::table('cities')->insert(['id' => '36', 'name' => 'EL BANCO', 'region_id' => '17']);
        DB::table('cities')->insert(['id' => '37', 'name' => 'EL CARMEN DE VIBORAL', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '38', 'name' => 'EL CERRITO', 'region_id' => '29']);
        DB::table('cities')->insert(['id' => '39', 'name' => 'EL COLEGIO', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '40', 'name' => 'ENVIGADO', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '41', 'name' => 'ESPINAL', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '42', 'name' => 'FACATATIVA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '43', 'name' => 'FLORENCIA', 'region_id' => '8']);
        DB::table('cities')->insert(['id' => '44', 'name' => 'FLORIDABLANCA', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '45', 'name' => 'FUNZA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '46', 'name' => 'FUSAGASUGA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '47', 'name' => 'GARZON', 'region_id' => '20']);
        DB::table('cities')->insert(['id' => '48', 'name' => 'GIRARDOT', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '49', 'name' => 'GIRARDOTA', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '50', 'name' => 'GIRON', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '51', 'name' => 'GRANADA', 'region_id' => '18']);
        DB::table('cities')->insert(['id' => '52', 'name' => 'HONDA', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '53', 'name' => 'IBAGUE', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '54', 'name' => 'IPIALES', 'region_id' => '19']);
        DB::table('cities')->insert(['id' => '55', 'name' => 'ITAGUI', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '56', 'name' => 'JAMUNDI', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '57', 'name' => 'LA CEJA', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '58', 'name' => 'LA DORADA', 'region_id' => '7']);
        DB::table('cities')->insert(['id' => '59', 'name' => 'LA ESTRELLA', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '60', 'name' => 'LA MESA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '61', 'name' => 'LA PLATA', 'region_id' => '20']);
        DB::table('cities')->insert(['id' => '62', 'name' => 'LA UNION', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '63', 'name' => 'LETICIA', 'region_id' => '1']);
        DB::table('cities')->insert(['id' => '64', 'name' => 'LIBANO', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '65', 'name' => 'LORICA', 'region_id' => '13']);
        DB::table('cities')->insert(['id' => '66', 'name' => 'MADRID', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '67', 'name' => 'MAICAO', 'region_id' => '16']);
        DB::table('cities')->insert(['id' => '68', 'name' => 'MANIZALES', 'region_id' => '7']);
        DB::table('cities')->insert(['id' => '69', 'name' => 'MARINILLA', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '70', 'name' => 'MARIQUITA', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '71', 'name' => 'MEDELLIN', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '72', 'name' => 'MELGAR', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '73', 'name' => 'MOCOA', 'region_id' => '22']);
        DB::table('cities')->insert(['id' => '74', 'name' => 'MONTELIBANO', 'region_id' => '13']);
        DB::table('cities')->insert(['id' => '75', 'name' => 'MONTERIA', 'region_id' => '13']);
        DB::table('cities')->insert(['id' => '76', 'name' => 'NEIVA', 'region_id' => '20']);
        DB::table('cities')->insert(['id' => '77', 'name' => 'OCAÑA', 'region_id' => '21']);
        DB::table('cities')->insert(['id' => '78', 'name' => 'PALMIRA', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '79', 'name' => 'PAMPLONA', 'region_id' => '21']);
        DB::table('cities')->insert(['id' => '80', 'name' => 'PASTO', 'region_id' => '19']);
        DB::table('cities')->insert(['id' => '81', 'name' => 'PAZ DE ARIPORO', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '82', 'name' => 'PEREIRA', 'region_id' => '24']);
        DB::table('cities')->insert(['id' => '83', 'name' => 'PEREIRA', 'region_id' => '24']);
        DB::table('cities')->insert(['id' => '84', 'name' => 'PIEDECUESTA', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '85', 'name' => 'PITALITO', 'region_id' => '20']);
        DB::table('cities')->insert(['id' => '86', 'name' => 'POPAYAN', 'region_id' => '10']);
        DB::table('cities')->insert(['id' => '87', 'name' => 'PUERTO ASIS', 'region_id' => '22']);
        DB::table('cities')->insert(['id' => '88', 'name' => 'PUERTO BERRIO', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '89', 'name' => 'PUERTO BOYACA', 'region_id' => '6']);
        DB::table('cities')->insert(['id' => '90', 'name' => 'PUERTO LOPEZ', 'region_id' => '18']);
        DB::table('cities')->insert(['id' => '91', 'name' => 'QUIBDO', 'region_id' => '12']);
        DB::table('cities')->insert(['id' => '92', 'name' => 'QUIMBAYA', 'region_id' => '23']);
        DB::table('cities')->insert(['id' => '93', 'name' => 'RIOHACHA', 'region_id' => '16']);
        DB::table('cities')->insert(['id' => '94', 'name' => 'RIONEGRO', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '95', 'name' => 'ROLDANILLO', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '96', 'name' => 'SABANALARGA', 'region_id' => '4']);
        DB::table('cities')->insert(['id' => '97', 'name' => 'SABANETA', 'region_id' => '2']);
        DB::table('cities')->insert(['id' => '98', 'name' => 'SAHAGÚN', 'region_id' => '13']);
        DB::table('cities')->insert(['id' => '99', 'name' => 'SAN ANDRES', 'region_id' => '25']);
        DB::table('cities')->insert(['id' => '100', 'name' => 'SAN ANDRES DE TUMACO', 'region_id' => '19']);
        DB::table('cities')->insert(['id' => '101', 'name' => 'SAN GIL', 'region_id' => '26']);
        DB::table('cities')->insert(['id' => '102', 'name' => 'SAN JOSE DEL GUAVIARE', 'region_id' => '15']);
        DB::table('cities')->insert(['id' => '103', 'name' => 'SANTA MARTA', 'region_id' => '17']);
        DB::table('cities')->insert(['id' => '104', 'name' => 'SANTA ROSA DE CABAL', 'region_id' => '23']);
        DB::table('cities')->insert(['id' => '105', 'name' => 'SANTANDER DE QUILICHAO', 'region_id' => '10']);
        DB::table('cities')->insert(['id' => '106', 'name' => 'SANTO TOMAS', 'region_id' => '4']);
        DB::table('cities')->insert(['id' => '107', 'name' => 'SARAVENA', 'region_id' => '3']);
        DB::table('cities')->insert(['id' => '108', 'name' => 'SEVILLA', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '109', 'name' => 'SINCELEJO', 'region_id' => '27']);
        DB::table('cities')->insert(['id' => '110', 'name' => 'SOACHA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '111', 'name' => 'SOGAMOSO', 'region_id' => '6']);
        DB::table('cities')->insert(['id' => '112', 'name' => 'SOLEDAD', 'region_id' => '4']);
        DB::table('cities')->insert(['id' => '113', 'name' => 'TAME', 'region_id' => '3']);
        DB::table('cities')->insert(['id' => '114', 'name' => 'TOCANCIPA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '115', 'name' => 'TULUA', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '116', 'name' => 'TUNJA', 'region_id' => '6']);
        DB::table('cities')->insert(['id' => '117', 'name' => 'TUQUERRES', 'region_id' => '19']);
        DB::table('cities')->insert(['id' => '118', 'name' => 'UBATE', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '119', 'name' => 'VALLEDUPAR', 'region_id' => '11']);
        DB::table('cities')->insert(['id' => '120', 'name' => 'VILLAVICENCIO', 'region_id' => '18']);
        DB::table('cities')->insert(['id' => '121', 'name' => 'VILLETA', 'region_id' => '14']);
        DB::table('cities')->insert(['id' => '122', 'name' => 'YOPAL', 'region_id' => '9']);
        DB::table('cities')->insert(['id' => '123', 'name' => 'YUMBO', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '124', 'name' => 'ZARZAL', 'region_id' => '28']);
        DB::table('cities')->insert(['id' => '125', 'name' => 'ZIPAQUIRA', 'region_id' => '14']);

    }
}
