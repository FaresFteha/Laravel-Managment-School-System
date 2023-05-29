<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;
class Classroom extends Model 
{
    use  HasTranslations , SearchableTrait;
    public $translatable = ['name_class'];

    protected $table = 'classrooms';
    protected $fillable = ['name_class' , 'Grade_id'];
    public $timestamps = true;

    protected $searchable = [

        'columns' => [
            'classrooms.name_class' => 10,
        ],

    ];

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

}