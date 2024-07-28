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

    //SertifikatPTMasterData - Admin Page
    Route::get('sertifikatpt', [AdminController::class, 'sertifikatpt'])->name('admin/sertifikatpt');
    //SertifikatIndividuMasterData - Admin Page
    Route::get('sertifikatindividu', [AdminController::class, 'sertifikatindividu'])->name('admin/sertifikatindividu');

    // Start Of Biaya =========================================

    Route::get('biaya', [AdminController::class, 'biaya'])->name('admin/biaya');

    Route::get('biayaedit/{id}', [AdminController::class, 'biayaedit'])->name('biayaedit');

    Route::post('updatebiaya/{id}', [AdminController::class, 'updatebiaya'])->name('updatebiaya');

    // End Of Biaya ============================================


    // Start Of Link =========================================

    Route::get('link', [AdminController::class, 'link'])->name('admin/link');

    Route::get('linkedit/{id}', [AdminController::class, 'linkedit'])->name('linkedit');

    Route::post('updatelink/{id}', [AdminController::class, 'updatelink'])->name('updatelink');

    // End Of Link ============================================

});


// Operator Middleware
Route::middleware(['auth', 'operator'])->prefix('operator')->group(function () {
    //DashboardOperator
    Route::get('dashboard', [OperatorController::class, 'index'])->name('operator/dashboard');
    //Dosen - Operator Page
    Route::get('individu', [OperatorController::class, 'individu'])->name('operator/individu');
    //PT - Operator Page
    Route::get('pt', [OperatorController::class, 'pt'])->name('operator/pt');
    
    //Start Aprroving Of Kaprodi (PT)

        //Approve
        Route::get('/status/approve/pt/{id}', [OperatorController::class, 'approvept'])->name('status.approve.pt');
        //Disapprove
        Route::get('/status/disapprove/pt/{id}', [OperatorController::class, 'disapprovept'])->name('status.disapprove.pt');
        //NonAktive
        Route::get('/status/nonactive/pt/{id}', [OperatorController::class, 'nonactivept'])->name('status.nonactive.pt');

    //End Approving Of Kaprodi (PT)

    //Start Approving Of User / Dosen 
        
        //Approve
        Route::get('/status/approve/user/{id}', [OperatorController::class, 'approveuser'])->name('status.approve.user');
        //Disapprove
        Route::get('/status/disapprove/user/{id}', [OperatorController::class, 'disapproveuser'])->name('status.disapprove.user');
        //NonAktive
        Route::get('/status/nonactive/user/{id}', [OperatorController::class, 'nonactiveuser'])->name('status.nonactive.user');


    //End Aproving of user / dosen
});

// PT Middleware
Route::middleware(['auth', 'pt'])->prefix('pt')->group(function () {
    Route::get('dashboard', [PtController::class, 'index'])->name('pt/dashboard');
    //StatusPT
    Route::get('statuspt', [PtController::class, 'index'])->name('pt/statuspt');
    //DataDosen
    Route::get('datadosen', [PtController::class, 'datadosen'])->name('pt/datadosen');
    //SertifikatDosen
    Route::get('sertifikatdosen', [PtController::class, 'sertifikatdosen'])->name('pt/sertifikatdosen');
    //SertifikatPt
    Route::get('sertifikatpt', [PtController::class, 'sertifikatpt'])->name('pt/sertifikatpt');
    //StorePTAkun
    Route::post('storept', [PtController::class, 'storept'])->name('pt.store');
    //DetailsDataDosen
    Route::get('detailsdatadosen/{id}', [PtController::class, 'detailsdatadosen'])->name('details.datadosen');
    //EditDataProfilePT
    Route::get('editprofile', [PtController::class, 'editprofile'])->name('pt/editprofile');

    //Perbarui Data After Mati / Disapprove
    Route::post('updatept/{id}', [PtController::class, 'updatept'])->name('updatept');
});

// User Middleware
Route::middleware(['auth', 'user'])->prefix('user')->group(function () {

    //StatusUser
    Route::get('dashboard', [IndividuController::class, 'index'])->name('user/dashboard');
    //StoreUserAkun
    Route::post('storeindividu', [IndividuController::class, 'storeindividu'])->name('individu.store');
    //SertifikatUser
    Route::get('sertifikat', [IndividuController::class, 'sertifikat'])->name('user/sertifikat');

    //EditDataProfileDosen
    Route::get('editprofileDosen', [IndividuController::class, 'editprofile'])->name('user/editprofile');

    //Perbarui Data After Mati / Disapprove
    Route::post('updateprofileuser/{id}', [IndividuController::class, 'updateuser'])->name('updateprofileuser');
});




//Authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
