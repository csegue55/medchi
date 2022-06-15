<?php

namespace Database\Factories;

use App\Models\Visita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sesion>
 */
class SesionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "fecha"=> date($format = 'Y-m-d'),
            "visita_id"=> Visita::all()->random()->id,
        ];
    }
}
