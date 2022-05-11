<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage; //crear directorio cursos almacenar imagenes

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        Storage::deleteDirectory('public/courses'); //borrar el directorio en la ruta correcta public\storage\cursos storage\app\cursos
        Storage::makeDirectory('public/courses'); //mkdir en storage me lo crea en esta ruta C:\xampp\htdocs\app-cursos\storage\app\cursos

        // \App\Models\User::factory(10)->create();
        //llamada al seeder correspondiente 
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
    }
}
