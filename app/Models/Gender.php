<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Gender extends Model
{
    use  HasTranslations;
    public $translatable = ['gender'];
    protected $fillable=[ 'gender'];
    //protected $guarded=[];
    public $timestamps = true;
}
