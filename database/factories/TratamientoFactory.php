<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tratamiento>
 */
class TratamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "codtra"=> rand(100,900),
            "tratamiento"=> $this->faker->sentence(2),
            "descripcion"=> $this->faker->sentence(3),
            "pretrat"=> rand(100,200),
        ];
    }
}
