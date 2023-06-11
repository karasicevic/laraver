<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Project;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
                    'title' => fake()->sentence(),
                    'description' => fake()->paragraph(),
                    'done'=>fake()->boolean(),
                    'user_id' => User::factory(),
                    'project_id' => Project::factory(),
                    'created_at' => now(), 
                ];
            }
}
