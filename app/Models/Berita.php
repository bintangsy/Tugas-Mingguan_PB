<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    private static $data_berita = [
        [
            "judul" => "Berita Unimus Racing",
            "slug" => "berita-unimus-racing",
            "penulis" => "Jokowi",
            "konten" => "Ongkekan cipto diresmikan oleh wali kota",
        ],
        [
            "judul" => "Berita Kendal Handal",
            "slug"=> "berita-kendal-handal",
            "penulis" => "Yanto",
            "konten" => "Kendal menjadi ibu kota Indonesias",
        ],
        [
            "judul" => "Berita Odgj di Rumah Sakit Jiwa",
            "slug"=> "berita-odgj-di-rumah-sakit-jiwa",
            "penulis" => "Munawaroh",
            "konten" => "Odgj ditemukan di Rumah Sakit Jiwa",
        ],
    ];

    public static function ambildata()
    {
        return self::$data_berita;
    }

    public static function caridata($slug)
    {
        $data_beritas = Self::$data_berita;

        $new_berita = [];
        foreach($data_beritas as $berita) 
        {
            if($berita["slug"] === $slug)
            {
                $new_berita = $berita;
            }
        }

        return $new_berita;
    }
}