<?php

namespace Database\Seeders;

use App\Models\Visita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visitas= Visita::all();
        foreach ($visitas as $visita){
            
        //Añadimos dos tratamientos a cada visita en la tabla intermedia
        $visita->tratamientos()->attach([
            rand(1, 3),
            rand(4, 6)
        ]);
        }

    }
}
