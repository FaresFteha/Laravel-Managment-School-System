<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Specialization extends Model
{
    use  HasTranslations;
    public $translatable = ['specialization'];
    protected $fillable=[ 'specialization'];
    //protected $guarded=[];
    public $timestamps = true;
}
