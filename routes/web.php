<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\SliderController::class,'index']);
Route::resource('/slider',\App\Http\Controllers\SliderController::class)->parameters(['slider'=>'id']);
Route::delete('/slider/soft/{id}',[\App\Http\Controllers\SliderController::class,'softDelete'])->name('slider.soft');
Route::get('/trash',[\App\Http\Controllers\SliderController::class,'trash'])->name('slider.trash');
Route::delete('/slider/force/{id}',[\App\Http\Controllers\SliderController::class,'forcedelete'])->name('slider.force');
Route::patch('/restore/{id}',[\App\Http\Controllers\SliderController::class,'restore'])->name('slider.restore');
Auth::routes();

