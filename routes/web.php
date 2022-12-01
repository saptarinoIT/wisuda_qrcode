<?php

use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\UndanganController;
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
    // return view('auth._login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->level == 'admin' or auth()->user()->level == 'petugas') {
        $year = date('Y');
        $totalWisuda = Wisuda::where('tahun', $year)->where('status', 'diterima')->get();
        $wisudaHadir = Wisuda::where('kehadiran', 'ya')->where('tahun', $year)->where('status', 'diterima')->get();
        $wisudaTdkHadir = Wisuda::where('kehadiran', 'tidak')->where('tahun', $year)->where('status', 'diterima')->get();
        return view('dashboard', compact('totalWisuda', 'wisudaHadir', 'wisudaTdkHadir'));
    }
    if (auth()->user()->level == 'mahasiswa') {
        $userId = auth()->user()->id;
        $wisuda = Wisuda::where('user_id', $userId)->first();
        $totalWisuda = Wisuda::where('tahun', $wisuda->tahun)->where('status', 'diterima')->get();
        return view('dashboard', compact('totalWisuda'));
    }
})->middleware(['auth'])->name('dashboard');

Route::get('pendaftaran/{id}/validasi', [PendaftaranController::class, 'validasi'])->middleware('auth')->name('pendaftaran.validasi');
Route::resource('pendaftaran', PendaftaranController::class);

Route::resource('users', UsersController::class)->except('show')->middleware(['auth']);
Route::get('wisuda/all', [WisudaController::class, 'indexAll'])->name('wisuda.semua')->middleware('auth');
Route::get('wisuda/cetak/{id}', [WisudaController::class, 'cetak'])->name('wisuda.cetak')->middleware('auth');
Route::get('wisuda/print/{id}', [WisudaController::class, 'print'])->name('wisuda.print')->middleware('auth');
Route::get('wisuda/hadir/{id}', [WisudaController::class, 'hadir'])->name('wisuda.hadir')->middleware('auth');
Route::resource('wisuda', WisudaController::class)->middleware('auth');

Route::get('scan', [ScanController::class, 'index'])->name('scan.index')->middleware(['auth']);
Route::get('scan/{id}', [ScanController::class, 'update'])->name('scan.update')->middleware(['auth']);

Route::get('undangan-wisuda', [UndanganController::class, 'index'])->name('undangan.index')->middleware(['auth']);

require __DIR__ . '/auth.php';
