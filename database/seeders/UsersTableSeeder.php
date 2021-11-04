<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2021-02-12 13:23:43',
                'mobile'             => '0785446262',
                'verification_token' => '',
            ],
            [
                'id'                 => 2,
                'name'               => 'Belyse',
                'email'              => 'belyse@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2021-02-12 13:23:43',
                'mobile'             => '0787056707',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
