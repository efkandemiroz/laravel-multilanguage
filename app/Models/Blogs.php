<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// İlk olarak Translatable sınıfını modelimize import edelim
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Blogs extends Model implements TranslatableContract
{
    use Translatable; // Metodu model içerisine ekliyoruz.

    protected $table = 'blogs';
    use HasFactory;
    public $translatedAttributes = ['baslik', 'icerik'];
    public $timestamps = false;
}
