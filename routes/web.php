<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\halindex\katalog;

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


// Route::get('/', function () {
//     return view('halindex.index');
// });

# Halaman Depan
Route::get('/', 'halindex\index@tampilandepan');

# Halaman Profil Perpustakaan
Route::get('profile', 'halindex\profil_perpus@ProfSejarah');
Route::get('visimisi', 'halindex\profil_perpus@VisiMisi');

#Halaman Katalog
Route::get('katalog', 'halindex\katalog@halkatalog');
Route::get('katalog/search', 'halindex\katalog@search')->name('katalog.search');
Route::get('katalog/buku-list', 'halindex\katalog@searchBuku')->name('katalog.autocomplete');
Route::get('detail-buku/{id_buku}', 'halindex\katalog@show');

#Halaman Kunjungan
Route::prefix('kunjungan')->group(function () {
    Route::get('/', 'halindex\kunjungan@show');
    Route::post('/berkunjung', 'halindex\kunjungan@berkunjung')->name('kunjungan');
});


# Sistem Login
Route::get('login', 'LoginCon@tmplogin')->name('login');
Route::post('postlogin', 'LoginCon@postlogin')->name('postlogin');
Route::get('logout', 'LoginCon@logout')->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {

    #Tampilan MasterAnggota
    Route::prefix('anggota')->group(function () {
        Route::get('masteranggota', 'Admin\MstAnggota@MasterAnggota');
        Route::get('exportanggota', 'Admin\MstAnggota@exportAnggota');
        Route::post('importanggota', 'Admin\MstAnggota@importAnggota');
        #Tampilan Form Kelas
        Route::get('tambahanggota', 'Admin\MstAnggota@tambahanggota');
        Route::post('simpanAnggota', 'Admin\MstAnggota@simpanAnggota');
        #Update Anggota
        Route::get('editANG/{id_anggota}', 'Admin\MstAnggota@kirimAnggota');
        Route::post('editANG/ubahAnggota', 'Admin\MstAnggota@ubahAnggota');
        # Hapus Anggota
        Route::get('hapusAnggota/{id_anggota}', 'Admin\MstAnggota@hpsAnggota');
    });

    // Tampilan MasterKelas
    Route::prefix('kelas')->group(function () {
        #Tampilan Data
        Route::get('masterkelas', 'Admin\MstKelasCon@MasterKelas');
        #Tampilan Form Kelas
        Route::get('tambahkelas', 'Admin\MstKelasCon@formKelas');
        Route::post('simpanCLASS', 'Admin\MstKelasCon@simpanCLASS');
        # Siap Update Kelas
        Route::get('editKEL/{id_kelas}', 'Admin\MstKelasCon@kirimKEL');
        Route::post('editKEL/updateKEL', 'Admin\MstKelasCon@updateKEL');
        # Hapus Kelas
        Route::get('hapusKELAS/{id_kelas}', 'Admin\MstKelasCon@deleteKEL');
    });
    Route::prefix('petugas')->group(function () {
        #Tampilan Data
        Route::get('masterpetugas', 'Admin\UserController@MasterPetugas');
        #Tampilan Form Petugas
        Route::get('formpetugas', 'Admin\UserController@FormPetugas');
        Route::post('simpanPetugas', 'Admin\UserController@simpanPetugas');
        #Edit Petugas
        Route::get('editPTS/{id}', 'admin\UserController@editPetugas');
        Route::post('editPTS/ubahPetugas', 'admin\UserController@ubahPetugas');
    });
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,pustakawan']], function () {

    #Tampilan Dashboard
    Route::get('dashboard', 'DashController@Dashboard');

    #Tampilan MasterBuku
    Route::prefix('buku')->group(function () {
        #Tampilan Data
        Route::get('masterbuku', 'Admin\MstBukuCon@MasterBuku');
        #Tampilan Form dan Tambah Buku
        Route::get('tambahbuku', 'Admin\MstBukuCon@formbuku');
        Route::post('simpanBUKU', 'Admin\MstBukuCon@simpanBUKU');
        #Tampilan Edit dan Ubah Buku
        Route::get('editbuku/{id_buku}', 'Admin\MstBukuCon@kirimBuku');
        Route::post('editbuku/updateBUKU', 'Admin\MstBukuCon@updateBUKU');
        #Hapus buku
        Route::get('hapusBUKU/{id_buku}', 'Admin\MstBukuCon@delBUKU');
        # PDF
        Route::get('previewKtBuku/{id_buku}', 'Admin\MstBukuCon@previewKartuBuku');
        Route::get('printKtBuku/{id_buku}', 'Admin\MstBukuCon@kartuBuku');
    });

    #Tampilan MasterKategori
    Route::prefix('kategori')->group(function () {
        # Tampilan Data
        Route::get('masterkategori', 'Admin\MstCatCon@MasterKategori');
        # Tampilan Form dan Tambah Buku
        Route::get('tambahkategori', 'Admin\MstCatCon@formkategori');
        Route::post('simpanKAT', 'Admin\MstCatCon@simpanKAT');
        # Siap Update Kategori
        Route::get('editKat/{id_kategori}', 'Admin\MstCatCon@kirimKat');
        Route::post('editKat/updateKAT', 'Admin\MstCatCon@updateKAT');
        # Hapus Penerbit
        Route::get('hapusKAT/{id_kategori}', 'Admin\MstCatCon@deleteKAT');
    });

    #Tampilan MasterPenerbit
    Route::prefix('penerbit')->group(function () {
        # Tampilan Data
        Route::get('masterpenerbit', 'Admin\MstPenCon@mstpenerbit');
        # Tampilan form dan tambah penerbit
        Route::get('tambahpenerbit', 'Admin\MstPenCon@formpenerbit');
        Route::post('simpanPEN', 'Admin\MstPenCon@simpanPEN');
        # Siap update penerbit
        Route::get('editPEN/{id_penerbit}', 'Admin\MstPenCon@kirimPEN');
        Route::post('editPEN/updatePEN', 'Admin\MstPenCon@updatePEN');
        # Hapus Penerbit
        Route::get('hapusPEN/{id_penerbit}', 'Admin\MstPenCon@deletePEN');
    });

    #DDC
    Route::prefix('ddc')->group(function () {
        #Tampilan Data DDC
        Route::get('masterddc', 'Admin\MstDDC@masterddc');
        #Tampilan form dan tambah penerbit
        Route::get('tambahddc', 'Admin\MstDDC@tambahddc');
        Route::post('simpanDDC', 'Admin\MstDDC@simpanDDC');
        #Form ubah dan ubdah DDC
        Route::get('editDDC/{id_class}', 'Admin\MstDDC@kirimDDC');
        Route::post('editDDC/ubahDDC', 'Admin\MstDDC@ubahDDC');
        #Hapus DDC
        Route::get('hapusDDC/{id_class}', 'Admin\MstDDC@hpsDDC');
    });

    #Sirkulasi
    Route::prefix('sirkulasi')->group(function () {
        #Peminjaman
        Route::get('peminjaman', 'Admin\PinjamCon@viewpinjam');
        #Form Peminjaman
        Route::get('formpinjam', 'Admin\PinjamCon@formpinjam');
        Route::post('simpanpinjam', 'Admin\PinjamCon@simpanPinjam');
        // Route::get('updatePinjam/{kode_pinjam}','Admin\PinjamCon@ubahPinjam');

        #Pengembalian
        Route::get('pengembalian', 'Admin\KembaliCon@viewkembali');
        #Form Pengembalian
        Route::get('pengembalian/{kode_pinjam}', 'Admin\KembaliCon@formKembali');
        Route::post('pengembalian/kembaliBuku', 'Admin\KembaliCon@pengembalian');
    });

    Route::prefix('denda')->group(function () {
        #Denda
        Route::get('masterdenda', 'Admin\MstDenda@viewDenda');
        #Form Denda
        Route::get('formdenda', 'Admin\MstDenda@tambahDenda');
        Route::post('simpanDenda', 'Admin\MstDenda@simpanDDA');
        #Edit Denda
        Route::get('editDenda/{id_denda}', 'Admin\MstDenda@kirimDenda');
        Route::post('editDenda/ubahDenda', 'Admin\MstDenda@ubahDenda');
        #Delete Denda
        Route::get('hapusDDA/{id_denda}', 'Admin\MstDenda@hapusDenda');
        // Route::get('pengembalian','Admin\KembaliCon@viewkembali');
    });
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,kep_perpus']], function () {
    #Tampilan Dashboard
    Route::get('dashboard', 'DashController@Dashboard');
    #Laporan
    Route::prefix('laporan')->group(function () {
        #Laporan Buku
        Route::get('buku', 'Admin\Laporan@LaporanBuku');
        Route::get('buku/filter', 'Admin\Laporan@FilterLPBuku')->name('buku.filter');
        #Laporan Sirkulasi
        Route::get('peminjaman', 'Admin\Laporan@LaporanPinjam');
        Route::get('pengembalian', 'Admin\Laporan@LaporanKembali');
        #Laporan Kunjungan
        Route::get('kunjungan','Admin\Laporan@LaporanKunjungan');
    });
});
