<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use App\Models\Point;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'Analysts']);
        Role::create(['name' => 'Point']);
        Role::create(['name' => 'Credit']);
        Role::create(['name' => 'Entrepreneur']);

        $SuperAdmin = User::create([
            'name' => 'Juan Carlos',
            'last_name' => 'Ramos pinto',
            'email' => 'juan2ramos@gmail.com',
            'password' => bcrypt('1234567'),
            'document_type' => 'Cédula',
            'document' => '80921505',
            'verification_code' => '',
            'verification_state' => 0,
        ]);
        $SuperAdmin->assignRole('SuperAdmin');

        $SuperAdmin = User::create([
            'name' => 'Jeimmy',
            'last_name' => 'Fonseca',
            'email' => 'carteralilipink@lilipink.com',
            'password' => bcrypt('1234567'),
            'document_type' => 'Cédula',
            'document' => '1234567',
            'verification_code' => '',
            'verification_state' => 0,
        ]);
        $SuperAdmin->assignRole('SuperAdmin');


    }
}
