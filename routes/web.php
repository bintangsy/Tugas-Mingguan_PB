<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "home",
    ]);
});

Route::get('/profile', function () {
    return view('profile',[
        "title" => "profile",
        "nama" => "M Bintang Syafalabib",
        "nohp" => "083527347735",
        "foto" => "images/bintangganteng.jpg",
    ]);
});

Route::get('/berita', function () {

    $data_berita = [
        [
            "judul" => "Hot News 1",
            "penulis" => "Yanto",
            "konten" => "Cara mengubah rasa sedih menjadi rasa coklat",
        ],
        [
            "judul" => "Hot News 2",
            "penulis" => "Heru",
            "konten" => "Barca juara liga champions 2025",
        ],
        [
            "judul" => "Hot News 3",
            "penulis" => "Wowo",
            "konten" => "Rafi ahmad jatuh miskin",
        ],
    ];
    return view('berita', [
        "title" => "berita",
        "berita" => $data_berita,
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "contact",
    ]);
});