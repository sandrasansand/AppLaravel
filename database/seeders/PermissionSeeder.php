<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear cursos',
        ]);
        Permission::create([
            'name' => 'Leer cursos',
        ]);
        Permission::create([
            'name' => 'Actualizar cursos',
        ]);
        Permission::create([
            'name' => 'Eliminar cursos',
        ]);
        Permission::create([
            'name' => 'Ver dashboard',
        ]);
        Permission::create([
            'name' => 'Crear role',
        ]);
        Permission::create([
            'name' => 'Listar role',
        ]);
        Permission::create([
            'name' => 'Editar role',
        ]);
        Permission::create([
            'name' => 'Eliminar role',
        ]);
        Permission::create([
            'name' => 'Leer usuarios',
        ]);
        Permission::create([
            'name' => 'Editar usuarios',
        ]);
    }
}
