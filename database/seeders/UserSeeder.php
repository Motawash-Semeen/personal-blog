<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'name' => 'Tonmoy Chowdhury',
                'email' => 'tonmoy@gmail.com',
                'password' => md5('tonmoy@gmail.com'),

        ]);
    }
}
