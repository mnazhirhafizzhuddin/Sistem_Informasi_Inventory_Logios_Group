<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
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
Route::middleware(['guest:user'])->group(function(){
    // Route::get('/refreshcaptcha', [TampilanController::class,'reloadCaptcha']);
    Route::get('/panel', function () {
        return view('auth.loginmanager');
    })->name('loginadmin');
    Route::post('/prosesloginmanager',[AuthController::class,'prosesloginmanager']);

});
Route::middleware(['guest:karyawan'])->group(function(){

    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/proseslogin',[AuthController::class,'proseslogin']);

});


Route::middleware(['auth:user'])->group(function(){
    Route::get('/proseslogoutmanager', [AuthController::class,'proseslogoutmanager']);
    Route::get('/dashboardmanager', [ManagerController::class,'Index']);
    Route::get('/databarang1', [ManagerController::class,'databarang1']);
    Route::get('/databarangmasuk1', [ManagerController::class,'databarangmasuk1']);
    Route::get('/databarangkeluar2', [ManagerController::class,'barangkeluar']);
    Route::get('/search11',[ManagerController::class,'search2']);
    Route::get('/search22',[ManagerController::class,'search3']);
    Route::get('/laporanbarangkeluar1', [ManagerController::class,'laporanbarangkeluar']);
    Route::get('/laporanbarangmasuk1', [ManagerController::class,'laporanbarangmasuk']);
    Route::get('/dataadmin', [ManagerController::class,'dataadmin']);
    Route::get('/halamantambahadmin', [ManagerController::class,'halamantambahdata']);
    Route::post('/tambahdataadmin',[ManagerController::class,'tambahdataadmin']);
    Route::get('/hapus/{nik}/dataadmin',[ManagerController::class,'hapusdataadmin']);
    Route::get('/tampildata/{nik}/editdataadmin',[ManagerController::class,'editdatakaryawan']);
    Route::post('/rubah/{nik}/dataadmin',[ManagerController::class,'rubahdataadmin']);
});


Route::middleware(['auth:karyawan'])->group(function(){
    Route::get('/search',[BarangController::class,'search']);
    Route::get('/search1',[BarangController::class,'search1']);
    Route::get('/dashboard', [BarangController::class,'Index']);
    Route::get('/databarang', [BarangController::class,'databarang']);
    Route::get('/proseslogout', [AuthController::class,'proseslogout']);
    Route::get('/databarangmasuk', [BarangController::class,'databarangmasuk']);
    Route::get('/databarangkeluar', [BarangController::class,'barangkeluar']);
    Route::get('/laporanbarangkeluar', [BarangController::class,'laporanbarangkeluar']);
    Route::get('/laporanbarangmasuk', [BarangController::class,'laporanbarangmasuk']);
    Route::get('/halamantambahdatabarang', [BarangController::class,'halamantambahdatabarang']);
    Route::get('/tampildata/{idbarang}/databarang',[BarangController::class,'databarangkeluar']);
    Route::get('/tampildata/{idbarang}/editdatabarang',[BarangController::class,'tampildatabarang']);
    Route::post('/update/{idbarang}/databarang',[BarangController::class,'updatedatabarang']);
    Route::post('/rubah/{idbarang}/databarang',[BarangController::class,'rubahdatabarang']);
    Route::post('/tambahdatabarangmasuk',[BarangController::class,'tambahdatabarangmasuk']);
    Route::get('/hapus/{idbarang}/databarangmasuk',[BarangController::class,'hapusdatabarangmasuk']);
    Route::get('/laporanpdf', [BarangController::class,'laporanpdf']);
    Route::get('/laporanpdfbarangkeluar', [BarangController::class,'laporanpdfkeluar']);
});



