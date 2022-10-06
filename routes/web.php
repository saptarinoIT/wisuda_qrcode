<?php

use App\Http\Controllers\ScanController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WisudaController;
use App\Models\Wisuda;
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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $totalWisuda = Wisuda::all();
    $wisudaHadir = Wisuda::where('kehadiran', 'ya')->get();
    $wisudaTdkHadir = Wisuda::where('kehadiran', 'tidak')->get();
    return view('dashboard', compact('totalWisuda', 'wisudaHadir', 'wisudaTdkHadir'));
})->middleware(['auth'])->name('dashboard');

Route::resource('users', UsersController::class)->except('show')->middleware(['auth']);
Route::get('wisuda/hadir/{id}', [WisudaController::class, 'hadir'])->name('wisuda.hadir')->middleware('auth');
Route::resource('wisuda', WisudaController::class)->middleware('auth');

Route::get('scan', [ScanController::class, 'index'])->name('scan.index')->middleware(['auth']);
Route::get('scan/{id}', [ScanController::class, 'update'])->name('scan.update')->middleware(['auth']);

require __DIR__ . '/auth.php';
