<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ExpoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\QrScanController;



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

Route::get('scan' , function(){
    return view('admin.scanner.scan');
})->name('scan');

Route::resource('users', UserController::class);

// Registrar 'usuarios-capturados' como resource completo
Route::resource('usuarios-capturados', QrScanController::class);


Route::resource('expos', ExpoController::class);

