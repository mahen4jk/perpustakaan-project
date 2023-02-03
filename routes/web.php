<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

# Sistem Login

Route::get('login', 'LoginCon@tmplogin')->name('login');
Route::post('postlogin', 'LoginCon@postlogin')->name('postlogin');
Route::get('logout', 'LoginCon@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    #Tampilan Dashboard

    Route::get('index', 'DashController@Dashboard');

    #Tampilan MasterAnggota
    Route::prefix('anggota')->group(function () {
        Route::get('masteranggota','Admin\MstAnggota@MasterAnggota');
        #Tampilan Form Kelas
        Route::get('tambahanggota','Admin\MstAnggota@tambahanggota');
        Route::post('simpanAnggota','Admin\MstAnggota@simpanAnggota');
        #Update Anggota
        Route::get('editANG/{nis}','Admin\MstAnggota@kirimAnggota');
        Route::post('editANG/ubahAnggota','Admin\MstAnggota@ubahAnggota');
        # Hapus Anggota
        Route::get('hapusAnggota/{nis}','Admin\MstAnggota@hpsAnggota');
    });

    // Tampilan MasterKelas
    Route::prefix('kelas')->group(function (){
        #Tampilan Data
        Route::get('masterkelas', 'Admin\MstKelasCon@MasterKelas');
        #Tampilan Form Kelas
        Route::get('tambahkelas', 'Admin\MstKelasCon@formKelas');
        Route::post('simpanCLASS','Admin\MstKelasCon@simpanCLASS');
        # Siap Update Kelas
        Route::get('editKEL/{id_kelas}','Admin\MstKelasCon@kirimKEL');
        Route::post('editKEL/updateKEL','Admin\MstKelasCon@updateKEL');
        # Hapus Kelas
        Route::get('hapusKELAS/{id_kelas}','Admin\MstKelasCon@deleteKEL');
    });

    #Tampilan MasterBuku
    Route::prefix('buku')->group(function () {
        #Tampilan Data
        Route::get('masterbuku', 'Admin\MstBukuCon@MasterBuku');
        #Tampilan Form dan Tambah Buku
        Route::get('tambahbuku', 'Admin\MstBukuCon@formbuku');
        Route::post('simpanBUKU','Admin\MstBukuCon@simpanBUKU');
        #Tampilan Edit dan Ubah Buku
        Route::get('editbuku/{id_buku}','Admin\MstBukuCon@kirimBuku');
        Route::post('editbuku/updateBUKU','Admin\MstBukuCon@updateBUKU');
        #Hapus buku
        Route::get('hapusBUKU/{id_buku}','Admin\MstBukuCon@delBUKU');
    });

    #Tampilan MasterKategori
    Route::prefix('kategori')->group(function () {
        # Tampilan Data
        Route::get('masterkategori', 'Admin\MstCatCon@MasterKategori');
        # Tampilan Form dan Tambah Buku
        Route::get('tambahkategori','Admin\MstCatCon@formkategori');
        Route::post('simpanKAT','Admin\MstCatCon@simpanKAT');
        # Siap Update Kategori
        Route::get('editKat/{id_kategori}','Admin\MstCatCon@kirimKat');
        Route::post('editKat/updateKAT','Admin\MstCatCon@updateKAT');
        # Hapus Penerbit
        Route::get('hapusKAT/{id_kategori}','Admin\MstCatCon@deleteKAT');
    });

    #Tampilan MasterPenerbit
    Route::prefix('penerbit')->group(function () {
        # Tampilan Data
        Route::get('masterpenerbit', 'Admin\MstPenCon@mstpenerbit');
        # Tampilan form dan tambah penerbit
        Route::get('tambahpenerbit', 'Admin\MstPenCon@formpenerbit');
        Route::post('simpanPEN','Admin\MstPenCon@simpanPEN');
        # Siap update penerbit
        Route::get('editPEN/{id_penerbit}','Admin\MstPenCon@kirimPEN');
        Route::post('editPEN/updatePEN','Admin\MstPenCon@updatePEN');
        # Hapus Penerbit
        Route::get('hapusPEN/{id_penerbit}','Admin\MstPenCon@deletePEN');
    });

    Route::prefix('ddc')->group(function() {
        Route::get('masterddc', 'Admin\MstDDC@masterddc');
    });
});
