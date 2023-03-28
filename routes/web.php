<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramareController;
use App\Http\Controllers\ConsultantController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/create_programare', [ProgramareController::class,'create'])->name('create_programare');
Route::post('/store_programare', [ProgramareController::class,'store'])->name('store_programare');
Route::get('/getOreJson/{consultant}/{data}', [ProgramareController::class,'getOreJson'])->name('getOreJson');

Route::resource('consultant', ConsultantController::class);




