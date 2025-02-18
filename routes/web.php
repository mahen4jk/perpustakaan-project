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
    Route::get('/', 'halindex\kunjungan@show')->name('kunjungan.show');
    Route::post('/save-kunjungan', 'halindex\kunjungan@saveKunjungan')->name('save-kunjungan');
    route::post('/search-anggota', 'halindex\kunjungan@searchAnggota')->name('search-anggota');
});

# Sistem Login
Route::get('login', 'LoginCon@tmplogin')->name('login');
Route::post('postlogin', 'LoginCon@postlogin')->name('postlogin');
Route::get('logout', 'LoginCon@logout')->name('logout');

Route::group(['middleware' => ['auth:pendik', 'ceklevel:admin,pustaka']], function () {

    #Tampilan Dashboard
    Route::get('dashboard', 'DashController@Dashboard');

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

    #Tampilan MasterPendik
    Route::prefix('pendik')->group(function () {
        Route::get('masterpendik', 'admin\MsPendik@msPendik');
        #Tampilan Form Kelas
        Route::get('formPendik', 'admin\MsPendik@formPendik');
        Route::post('simpanPendik', 'admin\MsPendik@simpanPendik');
        #Update Anggota
        Route::get('editPNDK/{id_pendik}', 'admin\MsPendik@editPNDK');
        Route::post('editPNDK/ubahPendik', 'admin\MsPendik@ubahPendik');
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
});

Route::group(['middleware' => ['auth:pendik', 'ceklevel:pustaka,admin']], function () {
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
        # Label Buku
        Route::get('previewLBL/{id_buku}', 'Admin\MstBukuCon@labelBuku');
        Route::get('printLBL/{id_buku}', 'Admin\MstBukuCon@labelBK');
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

    #Denda
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

Route::group(['middleware' => ['auth:pendik', 'ceklevel:admin,kep_perpus']], function () {
    #Tampilan Dashboard
    Route::get('dashboard', 'DashController@Dashboard');
    #Laporan
    Route::prefix('laporan')->group(function () {
        // Laporan Buku
        #View Laporan Buku
        Route::get('buku', 'Admin\Laporan@LaporanBuku');
        #Filter View Laporan
        Route::get('buku/filter', 'Admin\Laporan@filBuku')->name('report.filter.buku');
        #Preview Sebelum cetak dan kena filter
        Route::get('viewBUKU', 'Admin\Laporan@viewBuku')->name('vLaporanBuku');
        #Cetak Laporan buku
        Route::get('cetakLaporanBK', 'Admin\Laporan@cetakLaporanBK')->name('cetakLaporanBuku');

        // Laporan Sirkulasi
        #Laporan Peminjaman
        Route::get('peminjaman', 'Admin\Laporan@LaporanPinjam');
        Route::get('peminjaman/filter', 'Admin\Laporan@filPinjam')->name('report.filter.pinjam');
        #Preview sebelum cetak dan kena filter
        Route::get('viewPinjam', 'Admin\Laporan@viewPinjam')->name('vLaporanPinjam');
        #Cetak Peminjaman
        Route::get('cetakPinjam', 'Admin\Laporan@cetakPinjam')->name('cetakPinjam');

        #Laporan Pengembalian
        Route::get('pengembalian', 'Admin\Laporan@LaporanKembali');
        Route::get('pengembalian/filter', 'Admin\Laporan@filKembali');
        #Preview sebelum cetak dan kena filter
        Route::get('viewKembali', 'Admin\Laporan@viewKembali')->name('vLaporanKembali');
        #Cetak Pengembalian
        Route::get('cetakKembali', 'Admin\Laporan@cetakKembali')->name('cetakKembali');

        // Laporan Kunjungan
        Route::get('kunjungan', 'Admin\Laporan@LaporanKunjungan');
        // Filter Laporan
        Route::get('kunjungan/filter', 'Admin\Laporan@filterKun')->name('report.filter.kunjungan');
        #Preview cetak laporan
        Route::get('viewLaporanKUN', 'Admin\Laporan@viewKunjungan')->name('vLaporanKunjungan');
        #Cetak Laporan kunjungan
        Route::get('cetakLaporanKUN', 'Admin\Laporan@cetakKunjungan')->name('cetakKunjungan');
    });
});
