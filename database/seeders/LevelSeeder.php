<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name'=>'Nivel básico'
        ]);
        Level::create([
            'name'=>'Nivel intermedio'
        ]);
        Level::create([
            'name'=>'Nivel avanzado'
        ]);
    }
}
