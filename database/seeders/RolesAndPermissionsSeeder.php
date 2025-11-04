<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Limpia cache de permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permisos base (ajusta o agrega los de tus módulos)
        $permisos = [
            'access.system', // <- controla ingreso al sistema
            // Usuarios
            'users.view',
            'users.create',
            'users.update',
            'users.delete',
            // Roles
            'roles.view',
            'roles.create',
            'roles.update',
            'roles.delete',
            // Permisos
            'permissions.view',
            'permissions.create',
            'permissions.update',
            'permissions.delete',

            'referrals.view',
            'referrals.create',
            'referrals.update',
            'referrals.delete',


            'personas.view',
            'personas.create',
            'personas.update',
            'personas.delete',

            'disciplinas.view',
            'disciplinas.create',
            'disciplinas.update',
            'disciplinas.delete',

            'salas.view',
            'salas.create',
            'salas.update',
            'salas.delete',

            'horarios.view',
            'horarios.create',
            'horarios.update',
            'horarios.delete',

            'suscripciones.view',
            'suscripciones.create',
            'suscripciones.update',
            'suscripciones.delete',

            'reservas.view',
            'reservas.create',
            'reservas.update',
            'reservas.delete',

            'promociones.view',
            'promociones.create',
            'promociones.update',
            'promociones.delete',

            'antecedentes.view',
            'antecedentes.create',
            'antecedentes.update',
            'antecedentes.delete',


        ];

        foreach ($permisos as $p) {
            Permission::findOrCreate($p);
        }

        // Roles
        $admin    = Role::findOrCreate('admin');
        $entrenador  = Role::findOrCreate('entrenador');
        $cliente = Role::findOrCreate('cliente');


        // Qué puede cada rol
        $admin->syncPermissions(Permission::all());

        $entrenador->syncPermissions([
            'access.system',
            'users.view',
            'roles.view',
            'referrals.view',
            'referrals.create',
            'referrals.update',
        ]);

        $cliente->syncPermissions([
            'access.system',
            'referrals.view',
            'referrals.create',
        ]);


        // Crear/actualizar Super Admin
        $adminEmail = env('SUPERADMIN_EMAIL', 'admin@example.com');
        $adminPass  = env('SUPERADMIN_PASSWORD', 'secret123'); // cámbialo en .env

        $superAdmin = User::query()->firstOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Super Admin',     // ajusta según tu esquema (name/first_name/last_name)
                'password' => Hash::make($adminPass),
                'email_verified_at' => now(), // opcional
            ]
        );

        // Asegurar que tiene rol admin
        $superAdmin->syncRoles(['admin']);
    }
}
