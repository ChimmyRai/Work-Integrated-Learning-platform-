<?php

namespace Database\Seeders;
use Database\Factories\ProjectOfferingFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Project::factory(20)->create();

        // Seed a single teacher user
        \App\Models\User::create([
          'name' => 'David Chen',
          'email' => 'teacher@example.com',
          'userType'=>'teacher',
          'status'=>'approved',
          'email_verified_at'=> Carbon::today()->toDateString(),
          'password' => bcrypt('password'), // You can use bcrypt() or Hash::make() to hash passwords
      ]);

       
       

        
       
    }
}
