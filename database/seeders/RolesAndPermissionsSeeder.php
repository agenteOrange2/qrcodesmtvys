<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos con guard_name
        Permission::create(['name' => 'Dashboard', 'guard_name' => 'web']);
        Permission::create(['name' => 'Escaneo', 'guard_name' => 'web']);
        Permission::create(['name' => 'Usuarios Escaneados', 'guard_name' => 'web']);
        Permission::create(['name' => 'Usuarios', 'guard_name' => 'web']);
        Permission::create(['name' => 'Roles', 'guard_name' => 'web']);

        // Crear roles con guard_name y asignar permisos
        $superAdmin = Role::create(['name' => 'superAdmin', 'guard_name' => 'web']);
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $exhibidor = Role::create(['name' => 'exhibidor', 'guard_name' => 'web']);

        // Asignar permisos a superAdmin
        $superAdmin->givePermissionTo(Permission::all());

        // Asignar permisos específicos a admin
        $admin->givePermissionTo(['Dashboard', 'Escaneo', 'Usuarios Escaneados', 'Usuarios', 'Roles']);

        // Asignar permisos a exhibidor
        $exhibidor->givePermissionTo(['Dashboard', 'Escaneo', 'Usuarios Escaneados']);
    }
}
