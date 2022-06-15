<?php

namespace Database\Seeders;

use App\Models\Origen;
use App\Models\Producto;
use App\Models\Sesion;
use App\Models\Tratamiento;
use App\Models\Visita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Origen::factory(3)->Create();
        $this->call(UserSeeder::class);            /*necesita origen - pone usuario administrador y busca los factorys restantes */
        Visita::factory(6)->Create();              /*sin campos foraneos */ 
        Producto::factory(6)->Create();            /*necesita visita ponerlo detras */ 
        Tratamiento::factory(6)->Create();         /*necesita visita ponerlo detras */ 
        $this->call(TratamientoSeeder::class);     /*rellena la tabla intermedia tratamiento_visita */
        $this->call(ProductoSeeder::class);        /*rellena la tabla intermedia producto_visita */
        Sesion::factory(12)->Create();
       
    }
}
