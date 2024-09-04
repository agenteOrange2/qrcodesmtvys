<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ExpoController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\QrScanController;
use App\Http\Controllers\Admin\PermissionController;




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
Route::get('scan' , function(){ return view('admin.scanner.scan'); })->name('scan');


/* ****************************** */
/* **** CRUD ROLES ***** */
/* ****************************** */
Route::resource('roles', RoleController::class);

Route::resource('permissions', PermissionController::class);


/* ****************************** */
/* **** CRUD USERS ***** */
/* ****************************** */

Route::resource('users', UserController::class);


/* ****************************** */
/* **** CRUD USUARIOS ESCANEADOS ***** */
/* ****************************** */
// Registrar 'usuarios-capturados' como resource completo
Route::resource('usuarios-capturados', QrScanController::class);


Route::resource('expos', ExpoController::class);

});