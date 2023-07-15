<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\DosenBankSoalController;
use App\Http\Controllers\DosenDataMaterialController;
use App\Http\Controllers\DosenManageSoalController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [MaterialController::class, 'index'])->name('home');
Route::get('/material/{material_id}', [MaterialController::class, 'details'])->name('material_detail');
Route::get('/material/download/{material_id}', [MaterialController::class, 'download'])->name('material_download');
Route::get('/question', [HomeController::class, 'index'])->name('question');
Route::post('/test', [TestController::class, 'index'])->name('test');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::middleware('auth', 'isAdmin')->group(function () {
    // Controler Dosen Bank Soal
    Route::get('/dosen_bank_soal', [DosenBankSoalController::class, 'index'])->name('dosen_bank_soal');
    Route::get('/edit_bank_soal/{id}', [DosenBankSoalController::class, 'edit'])->name('dosenBankSoalEdit');
    Route::post('/edit_bank_soal/{id}', [DosenBankSoalController::class, 'update'])->name('dosenBankSoalUpdate');
    Route::get('/create_bank_soal', [DosenBankSoalController::class, 'create'])->name('dosenBankSoalCreate');
    Route::post('/create_bank_soal', [DosenBankSoalController::class, 'store'])->name('dosenBankSoalStore');
    Route::post('/delete_bank_soal/{id}', [DosenBankSoalController::class, 'delete'])->name('dosenBankSoalDelete');

    //Controller Dosen Data Material
    Route::get('/dosen_data_material', [DosenDataMaterialController::class, 'index'])->name('dosen_data_material');
    Route::get('/edit_data_material/{id}', [DosenDataMaterialController::class, 'edit'])->name('dosenDataMaterialEdit');
    Route::post('/edit_data_material/{id}', [DosenDataMaterialController::class, 'update'])->name('dosenDataMaterialUpdate');
    Route::get('/create_data_material', [DosenDataMaterialController::class, 'create'])->name('dosenDataMaterialCreate');
    Route::post('/create_data_material', [DosenDataMaterialController::class, 'store'])->name('dosenDataMaterialStore');
    Route::post('/delete_data_material/{id}', [DosenDataMaterialController::class, 'delete'])->name('dosenDataMaterialDelete');

    //Controller Dosen Manage Soal
    Route::get('/dosen_manage_soal', [DosenManageSoalController::class, 'index'])->name('dosen_manage_soal');
    Route::get('/edit_manage_soal/{id}', [DosenManageSoalController::class, 'edit'])->name('dosenManageSoalEdit');
    Route::post('/edit_manage_soal/{id}', [DosenManageSoalController::class, 'update'])->name('dosenManageSoalUpdate');
    Route::get('/create_manage_soal', [DosenManageSoalController::class, 'create'])->name('dosenManageSoalCreate');
    Route::post('/create_manage_soal', [DosenManageSoalController::class, 'store'])->name('dosenManageSoalStore');
    Route::post('/delete_manage_soal/{id}', [DosenManageSoalController::class, 'delete'])->name('dosenManageSoalDelete');
});



require __DIR__ . '/auth.php';
