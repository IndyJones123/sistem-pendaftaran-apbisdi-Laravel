<?php

//Auth Breeze
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//Main Code
use App\Http\Controllers\PtController;
use App\Http\Controllers\IndividuController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\AdminController;


//HomePage
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/alur', [HomeController::class, 'alur'])->name('alur');
Route::get('/individu', [HomeController::class, 'individu'])->name('individu');
Route::get('/individuExtend', [HomeController::class, 'individuExtend'])->name('individuExtend');
Route::get('/register', [HomeController::class, 'register'])->name('register');

//Admin Middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //DashboardAdmin
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
    //OperatorMasterData - Admin Page
    Route::get('operator', [AdminController::class, 'operator'])->name('admin/operator');
    //PTMasterData - Admin Page
    Route::get('pt', [AdminController::class, 'pt'])->name('admin/pt');
    //IndividuMasterData - Admin Page
    Route::get('individu', [AdminController::class, 'individu'])->name('admin/individu');
    //BiayaMasterData - Admin Page
    Route::get('biaya', [AdminController::class, 'biaya'])->name('admin/biaya');
    //SertifikatPTMasterData - Admin Page
    Route::get('sertifikatpt', [AdminController::class, 'sertifikatpt'])->name('admin/sertifikatpt');
    //SertifikatIndividuMasterData - Admin Page
    Route::get('sertifikatindividu', [AdminController::class, 'sertifikatindividu'])->name('admin/sertifikatindividu');

});


// Operator Middleware
Route::middleware(['auth', 'operator'])->prefix('operator')->group(function () {
    //DashboardOperator
    Route::get('dashboard', [OperatorController::class, 'index'])->name('operator/dashboard');
    //Dosen - Operator Page
    Route::get('individu', [OperatorController::class, 'individu'])->name('operator/individu');
    //PT - Operator Page
    Route::get('pt', [OperatorController::class, 'pt'])->name('operator/pt');
});

// PT Middleware
Route::middleware(['auth', 'pt'])->prefix('pt')->group(function () {
    Route::get('dashboard', function () {
        return view('main/pt/dashboard');
    })->name('pt/dashboard');
    
    //StatusPT
    Route::get('statuspt', [PtController::class, 'index'])->name('pt/statuspt');
    //StorePTAkun
    Route::post('storept', [PtController::class, 'storept'])->name('pt.store');
    
    Route::get('datadosen', function () {
        return view('main/pt/datadosen');
    })->name('pt/datadosen');
    
    Route::get('sertifikatpt', function () {
        return view('main/pt/sertifikatpt');
    })->name('pt/sertifikatpt');
});

// User Middleware
Route::middleware(['auth', 'user'])->prefix('user')->group(function () {

    //StatusUser
    Route::get('dashboard', [IndividuController::class, 'index'])->name('user/dashboard');
    //StoreUserAkun
    Route::post('storeindividu', [IndividuController::class, 'storeindividu'])->name('individu.store');
    //SertifikatUser
    Route::get('sertifikat', [IndividuController::class, 'sertifikat'])->name('user/sertifikat');

});




//Authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
