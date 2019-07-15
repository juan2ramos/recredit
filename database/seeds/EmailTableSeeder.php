<?php

use Illuminate\Database\Seeder;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert([ 'name' => 'gmail.com']);
        DB::table('emails')->insert([ 'name' => 'hotmail.com']);
        DB::table('emails')->insert([ 'name' => 'mail.com']);
        DB::table('emails')->insert([ 'name' => 'outlook.com']);
        DB::table('emails')->insert([ 'name' => 'yahoo.es']);
        DB::table('emails')->insert([ 'name' => 'yahoo.com']);
        DB::table('emails')->insert([ 'name' => 'otro']);
    }
}
