<?php

use App\Http\Controllers\admin\JabatanController;
use App\Http\Controllers\admin\LemburController as AdminLemburController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\karyawan\LemburController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\PenggunaController;

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


// Main Page Route
Route::get('/', [Controller::class, 'home'])->name('dashboard-home');

/* Route Pages */
Route::get('/error', [MiscellaneousController::class, 'error'])->name('error');

Route::get('redirect', [Controller::class, 'redirect'])->name('redirect');

Route::group(['middleware' => ['auth']], function() {
    // your routes
    Route::group(['prefix' => 'admin'], function () {
        //master
        Route::get('jabatan', [JabatanController::class, 'jabatan'])->name('jabatan-admin');
        Route::post('jabatan_add', [JabatanController::class, 'jabatan_add'])->name('jabatan-add-admin');
        Route::get('jabatan_data', [JabatanController::class, 'jabatan_data'])->name('jabatan-data-admin');
        Route::get('jabatan_data_single/{id}', [JabatanController::class, 'jabatan_data_single'])->name('jabatan-data-single-admin');
        Route::get('jabatan_delete/{id}', [JabatanController::class, 'jabatan_delete'])->name('jabatan-delete-admin');

        Route::get('pelamar', [AdminController::class, 'pelamar'])->name('pelamar-admin');
        Route::get('pelamar_data', [AdminController::class, 'pelamar_data'])->name('pelamar-data-admin');

        Route::post('karyawan_add', [AdminController::class, 'karyawan_add'])->name('karyawan-add-admin');
        Route::get('karyawan', [AdminController::class, 'karyawan'])->name('karyawan-admin');
        Route::get('karyawan_data', [AdminController::class, 'karyawan_data'])->name('karyawan-data-admin');
        Route::get('karyawan_data_single/{id}', [AdminController::class, 'karyawan_data_single'])->name('karyawan-data-single-admin');

        Route::get('absensi', [AdminController::class, 'absensi'])->name('absensi-admin');
        Route::post('absensi_add', [AdminController::class, 'absensi_add'])->name('absensi-add-admin');
        Route::get('absensi_data', [AdminController::class, 'absensi_data'])->name('absensi-data-admin');
        Route::get('absensi_data_single/{id}', [AdminController::class, 'absensi_data_single'])->name('absensi-data-single-admin');
        Route::get('absensi_delete/{id}', [AdminController::class, 'absensi_delete'])->name('absensi-delete-admin');

        Route::get('gaji', [AdminController::class, 'gaji'])->name('gaji-admin');
        Route::get('gaji_data/{id_users}/{bulan}/{tahun}/{download}', [AdminController::class, 'gaji_data'])->name('gaji-data-admin');

        Route::get('lembur', [AdminLemburController::class, 'lembur'])->name('lembur-admin');
        Route::get('lembur_delete/{id}', [AdminLemburController::class, 'lembur_delete'])->name('lembur-delete-admin');
        Route::get('lembur_data', [AdminLemburController::class, 'lembur_data'])->name('lembur-data-admin');

        Route::get('cuti', [AdminController::class, 'cuti'])->name('cuti-admin');
        Route::get('cuti_data', [AdminController::class, 'cuti_data'])->name('cuti-data-admin');
        Route::get('cuti_add/{id}/{status}', [AdminController::class, 'cuti_add'])->name('cuti-add-admin');
        Route::get('mundur', [AdminController::class, 'mundur'])->name('mundur-admin');
        Route::get('mundur_data', [AdminController::class, 'mundur_data'])->name('mundur-data-admin');
        Route::get('mundur_add/{id}/{status}', [AdminController::class, 'mundur_add'])->name('mundur-add-admin');
        Route::get('pelanggaran', [AdminController::class, 'pelanggaran'])->name('pelanggaran-admin');
        Route::post('pelanggaran_add', [AdminController::class, 'pelanggaran_add'])->name('pelanggaran-add-admin');
        Route::get('pelanggaran_data', [AdminController::class, 'pelanggaran_data'])->name('pelanggaran-data-admin');
        Route::get('pelanggaran_data_single/{id}', [AdminController::class, 'pelanggaran_data_single'])->name('pelanggaran-data-single-admin');
        Route::get('pelanggaran_delete/{id}', [AdminController::class, 'pelanggaran_delete'])->name('pelanggaran-delete-admin');
    });
    Route::group(['prefix' => 'karyawan'], function () {
        Route::get('profil', [PenggunaController::class, 'data'])->name('profil-karyawan');
        Route::post('profil_add', [PenggunaController::class, 'data_add'])->name('profil-add-karyawan');
        Route::group(['prefix' => 'a'], function () {
            Route::get('absensi', [PenggunaController::class, 'absensi'])->name('absensi-karyawan');
            Route::post('absensi_add', [PenggunaController::class, 'absensi_add'])->name('absensi-add-karyawan');
            Route::get('absensi_add/{id}', [PenggunaController::class, 'out'])->name('absensi-update-karyawan');
            Route::get('absensi_data', [PenggunaController::class, 'absensi_data'])->name('absensi-data-karyawan');
            Route::get('cuti', [PenggunaController::class, 'cuti'])->name('cuti-karyawan');
            Route::post('cuti_add', [PenggunaController::class, 'cuti_add'])->name('cuti-add-karyawan');
            Route::get('cuti_data', [PenggunaController::class, 'cuti_data'])->name('cuti-data-karyawan');
        });
        Route::group(['prefix' => 'l'], function () {
            Route::get('lembur', [LemburController::class, 'lembur'])->name('lembur-karyawan');
            Route::post('lembur_add', [LemburController::class, 'lembur_add'])->name('lembur-add-karyawan');
            Route::get('lembur_data', [LemburController::class, 'lembur_data'])->name('lembur-data-karyawan');
        });
        
        Route::get('gaji/{bulan}/{tahun}', [PenggunaController::class, 'gaji'])->name('gaji-karyawan');
        Route::get('slip/{bulan}/{tahun}/{download}', [PenggunaController::class, 'slip'])->name('slip-karyawan');

        Route::get('mundur', [PenggunaController::class, 'mundur'])->name('mundur-karyawan');
        Route::post('mundur_add', [PenggunaController::class, 'mundur_add'])->name('mundur-add-karyawan');
        Route::get('mundur_download', [PenggunaController::class, 'mundur_download'])->name('mundur-download-karyawan');
        Route::get('pelanggaran', [PenggunaController::class, 'pelanggaran'])->name('pelanggaran-karyawan');
        Route::get('pelanggaran_data', [PenggunaController::class, 'pelanggaran_data'])->name('pelanggaran-data-karyawan');
    });
    Route::group(['prefix' => 'pelamar'], function () {
        Route::get('data', [PelamarController::class, 'data'])->name('data-pelamar');
        Route::post('data_add', [PelamarController::class, 'data_add'])->name('data-add-pelamar');
        Route::get('posisi_add/{id}/{posisi}', [PelamarController::class, 'posisi_add'])->name('posisi-add-pelamar');
    });
    //edit
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard-admin');
    //edit
    Route::get('/user', [PenggunaController::class, 'dashboard'])->name('dashboard-user');
});
