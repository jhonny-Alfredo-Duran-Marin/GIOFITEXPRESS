<?php

use App\Http\Controllers\administracion\SuscripcionController;
use App\Http\Controllers\usuarios\PermissionController;
use App\Http\Controllers\usuarios\RoleController;
use App\Http\Controllers\usuarios\UserRoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarios\PersonaController;
use App\Http\Controllers\disciplinas\SalaController;
use App\Http\Controllers\disciplinas\DisciplinaController;
use App\Http\Controllers\disciplinas\HorarioController;
use App\Http\Controllers\disciplinas\ReservaController;
use App\Http\Controllers\administracion\PromocionController;
use App\Http\Controllers\seguimiento\AntecedentesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('dashboard');
})->name('home');

Route::middleware(['auth', 'system.access'])->group(function () {
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('roles.index')
        ->middleware('permission:roles.view');
    Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('roles.create')
        ->middleware('permission:roles.create');
    Route::post('/admin/roles', [RoleController::class, 'store'])->name('roles.store')
        ->middleware('permission:roles.create');
    Route::get('/admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit')
        ->middleware('permission:roles.update');
    Route::put('/admin/roles/{role}', [RoleController::class, 'update'])->name('roles.update')
        ->middleware('permission:roles.update');
    Route::delete('/admin/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy')
        ->middleware('permission:roles.delete');
    Route::get('/admin/permisos', [PermissionController::class, 'index'])->name('permissions.index')
        ->middleware('permission:permissions.view');
    Route::get('/admin/permisos/create', [PermissionController::class, 'create'])->name('permissions.create')
        ->middleware('permission:permissions.create');
    Route::post('/admin/permisos', [PermissionController::class, 'store'])->name('permissions.store')
        ->middleware('permission:permissions.create');
    Route::get('/admin/permisos/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit')
        ->middleware('permission:permissions.update');
    Route::put('/admin/permisos/{permission}', [PermissionController::class, 'update'])->name('permissions.update')
        ->middleware('permission:permissions.update');
    Route::delete('/admin/permisos/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy')
        ->middleware('permission:permissions.delete');
    Route::get('/admin/usuarios-roles', [UserRoleController::class, 'index'])->name('users.roles.index')
        ->middleware('permission:roles.view');
    Route::get('/admin/usuarios-roles/{user}/edit', [UserRoleController::class, 'edit'])->name('users.roles.edit')
        ->middleware('permission:roles.update');
    Route::put('/admin/usuarios-roles/{user}', [UserRoleController::class, 'update'])->name('users.roles.update')
        ->middleware('permission:roles.update');


    Route::resource('personas', PersonaController::class);

    Route::resource('suscripciones', SuscripcionController::class);


    Route::resource('salas', SalaController::class);
    Route::resource('disciplinas', DisciplinaController::class);
    Route::resource('horarios', HorarioController::class);

    Route::resource('reservas', ReservaController::class);

    Route::resource('promociones', PromocionController::class);


    Route::resource('antecedentes', AntecedentesController::class);
});
