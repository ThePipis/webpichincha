<?php
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AltasyBajasController;
use App\Http\Controllers\InventariosController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('usuarios',UsersController::class)->name('*','usuarios')->middleware('can:registrar-usuarios');
    Route::resource('altasybajas',AltasyBajasController::class)->name('*','altasybajas')->middleware('can:registrar-altasybajas');
    Route::resource('inventarios',InventariosController::class)->name('*','inventarios');
    Route::get('altasybajas-export', [AltasyBajasController::class, 'export'])->name('altasybajas.export');
    Route::post('altasybajas-import',[AltasyBajasController::class, 'import'])->name('altasybajas.import');
    Route::get('inventarios-export', [InventariosController::class, 'export'])->name('inventarios.export');

});
