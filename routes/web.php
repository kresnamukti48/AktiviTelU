<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\UkmController;

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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function() {
    Route::resource('basic', BasicController::class);
    Route::middleware(['role:Admin'])->prefix('ukm')->group(function () {
        Route::get('/', [UkmController::class, 'index'])->name('ukms.index');
        Route::get('/create', [UkmController::class, 'create'])->name('ukms.create');       
        Route::get('{id}', [UkmController::class, 'show'])->name('ukms.show');      
        Route::post('/', [UkmController::class, 'store'])->name('ukms.store');      
        Route::get('{id}/edit', [UkmController::class, 'edit'])->name('ukms.edit');
        Route::put('{id}', [UkmController::class, 'update'])->name('ukms.update');   
        Route::delete('{id}', [UkmController::class, 'destroy'])->name('ukms.destroy');
    });
});
