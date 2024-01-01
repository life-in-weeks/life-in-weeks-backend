<?php

namespace Database\Factories;

use App\Models\UserAuth;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserAuth::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
    }
}
