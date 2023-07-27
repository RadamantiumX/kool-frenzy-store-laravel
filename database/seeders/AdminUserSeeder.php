<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

       User::create([
            'name' => 'KevinAdmin',
            'email'=> 'kevin@kf-admin.com',
            'password' => bcrypt('J%8SK45rZLEj'),
            'email_verified_at'=> now(),
            'is_admin'=> true
        ]);
    }
}
