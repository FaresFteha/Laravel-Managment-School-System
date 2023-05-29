<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsSchool extends Model
{
    use HasFactory;
    use  HasTranslations;
    public $translatable = ['Title' , 'content'];
    protected $table = 'news_schools';
    protected $guarded=[];
    public $timestamps = true;
}
