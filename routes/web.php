<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DosenController;
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

    Route::middleware(['role:Admin|Pengurus'])->prefix('member')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('members.index');
        Route::get('/create', [MemberController::class, 'create'])->name('members.create');       
        Route::get('{id}', [MemberController::class, 'show'])->name('members.show');      
        Route::post('/', [MemberController::class, 'store'])->name('members.store');      
        Route::get('{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
        Route::put('{id}', [MemberController::class, 'update'])->name('members.update');   
        Route::delete('{id}', [MemberController::class, 'destroy'])->name('members.destroy'); 
    });

    Route::middleware(['role:Admin'])->prefix('dosen')->group(function () {
        Route::get('/', [DosenController::class, 'index'])->name('dosens.index');
        Route::get('/create', [DosenController::class, 'create'])->name('dosens.create');       
        Route::get('{id}', [DosenController::class, 'show'])->name('dosens.show');      
        Route::post('/', [DosenController::class, 'store'])->name('dosens.store');      
        Route::get('{id}/edit', [DosenController::class, 'edit'])->name('dosens.edit');
        Route::put('{id}', [DosenController::class, 'update'])->name('dosens.update');   
        Route::delete('{id}', [DosenController::class, 'destroy'])->name('dosens.destroy');
    });
});
