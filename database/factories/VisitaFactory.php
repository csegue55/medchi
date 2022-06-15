<?php

namespace Database\Factories;

use App\Models\Origen;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visita>
 */
class VisitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "fecha"=> date($format='Y-m-d'),
            'user_id'=> User::all()->random()->id,
            "sintomas"=> $this->faker->sentence(3),
            'observaciones'=> $this->faker->sentence(10),
        ];
    }
}
