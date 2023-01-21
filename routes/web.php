<?php

use App\Http\Controllers\materiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//materias
Route::get('/materias',[materiaController::class,'index'])->name('materia');
Route::get('/materias/nueva',[materiaController::class,'nueva'])->name('nueva.materia');
Route::post('/materias/nueva',[materiaController::class,'agregar'])->name('agregar.materia');

require __DIR__.'/auth.php';
