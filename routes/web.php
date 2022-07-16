<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReligionController;

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
    $jumlahpegawai = Employee::count();
    $jumlahpegawaipria = Employee::where('jeniskelamin','pria')->count();
    $jumlahpegawaiwanita = Employee::where('jeniskelamin','wanita')->count();

    return view('welcome', compact('jumlahpegawai','jumlahpegawaipria','jumlahpegawaiwanita'));
})->middleware('auth');

Route::group(['middleware' => ['auth','hakakses:admin,user']], function(){
    Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
});

// Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');

Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

// Mengekspor PDF
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');

// Mengekspor Excel
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');

// Mengimpor Excel
Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

// Register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/datareligion', [ReligionController::class, 'index'])->name('datareligion')->middleware('auth');
Route::get('/tambahagama', [ReligionController::class, 'create'])->name('tambahagama');

Route::post('/insertdatareligion', [ReligionController::class, 'store'])->name('insertdatareligion');