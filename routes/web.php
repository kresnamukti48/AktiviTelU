<?php  

use Illuminate\Support\Facades\Route;  
use Spatie\Permission\Models\Role;  
use App\Http\Controllers\UkmController;  
use App\Http\Controllers\MemberController;  
use App\Http\Controllers\DosenController;  
use App\Http\Controllers\KegiatanUkmController;  
use App\Http\Controllers\EventController; 
use App\Http\Controllers\TicketController; 

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
        Route::get('/export', [MemberController::class, 'export'])->name('members.export');  
        Route::get('/', [MemberController::class, 'index'])->name('members.index');  
        Route::get('/create', [MemberController::class, 'create'])->name('members.create');       
        Route::get('{id}', [MemberController::class, 'show'])->name('members.show');      
        Route::post('/', [MemberController::class, 'store'])->name('members.store');      
        Route::get('{id}/edit', [MemberController::class, 'edit'])->name('members.edit');  
        Route::put('{id}', [MemberController::class, 'update'])->name('members.update');   
        Route::delete('{id}', [MemberController::class, 'destroy'])->name('members.destroy');   
    });  

    Route::middleware(['role:Admin'])->prefix('dosen')->group(function () {  
        Route::get('/export', [DosenController::class, 'export'])->name('dosens.export');
        Route::get('/', [DosenController::class, 'index'])->name('dosens.index');  
        Route::get('/create', [DosenController::class, 'create'])->name('dosens.create');       
        Route::get('{id}', [DosenController::class, 'show'])->name('dosens.show');      
        Route::post('/', [DosenController::class, 'store'])->name('dosens.store');      
        Route::get('{id}/edit', [DosenController::class, 'edit'])->name('dosens.edit');  
        Route::put('{id}', [DosenController::class, 'update'])->name('dosens.update');   
        Route::delete('{id}', [DosenController::class, 'destroy'])->name('dosens.destroy');  
    });  

    Route::middleware(['role:Admin|Pengurus'])->prefix('kegiatan')->group(function () {
        Route::get('/export', [KegiatanUkmController::class, 'export'])->name('kegiatans.export');
        Route::get('/', [KegiatanUkmController::class, 'index'])->name('kegiatans.index');  
        Route::get('/create', [KegiatanUkmController::class, 'create'])->name('kegiatans.create');       
        Route::get('{id}', [KegiatanUkmController::class, 'show'])->name('kegiatans.show');      
        Route::post('/', [KegiatanUkmController::class, 'store'])->name('kegiatans.store');      
        Route::get('{id}/edit', [KegiatanUkmController::class, 'edit'])->name('kegiatans.edit');  
        Route::put('{id}', [KegiatanUkmController::class, 'update'])->name('kegiatans.update');   
        Route::delete('{id}', [KegiatanUkmController::class, 'destroy'])->name('kegiatans.destroy');  
    });  

    Route::middleware(['role:Admin|Pengurus'])->prefix('event')->group(function () {  
        Route::get('/export', [EventController::class, 'export'])->name('events.export');  
        Route::get('/', [EventController::class, 'index'])->name('events.index');  
        Route::get('/create', [EventController::class, 'create'])->name('events.create');       
        Route::get('{id}', [EventController::class, 'show'])->name('events.show');      
        Route::post('/', [EventController::class, 'store'])->name('events.store');      
        Route::get('{id}/edit', [EventController::class, 'edit'])->name('events.edit');  
        Route::put('{id}', [EventController::class, 'update'])->name('events.update');   
        Route::delete('{id}', [EventController::class, 'destroy'])->name('events.destroy');  
    });

    Route::middleware(['role:Admin|Pengurus'])->prefix('ticket')->group(function () {
        Route::get('/export', [TicketController::class, 'export'])->name('tickets.export');
        Route::get('/', [TicketController::class, 'index'])->name('tickets.index');
        Route::get('/create', [TicketController::class, 'create'])->name('tickets.create');       
        Route::get('{id}', [TicketController::class, 'show'])->name('tickets.show');      
        Route::post('/', [TicketController::class, 'store'])->name('tickets.store');      
        Route::get('{id}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
        Route::put('{id}', [TicketController::class, 'update'])->name('tickets.update');   
        Route::delete('{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');
    });  
});