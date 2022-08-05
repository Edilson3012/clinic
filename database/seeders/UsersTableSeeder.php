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
        $rand = rand(
            0,
            999
        );
        DB::table('users')->insert(
            [
                'name' => "Admin Admin" . $rand,
                'email' => "admin" . $rand . "@paper.com",
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('users')->insert(
            [
                'name' => "Edilson Murbach" . $rand,
                'email' => "edilsongotardi" . $rand . "@live.com",
                // 'email' => "edilsongotardi@live.com",
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        );

        DB::table('medical_appointment')->insert([
            'name' => "Erminho" . $rand,
            'email' => "emerson" . $rand . "@teste.com",
            'date_appointment' => date('Y-m-d H:i:s'),
            'description' => 'agendamento teste',
            'state' => true,
        ]);
    }
}
