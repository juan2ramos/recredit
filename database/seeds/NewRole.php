<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class NewRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Documentary']);

        $SuperAdmin = User::create([
            'name' => 'Analista',
            'last_name' => 'Documental',
            'email' => 'documental@lilipink.com',
            'password' => bcrypt('1234567'),
            'document_type' => 'Cédula de ciudadanía',
            'document' => '80921502',
            'verification_code' => '',
            'verification_state' => 0,
        ]);
        $SuperAdmin->assignRole('Documentary');
    }
}
