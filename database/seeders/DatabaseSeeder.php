<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

      \App\Models\User::create([
            'name' => 'Eduardo',
            'email'=> 'edu@example.com',
            'password' => bcrypt('admin123'),
            'email_verified_at'=> now(),
            'is_admin'=> true
        ]);

      // Product::factory(30)->create();
       //Country::factory(10)->create();

       /*Country::create(
        ['code' => 'ARG', 'name' => 'Argentina']);*/
       
    
        
    }
}
