<?php

namespace Database\Seeders;

use App\Models\Visita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
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
            
        //Añadimos dos productos a cada visita en la tabla intermedia
        $visita->productos()->attach([
            rand(1, 3),
            rand(4, 6)
        ]);
        }
    }
}
