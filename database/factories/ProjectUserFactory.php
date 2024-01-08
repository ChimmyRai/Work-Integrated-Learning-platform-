<?php

namespace Database\Factories;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectUserFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'project_id' => Project::factory(),
            'user_id' => User::factory(),
            'role' => $this->faker->randomElement(['applicant', 'creator']),
        ];
    }
}
