<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstname(),
            'slug' => $this->faker->unique()->slug(2, false),
            'lastname' => $this->faker->lastname(),
            'image' => $this->faker->randomElement(['john doe.png', 'john doe 2.png'])
        ];
    }
}
