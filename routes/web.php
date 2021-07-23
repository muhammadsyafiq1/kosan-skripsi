<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/detail/{slug}', [App\Http\Controllers\HomeController::class, 'detail'])->name('kos.detail');
Route::get('semua-kos-tersedia',[App\Http\Controllers\HomeController::class, 'kosKosan'])->name('semua-kos-tersedia');
Route::get('/blog/{slug}', [App\Http\Controllers\HomeController::class, 'detailBlog'])->name('blog.detail');
Route::get('lihat-semua-blog', [App\Http\Controllers\HomeController::class, 'lihatSemuaBlog'])->name('lihat-semua-blog');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::get('profile', [App\Http\Controllers\UserController::class, 'myProfile'])->name('myProfile');
    Route::post('ganti-password', [App\Http\Controllers\UserController::class, 'gantiPassword'])->name('gantiPassword');
    Route::resource('bank',App\Http\Controllers\BankController::class);
    Route::resource('fasilitas',App\Http\Controllers\FasilitasController::class);
    Route::resource('kos',App\Http\Controllers\KosController::class);
    Route::resource('gallery',App\Http\Controllers\GambarKosController::class);
    Route::resource('kamar',App\Http\Controllers\KamarController::class);
    Route::resource('kos-tersimpan',App\Http\Controllers\KosTersimpanController::class);
    Route::resource('gambar-kamar',App\Http\Controllers\GambarKamarController::class);
    Route::resource('blog',App\Http\Controllers\BlogController::class);
    Route::resource('booking',App\Http\Controllers\BookingController::class);
    Route::resource('testimonial',App\Http\Controllers\TestimonialController::class);

    Route::get('success', [App\Http\Controllers\HomeController::class, 'success'])->name('success');
    Route::get('booking/{idKos}/{idKamar}/', [App\Http\Controllers\HomeController::class, 'getBooking']);
    Route::get('terima-booking/{idKamar}/{idBooking}/{idKos}', [App\Http\Controllers\BookingController::class, 'terimaBooking'])->name('terima.booking');
    Route::get('tolak-booking/{idKamar}/{idBooking}/', [App\Http\Controllers\BookingController::class, 'tolakBooking'])->name('tolak.booking');
    Route::get('booking-kos-masuk', [App\Http\Controllers\BookingController::class, 'bookinganKosMasuk'])->name('booking-kos-masuk');
    Route::get('riwayat-kos-saya', [App\Http\Controllers\BookingController::class, 'bookinganSaya'])->name('riwayat-kos-saya');
    Route::get('semua-kos',[App\Http\Controllers\KosController::class, 'tableKos'])->name('semua-kos');
    Route::get('aktifkan-kos/{id}',[App\Http\Controllers\KosController::class, 'aktifkan'])->name('kos.aktifkan');
    Route::get('nonaktifkan-kos/{id}',[App\Http\Controllers\KosController::class, 'nonaktifkan'])->name('kos.nonaktifkan');
    Route::get('kos-tersimpan/{id}/delete',[App\Http\Controllers\KosTersimpanController::class, 'delete'])->name('delete.kos-tersimpan');
    Route::get('delete-gallery/{id}', [App\Http\Controllers\GambarKosController::class, 'deleteGalery'])->name('delete-gallery');
    Route::get('delete-kos/{id}', [App\Http\Controllers\KosController::class, 'deleteKos'])->name('delete-kos');
    Route::get('create-gallery/{id}', [App\Http\Controllers\KosController::class, 'createGallery'])->name('createGallery');
    Route::get('create-gallery-kamar/{id}', [App\Http\Controllers\GambarKamarController::class, 'createGalleryKamar'])->name('gallery.kamar');
    Route::get('delete-gallery-kamar/{id}', [App\Http\Controllers\GambarKamarController::class, 'deleteGalleryKamar'])->name('gallery-kamar.delete');
    Route::get('/ajax/fasilitas-kos/search', [App\Http\Controllers\FasilitasController::class, 'ajaxSearch']);

    Route::get('cetak-pdf/{id}', [App\Http\Controllers\BookingController::class, 'cetakPdf'])->name('cetakPdf');
});

