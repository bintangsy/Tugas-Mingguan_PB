<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;
use App\Models\Berita;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "home",
    ]);
});

Route::get('/profile', function () {
    return view('profile',[
        "title" => "profile",
        "nama" => "Bintang Sy",
        "nohp" => "085228496778",
        "foto" => "img/hasbizain.jpg",
    ]);
});




Route::get('/berita',[BeritaController::class, 'index']);
Route::get('/berita/{slug}', [BeritaController::class, 'tampildata']);

Route::get('/mahasiswa',[MahasiswaController::class, 'index'])->name('mahasiswa');

Route::get('/tambahmahasiswa',[MahasiswaController::class, 'tambahmahasiswa'])->name('tambahmahasiswa');
Route::POST('/insertdata',[MahasiswaController::class, 'insertdata'])->name('insertdata');


Route::get('/tampildata/{id}',[MahasiswaController::class, 'tampildata'])->name('tampildata');

Route::POST('/editdata/{id}',[MahasiswaController::class, 'editdata'])->name('editdata');

Route::POST('/deletedata/{id}',[MahasiswaController::class, 'deletedata'])->name('deletedata');


Route::get('/contact', function () {
    return view('contact', [
        "title" => "contact",
    ]);
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');