<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => "Admin Admin",
                'email' => "admin@paper.com",
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('medical_appointment')->insert([
            'name' => "Joao da silva",
            'email' => "joao@teste.com",
            'date_appointment' => date('Y-m-d H:i:s'),
            'description' => 'agendamento teste',
            'state' => true,
        ]);
    }
}
