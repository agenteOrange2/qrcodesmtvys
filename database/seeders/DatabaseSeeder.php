<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,            
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Elliot',                        
            'last_name' => 'Alderson',               
            'email' => 'frontend@kuiraweb.com',
            'phone' => '081234567890',                    
            'password' => bcrypt('Password'),
        ]);
    }
}
