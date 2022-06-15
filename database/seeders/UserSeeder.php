<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlos',
            'apellido' =>'Segué Giménez',
            'tfno' => '(888) 937-7238',
            'email'=> 'csg@hotmail.com',
            'origen_id'=> '1',
            'rol'=>'administrador',
            'cont'=>'0',
            'password' => bcrypt('11111111')
        ]);
        User::factory(5)->create();
    }
}
