<?php

namespace Database\Factories;

use App\Models\UserAuth;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=UserData>
 */
class UserDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "date_of_birth" => $this->faker->date,
            "name" => $this->faker->name,
            "lastname" => $this->faker->lastName,
            "user_auth_id" => UserAuth::factory(),
        ];
    }
}
