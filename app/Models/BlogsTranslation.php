<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class BlogsTranslation extends Model

    {
        protected $table = 'blogs_translations';
        protected $fillable = ['baslik', 'icerik'];
        public $timestamps = false;
    }
