<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        User::create([
        'username' => 'admin',
        'password' => bcrypt('password'),
        'phone' => '085741621113',
        'address' => 'Purbalingga',
        'status' => 'active',
        'role_id' => '1',

        'username' => 'client',
        'password' => bcrypt('password'),
        'phone' => '085741621113',
        'address' => 'Purbalingga',
        'status' => 'inactive',
        'role_id' => '2',

        'username' => 'clientt',
        'password' => bcrypt('password'),
        'phone' => '085741621113',
        'address' => 'Purbalingga',
        'status' => 'active',
        'role_id' => '2',

       ]);
    }
}
