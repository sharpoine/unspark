<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\FrontController;
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

Route::get('/', [FrontController::class,'Anasayfa'])->name('front.anasayfa');
Route::get('/hakkimizda',[FrontController::class,'Hakkimizda'])->name('front.hakkimizda');
Route::get('/blog',[FrontController::class,'Blog'])->name('front.blog');
Route::get('/blog/{baslik}',[FrontController::class,'BlogDetay'])->name('front.blogdetay');
Route::get('/iletisim',[FrontController::class,'Iletisim'])->name('front.iletisim');

Route::get('admin/login',[UserController::class,'login'])->name('admin.login');
Route::post('admin/loginPost',[UserController::class,'loginPost'])->name('admin.login.post');

Route::group(['prefix'=>'admin','middleware'=>['auth','aktifMW']],function(){
    Route::get('/logout',[UserController::class,'logout'])->name('admin.logout');
    Route::get('/',[UserController::class,'home'])->name('admin.home');
    Route::get('/kullanicilar',[UserController::class,'kullanicilar'])->name('admin.kullanicilar');
    Route::get('kullanicilar/aktifPost',[UserController::class,'aktifPost'])->name('admin.kullanicilar.aktifPost');
    Route::get('kullanicilar/ekle',[UserController::class,'kullaniciEkle'])->name('admin.kullanicilar.ekle');
    Route::post('kullanicilar/eklePost',[UserController::class,'kullaniciEklePost'])->name('admin.kullanicilar.eklePost');
    Route::post('kullanicilar/silPost/{id}',[UserController::class,'kullaniciSilPost'])->name('admin.kullanicilar.silPost');
    Route::get('kullanicilar/duzenle/{id}',[UserController::class,'kullaniciDuzenle'])->name('admin.kullanicilar.duzenle');
    Route::post('kullanicilar/duzenlePost/{id}',[UserController::class,'kullaniciDuzenlePost'])->name('admin.kullanicilar.duzenlePost');

    Route::get('blog/ekle',[BlogController::class,'icerikEkle'])->name('admin.blog.ekle');
    Route::post('blog/eklePost',[BlogController::class,'icerikEklePost'])->name('admin.blog.eklePost');
    Route::get('blog/goruntule/',[BlogController::class,'icerikler'])->name('admin.blog.goruntule');
    Route::get('blog/aktifPost',[BlogController::class,'aktifPost'])->name('admin.blog.aktifPost');
    Route::post('blog/silPost/{id}',[BlogController::class,'icerikSilPost'])->name('admin.blog.silPost');
    Route::get('blog/duzenle/{id}',[BlogController::class,'icerikDuzenle'])->name('admin.blog.duzenle');
    Route::post('blog/duzenlePost/{id}',[BlogController::class,'icerikDuzenlePost'])->name('admin.blog.duzenlePost');

});
