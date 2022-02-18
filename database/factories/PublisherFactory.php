<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->company();
        $slug = str_replace(' ', '-', $name);
        return [
            'name' => $name,
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'slug' => $slug,
            'logo' => $this->faker->randomElement(['company.png', 'company 2.png'])
        ];
    }
}
