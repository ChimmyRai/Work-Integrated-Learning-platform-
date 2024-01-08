<?php

namespace Database\Factories;
use App\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $user = \App\Models\User::factory()->create([
        //     'userType' => 'inP'
        // ]);

       
        return [
            'title' => fake()->name(),
            // 'user_id' => $user->id,
            'description'=>fake()->text(200),
            'number_of_student' => fake()->numberBetween(3, 6),
            'trimester' => fake()->numberBetween(1, 3),
            'year' => fake()->numberBetween(2022, 2024),
            
        ];
    }
}
