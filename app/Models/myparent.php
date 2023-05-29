<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class myparent extends Authenticatable
{
    use  HasTranslations , SearchableTrait;
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];
    protected $table = 'myparents';
    protected $guarded=[];
    public $timestamps = true;

    protected $searchable = [

        'columns' => [
            'myparents.Name_Father' => 10,
            'myparents.Name_Mother' => 10,
        ],

    ];

}
