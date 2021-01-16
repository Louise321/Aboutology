<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware('auth')->name('dashboard');

/* Route::get('/middleware-prueba', function () {
    echo "Administrador";
})->middleware('auth:admins');
 */


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->middleware('auth:admin')->name('admin');

    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/auth',[AdminController::class, 'authenticate'])->name('admin.auth');

});

require __DIR__.'/auth.php';
